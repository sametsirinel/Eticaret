<?php

	class profil extends Controller{

		public function index(){

			if(!User::check())
				redirect(baseurl("giris"));

			$model = $this->profil_model->getId(User::id());

			if(!($model && $model->totalRows()>0))
				redirect(baseurl("cikis"));

			$data = array(

				"user"=>$model->row()

			);

			$veriler = array(

				"sayfa"=>Import::page("sayfalar/profil/dashboard",$data,true)

			);

			Import::MasterPage($veriler);

		}

		public function duzenle($value=''){

				if(!User::check())
					redirect(baseurl("giris"));

				$model = $this->profil_model->getId(User::id());

				if(!($model && $model->totalRows()>0))
					redirect(baseurl("cikis"));

				$data = array(

					"user"=>$model->row()

				);

				$veriler = array(

					"sayfa"=>Import::page("sayfalar/profil/duzenle",$data,true)

				);

				Import::MasterPage($veriler);

		}

		public function duzenleniyor($value=''){

			if(!User::check())
				redirect(baseurl("giris"));

			$model = $this->profil_model->getId(User::id());

			if(!($model && $model->totalRows()>0))
				redirect(baseurl("cikis"));

			if(!Method::post())
				Warning::set("Güvenlik Duvarı !","info");

			Validation::rules("adi",["required","html","trim"],"Adınız Alanı :");
			Validation::rules("soyadi",["required","html","trim"],"Soyadınız Alanı :");
			Validation::rules("email",["required","html","trim"],"Email Adresi Alanı :");
			Validation::rules("dtarihi",["required","html","trim"],"Doğum Tarihi Alanı  :");
			Validation::rules("cinsiyet",["required","html","trim"],"Cinsiyet Alanı :");
			Validation::rules("tel",["required","html","trim"],"Telefon Numarası Alanı :");
			Validation::rules("hakkinda",["required","html","trim"],"Hakkınızda Alanı :");

			$error = Validation::error("string");

			if($error)
				Warning::set($error,"warning");

			$postlar = Method::post();

			$postlar["cinsiyet"] = $postlar["cinsiyet"] == 1 ? 1 : 0;

			if($this->profil_model->duzenleniyor($postlar))
				Warning::set("Bilgiler Başarıyla Güncellendi","success");
			else
				Warning::set("Veritabanı bağlantı sorunu saptandı.");


		}

  }

?>
