<?php


require('./vendor/autoload.php');



use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\CssSelector\CssSelectorConverter;
use GuzzleHttp\Client;



$url = "http://eghamat24.com/";
$links = array();
$images = array();
$videos = array();
$metas = array();


$response = file_get_contents($url);

$crawler = new Crawler($response);
$links = $crawler->filter('a')->each(function (Crawler $node, $i) {
    $temporary = $node->attr('href');
    $link = $temporary;
    return $link;
});

$unique_links = array_unique($links);

$images = $crawler->filter('img')->each(function (Crawler $node, $i) {
    $temporary = $node;
    $image = $temporary;
    return $image;
});

$videos = $crawler->filter('video')->each(function (Crawler $node, $i) {
    $temporary = $node;
    $video = $temporary;
    return $video;
});

$metas = $crawler->filter('meta')->each(function (Crawler $node, $i) {
    $temporary = $node->attr('name');
    $meta = $temporary;
    return $meta;
});

$metas_description = $crawler->filter('meta')->each(function (Crawler $node, $i) {
    $temporary = $node->attr('name');
    if (strtolower($temporary) == "description") {
        $meta_description = $node->attr('content');
        return  $meta_description;
    }
});

foreach ($metas_description as $item) {
    if ($item != null)
        $metas_description = $item;
}

$titles = $crawler->filter('title')->each(function (Crawler $node, $i) {;
    $temporary = $node->text();
    $title = $temporary;
    return $title;
});

$canonical = $crawler->filter('link')->each(function (Crawler $node, $i) {
    $temporary = $node->attr('rel');
    if (strtolower($temporary) == "canonical") {
        $temporary = $node->attr('href');
        return $temporary;
    }
});
foreach ($canonical as $item) {
    if ($item != null)
        $canonical = $item;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./main.css" />
    <title>your web site analyze</title>
</head>

<body>
    <h1> for <?= $url ?> link we find this data</h1>
    <div class="data">

        <h2>count of links:<?= count($links) ?> </h2>
        <h2>count of unique links:<?= count($unique_links) ?> </h2>
        <h2>count of images:<?= count($images) ?> </h2>
        <h2>count of videos:<?= count($videos) ?> </h2>
        <h2>count of metas:<?= count($metas) ?> </h2>
        <h2>count of titles:<?= count($titles) ?> </h2>

    </div>
    <label class="label"> canonical:</label>
    <h3><?= $canonical ?> </h3>
    <label class="label">meta description :</label>
    <h3><?= $metas_description ?> </h3>
    <label class="label">titles is:</label>
    <h3><?= $titles[0] ?> </h3>
    <label class="label">all page links:</label>
    <?php foreach($unique_links as $link):   ?>
          <h4><?=$link?></h4>
          <?php endforeach ?>
</body>

</html>