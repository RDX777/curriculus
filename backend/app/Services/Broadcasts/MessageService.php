<?php

namespace App\Services\Broadcasts;

use App\Events\MessagePublicEvent;
use App\Events\MessagePrivateEvent;
use App\Jobs\Internal\ProcessBroadcastPublicMessage;
use App\Models\Internal\BroadcastMessage;
use App\Models\Internal\BroadcastMessageUser;
use App\Models\User;
use App\Interfaces\Broadcasts\MessageInterface;
use Illuminate\Http\Response;

class MessageService implements MessageInterface
{
    public function sendForall(array $message)
    {

        ProcessBroadcastPublicMessage::dispatch($message);
        return [
            "statusCode" => Response::HTTP_NO_CONTENT
        ];
    }

    public function sendPrivate(array $message)
    {
        $user = User::where("active", "=", true)
            ->where("id", "=", $message["userId"])
            ->first();

        if (isset($user)) {

            $broadcastMessage = BroadcastMessage::create([
                "description" => $message["message"],
                "public" => false,
            ]);

            $broadcastMessageUser = BroadcastMessageUser::create([
                "user_id" => $user->id,
                "broadcast_message_id" => $broadcastMessage->id
            ]);

            event(new MessagePrivateEvent([
                "userId" => $user->id,
                "broadcastMessageUserId" => $broadcastMessageUser->id,
                "message" => $message["message"],
                "read" => $broadcastMessageUser->read,
            ]));
        }

        return [
            "statusCode" => Response::HTTP_NO_CONTENT,
        ];
    }

    public function getAll()
    {
        $user = auth()->user();
        /** @disregard P1013 running and working function load */
        $recivedMessages = $user->load(['broadcastMessages' => function ($query) {
            $query
                ->orderBy('created_at', 'desc')
                ->take(20);
        }])->broadcastMessages;

        $transformedResult = $recivedMessages->map(function ($message) {
            return [
                'userId' => $message->pivot->user_id,
                'broadcastMessageUserId' => $message->pivot->id,
                'message' => $message->description,
                'read' => (bool) $message->pivot->read,
            ];
        });

        return [
            "statusCode" => Response::HTTP_OK,
            "data" => $transformedResult
        ];
    }

    public function readed(string $broadcastMessageUserId)
    {
        $user = auth()->user();
        $broadcastMessageUser = BroadcastMessageUser::where("id", "=", $broadcastMessageUserId)
            ->where("user_id", "=", $user->id)
            ->first();

        if ($broadcastMessageUser && !$broadcastMessageUser->read) {
            $broadcastMessageUser->read = true;
            $broadcastMessageUser->save();
        }

        return [
            "statusCode" => Response::HTTP_NO_CONTENT,
        ];
    }

    public function readedAll()
    {

        $user = auth()->user();
        BroadcastMessageUser::where("user_id", "=", $user->id)
            ->update(["read" => true]);

        return [
            "statusCode" => Response::HTTP_NO_CONTENT,
        ];
    }
}
