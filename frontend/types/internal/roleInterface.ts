import { MenuInterface } from "./menusInterface";
export interface RoleInterface {
  id: number;
  name: string;
  description: string;
  active: boolean;
  menus?: Array<MenuInterface>;
}
