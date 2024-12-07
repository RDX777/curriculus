<?php

namespace App\Swagger\Credilus\CredilusController;

/**
 * @OA\Get(
 *     path="/api/v1/credilus/search/email",
 *     summary="Realiza a busca de dados usando email",
 *     description="Faz a busca de dados usando nemail",
 *     tags={"Credilus"},
 *     operationId="emailWSDLCredilink",
 *     @OA\Parameter(
 *         name="email",
 *         in="query",
 *         description="Email do cliente a ser buscado",
 *         required=true,
 *         @OA\Schema(
 *             type="string",
 *             example="asd@asd.com"
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Sucesso",
 *         @OA\JsonContent(
 *             @OA\Property(property="statusCode", type="integer", example=200),
 *             @OA\Property(property="data", type="array",
 *                 @OA\Items(
 *                     @OA\Property(property="CONTADOR", type="string", example="1"),
 *                     @OA\Property(property="NOME", type="string", example="NOME ABENÇOADO"),
 *                     @OA\Property(property="TELEFONE", type="string", example="00999999999"),
 *                     @OA\Property(property="ENDERECO", type="string", example="NOME DA RUA"),
 *                     @OA\Property(property="NUMERO", type="string", example="666"),
 *                     @OA\Property(property="COMPLEMENTO", type="string", example="COMPLEMENTO"),
 *                     @OA\Property(property="BAIRRO", type="string", example="BAIRRO"),
 *                     @OA\Property(property="CEP", type="string", example="99999999"),
 *                     @OA\Property(property="CIDADE", type="string", example="CIDADE"),
 *                     @OA\Property(property="UF", type="string", example="UF"),
 *                     @OA\Property(property="CPFCNPJ", type="string", example="11111111111"),
 *                     @OA\Property(property="SEXO", type="string", example="FEMININO"),
 *                     @OA\Property(property="MAE", type="string", example="NOME DA MÃE"),
 *                     @OA\Property(property="NASC", type="string", example="00000000"),
 *                     @OA\Property(property="ATUALIZACAO", type="string", example="CAT"),
 *                 )
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthorized",
 *         @OA\JsonContent(
 *             @OA\Property(property="statusCode", type="integer", example=401),
 *             @OA\Property(property="message", type="string", example="Unauthorized")
 *         )
 *     ),
 *     security={{"bearerAuth": {}}}
 * )
 */

class SearchByEmailCredilus {}
