<?php

namespace App\Swagger\Broadcasts\MessageController;

/**
 * @OA\Post(
 *     path="/api/v1/broadcasting/send-private",
 *     operationId="broadcastingPrivate",
 *     tags={"Broadcasting"},
 *     summary="Envia mensagens do tipo websocket para um usuário logado",
 *     description="Endpoint para envio de mensagens a um usuário logado",
 *     @OA\RequestBody(
 *         required=true,
 *         description="Passa credenciais de login e a mensagem a ser enviada",
 *         @OA\JsonContent(
 *             required={"user_id", "message"},
 *             @OA\Property(property="user_id", type="integer", example=0),
 *             @OA\Property(property="message", type="string", example="Mensagem de exemplo")
 *         )
 *     ),
 *     @OA\Response(
 *         response=204,
 *         description="Sucesso no envio da mensagem ao usuario"
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Não autorizado",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Não autorizado")
 *         ),
 *     @OA\Header(header="Accept", @OA\Schema(type="string", default="application/json"))
 *     ),
 *     security={{"bearerAuth": {}}}
 * )
 */

class SendPrivate {}
