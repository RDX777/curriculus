<?php

namespace App\Swagger\Recruitment\VacancieController;

/**
 * @OA\Get(
 *     path="/api/v1/curriculus/vacancies/list-work-mode",
 *     tags={"Vacancies"},
 *     summary="Listar modalidades de trabalho",
 *     description="Este endpoint retorna uma lista de modalidades de trabalho disponíveis. O parâmetro 'active' pode ser usado para filtrar as modalidades entre ativas ('yes'), inativas ('no'), ou todas ('all'). O endpoint requer autenticação via token bearer.",
 *     operationId="listWorkMode",
 *     security={{"bearerAuth":{}}},
 *     @OA\Parameter(
 *         name="active",
 *         in="query",
 *         description="Filtrar as modalidades de trabalho por status. Opções: yes, no, all.",
 *         required=false,
 *         @OA\Schema(
 *             type="string",
 *             enum={"yes", "no", "all"},
 *             default="all"
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Lista de modalidades de trabalho retornada com sucesso",
 *         @OA\JsonContent(
 *             type="array",
 *             @OA\Items(
 *                 @OA\Property(property="id", type="integer", example=1),
 *                 @OA\Property(property="name", type="string", example="Híbrido"),
 *                 @OA\Property(property="active", type="boolean", example=1),
 *                 @OA\Property(property="deleted", type="integer", example=0),
 *                 @OA\Property(property="created_at", type="string", format="date-time", example="2024-10-10T03:06:57.000000Z"),
 *                 @OA\Property(property="updated_at", type="string", format="date-time", example="2024-10-10T03:06:57.000000Z")
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Não autorizado, Token ausente ou inválido"
 *     ),
 *     @OA\Response(
 *         response=500,
 *         description="Erro interno, não foi possível listar as modalidades de trabalho"
 *     )
 * )
 */
class ListWorkModes
{
}
