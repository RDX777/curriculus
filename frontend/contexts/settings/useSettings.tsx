"use client";
import { useContext } from "react";
import { SettingsContext } from "./settingsContext";

export const useSettings = () => {
  const context = useContext(SettingsContext);
  return context;
};
