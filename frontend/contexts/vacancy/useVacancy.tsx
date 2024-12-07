"use client";
import { useContext } from "react";
import { VacancyContext } from "@/contexts/vacancy/vacancyContext";

export const useVacancy = () => {
  const context = useContext(VacancyContext);
  return context;
};
