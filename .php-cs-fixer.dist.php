<?php

$finder = PhpCsFixer\Finder::create()->in(__DIR__);

$config = new PhpCsFixer\Config();
return $config->setRules([
    '@Symfony' => true,
    'global_namespace_import' => [
        'import_classes' => true,
        'import_constants' => true,
        'import_functions' => true,
    ],
    'phpdoc_to_comment' => ['ignored_tags' => ['var']],
    'yoda_style' => false,
])
    ->setFinder($finder);
