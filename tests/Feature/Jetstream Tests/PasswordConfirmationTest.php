<?php

use App\Models\User;

test('Password confirmation screen can be rendered', function () {
    $user = User::factory()->withPersonalTeam()->create();

    $this->actingAs($user)->get('/user/confirm-password')
        ->assertStatus(200);
});
test('Password can be confirmed', function () {
    $user = User::factory()->create();

    $this->actingAs($user)->post('/user/confirm-password', [
        'password' => 'password',
    ])->assertRedirect()
        ->assertSessionHasNoErrors();
});
test('Password is not confirmed with invalid password', function () {
    $user = User::factory()->create();

    $this->actingAs($user)->post('/user/confirm-password', [
        'password' => 'wrong-password',
    ])->assertSessionHasErrors();
});
