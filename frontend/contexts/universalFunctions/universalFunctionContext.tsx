"use client";

import { createContext } from "react";

export type UniversalFunctionType = {
  dateToPtBr: (dateString: string | null | undefined) => string | undefined;
  datetimeToPtBr: (datetime: string | null | undefined) => string | undefined;
  dateToIso: (dateToConvert: Date | string) => string | null;
  paramsForNavigation: (params: object) => string | null;
};

export const UniversalFunctionContext = createContext<UniversalFunctionType>({
  dateToPtBr: () => undefined,
  datetimeToPtBr: () => undefined,
  dateToIso: () => null,
  paramsForNavigation: () => null,
});
