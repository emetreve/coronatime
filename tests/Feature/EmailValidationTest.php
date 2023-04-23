<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;

class EmailValidationTest extends TestCase
{
	public function test_signup_success_confirmation_page_is_accessible(): void
	{
		$response = $this->get(route('signup.success'));
		$response->assertSuccessful()->assertStatus(200);
		$response->assertViewIs('auth.signup-success');
	}

	public function test_after_clicking_verify_email_cta_it_should_redirect_to_sugnup_success_page(): void
	{
		$user = User::factory()->create(['email_verified_at' => null]);

		$response = $this->actingAs($user)->get(route('verification.notice'));

		$verificationUrl = URL::temporarySignedRoute(
			'verification.verify',
			now()->addMinutes(60),
			['id' => $user->id, 'hash' => sha1($user->getEmailForVerification())]
		);

		$response = $this->get($verificationUrl);

		$response->assertRedirect(route('signup.success'));
		$this->assertNotNull($user->fresh()->email_verified_at);
	}
}
