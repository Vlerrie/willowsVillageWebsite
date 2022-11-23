<?php

namespace App\Http\Controllers;

use App\Models\faq;
use Illuminate\Http\Request;

class faqController extends Controller
{
    public function index()
    {
        return view('pages.faq', [
            'faq' => faq::inRandomOrder()->take(5)->get()
        ]);
    }


    public function searchTerm($searchTerm)
    {
        if (!empty($searchTerm)){
            $questions = faq::whereRaw("lower(question) like '%" . $searchTerm . "%'")
                ->orWhereRaw("lower(answer) like '%" . $searchTerm . "%'")
                ->take(5)
                ->get();
        }else{
            $questions = faq::inRandomOrder()->take(5)->get();
        }


        return [
            'body' => view('partials.faqResults', [
                'faq' => $questions
            ])->render()
        ];
    }
}
