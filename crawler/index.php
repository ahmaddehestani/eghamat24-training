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




