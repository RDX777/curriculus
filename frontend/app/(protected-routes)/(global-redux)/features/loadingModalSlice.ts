"use client";
import { PayloadAction, createSlice } from "@reduxjs/toolkit";

export interface LoadingState {
  value: boolean;
}

const initialState: LoadingState = {
  value: false,
};

export const loadingModalSlice = createSlice({
  name: "loadingModal",
  initialState,
  reducers: {
    change: (state, action: PayloadAction<boolean>) => {
      state.value = action.payload;
    },
  },
});

export const { change } = loadingModalSlice.actions;
export default loadingModalSlice.reducer;
