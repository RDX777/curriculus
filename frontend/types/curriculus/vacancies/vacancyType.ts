import { LocalsType } from "./localsType";
import { WorkModeType } from "./workModeType";

export type VacancyType = {
  uuid: string;
  title: string;
  short_description: string;
  long_description: string;
  remote_type: string;
  active: boolean;
  created_at: Date;
  updated_at: Date;
  company: LocalsType;
  work_mode: WorkModeType;
};
