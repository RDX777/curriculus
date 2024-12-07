<?php

namespace App\Swagger\Recruitment\CandidateController;

/**
 * @OA\Post(
 *     path="/api/v1/curriculus/candidates/store-candidate",
 *     tags={"Candidates"},
 *     summary="Salvar dados de um candidato a vaga de emprego",
 *     description="Este endpoint permite salvar os dados de um candidato a uma vaga de emprego. O Content-Type é multipart/form-data e a variável 'file' é um arquivo que deve ser enviado (PDF ou DOC/DOCX, máximo 2 MB).",
 *     operationId="storeCandidate",
 *     security={{"bearerAuth":{}}},
 *     requestBody=@OA\RequestBody(
 *         required=true,
 *         content={
 *             @OA\MediaType(
 *                 mediaType="multipart/form-data",
 *                 @OA\Schema(
 *                     type="object",
 *                     @OA\Property(property="vacancie", type="string", format="uuid", description="UUID da vaga de emprego", example="73683633-85ec-11ef-ab56-0242ac120003"),
 *                     @OA\Property(property="name", type="string", description="Nome do candidato", example="Nome do Candidato"),
 *                     @OA\Property(property="cpf", type="string", description="CPF do candidato (somente números)", example="11111111111"),
 *                     @OA\Property(property="email", type="string", format="email", description="Email do candidato", example="asd@asd.com"),
 *                     @OA\Property(property="phone", type="string", description="Telefone do candidato (somente números)", example="19999999999"),
 *                     @OA\Property(property="cep", type="string", description="CEP do candidato", example="99999999"),
 *                     @OA\Property(property="professionalSummary", type="string", description="Resumo profissional do candidato (máximo de 5000 caracteres)", maxLength=5000, example="Resumo Profissional do candidato"),
 *                     @OA\Property(property="academicBackground", type="string", description="Formação acadêmica do candidato (máximo de 5000 caracteres)", maxLength=5000, example="Formação acadêmica do candidato"),
 *                     @OA\Property(property="professionalExperience", type="string", description="Experiência profissional do candidato (máximo de 5000 caracteres)", maxLength=5000, example="Experiência profissional"),
 *                     @OA\Property(property="additionalInformation", type="string", description="Informações adicionais sobre o candidato (máximo de 5000 caracteres)", maxLength=5000, example="Informações adicionais do candidato"),
 *                     @OA\Property(property="file", type="string", format="binary", description="Currículo do candidato (PDF ou DOC/DOCX, máximo de 2 MB)"),
 *                     @OA\Property(property="consent", type="boolean", description="Consentimento do candidato", example=true),
 *                     required={"vacancie", "name", "cpf", "email", "phone", "cep", "consent"}
 *                 )
 *             )
 *         }
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Candidato salvo com sucesso",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Success"),
 *             @OA\Property(property="data", type="object",
 *                 @OA\Property(property="candidate_id", type="integer", example=1),
 *                 @OA\Property(property="uuid_vacancy", type="string", example="73683633-85ec-11ef-ab56-0242ac120003"),
 *                 @OA\Property(property="professional_summary", type="string", example="Resumo Profissional do candidato"),
 *                 @OA\Property(property="academic_background", type="string", example="Formação academica do candidato"),
 *                 @OA\Property(property="professional_experience", type="string", example="Experiencia profissional"),
 *                 @OA\Property(property="additional_information", type="string", example="Informações adicionais do candidato"),
 *                 @OA\Property(property="file", type="string", nullable=true, example=null),
 *                 @OA\Property(property="consent", type="boolean", example=true),
 *                 @OA\Property(property="updated_at", type="string", format="date-time", example="2024-10-09T14:47:10.000000Z"),
 *                 @OA\Property(property="created_at", type="string", format="date-time", example="2024-10-09T14:47:10.000000Z"),
 *                 @OA\Property(property="id", type="integer", example=4)
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Não autorizado, Token ausente ou inválido"
 *     ),
 *     @OA\Response(
 *         response=500,
 *         description="Erro interno, não foi possível salvar o candidato no banco de dados"
 *     )
 * )
 */
class StoreCandidate
{
}
