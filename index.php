<?php

require_once 'db.php';
require_once 'vendor/autoload.php';

use DiDom\Document;

$document = new Document('https://shikimori.one/', true);
$ongoings = $document ->find('.c-column a');
$ongoingLinks = array();

foreach($ongoings as $key => $value) {
    $ongoingLinks[$key] = $value->attr('href');
}
$data = array();
foreach($ongoingLinks as $key => $link) {
    $page= new Document($link, true);

    $data[$key]['article'] = $page->first('.head h1')->text();
    $data[$key]['image'] = $page->first('.c-poster img')->attr('src');
    $data[$key]['rate'] = $page->first('.b-rate .score-value')->text();

}

foreach($data as $key => $series)
{
    foreach($series as $info)
    {
    echo $info . "<br>";
    }
    echo "<hr>";
}
