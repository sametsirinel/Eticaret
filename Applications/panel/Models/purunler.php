<?php

	class purunler_model extends Controller{

		public $dbname = "urunler";

		public function getall(){

			return $this->db->select($this->dbname.".*,ifnull(dosyalar.kucuk,'noimg.gif') as resmi")->join("dosyalar","dosyalar.id = ".$this->dbname.".resim","left")->limit(Uri::segment(-1),12)->where("onay<",2)->orderBy($this->dbname.".id","desc")->get($this->dbname);

		}

		public function getid($id){

			return $this->db->where("id=",$id)->get($this->dbname);

		}

		public function update($postlar=array(),$id){

			return  $this->db->where("id=",$id)->update($this->dbname,$postlar);

		}

		public function deleteAlan($id){

			return $this->db->where("id=",$id)->delete($this->dbname);

		}

		public function isEmpty(){

			return $this->db->where("onay=",2)->orderBy("id","desc")->get($this->dbname);

		}

		public function newInsert(){

			return $this->db->insert($this->dbname,array("onay"=>2));

		}

		public function urunResim($id=0){

			return  $this->db->select("urunresim.id,ifnull(dosyalar.kucuk,'noimg.png') as resmi")->where("urunresim.urunid=",$id)->join("dosyalar","dosyalar.id = urunresim.resim")->get("urunresim");

		}

		public function resimSil($id=0 ){

			return $this->db->where("id=",$id)->delete("urunresim");

		}

		public function insertUrunResim($urunid= 0 , $resim = 0){

			return $this->db->insert("urunresim",array("urunid"=>$urunid,"resim"=>$resim));

		}

		public function kategoriler(){

			return $this->db->get("kategoriler");

		}

		public function katEkle($katid,$urunid){

			return $this->db->insert("urunKat",["urunid"=>$urunid,"katid"=>$katid]);

		}

		public function katSil($urunid){

			return $this->db->where("urunid=",$urunid)->delete("urunKat");

		}

		public function getUrunKat($urunid){

			return $this->db->where("urunid=",$urunid)->get("urunKat");

		}

		public function getUrunCheck($katid,$urunid){

			return $this->db->where("urunid=",$urunid,"and")->where("katid=",$katid)->get("urunKat")->totalRows();

		}

		public function gruplar(){

			return $this->db->get("gruplar");

		}

		public function getGrupOzellik($id = 0){

			return $this->db->select("ozellikIliski.*,ozellikler.adi as adi")->where("ozellikIliski.grupid=",$id)->join("ozellikler","ozellikIliski.ozellikid = ozellikler.id","inner")->get("ozellikIliski");

		}

		public function deleteOzellikler($id = 0){

			return $this->db->where("urunid=",$id)->delete("urunmiktar");

		}

		public function insertOzellik($postlar = []){

			return $this->db->insert("urunmiktar",$postlar);

		}

		public function getUrunOzellikleri($id = 0){

			return $this->db->where("urunid=",$id)->join("ozellikler","ozellikler.id = urunmiktar.ozellikid")->get("urunmiktar");

		}

		public function updateUrunGrup($id = 0,$urunid = 0){

			return $this->db->where("id=",$urunid)->update($this->dbname,["grupid"=>$id]);

		}

	}

?>
