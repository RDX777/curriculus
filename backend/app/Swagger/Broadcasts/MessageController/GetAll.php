<?php

namespace App\Swagger\Broadcasts\MessageController;

/**
 * @OA\Get(
 *      path="/api/v1/broadcasting/get-all",
 *      operationId="getBroadcastMessages",
 *      tags={"Broadcasting"},
 *      summary="Obter mensagens de broadcasting",
 *      description="Endpoint para obter mensagens de broadcasting.",
 *      @OA\Response(
 *          response=200,
 *          description="Lista de mensagens de broadcasting",
 *          @OA\JsonContent(
 *              @OA\Property(
 *                  property="statusCode",
 *                  type="integer",
 *                  format="int32",
 *                  example=200
 *              ),
 *              @OA\Property(
 *                  property="data",
 *                  type="array",
 *                  @OA\Items(
 *                      @OA\Property(property="id", type="integer", example=1),
 *                      @OA\Property(property="description", type="string", example="mensagem publica 25/03/2024 17:52:00"),
 *                      @OA\Property(property="public", type="integer", example=1),
 *                      @OA\Property(property="created_at", type="string", format="date-time", example="2024-03-25T20:52:08.000000Z"),
 *                      @OA\Property(property="updated_at", type="string", format="date-time", example="2024-03-25T20:52:08.000000Z"),
 *                      @OA\Property(
 *                          property="users",
 *                          type="array",
 *                          @OA\Items(
 *                              @OA\Property(property="id", type="integer", example=1),
 *                              @OA\Property(property="name", type="string", example="Nengue Login"),
 *                              @OA\Property(property="username", type="string", example="nengue"),
 *                              @OA\Property(property="email_verified_at", type="string", format="date-time", nullable=true),
 *                              @OA\Property(property="created_at", type="string", format="date-time", example="2024-03-25T20:52:05.000000Z"),
 *                              @OA\Property(property="updated_at", type="string", format="date-time", example="2024-03-25T20:54:27.000000Z"),
 *                              @OA\Property(
 *                                  property="pivot",
 *                                  type="object",
 *                                  @OA\Property(property="broadcast_message_id", type="integer", example=1),
 *                                  @OA\Property(property="user_id", type="integer", example=1),
 *                              ),
 *                          ),
 *                      ),
 *                  ),
 *              ),
 *          ),
 *      ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthorized",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Unauthorized")
 *         ),
 *     @OA\Header(header="Accept", @OA\Schema(type="string", default="application/json"))
 *     ),
 *     security={{"bearerAuth": {}}}
 * )
 */

class GetAll {}
