"use client";
import { BackendRequestFunctionType } from "@/types/internal/backendRequestFunctionType";
import { AxiosResponse } from "axios";
import { createContext } from "react";

export type BackendRequestType = {
  executeGet: (
    params: BackendRequestFunctionType
  ) => Promise<AxiosResponse | null | undefined>;
  executePath: (
    params: BackendRequestFunctionType
  ) => Promise<AxiosResponse | null | undefined>;
  executePost: (
    params: BackendRequestFunctionType
  ) => Promise<AxiosResponse | null | undefined>;
  executePut: (
    params: BackendRequestFunctionType
  ) => Promise<AxiosResponse | null | undefined>;
  executeDelete: (
    params: BackendRequestFunctionType
  ) => Promise<AxiosResponse | null | undefined>;
};

export const BackendRequestContext = createContext<BackendRequestType>({
  executeGet: () => Promise.resolve(null),
  executePath: () => Promise.resolve(null),
  executePost: () => Promise.resolve(null),
  executePut: () => Promise.resolve(null),
  executeDelete: () => Promise.resolve(null),
});
