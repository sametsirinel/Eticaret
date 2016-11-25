<table class="table table-stripped table-bordered">
  <thead>
    <tr>
      <th>Özellik Adı</th>
      <th>Ürün Adeti</th>
      <th>Ürün Fiyatı</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($gruplar as $grup){ ?>
      <input type="hidden" value="<?=$grup->id; ?>" name="grupid"/>
      <tr>
        <td><?=$grup->adi ?><input type="hidden" value="<?=$grup->ozellikid?>" name="ozellikid[]"/></td>
        <td>
          <input type="text" class="form-control" name="miktarlar[]" required value="<?=isset($grup->adet) ? $grup->adet : ''; ?>" placeholder="10">
        </td>
        <td>
          <input type="text" class="form-control" name="fiyatlar[]" required value="<?=isset($grup->fiyat) ? $grup->fiyat : ''; ?>" placeholder="10 TRY">
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>
