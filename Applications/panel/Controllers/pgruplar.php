<?php

	class pgruplar extends Controller{

		protected $alan = 11;

		protected $select = 1;

		protected $insert = 2;

		protected $update = 3;

		protected $delete = 4;

		protected $OnayKontrol = 5;

		protected $klasor = "gruplar";

		protected $model = "pgruplar_model";

		protected $modulAdi = "Ürün Grubu";

		protected $modulAdic = "Ürünler";

		public function index($params = ''){

			Yetki::select($this->alan);

			$data["EditKontrol"] = Yetki::kontrol($this->alan,$this->update);
			$data["RemoveKontrol"] = Yetki::kontrol($this->alan,$this->delete);
			$data["InsertKontrol"] = Yetki::kontrol($this->alan,$this->insert);
			$data["OnayKontrol"] = Yetki::kontrol($this->alan,$this->OnayKontrol);
			$data["columns"] = array("#"=>"id","Grup Adı"=>"adi");
			$data["DataGrid"] = $this->{$this->model}->getall();
			$data["tableTitle"] = "{$this->modulAdic}";
			$data["DbName"] = $this->{$this->model}->dbname;


			Import::page("panel/MasterPage",array(

				"sayfa"=>Import::page("panel/sayfalar/TopluIslem/list.php",$data,true),
				"method"=>"Listele",
				"class"=>"{$this->modulAdi}"

			));

		}

		public function ekle(){

			Yetki::insert($this->alan);

			$model = $this->{$this->model}->checkInsert();

			if($model->totalRows()<1){

				$postlar = ["onay"=>2];

				if($this->{$this->model}->insert($postlar)){

					$id = DB::insertId();

				}else{

					Warning::Set("Veri tabanı bağlantı problemi");

				}

			}else{

				$row = $model->row();
				$id = $row->id;

			}

			$data = array(

				"title"=>"{$this->modulAdi} Alan Ekleme Formu",
				"titlesmall"=>"",
				"id"=>$id

			);

			Import::page("panel/MasterPage",array(

				"sayfa"=>Import::page("panel/sayfalar/{$this->klasor}/insert.php",$data,true),
				"class"=>"{$this->modulAdi}",
				"method"=>"Ekle"

			));


		}

		public function ajaxEkle(){

			Yetki::insert($this->alan);

			$model = $this->{$this->model}->checkInsert();

			if($model->totalRows()<1){

				$postlar = ["onay"=>2];

				if($this->{$this->model}->insert($postlar)){

					$id = DB::insertId();

				}else{

					echo "Veri tabanı bağlantı problemi";

				}

			}else{

				$row = $model->row();
				$id = $row->id;

			}

			$data = array(

				"title"=>"{$this->modulAdi} Alan Ekleme Formu",
				"titlesmall"=>"",
				"id"=>$id

			);

			echo Import::page("panel/sayfalar/{$this->klasor}/ajaxEdit",$data,true);


		}

		public function edit($id){

			Yetki::insert($this->alan);

			$data = array(

				"title"=>"{$this->modulAdi} Alan Ekleme Formu",
				"titlesmall"=>"",
				"adi"=>$this->{$this->model}->getId($id)->row()->adi,
				"ozellikler"=>$this->{$this->model}->getOzellik($id)->result(),
				"id"=>$id

			);

			Import::page("panel/MasterPage",array(

				"sayfa"=>Import::page("panel/sayfalar/{$this->klasor}/edit",$data,true),
				"class"=>"{$this->modulAdi}",
				"method"=>"Düzenle"

			));


		}

		public function delete($id){

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

		public function doEdit($id){

			Yetki::update($this->alan);

			$postlar = Method::post();

			if($postlar){

				Validation::rules("adi",array("injection","maxchar"=>70,"trim","required"),"Grup Adı : ");
				Validation::rules("ozellik",array("required"),"Özellik Adı : ");

				$hata = Validation::error("string");

				if($hata){

					$dizi = ["type"=>"warning","title"=>"Hata Var !","text"=>$hata];

				}else{

					$ozellikler = $postlar["ozellik"];

					unset($postlar["ozellik"]);

					$postlar["onay"] = 1;

					// print_r($postlar);exit();

					if($this->{$this->model}->update($id,$postlar)){

						$this->{$this->model}->deleteAllOzellik($id);

						foreach($ozellikler as $ozellik){

							$model = $this->{$this->model}->checkOzellik($ozellik);

							if(!empty(trim($ozellik))){

								if($model->totalRows()<1){

									$this->{$this->model}->insertOzellik($ozellik);
									$oid = DB::insertId();

								}else{

									$row = $model->row();
									$oid = $row->id;

								}

								$postlar = ["ozellikid"=>$oid,"grupid"=>$id];

								$this->{$this->model}->insertIliski($postlar);

							}

						}

						$dizi = ["type"=>"success","title"=>"İşlem Başarılı !","text"=>"{$this->modulAdi} başarıyla güncellendi."];

					}else{

						$dizi = ["type"=>"success","title"=>"Bilgilendirme !","text"=>"Veritabanına Bağlanırken Bir Sorunla Karşılaştık. Lütfen Daha Sonra Tekrar Deneyin."];

					}

				}

			}else{

				$dizi = ["type"=>"success","title"=>"Bilgilendirme !","text"=>"Güvenlik Duvarı !"];


			}

			echo json_encode($dizi);

		}

	}

?>
