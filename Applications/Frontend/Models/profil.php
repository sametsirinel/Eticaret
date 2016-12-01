<?php

  class profil_model extends Model
  {

    public function getid($id=0){

      return $this->db->where("id=",$id)->get("kullanici");

    }

    public function duzenleniyor($postlar = []){

      return $this->db->where("id=",User::id())->update("kullanici",$postlar);

    }

  }

?>
