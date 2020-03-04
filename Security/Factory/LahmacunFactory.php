<?php

namespace App\Lahmacun\AuthSDK\Security\Factory;

use App\Lahmacun\AuthSDK\Security\Authentication\Provider\LahmacunAuthProvider;
use App\Lahmacun\AuthSDK\Security\Firewall\LahmacunAuthListener;
use Symfony\Bundle\SecurityBundle\DependencyInjection\Security\Factory\SecurityFactoryInterface;
use Symfony\Component\Config\Definition\Builder\NodeDefinition;
use Symfony\Component\DependencyInjection\ChildDefinition;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class LahmacunFactory implements SecurityFactoryInterface {

	public function create( ContainerBuilder $container, string $id, array $config, string $userProvider, ?string $defaultEntryPoint ) {
		$providerId = 'security.authentication.provider.lahmacun_auth.' . $id;
		$container
			->setDefinition($providerId, new ChildDefinition(LahmacunAuthProvider::class))
			->setArgument(0, new Reference($userProvider));

		$listenerId = 'security.authentication.listener.lahmacun_auth.' . $id;
		$container->setDefinition($listenerId, new ChildDefinition(LahmacunAuthListener::class));

		return [$providerId, $listenerId, $defaultEntryPoint];
	}

	public function getPosition() {
		return 'pre_auth';
	}

	public function getKey() {
		return 'lahmacun_auth';
	}

	public function addConfiguration( NodeDefinition $builder ) {
	}
}