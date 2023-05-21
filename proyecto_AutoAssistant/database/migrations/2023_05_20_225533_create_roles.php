<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Role;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'conductor']);
        $role3 = Role::create(['name' => 'futuro_conductor']);
        $role4 = Role::create(['name' => 'taller_mecanico']);
        $role5 = Role::create(['name' => 'mecanico_independiente']);

        $user = User::find(16);
        $user->assignable($role1);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        
    }
};
