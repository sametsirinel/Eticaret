<?php

  class cikis extends Controller{

    public function index(){

      User::logout("giris");

    }

  }

?>
