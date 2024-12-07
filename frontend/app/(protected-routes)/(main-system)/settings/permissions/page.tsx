"use client";
import { PermissionsComponent } from "@/components/bodies/permissionsComponent";
import MenuIcons from "@/components/icons/menuIcons";
import { useUserSession } from "@/contexts/userSession";
import { useEffect } from "react";

export default function Permissions() {

  const { userSession, userCanMenu } = useUserSession()

  useEffect(() => {
    if (userSession) {
      userCanMenu("Permissões")
    }
  }, [userSession, userCanMenu])

  return (
    <>
      <div className="flex">
        <MenuIcons name="BiCctv" className="mt-4 text-xl" />
        <h1 className="m-3 text-lg font-bold mb-4">
          Pagina gerenciamento de permissões:
        </h1>
      </div>
      <form>
        <PermissionsComponent />
      </form>
    </>
  );
}
