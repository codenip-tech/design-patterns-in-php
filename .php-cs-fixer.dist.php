<?php

$finder = PhpCsFixer\Finder::create()
    ->ignoreDotFiles(false)
    ->ignoreVCSIgnored(true)
    ->in([
        __DIR__ . '/src',
        __DIR__ . '/tests',
    ]);

return (new PhpCsFixer\Config())
    ->setRiskyAllowed(true)
    ->setRules([
        //Presets
        '@PhpCsFixer' => true,
        '@PHP83Migration' => true,

        //Customized rules
        'blank_line_before_statement' => ['statements' => ['continue', 'do', 'for', 'foreach', 'if', 'return', 'switch', 'throw', 'try', 'while']],
        'concat_space' => ['spacing' => 'one'],
        'global_namespace_import' => ['import_classes' => true, 'import_constants' => true, 'import_functions' => true],
        'no_superfluous_phpdoc_tags' => ['remove_inheritdoc' => true],
        'ordered_imports' => ['imports_order' => ['class', 'function', 'const']],
        'phpdoc_line_span' => ['const' => 'single', 'property' => 'single'],
        'phpdoc_types_order' => ['sort_algorithm' => 'none', 'null_adjustment' => 'always_last'],
        'self_static_accessor' => true,
        'trailing_comma_in_multiline' => ['elements' => ['arguments', 'arrays', 'parameters']],

        //Risky rules
        'array_push' => true,
        'declare_strict_types' => true,
        'ereg_to_preg' => true,
        'get_class_to_class_keyword' => true,
        'implode_call' => true,
        'mb_str_functions' => true,
        'modernize_strpos' => true,
        'modernize_types_casting' => true,
        'native_constant_invocation' => true,
        'native_function_invocation' => ['include' => ['@all'], 'scope' => 'namespaced'],
        'no_alias_functions' => true,
        'no_php4_constructor' => true,
        'no_unneeded_final_method' => true,
        'no_unreachable_default_argument_value' => true,
        'no_useless_sprintf' => true,
        'random_api_migration' => true,
        'strict_comparison' => true,
        'strict_param' => true,
        'ternary_to_elvis_operator' => true,
        'void_return' => true,

        //Disabled rules from presets
        'binary_operator_spaces' => false,
        'increment_style' => false,
        'multiline_whitespace_before_semicolons' => false,
        'php_unit_internal_class' => false,
        'php_unit_test_class_requires_covers' => false,
        'return_assignment' => false,
        'yoda_style' => false,

    ])
    ->setCacheFile(__DIR__ . '/.php-cs-fixer.cache')
    ->setFinder($finder);
