"use client";
import { useUserSession } from "@/contexts/userSession";
import { WebsocketContext } from "./websocketContext";
import { useCallback, useEffect, useState } from "react";
import { WebsocketMessageInterface } from "@/types/internal/websocketMessageInterface";
import Pusher from "pusher-js";
import Echo from "laravel-echo";
import { InitWebsocketsChannelInterface } from "@/types/internal/initWebsocketsChannelInterface";
import { MouseEvent } from "react";
// import { change as showModal } from "@/app/(protected-routes)/(global-redux)/features/notificationModalSlice";
import { useBackendRequest } from "@/contexts/backendRequest";
import { RawAxiosRequestHeaders } from "axios";

export const WebsocketProvider = ({
  children,
}: {
  children: React.ReactNode;
}) => {

  const { executeGet, executePath, executePost, executePut } =
    useBackendRequest();

  const { userSession } = useUserSession();

  const [websocketMessage, setWebsocketMessage] =
    useState<WebsocketMessageInterface>();

  const [notificationMessages, setNotificationMessages] = useState<
    Array<WebsocketMessageInterface>
  >([]);

  useEffect(() => {
    if (!userSession) return;
    Pusher.logToConsole = false;

    const channelName = "private-channel";

    const echo = new Echo({
      broadcaster: "reverb",
      key: process.env.NEXT_PUBLIC_PUSHER_APP_KEY,
      wsHost: process.env.NEXT_PUBLIC_PUSHER_HOST,
      wsPort: process.env.NEXT_PUBLIC_PUSHER_PORT ?? 6001,
      wssPort: process.env.NEXT_PUBLIC_PUSHER_PORT ?? 6001,
      forceTLS: (process.env.NEXT_PUBLIC_PUSHER_SCHEME ?? "http") === "https",
      enabledTransports: ["ws", "wss"],
      encrypted: true,
      authorizer: (
        channel: InitWebsocketsChannelInterface,
        options: object
      ) => {
        return {
          authorize: async (socketId: string, callback: CallableFunction) => {
            const headers: RawAxiosRequestHeaders = {
              "Content-Type": "Application/json",
              Accept: "Application/json",
              Authorization: `Bearer ${userSession?.token}`,
              'X-Requested-With': 'XMLHttpRequest',
            };

            const axiosParams = {
              url: `/broadcasting/auth`,
              body: {
                socket_id: socketId,
                channel_name: channel?.name,
              },
              headers: headers
            };
            try {
              const response = await executePost(axiosParams);
              // console.log("Authorization Response:", response);
              if (response?.data?.auth) {
                callback(null, response.data);
              } else {
                console.error("Authorization Response Missing Auth:", response);
                callback("Authorization missing auth key");
              }
            } catch (error) {
              console.error("Authorization Error:", error);
              callback(error);
            }
          },
        };
      },
    });

    const publicChannel = echo
      .channel(`public-channel`)
      .listen(".MessagePubilic", (message: WebsocketMessageInterface) => {
        // console.log("Public Channel", message);
        setWebsocketMessage(message);
      });

    const privateChannel = echo
      .private(`${channelName}.${userSession?.id}`)
      .listen(".MessagePrivate", (message: WebsocketMessageInterface) => {
        // console.log("Private Channel", message);
        setWebsocketMessage(message);
      });

    return () => {
      publicChannel.stopListening(".MessagePubilic");
      privateChannel.stopListening(".MessagePrivate");
      echo.disconnect();
    };

  }, [userSession, executePost]);

  useEffect(() => {
    if (websocketMessage) {
      setNotificationMessages((prevMessages) => {
        const messagesReceived = [...prevMessages, websocketMessage];
        const uniqueData = messagesReceived.filter(
          (obj, index, self) =>
            index ===
            self.findIndex(
              (o) =>
                o.userId === obj.userId &&
                o.broadcastMessageUserId === obj.broadcastMessageUserId &&
                o.message === obj.message &&
                o.read === obj.read
            )
        );

        uniqueData.sort(
          (a, b) => b.broadcastMessageUserId - a.broadcastMessageUserId
        );
        return uniqueData;
      });
    }
  }, [websocketMessage]);

  function countMessages(status: boolean): number {
    return notificationMessages.filter((message) => message.read === status)
      .length;
  }

  const getMessages = useCallback(async () => {
    const headers: RawAxiosRequestHeaders = {
      "Content-Type": "Application/json",
      Accept: "Application/json",
      Authorization: `Bearer ${userSession?.token}`,
    };
    const axiosParams = {
      url: `broadcasting/get-all`,
      headers: headers,
    };
    const response = await executeGet(axiosParams);
    if (response) {
      setNotificationMessages(response?.data?.data);
    }
  }, [executeGet, userSession?.token])

  useEffect(() => {
    if (userSession) {
      getMessages();
    }
  }, [getMessages, userSession]);

  function readAll(): Array<WebsocketMessageInterface> {
    return notificationMessages.map((message) => {
      return {
        ...message,
        read: true,
      };
    });
  }

  function handleReadAllMessage() {
    setNotificationMessages(readAll());
    const headers: RawAxiosRequestHeaders = {
      "Content-Type": "Application/json",
      Accept: "Application/json",
      Authorization: `Bearer ${userSession?.token}`,
    };
    const axiosParams = {
      url: `broadcasting/message/readed/all`,
      headers: headers
    };
    executePut(axiosParams);
  }

  function toggleRead(
    messages: Array<WebsocketMessageInterface>,
    broadcastMessageUserId: number
  ): Array<WebsocketMessageInterface> {
    return messages.map((message) => {
      if (message.broadcastMessageUserId === broadcastMessageUserId) {
        return {
          ...message,
          read: true,
        };
      } else {
        return message;
      }
    });
  }

  function handleReadMessage(
    event: MouseEvent<HTMLSpanElement>,
    notification: WebsocketMessageInterface
  ) {
    setNotificationMessages(
      toggleRead(notificationMessages, notification.broadcastMessageUserId)
    );

    if (!notification.read && userSession) {
      const headers: RawAxiosRequestHeaders = {
        "Content-Type": "Application/json",
        Accept: "Application/json",
        Authorization: `Bearer ${userSession?.token}`,
      };
      const axiosParams = {
        url: `broadcasting/message/readed/${notification.broadcastMessageUserId}`,
        headers: headers
      };
      executePath(axiosParams);
    }
  }

  return (
    <WebsocketContext.Provider
      value={{
        notificationMessages,
        countMessages,
        handleReadAllMessage,
        handleReadMessage,
      }}
    >
      {children}
    </WebsocketContext.Provider>
  );
};
