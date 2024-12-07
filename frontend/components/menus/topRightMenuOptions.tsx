"use client";
import { Menubar } from "@/components/ui/menubar";
import { useEffect, useState } from "react";
import { Theme } from "@/components/optionsMenus/theme";
import { Notification } from "@/components/optionsMenus/notification";
import { Avatar } from "@/components/optionsMenus/avatar";
import { TopSearch } from "@/components/bars/topSearch";
import { CandidateProvider } from "@/contexts/candidate/candidateProvider";

export const TopRightMenuOptions = () => {
  const [isBrowser, setIsBrowser] = useState(false);

  useEffect(() => {
    setIsBrowser(true);
  }, []);

  if (!isBrowser) return null;

  return (
    <Menubar className="inline-flex border-none bg-transparent justify-end mt-2 sm:w-1/4 md:w-full lg:w-full">
      {/* busca rapida */}

      <CandidateProvider>
        <TopSearch />
      </CandidateProvider>

      {/* busca rapida */}
      <Notification />
      <Theme />
      <Avatar />
    </Menubar>
  );
};
