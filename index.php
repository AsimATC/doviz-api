<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Döviz Api</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap');

        body {
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>

<body>

    Döviz kurlarını json ile api olarak sitenize eklemek için aşağıdaki kodları kullanabilirsiniz. ▼☟↓

    <?php
    $JSON = json_decode(file_get_contents('https://api.genelpara.com/embed/doviz.json'), true);
    ?>
    <ul>
        <li>
            <span>USD</span>
            <span>Fiyat: <?php echo $JSON['USD']['satis']; ?></span>
            <span>Değişim: <?php echo $JSON['USD']['degisim']; ?></span>
        </li>
        <li>
            <span>EUR</span>
            <span>Fiyat: <?php echo $JSON['EUR']['satis']; ?></span>
            <span>Değişim: <?php echo $JSON['EUR']['degisim']; ?></span>
        </li>
        <li>
            <span>GBP</span>
            <span>Fiyat: <?php echo $JSON['GBP']['satis']; ?></span>
            <span>Değişim: <?php echo $JSON['GBP']['degisim']; ?></span>
        </li>
        <li>
            <span>CHF</span>
            <span>Fiyat: <?php echo $JSON['CHF']['satis']; ?></span>
            <span>Değişim: <?php echo $JSON['CHF']['degisim']; ?></span>
        </li>
        <li>
            <span>CAD</span>
            <span>Fiyat: <?php echo $JSON['CAD']['satis']; ?></span>
            <span>Değişim: <?php echo $JSON['CAD']['degisim']; ?></span>
        </li>
    </ul>
    Yada iframe ile hazır kodlar olarak eklemek için aşağıdaki iframe kodunu kullanabilirsiniz.
    <iframe src="https://www.genelpara.com/sitene-ekle/" frameborder="0"></iframe>
    <iframe src="https://www.genelpara.com/api-kodu/" frameborder="0"></iframe>






</body>

</html>