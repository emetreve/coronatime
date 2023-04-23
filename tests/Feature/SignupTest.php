<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Middleware\VerifyCsrfToken;

class SignupTest extends TestCase
{
	use RefreshDatabase;

	public function test_signup_page_is_accessible(): void
	{
		$response = $this->get(route('signup.index'));
		$response->assertSuccessful()->assertStatus(200);
		$response->assertViewIs('auth.signup');
	}

	public function test_signup_should_create_user_and_redirect_to_verification_notice(): void
	{
		$request = [
			'name'                 => 'user',
			'email'                => 'user@redberry.ge',
			'password'             => 'pass',
			'password_confirmation'=> 'pass',
			'_token'               => csrf_token(),
		];
		$response = $this->withoutMiddleware(VerifyCsrfToken::class)->post(route('signup'), $request);
		$response->assertRedirect(route('verification.notice'));
	}
}
