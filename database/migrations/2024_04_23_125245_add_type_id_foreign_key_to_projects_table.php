<?php

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
        Schema::table('projects', function (Blueprint $table) {
            
            // con "constrained" verichiamo che ogni elemento inserito in una colonna abbia il corrispettivo nella tabella collegata
            $table->foreignId('type_id')->nullable()->constrained()->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            
            // questo ci rimuoverà solo il vincolo
            $table->dropForeign('projects_type_id_foreign');

            // questo ci rimuoverà la colonna
            $table->dropColumn('type_id');
        });
    }
};
