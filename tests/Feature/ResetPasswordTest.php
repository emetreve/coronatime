<?php

namespace Tests\Feature;

use Tests\TestCase;

class ResetPasswordTest extends TestCase
{
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
}
