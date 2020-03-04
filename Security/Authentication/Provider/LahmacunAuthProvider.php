<?php

namespace App\Lahmacun\AuthSDK\Security\Authentication\Provider;

use App\Lahmacun\AuthSDK\Security\Authentication\Token\LahmacunAuthToken;
use Symfony\Component\Security\Core\Authentication\Provider\AuthenticationProviderInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;

class LahmacunAuthProvider implements AuthenticationProviderInterface {
	public function authenticate( TokenInterface $token ) {
		$user = $token->getUser();

		if ($user) {
			// TODO: Connect to auth server and check token

			$authenticatedToken = new LahmacunAuthToken($user->getRoles());
			$authenticatedToken->setUser($user);

			return $authenticatedToken;
		}

		throw new AuthenticationException("Lahmacun Authentication Failed.");
	}

	public function supports( TokenInterface $token ) {
		return $token instanceof LahmacunAuthToken;
	}
}