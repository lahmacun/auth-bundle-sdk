<?php

namespace App\Lahmacun\AuthSDK\Service;

class JWTParser {
	public static function decode($token) {
		$base64 = explode('.', $token)[1];
		$base64 = str_replace(['-', '_'], ['+', '/'], $base64);
		$jsonPayload = base64_decode($base64);
        return json_decode($jsonPayload, true);
	}
}