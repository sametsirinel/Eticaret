<?php

	class giris_model extends Model{

		public function GirisKontrol($kadi,$sifre){

			$sifre = sha1(md5($sifre));
			return $this->db->select("kullanici.*,ifnull(dosyalar.orta,'noimg.jpg') as resim")->
			join("dosyalar","dosyalar.id = kullanici.resim","left")->
			where("kadi=",$kadi,"and")->
			where("sifre=",$sifre,"and")->
			get("kullanici");

		}

	}

?>
