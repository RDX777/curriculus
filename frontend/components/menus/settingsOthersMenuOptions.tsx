import { useSettings } from "@/contexts/settings";
import MenuIcons from "@/components/icons/menuIcons";
import { SettingSelector } from "@/components/optionsMenus/settingSelector";
import { SettingBlank } from "@/components/optionsMenus/settingBlank";

export const SettingsOthersMenuOptions = () => {
  const { selectedRole, middlewares, menus, actions } = useSettings();
  return (
    <>
      <div className="bg-gray-100 dark:bg-slate-800 rounded-lg">
        <div className="flex m-1 mt-2 justify-center text-xl">
          <MenuIcons name="MdAltRoute" className="mt-1 mr-2" />
          <h1>Rotas: {selectedRole?.description}</h1>
          <h1 className="ml-2 opacity-10 italic">Can you walk here?</h1>
        </div>
        <div className="mt-2">
          {middlewares ? (
            Object.keys(middlewares).map((key) => (
              <div key={key} className="m-2 p-1">
                <h3 className="p-1">{key}:</h3>
                {middlewares[key].map((item) => (
                  <SettingSelector
                    key={`middleware-${item.id}`}
                    type="SettingsMiddlewaresType"
                    setting={item}
                  />
                ))}
              </div>
            ))
          ) : (
            <SettingBlank key={"SettingBlankMiddleware"} />
          )}
        </div>
      </div >

      <div className="bg-gray-100 dark:bg-slate-800 rounded-lg">
        <div className="flex m-1 mt-2 justify-center text-xl">
          <MenuIcons name="MdAltRoute" className="mt-1 mr-2" />
          <h1>Menus: {selectedRole?.description}</h1>
          <h1 className="ml-2 opacity-10 italic">Can you see this?</h1>
        </div>
        <div className="mt-2">
          {menus ? (
            Object.keys(menus).map((key) => (
              <div key={key} className="m-2 p-1">
                <h3 className="p-1">{key}:</h3>
                {menus[key].map((item) => (
                  <SettingSelector
                    key={`menu-${item.id}`}
                    type="SettingsMenusType"
                    setting={item}
                  />
                ))}
              </div>
            ))
          ) : (
            <SettingBlank key={"SettingBlankMenu"} />
          )}
        </div>
      </div>

      <div className="bg-gray-100 dark:bg-slate-800 rounded-lg">
        <div className="flex m-1 mt-2 justify-center text-xl">
          <MenuIcons name="MdAltRoute" className="mt-1 mr-2" />
          <h1>Ações: {selectedRole?.description}</h1>
          <h1 className="ml-2 opacity-10 italic">Can you run it?</h1>
        </div>
        <div className="mt-2">
          {actions ? (
            Object.keys(actions).map((key) => (
              <div key={key} className="m-2 p-1">
                <h3 className="p-1">{key}:</h3>
                {actions[key].map((item) => (
                  <SettingSelector
                    key={`menu-${item.id}`}
                    type="SettingsActionsType"
                    setting={item}
                  />
                ))}
              </div>
            ))
          ) : (
            <SettingBlank key={"SettingBlankActions"} />
          )}
        </div>
      </div>
    </>
  );
};
