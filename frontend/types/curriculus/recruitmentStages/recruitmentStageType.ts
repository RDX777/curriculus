import { ResumeType } from "@/types/curriculus/resumes/resumeType";
import { TypeRecruitmentStageType } from "@/types/curriculus/typeRecruitmentStages/typeRecruitmentStageType";

export type RecruitmentStageType = {
    id: number;
    type_recruitment_stage_id: number;
    description: string;
    allow_jump: number;
    active: boolean;
    created_at: Date;
    updated_at: Date;
    resumes?: ResumeType[];
    type_recruitment_stage?: TypeRecruitmentStageType
  };