<?php

namespace App\Jobs\Internal;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Events\MessagePublicEvent;
use App\Events\MessagePrivateEvent;
use App\Models\User;
use App\Models\Internal\BroadcastMessage;
use App\Models\Internal\BroadcastMessageUser;

class ProcessBroadcastPublicMessage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $message;

    /**
     * Create a new job instance.
     */
    public function __construct($message)
    {
        $this->message = $message;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {

        $broadcastMessage = BroadcastMessage::create([
            "public" => true,
            "description" => $this->message["message"],
        ]);
        $activeUsers = User::select("id")
            ->where("active", "=", true)
            ->get();

        foreach ($activeUsers as $activeUser) {

            $message = BroadcastMessageUser::create([
                "user_id" => $activeUser->id,
                "broadcast_message_id" => $broadcastMessage->id,
            ]);

            event(new MessagePrivateEvent([
                "userId" => $activeUser->id,
                "broadcastMessageUserId" => $message->id,
                "message" => $this->message["message"],
                "read" => $message->read
            ]));
        }
    }
}
