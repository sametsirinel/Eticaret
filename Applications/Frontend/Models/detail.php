<?php

  class detail_model extends Model{

    public function getId($id=0){

      return $this->db->
      where("id=",$id)->
      get("urunler");

    }

    public function getSeo($seo_link,$id){

      return $this->db->select("urunler.*,gruplar.adi as grupadi")->
      where("urunler.seo_link=",$seo_link,"and")->
      join("gruplar","gruplar.id = urunler.grupid","inner")->
      where("urunler.id=",$id)->
      get("urunler");

    }

    public function getUrunResim($id=0){

      return $this->db->select("urunresim.id,ifnull(dosyalar.adi,'noimg.png') as resim")->
      where("urunid=",$id)->
      join("dosyalar","dosyalar.id = urunresim.resim","left")->
      get("urunresim");

    }

    public function getMaxMin($id=0){

      return $this->db->select("max(fiyat) as max,min(fiyat) as min")->where("urunid",$id)->get("urunmiktar");

    }

    public function getOzellik($id=0){

      return $this->db->
      select("urunmiktar.*,ozellikler.adi as ozellikadi")->
      join("ozellikler","ozellikler.id = urunmiktar.ozellikid","inner")->
      where("urunid",$id)->
      get("urunmiktar");

    }

    public function getUrunPop($id=0){

      return $this->db->get("");

    }

  }

?>
