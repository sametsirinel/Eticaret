<?php

  class page404 extends Controller{

    public function index(){

      $data = array(


      );

      $veriler = array(

        "sayfa"=>Import::page("sayfalar/page404",$data,true)

      );

      Import::MasterPage($veriler);

    }

  }

?>
