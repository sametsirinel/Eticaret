<?php

	class profil extends Controller{

		public function index(){

			$data = array(


			);

			$veriler = array(

				"sayfa"=>Import::page("sayfalar/profil",$data,true)

			);

			Import::MasterPage($veriler);

		}

  }

?>
