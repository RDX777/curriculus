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
import {
  Select,
  SelectContent,
  SelectItem,
  SelectTrigger,
  SelectValue,
} from "@/components/ui/select";
import { Input } from "@/components/ui/input";
import {
  VacanyDefaultValues,
  VacanySchema,
} from "@/components/curriculus/vacancies/vacancySchema";
import { Button } from "@/components/ui/button";
import MenuIcons from "@/components/icons/menuIcons";
import { Textarea } from "@/components/ui/textarea";
import { useVacancy } from "@/contexts/vacancy";
import { useCallback, useEffect, useState } from "react";
import { ButtonActionType } from "@/types/curriculus/vacancies/buttonActionType";
import { NewVacancyType } from "@/types/curriculus/vacancies/newVacancyType";
import { UUID } from "crypto";
import { useUserSession } from "@/contexts/userSession";

export const ManageVacancies: React.FC = () => {
  const { userCanAction } = useUserSession();
  const {
    selectedVacancy,
    setSelectedVacancy,
    handleSaveVacancy,
    handleEditVacancy,
    handleDeactivateVacancy,
    handleDeleteVacancy,
    locals,
    workModes,
    setClearFormVacancy,
    clearFormVacancy
  } = useVacancy();

  const [saveButton, setSaveButton] = useState<ButtonActionType>();
  useEffect(() => {
    if (selectedVacancy) {
      setSaveButton({
        disabled: false,
        show: userCanAction("can-curriculus-vacancies-editVacancy"),
        icon: "FaRegEdit",
        text: "Editar",
      });
    } else {
      setSaveButton({
        disabled: false,
        show: userCanAction("can-curriculus-vacancies-storeVacancy"),
        icon: "FaRegSave",
        text: "Salvar",
      });
    }
  }, [selectedVacancy, userCanAction]);

  const [deactivateButton, setDeactivateButton] = useState<ButtonActionType>();
  useEffect(() => {
    if (!selectedVacancy) {
      setDeactivateButton({
        disabled: true,
        show: userCanAction("can-curriculus-vacancies-deactivateVacancy"),
        icon: "FaPlay",
        text: "Ativar"
      });
    } else if (selectedVacancy && selectedVacancy?.active) {
      setDeactivateButton({
        disabled: false,
        show: userCanAction("can-curriculus-vacancies-deactivateVacancy"),
        icon: "FaPause",
        text: "Desativar",
      });
    } else {
      setDeactivateButton({
        disabled: false,
        show: userCanAction("can-curriculus-vacancies-deactivateVacancy"),
        icon: "FaPlay",
        text: "Ativar",
      });
    }
  }, [selectedVacancy, userCanAction]);

  const [deleteButton, setDeleteButton] = useState<ButtonActionType>();
  useEffect(() => {
    if (selectedVacancy) {
      setDeleteButton({
        disabled: false,
        show: userCanAction("can-curriculus-vacancies-deleteVacancy"),
        icon: "MdDeleteOutline",
        text: "Deletar",
      });
    } else {
      setDeleteButton({
        disabled: true,
        show: userCanAction("can-curriculus-vacancies-deleteVacancy"),
        icon: "MdDeleteOutline",
        text: "Deletar",
      });
    }
  }, [selectedVacancy, userCanAction]);

  const form = useForm<z.infer<typeof VacanySchema>>({
    resolver: zodResolver(VacanySchema),
    defaultValues: VacanyDefaultValues,
    mode: "onChange",
  });

  useEffect(() => {
    if (selectedVacancy) {
      if (selectedVacancy?.active) {
        setDeactivateButton({
          disabled: false,
          show: userCanAction("can-curriculus-vacancies-deactivateVacancy"),
          icon: "FaPause",
          text: "Desativar",
        });
      } else {
        setDeactivateButton({
          disabled: false,
          show: userCanAction("can-curriculus-vacancies-deactivateVacancy"),
          icon: "FaPlay",
          text: "Ativar",
        });
      }
    }
  }, [selectedVacancy, setDeactivateButton, userCanAction]);

  useEffect(() => {
    if (selectedVacancy) {
      form.reset({
        title: selectedVacancy?.title,
        shortDescription: selectedVacancy?.short_description,
        longDescription: selectedVacancy?.long_description,
        companyId: selectedVacancy?.company.id.toString(),
        workModeId: selectedVacancy?.work_mode.id.toString(),
      });
    }
  }, [form, selectedVacancy]);

  const handleReset = useCallback(() => {
    form.reset(VacanyDefaultValues);
    setSelectedVacancy(null);
  }, [form, setSelectedVacancy]);

  useEffect(() => {
    if (clearFormVacancy) {
      handleReset()
      setClearFormVacancy(false);
    }
  }, [clearFormVacancy, handleReset, setClearFormVacancy])

  async function onSubmit(values: z.infer<typeof VacanySchema>) {
    if (!selectedVacancy) {
      handleSaveVacancy(values as NewVacancyType);
    } else {
      const edited = {
        ...values,
        uuid: selectedVacancy.uuid,
      };
      handleEditVacancy(edited as NewVacancyType);
    }
  }

  return (
    <div className="container mx-auto px-4 py-8">
      <div>
        <h1 className="text-lg font-bold">Cadastro para Vaga</h1>
      </div>
      <Form {...form}>
        <form onSubmit={form.handleSubmit(onSubmit)}>
          <div className="flex-row space-y-9">
            <div className="w-full pt-3">
              <FormField
                control={form.control}
                name="title"
                render={({ field }) => (
                  <FormItem>
                    <FormLabel className="text-lg">Titulo da Vaga</FormLabel>
                    <FormControl>
                      <Input
                        placeholder="Nome da oportunidade"
                        type="text"
                        autoComplete="off"
                        {...field}
                      />
                    </FormControl>
                    <FormDescription>
                      Informe o titulo da vaga (Obrigatório)
                    </FormDescription>
                    <FormMessage />
                  </FormItem>
                )}
              />
            </div>

            <div className="w-full pt-3">
              <FormField
                control={form.control}
                name="shortDescription"
                render={({ field }) => (
                  <FormItem>
                    <FormLabel className="text-lg">
                      Breve descrição da vaga
                    </FormLabel>
                    <FormControl>
                      <Input
                        placeholder="Descrição breve sobre a oportunidade"
                        type="text"
                        autoComplete="off"
                        {...field}
                      />
                    </FormControl>
                    <FormDescription>
                      Informe uma breve descrição sobre a vaga (Obrigatório)
                    </FormDescription>
                    <FormMessage />
                  </FormItem>
                )}
              />
            </div>

            <div className="w-full pt-3">
              <FormField
                control={form.control}
                name="longDescription"
                render={({ field }) => (
                  <FormItem>
                    <FormLabel className="text-lg">
                      Descrição detalhada sobre a vaga
                    </FormLabel>
                    <FormControl>
                      <Textarea
                        placeholder="Descrição detalhada sobre a oportunidade"
                        {...field}
                      />
                    </FormControl>
                    <FormDescription>
                      Descreva os requisitos, responsabilidades e qualificações
                      necessárias para a vaga, máximo 5000 caracteres
                      (Obrigatório)
                    </FormDescription>
                    <FormMessage />
                  </FormItem>
                )}
              />
            </div>

            <div className="w-full pt-5">
              <FormField
                control={form.control}
                name="companyId"
                render={({ field }) => (
                  <FormItem>
                    <FormLabel className="text-lg">Local de trabalho</FormLabel>
                    <Select
                      onValueChange={field.onChange}
                      value={field.value || ""}
                    >
                      <FormControl>
                        <SelectTrigger>
                          <SelectValue placeholder="Selecione um local" />
                        </SelectTrigger>
                      </FormControl>
                      <SelectContent>
                        {locals &&
                          locals.map((local) => (
                            <SelectItem
                              key={`local-${local.id.toString()}`}
                              value={local.id.toString()}
                            >
                              {local.name}
                            </SelectItem>
                          ))}
                      </SelectContent>
                    </Select>
                    <FormDescription>
                      Seleciona onde sera a vaga (Obrigatório)
                    </FormDescription>
                    <FormMessage />
                  </FormItem>
                )}
              />
            </div>

            <div className="w-full pt-5">
              <FormField
                control={form.control}
                name="workModeId"
                render={({ field }) => (
                  <FormItem>
                    <FormLabel className="text-lg">
                      Modalidade de trabalho
                    </FormLabel>
                    <Select
                      onValueChange={field.onChange}
                      value={field.value || ""}
                    >
                      <FormControl>
                        <SelectTrigger>
                          <SelectValue placeholder="Selecione uma modalidade de trabalho" />
                        </SelectTrigger>
                      </FormControl>
                      <SelectContent>
                        {workModes &&
                          workModes.map((workMode) => (
                            <SelectItem
                              key={`work-mode-${workMode.id.toString()}`}
                              value={workMode.id.toString()}
                            >
                              {workMode.name}
                            </SelectItem>
                          ))}
                      </SelectContent>
                    </Select>
                    <FormDescription>
                      Seleciona onde sera a vaga (Obrigatório)
                    </FormDescription>
                    <FormMessage />
                  </FormItem>
                )}
              />
            </div>

          </div>

          <div className="flex flex-col lg:flex-row justify-between pt-9 space-y-4 lg:space-y-0 lg:space-x-4">
            <Button
              type="button"
              variant="outline"
              className="text-2xl"
              onClick={() => handleReset()}
            >
              <MenuIcons
                name="GrPowerReset"
                className="text-3xl mr-1 text-gray-500"
              />
              Limpar
            </Button>
            {saveButton?.show && (
              <Button
                type="submit"
                variant="outline"
                className="text-2xl"
                disabled={saveButton?.disabled}
              >
                <MenuIcons
                  name={saveButton?.icon || ""}
                  className="text-3xl mr-1 text-green-700"
                />
                {saveButton?.text}
              </Button>)}
            {deactivateButton?.show && (<Button
              type="button"
              variant="outline"
              className="text-2xl"
              disabled={deactivateButton?.disabled}
              onClick={() => {
                handleDeactivateVacancy(selectedVacancy?.uuid as UUID);
                handleReset();
              }}
            >
              <MenuIcons
                name={deactivateButton?.icon || ""}
                className="text-3xl mr-1 text-blue-700"
              />
              {deactivateButton?.text}
            </Button>)}
            {deleteButton?.show && (<Button
              type="button"
              variant="outline"
              className="text-2xl"
              disabled={deleteButton?.disabled}
              onClick={() => {
                handleDeleteVacancy(selectedVacancy?.uuid as UUID);
                handleReset();
              }}
            >
              <MenuIcons
                name={deleteButton?.icon || ""}
                className="text-3xl mr-1 text-red-700"
              />
              {deleteButton?.text}
            </Button>)}
          </div>

        </form>
      </Form>
    </div>
  );
};
