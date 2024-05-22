<?php
    $data = getData();
    $activeMovies = array_filter($data["movies"], function($movie) {
        return $movie["is-active"];
    });
    $ozet = count($data["categories"]).' kategoride '.count($activeMovies).' film listelenmiştir';
    const baslik = "Popüler Filmler";
?>

<h1 class="mb-4"><?php echo baslik; ?></h1>
<p class="text-muted">
    <?php if(isset($data["categories"])): ?>
    <?php echo $ozet; ?>
    <?php endif; ?>
</p>

<?php if (empty($activeMovies)): ?>
<div class="alert alert-warning" role="alert">
    Henüz film eklenmemiştir.
</div>
<?php endif; ?>