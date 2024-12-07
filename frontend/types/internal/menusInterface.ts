import { RouteLinkInterface } from "./routeLinkInterface";

export interface MenuInterface {
  id: number;
  belong_menu_id: number | null;
  position: number | null;
  level: number;
  name: string;
  icon: string;
  description: string;
  active: boolean;
  route?: RouteLinkInterface;
}
