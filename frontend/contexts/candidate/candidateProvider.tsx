"use client";
import { ReactNode, useCallback, useState } from "react";
import { useUserSession } from "@/contexts/userSession";
import { CandidateContext } from "@/contexts/candidate/candidateContext";
import { useBackendRequest } from "@/contexts/backendRequest";
import { YesNoAllEnum } from "@/types/internal/yesNoAllEnum";
import { RawAxiosRequestHeaders } from "axios";
import { RecruitmentStagesListType } from "@/types/curriculus/recruitmentStages/recruitmentStagesListType";
import { RecruitmentStageType } from "@/types/curriculus/recruitmentStages/recruitmentStageType";
import { ResumeType } from "@/types/curriculus/resumes/resumeType";
import { CandidateType } from "@/types/curriculus/candidates/candidateType";
import { useUniversalFunction } from "@/contexts/universalFunctions";
import { ResumeStageHistoryType } from "@/types/curriculus/resumeStageHistory/resumeStageHistoryType";
import { ResumeStageHistoriesSaveType } from "@/types/curriculus/resumeStageHistory/resumeStageHistoriesSaveType";
import { toast } from "@/components/ui/use-toast";
import { BackendRequestResponseTypeEnum } from "@/types/internal/backendRequestResponseTypeEnum";
import downloader from "@/utils/functions_tools/downloader";
import { useModalNotification } from "@/contexts/modalNotifications";
import { SearchCandidate } from "@/components/curriculus/candidates/searchCandidate"


type CandidateProviderProps = {
  children: ReactNode;
};

