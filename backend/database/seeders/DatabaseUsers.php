<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DatabaseUsers extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::connection('application')->table('users')->truncate();

        $password = Hash::make('9MsxMf2RihdBoVOKLAp4ni48w205icfG');

        $userSaved = User::create([
            'name' => 'RPA',
            'username' => 'rpa',
            'password' => $password,
        ]);

        echo ($userSaved->createToken($password . strtotime('now'), ['G_MDG_CURRICULUS_EXTERNALS'])->plainTextToken) . "- ";
    }
}
// j5zP2xEyp9k5rj6gZ9koml7b2WUWaCHPBIlKGgrra4ccbaba