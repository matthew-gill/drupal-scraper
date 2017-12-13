<?php
require_once('vendor/autoload.php');

use Goutte\Client;
use GuzzleHttp\Client as GuzzleClient;

$client = new Client();


$client->setClient(new GuzzleClient(array(
    'timeout' => 60,
    'verify' => false
)));



// Go to the symfony.com website
$crawler = $client->request('GET', 'https://www.symfony.com/blog/');

// Click on the "Security Advisories" link
$link = $crawler->selectLink('Security Advisories')->link();
$crawler = $client->click($link);

// Get the latest post in this category and display the titles
$crawler->filter('h2 > a')->each(function ($node) {
    print trim($node->text())."\n";
});