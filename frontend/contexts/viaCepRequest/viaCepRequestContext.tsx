"use client";
import { BackendRequestFunctionType } from "@/types/internal/backendRequestFunctionType";
import { AxiosResponse } from "axios";
import { createContext } from "react";

export type ViaCepRequestType = {
  executeGet: (
    params: BackendRequestFunctionType
  ) => Promise<AxiosResponse | null | undefined>;
};

export const ViaCepRequestContext = createContext<ViaCepRequestType>({
  executeGet: () => Promise.resolve(null),
});
