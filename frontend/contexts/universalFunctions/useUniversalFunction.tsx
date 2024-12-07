"use client";
import { useContext } from "react";
import { UniversalFunctionContext } from "./universalFunctionContext";

export const useUniversalFunction = () => {
  const context = useContext(UniversalFunctionContext);
  return context;
};
