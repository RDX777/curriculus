"use client";
import { motion } from "framer-motion";
import { useCandidate } from "@/contexts/candidate";
import { PulseText } from "@/components/icons/pulseText";
import { NoContent } from "@/components/curriculus/candidates/noContent";
import { useUniversalFunction } from "@/contexts/universalFunctions";
import { Label } from "@/components/ui/label";
import { useUserSession } from "@/contexts/userSession";

export const HistoryCandidate = () => {
  const { userCanAction } = useUserSession();
  const { datetimeToPtBr } = useUniversalFunction();
  const { resumeHistories, showLoadingResumeHistory } = useCandidate();

  return (
    <section className="w-full">
      {userCanAction("can-curriculus-candidates-getResumeStageHistory") &&
        (<motion.div
          initial={{ opacity: 0, y: 10 }}
          animate={{ opacity: 1, y: 0 }}
          className="mb-4 p-4 bg-white dark:bg-gray-700 shadow rounded"
        >
          <h2 className="text-xl font-semibold pb-4 text-gray-900 dark:text-gray-100">
            Histórico do currículo
          </h2>

          {showLoadingResumeHistory && <PulseText />}
          {!showLoadingResumeHistory && !resumeHistories && <NoContent />}

          {resumeHistories &&
            resumeHistories.map((resumeHistory) => (
              <motion.div
                key={`resume-history-` + resumeHistory.id}
                initial={{ opacity: 0, y: 10 }}
                animate={{ opacity: 1, y: 0 }}
                transition={{ delay: 0.1 * resumeHistory.id }}
                className="border-b border-gray-300 dark:border-gray-200 py-6 flex flex-col space-y-2"
              >
                <Label className="text-sky-700 dark:text-sky-300 italic text-[10px]">
                  {resumeHistory.name_user}
                </Label>
                <div className="flex justify-between items-center">
                  <p className="text-gray-700 dark:text-gray-200">
                    <span className="font-medium">
                      {resumeHistory.recruitment_stage.description}
                    </span>
                    {" - "}
                    <span>
                      {datetimeToPtBr(resumeHistory.updated_at.toString())}
                    </span>
                  </p>
                </div>
                {resumeHistory.start_in && (
                  <div className="text-sm text-gray-600 dark:text-gray-400 flex flex-col sm:flex-row sm:space-x-4">
                    <span>{`Início: ${datetimeToPtBr(
                      resumeHistory.start_in.toString()
                    )}`}</span>
                    <span>{`Fim: ${datetimeToPtBr(
                      resumeHistory.end_in.toString()
                    )}`}</span>
                  </div>
                )}
                {resumeHistory.observation && (
                  <p className="prose text-gray-600 dark:text-gray-300">
                    {resumeHistory.observation}
                  </p>
                )}
              </motion.div>
            ))}
        </motion.div>)}
    </section>
  );
};
