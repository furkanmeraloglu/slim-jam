<?php

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\URL;
use Laravel\Fortify\Features;

test('Email verification screen can be rendered', function () {
    if (!Features::enabled(Features::emailVerification())) {
        return $this->markTestSkipped('Email verification not enabled.');
    }
    $user = User::factory()->withPersonalTeam()->unverified()->create();

    $this->actingAs($user)->get('/email/verify')
        ->assertStatus(200);
});

test('Email can be verified', function () {
    if (!Features::enabled(Features::emailVerification())) {
        return $this->markTestSkipped('Email verification not enabled.');
    }
    Event::fake();

    $user = User::factory()->unverified()->create();

    $verificationUrl = URL::temporarySignedRoute(
        'verification.verify',
        now()->addMinutes(60),
        ['id' => $user->id, 'hash' => sha1($user->email)]
    );

    $response = $this->actingAs($user)->get($verificationUrl);

    Event::assertDispatched(Verified::class);

    $this->assertTrue($user->fresh()->hasVerifiedEmail());
    $response->assertRedirect(RouteServiceProvider::HOME . '?verified=1');
});
test('Email cannot be verified with invalid hash', function () {
    if (!Features::enabled(Features::emailVerification())) {
        return $this->markTestSkipped('Email verification not enabled.');
    }

    $user = User::factory()->unverified()->create();

    $verificationUrl = URL::temporarySignedRoute(
        'verification.verify',
        now()->addMinutes(60),
        ['id' => $user->id, 'hash' => sha1('wrong-email')]
    );

    $this->actingAs($user)->get($verificationUrl);

    $this->assertFalse($user->fresh()->hasVerifiedEmail());
});
