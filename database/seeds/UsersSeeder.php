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
            'username' => 'root2',
            'password' => Hash::make('wujianhua'),
            'describe' => '测试数据填充',
        ];
        $User->create($data);
    }
}
