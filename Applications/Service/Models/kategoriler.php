<?php

  class kategoriler_model extends Model{

    public function getAll(){

      return $this->db->
      select("kullanici.*,ifnull(dosyalar.adi,'noimg.jpg') as resim")->
      join("dosyalar","dosyalar.id = kullanici.resim","left")->
      get("kullanici");

    }

  }

?>
