"use client";
import { z } from "zod";

export const ChangeCandidateStateFormDefaultValues = {
  recruitmentStageId: 0,
  startTime: "",
  endTime: "",
  observation: "",
};

export const ChangeCandidateStateFormSchema = z.object({
  recruitmentStageId: z
    .string({ message: "Selecione uma fase" })
    .regex(/^\d+$/, { message: "Selecione uma fase" })
    .transform((val) => parseInt(val, 10))
    .refine((val) => val > 0, {
      message: "Selecione uma fase",
  }),
  startTime: z
    .string()
    .transform((value) => (value === "" ? undefined : value))
    .refine(
      (value) => {
        if (!value) return true;
        const date = new Date(value);
        return !isNaN(date.getTime());
      },
      {
        message: "Data e hora inválidas",
      }
    )
    .optional(),
  endTime: z
    .string()
    .transform((value) => (value === "" ? undefined : value))
    .refine(
      (value) => {
        if (!value) return true;
        const date = new Date(value);
        return !isNaN(date.getTime());
      },
      {
        message: "Data e hora inválidas",
      }
    )
    .optional(),
  observation: z
    .string()
    .max(5000, {
      message: "A descrição não pode passar de 5000 caracteres",
    })
    .transform((value) => (value === "" ? undefined : value))
    .optional(),
});
