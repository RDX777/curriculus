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
import { Input } from "@/components/ui/input";
import {
  RegisterCandidateSchema,
  RegisterCandidateDefaultValues,
} from "@/components/vacancies/register/registerSchema";
import { Button } from "@/components/ui/button";
import MenuIcons from "@/components/icons/menuIcons";
import InputMasked from "@/components/masks/input";
import {
  Select,
  SelectContent,
  SelectItem,
  SelectTrigger,
  SelectValue,
} from "@/components/ui/select";
import { Textarea } from "@/components/ui/textarea";
import { Checkbox } from "@/components/ui/checkbox";
import { UUID } from "crypto";
import { useVacancy } from "@/contexts/vacancy";
import { useEffect, useState } from "react";
import { AddressType } from "@/types/viaCep/addressType";

import { YesNoAllEnum } from "@/types/internal/yesNoAllEnum";
import { CurriculumType } from "@/types/curriculus/vacancies/curriculumType";

export type RegisterFormType = {
  uuid: string | null;
};

export const RegisterForm: React.FC<RegisterFormType> = ({ uuid }) => {
  const { listVacancies, vacancies, getCep, storeCandidate } = useVacancy();

  useEffect(() => {
    if (!vacancies) {
      listVacancies(YesNoAllEnum.yes, true);
    }
  }, [listVacancies, vacancies]);

  const [viaCepAdress, setViaCepAdress] = useState<AddressType | null>(null);

  const getViaCep = async (cep: string) => {
    const response = await getCep(cep);
    if (response?.status === 200 && !response.data.erro) {
      setViaCepAdress(response.data as AddressType);
    } else {
      setViaCepAdress(null);
    }
  };

  const schema = {
    ...RegisterCandidateDefaultValues,
    vacancie: uuid || "",
  };

  const form = useForm<z.infer<typeof RegisterCandidateSchema>>({
    resolver: zodResolver(RegisterCandidateSchema),
    defaultValues: schema,
    mode: "onChange",
  });

  async function onSubmit(values: z.infer<typeof RegisterCandidateSchema>) {
    await storeCandidate(values as CurriculumType);
    form.reset();
  }

  return (
    <div className="container mx-auto px-4 py-8 border rounded-md shadow-lg">
      <div>
        <h1 className="text-lg font-bold">Cadastro para Vaga</h1>
      </div>
      <Form {...form}>
        <form onSubmit={form.handleSubmit(onSubmit)}>
          <div className="flex-row space-y-9">
            <div className="w-full pt-5">
              <FormField
                control={form.control}
                name="vacancie"
                render={({ field }) => (
                  <FormItem>
                    <FormLabel className="text-lg">Objetivo</FormLabel>
                    <Select
                      onValueChange={field.onChange}
                      defaultValue={field.value || ""}
                    >
                      <FormControl>
                        <SelectTrigger>
                          <SelectValue placeholder="Selecione uma vaga" />
                        </SelectTrigger>
                      </FormControl>
                      <SelectContent>
                        {vacancies &&
                          vacancies.map((vacancy) => (
                            <SelectItem key={vacancy.uuid} value={vacancy.uuid}>
                              {vacancy.title}
                            </SelectItem>
                          ))}
                      </SelectContent>
                    </Select>
                    <FormDescription>
                      Seleciona a vaga desejada (Obrigatório)
                    </FormDescription>
                    <FormMessage />
                  </FormItem>
                )}
              />
            </div>

            <div className="w-full pt-3">
              <FormField
                control={form.control}
                name="name"
                render={({ field }) => (
                  <FormItem>
                    <FormLabel className="text-lg">
                      Nome completo sem abreviações
                    </FormLabel>
                    <FormControl>
                      <Input
                        placeholder="Nome Completo"
                        type="text"
                        autoComplete="off"
                        {...field}
                      />
                    </FormControl>
                    <FormDescription>
                      Informe seu nome (Obrigatório)
                    </FormDescription>
                    <FormMessage />
                  </FormItem>
                )}
              />
            </div>

            <div className="w-full pt-3">
              <FormField
                control={form.control}
                name="indicatedBy"
                render={({ field }) => (
                  <FormItem>
                    <FormLabel className="text-lg">
                      Indicado por alguém?
                    </FormLabel>
                    <FormControl>
                      <Input
                        placeholder="Nome da pessoa que indicou a vaga"
                        type="text"
                        autoComplete="off"
                        {...field}
                      />
                    </FormControl>
                    <FormDescription>
                      Informe o nome de quem o indicou (Opcional)
                    </FormDescription>
                    <FormMessage />
                  </FormItem>
                )}
              />
            </div>

            <div className="w-full pt-3">
              <FormField
                control={form.control}
                name="cpf"
                render={({ field }) => (
                  <FormItem>
                    <FormLabel className="text-lg">CPF</FormLabel>
                    <FormControl>
                      <InputMasked
                        type="text"
                        mask="999.999.999-99"
                        placeholder="000.000.000-00"
                        autoComplete="off"
                        {...field}
                      />
                    </FormControl>
                    <FormDescription>
                      Informe seu CPF (Obrigatório)
                    </FormDescription>
                    <FormMessage />
                  </FormItem>
                )}
              />
            </div>

            <div className="w-full pt-3">
              <FormField
                control={form.control}
                name="email"
                render={({ field }) => (
                  <FormItem>
                    <FormLabel className="text-lg">E-mail</FormLabel>
                    <FormControl>
                      <Input
                        placeholder="email@asd.com"
                        type="email"
                        autoComplete="off"
                        {...field}
                      />
                    </FormControl>
                    <FormDescription>
                      Informe seu e-mail para contato (Obrigatório)
                    </FormDescription>
                    <FormMessage />
                  </FormItem>
                )}
              />
            </div>

            <div className="w-full pt-3">
              <FormField
                control={form.control}
                name="phone"
                render={({ field }) => (
                  <FormItem>
                    <FormLabel className="text-lg">Telefone</FormLabel>
                    <FormControl>
                      <InputMasked
                        type="tel"
                        mask="(99) 99999-9999"
                        placeholder="(99) 99999-9999"
                        autoComplete="off"
                        {...field}
                      />
                    </FormControl>
                    <FormDescription>
                      Informe seu telefone ou celular para contato (Obrigatório)
                    </FormDescription>
                    <FormMessage />
                  </FormItem>
                )}
              />
            </div>

            <div className="w-full pt-3">
              <FormField
                control={form.control}
                name="cep"
                render={({ field }) => (
                  <FormItem>
                    <FormLabel className="text-lg">CEP</FormLabel>
                    <FormControl>
                      <InputMasked
                        type="text"
                        mask="99999-999"
                        placeholder="99999-999"
                        autoComplete="off"
                        {...field}
                        onBlur={(event) => {
                          getViaCep(event.target.value);
                        }}
                      />
                    </FormControl>
                    <FormDescription>
                      {viaCepAdress
                        ? `Rua: ${viaCepAdress.logradouro} - ${viaCepAdress.bairro} - ${viaCepAdress.localidade} - ${viaCepAdress.estado}`
                        : "Informe seu CEP (Obrigatório)"}
                    </FormDescription>
                    <FormMessage />
                  </FormItem>
                )}
              />
            </div>

            <div className="w-full pt-3">
              <FormField
                control={form.control}
                name="professionalSummary"
                render={({ field }) => (
                  <FormItem>
                    <FormLabel className="text-lg">
                      Resumo Profissional
                    </FormLabel>
                    <FormControl>
                      <Textarea
                        placeholder='Exemplo: "Profissional com 5 anos de experiência em marketing digital, especializado em gestão de campanhas online e análise de dados. Habilidades em planejamento estratégico, liderança de equipe e otimização de processos. Focado em resultados, com histórico comprovado de aumento de engajamento e conversão de leads." Dica: Faça um breve resumo de suas principais experiências, habilidades e pontos fortes. Destaque suas qualificações mais relevantes e áreas de especialização.'
                        {...field}
                      />
                    </FormControl>
                    <FormDescription>
                      Infome um resumo profissional, suas qualidades, máximo
                      5000 caracteres (Opcional)
                    </FormDescription>
                    <FormMessage />
                  </FormItem>
                )}
              />
            </div>

            <div className="w-full pt-3">
              <FormField
                control={form.control}
                name="professionalExperience"
                render={({ field }) => (
                  <FormItem>
                    <FormLabel className="text-lg">
                      Experiência Profissional
                    </FormLabel>
                    <FormControl>
                      <Textarea
                        placeholder='Exemplo: "Analista de Marketing - Empresa XYZ, São Paulo, SP. Março de 2021 – Atual. Responsável por planejar e executar campanhas de marketing digital, gestão de redes sociais e análise de métricas. Conquistas: Aumento de 20% no engajamento nas redes sociais." Dica: Inclua o cargo, nome da empresa, localidade, período de atuação, principais responsabilidades e conquistas relevantes.'
                        {...field}
                      />
                    </FormControl>
                    <FormDescription>
                      Infome sua experiência profissional de preferência as 3
                      últimas, máximo 5000 caracteres (Opcional)
                    </FormDescription>
                    <FormMessage />
                  </FormItem>
                )}
              />
            </div>

            <div className="w-full pt-3">
              <FormField
                control={form.control}
                name="academicBackground"
                render={({ field }) => (
                  <FormItem>
                    <FormLabel className="text-lg">
                      Formação Academica
                    </FormLabel>
                    <FormControl>
                      <Textarea
                        placeholder='Exemplo: "Bacharelado em Administração de Empresas - Universidade Federal de São Paulo (UNIFESP), São Paulo, SP. Janeiro de 2020 – Dezembro de 2024." Dica: Inclua o nome do curso, instituição de ensino, cidade/estado e o período (início e término ou "atual" se estiver cursando).'
                        {...field}
                      />
                    </FormControl>
                    <FormDescription>
                      Infome sua fomação academica de preferência as 3 últimas,
                      máximo 5000 caracteres (Opcional)
                    </FormDescription>
                    <FormMessage />
                  </FormItem>
                )}
              />
            </div>

            <div className="w-full pt-3">
              <FormField
                control={form.control}
                name="additionalInformation"
                render={({ field }) => (
                  <FormItem>
                    <FormLabel className="text-lg">
                      Informações Adicionais
                    </FormLabel>
                    <FormControl>
                      <Textarea
                        placeholder='Exemplo: "Cursos de aperfeiçoamento: Gestão de Projetos (2023), Certificação em Excel Avançado (2022). Habilidades: Liderança, Trabalho em equipe, Comunicação eficaz. Disponibilidade para viagens." Dica: Inclua cursos relevantes, certificações, habilidades e outras informações que possam destacar seu perfil.'
                        {...field}
                      />
                    </FormControl>
                    <FormDescription>
                      Informe alguma informação adicional, máximo 5000
                      caracteres (Opcional)
                    </FormDescription>
                    <FormMessage />
                  </FormItem>
                )}
              />
            </div>

            <div className="w-full pt-3">
              <FormField
                control={form.control}
                name="file"
                render={({ field }) => (
                  <FormItem>
                    <FormLabel className="text-lg">
                      Currículo (PDF, DOC)
                    </FormLabel>
                    <FormControl>
                      <Input
                        type="file"
                        onChange={(e) => {
                          const files = e.target.files;
                          if (files && files.length > 0) {
                            field.onChange(files[0]);
                          } else {
                            field.onChange(undefined);
                          }
                        }}
                      />
                    </FormControl>
                    <FormDescription>
                      Anexe um currículo com o tamanho máximo de 2MB (Opcional)
                    </FormDescription>
                    <FormMessage />
                  </FormItem>
                )}
              />
            </div>

            <div className="w-full pt-3">
              <FormField
                control={form.control}
                name="consent"
                render={({ field }) => (
                  <FormItem className="flex flex-row items-start space-x-3 space-y-0 rounded-md border p-4">
                    <FormControl>
                      <Checkbox
                        checked={field.value}
                        onCheckedChange={field.onChange}
                      />
                    </FormControl>
                    <div className="space-y-1 leading-none">
                      <FormLabel className="text-lg">
                        Eu concordo com a coleta de dados e uso de cookies.
                      </FormLabel>
                      <FormDescription>
                        Nós respeitamos a sua privacidade. A coleta de dados é
                        realizada para melhorar a sua experiência em nosso site,
                        permitindo-nos oferecer conteúdo personalizado e
                        melhorar nossos serviços. Utilizamos cookies para
                        entender como você interage com nossas páginas,
                        facilitando navegação e oferecendo funcionalidades
                        relevantes. Ao concordar, você nos ajuda a entender suas
                        preferências, tornando nossa plataforma mais eficiente e
                        adaptada às suas necessidades. Para mais informações,
                        consulte nossa{" "}
                        <a
                          href="https://www.mdgintermediacoes.com.br/mapa"
                          rel="noopener noreferrer"
                          className="text-blue-600 underline"
                        >
                          Política de Privacidade
                        </a>
                        .
                      </FormDescription>
                    </div>
                  </FormItem>
                )}
              />
            </div>
          </div>
          <div className="flex justify-between pt-9">
            <Button
              type="button"
              variant="outline"
              className="text-2xl"
              onClick={() => form.reset()}
            >
              <MenuIcons
                name="GrPowerReset"
                className="text-3xl mr-1 text-green-700"
              />{" "}
              Limpar
            </Button>
            <Button type="submit" variant="outline" className="text-2xl">
              <MenuIcons
                name="FaRegSave"
                className="text-3xl mr-1 text-blue-700"
              />{" "}
              Salvar
            </Button>
          </div>
        </form>
      </Form>
    </div>
  );
};
