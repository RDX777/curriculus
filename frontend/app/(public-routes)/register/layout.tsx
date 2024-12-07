import { ReactNode } from "react";
import { HeadComponent } from "@/components/vacancies/register/headComponent";
import { FootComponent } from "@/components/vacancies/register/footComponent";
import { VacancyProvider } from "@/contexts/vacancy";
import LoadingModal from "@/components/modals/loadingModal";
import { ViaCepRequestProvider } from "@/contexts/viaCepRequest";
import { Toaster } from "@/components/ui/toaster";

interface CurriculumLayoutProps {
  children: ReactNode;
}
export default function CurriculumLayout({ children }: CurriculumLayoutProps) {
  return (
    <>
      <HeadComponent />
      <ViaCepRequestProvider>
        <VacancyProvider>{children}</VacancyProvider>
        <Toaster />
      </ViaCepRequestProvider>
      <LoadingModal />
      <FootComponent />
    </>
  );
}
