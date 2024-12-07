import { RootState } from "@/app/(protected-routes)/(global-redux)/store";
import { useEffect, useState } from "react";
import { useSelector } from "react-redux";

export const LoadingIcon = () => {
  const showLoading = useSelector(
    (state: RootState) => state.loadingModal.value
  );
  const [gifToShow, setGifToShow] = useState("");

  function getGif(): string {
    const randomIndex = Math.floor(Math.random() * 15);
    return `/gifs/${randomIndex}.gif`;
  }

  useEffect(() => {
    if (showLoading) {
      setGifToShow(getGif());
    } else {
      setGifToShow("");
    }
  }, [showLoading]);

  return (
    // <div className="flex-row z-50">
    //   <h1 className="text-center mb-6 text-xl">Carregando...</h1>
    //   <img src={gifToShow} className="z-50" />
    // </div>
    <div className="h-12 w-12 border-4 border-l-gray-200 border-r-gray-200 border-b-gray-200 border-t-gray-500 animate-spin ease-linear rounded-full"></div>
  );
};
