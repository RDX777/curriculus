"use client";

import { WebsocketMessageInterface } from "@/types/internal/websocketMessageInterface";
import { createContext, MouseEvent } from "react";

export type WebsocketType = {
  notificationMessages: Array<WebsocketMessageInterface>;
  countMessages: (status: boolean) => number;
  handleReadAllMessage: () => void;
  handleReadMessage: (
    event: MouseEvent<HTMLSpanElement>,
    notification: WebsocketMessageInterface
  ) => void;
};

export const WebsocketContext = createContext<WebsocketType>({
  notificationMessages: [],
  countMessages: () => 0,
  handleReadAllMessage: () => null,
  handleReadMessage: () => null,
});
