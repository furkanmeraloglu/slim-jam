<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;

test('Password can be updated', function () {
    $this->actingAs($user = User::factory()->create());

    $this->put('/user/password', [
        'current_password' => 'password',
        'password' => 'new-password',
        'password_confirmation' => 'new-password',
    ]);

    $this->assertTrue(Hash::check('new-password', $user->fresh()->password));
});
test('Current password must be correct', function () {
    $this->actingAs($user = User::factory()->create());

    $this->put('/user/password', [
        'current_password' => 'wrong-password',
        'password' => 'new-password',
        'password_confirmation' => 'new-password',
    ])->assertSessionHasErrors();

    $this->assertTrue(Hash::check('password', $user->fresh()->password));
});
test('New passwords must match', function () {
    $this->actingAs($user = User::factory()->create());

    $this->put('/user/password', [
        'current_password' => 'password',
        'password' => 'new-password',
        'password_confirmation' => 'wrong-password',
    ])->assertSessionHasErrors();

    $this->assertTrue(Hash::check('password', $user->fresh()->password));
});
