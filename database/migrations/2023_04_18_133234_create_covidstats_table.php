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
		Schema::create('covidstatistics', function (Blueprint $table) {
			$table->string('id')->primary();
			$table->timestamps();
			$table->json('country');
			$table->integer('confirmed')->nullable();
			$table->integer('recovered')->nullable();
			$table->integer('deaths')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('covidstatistics');
	}
};
