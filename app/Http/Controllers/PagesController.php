<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PagesController extends BaseController{

	public function getIndex(){
		return view('pages.welcome');
	}
	public function getAbout(){
		$first = 'Javier';
		$last = 'Quisbert';

		$full = $first . " " . $last;
		$email = 'javier@gmail.com';
		$data =[];
		$data['email'] = $email; 
		$data['full'] = $full; 
		return view('pages.about')->withData($data);
	}
	public function getContact(){
		return view('pages.contact');
	}

}