"use client";
import { TopBar } from "@/components/bars/topBar";
import LoadingModal from "@/components/modals/loadingModal";
import { CenterNotificationModal } from "@/components/modals/centerNotificationModal";
import { ReactNode } from "react";
import { QueryClient, QueryClientProvider } from "@tanstack/react-query";
import { UniversalFunctionProvider } from "@/contexts/universalFunctions";
import { ModalNotificationProvider } from "@/contexts/modalNotifications";

interface MainSystemLayoutProps {
  children: ReactNode;
}
export default function MainSystemLayout({ children }: MainSystemLayoutProps) {
  const queryClient = new QueryClient();

  return (
    <UniversalFunctionProvider>
      <main className="flex flex-row m-0 p-0 h-auto">
        <section className="w-screen flex flex-col">
          <QueryClientProvider client={queryClient}>
            <ModalNotificationProvider>
              <TopBar />
              <div className="mt-1 mb-1 inset-x-0 bottom-0 h-1 bg-black dark:bg-white opacity-25"></div>
              <div className="flex-grow p-2 overflow-y-auto overflow-x-hidden">
                <div className="container dark:bg-slate-900 w-max-[1900px] rounded-lg border shadow-lg">
                  {children}
                </div>
                <LoadingModal />
                <CenterNotificationModal />
              </div>
            </ModalNotificationProvider>
          </QueryClientProvider>
        </section>
      </main>
    </UniversalFunctionProvider>
  );
}
