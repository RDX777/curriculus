import { z } from "zod";
import { cpf } from "cpf-cnpj-validator";

export const RegisterCandidateDefaultValues = {
  vacancie: "",
  indicatedBy: "",
  name: "",
  cpf: "",
  email: "",
  phone: "",
  cep: "",
  professionalSummary: "",
  academicBackground: "",
  professionalExperience: "",
  additionalInformation: "",
  file: undefined,
  consent: false,
};

export const RegisterCandidateSchema = z.object({
  vacancie: z
    .string({ message: "Selecione uma vaga" })
    .min(1, { message: "Selecione uma vaga" }),
  name: z
    .string({ message: "Informe seu nome completo" })
    .min(3, {
      message: "O nome do precisa ser maior que 2 digitos!",
    })
    .max(255, {
      message: "O nome precisa ser menor que 255 digitos!",
    })
    .regex(/^[A-Za-zÀ-ÖØ-öø-ÿ\s]+$/, {
      message:
        "O nome deve conter apenas letras, espaços e caracteres acentuados",
    })
    .transform((str) => str.toUpperCase()),
  indicatedBy: z
    .string({ message: "Informe o nome da pessoa que o indicou a esta vaga" })
    .max(255, {
      message: "O nome não pode passar de 255 caracteres",
    })
    .transform((str) => str?.toUpperCase())
    .optional(),
  cpf: z
    .string()
    .min(11, { message: "O cpf precisa de 11 digitos" })
    .refine((data) => cpf.isValid(data), { message: "CPF inválido" })
    .transform((cpf) => cpf.replace(/[.-]/g, "")),
  email: z
    .string({
      required_error: "Infome um e-mail",
    })
    .email({ message: "Por favor, insira um e-mail válido." }),
  phone: z
    .string({ message: "Informe um telefone" })
    .regex(/^\(?\d{2}\)?\s?\d{4,5}-?\d{4}$/, {
      message: "Número de telefone inválido.",
    })
    .transform((phone) => phone.replace(/[-() _]/g, "")),
  cep: z
    .string()
    .min(1, { message: "O CEP é obrigatório." })
    .regex(/^\d{5}-\d{3}$/, {
      message: "CEP inválido. Use o formato XXXXX-XXX.",
    })
    .transform((cep) => cep.replace(/[-]/g, "")),
  professionalSummary: z
    .string()
    .max(5000, {
      message: "Resumo Profissional não pode passar de 5000 caracteres",
    })
    .optional(),
  professionalExperience: z
    .string()
    .max(5000, {
      message: "Experiência Profissional não pode passar de 5000 caracteres",
    })
    .optional(),
  academicBackground: z
    .string()
    .max(5000, {
      message: "Formação academica não pode passar de 5000 caracteres",
    })
    .optional(),
  additionalInformation: z
    .string()
    .max(5000, {
      message: "As informações adicionais não pode passar de 5000 caracteres",
    })
    .optional(),
  file: z
    .instanceof(File)
    .optional()
    .refine((file) => !file || file.size <= 2 * 1024 * 1024, {
      message: "O arquivo deve ter no máximo 2MB",
    })
    .refine(
      (file) =>
        !file ||
        [
          "application/msword",
          "application/vnd.openxmlformats-officedocument.wordprocessingml.document",
          "application/pdf",
        ].includes(file.type),
      {
        message: "Apenas arquivos DOC, DOCX e PDF são permitidos",
      }
    ),

  consent: z.boolean().refine((val) => val === true, {
    message: "Você deve aceitar os termos!",
  }),
});
