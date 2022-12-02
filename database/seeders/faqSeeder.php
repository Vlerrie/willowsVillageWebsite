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
            'question' => 'What are the legal requirements for a closure application?',
            'answer' => '67% home owner support<br>'.
                'A formal impact study needs to be conducted.<br>'.
                'An application fee of R12 650 must be paid.<br>'.
                'All departments involved need to approve the application.<br>'.
                'SLDT must give principal approval.<br>'.
                '40 days advertising for objections.<br>'.
                'Re-application every 2 years.',
        ];
        $data[] = [
            'question' => 'How often do we need to re-apply to stay closed?',
            'answer' => 'A new application must be put forward every 2 years.',
        ];
        $data[] = [
            'question' => 'How much will it cost me?',
            'answer' => 'The projected monthly cost per household with an 80% buy-in comes down to R799pm',
        ];
        $data[] = [
            'question' => 'How long does the closure process take?',
            'answer' => 'After 80% initial commitment and payment the following timelines can give guidance to the duration of the project.<br>'.
                'Traffic Impact Study: about 4 months<br>'.
                'Permission by council: between 6-8 months<br>'.
                'Construction: between 6-8 months',
        ];
        $data[] = [
            'question' => 'What is a traffic impact study (TIS)?',
            'answer' => 'It\'s a study which assesses the effect that the enclosure could have on the transportation network.',
        ];
        $data[] = [
            'question' => 'Can anyone drive into the area?',
            'answer' => 'By law we cannot prevent any person from entering the public area but we are allowed to have a picture and video of their faces and vehicles.',
        ];

        $data[] = [
            'question' => 'What gate types are there?',
            'answer' => 'There will be 2 different time slots for vehicle entrances to the area, 12 hour or 24 hour.',
        ];
        $data[] = [
            'question' => 'What happens during peak traffic hours?',
            'answer' => 'During the traffic impact study, peak traffic times will be made note of and during those times the booms would stay open but cause drivers to slow down without stopping in which case face and vehicle registration and descriptions will already be gathered.',
        ];
        $data[] = [
            'question' => 'Will my property value increase?',
            'answer' => 'All evidence point to that being the case up to 10% or in some cases even higher.',
        ];
        $data[] = [
            'question' => 'Will this project make the area safer?',
            'answer' => 'Using data from areas around us that have closed, it suggests that the closure will have a monumental impact on safety within.',
        ];


        DB::table('faqs')->truncate();
        DB::table('faqs')->insert($data);
    }
}
