<?php
require_once('vendor/autoload.php');
require_once('app-autoload.php');

use matthew_gill\drupal_crawler\Page\BasePage;
use matthew_gill\drupal_crawler\Page\TestPage;

$client = new BasePage('https://github.com/matthew-gill/drupal-scraper');
//$client = new TestPage('https://www.symfony.com/blog/');

echo $client->getTitle();
print_r($client->getAllOfTagText('h4'));
