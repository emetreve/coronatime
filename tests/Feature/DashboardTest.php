<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DashboardTest extends TestCase
{
	use RefreshDatabase;

	private User $userUnverified;

	private User $user;

	protected function setUp(): Void
	{
		parent::setUp();

		$this->userUnverified = User::factory()->create([
			'email_verified_at' => null,
		]);

		$this->user = User::factory()->create();
	}

	public function test_dashboard_page_is_not_accessible_for_guest(): void
	{
		$response = $this->get(route('dashboard'));
		$response->assertRedirect(route('login.index'));
	}

	public function test_dashboard_page_for_unverified_user_redirects_to_email_verification_page(): void
	{
		$response = $this->actingAs($this->userUnverified)->get(route('dashboard'));
		$response->assertRedirect(route('verification.notice'));
	}

	public function test_dashboard_page_is_accessible_if_user_is_verified_and_authorized(): void
	{
		$response = $this->actingAs($this->user)->get(route('dashboard'));
		$response->assertSuccessful()->assertStatus(200);
		$response->assertViewIs('admin.show');
	}

	public function test_dashboard_counries_page_is_not_accessible_for_guest(): void
	{
		$response = $this->get(route('dashboard.countries'));
		$response->assertRedirect(route('login.index'));
	}

	public function test_dashboard_countries_page_for_unverified_user_redirects_to_email_verification_page(): void
	{
		$response = $this->actingAs($this->userUnverified)->get(route('dashboard.countries'));
		$response->assertRedirect(route('verification.notice'));
	}

	public function test_dashboard_countries_page_is_accessible_if_user_is_verified_and_authorized(): void
	{
		$response = $this->actingAs($this->user)->get(route('dashboard.countries'));
		$response->assertSuccessful()->assertStatus(200);
		$response->assertViewIs('admin.countries');
	}
}
