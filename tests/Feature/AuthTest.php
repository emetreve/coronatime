<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{
	use RefreshDatabase;

	public function test_login_page_is_accessible(): void
	{
		$response = $this->get(route('login.index'));
		$response->assertSuccessful()->assertStatus(200);
		$response->assertViewIs('auth.index');
	}

	public function test_auth_should_give_errors_if_inputs_are_not_provided()
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

	public function test_auth_should_give_username_error_if_we_dont_give_username_input()
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

	public function test_auth_should_give_password_error_if_we_dont_give_password_input()
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

	public function test_auth_should_give_incorrect_credentials_error_if_such_user_does_not_exist()
	{
		$response = $this->post(route('login'));
		$response = $this->post(route('login'), [
			'username' => 'user',
			'password' => 'pass',
			'_token'   => csrf_token(),
		]);

		// $response->ddSession();

		$response->assertSessionHasErrors([
			'username',
		]);
	}
}
