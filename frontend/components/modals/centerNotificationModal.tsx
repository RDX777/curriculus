"use client";

import {
  Dialog,
  DialogContent,
  DialogDescription,
  DialogHeader,
  DialogTitle,
} from "@/components/ui/dialog";
import { useModalNotification } from "@/contexts/modalNotifications";
import { useEffect, useState } from "react";
import clsx from "clsx";

export const CenterNotificationModal: React.FC = () => {
  const {
    showModal,
    setShowModal,
    componentToRender,
    modalTitle,
    sizeModal,
  } = useModalNotification();

  const [localSizeModal, setLocalSizeModal] = useState("max-w-screen-sm sm:max-w-screen-lg");

  useEffect(() => {
    if (sizeModal) {
      setLocalSizeModal(sizeModal);
    }
  }, [sizeModal]);

  return (

    <Dialog open={showModal} onOpenChange={setShowModal}>
      <DialogContent className={clsx(localSizeModal)}>
        <DialogHeader>
          <DialogTitle>{modalTitle?.title}</DialogTitle>
          <DialogDescription>{modalTitle?.description}</DialogDescription>
        </DialogHeader>
        {componentToRender}
      </DialogContent>
    </Dialog>
  );
};
