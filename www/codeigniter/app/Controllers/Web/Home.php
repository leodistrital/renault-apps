<?php

namespace App\Controllers\web;

use App\Controllers\MyApiRest;
// use App\Models\web\BannerWebModel;
// use App\Models\web\NoticiaWebModel;
// use App\Models\web\VideohomeWebModel;

class Home extends  MyApiRest
{
	protected $format    = 'json';


	public function index()
	{
		return view('home');
	}


	



}