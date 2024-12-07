import { UUID } from "crypto";

export type NewVacancyType = {
  uuid?: UUID;
  title: string;
  shortDescription: string;
  longDescription: string;
  companyId: string;
  workModeId: string;
};
