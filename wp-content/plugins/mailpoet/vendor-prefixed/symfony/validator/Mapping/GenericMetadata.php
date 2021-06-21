<?php
 namespace MailPoetVendor\Symfony\Component\Validator\Mapping; if (!defined('ABSPATH')) exit; use MailPoetVendor\Symfony\Component\Validator\Constraint; use MailPoetVendor\Symfony\Component\Validator\Constraints\DisableAutoMapping; use MailPoetVendor\Symfony\Component\Validator\Constraints\EnableAutoMapping; use MailPoetVendor\Symfony\Component\Validator\Constraints\Length; use MailPoetVendor\Symfony\Component\Validator\Constraints\NotBlank; use MailPoetVendor\Symfony\Component\Validator\Constraints\Traverse; use MailPoetVendor\Symfony\Component\Validator\Constraints\Valid; use MailPoetVendor\Symfony\Component\Validator\Exception\ConstraintDefinitionException; class GenericMetadata implements \MailPoetVendor\Symfony\Component\Validator\Mapping\MetadataInterface { public $constraints = []; public $constraintsByGroup = []; public $cascadingStrategy = \MailPoetVendor\Symfony\Component\Validator\Mapping\CascadingStrategy::NONE; public $traversalStrategy = \MailPoetVendor\Symfony\Component\Validator\Mapping\TraversalStrategy::NONE; public $autoMappingStrategy = \MailPoetVendor\Symfony\Component\Validator\Mapping\AutoMappingStrategy::NONE; public function __sleep() { return ['constraints', 'constraintsByGroup', 'cascadingStrategy', 'traversalStrategy', 'autoMappingStrategy']; } public function __clone() { $constraints = $this->constraints; $this->constraints = []; $this->constraintsByGroup = []; foreach ($constraints as $constraint) { $this->addConstraint(clone $constraint); } } public function addConstraint(\MailPoetVendor\Symfony\Component\Validator\Constraint $constraint) { if ($constraint instanceof \MailPoetVendor\Symfony\Component\Validator\Constraints\Traverse) { throw new \MailPoetVendor\Symfony\Component\Validator\Exception\ConstraintDefinitionException(\sprintf('The constraint "%s" can only be put on classes. Please use "Symfony\\Component\\Validator\\Constraints\\Valid" instead.', \get_class($constraint))); } if ($constraint instanceof \MailPoetVendor\Symfony\Component\Validator\Constraints\Valid && null === $constraint->groups) { $this->cascadingStrategy = \MailPoetVendor\Symfony\Component\Validator\Mapping\CascadingStrategy::CASCADE; if ($constraint->traverse) { $this->traversalStrategy = \MailPoetVendor\Symfony\Component\Validator\Mapping\TraversalStrategy::IMPLICIT; } else { $this->traversalStrategy = \MailPoetVendor\Symfony\Component\Validator\Mapping\TraversalStrategy::NONE; } return $this; } if ($constraint instanceof \MailPoetVendor\Symfony\Component\Validator\Constraints\DisableAutoMapping || $constraint instanceof \MailPoetVendor\Symfony\Component\Validator\Constraints\EnableAutoMapping) { $this->autoMappingStrategy = $constraint instanceof \MailPoetVendor\Symfony\Component\Validator\Constraints\EnableAutoMapping ? \MailPoetVendor\Symfony\Component\Validator\Mapping\AutoMappingStrategy::ENABLED : \MailPoetVendor\Symfony\Component\Validator\Mapping\AutoMappingStrategy::DISABLED; return $this; } $this->constraints[] = $constraint; foreach ($constraint->groups as $group) { $this->constraintsByGroup[$group][] = $constraint; } return $this; } public function addConstraints(array $constraints) { foreach ($constraints as $constraint) { $this->addConstraint($constraint); } return $this; } public function getConstraints() { $this->configureLengthConstraints($this->constraints); return $this->constraints; } public function hasConstraints() { return \count($this->constraints) > 0; } public function findConstraints($group) { $constraints = $this->constraintsByGroup[$group] ?? []; $this->configureLengthConstraints($constraints); return $constraints; } public function getCascadingStrategy() { return $this->cascadingStrategy; } public function getTraversalStrategy() { return $this->traversalStrategy; } public function getAutoMappingStrategy() : int { return $this->autoMappingStrategy; } private function configureLengthConstraints(array $constraints) : void { $allowEmptyString = \true; foreach ($constraints as $constraint) { if ($constraint instanceof \MailPoetVendor\Symfony\Component\Validator\Constraints\NotBlank) { $allowEmptyString = \false; break; } } if ($allowEmptyString) { return; } foreach ($constraints as $constraint) { if ($constraint instanceof \MailPoetVendor\Symfony\Component\Validator\Constraints\Length && null === $constraint->allowEmptyString) { $constraint->allowEmptyString = \false; } } } } 