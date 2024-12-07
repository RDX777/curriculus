import { redirect } from "next/navigation";
import { headers } from "next/headers";
import { getServerSession } from "next-auth";
import nextAuthOptions from "@/app/api/auth/[...nextauth]/nextAuthOptions";

export default async function Home() {
  const headersList = headers();
  const host = headersList.get("host");

  if (host === "trabalheconosco.mdgintermediacoes.com.br") {
    redirect("/register");
  } else if (host === process.env.APP_ADRRESS || host === "https://dev.mdgintermediacoes.com.br") {
    const session = await getServerSession(nextAuthOptions);

    if (session) {
      redirect("/home");
    } else {
      redirect("/login");
    }
  }

  return null;
}
