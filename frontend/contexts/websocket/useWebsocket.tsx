"use client";
import { useContext } from "react";
import { WebsocketContext } from "./websocketContext";

export const useWebsocket = () => {
  const context = useContext(WebsocketContext);
  return context;
};
