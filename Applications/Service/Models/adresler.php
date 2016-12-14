<?php

  class adresler_model extends Model{

    public function getall($id){

      return $this->db->where("kid=",$id)->get("adresler");

    }

    public function ekle($baslik = null,$aciklama = null,$kid = 0){

      return $this->db->insert("adresler",["baslik"=>$baslik,"aciklama"=>$aciklama,"kid"=>$kid]);

    }

    public function sil($adresid=0,$kid=0){

      return $this->db->where("id=",$adresid,"and")->where("kid=",$kid)->delete("adresler");

    }

  }

?>
