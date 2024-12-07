import { useSettings } from "@/contexts/settings";
import MenuIcons from "@/components/icons/menuIcons";
import { Button } from "@/components/ui/button";
import { RoleBlank } from "@/components/optionsMenus/roleBlank";

export const SettingsRolesMenuOptions = () => {
  const { roles, searchRoleById } = useSettings();
  const groupAdmin = process.env.NEXT_PUBLIC_GROUP_NAME_ADMIN;
  const groupRpa = process.env.NEXT_PUBLIC_GROUP_NAME_RPA;
  return (
    <div className="bg-gray-100 dark:bg-slate-800 rounded-lg">
      <div className="flex m-1 mt-2 justify-center text-xl">
        <MenuIcons name="MdOutlineGroups" className="mt-1 mr-2" />
        <h1>Grupos:</h1>
      </div>
      <div className="mt-2">
        {roles ? (
          roles?.map(
            (role) =>
              role.name !== groupAdmin && (
                <Button
                  variant={"ghost"}
                  type="button"
                  key={role.id}
                  className="flex my-3"
                  onClick={() => searchRoleById(role)}
                  disabled={role.name === groupRpa}
                >
                  {role.description}
                </Button>
              )
          )
        ) : (
          <RoleBlank />
        )}
      </div>
    </div>
  );
};
