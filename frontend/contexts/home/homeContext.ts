"use client";
import { createContext } from "react";

export type HomeType = {};

export const HomeContext = createContext<HomeType>({
  dataCaptcha: null,
  dataRobos: null,
  dataLastNumbers: null,
});
