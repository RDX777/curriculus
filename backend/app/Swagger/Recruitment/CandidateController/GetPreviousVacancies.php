<?php

namespace App\Swagger\Recruitment\CandidateController;

/**
 * @OA\Get(
 *     path="/api/v1/curriculus/candidates/get-previous-vacancies",
 *     summary="Obter vagas anteriores de um candidato",
 *     description="Retorna as vagas anteriores associadas a um candidato específico.",
 *     tags={"Candidates"},
 *     security={{"bearerAuth":{}}},
 *     @OA\Parameter(
 *         name="candidate-id",
 *         in="query",
 *         required=true,
 *         description="ID do candidato para obter as vagas anteriores",
 *         @OA\Schema(type="integer", example=1)
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Vagas anteriores do candidato retornadas com sucesso.",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="id", type="integer", example=1),
 *             @OA\Property(property="uuid", type="string", format="uuid", example="a29fee0f-36d9-3132-adcf-26e20cfe8e38"),
 *             @OA\Property(property="name", type="string", example="Dr. Benjamin Agostinho Faro"),
 *             @OA\Property(property="cpf", type="string", example="419756563"),
 *             @OA\Property(property="email", type="string", format="email", example="molina.melissa@uol.com.br"),
 *             @OA\Property(property="phone", type="string", example="(14) 93489-7190"),
 *             @OA\Property(property="cep", type="string", example="363971387"),
 *             @OA\Property(property="created_at", type="string", format="date-time", example="2024-10-25T22:47:01.000000Z"),
 *             @OA\Property(property="updated_at", type="string", format="date-time", example="2024-10-25T22:47:01.000000Z"),
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
 *                     @OA\Property(property="professional_summary", type="string", example="Resumo profissional do candidato..."),
 *                     @OA\Property(property="academic_background", type="string", example="Formação acadêmica do candidato..."),
 *                     @OA\Property(property="professional_experience", type="string", example="Experiência profissional do candidato..."),
 *                     @OA\Property(property="additional_information", type="string", example="Informações adicionais sobre o candidato..."),
 *                     @OA\Property(property="file", type="string", nullable=true, example=null),
 *                     @OA\Property(property="consent", type="boolean", example=true),
 *                     @OA\Property(property="created_at", type="string", format="date-time", example="2024-10-25T22:47:23.000000Z"),
 *                     @OA\Property(property="updated_at", type="string", format="date-time", example="2024-10-28T23:32:18.000000Z"),
 *                     @OA\Property(
 *                         property="recruitment_stage",
 *                         type="object",
 *                         @OA\Property(property="id", type="integer", example=1),
 *                         @OA\Property(property="type_recruitment_stage_id", type="integer", example=1),
 *                         @OA\Property(property="description", type="string", example="Triagem"),
 *                         @OA\Property(property="allow_jump", type="boolean", example=false),
 *                         @OA\Property(property="allow_date", type="boolean", example=false),
 *                         @OA\Property(property="active", type="boolean", example=true),
 *                         @OA\Property(property="created_at", type="string", format="date-time", example="2024-10-31T01:43:07.000000Z"),
 *                         @OA\Property(property="updated_at", type="string", format="date-time", example="2024-10-31T01:43:07.000000Z"),
 *                         @OA\Property(
 *                             property="type_recruitment_stage",
 *                             type="object",
 *                             @OA\Property(property="id", type="integer", example=1),
 *                             @OA\Property(property="description", type="string", example="Triagem"),
 *                             @OA\Property(property="active", type="boolean", example=true),
 *                             @OA\Property(property="created_at", type="string", format="date-time", example="2024-10-31T01:43:07.000000Z"),
 *                             @OA\Property(property="updated_at", type="string", format="date-time", example="2024-10-31T01:43:07.000000Z")
 *                         )
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

class GetPreviousVacancies
{
}