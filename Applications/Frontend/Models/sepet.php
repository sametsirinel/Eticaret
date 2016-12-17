<?php

  class sepet_model extends Model{

    public function urunKontrol($id = 0){

      return $this->db->
      select("urunler.*,ifnull(dosyalar.adi,'noimg.jpg') as resmi")->
      join("dosyalar","dosyalar.id = urunler.resim","left")->
      where("urunler.id=",$id)->
      get("urunler");

    }

    public function checkOzellik($id = 0,$fiyatid = 0){

      return $this->db->where("id=",$fiyatid,"and")->where("urunid=",$id)->get("urunmiktar");

    }

    public function siparisKontrol($session_id=0){

      return $this->db->where("session_id=",$session_id,"and")->where("userid=",User::id())->get("siparisler");

    }

    public function siparisEkle($postlar = []){

      return $this->db->insert("siparisler",$postlar);

    }

    public function sepeteEkle($postlar){

      return $this->db->insert("sepet",$postlar);

    }

  }

?>
