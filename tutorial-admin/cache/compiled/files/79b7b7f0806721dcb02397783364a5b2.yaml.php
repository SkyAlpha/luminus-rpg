<?php
return [
    '@class' => 'Grav\\Common\\File\\CompiledYamlFile',
    'filename' => '/Users/jonatan/Downloads/grav-admin/system/blueprints/flex/pages.yaml',
    'modified' => 1617729503,
    'data' => [
        'title' => 'Pages',
        'description' => 'Manage your Grav Pages in Flex.',
        'type' => 'flex-objects',
        'extends@' => [
            'type' => 'default',
            'context' => 'blueprints://pages'
        ],
        'config' => [
            'admin' => [
                'router' => [
                    'path' => '/pages'
                ],
                'permissions' => [
                    'admin.pages' => [
                        'type' => 'crudl',
                        'label' => 'Pages'
                    ],
                    'admin.configuration.pages' => [
                        'type' => 'default',
                        'label' => 'Pages Configuration'
                    ]
                ],
                'menu' => [
                    'list' => [
                        'route' => '/pages',
                        'title' => 'PLUGIN_ADMIN.PAGES',
                        'icon' => 'fa-file-text',
                        'authorize' => [
                            0 => 'admin.pages.list',
                            1 => 'admin.super'
                        ],
                        'priority' => 5
                    ]
                ],
                'template' => 'pages',
                'actions' => [
                    'list' => true,
                    'create' => true,
                    'read' => true,
                    'update' => true,
                    'delete' => true
                ],
                'list' => [
                    'fields' => [
                        'published' => [
                            'width' => 8,
                            'alias' => 'header.published'
                        ],
                        'visible' => [
                            'width' => 8,
                            'field' => [
                                'label' => 'Visible',
                                'type' => 'toggle'
                            ]
                        ],
                        'menu' => [
                            'link' => 'edit',
                            'alias' => 'header.menu'
                        ],
                        'full_route' => [
                            'field' => [
                                'label' => 'Route',
                                'type' => 'text'
                            ],
                            'link' => 'edit',
                            'sort' => [
                                'field' => 'key'
                            ]
                        ],
                        'name' => [
                            'width' => 8,
                            'field' => [
                                'label' => 'Type',
                                'type' => 'text'
                            ]
                        ],
                        'translations' => [
                            'width' => 8,
                            'field' => [
                                'label' => 'Translations',
                                'type' => 'text'
                            ]
                        ]
                    ],
                    'options' => [
                        'per_page' => 20,
                        'order' => [
                            'by' => 'key',
                            'dir' => 'asc'
                        ]
                    ],
                    'buttons' => [
                        'back' => [
                            'icon' => 'reply',
                            'title' => 'PLUGIN_ADMIN.BACK'
                        ],
                        'add' => [
                            'icon' => 'plus',
                            'label' => 'PLUGIN_ADMIN.ADD'
                        ]
                    ]
                ],
                'edit' => [
                    'title' => [
                        'template' => '{% if object.root %}Root <small>( &lt;root&gt; ){% else %}{{ (form.value(\'header.title\') ?? form.value(\'folder\'))|e }} <small>( {{ (object.getRoute().toString(false) ?: \'/\')|e }} )</small>{% endif %}'
                    ],
                    'buttons' => [
                        'back' => [
                            'icon' => 'reply',
                            'title' => 'PLUGIN_ADMIN.BACK'
                        ],
                        'preview' => [
                            'icon' => 'eye',
                            'title' => 'PLUGIN_ADMIN.PREVIEW'
                        ],
                        'add' => [
                            'icon' => 'plus',
                            'label' => 'PLUGIN_ADMIN.ADD'
                        ],
                        'copy' => [
                            'icon' => 'copy',
                            'label' => 'PLUGIN_ADMIN.COPY'
                        ],
                        'move' => [
                            'icon' => 'arrows',
                            'label' => 'PLUGIN_ADMIN.MOVE'
                        ],
                        'delete' => [
                            'icon' => 'close',
                            'label' => 'PLUGIN_ADMIN.DELETE'
                        ],
                        'save' => [
                            'icon' => 'check',
                            'label' => 'PLUGIN_ADMIN.SAVE'
                        ]
                    ]
                ],
                'preview' => [
                    'enabled' => true
                ],
                'configure' => [
                    'authorize' => 'admin.configuration.pages'
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
                        'type' => 'pages',
                        'layout' => 'default'
                    ]
                ],
                'filter' => [
                    0 => 'withPublished'
                ]
            ],
            'data' => [
                'object' => 'Grav\\Common\\Flex\\Types\\Pages\\PageObject',
                'collection' => 'Grav\\Common\\Flex\\Types\\Pages\\PageCollection',
                'index' => 'Grav\\Common\\Flex\\Types\\Pages\\PageIndex',
                'storage' => [
                    'class' => 'Grav\\Common\\Flex\\Types\\Pages\\Storage\\PageStorage',
                    'options' => [
                        'formatter' => [
                            'class' => 'Grav\\Framework\\File\\Formatter\\MarkdownFormatter'
                        ],
                        'folder' => 'page://',
                        'indexed' => true
                    ]
                ],
                'ordering' => [
                    'storage_key' => 'ASC'
                ],
                'search' => [
                    'options' => [
                        'contains' => 1
                    ],
                    'fields' => [
                        0 => 'key',
                        1 => 'menu',
                        2 => 'title',
                        3 => 'name'
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
                'lang' => [
                    'type' => 'hidden',
                    'value' => ''
                ],
                'tabs' => [
                    'fields' => [
                        'security' => [
                            'type' => 'tab',
                            'title' => 'PLUGIN_ADMIN.SECURITY',
                            'import@' => [
                                'type' => 'partials/security',
                                'context' => 'blueprints://pages'
                            ]
                        ]
                    ]
                ]
            ]
        ]
    ]
];
