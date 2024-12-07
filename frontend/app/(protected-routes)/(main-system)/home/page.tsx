"use client";
import { ReactNode } from "react";
import MenuIcons from "@/components/icons/menuIcons";
import { Label } from "@/components/ui/label";

export default function Home(): ReactNode {
  const version = process.env.NEXT_PUBLIC_VERSION;
  return (
    <>
      <div className="flex">
        <MenuIcons name="AiOutlineHome" className="mt-4 text-xl" />
        <h1 className="m-3 text-lg font-bold mb-4">Home:</h1>
      </div>
      <div className="flex justify-center m-2">
        <Label className="text-slate-400">
          {version && `Versão: ${version}`}
        </Label>
      </div>
    </>
  );
}
