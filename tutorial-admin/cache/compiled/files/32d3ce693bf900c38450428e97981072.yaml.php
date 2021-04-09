<?php
return [
    '@class' => 'Grav\\Common\\File\\CompiledYamlFile',
    'filename' => '/Users/jonatan/Downloads/grav-admin/system/blueprints/flex/user-accounts.yaml',
    'modified' => 1617729503,
    'data' => [
        'title' => 'User Accounts',
        'description' => 'Manage your User Accounts in Flex.',
        'type' => 'flex-objects',
        'extends@' => [
            'type' => 'account',
            'context' => 'blueprints://user'
        ],
        'config' => [
            'admin' => [
                'router' => [
                    'path' => '/accounts/users',
                    'actions' => [
                        'configure' => [
                            'path' => '/accounts/configure'
                        ]
                    ],
                    'redirects' => [
                        '/user' => '/accounts/users',
                        '/accounts' => '/accounts/users'
                    ]
                ],
                'permissions' => [
                    'admin.users' => [
                        'type' => 'crudl',
                        'label' => 'User Accounts'
                    ],
                    'admin.configuration.users' => [
                        'type' => 'default',
                        'label' => 'Accounts Configuration'
                    ]
                ],
                'menu' => [
                    'base' => [
                        'location' => '/accounts',
                        'route' => '/accounts/users',
                        'index' => 0,
                        'title' => 'PLUGIN_ADMIN.ACCOUNTS',
                        'icon' => 'fa-users',
                        'authorize' => [
                            0 => 'admin.users.list',
                            1 => 'admin.super'
                        ],
                        'priority' => 6
                    ]
                ],
                'template' => 'user-accounts',
                'list' => [
                    'fields' => [
                        'username' => [
                            'link' => 'edit',
                            'search' => true,
                            'field' => [
                                'label' => 'PLUGIN_ADMIN.USERNAME'
                            ]
                        ],
                        'email' => [
                            'search' => true
                        ],
                        'fullname' => [
                            'search' => true
                        ]
                    ],
                    'options' => [
                        'per_page' => 20,
                        'order' => [
                            'by' => 'username',
                            'dir' => 'asc'
                        ]
                    ]
                ],
                'edit' => [
                    'title' => [
                        'template' => '{{ form.value(\'fullname\') ?? form.value(\'username\') }} &lt;{{ form.value(\'email\') }}&gt;'
                    ]
                ],
                'configure' => [
                    'hidden' => true,
                    'authorize' => 'admin.configuration.users',
                    'form' => 'accounts',
                    'title' => [
                        'template' => '{{ \'PLUGIN_ADMIN.ACCOUNTS\'|tu }} {{ \'PLUGIN_ADMIN.CONFIGURATION\'|tu }}'
                    ]
                ]
            ],
            'site' => [
                'hidden' => true,
                'templates' => [
                    'collection' => [
                        'paths' => [
                            0 => 'flex/{TYPE}/collection/{LAYOUT}{EXT}'
                        ]
                    ],
                    'object' => [
                        'paths' => [
                            0 => 'flex/{TYPE}/object/{LAYOUT}{EXT}'
                        ]
                    ],
                    'defaults' => [
                        'type' => 'user-accounts',
                        'layout' => 'default'
                    ]
                ]
            ],
            'data' => [
                'object' => 'Grav\\Common\\Flex\\Types\\Users\\UserObject',
                'collection' => 'Grav\\Common\\Flex\\Types\\Users\\UserCollection',
                'index' => 'Grav\\Common\\Flex\\Types\\Users\\UserIndex',
                'storage' => [
                    'class' => 'Grav\\Common\\Flex\\Types\\Users\\Storage\\UserFileStorage',
                    'options' => [
                        'formatter' => [
                            'class' => 'Grav\\Framework\\File\\Formatter\\YamlFormatter'
                        ],
                        'folder' => 'account://',
                        'pattern' => '{FOLDER}/{KEY}{EXT}',
                        'indexed' => true,
                        'key' => 'username',
                        'case_sensitive' => false
                    ]
                ],
                'search' => [
                    'options' => [
                        'contains' => 1
                    ],
                    'fields' => [
                        0 => 'key',
                        1 => 'email'
                    ]
                ]
            ]
        ],
        'blueprints' => [
            'configure' => [
                'fields' => [
                    'import@' => [
                        'type' => 'configure/compat',
                        'context' => 'blueprints://flex'
                    ]
                ]
            ]
        ],
        'form' => [
            'fields' => [
                'username' => [
                    'flex-disabled@' => 'exists',
                    'disabled' => false,
                    'flex-readonly@' => 'exists',
                    'readonly' => false,
                    'validate' => [
                        'required' => true
                    ]
                ]
            ]
        ]
    ]
];
