<?php

namespace App\Spotify;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
class Spotify
{
	protected $client;
    protected $authorization;

    public function __construct(string $baseUri, string $authorization)
    {
        $this->client = new Client(array('base_uri' => $baseUri));
        $this->authorization = $authorization;
    }

    public function apiconnect($method, $uri, $queryParams = array(), $body = null, $isForm = false)
    {
		
		$params = array(
            'headers' => array(
                'Authorization' => $this->authorization
            ),
        );

        if (!empty($queryParams)) {
            $params['query'] = $queryParams;
        }

        if (!empty($body)) {
            $params[$isForm ? 'form_params' : 'body'] = $body;
        }

        try{
			$response = $this->client->request($method, $uri, $params);
			return json_decode($response->getBody(), true);
        }catch (ClientException $ce) {
            return false;
        }
    }
	
    public function find(string $query)
    {
		
        if (empty($query)) {
            return false;
        }

        $params = array(
            'q' => $query,
            'type' => 'track,artist,album'
        );

        return $this->apiconnect('GET', 'v1/search', $params);
    }

    public function getdetails($type, $id)
    {
        return $this->apiconnect('GET', "/v1/{$type}/{$id}");
    }
	
}
