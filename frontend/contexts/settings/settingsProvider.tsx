"use client";
import { ReactNode, useCallback, useEffect, useState } from "react";
import { useUserSession } from "../userSession";
import { SettingsContext } from "./settingsContext";
import { SettingsRolesType } from "@/types/internal/settingsRolesType";
import { SettingsMiddlewaresType } from "@/types/internal/settingsMiddlewaresType";
import { SettingsMenusType } from "@/types/internal/settingsMenusType";
import { SettingsActionsType } from "@/types/internal/settingsActionsType";
import { useBackendRequest } from "../backendRequest";
import { RawAxiosRequestHeaders } from "axios";
import { SettingsInterface } from "@/types/internal/settingsInterface";

type SettingsProviderProps = {
  children: ReactNode;
};

export const SettingsProvider = ({ children }: SettingsProviderProps) => {
  const { executeGet, executePath } = useBackendRequest();

  const [selectedRole, setSelectedRole] = useState<SettingsRolesType>();

  const { userSession } = useUserSession();

  const [roles, setRoles] = useState<SettingsRolesType[] | null>(null);

  const [middlewares, setMiddlewares] = useState<
    SettingsMiddlewaresType | null
  >(null);

  const [menus, setMenus] = useState<SettingsMenusType | null>(null);

  const [actions, setActions] = useState<SettingsActionsType | null>(null);

  async function setStatusPermission(partialUrl: string, permission: any) {
    const headers: RawAxiosRequestHeaders = {
      "Content-Type": "Application/json",
      Accept: "Application/json",
      Authorization: `Bearer ${userSession?.token}`,
    };
    const axiosParams = {
      url: `/settings/permissions/role/${partialUrl}/${selectedRole?.id}`,
      body: {
        id: permission.id,
        active: !permission.selected,
      },
      headers: headers,
    };

    executePath(axiosParams);
  }

  async function changeStatusMiddleware(permission: SettingsInterface) {

    if (middlewares && middlewares[permission.classification]) {
        const updatedMiddlewares = middlewares[permission.classification].map((middleware) => {
            if (middleware.name === permission.name) {
                return {
                    ...middleware,
                    selected: !middleware.selected,
                };
            }
            return middleware;
        });

        const fullUpdatedMidleware = {
          ...middlewares,
          [permission.classification]: updatedMiddlewares
        }

        setMiddlewares(fullUpdatedMidleware as SettingsMiddlewaresType);
        setStatusPermission("middleware", permission);

    } else {
        console.error(`middlewares[${permission.description}] is undefined or null`);
    }
  }

  async function changeStatusMenus(permission: SettingsInterface) {
    if (menus && menus[permission.classification]) {
      const updatedMenus = menus[permission.classification].map((menu) => {
          if (menu.name === permission.name) {
              return {
                  ...menu,
                  selected: !menu.selected,
              };
          }
          return menu;
      });

      const fullUpdatedMenu = {
        ...menus,
        [permission.classification]: updatedMenus
      }

      setMenus(fullUpdatedMenu as SettingsMenusType);
      setStatusPermission("menu", permission);

    } else {
        console.error(`menu[${permission.description}] is undefined or null`);
    }
      
  }


  async function changeStatusActions(permission: SettingsInterface) {
    if (actions && actions[permission.classification]) {
      const updatedActions = actions[permission.classification].map((action) => {
          if (action.name === permission.name) {
              return {
                  ...action,
                  selected: !action.selected,
              };
          }
          return action;
      });

      const fullUpdatedMenu = {
        ...actions,
        [permission.classification]: updatedActions
      }

      setActions(fullUpdatedMenu as SettingsActionsType);
      setStatusPermission("action", permission);

    } else {
        console.error(`menu[${permission.description}] is undefined or null`);
    }
  }

  function handleSelectedStatus(type: string, permission: any) {
    switch (type) {
      case "SettingsMiddlewaresType":
        changeStatusMiddleware(permission);
        break;
      case "SettingsMenusType":
        changeStatusMenus(permission);
        break;
      case "SettingsActionsType":
        changeStatusActions(permission);
        break;
      default:
        console.error("Type invalido");
    }
  }

  const getRoles = useCallback(async () => {
    const headers: RawAxiosRequestHeaders = {
      "Content-Type": "Application/json",
      Accept: "Application/json",
      Authorization: `Bearer ${userSession?.token}`,
    };
    const axiosParams = {
      url: "/settings/permissions/list/roles",
      headers: headers,
      load: true,
    };
    const response = await executeGet(axiosParams);
    setRoles(response?.data?.data);
  }, [executeGet, userSession?.token]);

  useEffect(() => {
    if (userSession) {
      getRoles();
    }
  }, [getRoles, userSession]);

  async function searchRoleById(role: SettingsRolesType) {
    setSelectedRole(role);

    const headers: RawAxiosRequestHeaders = {
      "Content-Type": "Application/json",
      Accept: "Application/json",
      Authorization: `Bearer ${userSession?.token}`,
    };
    const axiosParams = {
      url: `/settings/permissions/search/role/${role.id}`,
      headers: headers,
      load: true,
    };

    const response = await executeGet(axiosParams);

    setMiddlewares(response?.data?.data?.middlewares);
    setMenus(response?.data?.data?.menus);
    setActions(response?.data?.data?.actions);
  }

  return (
    <SettingsContext.Provider
      value={{
        roles,
        selectedRole,
        middlewares,
        menus,
        actions,
        searchRoleById,
        handleSelectedStatus,
      }}
    >
      {children}
    </SettingsContext.Provider>
  );
};
