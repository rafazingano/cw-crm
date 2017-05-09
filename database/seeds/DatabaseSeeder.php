<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        // $this->call(UsersTableSeeder::class);

        $users = [
                [
                'name' => 'Rafael Zingano',
                'email' => 'confrariaweb@gmail.com',
                'password' => bcrypt('secret'),
                'remember_token' => str_random(10),
                'options' => '[]'
            ]
        ];
        foreach ($users as $user) {
            DB::table('users')->insert($user);
        }

        $roles = [
                ['slug' => 'administrator', 'title' => 'Administrator', 'level' => 0],
                ['slug' => 'user-admin', 'title' => 'Usuário Admin', 'level' => 1],
                ['slug' => 'customer-crm', 'title' => 'Cliente CRM', 'level' => 2],
                ['slug' => 'user-crm', 'title' => 'Usuário', 'level' => 3],
                ['slug' => 'customer', 'title' => 'Cliente', 'level' => 4],
                ['slug' => 'lead', 'title' => 'Lead', 'level' => 5]
        ];

        foreach ($roles as $role) {
            DB::table('roles')->insert($role);
        }

        DB::table('role_user')->insert([
            'role_id' => 1,
            'user_id' => 1
        ]);

        /*         * * Monta as permissions basicas do sistema (Admin) ** */
        $per_basic = ['index', 'create', 'show', 'edit', 'destroy'];
        $per_contr = ['dashboard', 'user', 'role', 'permission', 'email', 'lead', 'customer', 'site', 'profile', 'configuration'];
        foreach ($per_contr as $c) {
            foreach ($per_basic as $b) {
                $permissions[] = [
                    'slug' => $c . '-' . $b,
                    'title' => $c . '.' . $b
                ];
            }
        }
        foreach ($permissions as $permission) {
            DB::table('permissions')->insert($permission);
        }
    }

}
