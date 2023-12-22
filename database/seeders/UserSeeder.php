<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Open sl.json from storage folder
        $json = file_get_contents(storage_path('sl.json'));
        $json = json_decode($json);

        foreach ($json as $user) {

            // $uuid = Str::random(5);
            // $psw = substr($user->domain, 0, 3) . '@' . $uuid;

            \App\Models\User::create([
                'name' => $user->name,
                'company' => $user->company,
                'domain' => $user->domain,
                'email' => $user->email,
                'token' => '12345678',
                'password' => '12345678',
            ]);
        }

        $domains = \App\Models\User::select('domain')->groupBy('domain')->get();

        foreach ($domains as $domain) {
            $token = substr($domain->domain, 0, 4) . '@' . rand(10000, 99999);
            $psw = bcrypt($token);
            $users = \App\Models\User::where('domain', $domain->domain)->get();

            foreach ($users as $user) {
                $user->password = $psw;
                $user->token = $token;
                $user->save();
            }
        }
    }
}
