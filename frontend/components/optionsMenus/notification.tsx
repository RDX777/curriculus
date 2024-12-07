"use client";
import {
  MenubarContent,
  MenubarItem,
  MenubarMenu,
  MenubarTrigger,
  MenubarSeparator,
} from "@/components/ui/menubar";
import {
  Tooltip,
  TooltipContent,
  TooltipProvider,
  TooltipTrigger,
} from "@/components/ui/tooltip";
import { HellsBellsIcon } from "../icons/hellsBellsIcon";
import MenuIcons from "../icons/menuIcons";
import { useWebsocket } from "@/contexts/websocket";

export const Notification: React.FC = () => {
  const { notificationMessages, handleReadAllMessage, handleReadMessage } =
    useWebsocket();

  return (
    <MenubarMenu>
      <MenubarTrigger>
        <TooltipProvider>
          <Tooltip>
            <TooltipTrigger>
              <HellsBellsIcon />
            </TooltipTrigger>
            <TooltipContent>
              <h1>Notificações</h1>
            </TooltipContent>
          </Tooltip>
        </TooltipProvider>
      </MenubarTrigger>

      <MenubarContent className="w-96 full-height overflow-y-auto">
        <div className="whitespace-normal break-all m-1">
          <span className="flex justify-center items-center line-clamp-3 text-xl">
            Notificações
            <MenuIcons name="RiChatSmile3Line" className="mx-1 mt-1 ml-2" />
          </span>
          <button
            className="flex justify-center items-center w-full text-cyan-600 text-opacity-95"
            onClick={() => handleReadAllMessage()}
          >
            Marcar tudo como lido
          </button>
        </div>
        <MenubarSeparator className="bg-black dark:bg-white mr-1 opacity-25 h-0.5" />
        {Array.isArray(notificationMessages) &&
          notificationMessages.length >= 0 &&
          notificationMessages
            .slice()
            // .reverse()
            .map((notification, index) => (
              <>
                <MenubarItem
                  key={index}
                  onClick={(event) => handleReadMessage(event, notification)}
                >
                  <span
                    className={`${
                      notification.read
                        ? "text-gray-400 dark:text-gray-600"
                        : "text-black dark:text-white"
                    } line-clamp-2`}
                  >
                    {notification.message}
                  </span>
                </MenubarItem>
                <MenubarSeparator className="mr-1" />
              </>
            ))}
      </MenubarContent>
    </MenubarMenu>
  );
};
