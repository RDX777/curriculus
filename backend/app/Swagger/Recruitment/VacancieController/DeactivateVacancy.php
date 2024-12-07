<?php

namespace App\Swagger\Recruitment\VacancieController;

/**
 * @OA\Patch(
 *     path="/api/v1/curriculus/vacancies/deactivate-vacancy",
 *     tags={"Vacancies"},
 *     summary="Desativar ou reativar uma vaga de emprego",
 *     description="Este endpoint permite desativar ou reativar uma vaga de emprego. O campo 'uuid' é obrigatório e o endpoint requer autenticação por token bearer.",
 *     operationId="deactivateVacancy",
 *     security={{"bearerAuth":{}}},
 *     requestBody=@OA\RequestBody(
 *         required=true,
 *         content={
 *             @OA\MediaType(
 *                 mediaType="application/json",
 *                 @OA\Schema(
 *                     type="object",
 *                     @OA\Property(property="uuid", type="string", format="uuid", description="UUID da vaga de emprego", example="30af3b77-85ea-11ef-ab56-0242ac120003"),
 *                     required={"uuid"}
 *                 )
 *             )
 *         }
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Vaga desativada ou reativada com sucesso",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Success"),
 *             @OA\Property(property="data", type="object",
 *                 @OA\Property(property="uuid", type="string", format="uuid", example="30af3b77-85ea-11ef-ab56-0242ac120003"),
 *                 @OA\Property(property="title", type="string", example="Titulo da Vaga asd"),
 *                 @OA\Property(property="short_description", type="string", example="Descrição curta da vaga"),
 *                 @OA\Property(property="long_description", type="string", example="Descrição longa e com detalhes da vaga"),
 *                 @OA\Property(property="local", type="string", example="Paulinia"),
 *                 @OA\Property(property="remote_type", type="string", example="Remoto"),
 *                 @OA\Property(property="active", type="boolean", example=false),
 *                 @OA\Property(property="deleted", type="integer", example=0),
 *                 @OA\Property(property="created_at", type="string", format="date-time", example="2024-10-09T02:57:15.000000Z"),
 *                 @OA\Property(property="updated_at", type="string", format="date-time", example="2024-10-09T04:10:35.000000Z")
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=500,
 *         description="Erro interno, não foi possível salvar a alteração no banco de dados"
 *     )
 * )
 */
class DeactivateVacancy
{
}
