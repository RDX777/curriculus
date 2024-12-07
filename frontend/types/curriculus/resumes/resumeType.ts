import { CandidateType } from "@/types/curriculus/candidates/candidateType"
import { VacancyType } from "@/types/curriculus/vacancies/vacancyType";
import { RecruitmentStageType } from "@/types/curriculus/recruitmentStages/recruitmentStageType";
export type ResumeType = {
  id: number;
  uuid: string;
  candidate_id: number;
  uuid_vacancy: string;
  last_recruitment_stage_id: number;
  indicated_by?: string;
  professional_summary?: string;
  academic_background?: string;
  professional_experience?: string;
  additional_information?: string;
  file?: string;
  consent: boolean;
  created_at: Date;
  updated_at: Date;
  candidate?: CandidateType;
  vacancy?: VacancyType;
  recruitment_stage?: RecruitmentStageType;
};