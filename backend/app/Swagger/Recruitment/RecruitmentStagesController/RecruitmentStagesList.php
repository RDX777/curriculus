<?php

namespace App\Swagger\Recruitment\RecruitmentStagesController;

/**
 * @OA\Get(
 *     path="/api/v1/curriculus/recruitment-stages/list",
 *     summary="Listagem de estágios de recrutamento",
 *     description="Retorna uma lista de estágios de recrutamento, filtrada pelo parâmetro de status ativo.",
 *     tags={"Recruitment Stages"},
 *     security={{"bearerAuth":{}}},
 *     operationId="listRecruitmentStages",
 *     @OA\Parameter(
 *         name="active",
 *         in="query",
 *         required=false,
 *         description="Filtra os estágios de recrutamento por status ativo. Valores permitidos: all, yes, no.",
 *         @OA\Schema(
 *             type="string",
 *             enum={"all", "yes", "no"},
 *             example="all"
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Lista de estágios de recrutamento retornada com sucesso.",
 *         @OA\JsonContent(
 *             type="array",
 *             @OA\Items(
 *                 type="object",
 *                 @OA\Property(property="id", type="integer", example=1),
 *                 @OA\Property(property="type_recruitment_stage_id", type="integer", example=1),
 *                 @OA\Property(property="description", type="string", example="Triagem"),
 *                 @OA\Property(property="allow_jump", type="boolean", example=false),
 *                 @OA\Property(property="allow_date", type="boolean", example=false),
 *                 @OA\Property(property="active", type="boolean", example=true),
 *                 @OA\Property(property="created_at", type="string", format="date-time", example="2024-10-31T01:43:07.000000Z"),
 *                 @OA\Property(property="updated_at", type="string", format="date-time", example="2024-10-31T01:43:07.000000Z")
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Token inválido ou não fornecido."
 *     )
 * )
 */

class RecruitmentStagesList
{
}
