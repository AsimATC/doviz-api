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

<hr>

Skip to content
Search or jump to…
Pull requests
Issues
Codespaces
Marketplace
Explore
 
@AsimATC 
berkocan
/
Ucretsiz-Doviz-Finans-Scripti
Public
Code
Issues
Pull requests
Actions
Projects
Security
Insights
Ucretsiz-Doviz-Finans-Scripti/index.php /
@berkocan
berkocan Add files via upload
Latest commit 87e6358 on Jun 27, 2021
 History
 1 contributor
104 lines (104 sloc)  6.61 KB

<?php 
	$JSONKur = json_decode(file_get_contents('https://api.genelpara.com/embed/para-birimleri.json'), true);
	if(str_replace(',', '.', $JSONKur['XU100']['degisim']) >= 0) { $KurDegisimXU100 = "up"; } else { $KurDegisimXU100 = "down"; }
	if(str_replace(',', '.', $JSONKur['USD']['degisim']) >= 0) { $KurDegisimUSD = "up"; } else { $KurDegisimUSD = "down"; }
	if(str_replace(',', '.', $JSONKur['EUR']['degisim']) >= 0) { $KurDegisimEUR = "up"; } else { $KurDegisimEUR = "down"; }
	if(str_replace(',', '.', $JSONKur['GBP']['degisim']) >= 0) { $KurDegisimGBP = "up"; } else { $KurDegisimGBP = "down"; }
	if(str_replace(',', '.', $JSONKur['BTC']['degisim']) >= 0) { $KurDegisimBTC = "up"; } else { $KurDegisimBTC = "down"; }
	if(str_replace(',', '.', $JSONKur['ETH']['degisim']) >= 0) { $KurDegisimETH = "up"; } else { $KurDegisimETH = "down"; }
	if(str_replace(',', '.', $JSONKur['XRP']['degisim']) >= 0) { $KurDegisimXRP = "up"; } else { $KurDegisimXRP = "down"; }
	if(str_replace(',', '.', $JSONKur['BCH']['degisim']) >= 0) { $KurDegisimBCH = "up"; } else { $KurDegisimBCH = "down"; }
	if(str_replace(',', '.', $JSONKur['LTC']['degisim']) >= 0) { $KurDegisimLTC = "up"; } else { $KurDegisimLTC = "down"; }
	if(str_replace(',', '.', $JSONKur['GA']['degisim']) >= 0) { $KurDegisimGA = "up"; } else { $KurDegisimGA = "down"; }
