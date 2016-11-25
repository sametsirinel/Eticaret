<?php

  class search_model extends Model{

    public function getall($kelime){

      return $this->db->query("select kullanici.id,concat(kullanici.adi,' ',kullanici.soyadi) as adi, '1' as type from kullanici
union
select urunler.id,urunler.adi,'2' as type  from urunler
union
select kategoriler.id,kategoriler.adi,'3' as type  from kategoriler where adi like '%$kelime%'");

    }

  }

?>
