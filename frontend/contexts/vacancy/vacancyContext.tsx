"use client";
import { Dispatch, SetStateAction, createContext } from "react";
import { CurriculumType } from "@/types/curriculus/vacancies/curriculumType";
import { AxiosResponse } from "axios";
import { YesNoAllEnum } from "@/types/internal/yesNoAllEnum";
import { VacancyType } from "@/types/curriculus/vacancies/vacancyType";
import { NewVacancyType } from "@/types/curriculus/vacancies/newVacancyType";
import { UUID } from "crypto";
import { LocalsType } from "@/types/curriculus/vacancies/localsType";
import { WorkModeType } from "@/types/curriculus/vacancies/workModeType";

export type VacancyContextType = {
  vacancies: VacancyType[] | null;
  listLocals: (active: YesNoAllEnum, load: boolean) => Promise<void>;
  locals: LocalsType[] | null;
  listWorkModes: (active: YesNoAllEnum, load: boolean) => Promise<void>;
  workModes: WorkModeType[] | null;
  selectedVacancy: VacancyType | null;
  setSelectedVacancy: Dispatch<SetStateAction<VacancyType | null>>;
  listVacancies: (active: YesNoAllEnum, load: boolean) => Promise<void>;
  getCep: (cep: string) => Promise<AxiosResponse<any, any> | null | undefined>;
  storeCandidate: (candidate: CurriculumType) => Promise<void>;
  handleSaveVacancy: (vacancy: NewVacancyType) => Promise<void>;
  handleEditVacancy: (vacancy: NewVacancyType) => Promise<void>;
  handleDeactivateVacancy: (uuid: UUID) => Promise<void>;
  handleDeleteVacancy: (uuid: UUID) => Promise<void>;
  clearFormVacancy: boolean;
  setClearFormVacancy: Dispatch<boolean>;
};

export const VacancyContext = createContext<VacancyContextType>({
  vacancies: null,
  listLocals: () => Promise.resolve(),
  locals: null,
  listWorkModes: () => Promise.resolve(),
  workModes: null,
  selectedVacancy: null,
  setSelectedVacancy: () => null,
  listVacancies: () => Promise.resolve(),
  getCep: () => Promise.resolve(null),
  storeCandidate: () => Promise.resolve(),
  handleSaveVacancy: () => Promise.resolve(),
  handleEditVacancy: () => Promise.resolve(),
  handleDeactivateVacancy: () => Promise.resolve(),
  handleDeleteVacancy: () => Promise.resolve(),
  clearFormVacancy: false,
  setClearFormVacancy: () => Promise.resolve(),
});
