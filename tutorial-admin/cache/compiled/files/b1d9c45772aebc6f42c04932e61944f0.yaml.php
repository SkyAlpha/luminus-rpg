<?php
return [
    '@class' => 'Grav\\Common\\File\\CompiledYamlFile',
    'filename' => '/Users/jonatan/Documents/Projects/games/collision/tutorial-admin/system/blueprints/flex/user-groups.yaml',
    'modified' => 1617729503,
    'data' => [
        'title' => 'User Groups',
        'description' => 'Manage your User Groups in Flex.',
        'type' => 'flex-objects',
        'extends@' => [
            'type' => 'group',
            'context' => 'blueprints://user'
        ],
        'config' => [
            'admin' => [
                'router' => [
                    'path' => '/accounts/groups',
                    'actions' => [
                        'configure' => [
                            'path' => '/accounts/configure'
                        ]
                    ],
                    'redirects' => [
                        '/accounts' => '/accounts/groups'
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
                        'route' => '/accounts/groups',
                        'index' => 1,
                        'title' => 'PLUGIN_ADMIN.ACCOUNTS',
                        'icon' => 'fa-users',
                        'authorize' => [
                            0 => 'admin.users.list',
                            1 => 'admin.super'
                        ],
                        'priority' => 6
                    ]
                ],
                'template' => 'user-groups',
                'list' => [
                    'fields' => [
                        'groupname' => [
                            'link' => 'edit',
                            'search' => true
                        ],
                        'readableName' => [
                            'search' => true
                        ],
                        'description' => [
                            'search' => true
                        ]
                    ],
                    'options' => [
                        'per_page' => 20,
                        'order' => [
                            'by' => 'groupname',
                            'dir' => 'asc'
                        ]
                    ]
                ],
                'edit' => [
                    'title' => [
                        'template' => '{{ form.value(\'readableName\') ?? form.value(\'groupname\') }}'
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
                        'type' => 'user-groups',
                        'layout' => 'default'
                    ]
                ]
            ],
            'data' => [
                'object' => 'Grav\\Common\\Flex\\Types\\UserGroups\\UserGroupObject',
                'collection' => 'Grav\\Common\\Flex\\Types\\UserGroups\\UserGroupCollection',
                'index' => 'Grav\\Common\\Flex\\Types\\UserGroups\\UserGroupIndex',
                'storage' => [
                    'class' => 'Grav\\Framework\\Flex\\Storage\\SimpleStorage',
                    'options' => [
                        'formatter' => [
                            'class' => 'Grav\\Framework\\File\\Formatter\\YamlFormatter'
                        ],
                        'folder' => 'user://config/groups.yaml',
                        'key' => 'groupname'
                    ]
                ],
                'search' => [
                    'options' => [
                        'contains' => 1
                    ],
                    'fields' => [
                        0 => 'key',
                        1 => 'groupname',
                        2 => 'description'
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
        ]
    ]
];
