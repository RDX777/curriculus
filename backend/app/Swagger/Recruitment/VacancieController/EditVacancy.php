<?php

namespace App\Swagger\Recruitment\VacancieController;

/**
 * @OA\Patch(
 *     path="/api/v1/curriculus/vacancies/edit-vacancy",
 *     tags={"Vacancies"},
 *     summary="Editar dados de uma vaga de emprego",
 *     description="Este endpoint permite editar os dados de uma vaga de emprego. Todos os campos são obrigatórios e o endpoint requer autenticação por token bearer.",
 *     operationId="editVacancy",
 *     security={{"bearerAuth":{}}},
 *     requestBody=@OA\RequestBody(
 *         required=true,
 *         content={
 *             @OA\MediaType(
 *                 mediaType="application/json",
 *                 @OA\Schema(
 *                     type="object",
 *                     @OA\Property(property="uuid", type="string", format="uuid", description="UUID da vaga de emprego", example="30af3b77-85ea-11ef-ab56-0242ac120003"),
 *                     @OA\Property(property="title", type="string", description="Título da vaga", example="Titulo da Vaga asd"),
 *                     @OA\Property(property="shortDescription", type="string", description="Descrição curta da vaga", example="Descrição curta da vaga"),
 *                     @OA\Property(property="longDescription", type="string", description="Descrição longa e com detalhes da vaga", example="Descrição longa e com detalhes da vaga"),
 *                     @OA\Property(property="local", type="string", description="Local da vaga", example="Paulinia"),
 *                     @OA\Property(property="remoteType", type="string", description="Tipo de trabalho remoto", example="Remoto"),
 *                     required={"uuid", "title", "shortDescription", "longDescription", "local", "remoteType"}
 *                 )
 *             )
 *         }
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Vaga editada com sucesso",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Success"),
 *             @OA\Property(property="data", type="integer", example=1)
 *         )
 *     ),
 *     @OA\Response(
 *         response=500,
 *         description="Erro interno, não foi possível salvar a vaga no banco de dados"
 *     )
 * )
 */
class EditVacancy
{
}
