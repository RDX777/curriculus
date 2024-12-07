<?php

namespace App\Swagger\Auth\AuthController;

/**
 * @OA\Post(
 *      path="/api/v1/auth/logout",
 *      operationId="logout",
 *      tags={"Authentication"},
 *      summary="Realiza o logout do usuario",
 *      description="Endpoint para realizar o logout.",
 *      @OA\Response(
 *          response=204,
 *          description="Mensagem de sucesso no logout"
 *      ),
 *      security={{"bearerAuth":{}}},
 * )
 */

class Logout {}