?>
<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="UTF-8" />
<title>Ücretsiz Döviz Script</title>
<meta name="description" content="Ücretsiz Döviz Script" />
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="style.css" />
<link rel="shortcut icon" href="fav.jpg" />
</head>
<body>
	<section class="default-card">
		<div class="container card">
			<h1 class="title-main">Döviz Kurları</h1>
			<p class="subheading">Veriler 15dk gecikmeli olarak güncellenmektedir.</p>
			<div class="doviz-tablo">
				<div class="doviz-tablos">
					<ul class="doviz-bas">
						<li>BIRIM</li>
						<li>YON</li>
						<li>FIYAT</li>
						<li>DEGISIM</li>
					</ul>
					<ul class="doviz-list">
						<li class="title"><img src="/img/BIST.png">Bist 100<span>XU100</span></li>
						<li class="yon"><img src="/img/<?php echo $KurDegisimXU100; ?>.png"></li>
						<li class="fiyat"><span>₺ <?php echo number_format($JSONKur['XU100']['satis'], 0, ',', '.'); ?></span></li>
						<li class="degisim"><span class="<?php echo $KurDegisimXU100; ?>"><?php echo $JSONKur['XU100']['degisim']; ?>%</span></li>
					</ul>
					<ul class="doviz-list">
						<li class="title"><img src="/img/ALTIN.png">Gram Altın<span>GA</span></li>
						<li class="yon"><img src="/img/<?php echo $KurDegisimGA; ?>.png"></li>
						<li class="fiyat"><span>₺ <?php echo number_format($JSONKur['GA']['satis'], 2, ',', '.'); ?></span></li>
						<li class="degisim"><span class="<?php echo $KurDegisimGA; ?>"><?php echo $JSONKur['GA']['degisim']; ?>%</span></li>
					</ul>
					<ul class="doviz-list">
						<li class="title"><img src="/img/USD.png">Dolar<span>USD</span></li>
						<li class="yon"><img src="/img/<?php echo $KurDegisimUSD; ?>.png"></li>
						<li class="fiyat"><span>₺ <?php echo number_format($JSONKur['USD']['satis'], 4, ',', '.'); ?></span></li>
						<li class="degisim"><span class="<?php echo $KurDegisimUSD; ?>"><?php echo $JSONKur['USD']['degisim']; ?>%</span></li>
					</ul>
					<ul class="doviz-list">
						<li class="title"><img src="/img/EUR.png">Euro<span>EUR</span></li>
						<li class="yon"><img src="/img/<?php echo $KurDegisimEUR; ?>.png"></li>
						<li class="fiyat"><span>₺ <?php echo number_format($JSONKur['EUR']['satis'], 4, ',', '.'); ?></span></li>
						<li class="degisim"><span class="<?php echo $KurDegisimEUR; ?>"><?php echo $JSONKur['EUR']['degisim']; ?>%</span></li>
					</ul>
					<ul class="doviz-list">
						<li class="title"><img src="/img/GBP.png">Sterlin<span>GBP</span></li>
						<li class="yon"><img src="/img/<?php echo $KurDegisimGBP; ?>.png"></li>
						<li class="fiyat"><span>₺ <?php echo number_format($JSONKur['GBP']['satis'], 4, ',', '.'); ?></span></li>
						<li class="degisim"><span class="<?php echo $KurDegisimGBP; ?>"><?php echo $JSONKur['GBP']['degisim']; ?>%</span></li>
					</ul>
					<ul class="doviz-list">
						<li class="title"><img src="/img/BTC.png">Bitcoin<span>BTC</span></li>
						<li class="yon"><img src="/img/<?php echo $KurDegisimBTC; ?>.png"></li>
						<li class="fiyat"><span>$ <?php echo number_format($JSONKur['BTC']['satis'], 4, ',', '.'); ?></span></li>
						<li class="degisim"><span class="<?php echo $KurDegisimBTC; ?>"><?php echo $JSONKur['BTC']['degisim']; ?>%</span></li>
					</ul>
					<ul class="doviz-list">
						<li class="title"><img src="/img/ETH.png">Ethereum<span>ETH</span></li>
						<li class="yon"><img src="/img/<?php echo $KurDegisimETH; ?>.png"></li>
						<li class="fiyat"><span>$ <?php echo number_format($JSONKur['ETH']['satis'], 4, ',', '.'); ?></span></li>
						<li class="degisim"><span class="<?php echo $KurDegisimETH; ?>"><?php echo $JSONKur['ETH']['degisim']; ?>%</span></li>
					</ul>
					<ul class="doviz-list">
						<li class="title"><img src="/img/XRP.png">Ripple<span>XRP</span></li>
						<li class="yon"><img src="/img/<?php echo $KurDegisimXRP; ?>.png"></li>
						<li class="fiyat"><span>$ <?php echo number_format($JSONKur['XRP']['satis'], 4, ',', '.'); ?></span></li>
						<li class="degisim"><span class="<?php echo $KurDegisimXRP; ?>"><?php echo $JSONKur['XRP']['degisim']; ?>%</span></li>
					</ul>
					<ul class="doviz-list">
						<li class="title"><img src="/img/BCH.png">Bitcoin Cash<span>BCH</span></li>
						<li class="yon"><img src="/img/<?php echo $KurDegisimBCH; ?>.png"></li>
						<li class="fiyat"><span>$ <?php echo number_format($JSONKur['BCH']['satis'], 4, ',', '.'); ?></span></li>
						<li class="degisim"><span class="<?php echo $KurDegisimBCH; ?>"><?php echo $JSONKur['BCH']['degisim']; ?>%</span></li>
					</ul>
					<ul class="doviz-list">
						<li class="title"><img src="/img/LTC.png">Litecoin<span>LTC</span></li>
						<li class="yon"><img src="/img/<?php echo $KurDegisimLTC; ?>.png"></li>
						<li class="fiyat"><span>$ <?php echo number_format($JSONKur['LTC']['satis'], 4, ',', '.'); ?></span></li>
						<li class="degisim"><span class="<?php echo $KurDegisimLTC; ?>"><?php echo $JSONKur['LTC']['degisim']; ?>%</span></li>
					</ul>
				</div>
			</div>
			<p class="text">Piyasa verileri <a href="https://www.genelpara.com/" target="_blank">GenelPara</a> tarafından sağlanmaktadır.</p>
			<div class="clear"></div>
		</div>
	</section>
</body>
</html>
Footer
© 2023 GitHub, Inc.
Footer navigation
Terms
Privacy
Security
Status
Docs
Contact GitHub
Pricing
API
Training
Blog
About
Ucretsiz-Doviz-Finans-Scripti/index.php at main · berkocan/Ucretsiz-Doviz-Finans-Scripti 

  <script>
  var tcmbDovizKuru = require('tcmb-doviz-kuru-master');
 
 function cb(error, data) {
     if (error) {
         console.log('error', error)
     }
     console.log(JSON.stringify(data));
 }
  
 tcmbDovizKuru(cb);
  </script>
</body>

</html>