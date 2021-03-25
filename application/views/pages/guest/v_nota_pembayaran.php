<div id="banner">
  <div class="container">
    <h2 class="title-banner">Pembayaran</h2>  
  </div>
</div>  

<!-- konten blog -->
<div id="main">
  <div class="container">
    <form>
      <div class="row">
        <div class="col-md-12 text-center mb-4">
          <h3 class="subtitle-main">Lakukan Pembayaran</h3>
          <hr>
          <p>Nomor Transaksi :</p>
          <p class="font-weight-bold">PRIN20200821012</p>
          <p>Batas Akhir Pembayaran :</p>
          <p class="font-weight-bold">12 Aug 2020, 22:10:15</p>
          <br>
          <p>Jumlah Pembayaran :</p>
          <h4 class="font-weight-bold">Rp. 100.000</h4>
          <div>
          <a href="#" data-toggle="tooltip" data-placement="bottom" title="Bayar tepat sesuai nominal 3 digit terakhir agar tidak menghambat proses verifikasi">Salin Jumlah</a>
          </div>
          <div>
          <img src="<?php echo base_url().'assets/images/img_banks/'.$bank->bank_img ?>" style="width: 100px; margin-top: 100px;" >
          <p>Atas Nama <?php echo $bank->bank_account_name ?></p>
          <p><?php echo $bank->bank_account_number ?></p>
            <a href="#">Salin Nomor Rekening</a>
          </div>
        </div>
        <div class="col-md-12 justify-content-center">
          <button class="btn btn-secondary my-2" style="width: 100%;">Cetak Nota Pembayaran</button>
          <button class="btn btn-primary my-2" style="width: 100%;">Konfirmasi Pembayaran</button>
        </div>
        
     
    </div>
  </form>
</div>
</div>
