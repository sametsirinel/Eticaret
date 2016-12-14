<?php

  class profil_model extends Model
  {

    public function getid($id=0){

      return $this->db->where("id=",$id)->get("kullanici");

    }

    public function adresler(){

      return $this->db->where("kid=",User::id())->limit(Uri::segment(-1),12)->get("adresler");

    }

    public function duzenleniyor($postlar = []){

      return $this->db->where("id=",User::id())->update("kullanici",$postlar);

    }

    public function adresEkleniyor($postlar = []){

      return $this->db->insert("adresler",$postlar);

    }

    public function adresKontrol($id=0){

      return $this->db->where("id=",$id,"and")->where("kid=",User::id())->get("adresler");

    }

    public function adresSil($id=0){

      return $this->db->where("id=",$id,"and")->where("kid=",User::id())->delete("adresler");

    }

  }

?>
