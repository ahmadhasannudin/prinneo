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
  echo '<option value="">Layanan Tidak Ditemukan</option>';
} else {

  $data = json_decode($response, true);

  if (count($data['rajaongkir']['results']) == 0 || !isset($data['rajaongkir']['results'][0]['costs'])) {
    echo '<option value="">Layanan Tidak Ditemukan</option>';
  }

  foreach ($data['rajaongkir']['results'][0]['costs'] as $key => $value) {
    echo '<option value="' . $value['cost'][0]['value'] .
      '" data-ongkir="' . format_currency($value['cost'][0]['value']) .
      '" data-total="' . format_currency($value['cost'][0]['value']) .
      '">' . $value['service'] . '</option>';
  }
}

function format_currency($val = 0)
{
  return 'Rp. ' . number_format($val, 0, ',', '.');
}
