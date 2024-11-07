<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Events\UserSaved;
use App\Models\User;
use Illuminate\Support\Facades\Event;

class UserSavedListenerTest extends TestCase
{
    
    public function testUserSavedListener()
    {
        Event::fake();
        $user = User::factory()->create();

        // Fire the event
        event(new UserSaved($user));
        Event::assertDispatched(UserSaved::class);
    }
}
