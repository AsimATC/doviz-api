<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>


  <?php

  // EuroFXRef veri kaynağını indirin ve XML dosyasını okuyun
  $xml = simplexml_load_file('http://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml');

  // Döviz kurlarını alın
  $rates = array();
  foreach ($xml->Cube->Cube->Cube as $rate) {
    $rates[(string) $rate['currency']] = (float) $rate['rate'];
  }

  // USD/TRY döviz çifti için döviz kuru hesaplayın
  $usd_try_rate = $rates['TRY'] / $rates['USD'];

  // Döviz kuru bilgisini ekrana yazdırın
  echo "USD = $usd_try_rate TRY";
  echo "<br>";
  // Döviz kurunu ekrana yazdırın
  echo "USD = " . $rates['USD'];
  ?>
</body>

</html>