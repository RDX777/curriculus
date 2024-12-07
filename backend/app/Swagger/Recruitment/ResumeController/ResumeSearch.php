<?php

namespace App\Swagger\Recruitment\ResumeController;

/**
 * @OA\Get(
 *     path="/api/v1/curriculus/resume/search",
 *     summary="Busca um currículo usando como base (like) o nome, cpf, telefone, email e cep",
 *     description="Retorna os detalhes dos currículos encontrados.",
 *     tags={"Resume"},
 *     security={{"bearerAuth":{}}},
 *     operationId="resumeSearch",
 *     @OA\Parameter(
 *         name="item",
 *         in="query",
 *         required=true,
 *         description="Texto a ser procurado",
 *         @OA\Schema(
 *             type="string"
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Lista de currículos encontrados",
 *         @OA\JsonContent(
 *             type="array",
 *             @OA\Items(
 *                 type="object",
 *             @OA\Property(property="id", type="integer", example=1),
 *             @OA\Property(property="uuid", type="string", example="7a82526c-a69d-11ef-af2d-0242ac120002"),
 *             @OA\Property(property="candidate_id", type="integer", example=1),
 *             @OA\Property(property="uuid_vacancy", type="string", example="d3fe11ba-a1e5-11ef-af2d-0242ac120002"),
 *             @OA\Property(property="last_recruitment_stage_id", type="integer", example=1),
 *             @OA\Property(property="indicated_by", type="string", nullable=true, example="null"),
 *             @OA\Property(property="professional_summary", type="string", example="Experiência na área de vendas e atendimento ao público em grandes lojas e redes de varejo."),
 *             @OA\Property(property="academic_background", type="string", example="Ensino médio completo"),
 *             @OA\Property(property="professional_experience", type="string", nullable=true, example="null"),
 *             @OA\Property(property="additional_information", type="string", example="Curso de atendimento ao cliente, Curso de informática básica"),
 *             @OA\Property(property="file", type="string", example="1731943171-1fbc7e96-5f7b-455b-8826-714131f858e4.pdf"),
 *             @OA\Property(property="consent", type="boolean", example=true),
 *             @OA\Property(property="created_at", type="string", format="date-time", example="2024-11-18T15:19:31.000000Z"),
 *             @OA\Property(property="updated_at", type="string", format="date-time", example="2024-11-18T15:19:31.000000Z"),
 *             @OA\Property(
 *                 property="candidate",
 *                 type="object",
 *                 @OA\Property(property="id", type="integer", example=1),
 *                 @OA\Property(property="uuid", type="string", example="8f2acc91-a5c0-11ef-af2d-0242ac120002"),
 *                 @OA\Property(property="name", type="string", example="João Silva"),
 *                 @OA\Property(property="cpf", type="string", example="12345678901"),
 *                 @OA\Property(property="email", type="string", example="joao.silva@example.com"),
 *                 @OA\Property(property="phone", type="string", example="11987654321"),
 *                 @OA\Property(property="cep", type="string", example="12345678"),
 *                 @OA\Property(property="created_at", type="string", format="date-time", example="2024-11-18T15:19:31.000000Z"),
 *                 @OA\Property(property="updated_at", type="string", format="date-time", example="2024-11-18T15:19:31.000000Z")
 *             ),
 *             @OA\Property(
 *                 property="vacancy",
 *                 type="object",
 *                 @OA\Property(property="uuid", type="string", example="d3fe11ba-a1e5-11ef-af2d-0242ac120002"),
 *                 @OA\Property(property="company_id", type="integer", example=2),
 *                 @OA\Property(property="work_mode_id", type="integer", example=2),
 *                 @OA\Property(property="title", type="string", example="Vendedor de Produtos Eletrônicos"),
 *                 @OA\Property(property="short_description", type="string", example="Procuramos vendedor com experiência em produtos eletrônicos para atendimento ao cliente."),
 *                 @OA\Property(property="long_description", type="string", example="O vendedor será responsável por apresentar os produtos, entender as necessidades do cliente e fechar vendas. Requisitos: \n- Ensino médio completo\n- Boa comunicação e proatividade\n- Experiência na área de vendas."),
 *                 @OA\Property(property="active", type="boolean", example=true),
 *                 @OA\Property(property="deleted", type="integer", example=0),
 *                 @OA\Property(property="created_at", type="string", format="date-time", example="2024-11-13T17:36:26.000000Z"),
 *                 @OA\Property(property="updated_at", type="string", format="date-time", example="2024-11-13T17:36:26.000000Z")
 *             ),
 *             @OA\Property(
 *                 property="recruitment_stage",
 *                 type="object",
 *                 @OA\Property(property="id", type="integer", example=1),
 *                 @OA\Property(property="type_recruitment_stage_id", type="integer", example=1),
 *                 @OA\Property(property="description", type="string", example="Triagem de Currículos"),
 *                 @OA\Property(property="allow_jump", type="integer", example=0),
 *                 @OA\Property(property="allow_date", type="integer", example=0),
 *                 @OA\Property(property="active", type="boolean", example=true),
 *                 @OA\Property(property="created_at", type="string", format="date-time", example="2024-11-11T18:26:44.000000Z"),
 *                 @OA\Property(property="updated_at", type="string", format="date-time", example="2024-11-11T18:26:44.000000Z")
 *             )
 *         )
 *      )
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="item é obrigatório",
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
class ResumeSearch
{
}
