<?php

namespace App\Lahmacun\AuthSDK\Service;

use Symfony\Component\HttpClient\HttpClient;

class TokenChecker {
	static $baseUrl = "http://127.0.0.1:8001";

	public function check($token) {
		$httpClient = HttpClient::create();
		$response = $httpClient->request('GET', 'http://127.0.0.1:8001/role_checker/check', [
			'headers' => [
				'Authorization' => 'Bearer ' . $token,
				'X-Lahmacun-Token' => 'Wq0t4Y5UaK',
			],
		]);

		if (200 === $response->getStatusCode()) {
			return true;
		}

		return false;
	}
}