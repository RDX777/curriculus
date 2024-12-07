"use client";

import { AppProgressBar as ProgressBar } from "next-nprogress-bar";

export const LoadBar = () => {
  return (
    <ProgressBar
      height="3px"
      color="#0891B2"
      options={{ showSpinner: false }}
      shallowRouting
    />
  );
};
