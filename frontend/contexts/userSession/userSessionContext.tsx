"use client";
import { UserSessionInterface } from "@/types/internal/userSessionInterface";
import { createContext } from "react";

type UserSessionContextType = {
  userSession: UserSessionInterface | undefined | null;
  userCanAction: (action: string) => boolean;
  userCanMenu: (menuName: string) => void;
  getInitials: (name: string | null | undefined) => string;
  handleLogout: () => void;
};

export const UserSessionContext = createContext<UserSessionContextType>({
  userSession: null,
  userCanAction: () => false,
  userCanMenu: () => null,
  getInitials: () => "",
  handleLogout: () => null,
});
