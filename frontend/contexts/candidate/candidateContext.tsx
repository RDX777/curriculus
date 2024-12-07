"use client";
import { YesNoAllEnum } from "@/types/internal/yesNoAllEnum";
import { createContext, Dispatch, SetStateAction } from "react";
import { RecruitmentStagesListType } from "@/types/curriculus/recruitmentStages/recruitmentStagesListType";
import { RecruitmentStageType } from "@/types/curriculus/recruitmentStages/recruitmentStageType";
import { ResumeType } from "@/types/curriculus/resumes/resumeType";
import { CandidateType } from "@/types/curriculus/candidates/candidateType";
import { ResumeStageHistoryType } from "@/types/curriculus/resumeStageHistory/resumeStageHistoryType";
import { ResumeStageHistoriesSaveType } from "@/types/curriculus/resumeStageHistory/resumeStageHistoriesSaveType";

export type CandidateContextType = {
  showPreviousJobs: boolean;
  setShowPreviousJobs: Dispatch<SetStateAction<boolean>>;
  selectedFilterCandidate: number | null | undefined;
  selectedRecruitmentStage: number | null;
  recruitmentStages: RecruitmentStagesListType[] | null;
  listRecruitmentStages: (active: YesNoAllEnum, load: boolean, uuid: string | null) => Promise<void>;
  listCandidates: RecruitmentStageType | null;
  getListCandidates: (stageId: number) => Promise<void>;
  showLoading: boolean;
  selectedCandidate: ResumeType | null;
  setSelectedCandidate: Dispatch<SetStateAction<ResumeType | null>>;
  previousJobs: CandidateType | null;
  getPreviousJobs: (candidateId: number) => Promise<void>;
  showLoadingPreviousJobs: boolean;
  resumeHistories: ResumeStageHistoryType[] | null;
  getResumeHistories: (
    candidateId: number | undefined | null,
    vacancyUuid: string | undefined | null,
    resumeId: number | undefined | null
  ) => Promise<void>;
  showLoadingResumeHistory: boolean;
  saveResumeStageHistories: (resumeHistory: ResumeStageHistoriesSaveType) => Promise<void>;
  downloadResume: (fileName: string | undefined) => Promise<void>;
  search: (item: string) => Promise<void>;
  searchByUuid: (uuid: string | null) => Promise<void>;
};

export const CandidateContext = createContext<CandidateContextType>({
  showPreviousJobs: false,
  setShowPreviousJobs: () => null,
  selectedFilterCandidate: null,
  selectedRecruitmentStage: null,
  recruitmentStages: null,
  listRecruitmentStages: () => Promise.resolve(),
  listCandidates: null,
  getListCandidates: () => Promise.resolve(),
  showLoading: false,
  selectedCandidate: null,
  setSelectedCandidate: () => null,
  previousJobs: null,
  getPreviousJobs: () => Promise.resolve(),
  showLoadingPreviousJobs: false,
  resumeHistories: null,
  getResumeHistories: () => Promise.resolve(),
  showLoadingResumeHistory: false,
  saveResumeStageHistories: () => Promise.resolve(),
  downloadResume: () => Promise.resolve(),
  search: () => Promise.resolve(),
  searchByUuid: () => Promise.resolve(),
});
