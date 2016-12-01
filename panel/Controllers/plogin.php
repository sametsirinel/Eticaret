<?php

	class plogin extends Controller{

		public function index($params = ''){

			Import::page("panel/login");

		}

		public function send(){

			$email = Method::post("email");
			$sifre = Method::post("sifre");
			Validation::rules("email",array("required","injection","trim","maxchar"=>50),"Kullanıcı Adı");
			Validation::rules("sifre",array("required","injection","trim","maxchar"=>70),"Şifre");

			$hata = Validation::error("string");
			if($hata){

				Warning::set($hata,"warning");

			}else{

				if(User::login($email,$sifre,true,true)){

					redirect(baseurl("panel/phome/index"));

				}else{

					Warning::set(User::error(),"warning");

				}

			}

		}

		public function logout(){

			User::logout("panel/plogin");

		}

	}

?>
