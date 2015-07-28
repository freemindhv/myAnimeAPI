<?php
class ApiHandler {
	private $base_url = "http://myanimelist.net/api/anime/";
	
	function ApiHandler($user, $pw) {
		$this->username = $user;
		$this->password = $pw;
	}
	
	function searchAnime($anime) {
		$search_string = str_replace(" ", "+", $anime);
		$query_url = $this->base_url . "search.xml?q=" . $search_string;
		$response = file_get_contents($query_url, false, $this->createStream());
		var_dump($response);
		
	}
	private function createStream() {
		$opts = array(
				'http'=>array(
						'method'=>"GET",
						'header' => "Authorization: Basic " . base64_encode("$this->username:$this->password")
				)
		);
		return stream_context_create($opts);
	}
	
}















?>