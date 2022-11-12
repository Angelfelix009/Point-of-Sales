<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role=new Role();
        $role ->name='DataInput';
        $role->description='A user whose responsibility is to print receipt';

        $role->save();$role=new Role();
        $role ->name='SalesPerson';
        $role->description='A user whose responsibility is to print receipt from the system and only sell goods items';
        $role->save();


        $role=new Role();
        $role ->name='Supervisor';
        $role->description='A user that can take inventory of the goods and services and lot more';
        $role->save();

        $role=new Role();
        $role ->name='Manager';
        $role->description='A user that generate accounting report and all others';
        $role->save();

        $role=new Role();
        $role ->name='Admin';
        $role->description='A user that add other staff to the system and have full control over all';
        $role->save();
    }
}
