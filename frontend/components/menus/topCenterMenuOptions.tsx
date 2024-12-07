"use client";
import Link from "next/link";
import {
  Menubar,
  MenubarContent,
  MenubarItem,
  MenubarMenu,
  MenubarSub,
  MenubarSubContent,
  MenubarSubTrigger,
  MenubarTrigger,
} from "@/components/ui/menubar";
import {
  Tooltip,
  TooltipContent,
  TooltipProvider,
  TooltipTrigger,
} from "@/components/ui/tooltip";
import { useEffect, useState } from "react";
import { motion } from "framer-motion";
import { MenuInterface } from "@/types/internal/menusInterface";
import MenuIcons from "../icons/menuIcons";
import React from "react";
import { useUserSession } from "@/contexts/userSession";

export const TopCenterMenuOptions = () => {
  const { userSession } = useUserSession();

  const [isBrowser, setIsBrowser] = useState(false);
  const [menus, setMenus] = useState<Array<MenuInterface>>();

  useEffect(() => {
    setIsBrowser(true);
    setMenus(userSession?.role?.menus);
  }, [userSession]);

  if (!isBrowser) return null;

  return (
    <motion.div
      initial={{ scale: 0.8 }}
      animate={{ scale: true ? 1 : 0 }}
      transition={{ duration: 0.5 }}
    >
      <Menubar className="flex border-none bg-transparent justify-center mt-2 sm:w-1/4 md:w-full lg:w-full">
        {menus?.map(
          (menu) =>
            menu.level === 0 && (
              <MenubarMenu key={`menu-${menu.id}`}>
                <MenubarTrigger className="text-lg">
                  <TooltipProvider>
                    <Tooltip>
                      <TooltipTrigger>
                        <div className="flex transition-icons">
                          <MenuIcons name={menu.icon} className="mt-1 mr-1" />
                          <span className="hidden sm:inline md:inline">
                            {menu.name}
                          </span>
                        </div>
                      </TooltipTrigger>
                      <TooltipContent>
                        <h1>{menu.description}</h1>
                      </TooltipContent>
                    </Tooltip>
                  </TooltipProvider>
                </MenubarTrigger>

                <MenubarContent>
                  {menus?.map(
                    (submenu) =>
                      submenu.level === 1 &&
                      menu.id === submenu.belong_menu_id &&
                      submenu?.route?.link && (
                        <Link
                          key={`submenu-route-${submenu.id}`}
                          href={
                            submenu?.route?.link.toString()
                              ? submenu?.route?.link.toString()
                              : "/not-found"
                          }
                        >
                          <MenubarItem>{submenu?.name}</MenubarItem>
                        </Link>
                      )
                  )}

                  {menus?.map(
                    (submenu) =>
                      submenu.level === 1 &&
                      menu.id === submenu.belong_menu_id &&
                      !submenu?.route?.link && (
                        <React.Fragment key={`submenu-fragment-${submenu.id}`}>
                          <MenubarSub key={`submenu-${menu.id}`}>
                            <MenubarSubTrigger
                              key={`submenu-trigger-${submenu.id}`}
                            >
                              {submenu.name}
                            </MenubarSubTrigger>
                            <MenubarSubContent
                              key={`submenu-content-${submenu.id}`}
                            >
                              {menus?.map(
                                (lastMenu) =>
                                  lastMenu.level === 2 &&
                                  submenu.id === lastMenu.belong_menu_id && (
                                    <Link
                                      key={`last-menu-${lastMenu.id}`}
                                      href={
                                        lastMenu.route?.link.toString()
                                          ? lastMenu.route?.link.toString()
                                          : "/not-found"
                                      }
                                    >
                                      <MenubarItem>{lastMenu.name}</MenubarItem>
                                    </Link>
                                  )
                              )}
                            </MenubarSubContent>
                          </MenubarSub>
                        </React.Fragment>
                      )
                  )}
                </MenubarContent>
              </MenubarMenu>
            )
        )}
      </Menubar>
    </motion.div>
  );
};
