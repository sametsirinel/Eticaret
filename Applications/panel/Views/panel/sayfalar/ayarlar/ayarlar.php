
<div class="wrapper wrapper-content animated fadeIn">
	<div class="row">
		<div class="col-lg-12">
			<?php echo Warning::get(); ?>
			<div class="tabs-container">
				<ul class="nav nav-tabs">
					<li class="active"><a data-toggle="tab" href="#genelayarlar">Site Ayarları</a></li>
					<li class=""><a data-toggle="tab" href="#iletisim">İletişim Bilgileri</a></li>
					<li class=""><a data-toggle="tab" href="#email">Email Ayarları</a></li>
					<li class=""><a data-toggle="tab" href="#ssl">Ssl Ayarı</a></li>
				</ul>
				<div class="tab-content">
					<div id="genelayarlar" class="tab-pane active">
						<?php $genelayarlar = json::decode($ayar->siteayari); 	 ?>
						<div class="panel-body" style="padding-top:50px;">
							<form method="post" action="<?php echo baseurl("panel/payarlar/editGenelAyar/")?>" class="form-horizontal">
								<div class="form-group">
									<label class="col-sm-2 control-label">Site Adı</label>
									<div class="col-sm-10">
										<input type="text"  name="adi" value="<?php echo $genelayarlar->adi ?>" class="form-control"> 
										<span class="help-block m-b-none"></span>
									</div>
								</div>
								<div class="hr-line-dashed"></div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Site Başlığı</label>
									<div class="col-sm-10">
										<input type="text"  name="baslik" value="<?php echo $genelayarlar->baslik ?>" class="form-control"> 
										<span class="help-block m-b-none"></span>
									</div>
								</div>
								<div class="hr-line-dashed"></div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Site Açıklaması ( description )</label>
									<div class="col-sm-10">
										<textarea class="form-control" name="aciklama"><?php echo $genelayarlar->aciklama ?></textarea>
										<span class="help-block m-b-none"></span>
									</div>
								</div>
								<div class="hr-line-dashed"></div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Site Etiketleri ( keywords )</label>
									<div class="col-sm-10">
										<textarea class="form-control" name="etiketler"><?php echo $genelayarlar->etiketler ?></textarea>
										<span class="help-block m-b-none"></span>
									</div>
								</div>
								<div class="hr-line-dashed"></div>
								<div class="form-group">
									<div class="col-sm-4 col-sm-offset-2">
										<a class="btn btn-white" href="">İptal</a>
										<button class="btn btn-primary" type="submit">Bilgileri Güncelle</button>
									</div>
								</div>
							</form>
						</div>
					</div>
					<div id="iletisim" class="tab-pane">
						<?php $iletisim = json::decode($ayar->iletisim); ?>
						<div class="panel-body" style="padding-top:50px;">
							<form method="post" action="<?php echo baseurl("panel/payarlar/editIletisim/")?>" class="form-horizontal">
								<div class="form-group">
									<label class="col-sm-2 control-label">Telefon Numarası</label>
									<div class="col-sm-10">
										<input type="text"  name="telefon" value="<?php echo $iletisim->telefon ?>"  class="form-control"> 
										<span class="help-block m-b-none"></span>
									</div>
								</div>
								<div class="hr-line-dashed"></div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Email Adresi</label>
									<div class="col-sm-10">
										<input type="text" name="email" value="<?php echo $iletisim->email ?>"  class="form-control"> 
										<span class="help-block m-b-none"></span>
									</div>
								</div>
								<div class="hr-line-dashed"></div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Adresi</label>
									<div class="col-sm-10">
										<textarea class="form-control" name="adres"><?php echo $iletisim->adres ?></textarea>
										<span class="help-block m-b-none"></span>
									</div>
								</div>
								<div class="hr-line-dashed"></div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Map Kodu ( Google )</label>
									<div class="col-sm-10">
										<input type="text"   name="iframe" value="<?php  if($iletisim->iframe) echo $iletisim->iframe ?>" class="form-control"> 
										<span class="help-block m-b-none"></span>
									</div>
								</div>
								<div class="hr-line-dashed"></div>
								<div class="form-group">
									<div class="col-sm-4 col-sm-offset-2">
										<a class="btn btn-white" href="">İptal</a>
										<button class="btn btn-primary" type="submit">Bilgileri Güncelle</button>
									</div>
								</div>
							</form>
						</div>
					</div>
					<div id="email" class="tab-pane">
						<?php $email = json::decode($ayar->email); ?>
						<div class="panel-body" style="padding-top:50px;">
							<form method="post" action="<?php echo baseurl("panel/payarlar/editEmail/")?>" class="form-horizontal">
								<div class="form-group">
									<label class="col-sm-2 control-label">İletişim Mesajları </br> ( <small>hangi mail adresine gelsin</small> )</label>
									<div class="col-sm-10">
										<input type="text" name="iletisim"  value="<?php echo $email->iletisim ?>"  class="form-control"> 
										<span class="help-block m-b-none"></span>
									</div>
								</div>
								<div class="hr-line-dashed"></div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Reply To <br/> ( <small>Mail Dönüş Adresi</small> )</label>
									<div class="col-sm-10">
										<input type="text" name="replyto"  value="<?php echo $email->replyto ?>"  class="form-control"> 
										<span class="help-block m-b-none"></span>
									</div>
								</div>
								<div class="hr-line-dashed"></div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Email Gönderen Adresi <br/> ( <small>Email Sunucusu Gönderen Adresi</small> )</label>
									<div class="col-sm-10">
										<input type="text" name="gonderenadres"  value="<?php echo $email->gonderenadres ?>"  class="form-control"> 
										<span class="help-block m-b-none"></span>
									</div>
								</div>
								<div class="hr-line-dashed"></div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Email Gönderen Adresi İsmi <br/> ( <small>Email Sunucusu Gönderen Adresi İsmi</small> )</label>
									<div class="col-sm-10">
										<input type="text" name="gonderenadresisim"  value="<?php echo $email->gonderenadresisim ?>"  class="form-control"> 
										<span class="help-block m-b-none"></span>
									</div>
								</div>
								<div class="hr-line-dashed"></div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Email Host <br/> ( <small>Email Sunucusu Hostu</small> )</label>
									<div class="col-sm-10">
										<input type="text" name="mailhost"  value="<?php echo $email->mailhost ?>"  class="form-control"> 
										<span class="help-block m-b-none"></span>
									</div>
								</div>
								<div class="hr-line-dashed"></div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Email Kullanıcı Adı <br/> ( <small>Email Sunucusu Host Email Adresi</small> )</label>
									<div class="col-sm-10">
										<input type="text" name="mailkullanici"  value="<?php echo $email->mailkullanici ?>"  class="form-control"> 
										<span class="help-block m-b-none"></span>
									</div>
								</div>
								<div class="hr-line-dashed"></div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Email Şifre <br/> ( <small>Email Sunucusu Host Şifesi</small> )</label>
									<div class="col-sm-10">
										<input type="password" name="mailsifre"  value="<?php echo $email->mailsifre ?>"  class="form-control"> 
										<span class="help-block m-b-none"></span>
									</div>
								</div>
								<div class="hr-line-dashed"></div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Email Portu <br/> ( <small>Email Sunucusu Host Portu Varsayılan 587</small> )</label>
									<div class="col-sm-10">
										<input type="text" name="mailport"  value="<?php echo $email->mailport ?>"  class="form-control"> 
										<span class="help-block m-b-none"></span>
									</div>
								</div>
								<div class="hr-line-dashed"></div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Email Encode<br/> ( <small>Email Sunucusu Host Encode tsl veya ssl</small> )</label>
									<div class="col-sm-10">
										<input type="text" name="mailencode"  value="<?php echo $email->mailencode ?>"  class="form-control"> 
										<span class="help-block m-b-none"></span>
									</div>
								</div>
								<div class="hr-line-dashed"></div>
								<div class="form-group">
									<div class="col-sm-4 col-sm-offset-2">
										<a class="btn btn-white" href="">İptal</a>
										<button class="btn btn-primary" type="submit">Bilgileri Güncelle</button>
										<a href="<?php echo baseurl("panel/payarlar/mailTest"); ?>" class="btn btn-info">Gönderimi Test Et</a>
									</div>
								</div>
							</form>
						</div>
					</div>
					<div id="icerik" class="tab-pane">
						<?php $icerik = json::decode($ayar->icerik); ?>
						<div class="panel-body" style="padding-top:50px;">
							<form method="post" action="<?php echo baseurl("panel/payarlar/editIcerik/")?>" class="form-horizontal">
								<div class="form-group">
									<label class="col-sm-2 control-label">Üye Olmadan Görülme</label>
									<div class="col-sm-10">
										<select name="icerigi"  class="form-control">
											<?php foreach($icerikler as $row){ ?>
												<option <?php if($row->deger==$icerik->icerigi){ echo "selected"; } ?> value="<?php echo $row->deger ?>"><?php echo $row->adi ?></option>
											<?php } ?>
										</select>
										<span class="help-block m-b-none"></span>
									</div>
								</div>
								<div class="hr-line-dashed"></div>
								<div class="form-group">
									<div class="col-sm-4 col-sm-offset-2">
										<a class="btn btn-white" href="">İptal</a>
										<button class="btn btn-primary" type="submit">Bilgileri Güncelle</button>
									</div>
								</div>
							</form>
						</div>
					</div>
					<div id="ssl" class="tab-pane">
						<?php $ssl = json::decode($ayar->sslayari); ?>
						<div class="panel-body" style="padding-top:50px;">
							<form method="post" action="<?php echo baseurl("panel/payarlar/editSsl/")?>" class="form-horizontal">
								<div class="form-group">
									<label class="col-sm-2 control-label">Sitede Güvenlik Sertifikası ( SSL )</label>
									<div class="col-sm-10">
										<select name="ssl" class="form-control">
											<?php foreach($sslayari as $ssqli){ ?> 	
												<option <?php if($ssqli->deger==$ssl->ssl){ echo "selected"; } ?> value="<?php echo $ssqli->deger ?>"><?php echo $ssqli->adi ?></option>
											<?php } ?>
										</select>
										<span class="help-block m-b-none"></span>
									</div>
								</div>
								<div class="hr-line-dashed"></div>
								<div class="form-group">
									<div class="col-sm-4 col-sm-offset-2">
										<a class="btn btn-white" href="">İptal</a>
										<button class="btn btn-primary" type="submit">Bilgileri Güncelle</button>
									</div>
								</div>
							</form>
						</div>
					</div>
					<div id="sitedurumu" class="tab-pane">
						<?php $sitedurumu = json::decode($ayar->sitedurum); ?>
						<div class="panel-body" style="padding-top:50px;">
							<form method="post" action="<?php echo baseurl("panel/payarlar/editSiteDurumu/")?>" class="form-horizontal">
								<div class="form-group">
									<label class="col-sm-2 control-label">Site Açıklık / Kapalılık</label>
									<div class="col-sm-10">
										<select name="sitedurumu"  class="form-control">
											<?php foreach($AcikKapali as $sitedurum){ ?> 	
												<option <?php if($sitedurum->deger==$sitedurumu->sitedurumu){ echo "selected"; } ?> value="<?php echo $sitedurum->deger ?>"><?php echo $sitedurum->adi ?></option>
											<?php } ?>
										</select>
										<span class="help-block m-b-none"></span>
									</div>
								</div>
								<div class="hr-line-dashed"></div>
								<div class="form-group">
									<div class="col-sm-4 col-sm-offset-2">
										<a class="btn btn-white" href="">İptal</a>
										<button class="btn btn-primary" type="submit">Bilgileri Güncelle</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>