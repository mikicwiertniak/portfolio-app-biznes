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
        Schema::create('crypto_currency', function (Blueprint $table) {
            $table->id();
            $table->integer('api_id');
            $table->string('name');
            $table->string('symbol');
            $table->dateTime('time_added');
            $table->dateTime('last_updated_api');
            $table->bigInteger('max_supply');
            $table->bigInteger('circulating_supply');
            $table->bigInteger('total');
            $table->integer('infinite_supply');
            $table->string('platform')
                  ->nullable();
            $table->integer('cmc_rank');
            $table->integer('num_market_pairs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crypto_currency');
    }
};
