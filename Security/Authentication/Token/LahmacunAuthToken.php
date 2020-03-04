<?php

namespace App\Lahmacun\AuthSDK\Security\Authentication\Token;

use Symfony\Component\Security\Core\Authentication\Token\AbstractToken;

class LahmacunAuthToken extends AbstractToken {
	public $created;
	public $digest;
	public $nonce;

	public function __construct( array $roles = [] ) {
		parent::__construct( $roles );
		$this->setAuthenticated(count($roles) > 0);
	}

	public function getCredentials() {
		return '';
	}
}