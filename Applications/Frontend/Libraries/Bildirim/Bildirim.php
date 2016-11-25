<?php 

	class __USE_STATIC_ACCESS__Bildirim{

		public $user;

		public function getAll($userid){
			## Tüm bildirimler
			return DB::where("radiolar.type=",2,"and")
			->where("bildirim.userid=",$userid)
			->join("radiolar","radiolar.degeri=bildirim.tip","inner")
			->select("radiolar.*,bildirim.*")
			->orderBy("bildirim.tarih","DESC")
			->get("bildirim");
		}
		public function getWithLimit($userid,$limit){
			## Limitli Bildirimler
			return DB::where("radiolar.type=",2,"and")
			->where("bildirim.userid=",$userid)
			->join("radiolar","radiolar.degeri=bildirim.tip","inner")
			->select("radiolar.*,bildirim.*")
			->orderBy("bildirim.tarih","desc")
			->limit($limit)
			->get("bildirim");
		}
		
		public function davetiyeGonder($gonderenid,$aktiviteid,$userid){
			DB::insert('davetiye', array('gonderenid' => $gonderenid, 'aktiviteid' => $aktiviteid, 'userid' => $userid));
		}
		
		public function set($userid,$tip,$mesaj){
			DB::insert('bildirim', array('userid' => $userid, 'durum' => 1,'tip' => $tip, 'aciklama' => $mesaj));
		}
		public function deleteAll($userid){
			DB::where('userid = ', $userid)->delete('bildirim');
		}
		public function delete($userid,$bildirim_id){
			DB::where('id = ', $bildirim_id)->delete('bildirim');
		}
		protected function mail($userMail,$tur,$mesaj){
			## mail gönder
		}
		protected function userBilgi($userid){
			$this->user =  DB::where('id=',$userid)->get('kullanici')->row();
			return $this->user;
		}
		public function davetiyeSil($userid,$aktiviteid){
			DB::where("tip=",0,"AND")->where("userid=",$userid,"AND")->where('aktiviteid=',$aktiviteid)->delete('davetiye');
		}
		
		#HARİTALAR İÇİN AYRI CLASS YAZMAK ZOR GELDİ
		public function haritaCek(){
			return DB::select("id,baslik,lat,lng,seo_link")->get("aktivite");
		}
	}
?>