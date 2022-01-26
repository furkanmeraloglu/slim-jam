<?php

use App\Models\User;

test('Other browser sessions can be logged out', function () {
        $user = User::factory()->create();
        $this->actingAs($user)
            ->delete('/user/other-browser-sessions', [
            'password' => 'password',
        ])->assertSessionHasNoErrors();
});
