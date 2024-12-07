"use client";
import { AxiosError, AxiosResponse } from "axios";
import { ReactNode, useState } from "react";
import viaCepEndInstance from "@/utils/configs/viaCepInstance";
import { change as showLoading } from "@/app/(protected-routes)/(global-redux)/features/loadingModalSlice";
import { ViaCepRequestContext } from "@/contexts/viaCepRequest/viaCepRequestContext";
import { useDispatch } from "react-redux";
import { BackendRequestFunctionType } from "@/types/internal/backendRequestFunctionType";

type ViaCepRequestProps = {
  children: ReactNode;
};

export const ViaCepRequestProvider = ({ children }: ViaCepRequestProps) => {
  const dispatch = useDispatch();

  function handleErrors(error: AxiosError) {
    //dispatch(showLoading(false));
    // if (error?.response?.status === 401) {
    //   handleLogout();
    // }
    console.error("handleErrors axios", error);
  }

  async function executeGet(
    axiosParams: BackendRequestFunctionType
  ): Promise<AxiosResponse | undefined> {
    if (axiosParams.load) {
      dispatch(showLoading(true));
    }
    try {
      const response = await viaCepEndInstance.get(axiosParams.url, {
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

  return (
    <ViaCepRequestContext.Provider
      value={{
        executeGet,
      }}
    >
      {children}
    </ViaCepRequestContext.Provider>
  );
};
