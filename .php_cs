<?php

$finder = PhpCsFixer\Finder::create()
    ->in([
        __DIR__ . '/app',
        __DIR__ . '/src',
    ])

    ->exclude([

    ])
;

// do not enable self_accessor as it breaks pimcore models relying on get_called_class()
return PhpCsFixer\Config::create()
    ->setRules([
        '@PSR1'                  => true,
        '@PSR2'                  => true,
        'array_syntax'           => ['syntax' => 'short'],

        // keep aligned = and => operators as they are: do not force aligning, but do not remove it
        'binary_operator_spaces' => ['align_double_arrow' => true, 'align_equals' => null],


        'blank_line_before_return'            => true,
        'encoding'                            => true,
        'function_typehint_space'             => true,
        'hash_to_slash_comment'               => true,
        'lowercase_cast'                      => true,
        'magic_constant_casing'               => true,
        'method_argument_space'               => ['ensure_fully_multiline' => false],
        'method_separation'                   => true,
        'native_function_casing'              => true,
        'no_blank_lines_after_class_opening'  => true,
        'no_blank_lines_after_phpdoc'         => true,
        'no_empty_comment'                    => true,
        'no_empty_statement'                  => true,
        'no_extra_consecutive_blank_lines'    => true,
        'no_leading_import_slash'             => true,
        'no_leading_namespace_whitespace'     => true,
        'no_short_bool_cast'                  => true,
        'no_spaces_around_offset'             => true,
        'no_unneeded_control_parentheses'     => true,
        'no_unused_imports'                   => true,
        'no_whitespace_before_comma_in_array' => true,
        'no_whitespace_in_blank_line'         => true,
        'object_operator_without_whitespace'  => true,
        'ordered_imports'                     => true,
        'phpdoc_indent'                       => true,
        'phpdoc_no_useless_inheritdoc'        => true,
        'phpdoc_scalar'                       => true,
        'phpdoc_separation'                   => true,
        'phpdoc_single_line_var_spacing'      => true,
        'return_type_declaration'             => true,
        'short_scalar_cast'                   => true,
        'single_blank_line_before_namespace'  => true,
        'single_quote'                        => true,
        'space_after_semicolon'               => true,
        'standardize_not_equals'              => true,
        'ternary_operator_spaces'             => true,
        'whitespace_after_comma_in_array'     => true,


        'ereg_to_preg' => true,
        'modernize_types_casting' => true,
        'php_unit_construct' => true,
        'protected_to_private' => false,
        'align_multiline_comment' => true,
        'array_indentation' => true,
        'blank_line_after_opening_tag' => true,
        'blank_line_before_statement' => [
            'statements' => ['return', 'try', 'yield']
        ],
        'cast_spaces' => true,
        'class_attributes_separation' => [
            'elements' => ['method', 'property']
        ],
        'combine_consecutive_issets' => true,
        'combine_consecutive_unsets' => true,
        'compact_nullable_typehint' => true,
        'concat_space' => [
            'spacing' => 'one'
        ],
        'declare_equal_normalize' => true,
        'fully_qualified_strict_types' => true,
        'function_to_constant' => true,
        'linebreak_after_opening_tag' => true,
        'logical_operators' => true,
        'lowercase_static_reference' => true,
        'method_chaining_indentation' => true,
        'multiline_comment_opening_closing' => true,
        'multiline_whitespace_before_semicolons' => true,
        'new_with_braces' => true,
        'no_alias_functions' => true,
        'no_multiline_whitespace_around_double_arrow' => true,
        'no_singleline_whitespace_before_semicolons' => true,
        'no_trailing_comma_in_singleline_array' => true,
        'no_unneeded_curly_braces' => true,
        'normalize_index_brace' => true,
        'php_unit_dedicate_assert' => true,
        'php_unit_expectation' => true,
        'php_unit_namespaced' => true,
        'php_unit_no_expectation_annotation' => true,
        'phpdoc_align' => true,

        'phpdoc_inline_tag' => true,
        'phpdoc_no_empty_return' => true,
        'phpdoc_order' => true,
        'phpdoc_trim' => true,
        'phpdoc_trim_consecutive_blank_line_separation' => true,
        'phpdoc_types' => true,
        'phpdoc_types_order' => [
            'null_adjustment' => 'always_last',
        ],
        'return_assignment' => true,
        'self_accessor' => true,
        'semicolon_after_instruction' => true,
        'ternary_to_null_coalescing' => true,
        'trailing_comma_in_multiline_array' => true,
        'trim_array_spaces' => true,
        'unary_operator_spaces' => true,
        'magic_method_casing' => true,
        'fopen_flag_order' => true,
        'fopen_flags' => true,
        'combine_nested_dirname' => true,
        'php_unit_method_casing' => [
            'case' => 'snake_case'
        ],
        'implode_call' => true,

        'void_return' => true,
    ])
    ->setRiskyAllowed(true)
    ->setFinder($finder);
