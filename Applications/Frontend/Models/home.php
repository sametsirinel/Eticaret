<?php

	class home_model extends Model{

		public function getAll(){

			return $this->db->
			select("urunler.*,max(urunmiktar.fiyat) as max,min(urunmiktar.fiyat) as min,ifnull(dosyalar.kucuk,'noimg.png') as resmi")->
			where("urunler.onay=",1)->
			join("dosyalar","dosyalar.id = urunler.resim","left")->
			join("urunmiktar","urunmiktar.urunid = urunler.id","inner")->
			groupBy("urunler.id")->
			limit(Uri::segment(-1),12)->
			get("urunler");

		}
		public function vitrin(){

			return $this->db->where("urunler.onay=",1)->select("urunler.*,ifnull(dosyalar.orta,'noimg.png') as resmi")->orderBy("rand()")->join("dosyalar","dosyalar.id = urunler.resim","left")->limit(0,3)->get("urunler");

		}

	}

?>
