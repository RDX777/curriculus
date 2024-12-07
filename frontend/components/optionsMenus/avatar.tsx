"use client";
import {
  MenubarMenu,
  MenubarTrigger,
  MenubarContent,
  MenubarItem,
} from "@/components/ui/menubar";
import {
  Tooltip,
  TooltipContent,
  TooltipProvider,
  TooltipTrigger,
} from "@/components/ui/tooltip";

import { AvatarIcon } from "../icons/avatarIcon";
import { useUserSession } from "@/contexts/userSession";

export const Avatar = () => {
  const { handleLogout } = useUserSession();

  return (
    <MenubarMenu>
      <MenubarTrigger className="p-0">
        <TooltipProvider>
          <Tooltip>
            <TooltipTrigger>
              <AvatarIcon />
            </TooltipTrigger>
            <TooltipContent>
              <h1>Perfil</h1>
            </TooltipContent>
          </Tooltip>
        </TooltipProvider>
      </MenubarTrigger>
      <MenubarContent>
        <MenubarItem inset disabled>
          <button className="w-full">Perfil</button>
        </MenubarItem>
        <MenubarItem inset>
          <button className="w-full" onClick={() => handleLogout()}>
            Sair
          </button>
        </MenubarItem>
      </MenubarContent>
    </MenubarMenu>
  );
};
