<?php

namespace Cqc\drupal_crawler\Page;

use Goutte\Client;
use GuzzleHttp\Client as GuzzleClient;

class BasePage {

	protected $client;

	protected $crawler;

	public function __construct($url, $method = 'GET') {
		$this->crawlUrl($url, $method);
	}

	public function crawlUrl($url, $method = 'GET'){
		$this->client = new Client();
		$this->client->setClient(new GuzzleClient(array(
		    'timeout' => 60,
		    'verify' => false
		)));

		$this->crawler = $this->client->request($method, $url);
	}

	public function getTitle($default = NULL, $crawler = NULL){
		$crawler = $this->getCrawler($crawler);
		$title = trim($crawler->filter('title')->first()->text());
		if(empty($title)){
			return $default;
		}
		return $title;
	}

	public function getAllOfTagText($tag, $crawler = NULL){
		$text = [];
		$crawler = $this->getCrawler($crawler);
		$crawler->filter($tag)->each(function ($node, $i) use (&$text) {
		    $selected_text = trim($node->text());
		    if(!empty($selected_text)){
		    	$text[] = $selected_text;
		    }
		    
		});
		return $text;
	}

	public function getCrawler($crawler = NULL) {
		if($crawler == NULL) {
			return $this->crawler;
		}
		return $crawler;
	}

	public function setCrawler($crawler) {
		$this->crawler = $crawler;
	}
}