<?php

namespace App\Swagger\Credilus\CredilusController;

/**
 * @OA\Get(
 *     path="/api/v1/credilus/search/name",
 *     summary="Realiza a busca de dados de um cliente pelo nome",
 *     description="Faz a busca de dados no credilus usando o nome do cliente e endereço",
 *     tags={"Credilus"},
 *     operationId="nameCredilus",
 *     @OA\Parameter(
 *         name="name",
 *         in="query",
 *         description="Nome do cliente",
 *         required=true,
 *         @OA\Schema(
 *             type="string",
 *             example="Nome do abençoado"
 *         )
 *     ),
 *     @OA\Parameter(
 *         name="state",
 *         in="query",
 *         description="Estado do cliente",
 *         required=false,
 *         @OA\Schema(
 *             type="string",
 *             example="SP"
 *         )
 *     ),
 *     @OA\Parameter(
 *         name="city",
 *         in="query",
 *         description="Cidade do cliente",
 *         required=false,
 *         @OA\Schema(
 *             type="string",
 *             example="Cidade do consagrado"
 *         )
 *     ),
 *     @OA\Parameter(
 *         name="neighborhood",
 *         in="query",
 *         description="Bairro do cliente",
 *         required=false,
 *         @OA\Schema(
 *             type="string",
 *             example="Bairro"
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
 *                     @OA\Property(property="NOME", type="string", example="Bananildo Pudim"),
 *                     @OA\Property(property="TELEFONE", type="string", example="11987654321"),
 *                     @OA\Property(property="ENDERECO", type="string", example="Rua Kira Yagami"),
 *                     @OA\Property(property="NUMERO", type="string", example="123"),
 *                     @OA\Property(property="COMPLEMENTO", type="string", example="Casa do Riso"),
 *                     @OA\Property(property="BAIRRO", type="string", example="Alegria"),
 *                     @OA\Property(property="CEP", type="string", example="12345678"),
 *                     @OA\Property(property="CIDADE", type="string", example="Risotópolis"),
 *                     @OA\Property(property="UF", type="string", example="RS"),
 *                     @OA\Property(property="CPFCNPJ", type="string", example="12345678901"),
 *                     @OA\Property(property="SEXO", type="string", example="M"),
 *                     @OA\Property(property="MAE", type="string", example="Pérola Fofinha"),
 *                     @OA\Property(property="NASC", type="string", example="19851230"),
 *                     @OA\Property(property="ATUALIZACAO", type="string", example="2022-01-01"),
 *                     @OA\Property(property="OBITO", type="string", example="(NÃO CONSTA ÓBITO)"),
 *                     @OA\Property(property="COMERCIAL", type="object",
 *                         @OA\Property(property="EMPRESA", type="array",
 *                             @OA\Items(type="string", example="01234567890123"),
 *                             @OA\Items(type="string", example="98765432109876")
 *                         )
 *                     ),
 *                     @OA\Property(property="VEICULO", type="string", example="(POSSUI VEÍCULO)"),
 *                     @OA\Property(property="IPTU", type="string", example="(NÃO TEM)"),
 *                     @OA\Property(property="OPERADORA", type="string", example="VIVO"),
 *                     @OA\Property(property="DTINSTALACAO", type="string", example="2023-04-01"),
 *                     @OA\Property(property="PROCON", type="string", example="(NAO TEM)"),
 *                     @OA\Property(property="EMAILS", type="string", example="bananildo@example.com"),
 *                     @OA\Property(property="EMPRESASOCIO", type="string", example="Cia. das Anedotas"),
 *                     @OA\Property(property="CNPJEMPRESASOCIO", type="string", example="01234567890123"),
 *                     @OA\Property(property="TELEMPRESASOCIO", type="string", example="11987654321"),
 *                     @OA\Property(property="ENDEREMPRESASOCIO", type="string", example="Rua Kira Yagami"),
 *                     @OA\Property(property="ENDERNUMEMPRESASOCIO", type="string", example="456"),
 *                     @OA\Property(property="ENDERCOMPEMPRESASOCIO", type="string", example="Sala 201"),
 *                     @OA\Property(property="ENDERBAIRROEMPRESASOCIO", type="string", example="Alegria"),
 *                     @OA\Property(property="ENDERCIDADEEMPRESASOCIO", type="string", example="Risotópolis"),
 *                     @OA\Property(property="ENDERUFEMPRESASOCIO", type="string", example="RS"),
 *                     @OA\Property(property="SOCIEDADES", type="object",
 *                         @OA\Property(property="SOCIEDADESNOMEEMPRESA", type="string", example="Empresa da Gargalhada"),
 *                         @OA\Property(property="SOCIEDADESCNPJ", type="string", example="98765432109876")
 *                     ),
 *                     @OA\Property(property="whatsapp", type="string", example="1")
 *                 ),
 *                 @OA\Items(
 *                     @OA\Property(property="CONTADOR", type="string", example="2"),
 *                     @OA\Property(property="NOME", type="string", example="Margarida Pamonha"),
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
 *     @OA\Response(
 *         response=404,
 *         description="Client not found",
 *         @OA\JsonContent(
 *             @OA\Property(property="statusCode", type="int", example=404),
 *             @OA\Property(property="message", type="string", example="A client name not found")
 *         )
 *     ),
 *     security={{"bearerAuth": {}}}
 * )
 */

class SearchByNameCredilus {}
