<?php
require_once('vendor/autoload.php');
require_once('app-autoload.php');

use Cqc\drupal_crawler\Page\BasePage;
use Cqc\drupal_crawler\Page\TestPage;

$client = new BasePage('https://www.symfony.com/blog/');

echo $client->getTitle();


$client = new TestPage('https://www.symfony.com/blog/');

echo print_r($client->getAllOfTagText('a'));

