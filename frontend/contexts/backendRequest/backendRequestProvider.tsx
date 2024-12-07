"use client";
import { AxiosError, AxiosResponse } from "axios";
import { ReactNode } from "react";
import backEndInstance from "@/utils/configs/backEndInstance";
import { change as showLoading } from "@/app/(protected-routes)/(global-redux)/features/loadingModalSlice";
import { BackendRequestContext } from "./backendRequestContext";
import { useDispatch } from "react-redux";
import { BackendRequestFunctionType } from "@/types/internal/backendRequestFunctionType";

type BackendRequestProps = {
  children: ReactNode;
};

export const BackendRequestProvider = ({ children }: BackendRequestProps) => {
  const dispatch = useDispatch();

  function handleErrors(error: AxiosError) {
    dispatch(showLoading(false));
    console.error("handleErrors axios", error);
  }

  async function executeGet(
    axiosParams: BackendRequestFunctionType
  ): Promise<AxiosResponse | undefined> {
    if (axiosParams.load) {
      dispatch(showLoading(true));
    }
    try {
      const response = await backEndInstance.get(axiosParams.url, {
        headers: axiosParams.headers,
        responseType: axiosParams.responseType
          ? axiosParams.responseType
          : "json",
      });
      if (axiosParams.load) {
        dispatch(showLoading(false));
      }
      return response;
    } catch (error: any) {
      handleErrors(error);
    }
  }

  async function executePath(
    axiosParams: BackendRequestFunctionType
  ): Promise<AxiosResponse | undefined> {
    if (axiosParams.load) {
      dispatch(showLoading(true));
    }
    try {
      const response = await backEndInstance.patch(
        axiosParams.url,
        axiosParams.body,
        {
          headers: axiosParams.headers,
        }
      );
      if (axiosParams.load) {
        dispatch(showLoading(false));
      }
      return response;
    } catch (error: any) {
      handleErrors(error);
    }
  }

  async function executePost(
    axiosParams: BackendRequestFunctionType
  ): Promise<AxiosResponse | undefined> {
    if (axiosParams.load) {
      dispatch(showLoading(true));
    }
    try {
      const response = await backEndInstance.post(
        axiosParams.url,
        axiosParams.body,
        {
          headers: axiosParams.headers,
        }
      );
      if (axiosParams.load) {
        dispatch(showLoading(false));
      }
      return response;
    } catch (error: any) {
      handleErrors(error);
    }
  }

  async function executePut(
    axiosParams: BackendRequestFunctionType
  ): Promise<AxiosResponse | undefined> {
    if (axiosParams.load) {
      dispatch(showLoading(true));
    }
    try {
      const response = await backEndInstance.put(
        axiosParams.url,
        axiosParams.body,
        {
          headers: axiosParams.headers,
        }
      );
      if (axiosParams.load) {
        dispatch(showLoading(false));
      }
      return response;
    } catch (error: any) {
      handleErrors(error);
    }
  }

  async function executeDelete(
    axiosParams: BackendRequestFunctionType
  ): Promise<AxiosResponse | undefined> {
    if (axiosParams.load) {
      dispatch(showLoading(true));
    }
    try {
      const response = await backEndInstance.delete(axiosParams.url, {
        headers: axiosParams.headers,
      });
      if (axiosParams.load) {
        dispatch(showLoading(false));
      }
      return response;
    } catch (error: any) {
      handleErrors(error);
    }
  }

  return (
    <BackendRequestContext.Provider
      value={{
        executeGet,
        executePath,
        executePost,
        executePut,
        executeDelete,
      }}
    >
      {children}
    </BackendRequestContext.Provider>
  );
};
