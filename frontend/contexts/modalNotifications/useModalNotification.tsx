"use client";
import { useContext } from "react";
import { ModalNotificationContext } from "./modalNotificationContext";

export const useModalNotification = () => {
  const context = useContext(ModalNotificationContext);
  return context;
};
