<?php

namespace App\Lahmacun\AuthSDK\Controller;

use App\Lahmacun\AuthSDK\Service\TokenService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AuthenticationController extends AbstractController {
	/**
	 * @Route("/api/authentication/login", name="lahmacun_auth_authentication_login", methods={"POST"})
	 */
	public function login(Request $request) {
		$data = json_decode($request->getContent(), true);
		$username = $data['username'];
		$password = $data['password'];

		$tokenService = new TokenService();
		$response = $tokenService->create($username, $password);
		dump($response);exit;
		return $this->json($response);
	}
}