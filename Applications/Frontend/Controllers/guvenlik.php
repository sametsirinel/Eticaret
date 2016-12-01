<?php

  class guvenlik extends Controller{

    public function index(){

      $data = array(

			);

			$veriler = array(

				"sayfa"=>Import::page("sayfalar/guvenlik",$data,true)

			);

			Import::MasterPage($veriler);

    }

  }

?>
