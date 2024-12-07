<?php

namespace App\Swagger\Recruitment\RecruitmentStagesController;

/**
 * @OA\Get(
 *     path="/api/v1/curriculus/recruitment-stages/list-candidate-by-stage",
 *     summary="Lista de candidatos por estágio de recrutamento",
 *     description="Retorna uma lista de candidatos associados a um estágio específico de recrutamento.",
 *     tags={"Recruitment Stages"},
 *     security={{"bearerAuth":{}}},
 *     operationId="listCandidatesByStage",
 *     @OA\Parameter(
 *         name="recruitment-stage-id",
 *         in="query",
 *         required=true,
 *         description="ID do estágio de recrutamento para listar candidatos.",
 *         @OA\Schema(
 *             type="integer",
 *             example=1
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Lista de candidatos e suas informações associadas ao estágio retornada com sucesso.",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="id", type="integer", example=1),
 *             @OA\Property(property="type_recruitment_stage_id", type="integer", example=1),
 *             @OA\Property(property="description", type="string", example="Triagem"),
 *             @OA\Property(property="allow_jump", type="boolean", example=false),
 *             @OA\Property(property="allow_date", type="boolean", example=false),
 *             @OA\Property(property="active", type="boolean", example=true),
 *             @OA\Property(property="created_at", type="string", format="date-time", example="2024-10-31T01:43:07.000000Z"),
 *             @OA\Property(property="updated_at", type="string", format="date-time", example="2024-10-31T01:43:07.000000Z"),
 *             @OA\Property(
 *                 property="resumes",
 *                 type="array",
 *                 @OA\Items(
 *                     type="object",
 *                     @OA\Property(property="id", type="integer", example=1),
 *                     @OA\Property(property="candidate_id", type="integer", example=1),
 *                     @OA\Property(property="uuid_vacancy", type="string", format="uuid", example="dd420995-cb9c-3eed-b0f0-adf409e27c8a"),
 *                     @OA\Property(property="last_recruitment_stage_id", type="integer", example=1),
 *                     @OA\Property(property="indicated_by", type="string", example="Josué Lovato Cordeiro"),
 *                     @OA\Property(property="professional_summary", type="string", example="Voluptas voluptatem non et et ut illum fugiat corrupti."),
 *                     @OA\Property(property="academic_background", type="string", example="Aut veritatis similique et et aut quo quod."),
 *                     @OA\Property(property="professional_experience", type="string", example="Dolor vel vel libero quas qui ut et."),
 *                     @OA\Property(property="additional_information", type="string", example="Cupiditate consequatur ducimus fuga et reiciendis."),
 *                     @OA\Property(property="file", type="string", nullable=true),
 *                     @OA\Property(property="consent", type="boolean", example=true),
 *                     @OA\Property(property="created_at", type="string", format="date-time", example="2024-10-25T22:47:23.000000Z"),
 *                     @OA\Property(property="updated_at", type="string", format="date-time", example="2024-10-28T23:32:18.000000Z"),
 *                     @OA\Property(
 *                         property="candidate",
 *                         type="object",
 *                         @OA\Property(property="id", type="integer", example=1),
 *                         @OA\Property(property="uuid", type="string", format="uuid", example="a29fee0f-36d9-3132-adcf-26e20cfe8e38"),
 *                         @OA\Property(property="name", type="string", example="Dr. Benjamin Agostinho Faro"),
 *                         @OA\Property(property="cpf", type="string", example="419756563"),
 *                         @OA\Property(property="email", type="string", format="email", example="molina.melissa@uol.com.br"),
 *                         @OA\Property(property="phone", type="string", example="(14) 93489-7190"),
 *                         @OA\Property(property="cep", type="string", example="363971387"),
 *                         @OA\Property(property="created_at", type="string", format="date-time", example="2024-10-25T22:47:01.000000Z"),
 *                         @OA\Property(property="updated_at", type="string", format="date-time", example="2024-10-25T22:47:01.000000Z")
 *                     ),
 *                     @OA\Property(
 *                         property="vacancy",
 *                         type="object",
 *                         @OA\Property(property="uuid", type="string", format="uuid", example="dd420995-cb9c-3eed-b0f0-adf409e27c8a"),
 *                         @OA\Property(property="company_id", type="integer", example=3),
 *                         @OA\Property(property="work_mode_id", type="integer", example=2),
 *                         @OA\Property(property="title", type="string", example="Vendedor de Pastel"),
 *                         @OA\Property(property="short_description", type="string", example="Et quidem ab non porro."),
 *                         @OA\Property(property="long_description", type="string", example="Ut dolorem est ullam assumenda quia."),
 *                         @OA\Property(property="active", type="boolean", example=true),
 *                         @OA\Property(property="deleted", type="boolean", example=false),
 *                         @OA\Property(property="created_at", type="string", format="date-time", example="2024-10-25T22:46:42.000000Z"),
 *                         @OA\Property(property="updated_at", type="string", format="date-time", example="2024-10-28T17:16:03.000000Z")
 *                     )
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

class ListCandidateByStage
{
}
