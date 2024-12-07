<?php

namespace App\Swagger\Recruitment\ResumeStageHistoriesController;

/**
 * @OA\Post(
 *     path="/api/v1/curriculus/resume-stage-histories/save",
 *     summary="Salvar histórico de estágio de currículo",
 *     description="Este endpoint permite salvar um histórico de estágio de currículo.",
 *     tags={"Resume Stage Histories"},
 *     security={{"bearerAuth":{}}},
 *     operationId="saveResumeStageHistory",
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"candidateId", "vacancyUuid", "recruitmentStageId", "resumeId"},
 *             @OA\Property(property="candidateId", type="integer", example=1),
 *             @OA\Property(property="vacancyUuid", type="string", format="uuid", example="dd420995-cb9c-3eed-b0f0-adf409e27c8a"),
 *             @OA\Property(property="recruitmentStageId", type="integer", example=12),
 *             @OA\Property(property="resumeId", type="integer", example=1),
 *             @OA\Property(property="observation", type="string", example="Observação", nullable=true),
 *             @OA\Property(property="startTime", type="string", format="date-time", example="2024-10-31T20:20", nullable=true),
 *             @OA\Property(property="endTime", type="string", format="date-time", example="2024-10-31T20:21", nullable=true)
 *         )
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Histórico de estágio salvo com sucesso.",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="candidate_id", type="integer", example=1),
 *             @OA\Property(property="uuid_vacancy", type="string", format="uuid", example="dd420995-cb9c-3eed-b0f0-adf409e27c8a"),
 *             @OA\Property(property="recruitment_stage_id", type="integer", example=12),
 *             @OA\Property(property="resume_id", type="integer", example=1),
 *             @OA\Property(property="observation", type="string", example="Observação"),
 *             @OA\Property(property="login_user", type="string", example="nengue"),
 *             @OA\Property(property="name_user", type="string", example="Nengue Login"),
 *             @OA\Property(property="start_in", type="string", format="date-time", example="2024-10-31T20:20"),
 *             @OA\Property(property="end_in", type="string", format="date-time", example="2024-10-31T20:21"),
 *             @OA\Property(property="updated_at", type="string", format="date-time", example="2024-10-31T04:33:00.000000Z"),
 *             @OA\Property(property="created_at", type="string", format="date-time", example="2024-10-31T04:33:00.000000Z"),
 *             @OA\Property(property="id", type="integer", example=22)
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Token inválido ou não fornecido."
 *     )
 * )
 */

class ResumeStageHistoriesSave
{
}
