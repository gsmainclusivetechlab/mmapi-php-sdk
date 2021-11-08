<?php

$finder = PhpCsFixer\Finder::create()->in(__DIR__ . '/src');

$config = new PhpCsFixer\Config();
return $config
    ->setRules([
        '@PSR12' => true,
        'visibility_required' => ['elements' => ['property', 'method']]
    ])
    ->setFinder($finder);
