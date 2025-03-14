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
        Schema::create('crypto_prices', function (Blueprint $table) {
            $table->id();
            $table->integer('crypto_id');
            $table->string('currency');
            $table->bigInteger('price');
            $table->bigInteger('volume_24h');
            $table->bigInteger('volume_change_24h');
            $table->bigInteger('percent_change_1h');
            $table->bigInteger('percent_change_24h');
            $table->bigInteger('percent_change_7d');
            $table->bigInteger('percent_change_30d');
            $table->bigInteger('percent_change_60d');
            $table->bigInteger('percent_change_90d');
            $table->bigInteger('market_cap');
            $table->bigInteger('market_cap_dominance');
            $table->bigInteger('fully_diluted_market_cap');
            $table->dateTime('last_api_update');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crypto_prices');
    }
};
