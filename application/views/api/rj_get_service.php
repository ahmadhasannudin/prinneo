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
  // echo "<pre>";
  // echo $response;
  $data = json_decode($response, true);
  //echo json_encode($k['rajaongkir']['results']);
  
  for ($k=0; $k < count($data['rajaongkir']['results']); $k++) {
    if (count($data['rajaongkir']['results'])==0) {
      echo "<option>Layanan Tidak Ditemukan</option>";
    }
    for ($l=0; $l < count($data['rajaongkir']['results'][$k]['costs']); $l++) {
      echo "<option value='".$data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['value']."' data-ongkir='Rp. ".number_format($data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['value'],0,",",".")."' data-total='Rp. ".number_format($data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['value']+$harga,0,",",".")."'>".$data['rajaongkir']['results'][$k]['costs'][$l]['service']."</option>";
    }
  }

//echo $data['rajaongkir']['results']['costs']['service'];
}
?>

