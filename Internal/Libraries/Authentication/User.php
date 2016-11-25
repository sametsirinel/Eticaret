<?php

	class InternalUser{

		protected $error = false;

		protected $username = null;

		protected $password = null;

		protected $noimg = "noimg.jpg";

		protected $logoutPage = "panel/plogin/logout";

		public function error(){

			return $this->error ? $this->error : false ;

		}

		public function kadi(){

			return $this->get("kadi");

		}

		public function sifre(){

			return $this->get("sifre");

		}

		public function id(){

			return $this->get("id");

		}

		public function resim(){

			return $this->get("resim");

		}

		public function adisoyadi(){

			return $this->get("adi")." ".$this->get("soyadi");

		}

		public function ortaresim(){

			return $this->get("orta");

		}

		public function kucukresim(){

			return $this->get("kucuk");

		}

		public function yetki(){

			return $this->get("yetki");

		}

		public function yetkiadi(){

			return $this->get("yetkiadi");

		}

		public function login($username=null,$password=null,$cookie = false,$permission = false,$permissionNumber = 0){

			$this->username = $username;
			$this->password = $password;

			if(trim($this->username)==null || trim($this->password)==null){

				$this->error = "Kullanıcı Adı Veya Şifre Boş Bırakılamaz";
				return  false;

			}

			$this->password = $this->encrypt($this->password);

			$login = $this->checkPermission($permission,$permissionNumber);

			if($login->totalRows()>0){

				$kullanici = $login->row();

				$kullanici->permission = $permission;

				$kullanici->permissionNumber = $permissionNumber;

				$kullanici->cookie = $cookie;

				Session::insert("Kullanici_bilgi",$kullanici);
				if($cookie){

					Cookie::insert("Kullanici_bilgi",json::encode($kullanici),60*60*24*30);

				}

				$this->error = false;
				return true;

			}else{

				$this->error = "Bu bilgilerde kullanıcı bulunamadı";
				return false;

			}

		}

		protected function checkPermission($permission = false,$permissionNumber = 0){

			$permission = (Boolean) $permission;

			if(!$permission){

				$login = DB::
				select("kullanici.*,ifnull(yetki.yetkiadi,'Kullanıcı') as yetkiadi,ifnull(dosyalar.adi,'{$this->noimg}') as resim,
				ifnull(dosyalar.orta,'{$this->noimg}') as orta,
				ifnull(dosyalar.kucuk,'{$this->noimg}') as kucuk")->
				where("kadi=",$this->username,"and")->
				where("sifre=",$this->password,"and")->
				where("yetki=",0,"or")->
				where("email=",$this->username,"and")->
				where("sifre=",$this->password,"and")->
				where("yetki=",0)->
				join("dosyalar","dosyalar.id = kullanici.resim","left")->
				join("yetki","yetki.id = kullanici.yetki","left")->
				get("kullanici");

			}else{

				$permissionNumber = is_numeric($permissionNumber) ?  $permissionNumber : 0 ;

				if($permissionNumber<1){

					$login = DB::select("kullanici.*,ifnull(yetki.yetkiadi,'Kullanıcı') as yetkiadi,ifnull(dosyalar.adi,'{$this->noimg}') as resim,
					ifnull(dosyalar.orta,'{$this->noimg}') as orta,
					ifnull(dosyalar.kucuk,'{$this->noimg}') as kucuk")->
					where("kadi=",$this->username,"and")->
					where("sifre=",$this->password,"and")->
					where("yetki>",0,"or")->
					where("email=",$this->username,"and")->
					where("sifre=",$this->password,"and")->
					where("yetki>",0)->
					join("dosyalar","dosyalar.id = kullanici.resim","left")->
					join("yetki","yetki.id = kullanici.yetki","left")->
					get("kullanici");

				}else{

					$login = DB::select("kullanici.*,ifnull(yetki.yetkiadi,'Kullanıcı') as yetkiadi,ifnull(dosyalar.adi,'{$this->noimg}') as resim,
					ifnull(dosyalar.orta,'{$this->noimg}') as orta,
					ifnull(dosyalar.kucuk,'{$this->noimg}') as kucuk")->
					where("kadi=",$this->username,"and")->
					where("sifre=",$this->password,"and")->
					where("yetki=",$permissionNumber,"or")->
					where("email=",$this->username,"and")->
					where("sifre=",$this->password,"and")->
					where("yetki=",$permissionNumber)->
					join("dosyalar","dosyalar.id = kullanici.resim","left")->
					join("yetki","yetki.id = kullanici.yetki","left")->
					get("kullanici");

				}

			}

			$this->error = $login ? false : "Sunucu Erişim Problemi" ;

			return $login ? $login : false;

		}

		protected function encrypt($string = null){

			return sha1(md5($string));

		}

		public function fblogin($fbid=null){

			if(trim($fbid)==null){

				Message::set("Kullanıcı Adı Veya Şifre Boş Bırakılamaz");
				return  false;

			}

			$login = DB::
			where("fbid=",$fbid,"and")->
			where("onay=",1,"or")->
			get("kullanici");


			if($login->totalRows()>0){

				$kullanici = $login->row();

				if($kullanici->kadi==null || $kullanici->sifre==null){

					Session::insert("fbid",$fbid);
					redirect(baseurl("login/fbusername/"));

				}else{

					Session::insert("Kullanici_bilgi",json_encode($kullanici));

					Message::set("Giriş Başarılı");
					return true;

				}

			}else{

				Message::set("Kullanıcı adı veya şifre hatalı");
				return false;

			}

		}

		public function get($key=null){

			return $key==null ? Session::select("Kullanici_bilgi") : (isset(Session::select("Kullanici_bilgi")->{$key}) ? Session::Select("Kullanici_bilgi")->{$key} : "Key Bulunamadı");

		}

		public function active($kadi=null,$sifre=null){

			return DB::
			where("kadi=",$kadi,"and")->
			where("sifre=",$sifre,"and")->
			where("email=",$kadi,"and")->
			where("sifre=",$sifre)->
			update("kullanici",array("onay"=>1));

		}

		public function logoutPage($string=null){

			$this->logoutPage = empty($string) ? "" : $string;
			return $this;

		}

		public function check(){

			if(Cookie::select("Kullanici_bilgi")){
				$session = Json::decode(Cookie::select("Kullanici_bilgi"));
			}else if(Session::select("Kullanici_bilgi")){
				$session = Session::select("Kullanici_bilgi");
			}else{
				(object)$session = "";
			}

			$this->username = isset($session->email) ? $session->email : "";
			$this->password = isset($session->sifre) ? $session->sifre : "";
			$permission = isset($session->permission) ? $session->permission : "";
			$permissionNumber = isset($session->permissionNumber) ? $session->permissionNumber : "";
			$user = $this->checkPermission($permission,$permissionNumber);

			if($user->totalRows()<1){

				$this->error = "Oturum kapandı";
				return false;

			}else{

				$userRow = $user->row();
				$userRow->permission = $session->permission;
				$userRow->permissionNumber = $session->permissionNumber;
				Session::insert("Kullanici_bilgi",$userRow);
				return true;

			}

		}

		public function logout($page = null){

			$this->logoutPage = empty($page) ? $this->logoutPage : $page;

			Session::deleteAll();
			Cookie::deleteAll();

			redirect(baseurl($this->logoutPage));

		}

		public function create($array = []){

			$this->error = "";
			if(!isset($array["email"])){
				$this->error .= "Email Adresi Gereklidir<br>";
			}
			if(!isset($array["sifre"])){
				$this->error .= "Şifre Gereklidir";
			}
			if($this->error){
				return false;
			}
			$array["sifre"] = $this->encrypt($array["sifre"]);
			if(DB::insert("kullanici",$array)){
				$sonuc = true;
			}else{
				$this->error = "Veritabanı bağlantı problemi";
				$sonuc = false;
			}

			return $sonuc;

		}

		public function update($username=null,$password=null,$dizi = []){

			$this->error = "";

			if($username==null){
				$this->error .= "Kullanıcı Adı Gerekmektedir.";
				return false;
			}

			if($password==null){
				$this->error .= "Şifre Gerekmektedir.";
				return false;
			}

			if(DB::where("kadi=",$username,"and")->where("sifre=",$password)->update("kullanici",$dizi)){
				$this->error = false;
				return  true;
			}else{
				$this->error ="Kullanıcı bulunamadı veya hatalı stun girişi yapıldı.";
				return false;
			}

		}

		public function delete($username=null,$password=null){
			$this->error = "";

			if($username==null){
				$this->error .= "Kullanıcı Adı Gerekmektedir.<br>";
				return false;
			}

			if($password==null){
				$this->error .= "Şifre Gerekmektedir.";
				return false;
			}

			if(DB::where("kadi=",$username,"and")->where("sifre=",$password)->delete("kullanici")){
				$this->error = false;
				return  true;
			}else{
				$this->error ="Kullanıcı bulunamadı veya hatalı stun girişi yapıldı.";
				return false;
			}

		}

	}

?>
