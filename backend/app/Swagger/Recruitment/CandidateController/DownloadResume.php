<?php

namespace App\Swagger\Recruitment\CandidateController;

/**
 * @OA\Get(
 *     path="/api/v1/curriculus/candidates/download-resume/{FileName}",
 *     summary="Download do currículo",
 *     tags={"Candidates"},
 *     description="Baixa o currículo do candidato com base no nome do arquivo.",
 *     operationId="downloadResume",
 *     @OA\Parameter(
 *         name="FileName",
 *         in="path",
 *         required=true,
 *         description="Nome do arquivo a ser baixado",
 *         @OA\Schema(
 *             type="string"
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Currículo baixado com sucesso.",
 *         @OA\MediaType(
 *             mediaType="application/pdf",
 *             schema=@OA\Schema(
 *                 type="string",
 *                 format="binary"
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Não autorizado. Token Bearer ausente ou inválido."
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Arquivo não encontrado."
 *     ),
 *     security={
 *         {"bearerAuth": {}}
 *     }
 * )
 */

class DownloadResume
{
}
