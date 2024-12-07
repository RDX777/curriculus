<?php

namespace App\Swagger\Recruitment\VacancieController;

/**
 * @OA\Post(
 *     path="/api/v1/curriculus/vacancies/store-vacancy",
 *     tags={"Vacancies"},
 *     summary="Salvar dados de uma vaga de emprego",
 *     description="Este endpoint permite salvar os dados de uma vaga de emprego. Todos os campos são obrigatórios e o endpoint requer autenticação por token bearer.",
 *     operationId="storeVacancy",
 *     security={{"bearerAuth":{}}},
 *     requestBody=@OA\RequestBody(
 *         required=true,
 *         content={
 *             @OA\MediaType(
 *                 mediaType="application/json",
 *                 @OA\Schema(
 *                     type="object",
 *                     @OA\Property(property="title", type="string", description="Título da vaga", example="Titulo da Vaga"),
 *                     @OA\Property(property="shortDescription", type="string", description="Descrição curta da vaga", example="Descrição curta da vaga"),
 *                     @OA\Property(property="longDescription", type="string", description="Descrição longa e com detalhes da vaga", example="Descrição longa e com detalhes da vaga"),
 *                     @OA\Property(property="local", type="string", description="Local da vaga", example="Paulinia"),
 *                     @OA\Property(property="remoteType", type="string", description="Tipo de trabalho remoto", example="Remoto"),
 *                     required={"title", "shortDescription", "longDescription", "local", "remoteType"}
 *                 )
 *             )
 *         }
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Vaga salva com sucesso",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Success"),
 *             @OA\Property(property="data", type="object",
 *                 @OA\Property(property="title", type="string", example="Titulo da Vaga"),
 *                 @OA\Property(property="short_description", type="string", example="Descrição curta da vaga"),
 *                 @OA\Property(property="long_description", type="string", example="Descrição longa e com detalhes da vaga"),
 *                 @OA\Property(property="local", type="string", example="Paulinia"),
 *                 @OA\Property(property="remote_type", type="string", example="Remoto"),
 *                 @OA\Property(property="updated_at", type="string", format="date-time", example="2024-10-09T03:13:26.000000Z"),
 *                 @OA\Property(property="created_at", type="string", format="date-time", example="2024-10-09T03:13:26.000000Z"),
 *                 @OA\Property(property="id", type="integer", example=0)
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=500,
 *         description="Erro interno, não foi possível salvar a vaga no banco de dados"
 *     )
 * )
 */
class StoreVacancy
{
}
