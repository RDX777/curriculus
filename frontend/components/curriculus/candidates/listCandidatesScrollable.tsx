"use client";
import { ScrollArea } from "@/components/ui/scroll-area";
import { Button } from "@/components/ui/button";
import { useCandidate } from "@/contexts/candidate";

export const ListCandidatesScrollable: React.FC = () => {
  const {
    listCandidates,
    setSelectedCandidate,
    getPreviousJobs,
    getResumeHistories,
  } = useCandidate();

  return (
    <ScrollArea>
      <div className="flex flex-col space-y-2 mt-4">
        {listCandidates &&
          listCandidates.resumes &&
          listCandidates?.resumes.map((listCandidate) => (
            <Button
              key={"candidates-" + listCandidate.candidate_id.toString()}
              variant="link"
              onClick={() => {
                getPreviousJobs(listCandidate.candidate_id);
                setSelectedCandidate(listCandidate);
                getResumeHistories(
                  listCandidate.candidate_id,
                  listCandidate.vacancy?.uuid,
                  listCandidate.id
                );
              }}
              className="flex text-lg hover:bg-blue-100 dark:hover:bg-blue-700 transition-colors duration-300 p-2 rounded text-gray-900 dark:text-gray-100"
            >
              {listCandidate?.candidate?.name}
            </Button>
          ))}
      </div>
    </ScrollArea>
  );
};
