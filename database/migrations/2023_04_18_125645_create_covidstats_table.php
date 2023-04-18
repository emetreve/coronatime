<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	/**
	 * Run the migrations.
	 */
	public function up(): void
	{
		Schema::create('covidstats', function (Blueprint $table) {
			$table->id();
			$table->timestamps();
			$table->json('country');
			$table->string('code');
			$table->integer('confirmed');
			$table->integer('recovered');
			$table->integer('deaths');
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('covidstats');
	}
};
