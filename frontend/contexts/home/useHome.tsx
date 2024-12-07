"use client";
import { useContext } from "react";
import { HomeContext } from "./homeContext";

export const useHome = () => {
  const context = useContext(HomeContext);
  return context;
};
