<?php

	class iletisim_model extends Model{

		public function ekleniyor($postlar){

			return $this->db->insert("iletisim",$postlar);

		}

	}

?>
