<?php
return [
    '@class' => 'Grav\\Common\\File\\CompiledYamlFile',
    'filename' => '/Users/jonatan/Documents/Projects/games/collision/tutorial-admin/system/blueprints/flex/configure/compat.yaml',
    'modified' => 1617729503,
    'data' => [
        'form' => [
            'compatibility' => [
                'type' => 'tab',
                'title' => 'Compatibility',
                'fields' => [
                    'object.compat.events' => [
                        'type' => 'toggle',
                        'toggleable' => true,
                        'label' => 'Admin event compatibility',
                        'help' => 'Enables onAdminSave and onAdminAfterSave events for plugins',
                        'highlight' => 1,
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
    ]
];
