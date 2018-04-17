<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

//use App\Http\Request;
use App\Post;
use Illuminate\Http\Request;
use Mail;
use Session;

class PagesController extends BaseController{

	public function getIndex(){
		$posts = Post::orderBy('created_at', 'desc')->limit(4)->get();
		return view('pages.welcome')->withPosts($posts)	;
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


	public function postContact(Request $request){
		/*
		$this->validated($request,[
			'email' => 'required|email',
			'subject'=> 'min:3',
			'message'=> 'min:10']);
		*/	
		$data =  array(
			'email' => $request->email,
			'subject' => $request->subject,
			'bodyMessage' => $request->message
		);


		Mail::send('emails.contact',$data,function($message) use ($data){
			$message->from($data['email']);
			$message->to('hello@devmarka.io');
			$message->subject($data['subject']);

		});

		Session::flash('success','Your email was sent !!');

		return redirect()->route('pages.welcome');
 
	}
}