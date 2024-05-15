<?php
    $kategori = "Macera";
    $filmAdi = "Paper Lives";
    $filmAciklama = "Kağıt toplayarak geçinen ve sağlığı giderek kötüleşen Mehmet terk edilmiş BIR çocuk bulur. Birden hayatına giren küçük Ali, onu kendi çocukluğuyla yüzleştirecektir. (18 yaş ve üzeri için uygundur)";

    
    #1- Film açıklamasındaki baş harf hariç tüm harfleri küçük harfe çeviriniz.
    $filmAciklama = ucfirst(strtolower($filmAciklama));
     echo $filmAciklama;
    echo "<br>";

    #2- Film açıklaması içindeki ilk 50 karakteri alarak sonuna "..." ekleyiniz. (substr) 
    $filmAciklama = substr($filmAciklama,0,50)."...";
    echo $filmAciklama;
    echo "<br>";
    
    #3- Her bir film için url bilgisini film başlığına göre oluşturunuz.    
    $filmAdi = str_replace(" ","-",$filmAdi);
    $filmAdi = strtolower($filmAdi);
    echo $filmAdi;
    echo "<br>";

    #4- "baslik" isminde bir sabit oluşturarak sayfanın h1 etiketinde kullanınız.
    define("baslik","Yusuf Atakan");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Odev-1</title>
</head>

<body>
    <h1>
        <?php echo baslik ?>
    </h1>
</body>

</html>