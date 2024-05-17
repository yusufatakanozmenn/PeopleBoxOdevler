<?php

// Kategori listesi
$kategori = array("Macera", "Dram", "Komedi", "Korku", "Bilim Kurgu");

// Filmler listesi
$filmler = array(
    "1" => array(
        "baslik" => "Paper Lives",
        "aciklama" => "Kağıt toplayarak geçinen ve sağlığı giderek kötüleşen Mehmet terk edilmiş bir çocuk bulur. Birden hayatına giren küçük Ali, onu kendi çocukluğuyla yüzleştirecektir. (18 yaş ve üzeri için uygundur)",
        "resim" => "1.jpeg",
        "yorumSayisi" => "0",
        "begeniSayisi" => "Beğeni: 85",
        "vizyon" => true,
        "yapimTarihi" => "03.12.2021",
        "url" => "Paper-Lives"
    ),
    "2" => array(
        "baslik" => "Walking Dead",
        "aciklama" => "Zombi kıyametinin ardından hayatta kalanlar, birlikte verdikleri ölüm kalım mücadelesinde insanlığa karşı duydukları umuda tutunur.",
        "resim" => "2.jpeg",
        "yorumSayisi" => "55",
        "begeniSayisi" => "0",
        "vizyon" => false,
        "yapimTarihi" => "03.12.2021",
        "url" => "Walking-Dead"
    ),
    "3" => array(
        "baslik" => "Walking Dead",
        "aciklama" => "Zombi kıyametinin ardından hayatta kalanlar, birlikte verdikleri ölüm kalım mücadelesinde insanlığa karşı duydukları umuda tutunur.",
        "resim" => "2.jpeg",
        "yorumSayisi" => "55",
        "begeniSayisi" => "0",
        "vizyon" => true,
        "yapimTarihi" => "03.12.2021",
        "url" => "Walking-Dead"
    ),
    "4" => array(
        "baslik" => "Walking Dead",
        "aciklama" => "Zombi kıyametinin ardından hayatta kalanlar, birlikte verdikleri ölüm kalım mücadelesinde insanlığa karşı duydukları umuda tutunur.",
        "resim" => "2.jpeg",
        "yorumSayisi" => "55",
        "begeniSayisi" => "0",
        "vizyon" => false,
        "yapimTarihi" => "03.12.2021",
        "url" => "Walking-Dead"
    )
);

// Film ekleme fonksiyonu
function filmEkle(&$filmler, string $baslik, string $aciklama, string $resim, int $yorumSayisi = 0, int $begeniSayisi = 0, bool $vizyon = false,string $yapimTarihi="01.01.2024" ,$url = "demo")
{
    // Yeni film dizisine ekleniyor
    $new_item_key = count($filmler) + 1;
    $filmler[$new_item_key] = array(
        "baslik" => $baslik,
        "aciklama" => $aciklama,
        "resim" => $resim,
        "yorumSayisi" => $yorumSayisi,
        "begeniSayisi" => $begeniSayisi,
        "vizyon" => $vizyon,
        "yapimTarihi" => $yapimTarihi,
        "url" => $url
    );
}

// Yeni filmler ekleniyor
filmEkle($filmler, "Yeni Film 1", "ilk açıklama", "1.jpeg");
filmEkle($filmler, "Yeni Film 2", "ikinci açıklama", "2.jpeg");

// Açıklama metni için karakter limiti
const LIMIT = 85;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Film Listesi</title>
</head>

<body>
    <div class="container my-3">
        <div class="row">
            <!-- Kategori listesi -->
            <div class="col-3">
                <ul class="list-group">
                    <?php foreach ($kategori as $kategoriler) : ?>
                    <li class="list-group-item"><?= $kategoriler ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="col-9">
                <!-- Filmler listesi -->
                <?php foreach ($filmler as $id => $film) : ?>
                <div class="card mb-3">
                    <div class="row">
                        <div class="col-3">
                            <!-- Film resmi -->
                            <img class="img-fluid" src="img/<?= $film['resim'] ?>" alt="<?= $film['baslik'] ?>">
                        </div>
                        <div class="col-9">
                            <div class="card-body">
                                <h5 class="card-title"><a href="<?= $film['url'] ?>"><?= $film['baslik'] ?></a></h5>
                                <p class="card-text">
                                    <!-- Açıklama metni karakter limiti kontrolü -->
                                    <?php
                                        if (strlen($film["aciklama"]) > LIMIT) {
                                            echo substr($film["aciklama"], 0, LIMIT) . "...";
                                        } else {
                                            echo $film["aciklama"];
                                        }
                                        ?>
                                </p>
                                <div>
                                    <span class="badge bg-success"><?= $film['yapimTarihi'] ?> </span>
                                    <!-- Yorum sayısı kontrolü -->
                                    <?php if ($film['yorumSayisi'] > 0) : ?>
                                    <span class="badge bg-success"><?= $film['yorumSayisi'] ?> yorum</span>
                                    <?php endif; ?>
                                    <span class="badge bg-success"><?= $film['begeniSayisi'] ?> beğeni</span>
                                    <span
                                        class="badge bg-success"><?= $film['vizyon'] ? 'vizyonda' : 'vizyonda değil' ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</body>

</html>