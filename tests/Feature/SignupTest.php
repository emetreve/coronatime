<?php

namespace Tests\Feature;

use Tests\TestCase;

class SignupTest extends TestCase
{
	public function test_signup_page_is_accessible(): void
	{
		$response = $this->get(route('signup.index'));
		$response->assertSuccessful()->assertStatus(200);
		$response->assertViewIs('auth.signup');
	}
}
