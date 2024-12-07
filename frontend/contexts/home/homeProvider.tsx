"use client";
import { HomeContext } from "./homeContext";
import { useUserSession } from "../userSession";
import { useQuery } from "@tanstack/react-query";
import { useBackendRequest } from "../backendRequest";

export const HomeProvider = ({ children }: { children: React.ReactNode }) => {
  const { userSession } = useUserSession();
  const { executeGet } = useBackendRequest();

  const queryKeyBalance: Array<string> = ["get", "home", "balance"];
  const queryKeyRobos: Array<string> = ["get", "home", "robos"];
  const queryKeyLastNumbers: Array<string> = ["get", "home", "lastNumbers"];

  return <HomeContext.Provider value={{}}>{children}</HomeContext.Provider>;
};
