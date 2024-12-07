"use client";

import { useSelector, useDispatch } from "react-redux";
import { change } from "@/app/(protected-routes)/(global-redux)/features/themeSlice";
import { RootState } from "@/app/(protected-routes)/(global-redux)/store";
import { useEffect } from "react";
import MenuIcons from "@/components/icons/menuIcons";
import { createCookie } from "@/utils/functions_tools/cookies";

export const ThemeIcon = () => {
  const showIconTheme = useSelector((state: RootState) => state.theme.value);
  const dispatch = useDispatch();

  useEffect(() => {
    const bodyElement = window.document.getElementById("body");
    if (bodyElement) {
      bodyElement.classList.remove("dark");
      bodyElement.classList.remove("ligth");
      bodyElement.classList.add(showIconTheme!);
    }
  }, [showIconTheme]);

  function changeTheme(theme: string) {
    dispatch(change(theme));

    createCookie("theme", theme);

  }

  return (
    <>
      <MenuIcons
        name="BsMoonStars"
        className={`${showIconTheme === "dark" ? "" : "hidden"
          } bg-transparent w-10 h-10 mx-3 mt-1 text-cyan-600 text-opacity-95 transition-icons`}
        onClick={() => changeTheme("ligth")}
      />
      <MenuIcons
        name="BsSun"
        className={`${showIconTheme === "ligth" ? "" : "hidden"
          } bg-transparent w-10 h-10 mx-3 mt-1 text-xl text-cyan-600 text-opacity-95 transition-icons`}
        onClick={() => changeTheme("dark")}
      />
    </>
  );
};
