<?php
 namespace MailPoetVendor\Doctrine\ORM\Query\AST; if (!defined('ABSPATH')) exit; class CoalesceExpression extends \MailPoetVendor\Doctrine\ORM\Query\AST\Node { public $scalarExpressions = []; public function __construct(array $scalarExpressions) { $this->scalarExpressions = $scalarExpressions; } public function dispatch($sqlWalker) { return $sqlWalker->walkCoalesceExpression($this); } } 