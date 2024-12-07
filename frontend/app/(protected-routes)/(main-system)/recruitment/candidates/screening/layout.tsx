"use client";
import { ReactNode } from "react";
import { CandidateProvider } from "@/contexts/candidate";

interface CandidatesLayoutProps {
  children: ReactNode;
}
export default function CandidatesLayout({ children }: CandidatesLayoutProps) {
  return (
    <>
      <CandidateProvider>{children}</CandidateProvider>
    </>
  );
}
