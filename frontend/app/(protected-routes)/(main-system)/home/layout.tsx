"use client";
import { HomeProvider } from "@/contexts/home";
import { ReactNode } from "react";

interface HomeLayoutProps {
  children: ReactNode;
}
export default function HomeLayout({ children }: HomeLayoutProps) {
  return <HomeProvider>{children}</HomeProvider>;
}
