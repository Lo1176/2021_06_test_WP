<?php
 namespace MailPoetVendor\Doctrine\ORM\Cache; if (!defined('ABSPATH')) exit; use MailPoetVendor\Doctrine\ORM\Cache; use MailPoetVendor\Doctrine\Common\Util\ClassUtils; use MailPoetVendor\Doctrine\ORM\Mapping\ClassMetadata; use MailPoetVendor\Doctrine\ORM\EntityManagerInterface; use MailPoetVendor\Doctrine\ORM\Cache\Persister\CachedPersister; use MailPoetVendor\Doctrine\ORM\ORMInvalidArgumentException; class DefaultCache implements \MailPoetVendor\Doctrine\ORM\Cache { private $em; private $uow; private $cacheFactory; private $queryCaches = []; private $defaultQueryCache; public function __construct(\MailPoetVendor\Doctrine\ORM\EntityManagerInterface $em) { $this->em = $em; $this->uow = $em->getUnitOfWork(); $this->cacheFactory = $em->getConfiguration()->getSecondLevelCacheConfiguration()->getCacheFactory(); } public function getEntityCacheRegion($className) { $metadata = $this->em->getClassMetadata($className); $persister = $this->uow->getEntityPersister($metadata->rootEntityName); if (!$persister instanceof \MailPoetVendor\Doctrine\ORM\Cache\Persister\CachedPersister) { return null; } return $persister->getCacheRegion(); } public function getCollectionCacheRegion($className, $association) { $metadata = $this->em->getClassMetadata($className); $persister = $this->uow->getCollectionPersister($metadata->getAssociationMapping($association)); if (!$persister instanceof \MailPoetVendor\Doctrine\ORM\Cache\Persister\CachedPersister) { return null; } return $persister->getCacheRegion(); } public function containsEntity($className, $identifier) { $metadata = $this->em->getClassMetadata($className); $persister = $this->uow->getEntityPersister($metadata->rootEntityName); if (!$persister instanceof \MailPoetVendor\Doctrine\ORM\Cache\Persister\CachedPersister) { return \false; } return $persister->getCacheRegion()->contains($this->buildEntityCacheKey($metadata, $identifier)); } public function evictEntity($className, $identifier) { $metadata = $this->em->getClassMetadata($className); $persister = $this->uow->getEntityPersister($metadata->rootEntityName); if (!$persister instanceof \MailPoetVendor\Doctrine\ORM\Cache\Persister\CachedPersister) { return; } $persister->getCacheRegion()->evict($this->buildEntityCacheKey($metadata, $identifier)); } public function evictEntityRegion($className) { $metadata = $this->em->getClassMetadata($className); $persister = $this->uow->getEntityPersister($metadata->rootEntityName); if (!$persister instanceof \MailPoetVendor\Doctrine\ORM\Cache\Persister\CachedPersister) { return; } $persister->getCacheRegion()->evictAll(); } public function evictEntityRegions() { $metadatas = $this->em->getMetadataFactory()->getAllMetadata(); foreach ($metadatas as $metadata) { $persister = $this->uow->getEntityPersister($metadata->rootEntityName); if (!$persister instanceof \MailPoetVendor\Doctrine\ORM\Cache\Persister\CachedPersister) { continue; } $persister->getCacheRegion()->evictAll(); } } public function containsCollection($className, $association, $ownerIdentifier) { $metadata = $this->em->getClassMetadata($className); $persister = $this->uow->getCollectionPersister($metadata->getAssociationMapping($association)); if (!$persister instanceof \MailPoetVendor\Doctrine\ORM\Cache\Persister\CachedPersister) { return \false; } return $persister->getCacheRegion()->contains($this->buildCollectionCacheKey($metadata, $association, $ownerIdentifier)); } public function evictCollection($className, $association, $ownerIdentifier) { $metadata = $this->em->getClassMetadata($className); $persister = $this->uow->getCollectionPersister($metadata->getAssociationMapping($association)); if (!$persister instanceof \MailPoetVendor\Doctrine\ORM\Cache\Persister\CachedPersister) { return; } $persister->getCacheRegion()->evict($this->buildCollectionCacheKey($metadata, $association, $ownerIdentifier)); } public function evictCollectionRegion($className, $association) { $metadata = $this->em->getClassMetadata($className); $persister = $this->uow->getCollectionPersister($metadata->getAssociationMapping($association)); if (!$persister instanceof \MailPoetVendor\Doctrine\ORM\Cache\Persister\CachedPersister) { return; } $persister->getCacheRegion()->evictAll(); } public function evictCollectionRegions() { $metadatas = $this->em->getMetadataFactory()->getAllMetadata(); foreach ($metadatas as $metadata) { foreach ($metadata->associationMappings as $association) { if (!$association['type'] & \MailPoetVendor\Doctrine\ORM\Mapping\ClassMetadata::TO_MANY) { continue; } $persister = $this->uow->getCollectionPersister($association); if (!$persister instanceof \MailPoetVendor\Doctrine\ORM\Cache\Persister\CachedPersister) { continue; } $persister->getCacheRegion()->evictAll(); } } } public function containsQuery($regionName) { return isset($this->queryCaches[$regionName]); } public function evictQueryRegion($regionName = null) { if ($regionName === null && $this->defaultQueryCache !== null) { $this->defaultQueryCache->clear(); return; } if (isset($this->queryCaches[$regionName])) { $this->queryCaches[$regionName]->clear(); } } public function evictQueryRegions() { $this->getQueryCache()->clear(); foreach ($this->queryCaches as $queryCache) { $queryCache->clear(); } } public function getQueryCache($regionName = null) { if ($regionName === null) { return $this->defaultQueryCache ?: ($this->defaultQueryCache = $this->cacheFactory->buildQueryCache($this->em)); } if (!isset($this->queryCaches[$regionName])) { $this->queryCaches[$regionName] = $this->cacheFactory->buildQueryCache($this->em, $regionName); } return $this->queryCaches[$regionName]; } private function buildEntityCacheKey(\MailPoetVendor\Doctrine\ORM\Mapping\ClassMetadata $metadata, $identifier) { if (!\is_array($identifier)) { $identifier = $this->toIdentifierArray($metadata, $identifier); } return new \MailPoetVendor\Doctrine\ORM\Cache\EntityCacheKey($metadata->rootEntityName, $identifier); } private function buildCollectionCacheKey(\MailPoetVendor\Doctrine\ORM\Mapping\ClassMetadata $metadata, $association, $ownerIdentifier) { if (!\is_array($ownerIdentifier)) { $ownerIdentifier = $this->toIdentifierArray($metadata, $ownerIdentifier); } return new \MailPoetVendor\Doctrine\ORM\Cache\CollectionCacheKey($metadata->rootEntityName, $association, $ownerIdentifier); } private function toIdentifierArray(\MailPoetVendor\Doctrine\ORM\Mapping\ClassMetadata $metadata, $identifier) { if (\is_object($identifier) && $this->em->getMetadataFactory()->hasMetadataFor(\MailPoetVendor\Doctrine\Common\Util\ClassUtils::getClass($identifier))) { $identifier = $this->uow->getSingleIdentifierValue($identifier); if ($identifier === null) { throw \MailPoetVendor\Doctrine\ORM\ORMInvalidArgumentException::invalidIdentifierBindingEntity(); } } return [$metadata->identifier[0] => $identifier]; } } 