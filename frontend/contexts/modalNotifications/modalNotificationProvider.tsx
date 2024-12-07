"use client";
import { ReactNode, useState } from "react";
import { ModalNotificationContext } from "@/contexts/modalNotifications";
import { ModalTitleType } from "@/types/internal/modalTitleType";

export const ModalNotificationProvider = ({
  children,
}: {
  children: React.ReactNode;
}) => {
  const [showModal, setShowModal] = useState<boolean>(false);
  const [modalTitle, setModalTitle] = useState<ModalTitleType | null>(null);
  const [componentToRender, setComponentToRender] = useState<ReactNode | null>(
    null
  );
  const [sizeModal, setSizeModal] = useState<string | null>(null);

  function handleShowModal(component: ReactNode) {

    setShowModal(true);
    setComponentToRender(component);
  }

  return (
    <ModalNotificationContext.Provider
      value={{
        showModal,
        setShowModal,
        modalTitle,
        setModalTitle,
        componentToRender,
        handleShowModal,
        sizeModal,
        setSizeModal,
      }}
    >
      {children}
    </ModalNotificationContext.Provider>
  );
};
