<?php

namespace App\Swagger\Recruitment\VacancieController;

/**
 * @OA\Get(
 *     path="/api/v1/curriculus/vacancies/list",
 *     tags={"Vacancies"},
 *     summary="Lista todas as vagas de emprego",
 *     description="Recuperar uma lista de vagas de emprego com a opção de filtrar por status ativo.",
 *     operationId="getVacanciesList",
 *     security={{"bearerAuth":{}}},
 *     @OA\Parameter(
 *         name="active",
 *         in="query",
 *         description="Filtre as vagas por status ativo. Aceita 'yes', 'no', or 'all'.",
 *         required=true,
 *         @OA\Schema(
 *             type="string",
 *             enum={"yes", "no", "all"},
 *             default="all"
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Recuperação de vaga com sucesso",
 *         @OA\JsonContent(
 *             type="array",
 *             @OA\Items(
 *                 @OA\Property(property="uuid", type="string", example="045cff20-86bb-11ef-ab56-0242ac120003"),
 *                 @OA\Property(property="company_id", type="integer", example=1),
 *                 @OA\Property(property="title", type="string", example="Titulo da Vaga"),
 *                 @OA\Property(property="short_description", type="string", example="Breve descrição da vaga"),
 *                 @OA\Property(property="long_description", type="string", example="Descrição detalhada sobre a vaga"),
 *                 @OA\Property(property="work_mode_id", type="integer", example=1),
 *                 @OA\Property(property="active", type="boolean", example=true),
 *                 @OA\Property(property="deleted", type="integer", example=0),
 *                 @OA\Property(property="created_at", type="string", format="date-time", example="2024-10-10T03:52:06.000000Z"),
 *                 @OA\Property(property="updated_at", type="string", format="date-time", example="2024-10-10T03:56:56.000000Z"),
 *                 @OA\Property(property="company", type="object", 
 *                     @OA\Property(property="id", type="integer", example=1),
 *                     @OA\Property(property="name", type="string", example="Nome da empresa"),
 *                     @OA\Property(property="cnpj", type="string", example="99.999.999/9999-99"),
 *                     @OA\Property(property="local", type="string", example="Paulínia"),
 *                     @OA\Property(property="active", type="integer", example=1),
 *                     @OA\Property(property="deleted", type="integer", example=0),
 *                     @OA\Property(property="created_at", type="string", format="date-time", example="2024-10-10T03:06:57.000000Z"),
 *                     @OA\Property(property="updated_at", type="string", format="date-time", example="2024-10-10T03:06:57.000000Z")
 *                 ),
 *                 @OA\Property(property="work_mode", type="object", 
 *                     @OA\Property(property="id", type="integer", example=1),
 *                     @OA\Property(property="name", type="string", example="Híbrido"),
 *                     @OA\Property(property="active", type="integer", example=1),
 *                     @OA\Property(property="deleted", type="integer", example=0),
 *                     @OA\Property(property="created_at", type="string", format="date-time", example="2024-10-10T03:06:57.000000Z"),
 *                     @OA\Property(property="updated_at", type="string", format="date-time", example="2024-10-10T03:06:57.000000Z")
 *                 )
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthorized"
 *     )
 * )
 */

class ListRecruitment
{
}
