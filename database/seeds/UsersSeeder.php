<?php

use Illuminate\Database\Seeder;
use App\Repositories\AdminUser\AdminUserRepository;
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(AdminUserRepository $User)
    {
        $data = [
            'username' => 'root',
            'password' => Hash::make('root'),
            'describe' => '超管账户',
        ];
        $User->create($data);
    }
}
