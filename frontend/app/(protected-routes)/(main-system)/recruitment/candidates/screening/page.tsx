"use client";
import { ReactNode, useEffect } from "react";
import MenuIcons from "@/components/icons/menuIcons";
import { ShowCurriculum } from "@/components/curriculus/candidates/showCurriculum";
import { PreviousJobs } from "@/components/curriculus/candidates/previousJobs";
import { ChangeCandidateStateForm } from "@/components/curriculus/candidates/changeCandidateStateForm";
import { ScrollArea } from "@/components/ui/scroll-area";
import { ListCandidates } from "@/components/curriculus/candidates/listCandidates";
import { useCandidate } from "@/contexts/candidate";
import { YesNoAllEnum } from "@/types/internal/yesNoAllEnum";
import { HistoryCandidate } from "@/components/curriculus/candidates/historyCandidate";
import { useUserSession } from "@/contexts/userSession";
import { useSearchParams } from 'next/navigation';

export default function Screening(): ReactNode {
  const searchParams = useSearchParams();
  const { userSession, userCanMenu } = useUserSession();
  const { listRecruitmentStages, recruitmentStages } = useCandidate();

  const uuid = searchParams.get('uuid');

  useEffect(() => {
    if (userSession) {
      userCanMenu("Triagem")
    }
  }, [userSession, userCanMenu])

  useEffect(() => {
    if (!recruitmentStages) {
      listRecruitmentStages(YesNoAllEnum.yes, true, uuid);
    }
  }, [listRecruitmentStages, recruitmentStages, uuid]);

  return (
    <div className="flex flex-col">
      <div className="flex">
        <MenuIcons name="MdWork" className="mt-4 text-xl" />
        <h1 className="m-3 text-lg font-bold mb-4">Triagem de candidatos</h1>
      </div>
      <div className="flex flex-col lg:flex-row mb-3">
        <div className="lg:w-1/4 w-full">
          <ListCandidates />
        </div>
        <ScrollArea className="flex flex-col lg:w-3/4 w-full lg:ml-2 rounded-md border p-6 bg-gray-50 dark:bg-gray-800 dark:border-gray-600">
          <ShowCurriculum />
          <PreviousJobs />
          <HistoryCandidate />
          <ChangeCandidateStateForm />
        </ScrollArea>
      </div>

    </div>
  );
}
