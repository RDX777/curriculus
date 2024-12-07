"use client";
import { useContext } from "react";
import { CandidateContext } from "@/contexts/candidate/candidateContext";

export const useCandidate = () => {
  const context = useContext(CandidateContext);
  return context;
};