export const CandidateProvider = ({ children }: CandidateProviderProps) => {
  const { userSession, userCanAction } = useUserSession();
  const { paramsForNavigation } = useUniversalFunction();
  const [showPreviousJobs, setShowPreviousJobs] = useState<boolean>(false);

  const {
    executeGet: executeGetBackend,
    executePost: executePostBackend,
  } = useBackendRequest();

  const { setModalTitle, handleShowModal, setSizeModal } =
    useModalNotification();

  const [selectedFilterCandidate, setSelectedFilterCandidate] = useState<number | null | undefined>(null);
  const [selectedRecruitmentStage, setSelectedRecruitmentStage] = useState<number | null>(null);
  const [recruitmentStages, setRecruitmentStages] = useState<
    RecruitmentStagesListType[] | null
  >(null);
  const listRecruitmentStages = async (
    active: YesNoAllEnum,
    load: boolean = true,
    uuid: string | null = null,
  ) => {
    if (userCanAction("can-curriculus-recruitment-stages-list")) {
      const token = userSession?.token;
      const headers: RawAxiosRequestHeaders = {
        "Content-Type": "Application/json",
        Accept: "Application/json",
        Authorization: `Bearer ${token}`,
      };
      const params = {
        url: `/curriculus/recruitment-stages/list?active=${active}`,
        headers: headers,
        load: load,
      };
      const response = await executeGetBackend(params);
      if (response && response?.status === 200) {
        setRecruitmentStages(response?.data);
        if (uuid) {
          const resume: ResumeType = await searchByUuid(uuid);
          if (resume.recruitment_stage) {
            setSelectedFilterCandidate(resume.recruitment_stage?.id);
            getListCandidates(resume.recruitment_stage?.id)
            getResumeHistories(
              resume.candidate_id,
              resume.vacancy?.uuid,
              resume.id
            );
            getPreviousJobs(resume.candidate_id);
            setSelectedCandidate(resume);
          }
        }
      } else {
        setRecruitmentStages(null);
      }
    } else {
      console.error("User can't run this function listRecruitmentStages")
    }
  };

  const [showLoading, setShowLoading] = useState<boolean>(false);
  const [listCandidates, setListCandidates] =
    useState<RecruitmentStageType | null>(null);
  const getListCandidates = async (stageId: number) => {
    if (userCanAction("can-curriculus-recruitment-stages-listCandidateByStage")) {
      setSelectedRecruitmentStage(stageId);
      const token = userSession?.token;
      const headers: RawAxiosRequestHeaders = {
        "Content-Type": "Application/json",
        Accept: "Application/json",
        Authorization: `Bearer ${token}`,
      };
      const params = {
        url: `/curriculus/recruitment-stages/list-candidate-by-stage?recruitment-stage-id=${stageId}`,
        headers: headers,
        load: false,
      };

      try {
        setShowLoading(true);
        setListCandidates(null);
        setSelectedCandidate(null);
        setPreviousJobs(null);
        setResumeHistories(null);
        const response = await executeGetBackend(params);

        if (
          response &&
          response.status === 200 &&
          response.data?.resumes.length > 0
        ) {
          setListCandidates(response?.data);
        } else {
          setListCandidates(null);
          setSelectedCandidate(null);
          setPreviousJobs(null);
        }
      } catch (error) {
        console.error("Error fetching candidates:", error);
        setListCandidates(null);
        setSelectedCandidate(null);
        setPreviousJobs(null);
      } finally {
        setShowLoading(false);
      }
    } else {
      console.error("User can't run this function getListCandidates")
    }
  };

  const [selectedCandidate, setSelectedCandidate] = useState<ResumeType | null>(
    null
  );

  const [previousJobs, setPreviousJobs] = useState<CandidateType | null>(null);
  const getPreviousJobs = async (clientId: number) => {
    if (userCanAction("can-curriculus-candidates-getPreviousVacancies")) {
      const token = userSession?.token;
      const headers: RawAxiosRequestHeaders = {
        "Content-Type": "Application/json",
        Accept: "Application/json",
        Authorization: `Bearer ${token}`,
      };
      const params = {
        url: `/curriculus/candidates/get-previous-vacancies?candidate-id=${clientId}`,
        headers: headers,
        load: false,
      };

      try {
        setPreviousJobs(null);
        setShowLoadingPreviousJobs(true);
        const response = await executeGetBackend(params);

        if (
          response &&
          response.status === 200 &&
          response.data?.resumes.length > 0
        ) {
          setPreviousJobs(response?.data);
        } else {
          setPreviousJobs(null);
        }
      } catch (error) {
        console.error("Error fetching candidates:", error);
        setPreviousJobs(null);
      } finally {
        setShowLoadingPreviousJobs(false);
      }
    } else {
      console.error("User can't run this function getPreviousJobs")
    }
  };

  const [showLoadingPreviousJobs, setShowLoadingPreviousJobs] =
    useState<boolean>(false);

  const [showLoadingResumeHistory, setShowLoadingResumeHistory] =
    useState<boolean>(false);

  const [resumeHistories, setResumeHistories] = useState<
    ResumeStageHistoryType[] | null
  >(null);
  const getResumeHistories = async (
    candidateId: number | undefined | null,
    vacancyUuid: string | undefined | null,
    resumeId: number | undefined | null,
  ) => {
    if (userCanAction("can-curriculus-candidates-getResumeStageHistory")) {
      const query = {
        "candidate-id": candidateId,
        "vacancy-uuid": vacancyUuid,
        "resume-id": resumeId,
      };

      const token = userSession?.token;
      const headers: RawAxiosRequestHeaders = {
        "Content-Type": "Application/json",
        Accept: "Application/json",
        Authorization: `Bearer ${token}`,
      };
      const params = {
        url: `/curriculus/candidates/get-resume-stage-history?${paramsForNavigation(
          query
        )}`,
        headers: headers,
        load: false,
      };

      try {
        setResumeHistories(null);
        setShowLoadingResumeHistory(true);

        const response = await executeGetBackend(params);

        if (response && response.status === 200 && response.data.length > 0) {
          setResumeHistories(response?.data);
        } else {
          setResumeHistories(null);
        }
      } catch (error) {
        console.error("Error fetching candidates:", error);
        setResumeHistories(null);
      } finally {
        setShowLoadingResumeHistory(false);
      }
    } else {
      console.error("User can't run this function getResumeHistories")
    }
  };

  const saveResumeStageHistories = async (resumeHistory: ResumeStageHistoriesSaveType) => {
    if (userCanAction("can-curriculus-resume-stage-histories-save")) {
      const token = userSession?.token;
      const headers: RawAxiosRequestHeaders = {
        "Content-Type": "Application/json",
        Accept: "Application/json",
        Authorization: `Bearer ${token}`
      };
      const params = {
        url: `/curriculus/resume-stage-histories/save`,
        headers: headers,
        body: resumeHistory,
        load: true,
      };

      try {
        const response = await executePostBackend(params);
        if (response && response?.status === 201) {
          toast({
            title: "✅ Fase alterada!",
            description: `Fase alterada com sucesso!`,
          });

          if (selectedRecruitmentStage) {
            getListCandidates(selectedRecruitmentStage);
          }
        } else {
          toast({
            title: "⚠️ Houve um erro ao salvar os dados",
            description: `Ocorreu um erro ao atualizar o cadastro, por favor, tente mais tarde.`,
          });
        }

      } catch (error) {
        console.error("Error fetching candidates:", error);
      }
    } else {
      console.error("User can't run this function saveResumeStageHistories")
    }
  }

  const downloadResume = async (fileName: string | undefined) => {
    if (userCanAction("can-curriculus-candidates-downloadResume")) {

      const token = userSession?.token;
      const headers: RawAxiosRequestHeaders = {
        "Content-Type": "Application/json",
        Accept: "Application/json",
        Authorization: `Bearer ${token}`
      };

      const params = {
        url: `/curriculus/candidates/download-resume/${fileName}`,
        headers: headers,
        responseType: BackendRequestResponseTypeEnum.blob,
      };

      const response = await executeGetBackend(params);
      if (response?.status === 200) {

        //const contentType = response?.headers["content-type"];
        //const extension = contentType.split("/").pop();

        downloader(`cv_${fileName}`, response?.data);
      }


    } else {
      console.error("User can't run this function downloadResume")
    }
  }

  const search = async (item: string) => {
    if (userCanAction("can-curriculus-resume-search")) {

      const token = userSession?.token;
      const headers: RawAxiosRequestHeaders = {
        "Content-Type": "Application/json",
        Accept: "Application/json",
        Authorization: `Bearer ${token}`
      };

      const params = {
        url: `/curriculus/resume/search?item=${item}`,
        headers: headers,
        responseType: BackendRequestResponseTypeEnum.json,
        load: true,
      };

      const response = await executeGetBackend(params);
      if (response?.status === 200) {

        setSizeModal("max-w-screen-sm sm:max-w-screen-lg");
        setModalTitle({
          title: "Busca",
          description: "Busca rápida de candidatos",
        });

        handleShowModal(
          <SearchCandidate data={response.data} />
        );

      }

    } else {
      console.error("User can't run this function search")
    }
  };

  const searchByUuid = useCallback(async (uuid: string | null) => {
    if (uuid) {
      const token = userSession?.token;
      const headers: RawAxiosRequestHeaders = {
        "Content-Type": "Application/json",
        Accept: "Application/json",
        Authorization: `Bearer ${token}`
      };

      const params = {
        url: `/curriculus/resume/search-uuid?uuid=${uuid}`,
        headers: headers,
        responseType: BackendRequestResponseTypeEnum.json,
        load: true,
      };

      const response = await executeGetBackend(params);
      if (response?.status === 200) {
        return response.data
      }
    }
  }, [executeGetBackend, userSession?.token])

  return (
    <CandidateContext.Provider
      value={{
        showPreviousJobs,
        setShowPreviousJobs,
        recruitmentStages,
        selectedFilterCandidate,
        selectedRecruitmentStage,
        listRecruitmentStages,
        listCandidates,
        getListCandidates,
        showLoading,
        selectedCandidate,
        setSelectedCandidate,
        previousJobs,
        getPreviousJobs,
        showLoadingPreviousJobs,
        resumeHistories,
        getResumeHistories,
        showLoadingResumeHistory,
        saveResumeStageHistories,
        downloadResume,
        search,
        searchByUuid
      }}
    >
      {children}
    </CandidateContext.Provider>
  );
};
