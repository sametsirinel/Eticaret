<?php

	class sepet extends Controller{

		public function index(){
			Autoloader::restart();
			$veriler = array(

				"sayfa"=>Import::page("cart","",true)

			);

			Import::MasterPage($veriler);

		}

		public function ekle($id){

			$postlar = Method::post();

			$fiyatid = $postlar["fiyatid"];
			$miktar = $postlar["miktar"];

			if(!is_numeric($id) || !is_numeric($fiyatid) || !is_numeric($miktar))
				redirect(baseurl("404"));

			$model = $this->sepet_model->checkOzellik($id,$fiyatid);

			if(!$model || $model && $model->totalRows()<1)
				redirect(baseurl("404"));

			$fiyat = $model->row()->fiyat;

			$model = $this->sepet_model->urunKontrol($id);

			if(!$model || $model && $model->totalRows()<1)
				redirect(baseurl("404"));

			$row = (array)$model->row();

			$row["name"] = $row["seo_link"]."_".$row["id"];
			$row["price"] = $fiyat;
			$row["fiyatid"] = $fiyatid;
			$row["quantity"] = $miktar;

			Cart::insertItem($row);

			redirect(baseurl("sepet"));

		}

		public function guncelle(){

			$postlar = Method::post();

			if($postlar){

				$idler = $postlar["id"];
				$adet = $postlar["adet"];

				for($x=0;$x<count($idler);$x++){

					$id =$idler[$x];

					$item =  array('quantity' => $adet[$x]);

					if($adet[$x]==0){

						Cart::deleteItem($id);

					}else{

						Cart::updateItem($id,$item);

					}

				}

				if(Cart::error()){

					Warning::set("Sepet güncellenemedi","info","sepet");

				}else{

					Warning::set("Sepetiniz Güncellendi ","success","sepet");

				}

			}else{

				Warning::set("Sepetiniz Boş ! ","","sepet");

			}

		}

		public function cikar($par = null){

			Cart::deleteItem($par);
			if(!Cart::error())

				Warning::set("Ürün Sepetten Çıkarıldı","success","sepet");

			else

				Warning::set("Ürün Sepetten Çıkarılamadı");

		}

		public function tumCikar(){

			Cart::deleteItems();
			if(Cart::error()){

				Warning::set("Ürünler Sepetten Çıkarılamadı");

			}else{

				Warning::set("Ürünler Sepetten Çıkarıldı","success","sepet");


			}

		}

	}

?>
