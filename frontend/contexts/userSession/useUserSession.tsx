"use client";
import { useContext } from "react";
import { UserSessionContext } from "./userSessionContext";

export const useUserSession = () => {
  const context = useContext(UserSessionContext);
  return context;
};
