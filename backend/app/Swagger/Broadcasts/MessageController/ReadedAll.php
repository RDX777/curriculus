<?php

namespace App\Swagger\Broadcasts\MessageController;

/**
 * @OA\Put(
 *      path="/api/v1/broadcasting/message/readed/all",
 *      operationId="markAllMessagesAsReaded",
 *      tags={"Broadcasting"},
 *      summary="Marcar todas as mensagem como lidas",
 *      description="Endpoint para marcar todas as mensagens como lidas.",
 *      @OA\Response(
 *          response=204,
 *          description="Mensagem marcada como lida com sucesso"
 *      ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthorized",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Unauthorized")
 *         )
 *     ),
 *     @OA\Parameter(
 *         name="Accept",
 *         in="header",
 *         required=true,
 *         @OA\Schema(type="string", default="application/json")
 *     ),
 *      security={{"bearerAuth":{}}},
 * )
 */

class ReadedAll {}
