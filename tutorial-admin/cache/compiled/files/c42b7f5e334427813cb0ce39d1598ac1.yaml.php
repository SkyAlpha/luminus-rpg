<?php
return [
    '@class' => 'Grav\\Common\\File\\CompiledYamlFile',
    'filename' => '/Users/jonatan/Downloads/grav-admin/user/plugins/backtotop/blueprints.yaml',
    'modified' => 1617822859,
    'data' => [
        'name' => 'Back to Top',
        'version' => '0.6.1',
        'description' => 'This grav plugin displays a "Back to Top" link at the end of every section, so the reader can jump back up to the table of contents. The plugin integrates the js lib "Return to Top Arrow" by [rdallaire](https://codepen.io/rdallaire/pen/apoyx).',
        'icon' => 'chevron-circle-up',
        'author' => [
            'name' => 'Marco Segato'
        ],
        'homepage' => 'https://github.com/marcosegato/grav-plugin-backtotop',
        'keywords' => 'grav, plugin, back, return, top, link',
        'bugs' => 'https://github.com/marcosegato/grav-plugin-backtotop/issues',
        'docs' => 'https://github.com/marcosegato/grav-plugin-backtotop/blob/master/README.md',
        'license' => 'MIT',
        'form' => [
            'validation' => 'strict',
            'fields' => [
                'basics' => [
                    'type' => 'section',
                    'title' => 'Basics',
                    'underline' => true
                ],
                'enabled' => [
                    'type' => 'toggle',
                    'label' => 'PLUGIN_ADMIN.PLUGIN_STATUS',
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
                'fontawesome_icons' => [
                    'type' => 'toggle',
                    'label' => 'Icons mode',
                    'help' => 'Display button\'s icons as FontAwesome or SVG images.',
                    'highlight' => 1,
                    'default' => 1,
                    'options' => [
                        1 => 'FontAwesome',
                        0 => 'SVG'
                    ],
                    'validate' => [
                        'type' => 'bool'
                    ]
                ],
                'fontawesome_css' => [
                    'type' => 'toggle',
                    'label' => 'Include FontAwesome Files',
                    'help' => 'If FontAwesome icons are enabled and your theme does not include it, you must enable this option to add required CSS files.',
                    'highlight' => 0,
                    'default' => 1,
                    'options' => [
                        1 => 'PLUGIN_ADMIN.ENABLED',
                        0 => 'PLUGIN_ADMIN.DISABLED'
                    ],
                    'validate' => [
                        'type' => 'bool'
                    ]
                ]
            ]
        ]
    ]
];
