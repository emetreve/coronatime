<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\App;
use Tests\TestCase;

class LanguageTest extends TestCase
{
	public function test_locale_middleware_changes_app_locale(): void
	{
		$appLocale = 'ka';

		$response = $this->withSession(['applocale' => $appLocale])->get(route('login.index'));

		$response->assertOk();
		$this->assertEquals($appLocale, App::getLocale());
	}

	public function test_language_controller_can_set_language(): void
	{
		$lang = 'ka';

		$response = $this->get(route('lang.switch', $lang));
		$response->assertRedirect();
		$response->assertSessionHas('applocale', $lang);
	}
}
