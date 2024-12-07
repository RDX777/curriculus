"use client";
import { SettingsProvider } from "@/contexts/settings";
import { ReactNode } from "react";

interface SettingsLayoutProps {
  children: ReactNode;
}
export default function SettingsLayout({ children }: SettingsLayoutProps) {
  return (
    <>
      <SettingsProvider>{children}</SettingsProvider>
    </>
  );
}
