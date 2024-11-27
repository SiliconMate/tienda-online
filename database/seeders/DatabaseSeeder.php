<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            ProductSeeder::class,
        ]);

        $role = Role::create(['name' => 'admin']);
        $role->save();
        $role = Role::create(['name' => 'user']);
        $role->save();

        $user = User::factory()->create([
            'firstname' => 'admin',
            'lastname' => 'admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
        ]);

        $user->assignRole('admin');

        $user->addresses()->create([
            'address_line' => 'Calle 123',
            'country' => 'Argentina',
            'state' => 'Corrientes',
            'city' => 'Goya',
            'postal_code' => '3450',
        ]);

        $user = User::factory()->create([
            'firstname' => 'user',
            'lastname' => 'user',
            'username' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('user123'),
        ]);

        $user->addresses()->create([
            'address_line' => 'Calle 123',
            'country' => 'Argentina',
            'state' => 'Corrientes',
            'city' => 'Goya',
            'postal_code' => '3450',
        ]);

        $user->assignRole('user');
    }
}
