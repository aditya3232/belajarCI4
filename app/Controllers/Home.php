<?php

namespace App\Controllers;
// jika didalam folder controller terdapat folder lagi yg berisi controller 
// maka atur namespacenya (tempat file-nya berada): namespace App\Controllers\Admin
// kemudian atur juga agar controller dalam folder baru tsb bisa mengakses BaseController
// caranya ketikkan: use App\Controllers\BaseController
// kemudian atur routes-nya agar controller didalam folder baru tsb dapat diakses
// caranya ketikkan: $routes->get('/users', 'Admin\Users::index');
// bacanya: jika menuliskan url /users, arahkan ke namespace Admin\controller Users pada bagian method index()

class Home extends BaseController
{
	public function index()
	{
		return view('welcome_message');
	}
}