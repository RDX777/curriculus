<?php

namespace App\Swagger\Broadcasts\MessageController;

/**
 * @OA\Post(
 *     path="/api/v1/broadcasting/send-for-all",
 *     operationId="broadcastingAll",
 *     tags={"Broadcasting"},
 *     summary="Envia mensagens do tipo websocket para todos os usuários logados",
 *     description="Endpoint para envio de mensagens a todos os usuários logados",
 *     @OA\RequestBody(
 *         required=true,
 *         description="Passa credenciais de login e a mensagem a ser enviada",
 *         @OA\JsonContent(
 *             required={"message"},
 *             @OA\Property(property="message", type="string", example="Mensagem de exemplo")
 *         )
 *     ),
 *     @OA\Response(
 *         response=204,
 *         description="Sucesso no envio da mensagem para todos"
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Não autorizado",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Não autorizado")
 *         )
 *     ),
 *     @OA\Response(
 *         response=403,
 *         description="Não autorizado",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Without route permission!")
 *         ),
 *     ),
 *     security={{"bearerAuth": {}}}
 * )
 */

class SendForAll {}
