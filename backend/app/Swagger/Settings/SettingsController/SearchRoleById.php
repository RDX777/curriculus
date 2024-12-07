<?php

namespace App\Swagger\Settings\SettingsController;

/**
 * @OA\Get(
 *      path="/api/v1/settings/search/role/{itemSearch}",
 *      operationId="settingsPermissionsListRoleById",
 *      tags={"Settings"},
 *      summary="Obtém as permissões relacionadas ao grupo",
 *      description="Retorna todos as permissões.",
 *      security={{ "bearerAuth": {} }},
 *     @OA\Parameter(
 *         name="itemSearch",
 *         in="path",
 *         description="Id da Role",
 *         required=true,
 *         @OA\Schema(
 *             type="number",
 *             example="Id da Role"
 *         )
 *     ),
 * @OA\Response(
 *      response=200,
 *      description="Retorno bem-sucedido",
 *      @OA\JsonContent(
 *          type="object",
 *          @OA\Property(
 *              property="statusCode",
 *              type="integer",
 *              example=200
 *          ),
 *          @OA\Property(
 *              property="data",
 *              type="object",
 *              @OA\Property(
 *                  property="id",
 *                  type="integer",
 *                  example=0
 *              ),
 *              @OA\Property(
 *                  property="name",
 *                  type="string",
 *                  example="G_MDG__GROUP"
 *              ),
 *              @OA\Property(
 *                  property="description",
 *                  type="string",
 *                  example="Nome do grupo ou descrição"
 *              ),
 *              @OA\Property(
 *                  property="active",
 *                  type="boolean",
 *                  example=true
 *              ),
 *              @OA\Property(
 *                  property="middlewares",
 *                  type="array",
 *                  @OA\Items(
 *                      @OA\Property(
 *                          property="id",
 *                          type="integer",
 *                          example=1
 *                      ),
 *                      @OA\Property(
 *                          property="name",
 *                          type="string",
 *                          example="middleware-name-permission"
 *                      ),
 *                      @OA\Property(
 *                          property="description",
 *                          type="string",
 *                          example="Descrição da permissão de rota"
 *                      ),
 *                      @OA\Property(
 *                          property="active",
 *                          type="boolean",
 *                          example=true
 *                      ),
 *                      @OA\Property(
 *                          property="selected",
 *                          type="boolean",
 *                          example=true
 *                      )
 *                  )
 *              ),
 *              @OA\Property(
 *                  property="menus",
 *                  type="array",
 *                  @OA\Items(
 *                      @OA\Property(
 *                          property="id",
 *                          type="integer",
 *                          example=1
 *                      ),
 *                      @OA\Property(
 *                          property="belong_menu_id",
 *                          type="integer",
 *                          example=null
 *                      ),
 *                      @OA\Property(
 *                          property="position",
 *                          type="integer",
 *                          example=0
 *                      ),
 *                      @OA\Property(
 *                          property="level",
 *                          type="integer",
 *                          example=0
 *                      ),
 *                      @OA\Property(
 *                          property="name",
 *                          type="string",
 *                          example="Titulo do menu"
 *                      ),
 *                      @OA\Property(
 *                          property="icon",
 *                          type="string",
 *                          example="NomeDoIcone"
 *                      ),
 *                      @OA\Property(
 *                          property="description",
 *                          type="string",
 *                          example="Descrição do titulo do menu"
 *                      ),
 *                      @OA\Property(
 *                          property="active",
 *                          type="boolean",
 *                          example=true
 *                      ),
 *                      @OA\Property(
 *                          property="selected",
 *                          type="boolean",
 *                          example=false
 *                      )
 *                  )
 *              ),
 *              @OA\Property(
 *                  property="actions",
 *                  type="array",
 *                  @OA\Items(
 *                      @OA\Property(
 *                          property="id",
 *                          type="integer",
 *                          example=1
 *                      ),
 *                      @OA\Property(
 *                          property="name",
 *                          type="string",
 *                          example="action-name-permission"
 *                      ),
 *                      @OA\Property(
 *                          property="description",
 *                          type="string",
 *                          example="Descrição da permissão de ações"
 *                      ),
 *                      @OA\Property(
 *                          property="active",
 *                          type="boolean",
 *                          example=true
 *                      ),
 *                      @OA\Property(
 *                          property="selected",
 *                          type="boolean",
 *                          example=false
 *                      )
 *                  )
 *              )
 *          )
 *      )
 * )
 * )
 */

class SearchRoleById
{
}
