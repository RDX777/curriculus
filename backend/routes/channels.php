<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::routes(['middleware' => ['api', 'auth:sanctum']]);

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('private-channel.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('public-channel', function () {
    return true;
});
