#!/usr/bin/env php

<?php

require 'vendor/autoload.php';

use Alura\BuscadorDeCursos\Buscador;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

$client = new Client([
    'base_uri' => 'https://www.alura.com.br/',
    'verify' => false
]);
$crawler = new Crawler();
$searcher = new Buscador($client, $crawler);

$courses = $searcher->get('/cursos-online-programacao/php', 'span.card-curso__nome');

foreach($courses as $course){
    showMessage($course);
}