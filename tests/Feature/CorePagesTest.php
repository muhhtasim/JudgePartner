<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CorePagesTest extends TestCase
{
    use RefreshDatabase;

    public function test_approved_user_can_view_dashboard(): void
    {
        $user = User::factory()->create([
            'status' => 'approved',
            'email_verified_at' => now(),
        ]);

        $this->actingAs($user)
            ->get('/dashboard')
            ->assertOk()
            ->assertSee('Welcome, '.$user->name);
    }

    public function test_other_application_pages_are_unavailable(): void
    {
        foreach (['/admin', '/blogs', '/contests', '/judge', '/leaderboard', '/pending', '/problems', '/profile', '/submissions'] as $path) {
            $this->get($path)->assertNotFound();
        }
    }
}
