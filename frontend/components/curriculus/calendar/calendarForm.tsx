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
import MenuIcons from "@/components/icons/menuIcons";
import { Button } from "@/components/ui/button";
import {
  CalendarFormDefaultValues,
  CalendarFormSchema,
} from "@/components/curriculus/calendar/calendarFormSchema";
import { Input } from "@/components/ui/input";

export const CalendarForm: React.FC = () => {
  const form = useForm<z.infer<typeof CalendarFormSchema>>({
    resolver: zodResolver(CalendarFormSchema),
    defaultValues: CalendarFormDefaultValues,
    mode: "onChange",
  });

  async function onSubmit(values: z.infer<typeof CalendarFormSchema>) {
    console.log(values);
  }

  return (
    <Form {...form}>
      <form onSubmit={form.handleSubmit(onSubmit)}>
        <div className="flex flex-row w-full">
          <div className="w-1/2 mx-3">
            <FormField
              control={form.control}
              name="startTime"
              render={({ field }) => (
                <FormItem>
                  <FormLabel className="text-lg">
                    Informe a data e hora de inicio
                  </FormLabel>
                  <FormControl>
                    <Input type="datetime-local" {...field} />
                  </FormControl>
                  <FormDescription>
                    Informe o dia e a hora em que se inciara a entrevista
                  </FormDescription>
                  <FormMessage />
                </FormItem>
              )}
            />
          </div>

          <div className="w-1/2 mx-3">
            <FormField
              control={form.control}
              name="endTime"
              render={({ field }) => (
                <FormItem>
                  <FormLabel className="text-lg">
                    Informe a data e hora de término
                  </FormLabel>
                  <FormControl>
                    <Input
                      className="border w-full"
                      type="datetime-local"
                      {...field}
                    />
                  </FormControl>
                  <FormDescription>
                    Informe o dia e a hora em que terminara a entrevista

                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed harum voluptatibus iste facilis assumenda, expedita doloremque distinctio, nihil eligendi iure fugiat a dolorum reiciendis vero excepturi voluptates, culpa quae aperiam.
                  </FormDescription>
                  <FormMessage />
                </FormItem>
              )}
            />
          </div>
          <div className="flex space-x-4 my-5">
            <Button
              variant="outline"
              className="hover:bg-green-500 hover:text-white transition-colors duration-300"
              type="submit"
            >
              <MenuIcons name="FaLaughBeam" className="text-xl mr-2" /> salvar
            </Button>
          </div>
        </div>
      </form>
    </Form>
  );
};
