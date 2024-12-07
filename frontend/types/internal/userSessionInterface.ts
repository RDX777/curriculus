import { ActionInterface } from "./actionsInterface";
import { RoleInterface } from "./roleInterface";

export interface UserSessionInterface {
  id?: number;
  name?: string;
  username?: string;
  group?: string;
  token?: string;
  role?: RoleInterface;
  actions?: Array<ActionInterface>;
}
