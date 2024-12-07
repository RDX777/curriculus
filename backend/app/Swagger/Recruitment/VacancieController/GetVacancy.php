<?php

namespace App\Swagger\Recruitment\VacancieController;

/**
 * @OA\Get(
 *     path="/api/v1/curriculus/vacancies/get-vacancy",
 *     tags={"Vacancies"},
 *     summary="Obter uma vaga de emprego pelo UUID",
 *     description="Recupera uma vaga de emprego específica pelo seu UUID.",
 *     operationId="getVacancyByUuid",
 *     security={{"bearerAuth":{}}},
 *     @OA\Parameter(
 *         name="uuid",
 *         in="query",
 *         description="UUID da vaga de emprego a ser recuperada.",
 *         required=true,
 *         @OA\Schema(
 *             type="string",
 *             format="uuid",
 *             example="30af3b77-85ea-11ef-ab56-0242ac120003"
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Recuperação bem-sucedida da vaga",
 *         @OA\JsonContent(
 *             @OA\Property(property="uuid", type="string", example="30af3b77-85ea-11ef-ab56-0242ac120003"),
 *             @OA\Property(property="title", type="string", example="Título da Vaga asd"),
 *             @OA\Property(property="short_description", type="string", example="Descrição curta da vaga"),
 *             @OA\Property(property="long_description", type="string", example="Descrição longa e com detalhes da vaga"),
 *             @OA\Property(property="local", type="string", example="Paulinia"),
 *             @OA\Property(property="remote_type", type="string", example="Remoto"),
 *             @OA\Property(property="active", type="boolean", example=true),
 *             @OA\Property(property="deleted", type="integer", example=1),
 *             @OA\Property(property="created_at", type="string", format="date-time", example="2024-10-09T02:57:15.000000Z"),
 *             @OA\Property(property="updated_at", type="string", format="date-time", example="2024-10-09T04:26:44.000000Z")
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Não autorizado, Token ausente ou inválido"
 *     )
 * )
 */

class GetVacancy
{
}
