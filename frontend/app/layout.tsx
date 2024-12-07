import type { Metadata } from "next";
import "@/app/globals.css";
import { Lato } from "next/font/google";
import { Toaster } from "@/components/ui/toaster";
import { cn } from "@/lib/utils";
import NextAuthSessionProvider from "@/contexts/session/sessionProvider";
import { LoadBar } from "@/components/bars/loadBar";
import { InitTheme } from "@/components/hooks/initTheme";
import { BackendRequestProvider } from "@/contexts/backendRequest";
import { Providers } from "@/app/(protected-routes)/(global-redux)/provider";

const lato = Lato({ subsets: ["latin"], weight: ["400", "700"] });

export const metadata: Metadata = {
  title: process.env.NEXT_PUBLIC_APP_NAME,
  description: "De controle a suas vagas de emprego",
};

export default function RootLayout({
  children,
}: {
  children: React.ReactNode;
}) {
  return (
    <html lang="pt-br">
      <body
        id="body"
        className={cn(
          lato.className,
          `m-0 p-0 w-screen h-screen transition-all duration-500`
        )}
      >
        <Providers>
          <BackendRequestProvider>
            <InitTheme />
            <NextAuthSessionProvider>
              {children}
              <Toaster />
            </NextAuthSessionProvider>
            <LoadBar />
          </BackendRequestProvider>
        </Providers>
      </body>
    </html>
  );
}
