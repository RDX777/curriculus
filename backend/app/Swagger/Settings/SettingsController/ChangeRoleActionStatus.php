<?php

namespace App\Swagger\Settings\SettingsController;

/**
 * @OA\Patch(
 *     path="/api/v1/settings/permissions/role/action/{id}",
 *     summary="Adiciona ou remove uma permissão as ações",
 *     description="Adiciona ou remove o acesso a executar uma função em um grupo",
 *     tags={"Settings"},
 *     operationId="settingsPermissionsRoleAction",
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="ID do Grupo",
 *         required=true,
 *         @OA\Schema(
 *             type="string",
 *             example="0"
 *         )
 *     ),
 *     @OA\RequestBody(
 *         required=true,
 *         description="Objeto a ser recebido",
 *         @OA\JsonContent(
 *             type="array",
 *             @OA\Items(
 *                 type="object",
 *                 @OA\Property(
 *                     property="id",
 *                     type="number",
 *                     example="0"
 *                 ),
 *                 @OA\Property(
 *                     property="active",
 *                     type="boolean",
 *                     example="true"
 *                 )
 *             )
 *         )
 *     ),
 *      @OA\Response(
 *          response=204,
 *          description="Sucesso na alteração de acesso"
 *      ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthorized",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Unauthorized")
 *         )
 *     ),
 *     security={{"bearerAuth": {}}}
 * )
 */

class ChangeRoleActionStatus
{
}
