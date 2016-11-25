<?php 
	
	class login extends Controller{
		
		public function index(){
			
			echo sha1(md5("14021402"));
			
		}
		
		public function out(){
			
			User::logOut();
			redirect(baseurl("login"));
			
		}
		
	}

?>