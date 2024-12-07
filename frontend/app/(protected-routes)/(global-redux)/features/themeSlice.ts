"use client";
import { PayloadAction, createSlice } from "@reduxjs/toolkit";
import { getCookie } from "@/utils/functions_tools/cookies";

export function getThemeFromLocalStorage(): string {
  return getCookie("theme") ?? "ligth";
}

export interface ThemeState {
  value: string;
}

const initialState: ThemeState = {
  value: getThemeFromLocalStorage(),
};

export const themeSlice = createSlice({
  name: "theme",
  initialState,
  reducers: {
    change: (state, action: PayloadAction<string>) => {
      state.value = action.payload;
    },
  },
});

export const { change } = themeSlice.actions;
export default themeSlice.reducer;
