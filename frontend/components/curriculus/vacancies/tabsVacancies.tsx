"use client";
import { Tabs, TabsContent, TabsList, TabsTrigger } from "@/components/ui/tabs";
import { CarouselVacancies } from "@/components/curriculus/vacancies/carouselVacancies";
import { useVacancy } from "@/contexts/vacancy";
import { useUserSession } from "@/contexts/userSession";

export const TabsVacancies: React.FC = () => {
  const { userCanAction } = useUserSession()
  const { setClearFormVacancy } = useVacancy();
  return (
    <div className="w-full">
      {userCanAction("can-curriculus-vacancies-list") && (<Tabs defaultValue="active" className="w-full">
        <TabsList className="grid w-full grid-cols-2">
          <TabsTrigger value="active" onClick={() => setClearFormVacancy(true)}>Ativas</TabsTrigger>
          <TabsTrigger value="inactive" onClick={() => setClearFormVacancy(true)}>Inativas</TabsTrigger>
        </TabsList>
        <TabsContent value="active">
          <div className="flex justify-center m-2">
            <CarouselVacancies active={true} />
          </div>
        </TabsContent>
        <TabsContent value="inactive">
          <div className="flex justify-center m-2">
            <CarouselVacancies active={false} />
          </div>
        </TabsContent>
      </Tabs>)}
    </div>
  );
};
