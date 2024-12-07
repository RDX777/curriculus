import {
  Card,
  CardDescription,
  CardHeader,
  CardTitle,
} from "@/components/ui/card";
import { VacancyType } from "@/types/curriculus/vacancies/vacancyType";
import { useVacancy } from "@/contexts/vacancy";

export type CardVacanciesType = {
  vacancy: VacancyType;
};

export const CardVacancies: React.FC<CardVacanciesType> = ({ vacancy }) => {
  const { setSelectedVacancy } = useVacancy();
  return (
    <Card
      id={vacancy.uuid}
      className="w-96 h-40 border hover:border-blue-500 cursor-pointer transition duration-300"
      onClick={(event) => {
        event.preventDefault();
        setSelectedVacancy(vacancy);
      }}
    >
      <CardHeader>
        <CardTitle className="w-auto break-words text-xl">
          {vacancy.title}
        </CardTitle>
        <CardDescription>{vacancy.company.local}</CardDescription>
        <CardDescription>{vacancy.company.name}</CardDescription>
      </CardHeader>
    </Card>
  );
};
