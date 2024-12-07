"use client";
import { ReactNode, useState } from "react";
import { VacancyContext } from "@/contexts/vacancy";
import { useBackendRequest } from "@/contexts/backendRequest";
import { useViaCepRequest } from "@/contexts/viaCepRequest";
import { RawAxiosRequestHeaders } from "axios";
import { toast } from "@/components/ui/use-toast";
import { CurriculumType } from "@/types/curriculus/vacancies/curriculumType";
import { YesNoAllEnum } from "@/types/internal/yesNoAllEnum";
import { VacancyType } from "@/types/curriculus/vacancies/vacancyType";
import { useUserSession } from "@/contexts/userSession";
import { NewVacancyType } from "@/types/curriculus/vacancies/newVacancyType";
import { UUID } from "crypto";
import { LocalsType } from "@/types/curriculus/vacancies/localsType";
import { WorkModeType } from "@/types/curriculus/vacancies/workModeType";
import { redirect } from "next/navigation";

type VacancyProviderProps = {
  children: ReactNode;
};

export const VacancyProvider = ({ children }: VacancyProviderProps) => {
  const { userSession, userCanAction } = useUserSession();
  const {
    executeGet: executeGetBackend,
    executePost: executePostBackend,
    executePath: executePatchBackend,
  } = useBackendRequest();
  const { executeGet: executeGetViaCep } = useViaCepRequest();

  const [vacancies, setVacancies] = useState<VacancyType[] | null>(null);
  const listVacancies = async (active: YesNoAllEnum, load: boolean = true) => {

    const token = process.env.NEXT_PUBLIC_API_BACKEND_REGISTER;
    const headers: RawAxiosRequestHeaders = {
      "Content-Type": "Application/json",
      Accept: "Application/json",
      Authorization: `Bearer ${token}`,
    };
    const params = {
      url: `/curriculus/vacancies/list?active=${active}`,
      headers: headers,
      load: load,
    };

    const response = await executeGetBackend(params);
    if (response && response?.status === 200) {
      setVacancies(response?.data);
    } else {
      setVacancies(null);
    }

  };

  const [locals, setLocals] = useState<LocalsType[] | null>(null);
  const listLocals = async (active: YesNoAllEnum, load: boolean = true) => {
    if (userCanAction("can-curriculus-vacancies-listLocals")) {
      const token = process.env.NEXT_PUBLIC_API_BACKEND_REGISTER;
      const headers: RawAxiosRequestHeaders = {
        "Content-Type": "Application/json",
        Accept: "Application/json",
        Authorization: `Bearer ${token}`,
      };
      const params = {
        url: `/curriculus/vacancies/list-locals?active=${active}`,
        headers: headers,
        load: load,
      };
      const response = await executeGetBackend(params);
      if (response && response?.status === 200) {
        setLocals(response?.data);
      } else {
        setLocals(null);
      }
    } else {
      console.error("User can't run this function listLocals")
    }
  };

  const [workModes, setWorkModes] = useState<WorkModeType[] | null>(null);
  const listWorkModes = async (active: YesNoAllEnum, load: boolean = true) => {
    if (userCanAction("can-curriculus-vacancies-listWorkModes")) {
      const token = process.env.NEXT_PUBLIC_API_BACKEND_REGISTER;
      const headers: RawAxiosRequestHeaders = {
        "Content-Type": "Application/json",
        Accept: "Application/json",
        Authorization: `Bearer ${token}`,
      };
      const params = {
        url: `/curriculus/vacancies/list-work-modes?active=${active}`,
        headers: headers,
        load: load,
      };
      const response = await executeGetBackend(params);
      if (response && response?.status === 200) {
        setWorkModes(response?.data);
      } else {
        setWorkModes(null);
      }
    } else {
      console.error("User can't run this function listWorkModes")
    }
  };

  const [selectedVacancy, setSelectedVacancy] = useState<VacancyType | null>(
    null
  );

  const getCep = async (cep: string) => {
    if (cep && cep.length === 9) {
      const cleanCep = cep.replace("-", "").replace("_", "");
      const headers: RawAxiosRequestHeaders = {
        "Content-Type": "Application/json",
        Accept: "Application/json",
      };
      const params = {
        headers: headers,
        url: `/${cleanCep}/json`,
        load: false,
      };
      return await executeGetViaCep(params);
    }
  };

  const storeCandidate = async (candidate: CurriculumType) => {
    // if (userCanAction("can-curriculus-vacancies-storeCandidate")) {

    const token = process.env.NEXT_PUBLIC_API_BACKEND_REGISTER;
    if (candidate) {
      const headers: RawAxiosRequestHeaders = {
        "Content-Type": "multipart/form-data",
        Accept: "Application/json",
        Authorization: `Bearer ${token}`,
      };
      const params = {
        url: `/curriculus/candidates/store-candidate`,
        body: candidate,
        headers: headers,
        load: true,
      };
      const response = await executePostBackend(params);
      if (response?.status === 200) {
        toast({
          title: "✅ Registro realizado com sucesso",
          description: `Aguarde ate nossa equipe avaliar seu curriculo e mantermos contato!`,
        });
      } else {
        toast({
          title: "⚠️ Houve um erro ao salvar os dados",
          description: `Ocorreu um erro ao realizar o cadastro, por favor, tente mais tarde.`,
        });
      }
    }

    redirect("https://www.mdgintermediacoes.com.br");
    // } else {
    //   console.error("User can't run this function storeCandidate")
    // }
  };

  const handleSaveVacancy = async (vacancy: NewVacancyType) => {
    if (userCanAction("can-curriculus-vacancies-storeVacancy")) {
      if (vacancy) {
        const headers: RawAxiosRequestHeaders = {
          "Content-Type": "Application/json",
          Accept: "Application/json",
          Authorization: `Bearer ${userSession?.token}`,
        };
        const params = {
          url: `/curriculus/vacancies/store-vacancy`,
          body: vacancy,
          headers: headers,
          load: true,
        };
        const response = await executePostBackend(params);

        listVacancies(YesNoAllEnum.all, true);

        if (response?.status === 200) {
          toast({
            title: "✅ Registro realizado com sucesso",
            description: `A vaga esta ativa e funcional no site`,
          });
        } else {
          toast({
            title: "⚠️ Houve um erro ao salvar os dados",
            description: `Ocorreu um erro ao realizar o cadastro, por favor, tente mais tarde.`,
          });
        }
      }
    } else {
      console.error("User can't run this function handleSaveVacancy")
    }
  };

  const handleEditVacancy = async (vacancy: NewVacancyType) => {
    if (userCanAction("can-curriculus-vacancies-editVacancy")) {
      if (vacancy) {
        const headers: RawAxiosRequestHeaders = {
          "Content-Type": "Application/json",
          Accept: "Application/json",
          Authorization: `Bearer ${userSession?.token}`,
        };
        const params = {
          url: `/curriculus/vacancies/edit-vacancy`,
          body: vacancy,
          headers: headers,
          load: true,
        };
        const response = await executePatchBackend(params);

        listVacancies(YesNoAllEnum.all, true);

        if (response?.status === 200) {
          toast({
            title: "✅ Registro editado com sucesso",
            description: `A vaga foi editada com sucesso`,
          });
        } else {
          toast({
            title: "⚠️ Houve um erro ao salvar os dados",
            description: `Ocorreu um erro ao realizar o cadastro, por favor, tente mais tarde.`,
          });
        }
      }
    } else {
      console.error("User can't run this function handleEditVacancy")
    }
  };

  const handleDeactivateVacancy = async (uuid: UUID) => {
    if (userCanAction("can-curriculus-vacancies-deactivateVacancy")) {
      if (uuid) {
        const headers: RawAxiosRequestHeaders = {
          "Content-Type": "Application/json",
          Accept: "Application/json",
          Authorization: `Bearer ${userSession?.token}`,
        };
        const body = {
          uuid: uuid,
        };
        const params = {
          url: `/curriculus/vacancies/deactivate-vacancy`,
          body: body,
          headers: headers,
          load: false,
        };
        const response = await executePatchBackend(params);

        listVacancies(YesNoAllEnum.all, true);

        if (response?.status === 200) {
          toast({
            title: "✅ Registro desativado com sucesso",
            description: `Esta vaga esta desativada e sera removida do site da empresa`,
          });
        } else {
          toast({
            title: "⚠️ Houve um erro ao salvar os dados",
            description: `Ocorreu um erro ao realizar o cadastro, por favor, tente mais tarde.`,
          });
        }
      }
    } else {
      console.error("User can't run this function handleDeactivateVacancy")
    }
  };

  const handleDeleteVacancy = async (uuid: UUID) => {
    if (userCanAction("can-curriculus-vacancies-deleteVacancy")) {
      if (uuid) {
        const headers: RawAxiosRequestHeaders = {
          "Content-Type": "Application/json",
          Accept: "Application/json",
          Authorization: `Bearer ${userSession?.token}`,
        };
        const body = {
          uuid: uuid,
        };
        const params = {
          url: `/curriculus/vacancies/delete-vacancy`,
          body: body,
          headers: headers,
          load: true,
        };
        const response = await executePatchBackend(params);

        listVacancies(YesNoAllEnum.all, false);

        if (response?.status === 200) {
          toast({
            title: "✅ Registro deletado com sucesso",
            description: `Esta vaga esta vaga foi deletada`,
          });
        } else {
          toast({
            title: "⚠️ Houve um erro ao salvar os dados",
            description: `Ocorreu um erro ao realizar o cadastro, por favor, tente mais tarde.`,
          });
        }
      }
    } else {
      console.error("User can't run this function handleDeleteVacancy")
    }
  };

  const [clearFormVacancy, setClearFormVacancy] = useState<boolean>(false);

  return (
    <VacancyContext.Provider
      value={{
        vacancies,
        listLocals,
        locals,
        listWorkModes,
        workModes,
        selectedVacancy,
        setSelectedVacancy,
        listVacancies,
        getCep,
        storeCandidate,
        handleSaveVacancy,
        handleEditVacancy,
        handleDeactivateVacancy,
        handleDeleteVacancy,
        clearFormVacancy,
        setClearFormVacancy,
      }}
    >
      {children}
    </VacancyContext.Provider>
  );
};
