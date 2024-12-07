"use client";

import { FilterCandidate } from "@/components/curriculus/candidates/filterCandidate";
import { Separator } from "@/components/ui/separator";
import { PulseText } from "@/components/icons/pulseText";
import { NoContent } from "@/components/curriculus/candidates/noContent";
import { ListCandidatesScrollable } from "@/components/curriculus/candidates/listCandidatesScrollable";
import { useCandidate } from "@/contexts/candidate";
import { useUserSession } from "@/contexts/userSession";

export const ListCandidates: React.FC = () => {
  const { userCanAction } = useUserSession();

  const { showLoading, listCandidates } = useCandidate();

  return (
    <div className="flex flex-col h-full w-full rounded-md border bg-gray-50 dark:bg-gray-800 dark:border-gray-600">
      {userCanAction("can-curriculus-recruitment-stages-list") && (
        <FilterCandidate />
      )}
      <Separator />
      {showLoading && <PulseText />}
      {!showLoading && !listCandidates && <NoContent />}
      {userCanAction(
        "can-curriculus-recruitment-stages-listCandidateByStage"
      ) &&
        listCandidates && <ListCandidatesScrollable />}
    </div>
  );
};
