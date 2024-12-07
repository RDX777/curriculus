<?php

namespace App\Swagger\Recruitment\CandidateController;

/**
 * @OA\Get(
 *     path="/api/v1/curriculus/candidates/get-resume-stage-history",
 *     summary="Histórico de estágios de recrutamento do currículo",
 *     description="Retorna o histórico de estágios de recrutamento para um currículo específico de um candidato.",
 *     tags={"Candidates"},
 *     security={{"bearerAuth":{}}},
 *     operationId="getResumeStageHistory",
 *     @OA\Parameter(
 *         name="candidate-id",
 *         in="query",
 *         required=true,
 *         description="ID do candidato",
 *         @OA\Schema(type="integer", example=1)
 *     ),
 *     @OA\Parameter(
 *         name="vacancy-uuid",
 *         in="query",
 *         required=true,
 *         description="UUID da vaga",
 *         @OA\Schema(type="string", format="uuid", example="dd420995-cb9c-3eed-b0f0-adf409e27c8a")
 *     ),
 *     @OA\Parameter(
 *         name="resume-id",
 *         in="query",
 *         required=true,
 *         description="ID do currículo",
 *         @OA\Schema(type="integer", example=1)
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Histórico de estágios de recrutamento retornado com sucesso.",
 *         @OA\JsonContent(
 *             type="array",
 *             @OA\Items(
 *                 type="object",
 *                 @OA\Property(property="id", type="integer", example=21),
 *                 @OA\Property(property="candidate_id", type="integer", example=1),
 *                 @OA\Property(property="uuid_vacancy", type="string", format="uuid", example="dd420995-cb9c-3eed-b0f0-adf409e27c8a"),
 *                 @OA\Property(property="recruitment_stage_id", type="integer", example=2),
 *                 @OA\Property(property="resume_id", type="integer", example=1),
 *                 @OA\Property(property="observation", type="string", example="lorem"),
 *                 @OA\Property(property="login_user", type="string", example="anderson.tome"),
 *                 @OA\Property(property="name_user", type="string", example="Anderson Silva Tome"),
 *                 @OA\Property(property="start_in", type="string", format="date-time", example="2024-10-31 00:00:00"),
 *                 @OA\Property(property="end_in", type="string", format="date-time", example="2024-10-31 00:01:00"),
 *                 @OA\Property(property="created_at", type="string", format="date-time", example="2024-10-31T03:55:44.000000Z"),
 *                 @OA\Property(property="updated_at", type="string", format="date-time", example="2024-10-31T03:55:44.000000Z"),
 *                 @OA\Property(
 *                     property="recruitment_stage",
 *                     type="object",
 *                     @OA\Property(property="id", type="integer", example=2),
 *                     @OA\Property(property="type_recruitment_stage_id", type="integer", example=2),
 *                     @OA\Property(property="description", type="string", example="Análise e Seleção"),
 *                     @OA\Property(property="allow_jump", type="boolean", example=false),
 *                     @OA\Property(property="allow_date", type="boolean", example=false),
 *                     @OA\Property(property="active", type="boolean", example=true),
 *                     @OA\Property(property="created_at", type="string", format="date-time", example="2024-10-31T01:43:08.000000Z"),
 *                     @OA\Property(property="updated_at", type="string", format="date-time", example="2024-10-31T01:43:08.000000Z")
 *                 )
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Token inválido ou não fornecido."
 *     )
 * )
 */

class GetResumeStageHistory
{
}
