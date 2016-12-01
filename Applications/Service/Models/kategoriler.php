<?php

  class kategoriler_model extends Model{

    public function getAll(){

      return $this->db->get("kategoriler");

    }

  }

?>
