<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Http\Middleware\VerifyCsrfToken;

class AuthTest extends TestCase
{
	use RefreshDatabase;

	private User $user;

	protected function setUp(): Void
	{
		parent::setUp();
		$this->user = User::factory()->create();
	}

	public function test_login_page_is_accessible(): void
	{
		$response = $this->get(route('login.index'));
		$response->assertSuccessful()->assertStatus(200);
		$response->assertViewIs('auth.index');
	}

	public function test_authenticated_user_redirects_to_dashboard_when_trying_to_access_login_page()
	{
		$response = $this->actingAs($this->user)->get(route('login.index'));
		$response->assertRedirect(route('dashboard'));
	}

	public function test_auth_should_give_errors_if_inputs_are_not_provided(): void
	{
		$response = $this->post(route('login'));
		$response = $this->post(route('login'), [
			'username' => '',
			'password' => '',
			'_token'   => csrf_token(),
		]);
		$response->assertSessionHasErrors([
			'username',
			'password',
		]);
	}

	public function test_auth_should_give_username_error_if_we_dont_give_username_input(): void
	{
		$response = $this->post(route('login'));
		$response = $this->post(route('login'), [
			'username' => '',
			'password' => 'pass',
			'_token'   => csrf_token(),
		]);
		$response->assertSessionHasErrors([
			'username',
		]);
	}

	public function test_auth_should_give_password_error_if_we_dont_give_password_input(): void
	{
		$response = $this->post(route('login'));
		$response = $this->post(route('login'), [
			'username' => 'user',
			'password' => '',
			'_token'   => csrf_token(),
		]);
		$response->assertSessionHasErrors([
			'password',
		]);
	}

	public function test_auth_should_give_incorrect_credentials_error_if_such_user_does_not_exist(): void
	{
		$response = $this->post(route('login'));
		$response = $this->post(route('login'), [
			'username' => 'user',
			'password' => 'pass',
			'_token'   => csrf_token(),
		]);

		$response->assertSessionHasErrors([
			'username',
		]);
	}

	public function test_auth_should_show_dashboard_if_user_is_authenticated(): void
	{
		$response = $this->actingAs($this->user)->get(route('dashboard'));
		$response->assertSuccessful();
	}

	public function test_user_can_successfully_log_out()
	{
		$response = $this->withoutMiddleware(VerifyCsrfToken::class)->actingAs($this->user)->post(route('logout'));
		$response->assertRedirect(route('login.index'));
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

	public function test_login_should_redirect_to_verification_notice_if_user_not_verified(): void
	{
		$password = 'password';

		$unverifiedUser = User::factory()->create([
			'password'          => bcrypt($password),
			'email_verified_at' => null,
		]);

		$response = $this->withoutMiddleware(VerifyCsrfToken::class)->post(route('login'), [
			'username'=> $unverifiedUser->name,
			'password'=> $password,
		]);
		$response->assertRedirect(route('verification.notice'));
	}

	public function test_auth_should_redirect_to_dashboard_when_logging_in_successfully(): void
	{
		$password = 'password';

		$user = User::factory()->create([
			'password'=> bcrypt($password),
		]);

		$response = $this->withoutMiddleware(VerifyCsrfToken::class)->post(route('login'), [
			'username'=> $user->name,
			'password'=> $password,
		]);
		$response->assertRedirect(route('dashboard'));
	}
}
