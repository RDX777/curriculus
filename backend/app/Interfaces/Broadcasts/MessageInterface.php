<?php

namespace App\Interfaces\Broadcasts;

interface MessageInterface
{
    public function sendForAll(array $message);
    public function sendPrivate(array $message);
    public function getAll();
    public function readed(string $broadcastMessageUserId);
    public function readedAll();
}
