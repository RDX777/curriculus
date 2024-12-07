"use client";
import { configureStore } from "@reduxjs/toolkit";
import themeSlice from "@/app/(protected-routes)/(global-redux)/features/themeSlice";
import loadingModalSlice from "@/app/(protected-routes)/(global-redux)/features/loadingModalSlice";

export const store = configureStore({
  reducer: {
    theme: themeSlice,
    loadingModal: loadingModalSlice,
  },
});

export type RootState = ReturnType<typeof store.getState>;
export type AppDispatch = typeof store.dispatch;
