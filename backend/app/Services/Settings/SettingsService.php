<?php

namespace App\Services\Settings;

use App\Interfaces\Settings\SettingsInterface;
use App\Models\Auth\Action;
use App\Models\Auth\ActionRole;
use App\Models\Auth\Menu;
use App\Models\Auth\MenuRole;
use App\Models\Auth\Middleware;
use App\Models\Auth\MiddlewareRole;
use App\Models\Auth\Role;
use Illuminate\Http\Response;

use App\Http\Resources\Settings\RoleResource;

class SettingsService implements SettingsInterface
{
    public function listRoles()
    {
        return [
            "statusCode" => Response::HTTP_OK,
            "data" => Role::all()
        ];
    }

    private function buildRoles($roles, $selecteds, $filterBy) {

        $itensSelecteds = array();

        foreach ($roles as $key => $roleKey) {

            $itensSelecteds[$key] = $roleKey->map(function ($item) use ($selecteds, $filterBy) {
                $selected =  $selecteds->{$filterBy}->contains(function ($value) use ($item) {
                    return $value->id === $item->id;
                });
                $item->active = (bool) $item->active;
                return $item->toArray() + ["selected" => (bool) $selected];
            });
        }

        return $itensSelecteds;

    }

    public function searchRoleById(int $itemTosearch)
    {
        $roleSolicited = Role::with(["middlewares", "menus", "actions"])
            ->find($itemTosearch);

        $roleSolicited->active = (bool) $roleSolicited->active;

        $middlewares = Middleware::where('active', 1)
            ->get()
            ->groupBy('classification');
        $middlewaresSelecteds = $this->buildRoles($middlewares, $roleSolicited, "middlewares");
        $roleSolicited->setRelation('middlewares', $middlewaresSelecteds);

        $menus = Menu::where('active', 1)
            ->get()
            ->groupBy('classification');
        $menusSelecteds = $this->buildRoles($menus, $roleSolicited, "menus");
        $roleSolicited->setRelation('menus', $menusSelecteds);

        $actions = Action::where('active', 1)
            ->get()
            ->groupBy('classification');
        $actionsSelecteds = $this->buildRoles($actions, $roleSolicited, "actions");
        $roleSolicited->setRelation('actions', $actionsSelecteds);
        
        return [
            "statusCode" => Response::HTTP_OK,
            "data" => new RoleResource($roleSolicited)
        ];
    }


    public function changeRoleMiddlewareStatus(int $idRole, $request)
    {
        MiddlewareRole::where("role_id", "=", $idRole)
            ->where("middleware_id", "=", $request["id"])
            ->delete();

        if ($request["active"]) {
            MiddlewareRole::create([
                "role_id" => (int) $idRole,
                "middleware_id" => (int) $request["id"]
            ]);
        }

        return [
            "statusCode" => Response::HTTP_NO_CONTENT
        ];
    }

    public function changeRoleMenuStatus(int $idRole, $request)
    {
        MenuRole::where("role_id", "=", $idRole)
            ->where("menu_id", "=", $request["id"])
            ->delete();

        if ($request["active"]) {
            MenuRole::create([
                "role_id" => (int) $idRole,
                "menu_id" => (int) $request["id"]
            ]);
        }

        return [
            "statusCode" => Response::HTTP_NO_CONTENT
        ];
    }

    public function changeRoleActionStatus(int $idRole, $request)
    {
        ActionRole::where("role_id", "=", $idRole)
            ->where("action_id", "=", $request["id"])
            ->delete();

        if ($request["active"]) {
            ActionRole::create([
                "role_id" => (int) $idRole,
                "action_id" => (int) $request["id"]
            ]);
        }

        return [
            "statusCode" => Response::HTTP_NO_CONTENT
        ];
    }
}
