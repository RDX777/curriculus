<?php

namespace App\Swagger\Recruitment\CandidateController;

/**
 * @OA\Get(
 *     path="/api/v1/curriculus/candidates/list",
 *     summary="Listagem de candidatos",
 *     description="Retorna uma lista de candidatos.",
 *     tags={"Candidates"},
 *     security={{"bearerAuth":{}}},
 *     @OA\Response(
 *         response=200,
 *         description="Lista de candidatos retornada com sucesso.",
 *         @OA\JsonContent(
 *             type="array",
 *             @OA\Items(
 *                 type="object",
 *                 @OA\Property(property="id", type="integer", example=1),
 *                 @OA\Property(property="uuid", type="string", format="uuid", example="a29fee0f-36d9-3132-adcf-26e20cfe8e38"),
 *                 @OA\Property(property="name", type="string", example="Dr. Benjamin Agostinho Faro"),
 *                 @OA\Property(property="cpf", type="string", example="419756563"),
 *                 @OA\Property(property="email", type="string", format="email", example="molina.melissa@uol.com.br"),
 *                 @OA\Property(property="phone", type="string", example="(14) 93489-7190"),
 *                 @OA\Property(property="cep", type="string", example="363971387"),
 *                 @OA\Property(property="created_at", type="string", format="date-time", example="2024-10-25T22:47:01.000000Z"),
 *                 @OA\Property(property="updated_at", type="string", format="date-time", example="2024-10-25T22:47:01.000000Z")
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Token inválido ou não fornecido."
 *     )
 * )
 */

class CandidateList
{
}
