<?php

namespace App\Lahmacun\AuthSDK\Security\Firewall;

use App\Lahmacun\AuthSDK\Security\Authentication\Token\LahmacunAuthToken;
use App\Lahmacun\AuthSDK\Security\User\LahmacunAuthUser;
use App\Lahmacun\AuthSDK\Service\JWTParser;
use App\Lahmacun\AuthSDK\Service\TokenService;
use Firebase\JWT\JWT;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\Security\Core\Authentication\AuthenticationManagerInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;

class LahmacunAuthListener{
	protected $tokenStorage;
	protected $authenticationManager;

	public function __construct(TokenStorageInterface $tokenStorage, AuthenticationManagerInterface $authenticationManager) {
		$this->tokenStorage = $tokenStorage;
		$this->authenticationManager = $authenticationManager;
	}

	public function __invoke(RequestEvent $event) {
		$request = $event->getRequest();

		if (!$request->headers->has('Authorization')) {
			return;
		}

		$jwt = substr($request->headers->get('Authorization'), 7);
		$jsonPayload = JWTParser::decode($jwt);

		$tokenService = new TokenService();
		$isTokenValid = $tokenService->check($jwt);

		if (!$isTokenValid) {
			return;
		}

		$user = new LahmacunAuthUser();
		$user->setUsername($jsonPayload['username']);
		$user->setRoles($jsonPayload['roles']);

		$token = new LahmacunAuthToken();
		$token->setUser($user);

		try {
			$authToken = $this->authenticationManager->authenticate($token);
			$this->tokenStorage->setToken($authToken);

			return;
		} catch (AuthenticationException $exception) {

		}

		$response = new Response();
		$response->setStatusCode(Response::HTTP_FORBIDDEN);
		$event->setResponse($response);
	}
}