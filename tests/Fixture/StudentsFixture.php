<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * StudentsFixture
 */
class StudentsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'name' => 'Lorem ipsum dolor sit a',
                'age' => 1.5,
                'country' => 'Lorem ipsum dolor sit a',
                'created_at' => '2023-09-14 11:01:01',
                'updated_at' => '2023-09-14 11:01:01',
            ],
        ];
        parent::init();
    }
}
