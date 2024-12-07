import { ResumeType } from "@/types/curriculus/resumes/resumeType";
export type CandidateType = {
    id: number;
    uuid: string;
    name: string;
    cpf: string;
    email: string;
    phone: string;
    cep: string;
    created_at: Date
    updated_at: Date
    resumes?: ResumeType[];
  };