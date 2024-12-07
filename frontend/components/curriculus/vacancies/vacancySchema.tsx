import { z } from "zod";

export const VacanyDefaultValues = {
  title: "",
  shortDescription: "",
  longDescription: "",
  companyId: "",
  workModeId: "",
};

export const VacanySchema = z.object({
  title: z
    .string({ message: "Informe o título da vaga" })
    .min(3, {
      message: "O título do precisa ter mais que 2 digitos!",
    })
    .max(255, {
      message: "O título precisa ser menor que 255 digitos!",
    })
    .regex(/^[A-Za-zÀ-ÖØ-öø-ÿ\s]+$/, {
      message:
        "O título deve conter apenas letras, espaços e caracteres acentuados",
    }),
  shortDescription: z
    .string({ message: "Informe a descrição da vaga" })
    .min(3, {
      message: "A descrição precisa ter mais que 2 digitos!",
    })
    .max(255, {
      message: "A descrição precisa ser menor que 255 digitos!",
    }),
  longDescription: z
    .string()
    .max(5000, {
      message: "A descrição não pode passar de 5000 caracteres",
    })
    .optional(),
  companyId: z
    .string({ message: "Selecione o modo de trabalho" })
    .regex(/^\d+$/, { message: "Selecione um local" })
    .refine((val) => parseInt(val) > 0, {
      message: "Selecione um local",
    }),
  workModeId: z
    .string({ message: "Selecione o modo de trabalho" })
    .regex(/^\d+$/, { message: "Selecione o modo de trabalho" })
    .refine((val) => parseInt(val) > 0, {
      message: "Selecione o modo de trabalho",
    }),
});
