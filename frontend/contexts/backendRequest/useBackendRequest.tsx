"use client";
import { useContext } from "react";
import { BackendRequestContext } from "./backendRequestContext";

export const useBackendRequest = () => {
  const context = useContext(BackendRequestContext);
  return context;
};
