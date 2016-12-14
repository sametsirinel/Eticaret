<?php

	class kayit extends Controller{

		public function index(){

			$data = array(


			);

			$veriler = array(

				"sayfa"=>Import::page("sayfalar/kayit",$data,true)

			);

			Import::MasterPage($veriler);

		}

    public function yap(){

      Validation::rules("adi",["required","trim","html","max"=>20],"Adınız : ");
      Validation::rules("soyadi",["required","trim","max"=>15,"html"],"Soyadınız : ");
      Validation::rules("kadi",["required","trim","max"=>15,"html"],"Kullanıcı Adınız : ");
      Validation::rules("email",["required","trim","max"=>50,"html"],"Email Adresiniz : ");
      Validation::rules("sifre",["required","trim","min"=>6,"html"],"Şifreniz : ");

			if(Validation::error("string"))
				WArning::set(Validation::error("string"),"warning");

			$postlar = Method::post();

			if(!$postlar)
        Warning::set("Güvenlik Duvarı !");

      if(User::create($postlar))
        Warning::set("Başarıyla Giriş Yapıldı","success","profil");
      else
        Warning::set("Kullanıcı adı veya şifre hatalı");

    }

	}

?>
