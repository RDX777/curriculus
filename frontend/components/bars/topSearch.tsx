"use client";
import { useState } from "react";
import MenuIcons from "@/components/icons/menuIcons";
import { useCandidate } from "@/contexts/candidate";
import { toast } from "@/components/ui/use-toast";

export const TopSearch = () => {
  const { search } = useCandidate();
  const [inputValue, setInputValue] = useState("");

  const handleChange = (event: React.ChangeEvent<HTMLInputElement>) => {
    setInputValue(event.target.value);
  };

  const handleKeyDown = (event: React.KeyboardEvent<HTMLInputElement>) => {
    if (event.key === "Enter") {
      handleButtonClick();
    }
  };

  const handleButtonClick = async () => {
    if (inputValue.length >= 5) {

      search(inputValue);

    } else {
      toast({
        title: "Busca invalida",
        description: `Digite algum criterio valido para realizar a busca!`,
      });
    }
  };

  return (
    <div className="flex p-1 border rounded-3xl border-cyan-700 w-full">
      <input
        className="bg-transparent ml-2 focus-visible:ring-transparent focus:outline-none w-full"
        placeholder="Busca rápida"
        onChange={handleChange}
        onKeyDown={handleKeyDown}
      />
      <button
        onClick={() => {
          handleButtonClick();
        }}
      >
        <MenuIcons name="CiSearch" className="text-2xl" />
      </button>
    </div>
  );
};
