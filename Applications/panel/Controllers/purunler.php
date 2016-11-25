<?php

	class purunler extends Controller{

		protected $alan = 9;

		protected $select = 1;

		protected $insert = 2;

		protected $update = 3;

		protected $delete = 4;

		protected $OnayKontrol = 5;

		protected $klasor = "urunler";

		protected $model = "purunler_model";

		protected $modulAdi = "Ürün";

		protected $modulAdic = "Ürün";

		public function index($params = ''){

			Yetki::select($this->alan);

			$data["EditKontrol"] = Yetki::kontrol($this->alan,$this->update);
			$data["RemoveKontrol"] = Yetki::kontrol($this->alan,$this->delete);
			$data["InsertKontrol"] = Yetki::kontrol($this->alan,$this->insert);
			$data["OnayKontrol"] = Yetki::kontrol($this->alan,$this->OnayKontrol);
			$data["tableTitle"] = "Ürünler";
			$data["DbName"] = $this->{$this->model}->dbname;
			$data["columns"] = array("Ürün Adı"=>"adi","Ürün Başlığı"=>"baslik","onay"=>"onay");
			$data["DataGrid"] = $this->{$this->model}->getall();


			Import::page("panel/MasterPage",array(

				"sayfa"=>Import::page("panel/sayfalar/{$this->klasor}/list.php",$data,true),
				"method"=>"Listele",
				"class"=>"{$this->modulAdic}"

			));

		}

		public function ekle(){

			Yetki::insert($this->alan);

			$model = $this->{$this->model}->isEmpty();

			if($model->totalRows()<1){

				$this->{$this->model}->newInsert();

				$id = DB::insertId();

				$model = $this->{$this->model}->getid($id);

				$row = $model->row();

			}else{

				$row = $model->row();

			}

			$id = $row->id;

			$data = array(

				"title"=>"{$this->modulAdi} Ekleme Formu",
				"row"=>$row,
				"urunResim"=>$this->{$this->model}->urunResim($id)->result(),
				"id"=>$id,
				"titlesmall"=>""

			);

			Import::page("panel/MasterPage",array(

				"sayfa"=>Import::page("panel/sayfalar/{$this->klasor}/insert.php",$data,true),
				"class"=>"{$this->modulAdi}",
				"method"=>"Ekle"

			));


		}

		public function resimSil($id = 0){

			if(!is_numeric($id)){

				$id= 0;

			}

			if($this->{$this->model}->resimSil($id)){

				Warning::set("Resim Başarıyla Silindi","success");

			}else{

				Warning::set("Bir problemle karşılaştık lütfen daha sonra tekrar deneyin");

			}

		}

		public function urunResimEkle(){

			$postlar = Method::post();

			 $id = Dosya::base64($postlar["resim"]);

			$this->{$this->model}->insertUrunResim($postlar["urunid"],$id);

		}

		public function edit( $id = 0 ){

			Yetki::update($this->alan);

			if(!is_numeric($id)){

				$id = 0;

			}

			$model = $this->{$this->model}->getid($id);

			if($model->totalRows()<1){

				redirect("panel/page404");

			}else{

				$row = $model->row();

			}

			$id = $row->id;

			$data = array(

				"title"=>"{$this->modulAdi} Ekleme Formu",
				"row"=>$row,
				"gruplar"=>$this->{$this->model}->gruplar()->result(),
				"urunResim"=>$this->{$this->model}->urunResim($id)->result(),
				"kategoriler"=>$this->{$this->model}->kategoriler()->result(),
				"urunKat"=>$this->{$this->model}->getUrunKat($id)->result(),
				"grupvarmi"=>$this->{$this->model}->getUrunOzellikleri($id)->totalRows(),
				"titlesmall"=>""

			);

			Import::page("panel/MasterPage",array(

				"sayfa"=>Import::page("panel/sayfalar/{$this->klasor}/edit.php",$data,true),
				"class"=>"{$this->modulAdi}ler",
				"method"=>"Ekle"

			));

		}

		public function refreshGrup(){

			foreach($this->{$this->model}->gruplar()->result() as $grup){

				echo '<option value="'.$grup->id.'">'.$grup->adi.'</option>';

			}

		}

		public function getGrup($urunid=0){

			$id = Method::post("id");
			if(is_numeric($id) && $id!=0){

				$model = $this->{$this->model}->getUrunOzellikleri($urunid);
				if($model->totalRows()<1)
					$dizi["gruplar"] = $this->{$this->model}->getGrupOzellik($id)->result();
				else
					$dizi["gruplar"] = $model->result();

				Import::page("panel/sayfalar/{$this->klasor}/ajaxGrup",$dizi);

			}else{

				Echo "Bağlantı Hatası";

			}

		}

		public function delete($id = 0){

			Yetki::delete($this->alan);

			if(!is_numeric($id)){

				Warning::set("Güvenlik Duvarı !");

			}else{

				if($this->{$this->model}->deleteAlan($id)){

					Warning::set("{$this->modulAdi} Başarıyla Silindi","success");

				}else{

					Warning::set("Veritabanına Bağlanırken Bir Sorunla Karşılaştık. Lütfen Daha Sonra Tekrar Deneyin.");

				}

			}

		}

		public function doEdit($id = 0){

			Yetki::insert($this->alan);

			$postlar = Method::post();

			Session::insert("postBack",json_encode($postlar));

			if(!is_numeric($id)){

				$id = 0;

			}

			if($postlar){

				Validation::rules("adi",array("injection","maxchar"=>50,"trim","required"),"Ürün Adı : ");
				Validation::rules("aciklama",array("injection","trim","required"),"Ürün Açıklaması: ");
				Validation::rules("fiyat",array("injection","trim","required"),"Ürün Fiyatı: ");

				$hata = Validation::error("string");
				if($postlar["onay"] == 2)
					$postlar["onay"] = 0;

				unset($postlar["files"]);

				$postlar["seo_link"] = Convert::urlWord($postlar["baslik"]);

				if($hata){

					Warning::set($hata,"warning");

				}else{

					if($postlar["fiyat"]<1){

						Warning::set("Fiyat 0dan büyük olmalı");

					}

					if($this->{$this->model}->update($postlar,$id)){

						Session::delete("postBack");
						Warning::set("{$this->modulAdi} Başarıyla Eklendi.","success","panel/purunler/edit/$id");

					}else{

						Warning::set("Veritabanına Bağlanırken Bir Sorunla Karşılaştık. Lütfen Daha Sonra Tekrar Deneyin.");

					}

				}

			}else{

				Warning::set("Güvenlik Duvarı !");

			}


		}

		public function doKatEdit($id = 0){

			Yetki::insert($this->alan);

			$postlar = Method::post();


			if(!is_numeric($id)){

				$id = 0;

			}

			if($postlar){

				$model = $this->{$this->model}->katSil($id);

				if(!$model){

					Warning::set("Sorgu Başarısız Oldu . ");

				}

				foreach($postlar["kategori"] as $katid){

					$this->{$this->model}->katEkle($katid,$id);

				}

				Warning::set("{$this->modulAdi} Başarıyla Güncellendi. ","success");

			}else{

				Warning::set("Güvenlik Duvarı !");

			}

		}

		public function ozellikMiktar($id = 0){

			$postlar = Method::post();
			//	print_r($postlar);exit();
			if(!$postlar)
				Warning::set("Güvenlik Duvarı");

			if(!is_numeric($id))
				Warning::set("Güvenlik Duvarı !","info");

			$model = $this->{$this->model}->getid($id);

			if($model->totalRows()<1 && $model)
				Warning::set("Güvenlik Duvarı !","info");

			if(!$this->{$this->model}->deleteOzellikler($id))
				Warning::set("Veriler silinemedi ","info");

			for($x=0;$x<count($postlar["ozellikid"]);$x++){

				$post["ozellikid"] = $postlar["ozellikid"][$x];
				$post["adet"] = $postlar["miktarlar"][$x];
				$post["fiyat"] = $postlar["fiyatlar"][$x];
				$post["urunid"] = $id;

				if(!$this->{$this->model}->insertOzellik($post))
					Warning::set("Özellikler eklenirkern bir problemle karşılaştık.");

			}

			if(!$this->{$this->model}->updateUrunGrup($postlar["grupid"],$id))
				Warning::set("Veriler eklendi fakat grup bilgisi güncellenemedi.","info");

			Warning::set("Ürün özellikleri ve miktarları başarıyla kayıt edildi.","success");

		}

	}

?>
