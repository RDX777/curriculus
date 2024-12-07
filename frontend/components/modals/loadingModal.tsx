"use client";
import { useSelector } from "react-redux";
import { RootState } from "@/app/(protected-routes)/(global-redux)/store";
import { LoadingIcon } from "../icons/loadingIcon";
import { useEffect } from "react";

const LoadingModal: React.FC = () => {
  const showLoading = useSelector(
    (state: RootState) => state.loadingModal.value
  );

  useEffect(() => {
    if (showLoading) {
      document.body.classList.add("overflow-hidden");
    } else {
      document.body.classList.remove("overflow-hidden");
    }
    // Limpeza para garantir que a classe seja removida ao desmontar o componente
    return () => {
      document.body.classList.remove("overflow-hidden");
    };
  }, [showLoading]);

  return (
    <div
      className={`fixed inset-0 overflow-y-auto${
        !showLoading ? " hidden z-50" : ""
      }`}
    >
      <div className="flex items-center justify-center min-h-screen">
        <div className="fixed inset-0 bg-black opacity-80"></div>
        <LoadingIcon />
      </div>
    </div>
  );
};

export default LoadingModal;
