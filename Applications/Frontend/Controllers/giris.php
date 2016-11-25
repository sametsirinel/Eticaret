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

    public function yap(){

      Validation::rules("kadi",["required","trim","html"],"Kullanıcı adı : ");
      Validation::rules("sifre",["required","trim","max"=>6,"html"],"Şifre : ");

			if(Validation::error("string"))
				WArning::set(Validation::error("string"),"warning");

			$postlar = Method::post();

			if(!$postlar)
        Warning::set("Güvenlik Duvarı !");

      if(User::login($postlar["kadi"],$postlar["sifre"]))
        Warning::set("Başarıyla Giriş Yapıldı","success","profil");
      else
        Warning::set("Kullanıcı adı veya şifre hatalı");

    }

	}

?>
