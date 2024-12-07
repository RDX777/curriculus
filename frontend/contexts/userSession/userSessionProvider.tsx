"use client";
import { signOut, useSession } from "next-auth/react";
import { UserSessionContext } from "./userSessionContext";
import { UserSessionInterface } from "@/types/internal/userSessionInterface";
import { useCallback, useEffect } from "react";
import { toast } from "@/components/ui/use-toast";
import { useBackendRequest } from "@/contexts/backendRequest";
import { redirect } from "next/navigation";
import { RawAxiosRequestHeaders } from "axios";

export const UserSessionProvider = ({
  children,
}: {
  children: React.ReactNode;
}) => {
  const { data: session, status } = useSession();
  const userSession: UserSessionInterface | undefined | null = session?.user;

  const { executePost } = useBackendRequest();

  const handleLogout = useCallback(async () => {
    const token = userSession?.token;
    const headers: RawAxiosRequestHeaders = {
      "Content-Type": "Application/json",
      Accept: "Application/json",
      Authorization: `Bearer ${token}`,
    };
    const axiosParams = {
      url: `auth/logout`,
      body: {},
      headers: headers,
      load: true,
    };

    executePost(axiosParams);
    signOut();
  }, [executePost, userSession?.token]);

  useEffect(() => {
    if (status && status == "unauthenticated") {
      toast({
        title: "🔒 Sessão expirada",
        description: `Por favor faça o login novamente!`,
      });
      setTimeout(() => {
        handleLogout();
      }, 1000);
    }
  }, [handleLogout, status]);

  function userCanAction(action: string): boolean {
    const userCan = userSession?.actions?.some((item) => item.name === action);
    if (userCan) {
      return true;
    }
    return false;
  }

  function userCanMenu(menuName: string) {
    const userCan = userSession?.role?.menus?.some((item) => item.name === menuName);
    if (!userCan) {
      toast({
        title: "The portal has ben open!",
        description: `Greetings Mortal, Are You Ready To DIE?`,
      });
      redirect("/home");
    }
  }

  function getInitials(name: string | null | undefined): string {
    try {
      let initals: string = "";
      if (name) {
        const partedName = name.trim().split(" ");

        if (partedName.length === 1) {
          initals = partedName[0][0];
        } else {
          initals = partedName[0][0];
          initals = initals.concat(partedName[partedName.length - 1][0]);
        }

        return initals.toUpperCase();
      }
    } catch (error) {
      return "";
    }
    return "";
  }

  return (
    <UserSessionContext.Provider
      value={{ userSession, userCanAction, userCanMenu, getInitials, handleLogout }}
    >
      {children}
    </UserSessionContext.Provider>
  );
};
