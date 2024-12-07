export type CurriculumType = {
  vacancie: string;
  name: string;
  indicatedBy: string;
  cpf: string;
  email: string;
  phone: string;
  cep: string;
  professionalSummary?: string;
  academicBackground?: string;
  professionalExperience?: string;
  additionalInformation?: string;
  file?: File;
  consent: boolean;
};
