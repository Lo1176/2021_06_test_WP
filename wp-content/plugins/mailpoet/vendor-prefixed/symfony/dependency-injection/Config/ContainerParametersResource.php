<?php
 namespace MailPoetVendor\Symfony\Component\DependencyInjection\Config; if (!defined('ABSPATH')) exit; use MailPoetVendor\Symfony\Component\Config\Resource\ResourceInterface; class ContainerParametersResource implements \MailPoetVendor\Symfony\Component\Config\Resource\ResourceInterface { private $parameters; public function __construct(array $parameters) { $this->parameters = $parameters; } public function __toString() { return 'container_parameters_' . \md5(\serialize($this->parameters)); } public function getParameters() { return $this->parameters; } } 