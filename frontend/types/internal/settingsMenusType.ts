import { SettingsInterface } from "./settingsInterface";

export type SettingsMenusType = {
    [key: string]: SettingsInterface[] & {
    belong_menu_id: number;
    position: number;
    level: number;
    icon: string;
  }
}