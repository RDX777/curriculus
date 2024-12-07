"use client";
import { ReactNode, useEffect } from "react";
import MenuIcons from "@/components/icons/menuIcons";
import { useVacancy } from "@/contexts/vacancy";
import { TabsVacancies } from "@/components/curriculus/vacancies/tabsVacancies";
import { YesNoAllEnum } from "@/types/internal/yesNoAllEnum";
import { ManageVacancies } from "@/components/curriculus/vacancies/manageVacancies";
import { useUserSession } from "@/contexts/userSession";

export default function Vacancies(): ReactNode {
  const { userSession, userCanMenu } = useUserSession();

  const {
    listVacancies,
    vacancies,
    listLocals,
    locals,
    listWorkModes,
    workModes,
  } = useVacancy();

  useEffect(() => {
    if (userSession) {
      userCanMenu("Vagas")
    }
  }, [userSession, userCanMenu])

  useEffect(() => {
    if (!vacancies) {
      listVacancies(YesNoAllEnum.all, true);
    }
  }, [listVacancies, vacancies]);

  useEffect(() => {
    if (!locals) {
      listLocals(YesNoAllEnum.yes, true);
    }
  }, [listLocals, locals]);

  useEffect(() => {
    if (!workModes) {
      listWorkModes(YesNoAllEnum.yes, true);
    }
  }, [listWorkModes, workModes]);

  return (
    <>
      <div className="flex">
        <MenuIcons name="MdWork" className="mt-4 text-xl" />
        <h1 className="m-3 text-lg font-bold mb-4">Vagas:</h1>
      </div>
      <div className="flex justify-center mt-3 m-2 mb-3">
        <TabsVacancies />
      </div>
      <div className="flex justify-center mt-3 m-2 mb-3">
        <ManageVacancies />
      </div>
    </>
  );
}
