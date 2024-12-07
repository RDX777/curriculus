<?php

namespace App\Swagger\Auth\AuthController;

/**
 * @OA\Post(
 *     path="/api/v1/auth/login",
 *     operationId="login",
 *     tags={"Authentication"},
 *     summary="Realiza o login do usuario",
 *     description="Faz login usando username e senha na aplicação",
 *     @OA\RequestBody(
 *         required=true,
 *         description="Pass login credentials",
 *         @OA\JsonContent(
 *             required={"username", "password"},
 *             @OA\Property(property="username", type="string", example="login_do_abencoado"),
 *             @OA\Property(property="password", type="string", format="password", example="6bddfgdrhzd68556733f548a6038456dea28f7b6b02e10067ea84467b50510f5e8"),
 *             @OA\Property(property="groupToBring", type="string", example="group_name")
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Successful operation",
 *         @OA\JsonContent(
 *             @OA\Property(property="statusCode", type="int", example="200"),
 *             @OA\Property(property="name", type="string", example="Nome do Abencoado"),
 *             @OA\Property(property="username", type="string", example="login_do_abencoado"),
 *             @OA\Property(property="group", type="string", example="GRUPO_DO_ABENCOADO"),
 *             @OA\Property(property="token", type="string", example="365|9pdWn7ZkHWVuO5gz5f6gh5fghdO30nxxOILGR3XcwRuG2f679306"),
 *             @OA\Property(
 *                 property="role",
 *                 type="object",
 *                 @OA\Property(property="id", type="integer", example=1),
 *                 @OA\Property(property="name", type="string", example="GRUPO_DO_ABENCOADO"),
 *                 @OA\Property(property="description", type="string", example="Grupo de administradores"),
 *                 @OA\Property(
 *                     property="menus",
 *                     type="array",
 *                     @OA\Items(
 *                         @OA\Property(property="id", type="integer", example=2),
 *                         @OA\Property(property="belong_menu_id", type="integer", example=1),
 *                         @OA\Property(property="position", type="integer", example=1),
 *                         @OA\Property(property="level", type="integer", example=1),
 *                         @OA\Property(property="name", type="string", example="Grupos"),
 *                         @OA\Property(property="icon", type="string", example=null),
 *                         @OA\Property(property="description", type="string", example="Gerenciamento dos grupos da aplicação"),
 *                         @OA\Property(
 *                             property="route",
 *                             type="object",
 *                             @OA\Property(property="id", type="integer", example=1),
 *                             @OA\Property(property="menu_id", type="integer", example=2),
 *                             @OA\Property(property="link", type="string", example="/settings/groups"),
 *                             @OA\Property(property="active", type="integer", example=1),
 *                         )
 *                     )
 *                 ),
 *                 @OA\Property(
 *                     property="actions",
 *                     type="array",
 *                     @OA\Items(
 *                         @OA\Property(property="id", type="integer", example=1),
 *                         @OA\Property(property="name", type="string", example="nome-permissao"),
 *                         @OA\Property(property="description", type="string", example="Exemplo de permissão"),
 *                         @OA\Property(property="active", type="integer", example=1),
 *                     )
 *                 )
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthorized",
 *         @OA\JsonContent(
 *             @OA\Property(property="statusCode", type="int", example="401"),
 *             @OA\Property(property="message", type="string", example="Unauthorized")
 *         )
 *     )
 * )
 */

class Login {}
