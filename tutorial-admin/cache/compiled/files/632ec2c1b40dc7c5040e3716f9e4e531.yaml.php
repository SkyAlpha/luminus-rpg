<?php
return [
    '@class' => 'Grav\\Common\\File\\CompiledYamlFile',
    'filename' => '/Users/jonatan/Documents/Projects/games/collision/tutorial-admin/user/plugins/prism-highlight/blueprints.yaml',
    'modified' => 1621433531,
    'data' => [
        'name' => 'Prism Highlighter',
        'version' => '2.0.0',
        'description' => 'This plugin provides code highlighting functionality via the [Prism.js](http://prismjs.com/) syntax highlighter with lots of themes and plugins.',
        'icon' => 'code',
        'author' => [
            'name' => 'Trilby Media',
            'email' => 'hello@trilby.media',
            'url' => 'https://trilby.media'
        ],
        'homepage' => 'https://github.com/trilbymedia/grav-prism-highlight',
        'keywords' => 'highlight, plugin, code, prism.js',
        'bugs' => 'https://github.com/trilbymedia/grav-prism-highlight/issues',
        'license' => 'MIT',
        'form' => [
            'validation' => 'strict',
            'fields' => [
                'enabled' => [
                    'type' => 'toggle',
                    'label' => 'PLUGIN_ADMIN.PLUGIN_STATUS',
                    'highlight' => 1,
                    'default' => 0,
                    'options' => [
                        1 => 'PLUGIN_ADMIN.ENABLED',
                        0 => 'PLUGIN_ADMIN.DISABLED'
                    ],
                    'validate' => [
                        'type' => 'bool'
                    ]
                ],
                'theme' => [
                    'type' => 'select',
                    'label' => 'CSS Theme',
                    'default' => 'prism-base16-ocean.dark.css',
                    'size' => 'large',
                    'data-options@' => '\\Grav\\Plugin\\PrismHighlightPlugin::themeOptions'
                ],
                'all-pre-blocks' => [
                    'type' => 'toggle',
                    'label' => 'All Pre Blocks',
                    'highlight' => 1,
                    'default' => 1,
                    'options' => [
                        1 => 'PLUGIN_ADMIN.ENABLED',
                        0 => 'PLUGIN_ADMIN.DISABLED'
                    ],
                    'validate' => [
                        'type' => 'bool'
                    ]
                ],
                'section_plugins' => [
                    'type' => 'section',
                    'title' => 'Plugins Options',
                    'underline' => true
                ],
                'plugins.line-numbers' => [
                    'type' => 'toggle',
                    'label' => 'Line Numbers',
                    'highlight' => 0,
                    'default' => 0,
                    'options' => [
                        1 => 'PLUGIN_ADMIN.ENABLED',
                        0 => 'PLUGIN_ADMIN.DISABLED'
                    ],
                    'validate' => [
                        'type' => 'bool'
                    ]
                ],
                'plugins.command-line' => [
                    'type' => 'toggle',
                    'label' => 'Command Line',
                    'highlight' => 0,
                    'default' => 0,
                    'options' => [
                        1 => 'PLUGIN_ADMIN.ENABLED',
                        0 => 'PLUGIN_ADMIN.DISABLED'
                    ],
                    'validate' => [
                        'type' => 'bool'
                    ]
                ],
                'plugins.command-line-prompt' => [
                    'type' => 'text',
                    'size' => 'small',
                    'label' => 'Command Line Prompt'
                ]
            ]
        ]
    ]
];
