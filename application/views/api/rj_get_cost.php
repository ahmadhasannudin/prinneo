<?php
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://pro.rajaongkir.com/api/cost",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "origin=$origin&originType=city&destination=$destination&destinationType=city&weight=$berat&courier=$courier&harga=$harga",
  CURLOPT_HTTPHEADER => array(
    "content-type: application/x-www-form-urlencoded",
    "key: 8c8b054430c2296afa1acdd3d874d69f"
  ),
));
$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
if ($err) {
  echo "cURL Error #:" . $err;
} else {
  // echo $response;
  $data = json_decode($response, true);
  //echo json_encode($k['rajaongkir']['results']);
  /*
  for ($k=0; $k < count($data['rajaongkir']['results']); $k++){
  echo "<li='".$data['rajaongkir']['results'][$k]['code']."'>".$data['rajaongkir']['results'][$k]['service']."</li>";
  //echo $data['rajaongkir']['results'][$k]['code'];
}
*/
//echo $data['rajaongkir']['results']['costs']['service'];
}
?>
<p>Estimasi Ongkos Kirim</p>
<div class="card" style="border: 1px solid #474443">
  <div class="card-body">
    <?php echo $data['rajaongkir']['origin_details']['city_name'];?> ke <?php echo $data['rajaongkir']['destination_details']['city_name'];?> @<?php echo $berat;?>gram Kurir : <span id="courier-type"><?php echo strtoupper($courier); ?></span>
    <?php
    $count = count($data['rajaongkir']['results'][0]['costs']);
    for ($k=0; $k < count($data['rajaongkir']['results']); $k++) {
      ?>
      <div title="<?php echo strtoupper($data['rajaongkir']['results'][$k]['name']);?>" style="padding:10px;border:0px;" class="table-responsive">
        <table class="table table-striped">
          <tr>
            <th>No.</th>
            <th>Jenis Layanan</th>
            <th class="text-center">Waktu Pengantaran</th>
            <th class="text-center">Ongkos Kirim</th>
            <th class="text-center">Harga</th>
          </tr>
          <?php
          if ($count==0) {
        # code...
            echo "<tr><td colspan=3>Layanan Tidak Ditemukan</td></tr>";
          }
          for ($l=0; $l < count($data['rajaongkir']['results'][$k]['costs']); $l++) {
            ?>
            <tr>
              <td><?php echo $l+1;?></td>
              <td id="">
                <div id="jenis-courier-<?php echo $l ?>" style="font:bold 16px Arial"><?php echo $data['rajaongkir']['results'][$k]['costs'][$l]['service'];?></div>
                <div style="font:normal 11px Arial"><?php echo $data['rajaongkir']['results'][$k]['costs'][$l]['description'];?></div>
              </td>
              <td align="center">&nbsp;<?php echo $data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['etd'];?> Hari</td>
              <td id="price-courier-<?php echo $l  ?>" align="center"><?php echo number_format($data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['value']);?></td>
              <td class="text-center">
                <?php echo number_format($data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['value']+$harga);?>
              </td>
            </tr>
            <?php
          }
          ?>
        </table>
      </div>
      <?php
    }
    ?>
  </div>
</div>
