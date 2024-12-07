import { getServerSession } from "next-auth";
import { ReactNode } from "react";
import nextAuthOptions from "../api/auth/[...nextauth]/nextAuthOptions";
import { redirect } from "next/navigation";
import { UserSessionProvider } from "@/contexts/userSession";
import { WebsocketProvider } from "@/contexts/websocket";

interface PrivateLayoutProps {
  children: ReactNode;
}
export default async function PrivateLayout({ children }: PrivateLayoutProps) {
  const session = await getServerSession(nextAuthOptions);

  if (!session) {
    redirect("/login");
  }

  return (
    <UserSessionProvider>
      <WebsocketProvider>{children}</WebsocketProvider>
    </UserSessionProvider>
  );
}
