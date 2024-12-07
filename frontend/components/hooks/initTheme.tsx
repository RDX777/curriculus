"use client";
import { useEffect } from "react";
import { getCookie } from "@/utils/functions_tools/cookies";

export const InitTheme = () => {
  useEffect(() => {
    const bodyElement = window.document.getElementById("body");
    const newCookie = getCookie("theme") ?? "ligth";
    if (bodyElement) {
      bodyElement.classList.remove("dark");
      bodyElement.classList.remove("ligth");
      bodyElement.classList.add(newCookie);
    }
  }, []);
  return <></>;
};
