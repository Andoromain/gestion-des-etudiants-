<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\DB;


class utilisateur extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=User::create([
            'username'=>'ando',
            'password'=> bcrypt('26787295'),
        ]);
        DB::table('fonction_user')->insert([
            'fonction_id' => 1,
            'user_id' => $user->id
        ]);

    }
}
