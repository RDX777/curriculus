import { RawAxiosRequestHeaders } from "axios";
import { BackendRequestResponseTypeEnum } from "./backendRequestResponseTypeEnum";

export type BackendRequestFunctionType = {
  url: string;
  body?: any;
  headers?: RawAxiosRequestHeaders;
  responseType?: BackendRequestResponseTypeEnum;
  load?: boolean;
};
