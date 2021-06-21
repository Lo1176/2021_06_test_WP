<?php
 namespace MailPoetVendor\Doctrine\Common\Reflection; if (!defined('ABSPATH')) exit; use ReflectionException; use ReflectionMethod; class StaticReflectionMethod extends \ReflectionMethod { protected $staticReflectionParser; protected $methodName; public function __construct(\MailPoetVendor\Doctrine\Common\Reflection\StaticReflectionParser $staticReflectionParser, $methodName) { $this->staticReflectionParser = $staticReflectionParser; $this->methodName = $methodName; } public function getName() { return $this->methodName; } protected function getStaticReflectionParser() { return $this->staticReflectionParser->getStaticReflectionParserForDeclaringClass('method', $this->methodName); } public function getDeclaringClass() { return $this->getStaticReflectionParser()->getReflectionClass(); } public function getNamespaceName() { return $this->getStaticReflectionParser()->getNamespaceName(); } public function getDocComment() { return $this->getStaticReflectionParser()->getDocComment('method', $this->methodName); } public function getUseStatements() { return $this->getStaticReflectionParser()->getUseStatements(); } public static function export($class, $name, $return = \false) { throw new \ReflectionException('Method not implemented'); } public function getClosure($object = null) { throw new \ReflectionException('Method not implemented'); } public function getModifiers() { throw new \ReflectionException('Method not implemented'); } public function getPrototype() { throw new \ReflectionException('Method not implemented'); } public function invoke($object, $parameter = null) { throw new \ReflectionException('Method not implemented'); } public function invokeArgs($object, array $args) { throw new \ReflectionException('Method not implemented'); } public function isAbstract() { throw new \ReflectionException('Method not implemented'); } public function isConstructor() { throw new \ReflectionException('Method not implemented'); } public function isDestructor() { throw new \ReflectionException('Method not implemented'); } public function isFinal() { throw new \ReflectionException('Method not implemented'); } public function isPrivate() { throw new \ReflectionException('Method not implemented'); } public function isProtected() { throw new \ReflectionException('Method not implemented'); } public function isPublic() { throw new \ReflectionException('Method not implemented'); } public function isStatic() { throw new \ReflectionException('Method not implemented'); } public function setAccessible($accessible) { throw new \ReflectionException('Method not implemented'); } public function __toString() { throw new \ReflectionException('Method not implemented'); } public function getClosureThis() { throw new \ReflectionException('Method not implemented'); } public function getEndLine() { throw new \ReflectionException('Method not implemented'); } public function getExtension() { throw new \ReflectionException('Method not implemented'); } public function getExtensionName() { throw new \ReflectionException('Method not implemented'); } public function getFileName() { throw new \ReflectionException('Method not implemented'); } public function getNumberOfParameters() { throw new \ReflectionException('Method not implemented'); } public function getNumberOfRequiredParameters() { throw new \ReflectionException('Method not implemented'); } public function getParameters() { throw new \ReflectionException('Method not implemented'); } public function getShortName() { throw new \ReflectionException('Method not implemented'); } public function getStartLine() { throw new \ReflectionException('Method not implemented'); } public function getStaticVariables() { throw new \ReflectionException('Method not implemented'); } public function inNamespace() { throw new \ReflectionException('Method not implemented'); } public function isClosure() { throw new \ReflectionException('Method not implemented'); } public function isDeprecated() { throw new \ReflectionException('Method not implemented'); } public function isInternal() { throw new \ReflectionException('Method not implemented'); } public function isUserDefined() { throw new \ReflectionException('Method not implemented'); } public function returnsReference() { throw new \ReflectionException('Method not implemented'); } } 