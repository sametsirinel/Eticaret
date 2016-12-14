<?php

  class urunler_model extends Model{

    public function getAll(){

      return $this->db->
      select("urunler.*,max(urunmiktar.fiyat) as max,min(urunmiktar.fiyat) as min,ifnull(dosyalar.kucuk,'noimg.png') as resmi")->
      where("urunler.onay=",1)->
      join("dosyalar","dosyalar.id = urunler.resim","left")->
      join("urunmiktar","urunmiktar.urunid = urunler.id","inner")->
      groupBy("urunler.id")->
      limit(Uri::segment(-1),100)->
      get("urunler");

    }

  }

?>
