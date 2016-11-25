<?php

	class home extends Controller{

		public function index(){

			$data = array(

				"urunler"=>$this->home_model->getAll()->result(),
				"vitrinler"=>$this->home_model->vitrin()->result(),

			);

			$veriler = array(

				"sayfa"=>Import::page("sayfalar/anasayfa",$data,true)

			);

			Import::MasterPage($veriler);

		}

	}

?>
