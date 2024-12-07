"use client";
import { zodResolver } from "@hookform/resolvers/zod";
import { useForm } from "react-hook-form";
import { z } from "zod";
import {
  Form,
  FormControl,
  FormDescription,
  FormField,
  FormItem,
  FormLabel,
  FormMessage,
} from "@/components/ui/form";
import MenuIcons from "@/components/icons/menuIcons";
import { Button } from "@/components/ui/button";
import {
  ChangeCandidateStateFormDefaultValues,
  ChangeCandidateStateFormSchema,
} from "@/components/curriculus/candidates/changeCandidateStateFormSchema";
import {
  Select,
  SelectContent,
  SelectItem,
  SelectTrigger,
  SelectValue,
} from "@/components/ui/select";
import { Textarea } from "@/components/ui/textarea";
import { useCandidate } from "@/contexts/candidate";
import { Input } from "@/components/ui/input";
import { NoContent } from "@/components/curriculus/candidates/noContent";
import { ResumeStageHistoriesSaveType } from "@/types/curriculus/resumeStageHistory/resumeStageHistoriesSaveType";
import { useUserSession } from "@/contexts/userSession";

export const ChangeCandidateStateForm: React.FC = () => {
  const { userCanAction } = useUserSession();
  const { recruitmentStages, selectedCandidate, saveResumeStageHistories, selectedRecruitmentStage } = useCandidate();
  const form = useForm<z.infer<typeof ChangeCandidateStateFormSchema>>({
    resolver: zodResolver(ChangeCandidateStateFormSchema),
    defaultValues: ChangeCandidateStateFormDefaultValues,
    mode: "onChange",
  });

  async function onSubmit(
    values: z.infer<typeof ChangeCandidateStateFormSchema>
  ) {
    const params = {
      recruitmentStageId: values.recruitmentStageId,
      observation: values.observation ? values.observation : null,
      startTime: values.startTime ? values.startTime : null,
      endTime: values.endTime ? values.endTime : null,
      candidateId: selectedCandidate?.candidate_id,
      vacancyUuid: selectedCandidate?.vacancy?.uuid,
      resumeId: selectedCandidate?.id,
    }
    saveResumeStageHistories(params as ResumeStageHistoriesSaveType);
    form.reset();
  }
  return (
    <section className="m-1 mt-3">
      {userCanAction("can-curriculus-resume-stage-histories-save") && (
        <div>
          <h1 className="text-2xl font-bold text-center mt-4 mb-4 text-gray-900 dark:text-gray-100">
            Atualizar Etapa do Processo
          </h1>
          {!selectedCandidate && <NoContent />}
          {selectedCandidate && (
            <Form {...form}>
              <form onSubmit={form.handleSubmit(onSubmit)}>
                <div className="flex-row w-full space-y-9">
                  <div className="w-full pt-5">
                    <FormField
                      control={form.control}
                      name="recruitmentStageId"
                      render={({ field }) => (
                        <FormItem>
                          <FormLabel className="text-lg">Fase</FormLabel>
                          <Select
                            onValueChange={field.onChange}
                            defaultValue={field.value.toString() || ""}
                          >
                            <FormControl>
                              <SelectTrigger>
                                <SelectValue placeholder="Selecione uma fase" />
                              </SelectTrigger>
                            </FormControl>
                            <SelectContent>
                              {recruitmentStages &&
                                recruitmentStages.map((recruitmentStage) => (
                                  selectedRecruitmentStage !== recruitmentStage.id &&
                                  <SelectItem
                                    key={
                                      "recruitment-stage-" +
                                      recruitmentStage.id.toString()
                                    }
                                    value={recruitmentStage.id.toString()}
                                  >
                                    {recruitmentStage.description}
                                  </SelectItem>
                                ))}
                            </SelectContent>
                          </Select>
                          <FormDescription>
                            Seleciona a fase para alterar o status do candidato
                            (Obrigatório)
                          </FormDescription>
                          <FormMessage />
                        </FormItem>
                      )}
                    />
                  </div>

                  <div className="flex flex-row">
                    <div className="w-1/2 mr-3">
                      <FormField
                        control={form.control}
                        name="startTime"
                        render={({ field }) => (
                          <FormItem>
                            <FormLabel className="text-lg">
                              Data e hora de inicio
                            </FormLabel>
                            <FormControl>
                              <Input type="datetime-local" {...field} />
                            </FormControl>
                            <FormDescription>
                              Informe a data e a hora em que se inciara (Opcional)
                            </FormDescription>
                            <FormMessage />
                          </FormItem>
                        )}
                      />
                    </div>

                    <div className="w-1/2 ml-3">
                      <FormField
                        control={form.control}
                        name="endTime"
                        render={({ field }) => (
                          <FormItem>
                            <FormLabel className="text-lg">
                              Data e hora de fim
                            </FormLabel>
                            <FormControl>
                              <Input type="datetime-local" {...field} />
                            </FormControl>
                            <FormDescription>
                              Informe a data e a hora em que se finalizara
                              (Opcional)
                            </FormDescription>
                            <FormMessage />
                          </FormItem>
                        )}
                      />
                    </div>
                  </div>

                  <div className="w-full">
                    <FormField
                      control={form.control}
                      name="observation"
                      render={({ field }) => (
                        <FormItem>
                          <FormLabel className="text-lg">
                            Informe alguma observação sobre o currículo
                          </FormLabel>
                          <FormControl>
                            <Textarea {...field} />
                          </FormControl>
                          <FormDescription>
                            Descreva alguma observação caso tenha (Opcional)
                          </FormDescription>
                          <FormMessage />
                        </FormItem>
                      )}
                    />
                  </div>

                  <div className="flex space-x-4 justify-center">
                    <Button type="submit" variant="outline" className="text-2xl">
                      <MenuIcons
                        name="FaRegSave"
                        className="text-3xl mr-1 text-blue-700"
                      />{" "}
                      Salvar
                    </Button>
                  </div>
                </div>
              </form>
            </Form>
          )}</div>)}
    </section>
  );
};
