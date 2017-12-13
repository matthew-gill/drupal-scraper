<?php

namespace Cqc\drupal_crawler\Page;

use Goutte\Client;
use GuzzleHttp\Client as GuzzleClient;

class BasePage {
	protected $client;

	protected $crawler;

	public function __construct($url) {

		$this->client = new Client();
		$this->client->setClient(new GuzzleClient(array(
		    'timeout' => 60,
		    'verify' => false
		)));

		$this->crawler = $this->client->request('GET', $url);
	}

	public function getTitle($default = NULL){
		$title = trim($this->crawler->filter('title')->first()->text());
		if(empty($title)){
			return $default;
		}
		return $title;
	}

	public function getAllOfTagText($tag){
		$text = [];

		$this->crawler->filter($tag)->each(function ($node, $i) use (&$text) {
		    $selected_text = trim($node->text());
		    if(!empty($selected_text)){
		    	$text[] = $selected_text;
		    }
		    
		});

		return $text;
	}
}