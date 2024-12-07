<?php

namespace App\Http\Controllers\Broadcasts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Broadcasts\MessageRequest;
use App\Interfaces\Broadcasts\MessageInterface;

class MessageController extends Controller
{

    public function sendForAll(MessageRequest $request, MessageInterface $messageService)
    {

        $message = $request->validated();
        $result = $messageService->sendForAll($message);
        return response()->json(null, $result["statusCode"]);
    }

    public function sendPrivate(MessageRequest $request, MessageInterface $messageService)
    {

        $message = $request->validated();
        $result = $messageService->sendPrivate($message);
        return response()->json(null, $result["statusCode"]);
    }

    public function getAll(MessageInterface $messageService)
    {
        $result = $messageService->getAll();
        return response()->json($result, $result["statusCode"]);
    }

    public function readed(MessageInterface $messageService)
    {
        $itemSearch = request("messageId");
        $result = $messageService->readed($itemSearch);
        return response()->json(null, $result["statusCode"]);
    }

    public function readedAll(MessageInterface $messageService)
    {
        $result = $messageService->readedAll();
        return response()->json(null, $result["statusCode"]);
    }
}
