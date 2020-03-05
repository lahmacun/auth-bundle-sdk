<?php

namespace App\Lahmacun\AuthSDK\Service;

use Symfony\Component\HttpClient\HttpClient;

class TokenService {
	static $baseUrl = "http://127.0.0.1:8001";

	public function check($token) {
		$httpClient = HttpClient::createForBaseUri('http://127.0.0.1:8001');
		$response = $httpClient->request('GET', '/role_checker/check', [
			'headers' => [
				'Authorization' => 'Bearer ' . $token,
				'X-Lahmacun-Token' => 'Wq0t4Y5UaK',
				'Content-Type' => 'application/json',
			],
		]);

		if (200 === $response->getStatusCode()) {
			return true;
		}

		return false;
	}

	public function create($username, $password) {
		$httpClient = HttpClient::createForBaseUri('http://127.0.0.1:8001');
		$response = $httpClient->request('GET', '/authentication/login', [
			'headers' => [
				'Content-Type' => 'application/json',
			],
			'json' => ['username' => $username, 'password' => $password],
		]);

		return json_decode($response->getContent(false));
	}
}