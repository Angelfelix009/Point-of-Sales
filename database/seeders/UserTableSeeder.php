<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
Use App\Models\User;
use App\Models\Role;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role_Admin=Role::where('name','=','Admin')->first();
        $user= new User();
        $user->name='Olajide Felix O';
        $user->email='olajide.felix@yahoo.com';
        $user->password=bcrypt('111111');
        $user->role_id=5;
        $user->save();
        $user->roles()->attach($role_Admin);
    }
}
