<?php

declare(strict_types=1);

return (new PhpCsFixer\Config())
    ->setRiskyAllowed(true)
    ->setRules([
        '@Symfony'                          => true,
        'array_syntax'                      => ['syntax' => 'short'],
        'ordered_imports'                   => true,
        'no_useless_else'                   => true,
        'no_useless_return'                 => true,
        'php_unit_construct'                => true,
        'php_unit_strict'                   => true,
        'yoda_style'                        => false,
        'phpdoc_summary'                    => false,
        'phpdoc_no_empty_return'            => false,
        'no_superfluous_phpdoc_tags'        => false,
        'not_operator_with_successor_space' => true,
        'declare_strict_types'              => true,
        'binary_operator_spaces'            => [
            'default' => 'align_single_space_minimal',
        ], // 等号对齐、数字箭头符号对齐
        'single_trait_insert_per_statement' => false,
        'blank_line_before_statement'       => ['statements' => ['declare']],
    ])
    ->setFinder(
        PhpCsFixer\Finder::create()
            ->exclude('_*')
            ->exclude('bin')
            ->exclude('public')
            ->exclude('vendor')
            ->exclude('storage')
            ->exclude('resources')
            ->exclude('public')
            ->in(__DIR__)
    )->setUsingCache(false);
