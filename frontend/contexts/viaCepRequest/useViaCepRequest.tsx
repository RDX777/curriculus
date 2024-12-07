"use client";
import { useContext } from "react";
import { ViaCepRequestContext } from "@/contexts/viaCepRequest";

export const useViaCepRequest = () => {
  const context = useContext(ViaCepRequestContext);
  return context;
};
