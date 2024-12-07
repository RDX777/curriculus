<?php

namespace App\Swagger\Settings\SettingsController;

/**
 * @OA\Get(
 *      path="/api/v1//settings/list/roles",
 *      operationId="settingsPermissionsListRole",
 *      tags={"Settings"},
 *      summary="Obtém todos os grupos",
 *      description="Retorna todos os grupos existentes.",
 *      security={{ "bearerAuth": {} }},
 *      @OA\Response(
 *          response=200,
 *          description="OK",
 *          @OA\JsonContent(
 *              @OA\Property(property="statusCode", type="integer", example=200),
 *              @OA\Property(property="data", type="array",
 *                  @OA\Items(
 *                      @OA\Property(property="id", type="integer"),
 *                      @OA\Property(property="name", type="string"),
 *                      @OA\Property(property="description", type="string"),
 *                      @OA\Property(property="active", type="integer"),
 *                  ),
 *              ),
 *          ),
 *      ),
 *      @OA\Response(
 *          response=401,
 *          description="Acesso negado",
 *          @OA\JsonContent(
 *              @OA\Property(property="error", type="string", example="Unauthorized"),
 *              @OA\Property(property="message", type="string", example="Acesso negado. Token de autenticação inválido."),
 *          ),
 *      ),
 * )
 */

class ListRoles
{
}
