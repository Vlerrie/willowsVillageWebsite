<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class faqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];

        $data[] = [
//            'id' => 1,
            'question' => 'How long will this project last?',
            'answer' => 'From start to finish the minimum amount of time should be anything from 18 - 24 months.',
        ];
        $data[] = [
//            'id' => 2,
            'question' => 'When will the closure be complete?',
            'answer' => 'Hopefully the closure will be complete by December 2024',
        ];
        $data[] = [
//            'id' => 3,
            'question' => 'When will the closure be complete?',
            'answer' => 'Hopefully the closure will be complete by December 2024',
        ];
        $data[] = [
//            'id' => 4,
            'question' => 'What are the gate types?',
            'answer' => 'There will be 3 gate type in the community. Blocks which are permanent closures, 12 hour gates which will be opened from 6am to 6pm and 24 hour gates that will be open all day and night.',
        ];

        DB::table('faqs')->insert($data);
    }
}
