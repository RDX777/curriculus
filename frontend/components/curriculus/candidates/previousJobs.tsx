"use client";
import { Badge } from "@/components/ui/badge";
import {
  Sheet,
  SheetContent,
  SheetHeader,
  SheetTitle,
  SheetDescription,
} from "@/components/ui/sheet";
import { ScrollArea } from "@/components/ui/scroll-area";
import { useCandidate } from "@/contexts/candidate";
import { useUniversalFunction } from "@/contexts/universalFunctions";
import clsx from "clsx";
import { PulseText } from "@/components/icons/pulseText";

export function PreviousJobs() {
  const { datetimeToPtBr } = useUniversalFunction();
  const {
    showPreviousJobs,
    setShowPreviousJobs,
    previousJobs,
    showLoadingPreviousJobs,
  } = useCandidate();

  function getClassNamer(statusVacancy: string | null | undefined) {
    if (statusVacancy) {
      return clsx(
        statusVacancy === "Triagem" &&
          "bg-yellow-100 text-yellow-700 dark:bg-yellow-800 dark:text-yellow-200",
        statusVacancy === "Em Andamento" &&
          "bg-blue-100 text-blue-700 dark:bg-blue-800 dark:text-blue-200",
        statusVacancy === "Aprovado" &&
          "bg-green-100 text-green-700 dark:bg-green-800 dark:text-green-200",
        statusVacancy === "Reprovado" &&
          "bg-red-100 text-red-700 dark:bg-red-800 dark:text-red-200",
        statusVacancy === "Recusou-se" &&
          "bg-gray-100 text-gray-700 dark:bg-gray-800 dark:text-gray-200"
      );
    }
  }

  return (
    <Sheet open={showPreviousJobs} onOpenChange={setShowPreviousJobs}>
      <SheetContent className="w-1/2">
        <SheetHeader>
          <SheetTitle>Vagas anteriores</SheetTitle>
          <SheetDescription>
            Essa é a lista de vagas que este canditado se cadastrou
          </SheetDescription>
        </SheetHeader>

        {showLoadingPreviousJobs && <PulseText />}
        <ScrollArea className="w-full h-full">
          {previousJobs &&
            previousJobs?.resumes?.map((job, index) => (
              <div
                key={index}
                className="p-4 mt-4 bg-white dark:bg-gray-700 rounded-md shadow"
              >
                <div className="flex justify-between items-center mb-2">
                  <h3 className="text-xl font-semibold text-gray-900 dark:text-gray-100">
                    {job?.vacancy?.title}
                  </h3>
                  <Badge
                    variant="outline"
                    className={getClassNamer(
                      job?.recruitment_stage?.type_recruitment_stage
                        ?.description
                    )}
                  >
                    {
                      job?.recruitment_stage?.type_recruitment_stage
                        ?.description
                    }
                  </Badge>
                </div>
                <p className="text-sm text-gray-600 dark:text-gray-100">
                  Data de Participação:{" "}
                  {datetimeToPtBr(job.created_at.toString())}
                </p>
                <p className="text-sm text-gray-600 dark:text-gray-100 mt-2">
                  {job?.vacancy?.short_description}
                </p>
              </div>
            ))}
        </ScrollArea>
      </SheetContent>
    </Sheet>
  );
}
