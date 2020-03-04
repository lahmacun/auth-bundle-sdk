<?php

namespace App\Lahmacun\AuthSDK\Security\User;

use Symfony\Component\Security\Core\User\UserInterface;

class LahmacunAuthUser implements UserInterface {
	private $id;
	private $loginId;
	private $username;
	private $roles = [];
	private $firstname;
	private $lastname;
	private $email;
	private $createdAt;
	private $updatedAt;

	public function getRoles() {
		return $this->roles;
	}

	public function getPassword() {
		return '';
	}

	public function getSalt() {
		return null;
	}

	public function getUsername() {
		return $this->username;
	}

	public function eraseCredentials() {
		return;
	}

	/**
	 * @return mixed
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @param mixed $id
	 *
	 * @return LahmacunAuthUser
	 */
	public function setId( $id ) {
		$this->id = $id;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getLoginId() {
		return $this->loginId;
	}

	/**
	 * @param mixed $loginId
	 *
	 * @return LahmacunAuthUser
	 */
	public function setLoginId( $loginId ) {
		$this->loginId = $loginId;

		return $this;
	}

	/**
	 * @param mixed $username
	 *
	 * @return LahmacunAuthUser
	 */
	public function setUsername( $username ) {
		$this->username = $username;

		return $this;
	}

	/**
	 * @param array $roles
	 *
	 * @return LahmacunAuthUser
	 */
	public function setRoles( array $roles ): LahmacunAuthUser {
		$this->roles = $roles;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getFirstname() {
		return $this->firstname;
	}

	/**
	 * @param mixed $firstname
	 *
	 * @return LahmacunAuthUser
	 */
	public function setFirstname( $firstname ) {
		$this->firstname = $firstname;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getLastname() {
		return $this->lastname;
	}

	/**
	 * @param mixed $lastname
	 *
	 * @return LahmacunAuthUser
	 */
	public function setLastname( $lastname ) {
		$this->lastname = $lastname;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * @param mixed $email
	 *
	 * @return LahmacunAuthUser
	 */
	public function setEmail( $email ) {
		$this->email = $email;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getCreatedAt() {
		return $this->createdAt;
	}

	/**
	 * @param mixed $createdAt
	 *
	 * @return LahmacunAuthUser
	 */
	public function setCreatedAt( $createdAt ) {
		$this->createdAt = $createdAt;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getUpdatedAt() {
		return $this->updatedAt;
	}

	/**
	 * @param mixed $updatedAt
	 *
	 * @return LahmacunAuthUser
	 */
	public function setUpdatedAt( $updatedAt ) {
		$this->updatedAt = $updatedAt;

		return $this;
	}


}