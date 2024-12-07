<?php

namespace App\Swagger\Recruitment\VacancieController;

/**
 * @OA\Get(
 *     path="/api/v1/curriculus/vacancies/list-locals",
 *     tags={"Vacancies"},
 *     summary="Listar localidades ou empresas",
 *     description="Este endpoint retorna uma lista de localidades ou empresas. O parâmetro 'active' pode ser usado para filtrar os resultados entre ativos ('yes'), inativos ('no'), ou todos ('all'). O endpoint requer autenticação via token bearer.",
 *     operationId="listLocals",
 *     security={{"bearerAuth":{}}},
 *     @OA\Parameter(
 *         name="active",
 *         in="query",
 *         description="Filtrar as localidades/empresas por status. Opções: yes, no, all.",
 *         required=false,
 *         @OA\Schema(
 *             type="string",
 *             enum={"yes", "no", "all"},
 *             default="all"
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Lista de localidades/empresas retornada com sucesso",
 *         @OA\JsonContent(
 *             type="array",
 *             @OA\Items(
 *                 @OA\Property(property="id", type="integer", example=1),
 *                 @OA\Property(property="name", type="string", example="NOME DA EMPRESA"),
 *                 @OA\Property(property="cnpj", type="string", example="99.999.999/9999-99"),
 *                 @OA\Property(property="local", type="string", example="Localidade da empresa"),
 *                 @OA\Property(property="active", type="boolean", example=1),
 *                 @OA\Property(property="deleted", type="integer", example=0),
 *                 @OA\Property(property="created_at", type="string", format="date-time", example="2024-10-10T02:20:51.000000Z"),
 *                 @OA\Property(property="updated_at", type="string", format="date-time", example="2024-10-10T02:20:51.000000Z")
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Não autorizado, Token ausente ou inválido"
 *     ),
 *     @OA\Response(
 *         response=500,
 *         description="Erro interno, não foi possível listar as localidades/empresas"
 *     )
 * )
 */

class ListLocals
{
}
