<?php

use App\Models\Owner;
use App\Models\Ship;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('owner_ships', function (Blueprint $table) {
            $table->foreignIdFor(Owner::class, "owner_id")
                ->constrained("owners");

            $table->foreignIdFor(Ship::class, "ship_id")
                ->constrained("ships");

            $table->primary(["owner_id", "ship_id"]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('owner_ships');
    }
};
