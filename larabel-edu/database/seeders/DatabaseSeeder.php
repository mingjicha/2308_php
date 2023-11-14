<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // 더미 데이터 삽입용 팩토리 호출

        // 30만건 생성을 바로 하면 용량이 넘 많으니까 5000번을 60번 반복시켜주기
        $cnt = 0;
        while($cnt < 60) {
            \App\Models\Board::factory(10)->create();
            $cnt++;
        }
    }
}
