<?php

namespace App\Swagger\Recruitment\ResumeController;

/**
 * @OA\Get(
 *     path="/api/v1/curriculus/resume/search-uuid",
 *     summary="Busca um currículo por UUID",
 *     description="Retorna os detalhes de um currículo baseado no UUID fornecido.",
 *     tags={"Resume"},
 *     security={{"bearerAuth":{}}}, 
 *     operationId="resumeSearchByUuid",
 *     @OA\Parameter(
 *         name="uuid",
 *         in="query",
 *         required=true,
 *         description="UUID do currículo a ser buscado",
 *         @OA\Schema(
 *             type="string",
 *             format="uuid"
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Currículo encontrado com sucesso",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="id", type="integer", example=1),
 *             @OA\Property(property="uuid", type="string", example="d3e54ab1-6d60-4a45-bf87-c3a5f6de564a"),
 *             @OA\Property(property="candidate_id", type="integer", example=100),
 *             @OA\Property(property="uuid_vacancy", type="string", example="e1a3e5ab-7c8f-4419-9998-c0b978ff0639"),
 *             @OA\Property(property="last_recruitment_stage_id", type="integer", example=2),
 *             @OA\Property(property="indicated_by", type="string", nullable=true, example="null"),
 *             @OA\Property(property="professional_summary", type="string", example="Experiência em atendimento ao cliente e suporte técnico."),
 *             @OA\Property(property="academic_background", type="string", example="Ensino médio completo"),
 *             @OA\Property(property="professional_experience", type="string", nullable=true, example="null"),
 *             @OA\Property(property="additional_information", type="string", example="Curso de inglês avançado."),
 *             @OA\Property(property="file", type="string", example="test_document_1234.pdf"),
 *             @OA\Property(property="consent", type="boolean", example=true),
 *             @OA\Property(property="created_at", type="string", format="date-time", example="2024-11-19T12:30:00.000000Z"),
 *             @OA\Property(property="updated_at", type="string", format="date-time", example="2024-11-19T12:30:00.000000Z"),
 *             @OA\Property(
 *                 property="candidate",
 *                 type="object",
 *                 @OA\Property(property="id", type="integer", example=100),
 *                 @OA\Property(property="uuid", type="string", example="6a1a2b3c-d4d6-4789-b654-a5f03e7fe1f4"),
 *                 @OA\Property(property="name", type="string", example="JOÃO DA SILVA"),
 *                 @OA\Property(property="cpf", type="string", example="12345678900"),
 *                 @OA\Property(property="email", type="string", example="joao.silva@example.com"),
 *                 @OA\Property(property="phone", type="string", example="21987654321"),
 *                 @OA\Property(property="cep", type="string", example="22222222"),
 *                 @OA\Property(property="created_at", type="string", format="date-time", example="2024-11-19T12:30:00.000000Z"),
 *                 @OA\Property(property="updated_at", type="string", format="date-time", example="2024-11-19T12:30:00.000000Z")
 *             ),
 *             @OA\Property(
 *                 property="vacancy",
 *                 type="object",
 *                 @OA\Property(property="uuid", type="string", example="e1a3e5ab-7c8f-4419-9998-c0b978ff0639"),
 *                 @OA\Property(property="company_id", type="integer", example=2),
 *                 @OA\Property(property="work_mode_id", type="integer", example=1),
 *                 @OA\Property(property="title", type="string", example="Desenvolvedor Frontend"),
 *                 @OA\Property(property="short_description", type="string", example="Buscamos um profissional com experiência em React."),
 *                 @OA\Property(property="long_description", type="string", example="O desenvolvedor frontend será responsável pela criação de interfaces web."),
 *                 @OA\Property(property="active", type="boolean", example=true),
 *                 @OA\Property(property="deleted", type="integer", example=0),
 *                 @OA\Property(property="created_at", type="string", format="date-time", example="2024-11-19T12:30:00.000000Z"),
 *                 @OA\Property(property="updated_at", type="string", format="date-time", example="2024-11-19T12:30:00.000000Z")
 *             ),
 *             @OA\Property(
 *                 property="recruitment_stage",
 *                 type="object",
 *                 @OA\Property(property="id", type="integer", example=2),
 *                 @OA\Property(property="type_recruitment_stage_id", type="integer", example=1),
 *                 @OA\Property(property="description", type="string", example="Entrevista Técnica"),
 *                 @OA\Property(property="allow_jump", type="integer", example=0),
 *                 @OA\Property(property="allow_date", type="integer", example=0),
 *                 @OA\Property(property="active", type="boolean", example=true),
 *                 @OA\Property(property="created_at", type="string", format="date-time", example="2024-11-19T12:30:00.000000Z"),
 *                 @OA\Property(property="updated_at", type="string", format="date-time", example="2024-11-19T12:30:00.000000Z")
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="UUID é obrigatório",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="error", type="string", example="UUID é obrigatório.")
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Token de autenticação inválido",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="error", type="string", example="Token de autenticação inválido.")
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Currículo não encontrado",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="error", type="string", example="Currículo não encontrado para o UUID fornecido.")
 *         )
 *     ),
 *     @OA\Response(
 *         response=500,
 *         description="Erro interno no servidor",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="error", type="string", example="Erro interno no servidor. Tente novamente mais tarde.")
 *         )
 *     )
 * )
 */

class SearchByUuid
{
}
