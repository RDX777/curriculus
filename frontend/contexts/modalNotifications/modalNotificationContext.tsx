"use client";
import { ModalTitleType } from "@/types/internal/modalTitleType";
import { createContext, ReactNode } from "react";

export type ModalNotificationType = {
  showModal: boolean;
  setShowModal: (show: boolean) => void;
  modalTitle: ModalTitleType | null;
  setModalTitle: (modalTitle: ModalTitleType | null) => void;
  componentToRender: ReactNode | null;
  handleShowModal: (component: ReactNode) => void;
  sizeModal: string | null;
  setSizeModal: (sizeModal: string) => void;
};

export const ModalNotificationContext = createContext<ModalNotificationType>({
  showModal: false,
  setShowModal: () => null,
  modalTitle: null,
  setModalTitle: () => null,
  componentToRender: null,
  handleShowModal: () => null,
  sizeModal: null,
  setSizeModal: () => null,
});
