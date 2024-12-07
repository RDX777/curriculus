import { SettingsOthersMenuOptions } from "@/components/menus/settingsOthersMenuOptions";
import { SettingsRolesMenuOptions } from "@/components/menus/settingsRolesMenuOptions";

export const PermissionsComponent: React.FC = () => {
  return (
    <div className="flex space-x-2">
      <div className="w-80 h-auto">
        <SettingsRolesMenuOptions />
      </div>
      <div className="w-full">
        <SettingsOthersMenuOptions />
      </div>
    </div>
  );
};
