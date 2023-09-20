<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * Users seed.
 */
class UsersSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => 6,
                'username' => 'jone',
                'email' => 'jone@test.com',
                'amount' => 0,
                'password' => '$2y$10$VYFJspmwfYxKJdxXNLt3q.6AE/y6lDgb/ToErsQgd5qOKNcxOFKOm',
                'image' => 'user-img/download.png',
                'status' => 0,
                'created' => 
                Cake\I18n\FrozenTime::__set_state(array(
                'date' => '2020-04-10 07:35:31.000000',
                'timezone_type' => 3,
                'timezone' => 'UTC',
                )),
                'modified' => 
                Cake\I18n\FrozenTime::__set_state(array(
                'date' => '2023-09-19 01:12:49.000000',
                'timezone_type' => 3,
                'timezone' => 'UTC',
                )),
            ],
            [
                'id' => 11,
                'username' => 'jone2',
                'email' => 'jone2@test.com',
                'amount' => 0,
                'password' => '$2y$10$Gld7CN3KF4LxvizhmQwo/uVgYyU.V2bZDlhIgscoXCZ72dIUQVmzS',
                'image' => 'user-img/8709387_orig.jpg',
                'status' => 1,
                'created' => 
                Cake\I18n\FrozenTime::__set_state(array(
                'date' => '2020-04-13 14:33:23.000000',
                'timezone_type' => 3,
                'timezone' => 'UTC',
                )),
                'modified' => 
                Cake\I18n\FrozenTime::__set_state(array(
                'date' => '2020-04-13 14:33:23.000000',
                'timezone_type' => 3,
                'timezone' => 'UTC',
                )),
            ],
            [
                'id' => 13,
                'username' => 'jimmy',
                'email' => 'jinshuaifu@gmail.com',
                'amount' => 0,
                'password' => '$2y$10$1qytc/rTsKYMuX3GQqMJ2OM.hzGWtnITRD3wxrfY7kE8aeLpis6We',
                'image' => '0',
                'status' => 1,
                'created' => 
                Cake\I18n\FrozenTime::__set_state(array(
                'date' => '2023-09-15 14:30:44.000000',
                'timezone_type' => 3,
                'timezone' => 'UTC',
                )),
                'modified' => 
                Cake\I18n\FrozenTime::__set_state(array(
                'date' => '2023-09-15 14:30:44.000000',
                'timezone_type' => 3,
                'timezone' => 'UTC',
                )),
            ],
            [
                'id' => 14,
                'username' => 'admin',
                'email' => '996367062@qq.com',
                'amount' => 0,
                'password' => '$2y$10$Lx19W5BGkFomBf/CO3XhgOnfOxexj1wdl6DM5Tzq/R4XpnwXoutHq',
                'image' => 'download.png',
                'status' => 1,
                'created' => 
                Cake\I18n\FrozenTime::__set_state(array(
                'date' => '2023-09-17 00:00:15.000000',
                'timezone_type' => 3,
                'timezone' => 'UTC',
                )),
                'modified' => 
                Cake\I18n\FrozenTime::__set_state(array(
                'date' => '2023-09-17 00:00:15.000000',
                'timezone_type' => 3,
                'timezone' => 'UTC',
                )),
            ],
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
