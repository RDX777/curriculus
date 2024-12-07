<?php

namespace App\Swagger\Broadcasts\MessageController;

/**
 * @OA\Patch(
 *      path="/api/v1/broadcasting/message/readed/{messageId}",
 *      operationId="markMessageAsReaded",
 *      tags={"Broadcasting"},
 *      summary="Marcar uma mensagem como lida",
 *      description="Endpoint para marcar uma mensagem como lida.",
 *      @OA\Parameter(
 *          name="messageId",
 *          in="path",
 *          required=true,
 *          description="ID da mensagem",
 *          @OA\Schema(
 *              type="integer"
 *          )
 *      ),
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

class Readed {}
