"use client";
import {
  Carousel,
  CarouselContent,
  CarouselItem,
  CarouselNext,
  CarouselPrevious,
} from "@/components/ui/carousel";
import { CardVacancies } from "@/components/curriculus/vacancies/cardVacancies";
import { useVacancy } from "@/contexts/vacancy";

export type CarouselVacanciesType = {
  active?: boolean;
};

export const CarouselVacancies: React.FC<CarouselVacanciesType> = ({
  active = true,
}) => {
  const { vacancies } = useVacancy();
  return (
    <Carousel className="w-[95%]">
      <CarouselContent className="-ml-1">
        {vacancies &&
          vacancies
            .filter((vacancy) => vacancy.active === active)
            .map((vacancy) => (
              <CarouselItem
                key={vacancy.uuid}
                className="pl-1 md:basis-1/2 lg:basis-1/3"
              >
                <CardVacancies vacancy={vacancy} />
              </CarouselItem>
            ))}
      </CarouselContent>
      <CarouselPrevious />
      <CarouselNext />
    </Carousel>
  );
};
