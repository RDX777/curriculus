"use client";
import { ReactNode } from "react";
import { VacancyProvider } from "@/contexts/vacancy";

interface VacanciesLayoutProps {
  children: ReactNode;
}
export default function VacanciesLayout({ children }: VacanciesLayoutProps) {
  return (
    <>
      <VacancyProvider>{children}</VacancyProvider>
    </>
  );
}
