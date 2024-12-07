import { RecruitmentStageType } from "@/types/curriculus/recruitmentStages/recruitmentStageType";

export type ResumeStageHistoryType = {
  id: number;
  candidate_id: number;
  uuid_vacancy: string;
  recruitment_stage_id: number;
  resume_id: number;
  observation: string;
  login_user: string;
  name_user: string;
  start_in: Date;
  end_in: Date;
  created_at: Date;
  updated_at: Date;
  recruitment_stage: RecruitmentStageType;
};
