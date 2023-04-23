<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Password;
use App\Http\Middleware\VerifyCsrfToken;

class ResetPasswordTest extends TestCase
{
	use RefreshDatabase;

	public function test_forgot_password_page_is_accessible(): void
	{
		$response = $this->get(route('password.request'));
		$response->assertSuccessful()->assertStatus(200);
		$response->assertViewIs('auth.forgot-password');
	}

	public function test_password_reset_should_give_errors_if_email_is_not_provided(): void
	{
		$response = $this->post(route('password.email'));
		$response = $this->post(route('password.email'), [
			'email'    => '',
			'_token'   => csrf_token(),
		]);
		$response->assertSessionHasErrors([
			'email',
		]);
	}

	public function test_password_reset_should_give_errors_if_user_with_such_email_does_not_exist(): void
	{
		$response = $this->post(route('password.email'));
		$response = $this->post(route('password.email'), [
			'email'    => 'non@existent.com',
			'_token'   => csrf_token(),
		]);
		$response->assertSessionHasErrors([
			'email',
		]);
	}

	public function test_password_reset_should_redirect_to_password_notice_page_if_correct_user_email_was_provided(): void
	{
		$email = 'valid@redberry.ge';
		User::factory()->create(['email'=>$email]);

		$response = $this->post(route('password.email'));
		$response = $this->post(route('password.email'), [
			'email'    => $email,
			'_token'   => csrf_token(),
		]);
		$response->assertRedirect(route('password.notice'));
	}

	public function test_reset_password_page_is_accessible(): void
	{
		$user = User::factory()->create();
		$token = Password::createToken($user);

		$response = $this->get(route('password.reset', $token));
		$response->assertSuccessful()->assertStatus(200);
		$response->assertViewIs('auth.reset-password');
	}

	public function test_password_update_request_should_redirect_to_success_page_if_all_inputs_are_given(): void
	{
		$user = User::factory()->create();
		$token = Password::createToken($user);
		$password = 'password';

		$requestData = [
			'email'                 => $user->email,
			'password'              => $password,
			'password_confirmation' => $password,
			'token'                 => $token,
			'_token'                => csrf_token(),
		];

		$response = $this->withoutMiddleware(VerifyCsrfToken::class)->post(route('password.update'), $requestData);

		$response->assertRedirect(route('password.success'));
	}
}
