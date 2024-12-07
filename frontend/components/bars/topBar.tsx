"use client";
import { HomeMotionIcon } from "../icons/homeMotionIcon";
import { TopCenterMenuOptions } from "../menus/topCenterMenuOptions";
import { TopRightMenuOptions } from "../menus/topRightMenuOptions";

export const TopBar = () => {
  return (
    <nav className="flex items-center h-14 mr-2 ml-2">
      <div className="flex flex-col-3 my-3 w-full">
        <div className="inline-flex sm:w-1/12 w-1/6">
          <HomeMotionIcon />
        </div>
        <div className="overflow-x-auto overflow-y-hidden w-screen">
          <TopCenterMenuOptions />
        </div>
        <div className="overflow-x-auto overflow-y-hidden sm:w-1/12 md:w-1/6 lg:w-1/2">
          <TopRightMenuOptions />
        </div>
      </div>
    </nav>
  );
};
