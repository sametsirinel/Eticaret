<?php

	class giris extends Controller{

		public function index(){

			$data = array(


			);

			$veriler = array(

				"sayfa"=>Import::page("sayfalar/giris",$data,true)

			);

			Import::MasterPage($veriler);

		}

  }

?>
