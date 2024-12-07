// @ts-nocheck
"use client";
import { zodResolver } from "@hookform/resolvers/zod";
import { useForm } from "react-hook-form";
import * as z from "zod";
import MenuIcons from "@/components/icons/menuIcons";
import { Button } from "@/components/ui/button";
import {
  Form,
  FormControl,
  FormField,
  FormItem,
  FormLabel,
  FormMessage,
} from "@/components/ui/form";
import { Input } from "@/components/ui/input";
import { Label } from "@/components/ui/label";
import { toast } from "@/components/ui/use-toast";
import { useState } from "react";
import { signIn } from "next-auth/react";
import { useRouter } from "next/navigation";
import { AppNameMotionIcon } from "@/components/icons/appNameMotionIcon";
import { encrypt } from "@/utils/functions_tools/crypt";

const loginFormSchema = z.object({
  username: z.string().min(2, {
    message: "Login de rede precisa ter mais que 2 caracteres.",
  }),
  password: z.string().min(6, {
    message: "A senha precisa ter mais que 2 caracteres.",
  }),
});

export default function LoginForm() {
  const [isLoading, setIsLoading] = useState<boolean>(false);

  const form = useForm<z.infer<typeof loginFormSchema>>({
    resolver: zodResolver(loginFormSchema),
    defaultValues: {
      username: "",
      password: "",
    },
  });

  const router = useRouter();

  async function onSubmit(values: z.infer<typeof loginFormSchema>) {
    setIsLoading(true);

    values.password = encrypt(values.password);

    const result = await signIn("credentials", { ...values, redirect: false });

    if (result?.error) {
      toast({
        title: "Login ou senha invalidos",
        description: `Favor verifique se sua senha esta correta ou bloqueada, e se possui acesso a esta aplicação!`,
      });
      setIsLoading(false);
    } else {
      toast({
        description: "Login efetuado com sucesso!",
      });
      router.replace("/home");
    }
  }

  return (
    <div className="flex items-center justify-center h-screen">
      <div className="border rounded-lg m-4 w-1/2 md:w-96 min-w-56">
        <Form {...form}>
          <form onSubmit={form.handleSubmit(onSubmit)}>
            <div className="flex items-center justify-center">
              <Label className="text-2xl">Bem vindo ao</Label>
              <AppNameMotionIcon />
            </div>

            <FormField
              control={form.control}
              name="username"
              render={({ field }) => (
                <FormItem className="m-4">
                  <FormLabel>Login de rede</FormLabel>
                  <FormControl>
                    <Input {...field} />
                  </FormControl>
                  <FormMessage />
                </FormItem>
              )}
            />

            <FormField
              control={form.control}
              name="password"
              render={({ field }) => (
                <FormItem className="m-4">
                  <FormLabel>Senha da rede</FormLabel>
                  <FormControl>
                    <Input type="password" {...field} />
                  </FormControl>
                  <FormMessage />
                </FormItem>
              )}
            />

            <div className="flex items-center justify-center m-4">
              <Button
                className="m-4 w-1/2 md:w-32"
                type="submit"
                disabled={isLoading}
              >
                {isLoading ? (
                  <>
                    <MenuIcons
                      name="AiOutlineLoading"
                      className="mr-2 h-4 w-4 animate-spin"
                    />
                    Carregando
                  </>
                ) : (
                  "Acessar"
                )}
              </Button>
              <Button
                className="m-4 w-1/2 md:w-32"
                type="button"
                onClick={form.reset}
              >
                Limpar
              </Button>
            </div>
          </form>
        </Form>
      </div>
    </div>
  );
}
