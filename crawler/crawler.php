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

$crawler = new Crawler ($response);
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
    if(strtolower($temporary)=="description"){
        $meta_description =$node->attr('content');
        return  $meta_description;
}
});

foreach($metas_description as $item){
    if($item!=null)
    $metas_description=$item;
}

$titles = $crawler->filter('title')->each(function (Crawler $node, $i) {;
    $temporary = $node->text();
    $title = $temporary;
    return $title;
});

$canonical = $crawler->filter('link')->each(function (Crawler $node, $i) {
    $temporary = $node->attr('rel');
    if(strtolower($temporary)=="canonical"){
        $temporary =$node->attr('href');
    return $temporary;
    }
});
foreach($canonical as $item){
    if($item!=null)
    $canonical=$item;
}


