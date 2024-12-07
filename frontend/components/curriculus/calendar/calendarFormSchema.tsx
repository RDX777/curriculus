import { z } from "zod";

export const CalendarFormDefaultValues = {
  startTime: "",
  endTime: "",
};

export const CalendarFormSchema = z.object({
  startTime: z.string().refine(
    (value) => {
      const date = new Date(value);
      return !isNaN(date.getTime());
    },
    {
      message: "Data e hora inválidas",
    }
  ),
  endTime: z.string().refine(
    (value) => {
      const date = new Date(value);
      return !isNaN(date.getTime());
    },
    {
      message: "Data e hora inválidas",
    }
  ),
});
