<?php

namespace App\Controllers;

// controller ini untuk mengatur halaman-halaman web statis
class Pages extends BaseController
{
	public function index()
	{
        // tambahkan pages/, karena view home berada di folder pages
		return view('pages/home');
	}

    public function about()
    {
        return view('pages/about');
    }

    public function contact()
    {
        return view('pages/contact');
    }
}