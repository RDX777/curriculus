"use client";
import { createContext } from "react";
import { SettingsRolesType } from "@/types/internal/settingsRolesType";
import { SettingsMiddlewaresType } from "@/types/internal/settingsMiddlewaresType";
import { SettingsMenusType } from "@/types/internal/settingsMenusType";
import { SettingsActionsType } from "@/types/internal/settingsActionsType";

export type SettingsType = {
  roles: SettingsRolesType[] | null | undefined;
  selectedRole: SettingsRolesType | null | undefined;
  middlewares: SettingsMiddlewaresType | null;
  menus: SettingsMenusType | null;
  actions: SettingsActionsType | null;
  searchRoleById: (role: SettingsRolesType) => void;
  handleSelectedStatus: (type: string, permission: any) => void;
};

export const SettingsContext = createContext<SettingsType>({
  roles: null,
  selectedRole: null,
  middlewares: null,
  menus: null,
  actions: null,
  searchRoleById: () => null,
  handleSelectedStatus: () => null,
});
