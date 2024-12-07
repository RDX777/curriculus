"use client";
import { MenubarMenu, MenubarTrigger } from "@/components/ui/menubar";
import {
  Tooltip,
  TooltipContent,
  TooltipProvider,
  TooltipTrigger,
} from "@/components/ui/tooltip";
import { ThemeIcon } from "../icons/themeIcon";

export const Theme = () => {
  return (
    <MenubarMenu>
      <MenubarTrigger className="p-0">
        <TooltipProvider>
          <Tooltip>
            <TooltipTrigger>
              <ThemeIcon />
            </TooltipTrigger>
            <TooltipContent>
              <h1>Tema</h1>
            </TooltipContent>
          </Tooltip>
        </TooltipProvider>
      </MenubarTrigger>
    </MenubarMenu>
  );
};
