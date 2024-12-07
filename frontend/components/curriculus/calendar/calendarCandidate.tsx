import { Calendar } from "@/components/ui/calendar";
import { useState } from "react";

import { ptBR } from "date-fns/locale";

export const CalendarCandidate = () => {
  const [dateSelected, setDateSelected] = useState<Date | undefined>(
    new Date()
  );

  return (
    <>
      <Calendar
        mode="single"
        selected={dateSelected}
        onSelect={setDateSelected}
        className="flex mt-4 mr-4"
        locale={ptBR}
      />
    </>
  );
};
