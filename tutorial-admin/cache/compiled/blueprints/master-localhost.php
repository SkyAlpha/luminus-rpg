<?php
return [
    '@class' => 'Grav\\Common\\Config\\CompiledBlueprints',
    'timestamp' => 1623681904,
    'checksum' => '5a287385f70619663118fb135bb4e8c7',
    'files' => [
        'user/plugins/admin/blueprints/config' => [
            'media' => [
                'file' => 'user/plugins/admin/blueprints/config/media.yaml',
                'modified' => 1621433530
            ]
        ],
        'system/blueprints/config' => [
            'backups' => [
                'file' => 'system/blueprints/config/backups.yaml',
                'modified' => 1622714294
            ],
            'media' => [
                'file' => 'system/blueprints/config/media.yaml',
                'modified' => 1622714294
            ],
            'scheduler' => [
                'file' => 'system/blueprints/config/scheduler.yaml',
                'modified' => 1622714294
            ],
            'security' => [
                'file' => 'system/blueprints/config/security.yaml',
                'modified' => 1622714294
            ],
            'site' => [
                'file' => 'system/blueprints/config/site.yaml',
                'modified' => 1622714294
            ],
            'streams' => [
                'file' => 'system/blueprints/config/streams.yaml',
                'modified' => 1622714294
            ],
            'system' => [
                'file' => 'system/blueprints/config/system.yaml',
                'modified' => 1622714294
            ]
        ],
        'user/plugins' => [
            'plugins/markdown-notices' => [
                'file' => 'user/plugins/markdown-notices/blueprints.yaml',
                'modified' => 1621433531
            ],
            'plugins/form' => [
                'file' => 'user/plugins/form/blueprints.yaml',
                'modified' => 1621433530
            ],
            'plugins/highlight' => [
                'file' => 'user/plugins/highlight/blueprints.yaml',
                'modified' => 1621433530
            ],
            'plugins/flex-objects' => [
                'file' => 'user/plugins/flex-objects/blueprints.yaml',
                'modified' => 1621433530
            ],
            'plugins/admin' => [
                'file' => 'user/plugins/admin/blueprints.yaml',
                'modified' => 1621433530
            ],
            'plugins/problems' => [
                'file' => 'user/plugins/problems/blueprints.yaml',
                'modified' => 1621433531
            ],
            'plugins/backtotop' => [
                'file' => 'user/plugins/backtotop/blueprints.yaml',
                'modified' => 1621433530
            ],
            'plugins/prism-highlight' => [
                'file' => 'user/plugins/prism-highlight/blueprints.yaml',
                'modified' => 1621433531
            ],
            'plugins/error' => [
                'file' => 'user/plugins/error/blueprints.yaml',
                'modified' => 1621433530
            ],
            'plugins/login' => [
                'file' => 'user/plugins/login/blueprints.yaml',
                'modified' => 1621433530
            ],
            'plugins/email' => [
                'file' => 'user/plugins/email/blueprints.yaml',
                'modified' => 1621433530
            ]
        ],
        'user/themes' => [
            'themes/g5_hydrogen' => [
                'file' => 'user/themes/g5_hydrogen/blueprints.yaml',
                'modified' => 1621433531
            ],
            'themes/deliver' => [
                'file' => 'user/themes/deliver/blueprints.yaml',
                'modified' => 1621433531
            ],
            'themes/quark' => [
                'file' => 'user/themes/quark/blueprints.yaml',
                'modified' => 1621433531
            ]
        ]
    ],
    'data' => [
        'items' => [
            'media' => [
                'type' => '_root',
                'form_field' => false,
                'form' => [
                    'validation' => 'loose'
                ]
            ],
            'media.types' => [
                'array' => true,
                'name' => 'media.types',
                'type' => 'list',
                'label' => 'PLUGIN_ADMIN.MEDIA_TYPES',
                'style' => 'vertical',
                'key' => 'extension',
                'controls' => 'both',
                'collapsed' => true,
                'validation' => 'loose'
            ],
            'media.types.*' => [
                'type' => '_parent',
                'name' => 'media.types.*',
                'form_field' => false
            ],
            'media.types.*.type' => [
                'type' => 'text',
                'label' => 'PLUGIN_ADMIN.TYPE',
                'name' => 'media.types.*.type',
                'validation' => 'loose'
            ],
            'media.types.*.thumb' => [
                'type' => 'text',
                'label' => 'PLUGIN_ADMIN.THUMB',
                'name' => 'media.types.*.thumb',
                'validation' => 'loose'
            ],
            'media.types.*.mime' => [
                'type' => 'text',
                'label' => 'PLUGIN_ADMIN.MIME_TYPE',
                'validate' => [
                    'type' => 'lower'
                ],
                'name' => 'media.types.*.mime',
                'validation' => 'loose'
            ],
            'media.types.*.image' => [
                'type' => 'textarea',
                'yaml' => true,
                'label' => 'PLUGIN_ADMIN.IMAGE_OPTIONS',
                'validate' => [
                    'type' => 'yaml'
                ],
                'name' => 'media.types.*.image',
                'validation' => 'loose'
            ],
            'backups' => [
                'type' => '_root',
                'form_field' => false,
                'form' => [
                    'validation' => 'loose'
                ]
            ],
            'backups.history' => [
                'type' => 'backupshistory',
                'name' => 'backups.history',
                'validation' => 'loose'
            ],
            'backups.purge' => [
                'type' => '_parent',
                'name' => 'backups.purge',
                'form_field' => false
            ],
            'backups.purge.trigger' => [
                'type' => 'select',
                'label' => 'PLUGIN_ADMIN.BACKUPS_STORAGE_PURGE_TRIGGER',
                'size' => 'medium',
                'default' => 'space',
                'options' => [
                    'space' => 'Maximum Backup Space',
                    'number' => 'Maximum Number of Backups',
                    'time' => 'maximum Retention Time'
                ],
                'validate' => [
                    'required' => true
                ],
                'name' => 'backups.purge.trigger',
                'validation' => 'loose'
            ],
            'backups.purge.max_backups_count' => [
                'type' => 'number',
                'label' => 'PLUGIN_ADMIN.BACKUPS_MAX_COUNT',
                'default' => 25,
                'size' => 'x-small',
                'validate' => [
                    'min' => 0,
                    'type' => 'number',
                    'required' => true,
                    'message' => 'Must be a number 0 or greater'
                ],
                'name' => 'backups.purge.max_backups_count',
                'validation' => 'loose'
            ],
            'backups.purge.max_backups_space' => [
                'type' => 'number',
                'label' => 'PLUGIN_ADMIN.BACKUPS_MAX_SPACE',
                'append' => 'in GB',
                'size' => 'x-small',
                'default' => 5,
                'validate' => [
                    'min' => 1,
                    'type' => 'number',
                    'required' => true,
                    'message' => 'Space must be 1GB or greater'
                ],
                'name' => 'backups.purge.max_backups_space',
                'validation' => 'loose'
            ],
            'backups.purge.max_backups_time' => [
                'type' => 'number',
                'label' => 'PLUGIN_ADMIN.BACKUPS_MAX_RETENTION_TIME',
                'append' => 'PLUGIN_ADMIN.BACKUPS_MAX_RETENTION_TIME_APPEND',
                'size' => 'x-small',
                'default' => 365,
                'validate' => [
                    'min' => 7,
                    'type' => 'number',
                    'required' => true,
                    'message' => 'Rentenion days must be 7 or greater'
                ],
                'name' => 'backups.purge.max_backups_time',
                'validation' => 'loose'
            ],
            'backups.profiles' => [
                'array' => true,
                'type' => 'list',
                'style' => 'vertical',
                'label' => NULL,
                'classes' => 'backups-list compact',
                'sort' => false,
                'name' => 'backups.profiles',
                'validation' => 'loose'
            ],
            'backups.profiles.*' => [
                'type' => '_parent',
                'name' => 'backups.profiles.*',
                'form_field' => false
            ],
            'backups.profiles.*.name' => [
                'type' => 'text',
                'label' => 'PLUGIN_ADMIN.NAME',
                'validate' => [
                    'max' => 20,
                    'message' => 'Name must be less than 20 characters',
                    'required' => true
                ],
                'name' => 'backups.profiles.*.name',
                'validation' => 'loose'
            ],
            'backups.profiles.*.root' => [
                'type' => 'text',
                'label' => 'PLUGIN_ADMIN.BACKUPS_PROFILE_ROOT_FOLDER',
                'default' => '/',
                'validate' => [
                    'required' => true
                ],
                'name' => 'backups.profiles.*.root',
                'validation' => 'loose'
            ],
            'backups.profiles.*.exclude_paths' => [
                'type' => 'textarea',
                'label' => 'PLUGIN_ADMIN.BACKUPS_PROFILE_EXCLUDE_PATHS',
                'rows' => 5,
                'name' => 'backups.profiles.*.exclude_paths',
                'validation' => 'loose'
            ],
            'backups.profiles.*.exclude_files' => [
                'type' => 'textarea',
                'label' => 'PLUGIN_ADMIN.BACKUPS_PROFILE_EXCLUDE_FILES',
                'rows' => 5,
                'name' => 'backups.profiles.*.exclude_files',
                'validation' => 'loose'
            ],
            'backups.profiles.*.schedule' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.BACKUPS_PROFILE_SCHEDULE',
                'highlight' => 1,
                'default' => 1,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'backups.profiles.*.schedule',
                'validation' => 'loose'
            ],
            'backups.profiles.*.schedule_at' => [
                'type' => 'cron',
                'label' => 'PLUGIN_ADMIN.BACKUPS_PROFILE_SCHEDULE_AT',
                'default' => '* 3 * * *',
                'validate' => [
                    'required' => true
                ],
                'name' => 'backups.profiles.*.schedule_at',
                'validation' => 'loose'
            ],
            'scheduler' => [
                'type' => '_root',
                'form_field' => false,
                'form' => [
                    'validation' => 'loose'
                ]
            ],
            'scheduler.status' => [
                'type' => 'cronstatus',
                'validate' => [
                    'type' => 'commalist'
                ],
                'name' => 'scheduler.status',
                'validation' => 'loose'
            ],
            'scheduler.custom_jobs' => [
                'array' => true,
                'type' => 'list',
                'style' => 'vertical',
                'label' => NULL,
                'classes' => 'cron-job-list compact',
                'key' => 'id',
                'name' => 'scheduler.custom_jobs',
                'validation' => 'loose'
            ],
            'scheduler.custom_jobs.*' => [
                'type' => '_parent',
                'name' => 'scheduler.custom_jobs.*',
                'form_field' => false
            ],
            'scheduler.custom_jobs.*.command' => [
                'type' => 'text',
                'label' => 'PLUGIN_ADMIN.COMMAND',
                'validate' => [
                    'required' => true
                ],
                'name' => 'scheduler.custom_jobs.*.command',
                'validation' => 'loose'
            ],
            'scheduler.custom_jobs.*.args' => [
                'type' => 'text',
                'label' => 'PLUGIN_ADMIN.EXTRA_ARGUMENTS',
                'name' => 'scheduler.custom_jobs.*.args',
                'validation' => 'loose'
            ],
            'scheduler.custom_jobs.*.at' => [
                'type' => 'cron',
                'label' => 'PLUGIN_ADMIN.SCHEDULER_RUNAT',
                'validate' => [
                    'required' => true
                ],
                'name' => 'scheduler.custom_jobs.*.at',
                'validation' => 'loose'
            ],
            'scheduler.custom_jobs.*.output' => [
                'type' => 'text',
                'label' => 'PLUGIN_ADMIN.SCHEDULER_OUTPUT',
                'name' => 'scheduler.custom_jobs.*.output',
                'validation' => 'loose'
            ],
            'scheduler.custom_jobs.*.output_mode' => [
                'type' => 'select',
                'label' => 'PLUGIN_ADMIN.SCHEDULER_OUTPUT_TYPE',
                'default' => 'append',
                'options' => [
                    'append' => 'Append',
                    'overwrite' => 'Overwrite'
                ],
                'name' => 'scheduler.custom_jobs.*.output_mode',
                'validation' => 'loose'
            ],
            'scheduler.custom_jobs.*.email' => [
                'type' => 'text',
                'label' => 'PLUGIN_ADMIN.SCHEDULER_EMAIL',
                'name' => 'scheduler.custom_jobs.*.email',
                'validation' => 'loose'
            ],
            'security' => [
                'type' => '_root',
                'form_field' => false,
                'form' => [
                    'validation' => 'loose'
                ]
            ],
            'security.xss_whitelist' => [
                'type' => 'selectize',
                'size' => 'large',
                'label' => 'PLUGIN_ADMIN.XSS_WHITELIST_PERMISSIONS',
                'classes' => 'fancy',
                'validate' => [
                    'type' => 'commalist'
                ],
                'name' => 'security.xss_whitelist',
                'validation' => 'loose'
            ],
            'security.xss_enabled' => [
                'type' => '_parent',
                'name' => 'security.xss_enabled',
                'form_field' => false
            ],
            'security.xss_enabled.on_events' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.XSS_ON_EVENTS',
                'highlight' => 1,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'default' => true,
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'security.xss_enabled.on_events',
                'validation' => 'loose'
            ],
            'security.xss_enabled.invalid_protocols' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.XSS_INVALID_PROTOCOLS',
                'highlight' => 1,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'default' => true,
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'security.xss_enabled.invalid_protocols',
                'validation' => 'loose'
            ],
            'security.xss_invalid_protocols' => [
                'type' => 'selectize',
                'size' => 'large',
                'label' => 'PLUGIN_ADMIN.XSS_INVALID_PROTOCOLS_LIST',
                'classes' => 'fancy',
                'validate' => [
                    'type' => 'commalist'
                ],
                'name' => 'security.xss_invalid_protocols',
                'validation' => 'loose'
            ],
            'security.xss_enabled.moz_binding' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.XSS_MOZ_BINDINGS',
                'highlight' => 1,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'default' => true,
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'security.xss_enabled.moz_binding',
                'validation' => 'loose'
            ],
            'security.xss_enabled.html_inline_styles' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.XSS_HTML_INLINE_STYLES',
                'highlight' => 1,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'default' => true,
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'security.xss_enabled.html_inline_styles',
                'validation' => 'loose'
            ],
            'security.xss_enabled.dangerous_tags' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.XSS_DANGEROUS_TAGS',
                'highlight' => 1,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'default' => true,
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'security.xss_enabled.dangerous_tags',
                'validation' => 'loose'
            ],
            'security.xss_dangerous_tags' => [
                'type' => 'selectize',
                'size' => 'large',
                'label' => 'PLUGIN_ADMIN.XSS_DANGEROUS_TAGS_LIST',
                'classes' => 'fancy',
                'validate' => [
                    'type' => 'commalist'
                ],
                'name' => 'security.xss_dangerous_tags',
                'validation' => 'loose'
            ],
            'security.uploads_dangerous_extensions' => [
                'type' => 'selectize',
                'size' => 'large',
                'label' => 'PLUGIN_ADMIN.UPLOADS_DANGEROUS_EXTENSIONS',
                'classes' => 'fancy',
                'validate' => [
                    'type' => 'commalist'
                ],
                'name' => 'security.uploads_dangerous_extensions',
                'validation' => 'loose'
            ],
            'security.sanitize_svg' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.SANITIZE_SVG',
                'highlight' => 1,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'default' => true,
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'security.sanitize_svg',
                'validation' => 'loose'
            ],
            'site' => [
                'type' => '_root',
                'form_field' => false,
                'form' => [
                    'validation' => 'loose'
                ]
            ],
            'site.title' => [
                'type' => 'text',
                'label' => 'PLUGIN_ADMIN.SITE_TITLE',
                'size' => 'large',
                'name' => 'site.title',
                'validation' => 'loose'
            ],
            'site.default_lang' => [
                'type' => 'text',
                'label' => 'PLUGIN_ADMIN.SITE_DEFAULT_LANG',
                'size' => 'x-small',
                'name' => 'site.default_lang',
                'validation' => 'loose'
            ],
            'site.author' => [
                'type' => '_parent',
                'name' => 'site.author',
                'form_field' => false
            ],
            'site.author.name' => [
                'type' => 'text',
                'size' => 'large',
                'label' => 'PLUGIN_ADMIN.DEFAULT_AUTHOR',
                'name' => 'site.author.name',
                'validation' => 'loose'
            ],
            'site.author.email' => [
                'type' => 'text',
                'size' => 'large',
                'label' => 'PLUGIN_ADMIN.DEFAULT_EMAIL',
                'validate' => [
                    'type' => 'email'
                ],
                'name' => 'site.author.email',
                'validation' => 'loose'
            ],
            'site.taxonomies' => [
                'type' => 'selectize',
                'size' => 'large',
                'label' => 'PLUGIN_ADMIN.TAXONOMY_TYPES',
                'classes' => 'fancy',
                'validate' => [
                    'type' => 'commalist'
                ],
                'name' => 'site.taxonomies',
                'validation' => 'loose'
            ],
            'site.summary' => [
                'type' => '_parent',
                'name' => 'site.summary',
                'form_field' => false
            ],
            'site.summary.enabled' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.ENABLED',
                'highlight' => 1,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'site.summary.enabled',
                'validation' => 'loose'
            ],
            'site.summary.size' => [
                'type' => 'text',
                'size' => 'small',
                'append' => 'PLUGIN_ADMIN.CHARACTERS',
                'label' => 'PLUGIN_ADMIN.SUMMARY_SIZE',
                'validate' => [
                    'type' => 'int',
                    'min' => 0,
                    'max' => 65536
                ],
                'name' => 'site.summary.size',
                'validation' => 'loose'
            ],
            'site.summary.format' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.FORMAT',
                'classes' => 'fancy',
                'highlight' => 'short',
                'options' => [
                    'short' => 'PLUGIN_ADMIN.SHORT',
                    'long' => 'PLUGIN_ADMIN.LONG'
                ],
                'name' => 'site.summary.format',
                'validation' => 'loose'
            ],
            'site.summary.delimiter' => [
                'type' => 'text',
                'size' => 'x-small',
                'label' => 'PLUGIN_ADMIN.DELIMITER',
                'name' => 'site.summary.delimiter',
                'validation' => 'loose'
            ],
            'site.metadata' => [
                'type' => 'array',
                'label' => 'PLUGIN_ADMIN.METADATA',
                'name' => 'site.metadata',
                'validation' => 'loose'
            ],
            'site.redirects' => [
                'type' => 'array',
                'label' => 'PLUGIN_ADMIN.CUSTOM_REDIRECTS',
                'name' => 'site.redirects',
                'validation' => 'loose'
            ],
            'site.routes' => [
                'type' => 'array',
                'label' => 'PLUGIN_ADMIN.CUSTOM_ROUTES',
                'name' => 'site.routes',
                'validation' => 'loose'
            ],
            'streams' => [
                'type' => '_root',
                'form_field' => false,
                'form' => [
                    'validation' => 'loose',
                    'hidden' => true
                ]
            ],
            'streams.schemes' => [
                'type' => '_parent',
                'name' => 'streams.schemes',
                'form_field' => false
            ],
            'streams.schemes.xxx' => [
                'type' => 'array',
                'name' => 'streams.schemes.xxx',
                'validation' => 'loose'
            ],
            'system' => [
                'type' => '_root',
                'form_field' => false,
                'form' => [
                    'validation' => 'loose'
                ]
            ],
            'system.home' => [
                'type' => '_parent',
                'name' => 'system.home',
                'form_field' => false
            ],
            'system.home.alias' => [
                'type' => 'pages',
                'size' => 'large',
                'classes' => 'fancy',
                'label' => 'PLUGIN_ADMIN.HOME_PAGE',
                'show_all' => false,
                'show_modular' => false,
                'show_root' => false,
                'show_slug' => true,
                'name' => 'system.home.alias',
                'validation' => 'loose'
            ],
            'system.home.hide_in_urls' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.HIDE_HOME_IN_URLS',
                'highlight' => 0,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'system.home.hide_in_urls',
                'validation' => 'loose'
            ],
            'system.pages' => [
                'type' => '_parent',
                'name' => 'system.pages',
                'form_field' => false
            ],
            'system.pages.theme' => [
                'type' => 'themeselect',
                'classes' => 'fancy',
                'selectize' => true,
                'size' => 'medium',
                'label' => 'PLUGIN_ADMIN.DEFAULT_THEME',
                'name' => 'system.pages.theme',
                'validation' => 'loose'
            ],
            'system.pages.process' => [
                'type' => 'checkboxes',
                'label' => 'PLUGIN_ADMIN.PROCESS',
                'default' => [
                    0 => [
                        'markdown' => true
                    ],
                    1 => [
                        'twig' => true
                    ]
                ],
                'options' => [
                    'markdown' => 'Markdown',
                    'twig' => 'Twig'
                ],
                'use' => 'keys',
                'name' => 'system.pages.process',
                'validation' => 'loose'
            ],
            'system.pages.types' => [
                'type' => 'array',
                'label' => 'PLUGIN_ADMIN.PAGE_TYPES',
                'size' => 'small',
                'default' => [
                    0 => 'html',
                    1 => 'htm',
                    2 => 'json',
                    3 => 'xml',
                    4 => 'txt',
                    5 => 'rss',
                    6 => 'atom'
                ],
                'value_only' => true,
                'name' => 'system.pages.types',
                'validation' => 'loose'
            ],
            'system.timezone' => [
                'type' => 'select',
                'label' => 'PLUGIN_ADMIN.TIMEZONE',
                'size' => 'medium',
                'classes' => 'fancy',
                'data-options@' => '\\Grav\\Common\\Utils::timezones',
                'default' => '',
                'options' => [
                    '' => 'Default (Server Timezone)'
                ],
                'name' => 'system.timezone',
                'validation' => 'loose'
            ],
            'system.pages.dateformat' => [
                'type' => '_parent',
                'name' => 'system.pages.dateformat',
                'form_field' => false
            ],
            'system.pages.dateformat.default' => [
                'type' => 'select',
                'size' => 'medium',
                'selectize' => [
                    'create' => true
                ],
                'label' => 'PLUGIN_ADMIN.DEFAULT_DATE_FORMAT',
                'data-options@' => '\\Grav\\Common\\Utils::dateFormats',
                'validate' => [
                    'type' => 'string'
                ],
                'name' => 'system.pages.dateformat.default',
                'validation' => 'loose'
            ],
            'system.pages.dateformat.short' => [
                'type' => 'dateformat',
                'size' => 'medium',
                'classes' => 'fancy',
                'label' => 'PLUGIN_ADMIN.SHORT_DATE_FORMAT',
                'default' => 'jS M Y',
                'options' => [
                    'F jS \\a\\t g:ia' => 'Date1',
                    'l jS \\of F g:i A' => 'Date2',
                    'D, d M Y G:i:s' => 'Date3',
                    'd-m-y G:i' => 'Date4',
                    'jS M Y' => 'Date5'
                ],
                'name' => 'system.pages.dateformat.short',
                'validation' => 'loose'
            ],
            'system.pages.dateformat.long' => [
                'type' => 'dateformat',
                'size' => 'medium',
                'classes' => 'fancy',
                'label' => 'PLUGIN_ADMIN.LONG_DATE_FORMAT',
                'options' => [
                    'F jS \\a\\t g:ia' => 'Date1',
                    'l jS \\of F g:i A' => 'Date2',
                    'D, d M Y G:i:s' => 'Date3',
                    'd-m-y G:i' => 'Date4',
                    'jS M Y' => 'Date5'
                ],
                'name' => 'system.pages.dateformat.long',
                'validation' => 'loose'
            ],
            'system.pages.order' => [
                'type' => '_parent',
                'name' => 'system.pages.order',
                'form_field' => false
            ],
            'system.pages.order.by' => [
                'type' => 'select',
                'size' => 'large',
                'classes' => 'fancy',
                'label' => 'PLUGIN_ADMIN.DEFAULT_ORDERING',
                'options' => [
                    'default' => 'PLUGIN_ADMIN.DEFAULT_ORDERING_DEFAULT',
                    'folder' => 'PLUGIN_ADMIN.DEFAULT_ORDERING_FOLDER',
                    'title' => 'PLUGIN_ADMIN.DEFAULT_ORDERING_TITLE',
                    'date' => 'PLUGIN_ADMIN.DEFAULT_ORDERING_DATE'
                ],
                'name' => 'system.pages.order.by',
                'validation' => 'loose'
            ],
            'system.pages.order.dir' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.DEFAULT_ORDER_DIRECTION',
                'highlight' => 'asc',
                'default' => 'desc',
                'options' => [
                    'asc' => 'PLUGIN_ADMIN.ASCENDING',
                    'desc' => 'PLUGIN_ADMIN.DESCENDING'
                ],
                'name' => 'system.pages.order.dir',
                'validation' => 'loose'
            ],
            'system.pages.list' => [
                'type' => '_parent',
                'name' => 'system.pages.list',
                'form_field' => false
            ],
            'system.pages.list.count' => [
                'type' => 'text',
                'size' => 'x-small',
                'append' => 'PLUGIN_ADMIN.PAGES',
                'label' => 'PLUGIN_ADMIN.DEFAULT_PAGE_COUNT',
                'validate' => [
                    'type' => 'number',
                    'min' => 1
                ],
                'name' => 'system.pages.list.count',
                'validation' => 'loose'
            ],
            'system.pages.publish_dates' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.DATE_BASED_PUBLISHING',
                'highlight' => 1,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'system.pages.publish_dates',
                'validation' => 'loose'
            ],
            'system.pages.events' => [
                'type' => 'checkboxes',
                'label' => 'PLUGIN_ADMIN.EVENTS',
                'default' => [
                    0 => [
                        'page' => true
                    ],
                    1 => [
                        'twig' => true
                    ]
                ],
                'options' => [
                    'page' => 'Page Events',
                    'twig' => 'Twig Events'
                ],
                'use' => 'keys',
                'name' => 'system.pages.events',
                'validation' => 'loose'
            ],
            'system.pages.append_url_extension' => [
                'type' => 'text',
                'size' => 'x-small',
                'label' => 'PLUGIN_ADMIN.APPEND_URL_EXT',
                'name' => 'system.pages.append_url_extension',
                'validation' => 'loose'
            ],
            'system.pages.redirect_default_code' => [
                'type' => 'select',
                'size' => 'medium',
                'classes' => 'fancy',
                'label' => 'PLUGIN_ADMIN.REDIRECT_DEFAULT_CODE',
                'default' => 302,
                'options' => [
                    301 => 'PLUGIN_ADMIN.REDIRECT_OPTION_301',
                    302 => 'PLUGIN_ADMIN.REDIRECT_OPTION_302',
                    303 => 'PLUGIN_ADMIN.REDIRECT_OPTION_303'
                ],
                'name' => 'system.pages.redirect_default_code',
                'validation' => 'loose'
            ],
            'system.pages.redirect_default_route' => [
                'type' => 'select',
                'size' => 'medium',
                'classes' => 'fancy',
                'label' => 'PLUGIN_ADMIN.REDIRECT_DEFAULT_ROUTE',
                'default' => 0,
                'options' => [
                    0 => 'PLUGIN_ADMIN.REDIRECT_OPTION_NO_REDIRECT',
                    1 => 'PLUGIN_ADMIN.REDIRECT_OPTION_DEFAULT_REDIRECT',
                    301 => 'PLUGIN_ADMIN.REDIRECT_OPTION_301',
                    302 => 'PLUGIN_ADMIN.REDIRECT_OPTION_302'
                ],
                'validate' => [
                    'type' => 'int'
                ],
                'name' => 'system.pages.redirect_default_route',
                'validation' => 'loose'
            ],
            'system.pages.redirect_trailing_slash' => [
                'type' => 'select',
                'size' => 'medium',
                'classes' => 'fancy',
                'label' => 'PLUGIN_ADMIN.REDIRECT_TRAILING_SLASH',
                'default' => 1,
                'options' => [
                    0 => 'PLUGIN_ADMIN.REDIRECT_OPTION_NO_REDIRECT',
                    1 => 'PLUGIN_ADMIN.REDIRECT_OPTION_DEFAULT_REDIRECT',
                    301 => 'PLUGIN_ADMIN.REDIRECT_OPTION_301',
                    302 => 'PLUGIN_ADMIN.REDIRECT_OPTION_302'
                ],
                'validate' => [
                    'type' => 'int'
                ],
                'name' => 'system.pages.redirect_trailing_slash',
                'validation' => 'loose'
            ],
            'system.pages.ignore_hidden' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.IGNORE_HIDDEN',
                'highlight' => 1,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'system.pages.ignore_hidden',
                'validation' => 'loose'
            ],
            'system.pages.ignore_files' => [
                'type' => 'selectize',
                'size' => 'large',
                'label' => 'PLUGIN_ADMIN.IGNORE_FILES',
                'classes' => 'fancy',
                'validate' => [
                    'type' => 'commalist'
                ],
                'name' => 'system.pages.ignore_files',
                'validation' => 'loose'
            ],
            'system.pages.ignore_folders' => [
                'type' => 'selectize',
                'size' => 'large',
                'label' => 'PLUGIN_ADMIN.IGNORE_FOLDERS',
                'classes' => 'fancy',
                'validate' => [
                    'type' => 'commalist'
                ],
                'name' => 'system.pages.ignore_folders',
                'validation' => 'loose'
            ],
            'system.pages.hide_empty_folders' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.HIDE_EMPTY_FOLDERS',
                'highlight' => 0,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'system.pages.hide_empty_folders',
                'validation' => 'loose'
            ],
            'system.pages.url_taxonomy_filters' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.ALLOW_URL_TAXONOMY_FILTERS',
                'highlight' => 1,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'system.pages.url_taxonomy_filters',
                'validation' => 'loose'
            ],
            'system.pages.twig_first' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.TWIG_FIRST',
                'highlight' => 0,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'system.pages.twig_first',
                'validation' => 'loose'
            ],
            'system.pages.never_cache_twig' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.NEVER_CACHE_TWIG',
                'highlight' => 0,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'system.pages.never_cache_twig',
                'validation' => 'loose'
            ],
            'system.pages.frontmatter' => [
                'type' => '_parent',
                'name' => 'system.pages.frontmatter',
                'form_field' => false
            ],
            'system.pages.frontmatter.process_twig' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.FRONTMATTER_PROCESS_TWIG',
                'highlight' => 0,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'system.pages.frontmatter.process_twig',
                'validation' => 'loose'
            ],
            'system.pages.frontmatter.ignore_fields' => [
                'type' => 'selectize',
                'size' => 'large',
                'label' => 'PLUGIN_ADMIN.FRONTMATTER_IGNORE_FIELDS',
                'classes' => 'fancy',
                'validate' => [
                    'type' => 'commalist'
                ],
                'name' => 'system.pages.frontmatter.ignore_fields',
                'validation' => 'loose'
            ],
            'system.languages' => [
                'type' => '_parent',
                'name' => 'system.languages',
                'form_field' => false
            ],
            'system.languages.supported' => [
                'type' => 'selectize',
                'size' => 'large',
                'label' => 'PLUGIN_ADMIN.SUPPORTED',
                'classes' => 'fancy',
                'validate' => [
                    'type' => 'commalist'
                ],
                'name' => 'system.languages.supported',
                'validation' => 'loose'
            ],
            'system.languages.default_lang' => [
                'type' => 'text',
                'size' => 'x-small',
                'label' => 'PLUGIN_ADMIN.DEFAULT_LANG',
                'name' => 'system.languages.default_lang',
                'validation' => 'loose'
            ],
            'system.languages.include_default_lang' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.INCLUDE_DEFAULT_LANG',
                'highlight' => 1,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'system.languages.include_default_lang',
                'validation' => 'loose'
            ],
            'system.languages.include_default_lang_file_extension' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.INCLUDE_DEFAULT_LANG_FILE_EXTENSION',
                'highlight' => 1,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'system.languages.include_default_lang_file_extension',
                'validation' => 'loose'
            ],
            'system.value' => [
                'type' => 'selectize',
                'size' => 'large',
                'label' => 'PLUGIN_ADMIN.CONTENT_LANGUAGE_FALLBACK',
                'classes' => 'fancy',
                'name' => 'system.value',
                'validation' => 'loose'
            ],
            'system.languages.content_fallback' => [
                'array' => true,
                'type' => 'list',
                'label' => 'PLUGIN_ADMIN.CONTENT_LANGUAGE_FALLBACKS',
                'name' => 'system.languages.content_fallback',
                'validation' => 'loose'
            ],
            'system.languages.pages_fallback_only' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.PAGES_FALLBACK_ONLY',
                'highlight' => 0,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'system.languages.pages_fallback_only',
                'validation' => 'loose'
            ],
            'system.languages.translations' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.LANGUAGE_TRANSLATIONS',
                'highlight' => 1,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'system.languages.translations',
                'validation' => 'loose'
            ],
            'system.languages.translations_fallback' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.TRANSLATIONS_FALLBACK',
                'highlight' => 1,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'system.languages.translations_fallback',
                'validation' => 'loose'
            ],
            'system.languages.session_store_active' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.ACTIVE_LANGUAGE_IN_SESSION',
                'highlight' => 0,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'system.languages.session_store_active',
                'validation' => 'loose'
            ],
            'system.languages.http_accept_language' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.HTTP_ACCEPT_LANGUAGE',
                'highlight' => 0,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'system.languages.http_accept_language',
                'validation' => 'loose'
            ],
            'system.languages.override_locale' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.OVERRIDE_LOCALE',
                'highlight' => 0,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'system.languages.override_locale',
                'validation' => 'loose'
            ],
            'system.pages.expires' => [
                'type' => 'text',
                'size' => 'x-small',
                'append' => 'GRAV.NICETIME.SECOND_PLURAL',
                'label' => 'PLUGIN_ADMIN.EXPIRES',
                'validate' => [
                    'type' => 'number',
                    'min' => 1
                ],
                'name' => 'system.pages.expires',
                'validation' => 'loose'
            ],
            'system.pages.cache_control' => [
                'type' => 'text',
                'size' => 'medium',
                'label' => 'PLUGIN_ADMIN.CACHE_CONTROL',
                'name' => 'system.pages.cache_control',
                'validation' => 'loose'
            ],
            'system.pages.last_modified' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.LAST_MODIFIED',
                'highlight' => 0,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'system.pages.last_modified',
                'validation' => 'loose'
            ],
            'system.pages.etag' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.ETAG',
                'highlight' => 0,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'system.pages.etag',
                'validation' => 'loose'
            ],
            'system.pages.vary_accept_encoding' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.VARY_ACCEPT_ENCODING',
                'highlight' => 0,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'system.pages.vary_accept_encoding',
                'validation' => 'loose'
            ],
            'system.pages.markdown' => [
                'type' => '_parent',
                'name' => 'system.pages.markdown',
                'form_field' => false
            ],
            'system.pages.markdown.extra' => [
                'type' => 'toggle',
                'label' => 'Markdown extra',
                'highlight' => 0,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'system.pages.markdown.extra',
                'validation' => 'loose'
            ],
            'system.pages.markdown.auto_line_breaks' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.AUTO_LINE_BREAKS',
                'highlight' => 0,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'system.pages.markdown.auto_line_breaks',
                'validation' => 'loose'
            ],
            'system.pages.markdown.auto_url_links' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.AUTO_URL_LINKS',
                'highlight' => 0,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'system.pages.markdown.auto_url_links',
                'validation' => 'loose'
            ],
            'system.pages.markdown.escape_markup' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.ESCAPE_MARKUP',
                'highlight' => 0,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'system.pages.markdown.escape_markup',
                'validation' => 'loose'
            ],
            'system.pages.markdown.valid_link_attributes' => [
                'type' => 'selectize',
                'size' => 'large',
                'label' => 'PLUGIN_ADMIN.VALID_LINK_ATTRIBUTES',
                'classes' => 'fancy',
                'validate' => [
                    'type' => 'commalist'
                ],
                'name' => 'system.pages.markdown.valid_link_attributes',
                'validation' => 'loose'
            ],
            'system.cache' => [
                'type' => '_parent',
                'name' => 'system.cache',
                'form_field' => false
            ],
            'system.cache.enabled' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.CACHING',
                'highlight' => 1,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'system.cache.enabled',
                'validation' => 'loose'
            ],
            'system.cache.check' => [
                'type' => '_parent',
                'name' => 'system.cache.check',
                'form_field' => false
            ],
            'system.cache.check.method' => [
                'type' => 'select',
                'size' => 'medium',
                'classes' => 'fancy',
                'label' => 'PLUGIN_ADMIN.CACHE_CHECK_METHOD',
                'options' => [
                    'file' => 'Markdown + Yaml file timestamps',
                    'folder' => 'Folder timestamps',
                    'hash' => 'All files timestamps',
                    'none' => 'No timestamp checking'
                ],
                'name' => 'system.cache.check.method',
                'validation' => 'loose'
            ],
            'system.cache.driver' => [
                'type' => 'select',
                'size' => 'small',
                'classes' => 'fancy',
                'label' => 'PLUGIN_ADMIN.CACHE_DRIVER',
                'options' => [
                    'auto' => 'Auto detect',
                    'file' => 'File',
                    'apc' => 'APC',
                    'apcu' => 'APCu',
                    'xcache' => 'Xcache',
                    'memcache' => 'Memcache',
                    'memcached' => 'Memcached',
                    'wincache' => 'WinCache',
                    'redis' => 'Redis'
                ],
                'name' => 'system.cache.driver',
                'validation' => 'loose'
            ],
            'system.cache.prefix' => [
                'type' => 'text',
                'size' => 'x-small',
                'label' => 'PLUGIN_ADMIN.CACHE_PREFIX',
                'name' => 'system.cache.prefix',
                'validation' => 'loose'
            ],
            'system.cache.purge_at' => [
                'type' => 'cron',
                'label' => 'PLUGIN_ADMIN.CACHE_PURGE_JOB',
                'default' => '* 4 * * *',
                'name' => 'system.cache.purge_at',
                'validation' => 'loose'
            ],
            'system.cache.clear_at' => [
                'type' => 'cron',
                'label' => 'PLUGIN_ADMIN.CACHE_CLEAR_JOB',
                'default' => '* 3 * * *',
                'name' => 'system.cache.clear_at',
                'validation' => 'loose'
            ],
            'system.cache.clear_job_type' => [
                'type' => 'select',
                'size' => 'medium',
                'label' => 'PLUGIN_ADMIN.CACHE_JOB_TYPE',
                'options' => [
                    'standard' => 'Standard Cache Folders',
                    'all' => 'All Cache Folders'
                ],
                'name' => 'system.cache.clear_job_type',
                'validation' => 'loose'
            ],
            'system.cache.clear_images_by_default' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.CLEAR_IMAGES_BY_DEFAULT',
                'highlight' => 0,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'system.cache.clear_images_by_default',
                'validation' => 'loose'
            ],
            'system.cache.cli_compatibility' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.CLI_COMPATIBILITY',
                'highlight' => 0,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'system.cache.cli_compatibility',
                'validation' => 'loose'
            ],
            'system.cache.lifetime' => [
                'type' => 'text',
                'size' => 'small',
                'append' => 'GRAV.NICETIME.SECOND_PLURAL',
                'label' => 'PLUGIN_ADMIN.LIFETIME',
                'validate' => [
                    'type' => 'number'
                ],
                'name' => 'system.cache.lifetime',
                'validation' => 'loose'
            ],
            'system.cache.gzip' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.GZIP_COMPRESSION',
                'highlight' => 0,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'system.cache.gzip',
                'validation' => 'loose'
            ],
            'system.cache.allow_webserver_gzip' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.ALLOW_WEBSERVER_GZIP',
                'highlight' => 0,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'system.cache.allow_webserver_gzip',
                'validation' => 'loose'
            ],
            'system.cache.memcache' => [
                'type' => '_parent',
                'name' => 'system.cache.memcache',
                'form_field' => false
            ],
            'system.cache.memcache.server' => [
                'type' => 'text',
                'size' => 'medium',
                'label' => 'PLUGIN_ADMIN.MEMCACHE_SERVER',
                'name' => 'system.cache.memcache.server',
                'validation' => 'loose'
            ],
            'system.cache.memcache.port' => [
                'type' => 'text',
                'size' => 'small',
                'label' => 'PLUGIN_ADMIN.MEMCACHE_PORT',
                'name' => 'system.cache.memcache.port',
                'validation' => 'loose'
            ],
            'system.cache.memcached' => [
                'type' => '_parent',
                'name' => 'system.cache.memcached',
                'form_field' => false
            ],
            'system.cache.memcached.server' => [
                'type' => 'text',
                'size' => 'medium',
                'label' => 'PLUGIN_ADMIN.MEMCACHED_SERVER',
                'name' => 'system.cache.memcached.server',
                'validation' => 'loose'
            ],
            'system.cache.memcached.port' => [
                'type' => 'text',
                'size' => 'small',
                'label' => 'PLUGIN_ADMIN.MEMCACHED_PORT',
                'name' => 'system.cache.memcached.port',
                'validation' => 'loose'
            ],
            'system.cache.redis' => [
                'type' => '_parent',
                'name' => 'system.cache.redis',
                'form_field' => false
            ],
            'system.cache.redis.socket' => [
                'type' => 'text',
                'size' => 'medium',
                'label' => 'PLUGIN_ADMIN.REDIS_SOCKET',
                'name' => 'system.cache.redis.socket',
                'validation' => 'loose'
            ],
            'system.cache.redis.server' => [
                'type' => 'text',
                'size' => 'medium',
                'label' => 'PLUGIN_ADMIN.REDIS_SERVER',
                'name' => 'system.cache.redis.server',
                'validation' => 'loose'
            ],
            'system.cache.redis.port' => [
                'type' => 'text',
                'size' => 'small',
                'label' => 'PLUGIN_ADMIN.REDIS_PORT',
                'name' => 'system.cache.redis.port',
                'validation' => 'loose'
            ],
            'system.cache.redis.password' => [
                'type' => 'text',
                'size' => 'small',
                'label' => 'PLUGIN_ADMIN.REDIS_PASSWORD',
                'name' => 'system.cache.redis.password',
                'validation' => 'loose'
            ],
            'system.cache.redis.database' => [
                'type' => 'text',
                'size' => 'medium',
                'label' => 'PLUGIN_ADMIN.REDIS_DATABASE',
                'validate' => [
                    'type' => 'number',
                    'min' => 0
                ],
                'name' => 'system.cache.redis.database',
                'validation' => 'loose'
            ],
            'system.flex' => [
                'type' => '_parent',
                'name' => 'system.flex',
                'form_field' => false
            ],
            'system.flex.cache' => [
                'type' => '_parent',
                'name' => 'system.flex.cache',
                'form_field' => false
            ],
            'system.flex.cache.index' => [
                'type' => '_parent',
                'name' => 'system.flex.cache.index',
                'form_field' => false
            ],
            'system.flex.cache.index.enabled' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.FLEX_INDEX_CACHE_ENABLED',
                'highlight' => 1,
                'default' => 1,
                'options' => [
                    1 => 'PLUGIN_ADMIN.ENABLED',
                    0 => 'PLUGIN_ADMIN.DISABLED'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'system.flex.cache.index.enabled',
                'validation' => 'loose'
            ],
            'system.flex.cache.index.lifetime' => [
                'type' => 'text',
                'label' => 'PLUGIN_ADMIN.FLEX_INDEX_CACHE_LIFETIME',
                'default' => 60,
                'validate' => [
                    'type' => 'int'
                ],
                'name' => 'system.flex.cache.index.lifetime',
                'validation' => 'loose'
            ],
            'system.flex.cache.object' => [
                'type' => '_parent',
                'name' => 'system.flex.cache.object',
                'form_field' => false
            ],
            'system.flex.cache.object.enabled' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.FLEX_OBJECT_CACHE_ENABLED',
                'highlight' => 1,
                'default' => 1,
                'options' => [
                    1 => 'PLUGIN_ADMIN.ENABLED',
                    0 => 'PLUGIN_ADMIN.DISABLED'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'system.flex.cache.object.enabled',
                'validation' => 'loose'
            ],
            'system.flex.cache.object.lifetime' => [
                'type' => 'text',
                'label' => 'PLUGIN_ADMIN.FLEX_OBJECT_CACHE_LIFETIME',
                'default' => 600,
                'validate' => [
                    'type' => 'int'
                ],
                'name' => 'system.flex.cache.object.lifetime',
                'validation' => 'loose'
            ],
            'system.flex.cache.render' => [
                'type' => '_parent',
                'name' => 'system.flex.cache.render',
                'form_field' => false
            ],
            'system.flex.cache.render.enabled' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.FLEX_RENDER_CACHE_ENABLED',
                'highlight' => 1,
                'default' => 1,
                'options' => [
                    1 => 'PLUGIN_ADMIN.ENABLED',
                    0 => 'PLUGIN_ADMIN.DISABLED'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'system.flex.cache.render.enabled',
                'validation' => 'loose'
            ],
            'system.flex.cache.render.lifetime' => [
                'type' => 'text',
                'label' => 'PLUGIN_ADMIN.FLEX_RENDER_CACHE_LIFETIME',
                'default' => 600,
                'validate' => [
                    'type' => 'int'
                ],
                'name' => 'system.flex.cache.render.lifetime',
                'validation' => 'loose'
            ],
            'system.twig' => [
                'type' => '_parent',
                'name' => 'system.twig',
                'form_field' => false
            ],
            'system.twig.cache' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.TWIG_CACHING',
                'highlight' => 1,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'system.twig.cache',
                'validation' => 'loose'
            ],
            'system.twig.debug' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.TWIG_DEBUG',
                'highlight' => 1,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'system.twig.debug',
                'validation' => 'loose'
            ],
            'system.twig.auto_reload' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.DETECT_CHANGES',
                'highlight' => 1,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'system.twig.auto_reload',
                'validation' => 'loose'
            ],
            'system.twig.autoescape' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.AUTOESCAPE_VARIABLES',
                'highlight' => 1,
                'default' => 1,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'system.twig.autoescape',
                'validation' => 'loose'
            ],
            'system.twig.umask_fix' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.TWIG_UMASK_FIX',
                'highlight' => 0,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'system.twig.umask_fix',
                'validation' => 'loose'
            ],
            'system.assets' => [
                'type' => '_parent',
                'name' => 'system.assets',
                'form_field' => false
            ],
            'system.assets.css_pipeline' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.CSS_PIPELINE',
                'highlight' => 0,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'system.assets.css_pipeline',
                'validation' => 'loose'
            ],
            'system.assets.css_pipeline_include_externals' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.CSS_PIPELINE_INCLUDE_EXTERNALS',
                'highlight' => 1,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'system.assets.css_pipeline_include_externals',
                'validation' => 'loose'
            ],
            'system.assets.css_pipeline_before_excludes' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.CSS_PIPELINE_BEFORE_EXCLUDES',
                'highlight' => 1,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'system.assets.css_pipeline_before_excludes',
                'validation' => 'loose'
            ],
            'system.assets.css_minify' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.CSS_MINIFY',
                'highlight' => 1,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'system.assets.css_minify',
                'validation' => 'loose'
            ],
            'system.assets.css_minify_windows' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.CSS_MINIFY_WINDOWS_OVERRIDE',
                'highlight' => 0,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'system.assets.css_minify_windows',
                'validation' => 'loose'
            ],
            'system.assets.css_rewrite' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.CSS_REWRITE',
                'highlight' => 1,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'system.assets.css_rewrite',
                'validation' => 'loose'
            ],
            'system.assets.js_pipeline' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.JAVASCRIPT_PIPELINE',
                'highlight' => 0,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'system.assets.js_pipeline',
                'validation' => 'loose'
            ],
            'system.assets.js_pipeline_include_externals' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.JAVASCRIPT_PIPELINE_INCLUDE_EXTERNALS',
                'highlight' => 1,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'system.assets.js_pipeline_include_externals',
                'validation' => 'loose'
            ],
            'system.assets.js_pipeline_before_excludes' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.JAVASCRIPT_PIPELINE_BEFORE_EXCLUDES',
                'highlight' => 1,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'system.assets.js_pipeline_before_excludes',
                'validation' => 'loose'
            ],
            'system.assets.js_minify' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.JAVASCRIPT_MINIFY',
                'highlight' => 1,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'system.assets.js_minify',
                'validation' => 'loose'
            ],
            'system.assets.enable_asset_timestamp' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.ENABLED_TIMESTAMPS_ON_ASSETS',
                'highlight' => 0,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'system.assets.enable_asset_timestamp',
                'validation' => 'loose'
            ],
            'system.assets.enable_asset_sri' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.ENABLED_SRI_ON_ASSETS',
                'highlight' => 0,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'system.assets.enable_asset_sri',
                'validation' => 'loose'
            ],
            'system.assets.collections' => [
                'type' => 'multilevel',
                'label' => 'PLUGIN_ADMIN.COLLECTIONS',
                'validate' => [
                    'type' => 'array'
                ],
                'name' => 'system.assets.collections',
                'validation' => 'loose'
            ],
            'system.errors' => [
                'type' => '_parent',
                'name' => 'system.errors',
                'form_field' => false
            ],
            'system.errors.display' => [
                'type' => 'select',
                'label' => 'PLUGIN_ADMIN.DISPLAY_ERRORS',
                'size' => 'medium',
                'highlight' => 1,
                'options' => [
                    -1 => 'PLUGIN_ADMIN.ERROR_SYSTEM',
                    0 => 'PLUGIN_ADMIN.ERROR_SIMPLE',
                    1 => 'PLUGIN_ADMIN.ERROR_FULL_BACKTRACE'
                ],
                'validate' => [
                    'type' => 'int'
                ],
                'name' => 'system.errors.display',
                'validation' => 'loose'
            ],
            'system.errors.log' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.LOG_ERRORS',
                'highlight' => 1,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'system.errors.log',
                'validation' => 'loose'
            ],
            'system.log' => [
                'type' => '_parent',
                'name' => 'system.log',
                'form_field' => false
            ],
            'system.log.handler' => [
                'type' => 'select',
                'size' => 'small',
                'label' => 'PLUGIN_ADMIN.LOG_HANDLER',
                'default' => 'file',
                'options' => [
                    'file' => 'File',
                    'syslog' => 'Syslog'
                ],
                'name' => 'system.log.handler',
                'validation' => 'loose'
            ],
            'system.log.syslog' => [
                'type' => '_parent',
                'name' => 'system.log.syslog',
                'form_field' => false
            ],
            'system.log.syslog.facility' => [
                'type' => 'select',
                'size' => 'small',
                'label' => 'PLUGIN_ADMIN.SYSLOG_FACILITY',
                'default' => 'local6',
                'options' => [
                    'auth' => 'auth',
                    'authpriv' => 'authpriv',
                    'cron' => 'cron',
                    'daemon' => 'daemon',
                    'kern' => 'kern',
                    'lpr' => 'lpr',
                    'mail' => 'mail',
                    'news' => 'news',
                    'syslog' => 'syslog',
                    'user' => 'user',
                    'uucp' => 'uucp',
                    'local0' => 'local0',
                    'local1' => 'local1',
                    'local2' => 'local2',
                    'local3' => 'local3',
                    'local4' => 'local4',
                    'local5' => 'local5',
                    'local6' => 'local6',
                    'local7' => 'local7'
                ],
                'name' => 'system.log.syslog.facility',
                'validation' => 'loose'
            ],
            'system.debugger' => [
                'type' => '_parent',
                'name' => 'system.debugger',
                'form_field' => false
            ],
            'system.debugger.enabled' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.DEBUGGER',
                'highlight' => 0,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'system.debugger.enabled',
                'validation' => 'loose'
            ],
            'system.debugger.provider' => [
                'type' => 'select',
                'label' => 'PLUGIN_ADMIN.DEBUGGER_PROVIDER',
                'size' => 'medium',
                'default' => 'debugbar',
                'options' => [
                    'debugbar' => 'PLUGIN_ADMIN.DEBUGGER_DEBUGBAR',
                    'clockwork' => 'PLUGIN_ADMIN.DEBUGGER_CLOCKWORK'
                ],
                'name' => 'system.debugger.provider',
                'validation' => 'loose'
            ],
            'system.debugger.censored' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.DEBUGGER_CENSORED',
                'highlight' => 0,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'system.debugger.censored',
                'validation' => 'loose'
            ],
            'system.debugger.shutdown' => [
                'type' => '_parent',
                'name' => 'system.debugger.shutdown',
                'form_field' => false
            ],
            'system.debugger.shutdown.close_connection' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.SHUTDOWN_CLOSE_CONNECTION',
                'highlight' => 1,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'system.debugger.shutdown.close_connection',
                'validation' => 'loose'
            ],
            'system.images' => [
                'type' => '_parent',
                'name' => 'system.images',
                'form_field' => false
            ],
            'system.images.default_image_quality' => [
                'type' => 'range',
                'append' => '%',
                'label' => 'PLUGIN_ADMIN.DEFAULT_IMAGE_QUALITY',
                'validate' => [
                    'min' => 1,
                    'max' => 100
                ],
                'name' => 'system.images.default_image_quality',
                'validation' => 'loose'
            ],
            'system.images.cache_all' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.CACHE_ALL',
                'highlight' => 0,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'system.images.cache_all',
                'validation' => 'loose'
            ],
            'system.images.cache_perms' => [
                'type' => 'select',
                'size' => 'small',
                'label' => 'PLUGIN_ADMIN.CACHE_PERMS',
                'highlight' => '0755',
                'options' => [
                    '0755' => '0755',
                    '0775' => '0775'
                ],
                'name' => 'system.images.cache_perms',
                'validation' => 'loose'
            ],
            'system.images.debug' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.IMAGES_DEBUG',
                'highlight' => 0,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'system.images.debug',
                'validation' => 'loose'
            ],
            'system.images.auto_fix_orientation' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.IMAGES_AUTO_FIX_ORIENTATION',
                'highlight' => 1,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'system.images.auto_fix_orientation',
                'validation' => 'loose'
            ],
            'system.images.defaults' => [
                'type' => '_parent',
                'name' => 'system.images.defaults',
                'form_field' => false
            ],
            'system.images.defaults.loading' => [
                'type' => 'select',
                'size' => 'small',
                'label' => 'PLUGIN_ADMIN.IMAGES_LOADING',
                'highlight' => 'auto',
                'options' => [
                    'auto' => 'Auto',
                    'lazy' => 'Lazy',
                    'eager' => 'Eager'
                ],
                'name' => 'system.images.defaults.loading',
                'validation' => 'loose'
            ],
            'system.images.seofriendly' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.IMAGES_SEOFRIENDLY',
                'highlight' => 0,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'system.images.seofriendly',
                'validation' => 'loose'
            ],
            'system.media' => [
                'type' => '_parent',
                'name' => 'system.media',
                'form_field' => false
            ],
            'system.media.enable_media_timestamp' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.ENABLE_MEDIA_TIMESTAMP',
                'highlight' => 0,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'system.media.enable_media_timestamp',
                'validation' => 'loose'
            ],
            'system.media.auto_metadata_exif' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.ENABLE_AUTO_METADATA',
                'highlight' => 0,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'system.media.auto_metadata_exif',
                'validation' => 'loose'
            ],
            'system.media.allowed_fallback_types' => [
                'type' => 'selectize',
                'size' => 'large',
                'label' => 'PLUGIN_ADMIN.FALLBACK_TYPES',
                'classes' => 'fancy',
                'validate' => [
                    'type' => 'commalist'
                ],
                'name' => 'system.media.allowed_fallback_types',
                'validation' => 'loose'
            ],
            'system.media.unsupported_inline_types' => [
                'type' => 'selectize',
                'size' => 'large',
                'label' => 'PLUGIN_ADMIN.INLINE_TYPES',
                'classes' => 'fancy',
                'validate' => [
                    'type' => 'commalist'
                ],
                'name' => 'system.media.unsupported_inline_types',
                'validation' => 'loose'
            ],
            'system.images.cls' => [
                'type' => '_parent',
                'name' => 'system.images.cls',
                'form_field' => false
            ],
            'system.images.cls.auto_sizes' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.IMAGES_CLS_AUTO_SIZES',
                'highlight' => 0,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'system.images.cls.auto_sizes',
                'validation' => 'loose'
            ],
            'system.images.cls.aspect_ratio' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.IMAGES_CLS_ASPECT_RATIO',
                'highlight' => 0,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'system.images.cls.aspect_ratio',
                'validation' => 'loose'
            ],
            'system.images.cls.retina_scale' => [
                'type' => 'select',
                'label' => 'PLUGIN_ADMIN.IMAGES_CLS_RETINA_SCALE',
                'size' => 'small',
                'highlight' => 1,
                'options' => [
                    1 => '1X',
                    2 => '2X',
                    3 => '3X',
                    4 => '4X'
                ],
                'name' => 'system.images.cls.retina_scale',
                'validation' => 'loose'
            ],
            'system.session' => [
                'type' => '_parent',
                'name' => 'system.session',
                'form_field' => false
            ],
            'system.session.enabled' => [
                'type' => 'hidden',
                'label' => 'PLUGIN_ADMIN.ENABLED',
                'highlight' => 1,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'default' => true,
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'system.session.enabled',
                'validation' => 'loose'
            ],
            'system.session.initialize' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.SESSION_INITIALIZE',
                'highlight' => 1,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'default' => true,
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'system.session.initialize',
                'validation' => 'loose'
            ],
            'system.session.timeout' => [
                'type' => 'text',
                'size' => 'small',
                'append' => 'GRAV.NICETIME.SECOND_PLURAL',
                'label' => 'PLUGIN_ADMIN.TIMEOUT',
                'validate' => [
                    'type' => 'number',
                    'min' => 0
                ],
                'name' => 'system.session.timeout',
                'validation' => 'loose'
            ],
            'system.session.name' => [
                'type' => 'text',
                'size' => 'small',
                'label' => 'PLUGIN_ADMIN.NAME',
                'name' => 'system.session.name',
                'validation' => 'loose'
            ],
            'system.session.uniqueness' => [
                'type' => 'select',
                'size' => 'medium',
                'label' => 'PLUGIN_ADMIN.SESSION_UNIQUENESS',
                'highlight' => 'path',
                'default' => 'path',
                'options' => [
                    'path' => 'Grav\'s root file path',
                    'salt' => 'Grav\'s random security salt'
                ],
                'name' => 'system.session.uniqueness',
                'validation' => 'loose'
            ],
            'system.session.secure' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.SESSION_SECURE',
                'highlight' => 1,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'default' => false,
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'system.session.secure',
                'validation' => 'loose'
            ],
            'system.session.httponly' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.SESSION_HTTPONLY',
                'highlight' => 1,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'default' => true,
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'system.session.httponly',
                'validation' => 'loose'
            ],
            'system.session.domain' => [
                'type' => 'text',
                'size' => 'small',
                'label' => 'PLUGIN_ADMIN.SESSION_DOMAIN',
                'name' => 'system.session.domain',
                'validation' => 'loose'
            ],
            'system.session.path' => [
                'type' => 'text',
                'size' => 'small',
                'label' => 'PLUGIN_ADMIN.SESSION_PATH',
                'name' => 'system.session.path',
                'validation' => 'loose'
            ],
            'system.session.samesite' => [
                'type' => 'text',
                'size' => 'small',
                'label' => 'PLUGIN_ADMIN.SESSION_SAMESITE',
                'name' => 'system.session.samesite',
                'validation' => 'loose'
            ],
            'system.session.split' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.SESSION_SPLIT',
                'highlight' => 1,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'default' => true,
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'system.session.split',
                'validation' => 'loose'
            ],
            'system.gpm' => [
                'type' => '_parent',
                'name' => 'system.gpm',
                'form_field' => false
            ],
            'system.gpm.releases' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.GPM_RELEASES',
                'highlight' => 'stable',
                'options' => [
                    'stable' => 'PLUGIN_ADMIN.STABLE',
                    'testing' => 'PLUGIN_ADMIN.TESTING'
                ],
                'name' => 'system.gpm.releases',
                'validation' => 'loose'
            ],
            'system.gpm.proxy_url' => [
                'type' => 'text',
                'size' => 'medium',
                'label' => 'PLUGIN_ADMIN.PROXY_URL',
                'name' => 'system.gpm.proxy_url',
                'validation' => 'loose'
            ],
            'system.gpm.method' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.GPM_METHOD',
                'highlight' => 'auto',
                'options' => [
                    'auto' => 'PLUGIN_ADMIN.AUTO',
                    'fopen' => 'PLUGIN_ADMIN.FOPEN',
                    'curl' => 'PLUGIN_ADMIN.CURL'
                ],
                'name' => 'system.gpm.method',
                'validation' => 'loose'
            ],
            'system.gpm.official_gpm_only' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.GPM_OFFICIAL_ONLY',
                'highlight' => 1,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'default' => true,
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'system.gpm.official_gpm_only',
                'validation' => 'loose'
            ],
            'system.gpm.verify_peer' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.GPM_VERIFY_PEER',
                'highlight' => 1,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'system.gpm.verify_peer',
                'validation' => 'loose'
            ],
            'system.reverse_proxy_setup' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.REVERSE_PROXY',
                'highlight' => 0,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'system.reverse_proxy_setup',
                'validation' => 'loose'
            ],
            'system.username_regex' => [
                'type' => 'text',
                'size' => 'large',
                'label' => 'PLUGIN_ADMIN.USERNAME_REGEX',
                'name' => 'system.username_regex',
                'validation' => 'loose'
            ],
            'system.pwd_regex' => [
                'type' => 'text',
                'size' => 'large',
                'label' => 'PLUGIN_ADMIN.PWD_REGEX',
                'name' => 'system.pwd_regex',
                'validation' => 'loose'
            ],
            'system.intl_enabled' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.INTL_ENABLED',
                'highlight' => 1,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'system.intl_enabled',
                'validation' => 'loose'
            ],
            'system.wrapped_site' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.WRAPPED_SITE',
                'highlight' => 0,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'system.wrapped_site',
                'validation' => 'loose'
            ],
            'system.absolute_urls' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.ABSOLUTE_URLS',
                'highlight' => 0,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'system.absolute_urls',
                'validation' => 'loose'
            ],
            'system.param_sep' => [
                'type' => 'select',
                'size' => 'medium',
                'label' => 'PLUGIN_ADMIN.PARAMETER_SEPARATOR',
                'classes' => 'fancy',
                'default' => '',
                'options' => [
                    ':' => ': (default)',
                    ';' => '; (for Apache running on Windows)'
                ],
                'name' => 'system.param_sep',
                'validation' => 'loose'
            ],
            'system.force_ssl' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.FORCE_SSL',
                'highlight' => 0,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'system.force_ssl',
                'validation' => 'loose'
            ],
            'system.force_lowercase_urls' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.FORCE_LOWERCASE_URLS',
                'highlight' => 1,
                'default' => 1,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'system.force_lowercase_urls',
                'validation' => 'loose'
            ],
            'system.custom_base_url' => [
                'type' => 'text',
                'size' => 'medium',
                'label' => 'PLUGIN_ADMIN.CUSTOM_BASE_URL',
                'name' => 'system.custom_base_url',
                'validation' => 'loose'
            ],
            'system.http_x_forwarded' => [
                'type' => '_parent',
                'name' => 'system.http_x_forwarded',
                'form_field' => false
            ],
            'system.http_x_forwarded.protocol' => [
                'type' => 'toggle',
                'label' => 'HTTP_X_FORWARDED_PROTO Enabled',
                'highlight' => 1,
                'default' => 1,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'system.http_x_forwarded.protocol',
                'validation' => 'loose'
            ],
            'system.http_x_forwarded.host' => [
                'type' => 'toggle',
                'label' => 'HTTP_X_FORWARDED_HOST Enabled',
                'highlight' => 0,
                'default' => 0,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'system.http_x_forwarded.host',
                'validation' => 'loose'
            ],
            'system.http_x_forwarded.port' => [
                'type' => 'toggle',
                'label' => 'HTTP_X_FORWARDED_PORT Enabled',
                'highlight' => 1,
                'default' => 1,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'system.http_x_forwarded.port',
                'validation' => 'loose'
            ],
            'system.http_x_forwarded.ip' => [
                'type' => 'toggle',
                'label' => 'HTTP_X_FORWARDED IP Enabled',
                'highlight' => 1,
                'default' => 1,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'system.http_x_forwarded.ip',
                'validation' => 'loose'
            ],
            'system.strict_mode' => [
                'type' => '_parent',
                'name' => 'system.strict_mode',
                'form_field' => false
            ],
            'system.strict_mode.blueprint_compat' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.STRICT_BLUEPRINT_COMPAT',
                'highlight' => 0,
                'default' => 0,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'system.strict_mode.blueprint_compat',
                'validation' => 'loose'
            ],
            'system.strict_mode.yaml_compat' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.STRICT_YAML_COMPAT',
                'highlight' => 0,
                'default' => 0,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'system.strict_mode.yaml_compat',
                'validation' => 'loose'
            ],
            'system.strict_mode.twig_compat' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.STRICT_TWIG_COMPAT',
                'highlight' => 0,
                'default' => 0,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'system.strict_mode.twig_compat',
                'validation' => 'loose'
            ],
            'system.pages.type' => [
                'type' => 'hidden',
                'name' => 'system.pages.type',
                'validation' => 'loose'
            ],
            'system.accounts' => [
                'type' => '_parent',
                'name' => 'system.accounts',
                'form_field' => false
            ],
            'system.accounts.type' => [
                'type' => 'select',
                'label' => 'PLUGIN_ADMIN.ACCOUNTS_TYPE',
                'highlight' => 'stable',
                'options' => [
                    'regular' => 'PLUGIN_ADMIN.REGULAR',
                    'flex' => 'PLUGIN_ADMIN.FLEX'
                ],
                'name' => 'system.accounts.type',
                'validation' => 'loose'
            ],
            'system.accounts.storage' => [
                'type' => 'select',
                'label' => 'PLUGIN_ADMIN.ACCOUNTS_STORAGE',
                'highlight' => 'stable',
                'options' => [
                    'file' => 'PLUGIN_ADMIN.FILE',
                    'folder' => 'PLUGIN_ADMIN.FOLDER'
                ],
                'name' => 'system.accounts.storage',
                'validation' => 'loose'
            ],
            'plugins.markdown-notices' => [
                'type' => '_root',
                'form_field' => false,
                'form' => [
                    'validation' => 'strict'
                ]
            ],
            'plugins' => [
                'type' => '_parent',
                'name' => 'plugins',
                'form_field' => false
            ],
            'plugins.markdown-notices.enabled' => [
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
                ],
                'name' => 'plugins.markdown-notices.enabled',
                'validation' => 'strict'
            ],
            'plugins.markdown-notices.built_in_css' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_MARKDOWN_NOTICES.USE_BUILT_IN_CSS',
                'highlight' => 1,
                'default' => 1,
                'options' => [
                    1 => 'PLUGIN_ADMIN.ENABLED',
                    0 => 'PLUGIN_ADMIN.DISABLED'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'plugins.markdown-notices.built_in_css',
                'validation' => 'strict'
            ],
            'plugins.markdown-notices.base_classes' => [
                'type' => 'selectize',
                'label' => 'PLUGIN_MARKDOWN_NOTICES.BASE_CLASSES',
                'size' => 'large',
                'classes' => 'fancy',
                'validate' => [
                    'type' => 'string'
                ],
                'name' => 'plugins.markdown-notices.base_classes',
                'validation' => 'strict'
            ],
            'plugins.markdown-notices.level_classes' => [
                'type' => 'selectize',
                'label' => 'PLUGIN_MARKDOWN_NOTICES.LEVEL_CLASSES',
                'size' => 'large',
                'classes' => 'fancy',
                'validate' => [
                    'type' => 'commalist'
                ],
                'name' => 'plugins.markdown-notices.level_classes',
                'validation' => 'strict'
            ],
            'plugins.form' => [
                'type' => '_root',
                'form_field' => false,
                'form' => [
                    'validation' => 'strict'
                ]
            ],
            'plugins.form.enabled' => [
                'type' => 'hidden',
                'label' => 'PLUGIN_ADMIN.PLUGIN_STATUS',
                'highlight' => 1,
                'default' => 0,
                'options' => [
                    1 => 'PLUGIN_ADMIN.ENABLED',
                    0 => 'PLUGIN_ADMIN.DISABLED'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'plugins.form.enabled',
                'validation' => 'strict'
            ],
            'plugins.form.built_in_css' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_FORM.USE_BUILT_IN_CSS',
                'highlight' => 1,
                'default' => 1,
                'options' => [
                    1 => 'PLUGIN_ADMIN.ENABLED',
                    0 => 'PLUGIN_ADMIN.DISABLED'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'plugins.form.built_in_css',
                'validation' => 'strict'
            ],
            'plugins.form.inline_css' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_FORM.USE_INLINE_CSS',
                'highlight' => 1,
                'default' => 1,
                'options' => [
                    1 => 'PLUGIN_ADMIN.ENABLED',
                    0 => 'PLUGIN_ADMIN.DISABLED'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'plugins.form.inline_css',
                'validation' => 'strict'
            ],
            'plugins.form.refresh_prevention' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_FORM.REFRESH_PREVENTION',
                'highlight' => 1,
                'default' => 0,
                'options' => [
                    1 => 'PLUGIN_ADMIN.ENABLED',
                    0 => 'PLUGIN_ADMIN.DISABLED'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'plugins.form.refresh_prevention',
                'validation' => 'strict'
            ],
            'plugins.form.client_side_validation' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_FORM.CLIENT_SIDE_VALIDATION',
                'highlight' => 1,
                'default' => 1,
                'options' => [
                    1 => 'PLUGIN_ADMIN.ENABLED',
                    0 => 'PLUGIN_ADMIN.DISABLED'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'plugins.form.client_side_validation',
                'validation' => 'strict'
            ],
            'plugins.form.inline_errors' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_FORM.INLINE_ERRORS',
                'highlight' => 0,
                'default' => 0,
                'options' => [
                    1 => 'PLUGIN_ADMIN.ENABLED',
                    0 => 'PLUGIN_ADMIN.DISABLED'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'plugins.form.inline_errors',
                'validation' => 'strict'
            ],
            'plugins.form.files' => [
                'type' => '_parent',
                'name' => 'plugins.form.files',
                'form_field' => false
            ],
            'plugins.form.files.multiple' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_FORM.ALLOW_MULTIPLE',
                'highlight' => 1,
                'default' => 0,
                'options' => [
                    1 => 'PLUGIN_ADMIN.ENABLED',
                    0 => 'PLUGIN_ADMIN.DISABLED'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'plugins.form.files.multiple',
                'validation' => 'strict'
            ],
            'plugins.form.files.limit' => [
                'type' => 'text',
                'size' => 'x-small',
                'label' => 'PLUGIN_FORM.LIMIT',
                'default' => 10,
                'validate' => [
                    'type' => 'number',
                    'min' => 1
                ],
                'name' => 'plugins.form.files.limit',
                'validation' => 'strict'
            ],
            'plugins.form.files.destination' => [
                'type' => 'text',
                'size' => 'large',
                'label' => 'PLUGIN_FORM.DESTINATION',
                'default' => '@self',
                'name' => 'plugins.form.files.destination',
                'validation' => 'strict'
            ],
            'plugins.form.files.accept' => [
                'type' => 'selectize',
                'size' => 'large',
                'label' => 'PLUGIN_FORM.ACCEPT',
                'classes' => 'fancy',
                'default' => [
                    0 => 'image/*'
                ],
                'validate' => [
                    'type' => 'commalist'
                ],
                'name' => 'plugins.form.files.accept',
                'validation' => 'strict'
            ],
            'plugins.form.files.filesize' => [
                'type' => 'text',
                'label' => 'PLUGIN_FORM.FILESIZE',
                'size' => 'x-small',
                'default' => 5,
                'validate' => [
                    'type' => 'number',
                    'min' => 0
                ],
                'name' => 'plugins.form.files.filesize',
                'validation' => 'strict'
            ],
            'plugins.form.files.avoid_overwriting' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_FORM.AVOID_OVERWRITING',
                'highlight' => 0,
                'default' => 0,
                'options' => [
                    1 => 'PLUGIN_ADMIN.ENABLED',
                    0 => 'PLUGIN_ADMIN.DISABLED'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'plugins.form.files.avoid_overwriting',
                'validation' => 'strict'
            ],
            'plugins.form.files.random_name' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_FORM.RANDOM_NAME',
                'highlight' => 0,
                'default' => 0,
                'options' => [
                    1 => 'PLUGIN_ADMIN.ENABLED',
                    0 => 'PLUGIN_ADMIN.DISABLED'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'plugins.form.files.random_name',
                'validation' => 'strict'
            ],
            'plugins.form.recaptcha' => [
                'type' => '_parent',
                'name' => 'plugins.form.recaptcha',
                'form_field' => false
            ],
            'plugins.form.recaptcha.version' => [
                'type' => 'select',
                'label' => 'PLUGIN_FORM.RECAPTCHA_VERSION',
                'default' => '2-checkbox',
                'options' => [
                    '2-checkbox' => 'PLUGIN_FORM.RECAPTCHA_VERSION_V2_CHECKBOX',
                    '2-invisible' => 'PLUGIN_FORM.RECAPTCHA_VERSION_V2_INVISIBLE',
                    3 => 'PLUGIN_FORM.RECAPTCHA_VERSION_V3_LATEST'
                ],
                'name' => 'plugins.form.recaptcha.version',
                'validation' => 'strict'
            ],
            'plugins.form.recaptcha.theme' => [
                'type' => 'select',
                'label' => 'PLUGIN_FORM.RECAPTCHA_THEME',
                'default' => 'light',
                'options' => [
                    'light' => 'PLUGIN_FORM.RECAPTCHA_THEME_LIGHT',
                    'dark' => 'PLUGIN_FORM.RECAPTCHA_THEME_DARK'
                ],
                'recaptcha.site_key' => NULL,
                'name' => 'plugins.form.recaptcha.theme',
                'validation' => 'strict'
            ],
            'plugins.form.recaptcha.site_key' => [
                'type' => 'text',
                'label' => 'PLUGIN_FORM.RECAPTCHA_SITE_KEY',
                'default' => '',
                'name' => 'plugins.form.recaptcha.site_key',
                'validation' => 'strict'
            ],
            'plugins.form.recaptcha.secret_key' => [
                'type' => 'text',
                'label' => 'PLUGIN_FORM.RECAPTCHA_SECRET_KEY',
                'default' => '',
                'name' => 'plugins.form.recaptcha.secret_key',
                'validation' => 'strict'
            ],
            'plugins.highlight' => [
                'type' => '_root',
                'form_field' => false,
                'form' => [
                    'validation' => 'strict'
                ]
            ],
            'plugins.highlight.enabled' => [
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
                ],
                'name' => 'plugins.highlight.enabled',
                'validation' => 'strict'
            ],
            'plugins.highlight.lines' => [
                'type' => 'toggle',
                'label' => 'Line Numbers',
                'highlight' => 1,
                'default' => 0,
                'options' => [
                    1 => 'PLUGIN_ADMIN.ENABLED',
                    0 => 'PLUGIN_ADMIN.DISABLED'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'plugins.highlight.lines',
                'validation' => 'strict'
            ],
            'plugins.highlight.theme' => [
                'type' => 'select',
                'label' => 'CSS Theme',
                'default' => 'default',
                'options' => [
                    'default' => 'Default',
                    'a11y-dark' => 'A11y Dark',
                    'a11y-light' => 'A11y Light',
                    'agate' => 'Agate',
                    'an-old-hope' => 'An Old Hope',
                    'androidstudio' => 'Android Studio',
                    'arduino-light' => 'Arduino Light',
                    'arta' => 'Arta',
                    'ascetic' => 'Ascetic',
                    'atelier-cave-dark' => 'Atelier Cave Dark',
                    'atelier-cave-light' => 'Atelier Cave Light',
                    'atelier-dune-dark' => 'Atelier Dune Dark',
                    'atelier-dune-light' => 'Atelier Dune Light',
                    'atelier-estuary-dark' => 'Atelier Estuary Dark',
                    'atelier-estuary-light' => 'Atelier Estuary Light',
                    'atelier-forest-dark' => 'Atelier Forest Dark',
                    'atelier-forest-light' => 'Atelier Forest Light',
                    'atelier-heath-dark' => 'Atelier Heath Dark',
                    'atelier-heath-light' => 'Atelier Heath Light',
                    'atelier-lakeside-dark' => 'Atelier Lakeside Dark',
                    'atelier-lakeside-light' => 'Atelier Lakeside Light',
                    'atelier-plateau-dark' => 'Atelier Plateau Dark',
                    'atelier-plateau-light' => 'Atelier Plateau Light',
                    'atelier-savanna-dark' => 'Atelier Savanna Dark',
                    'atelier-savanna-light' => 'Atelier Savanna Light',
                    'atelier-seaside-dark' => 'Atelier Seaside Dark',
                    'atelier-seaside-light' => 'Atelier Seaside Light',
                    'atelier-sulphurpool-dark' => 'Atelier Sulphurpool Dark',
                    'atelier-sulphurpool-light' => 'Atelier Sulphurpool Light',
                    'atom-one-dark' => 'Atom One Dark',
                    'atom-one-dark-reasonable' => 'Atom One Dark Reasonable',
                    'atom-one-light' => 'Atom One Light',
                    'brown-paper' => 'Brown Paper',
                    'codepen-embed' => 'Codepen Embed',
                    'color-brewer' => 'Color Brewer',
                    'darcula' => 'Darcula',
                    'dark' => 'Dark',
                    'docco' => 'Docco',
                    'dracula' => 'Dracula',
                    'far' => 'Far',
                    'foundation' => 'Foundation',
                    'github' => 'Github',
                    'github-gist' => 'Github Gist',
                    'gml' => 'GML',
                    'googlecode' => 'GoogleCode',
                    'gradient-dark' => 'Gradient Dark',
                    'gradient-light' => 'Gradient Light',
                    'grayscale' => 'Grayscale',
                    'gruvbox-dark' => 'Gruvbox Dark',
                    'gruvbox-light' => 'Gruvbox Light',
                    'hopscotch' => 'Hopscotch',
                    'hybrid' => 'Hybrid',
                    'idea' => 'Idea',
                    'ir-black' => 'IR-Black',
                    'isbl-editor-dark' => 'ISBL Editor Dark',
                    'isbl-editor-light' => 'ISBL Editor Light',
                    'kimbie.dark' => 'Kimbie Dark',
                    'kimbie.light' => 'Kimbie Light',
                    'learn' => 'Grav Learn',
                    'lightfair' => 'Lightfair',
                    'lioshi' => 'Lioshi',
                    'magula' => 'Magula',
                    'mono-blue' => 'Mono Blue',
                    'monokai' => 'Monokai',
                    'monokai-sublime' => 'Monokai Sublime',
                    'night-owl' => 'Night Owl',
                    'nnfx-dark' => 'NNFX Dark',
                    'nnfx' => 'NNFX',
                    'nord' => 'Nord',
                    'obsidian' => 'Obsidian',
                    'ocean' => 'Ocean',
                    'paraiso-dark' => 'Paraiso Dark',
                    'paraiso-light' => 'Paraiso Light',
                    'pojoaque' => 'Pojoaque',
                    'purebasic' => 'Purebasic',
                    'qtcreator_dark' => 'Qt Creator Dark',
                    'qtcreator_light' => 'Qt Creator Light',
                    'railscasts' => 'Railscasts',
                    'rainbow' => 'Rainbow',
                    'routeros' => 'Routeros',
                    'school-book' => 'School Book',
                    'shades-of-purple' => 'Shades Of Purple',
                    'solarized-dark' => 'Solarized Dark',
                    'solarized-light' => 'Solarized Light',
                    'srcery' => 'Srcery',
                    'stackoverflow-dark' => 'Stackoverflow Dark',
                    'stackoverflow-light' => 'Stackoverflow Light',
                    'sunburst' => 'Sunburst',
                    'tomorrow' => 'Tomorrow',
                    'tomorrow-night' => 'Tomorrow Night',
                    'tomorrow-night-blue' => 'Tomorrow Night Blue',
                    'tomorrow-night-bright' => 'Tomorrow Night Bright',
                    'tomorrow-night-eighties' => 'Tomorrow Night Eighties',
                    'vs' => 'Visual Studio',
                    'vs2015' => 'Visual Studio 2015',
                    'xcode' => 'XCode',
                    'xt256' => 'xt256',
                    'zenburn' => 'Zenburn'
                ],
                'name' => 'plugins.highlight.theme',
                'validation' => 'strict'
            ],
            'plugins.flex-objects' => [
                'type' => '_root',
                'form_field' => false,
                'form' => [
                    'validation' => 'loose'
                ]
            ],
            'plugins.flex-objects.enabled' => [
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
                ],
                'name' => 'plugins.flex-objects.enabled',
                'validation' => 'loose'
            ],
            'plugins.flex-objects.built_in_css' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_FLEX_OBJECTS.USE_BUILT_IN_CSS',
                'highlight' => 1,
                'default' => 1,
                'options' => [
                    1 => 'PLUGIN_ADMIN.ENABLED',
                    0 => 'PLUGIN_ADMIN.DISABLED'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'plugins.flex-objects.built_in_css',
                'validation' => 'loose'
            ],
            'plugins.flex-objects.extra_admin_twig_path' => [
                'type' => 'text',
                'label' => 'PLUGIN_FLEX_OBJECTS.EXTRA_ADMIN_TWIG_PATH',
                'validate' => [
                    'required' => true
                ],
                'name' => 'plugins.flex-objects.extra_admin_twig_path',
                'validation' => 'loose'
            ],
            'plugins.flex-objects.directories' => [
                'type' => 'flex-objects',
                'label' => 'PLUGIN_FLEX_OBJECTS.DIRECTORIES',
                'array' => true,
                'ignore_empty' => true,
                'validate' => [
                    'type' => 'array'
                ],
                'name' => 'plugins.flex-objects.directories',
                'validation' => 'loose'
            ],
            'plugins.admin' => [
                'type' => '_root',
                'form_field' => false,
                'form' => [
                    'validation' => 'loose'
                ]
            ],
            'plugins.admin.enabled' => [
                'type' => 'hidden',
                'label' => 'PLUGIN_ADMIN.PLUGIN_STATUS',
                'highlight' => 1,
                'default' => 0,
                'options' => [
                    1 => 'PLUGIN_ADMIN.ENABLED',
                    0 => 'PLUGIN_ADMIN.DISABLED'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'plugins.admin.enabled',
                'validation' => 'loose'
            ],
            'plugins.admin.cache_enabled' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.ADMIN_CACHING',
                'highlight' => 1,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'plugins.admin.cache_enabled',
                'validation' => 'loose'
            ],
            'plugins.admin.twofa_enabled' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_LOGIN.2FA_TITLE',
                'default' => 1,
                'highlight' => 1,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'plugins.admin.twofa_enabled',
                'validation' => 'loose'
            ],
            'plugins.admin.route' => [
                'type' => 'text',
                'label' => 'PLUGIN_ADMIN.ADMIN_PATH',
                'size' => 'medium',
                'name' => 'plugins.admin.route',
                'validation' => 'loose'
            ],
            'plugins.admin.logo_text' => [
                'type' => 'text',
                'label' => 'PLUGIN_ADMIN.LOGO_TEXT',
                'size' => 'medium',
                'name' => 'plugins.admin.logo_text',
                'validation' => 'loose'
            ],
            'plugins.admin.content_padding' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.CONTENT_PADDING',
                'highlight' => 1,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'plugins.admin.content_padding',
                'validation' => 'loose'
            ],
            'plugins.admin.body_classes' => [
                'type' => 'text',
                'label' => 'PLUGIN_ADMIN.BODY_CLASSES',
                'size' => 'medium',
                'name' => 'plugins.admin.body_classes',
                'validation' => 'loose'
            ],
            'plugins.admin.sidebar' => [
                'type' => '_parent',
                'name' => 'plugins.admin.sidebar',
                'form_field' => false
            ],
            'plugins.admin.sidebar.activate' => [
                'type' => 'select',
                'label' => 'PLUGIN_ADMIN.SIDEBAR_ACTIVATION',
                'size' => 'small',
                'default' => 'tab',
                'options' => [
                    'tab' => 'PLUGIN_ADMIN.SIDEBAR_ACTIVATION_TAB',
                    'hover' => 'PLUGIN_ADMIN.SIDEBAR_ACTIVATION_HOVER'
                ],
                'name' => 'plugins.admin.sidebar.activate',
                'validation' => 'loose'
            ],
            'plugins.admin.sidebar.hover_delay' => [
                'type' => 'text',
                'size' => 'x-small',
                'append' => 'PLUGIN_ADMIN.SIDEBAR_HOVER_DELAY_APPEND',
                'label' => 'PLUGIN_ADMIN.SIDEBAR_HOVER_DELAY',
                'default' => 500,
                'validate' => [
                    'type' => 'number',
                    'min' => 1
                ],
                'name' => 'plugins.admin.sidebar.hover_delay',
                'validation' => 'loose'
            ],
            'plugins.admin.sidebar.size' => [
                'type' => 'select',
                'label' => 'PLUGIN_ADMIN.SIDEBAR_SIZE',
                'size' => 'medium',
                'default' => 'auto',
                'options' => [
                    'auto' => 'PLUGIN_ADMIN.SIDEBAR_SIZE_AUTO',
                    'small' => 'PLUGIN_ADMIN.SIDEBAR_SIZE_SMALL'
                ],
                'name' => 'plugins.admin.sidebar.size',
                'validation' => 'loose'
            ],
            'plugins.admin.theme' => [
                'type' => 'hidden',
                'label' => 'PLUGIN_ADMIN.THEME',
                'default' => 'grav',
                'name' => 'plugins.admin.theme',
                'validation' => 'loose'
            ],
            'plugins.admin.edit_mode' => [
                'type' => 'select',
                'label' => 'PLUGIN_ADMIN.EDIT_MODE',
                'size' => 'small',
                'default' => 'normal',
                'options' => [
                    'normal' => 'PLUGIN_ADMIN.NORMAL',
                    'expert' => 'PLUGIN_ADMIN.EXPERT'
                ],
                'name' => 'plugins.admin.edit_mode',
                'validation' => 'loose'
            ],
            'plugins.admin.frontend_preview_target' => [
                'type' => 'select',
                'label' => 'PLUGIN_ADMIN.FRONTEND_PREVIEW_TARGET',
                'size' => 'medium',
                'default' => 'inline',
                'options' => [
                    'inline' => 'PLUGIN_ADMIN.FRONTEND_PREVIEW_TARGET_INLINE',
                    '_blank' => 'PLUGIN_ADMIN.FRONTEND_PREVIEW_TARGET_NEW',
                    '_self' => 'PLUGIN_ADMIN.FRONTEND_PREVIEW_TARGET_CURRENT'
                ],
                'name' => 'plugins.admin.frontend_preview_target',
                'validation' => 'loose'
            ],
            'plugins.admin.pages' => [
                'type' => '_parent',
                'name' => 'plugins.admin.pages',
                'form_field' => false
            ],
            'plugins.admin.pages.show_parents' => [
                'type' => 'select',
                'size' => 'medium',
                'label' => 'PLUGIN_ADMIN.PARENT_DROPDOWN',
                'highlight' => 1,
                'options' => [
                    'both' => 'PLUGIN_ADMIN.PARENT_DROPDOWN_BOTH',
                    'folder' => 'PLUGIN_ADMIN.PARENT_DROPDOWN_FOLDER',
                    'fullpath' => 'PLUGIN_ADMIN.PARENT_DROPDOWN_FULLPATH'
                ],
                'name' => 'plugins.admin.pages.show_parents',
                'validation' => 'loose'
            ],
            'plugins.admin.pages.parents_levels' => [
                'type' => 'text',
                'label' => 'PLUGIN_ADMIN.PARENTS_LEVELS',
                'size' => 'small',
                'name' => 'plugins.admin.pages.parents_levels',
                'validation' => 'loose'
            ],
            'plugins.admin.pages.show_modular' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.MODULAR_PARENTS',
                'highlight' => 1,
                'default' => 1,
                'options' => [
                    1 => 'PLUGIN_ADMIN.ENABLED',
                    0 => 'PLUGIN_ADMIN.DISABLED'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'plugins.admin.pages.show_modular',
                'validation' => 'loose'
            ],
            'plugins.admin.show_beta_msg' => [
                'type' => 'hidden',
                'name' => 'plugins.admin.show_beta_msg',
                'validation' => 'loose'
            ],
            'plugins.admin.show_github_msg' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.SHOW_GITHUB_LINK',
                'highlight' => 1,
                'default' => 1,
                'options' => [
                    1 => 'PLUGIN_ADMIN.ENABLED',
                    0 => 'PLUGIN_ADMIN.DISABLED'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'plugins.admin.show_github_msg',
                'validation' => 'loose'
            ],
            'plugins.admin.pages_list_display_field' => [
                'type' => 'text',
                'size' => 'small',
                'label' => 'PLUGIN_ADMIN.PAGES_LIST_DISPLAY_FIELD',
                'name' => 'plugins.admin.pages_list_display_field',
                'validation' => 'loose'
            ],
            'plugins.admin.enable_auto_updates_check' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.AUTO_UPDATES',
                'highlight' => 1,
                'default' => 1,
                'options' => [
                    1 => 'PLUGIN_ADMIN.ENABLED',
                    0 => 'PLUGIN_ADMIN.DISABLED'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'plugins.admin.enable_auto_updates_check',
                'validation' => 'loose'
            ],
            'plugins.admin.session' => [
                'type' => '_parent',
                'name' => 'plugins.admin.session',
                'form_field' => false
            ],
            'plugins.admin.session.timeout' => [
                'type' => 'text',
                'size' => 'small',
                'label' => 'PLUGIN_ADMIN.TIMEOUT',
                'append' => 'GRAV.NICETIME.SECOND_PLURAL',
                'validate' => [
                    'type' => 'number',
                    'min' => 1
                ],
                'name' => 'plugins.admin.session.timeout',
                'validation' => 'loose'
            ],
            'plugins.admin.hide_page_types' => [
                'type' => 'select',
                'size' => 'large',
                'label' => 'PLUGIN_ADMIN.HIDE_PAGE_TYPES',
                'classes' => 'fancy',
                'multiple' => true,
                'array' => true,
                'selectize' => [
                    'create' => true
                ],
                'data-options@' => [
                    0 => '\\Grav\\Plugin\\AdminPlugin::pagesTypes',
                    1 => true
                ],
                'name' => 'plugins.admin.hide_page_types',
                'validation' => 'loose'
            ],
            'plugins.admin.hide_modular_page_types' => [
                'type' => 'select',
                'size' => 'large',
                'label' => 'PLUGIN_ADMIN.HIDE_MODULAR_PAGE_TYPES',
                'classes' => 'fancy',
                'multiple' => true,
                'array' => true,
                'selectize' => [
                    'create' => true
                ],
                'data-options@' => [
                    0 => '\\Grav\\Plugin\\AdminPlugin::pagesModularTypes',
                    1 => true
                ],
                'name' => 'plugins.admin.hide_modular_page_types',
                'validation' => 'loose'
            ],
            'plugins.admin.widgets_display' => [
                'type' => 'widgets',
                'label' => 'PLUGIN_ADMIN.WIDGETS_DISPLAY',
                'validate' => [
                    'type' => 'array'
                ],
                'name' => 'plugins.admin.widgets_display',
                'validation' => 'loose'
            ],
            'plugins.admin.notifications' => [
                'type' => '_parent',
                'name' => 'plugins.admin.notifications',
                'form_field' => false
            ],
            'plugins.admin.notifications.feed' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.FEED_NOTIFICATIONS',
                'highlight' => 1,
                'default' => 1,
                'options' => [
                    1 => 'PLUGIN_ADMIN.ENABLED',
                    0 => 'PLUGIN_ADMIN.DISABLED'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'plugins.admin.notifications.feed',
                'validation' => 'loose'
            ],
            'plugins.admin.notifications.dashboard' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.DASHBOARD_NOTIFICATIONS',
                'highlight' => 1,
                'default' => 1,
                'options' => [
                    1 => 'PLUGIN_ADMIN.ENABLED',
                    0 => 'PLUGIN_ADMIN.DISABLED'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'plugins.admin.notifications.dashboard',
                'validation' => 'loose'
            ],
            'plugins.admin.notifications.plugins' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.PLUGINS_NOTIFICATIONS',
                'highlight' => 1,
                'default' => 1,
                'options' => [
                    1 => 'PLUGIN_ADMIN.ENABLED',
                    0 => 'PLUGIN_ADMIN.DISABLED'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'plugins.admin.notifications.plugins',
                'validation' => 'loose'
            ],
            'plugins.admin.notifications.themes' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.THEMES_NOTIFICATIONS',
                'highlight' => 1,
                'default' => 1,
                'options' => [
                    1 => 'PLUGIN_ADMIN.ENABLED',
                    0 => 'PLUGIN_ADMIN.DISABLED'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'plugins.admin.notifications.themes',
                'validation' => 'loose'
            ],
            'plugins.admin.whitelabel' => [
                'type' => '_parent',
                'name' => 'plugins.admin.whitelabel',
                'form_field' => false
            ],
            'plugins.admin.whitelabel.logo_login' => [
                'array' => true,
                'media_field' => true,
                'validate' => [
                    'type' => 'ignore'
                ],
                'type' => 'file',
                'label' => 'PLUGIN_ADMIN.LOGIN_SCREEN_CUSTOM_LOGO_LABEL',
                'destination' => 'user://assets',
                'accept' => [
                    0 => 'image/*'
                ],
                'name' => 'plugins.admin.whitelabel.logo_login',
                'validation' => 'loose'
            ],
            'plugins.admin.whitelabel.logo_custom' => [
                'array' => true,
                'media_field' => true,
                'validate' => [
                    'type' => 'ignore'
                ],
                'type' => 'file',
                'label' => 'PLUGIN_ADMIN.TOP_LEFT_CUSTOM_LOGO_LABEL',
                'destination' => 'user://assets',
                'accept' => [
                    0 => 'image/*'
                ],
                'name' => 'plugins.admin.whitelabel.logo_custom',
                'validation' => 'loose'
            ],
            'plugins.admin.whitelabel.codemirror_theme' => [
                'type' => 'select',
                'label' => 'PLUGIN_ADMIN.CODEMIRROR_THEME',
                'default' => 'paper',
                'markdown' => true,
                'data-options@' => '\\Grav\\Plugin\\AdminPlugin::themeOptions',
                'description' => 'PLUGIN_ADMIN.CODEMIRROR_THEME_DESC',
                'name' => 'plugins.admin.whitelabel.codemirror_theme',
                'validation' => 'loose'
            ],
            'plugins.admin.whitelabel.codemirror_fontsize' => [
                'type' => 'select',
                'label' => 'PLUGIN_ADMIN.CODEMIRROR_FONTSIZE',
                'default' => 'md',
                'options' => [
                    'sm' => 'PLUGIN_ADMIN.CODEMIRROR_FONTSIZE_SM',
                    'md' => 'PLUGIN_ADMIN.CODEMIRROR_FONTSIZE_MD',
                    'lg' => 'PLUGIN_ADMIN.CODEMIRROR_FONTSIZE_LG'
                ],
                'name' => 'plugins.admin.whitelabel.codemirror_fontsize',
                'validation' => 'loose'
            ],
            'plugins.admin.whitelabel.codemirror_md_font' => [
                'type' => 'select',
                'label' => 'PLUGIN_ADMIN.CODEMIRROR_MD_FONT',
                'default' => 'sans',
                'options' => [
                    'sans' => 'PLUGIN_ADMIN.CODEMIRROR_MD_FONT_SANS',
                    'mono' => 'PLUGIN_ADMIN.CODEMIRROR_MD_FONT_MONO'
                ],
                'name' => 'plugins.admin.whitelabel.codemirror_md_font',
                'validation' => 'loose'
            ],
            'plugins.admin.whitelabel.quicktray_recompile' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.QUICKTRAY_RECOMPILE',
                'highlight' => 0,
                'default' => 0,
                'options' => [
                    1 => 'PLUGIN_ADMIN.ENABLED',
                    0 => 'PLUGIN_ADMIN.DISABLED'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'plugins.admin.whitelabel.quicktray_recompile',
                'validation' => 'loose'
            ],
            'plugins.admin.whitelabel.color_scheme' => [
                'type' => '_parent',
                'name' => 'plugins.admin.whitelabel.color_scheme',
                'form_field' => false
            ],
            'plugins.admin.whitelabel.color_scheme.name' => [
                'type' => 'text',
                'label' => 'PLUGIN_ADMIN.COLOR_SCHEME_NAME',
                'name' => 'plugins.admin.whitelabel.color_scheme.name',
                'validation' => 'loose'
            ],
            'plugins.admin.themes-preview' => [
                'type' => 'themepreview',
                'ignore' => 'true;',
                'label' => 'PLUGIN_ADMIN.PRESETS',
                'style' => 'vertical',
                'name' => 'plugins.admin.themes-preview',
                'validation' => 'loose'
            ],
            'plugins.admin.whitelabel.color_scheme.colors' => [
                'type' => '_parent',
                'name' => 'plugins.admin.whitelabel.color_scheme.colors',
                'form_field' => false
            ],
            'plugins.admin.whitelabel.color_scheme.colors.logo-bg' => [
                'type' => 'colorscheme.color',
                'default' => '#1e333e',
                'name' => 'plugins.admin.whitelabel.color_scheme.colors.logo-bg',
                'validation' => 'loose'
            ],
            'plugins.admin.whitelabel.color_scheme.colors.logo-link' => [
                'type' => 'colorscheme.color',
                'default' => '#ffffff',
                'name' => 'plugins.admin.whitelabel.color_scheme.colors.logo-link',
                'validation' => 'loose'
            ],
            'plugins.admin.whitelabel.color_scheme.colors.nav-bg' => [
                'type' => 'colorscheme.color',
                'default' => '#253a47',
                'name' => 'plugins.admin.whitelabel.color_scheme.colors.nav-bg',
                'validation' => 'loose'
            ],
            'plugins.admin.whitelabel.color_scheme.colors.nav-text' => [
                'type' => 'colorscheme.color',
                'default' => '#afc7d5',
                'name' => 'plugins.admin.whitelabel.color_scheme.colors.nav-text',
                'validation' => 'loose'
            ],
            'plugins.admin.whitelabel.color_scheme.colors.nav-link' => [
                'type' => 'colorscheme.color',
                'default' => '#d1dee7',
                'name' => 'plugins.admin.whitelabel.color_scheme.colors.nav-link',
                'validation' => 'loose'
            ],
            'plugins.admin.whitelabel.color_scheme.colors.nav-selected-bg' => [
                'type' => 'colorscheme.color',
                'default' => '#2d4d5b',
                'name' => 'plugins.admin.whitelabel.color_scheme.colors.nav-selected-bg',
                'validation' => 'loose'
            ],
            'plugins.admin.whitelabel.color_scheme.colors.nav-selected-link' => [
                'type' => 'colorscheme.color',
                'default' => '#ffffff',
                'name' => 'plugins.admin.whitelabel.color_scheme.colors.nav-selected-link',
                'validation' => 'loose'
            ],
            'plugins.admin.whitelabel.color_scheme.colors.nav-hover-bg' => [
                'type' => 'colorscheme.color',
                'default' => '#1e333e',
                'name' => 'plugins.admin.whitelabel.color_scheme.colors.nav-hover-bg',
                'validation' => 'loose'
            ],
            'plugins.admin.whitelabel.color_scheme.colors.nav-hover-link' => [
                'type' => 'colorscheme.color',
                'default' => '#ffffff',
                'name' => 'plugins.admin.whitelabel.color_scheme.colors.nav-hover-link',
                'validation' => 'loose'
            ],
            'plugins.admin.whitelabel.color_scheme.colors.toolbar-bg' => [
                'type' => 'colorscheme.color',
                'default' => '#349886',
                'name' => 'plugins.admin.whitelabel.color_scheme.colors.toolbar-bg',
                'validation' => 'loose'
            ],
            'plugins.admin.whitelabel.color_scheme.colors.toolbar-text' => [
                'type' => 'colorscheme.color',
                'default' => '#ffffff',
                'name' => 'plugins.admin.whitelabel.color_scheme.colors.toolbar-text',
                'validation' => 'loose'
            ],
            'plugins.admin.whitelabel.color_scheme.colors.page-bg' => [
                'type' => 'colorscheme.color',
                'default' => '#314d5b',
                'name' => 'plugins.admin.whitelabel.color_scheme.colors.page-bg',
                'validation' => 'loose'
            ],
            'plugins.admin.whitelabel.color_scheme.colors.page-text' => [
                'type' => 'colorscheme.color',
                'default' => '#81a5b5',
                'name' => 'plugins.admin.whitelabel.color_scheme.colors.page-text',
                'validation' => 'loose'
            ],
            'plugins.admin.whitelabel.color_scheme.colors.page-link' => [
                'type' => 'colorscheme.color',
                'default' => '#aad9ed',
                'name' => 'plugins.admin.whitelabel.color_scheme.colors.page-link',
                'validation' => 'loose'
            ],
            'plugins.admin.whitelabel.color_scheme.colors.content-bg' => [
                'type' => 'colorscheme.color',
                'default' => '#eeeeee',
                'name' => 'plugins.admin.whitelabel.color_scheme.colors.content-bg',
                'validation' => 'loose'
            ],
            'plugins.admin.whitelabel.color_scheme.colors.content-text' => [
                'type' => 'colorscheme.color',
                'default' => '#737c81',
                'name' => 'plugins.admin.whitelabel.color_scheme.colors.content-text',
                'validation' => 'loose'
            ],
            'plugins.admin.whitelabel.color_scheme.colors.content-link' => [
                'type' => 'colorscheme.color',
                'default' => '#0082ba',
                'name' => 'plugins.admin.whitelabel.color_scheme.colors.content-link',
                'validation' => 'loose'
            ],
            'plugins.admin.whitelabel.color_scheme.colors.content-link2' => [
                'type' => 'colorscheme.color',
                'default' => '#da4b46',
                'name' => 'plugins.admin.whitelabel.color_scheme.colors.content-link2',
                'validation' => 'loose'
            ],
            'plugins.admin.whitelabel.color_scheme.colors.content-header' => [
                'type' => 'colorscheme.color',
                'default' => '#314d5b',
                'name' => 'plugins.admin.whitelabel.color_scheme.colors.content-header',
                'validation' => 'loose'
            ],
            'plugins.admin.whitelabel.color_scheme.colors.content-tabs-bg' => [
                'type' => 'colorscheme.color',
                'default' => '#223a47',
                'name' => 'plugins.admin.whitelabel.color_scheme.colors.content-tabs-bg',
                'validation' => 'loose'
            ],
            'plugins.admin.whitelabel.color_scheme.colors.content-tabs-text' => [
                'type' => 'colorscheme.color',
                'default' => '#d1dee7',
                'name' => 'plugins.admin.whitelabel.color_scheme.colors.content-tabs-text',
                'validation' => 'loose'
            ],
            'plugins.admin.whitelabel.color_scheme.colors.button-bg' => [
                'type' => 'colorscheme.color',
                'default' => '#41bea8',
                'name' => 'plugins.admin.whitelabel.color_scheme.colors.button-bg',
                'validation' => 'loose'
            ],
            'plugins.admin.whitelabel.color_scheme.colors.button-text' => [
                'type' => 'colorscheme.color',
                'default' => '#ffffff',
                'name' => 'plugins.admin.whitelabel.color_scheme.colors.button-text',
                'validation' => 'loose'
            ],
            'plugins.admin.whitelabel.color_scheme.colors.notice-bg' => [
                'type' => 'colorscheme.color',
                'default' => '#00a6cf',
                'name' => 'plugins.admin.whitelabel.color_scheme.colors.notice-bg',
                'validation' => 'loose'
            ],
            'plugins.admin.whitelabel.color_scheme.colors.notice-text' => [
                'type' => 'colorscheme.color',
                'default' => '#ffffff',
                'name' => 'plugins.admin.whitelabel.color_scheme.colors.notice-text',
                'validation' => 'loose'
            ],
            'plugins.admin.whitelabel.color_scheme.colors.update-bg' => [
                'type' => 'colorscheme.color',
                'default' => '#8f5aad',
                'name' => 'plugins.admin.whitelabel.color_scheme.colors.update-bg',
                'validation' => 'loose'
            ],
            'plugins.admin.whitelabel.color_scheme.colors.update-text' => [
                'type' => 'colorscheme.color',
                'default' => '#ffffff',
                'name' => 'plugins.admin.whitelabel.color_scheme.colors.update-text',
                'validation' => 'loose'
            ],
            'plugins.admin.whitelabel.color_scheme.colors.critical-bg' => [
                'type' => 'colorscheme.color',
                'default' => '#da4b46',
                'name' => 'plugins.admin.whitelabel.color_scheme.colors.critical-bg',
                'validation' => 'loose'
            ],
            'plugins.admin.whitelabel.color_scheme.colors.critical-text' => [
                'type' => 'colorscheme.color',
                'default' => '#ffffff',
                'name' => 'plugins.admin.whitelabel.color_scheme.colors.critical-text',
                'validation' => 'loose'
            ],
            'plugins.admin.colorschemes' => [
                'type' => 'colorscheme',
                'label' => 'PLUGIN_ADMIN.COLOR_SCHEME_LABEL',
                'style' => 'vertical',
                'name' => 'plugins.admin.colorschemes',
                'validation' => 'loose'
            ],
            'plugins.admin.whitelabel.color_scheme.accents' => [
                'type' => '_parent',
                'name' => 'plugins.admin.whitelabel.color_scheme.accents',
                'form_field' => false
            ],
            'plugins.admin.whitelabel.color_scheme.accents.primary-accent' => [
                'type' => 'select',
                'size' => 'meidum',
                'classes' => 'fancy',
                'label' => 'PLUGIN_ADMIN.PRIMARY_ACCENT_LABEL',
                'options' => [
                    'button' => 'PLUGIN_ADMIN.BUTTON_COLORS',
                    'content' => 'PLUGIN_ADMIN.CONTENT_COLORS',
                    'tabs' => 'PLUGIN_ADMIN.TABS_COLORS',
                    'critical' => 'PLUGIN_ADMIN.CRITICAL_COLORS',
                    'logo' => 'PLUGIN_ADMIN.LOGO_COLORS',
                    'nav' => 'PLUGIN_ADMIN.NAV_COLORS',
                    'notice' => 'PLUGIN_ADMIN.NOTICE_COLORS',
                    'page' => 'PLUGIN_ADMIN.PAGE_COLORS',
                    'toolbar' => 'PLUGIN_ADMIN.TOOLBAR_COLORS',
                    'update' => 'PLUGIN_ADMIN.UPDATE_COLORS'
                ],
                'name' => 'plugins.admin.whitelabel.color_scheme.accents.primary-accent',
                'validation' => 'loose'
            ],
            'plugins.admin.whitelabel.color_scheme.accents.secondary-accent' => [
                'type' => 'select',
                'size' => 'meidum',
                'classes' => 'fancy',
                'label' => 'PLUGIN_ADMIN.SECONDARY_ACCENT_LABEL',
                'options' => [
                    'button' => 'PLUGIN_ADMIN.BUTTON_COLORS',
                    'content' => 'PLUGIN_ADMIN.CONTENT_COLORS',
                    'tabs' => 'PLUGIN_ADMIN.TABS_COLORS',
                    'critical' => 'PLUGIN_ADMIN.CRITICAL_COLORS',
                    'logo' => 'PLUGIN_ADMIN.LOGO_COLORS',
                    'nav' => 'PLUGIN_ADMIN.NAV_COLORS',
                    'notice' => 'PLUGIN_ADMIN.NOTICE_COLORS',
                    'page' => 'PLUGIN_ADMIN.PAGE_COLORS',
                    'toolbar' => 'PLUGIN_ADMIN.TOOLBAR_COLORS',
                    'update' => 'PLUGIN_ADMIN.UPDATE_COLORS'
                ],
                'name' => 'plugins.admin.whitelabel.color_scheme.accents.secondary-accent',
                'validation' => 'loose'
            ],
            'plugins.admin.whitelabel.color_scheme.accents.tertiary-accent' => [
                'type' => 'select',
                'size' => 'meidum',
                'classes' => 'fancy',
                'label' => 'PLUGIN_ADMIN.TERTIARY_ACCENT_LABEL',
                'options' => [
                    'button' => 'PLUGIN_ADMIN.BUTTON_COLORS',
                    'content' => 'PLUGIN_ADMIN.CONTENT_COLORS',
                    'tabs' => 'PLUGIN_ADMIN.TABS_COLORS',
                    'critical' => 'PLUGIN_ADMIN.CRITICAL_COLORS',
                    'logo' => 'PLUGIN_ADMIN.LOGO_COLORS',
                    'nav' => 'PLUGIN_ADMIN.NAV_COLORS',
                    'notice' => 'PLUGIN_ADMIN.NOTICE_COLORS',
                    'page' => 'PLUGIN_ADMIN.PAGE_COLORS',
                    'toolbar' => 'PLUGIN_ADMIN.TOOLBAR_COLORS',
                    'update' => 'PLUGIN_ADMIN.UPDATE_COLORS'
                ],
                'name' => 'plugins.admin.whitelabel.color_scheme.accents.tertiary-accent',
                'validation' => 'loose'
            ],
            'plugins.admin.whitelabel.custom_footer' => [
                'type' => 'textarea',
                'rows' => 2,
                'label' => 'PLUGIN_ADMIN.CUSTOM_FOOTER',
                'name' => 'plugins.admin.whitelabel.custom_footer',
                'validation' => 'loose'
            ],
            'plugins.admin.whitelabel.custom_css' => [
                'label' => 'PLUGIN_ADMIN.CUSTOM_CSS_LABEL',
                'type' => 'editor',
                'codemirror' => [
                    'mode' => 'css',
                    'indentUnit' => 2,
                    'autofocus' => true,
                    'indentWithTabs' => true,
                    'lineNumbers' => true,
                    'styleActiveLine' => true
                ],
                'name' => 'plugins.admin.whitelabel.custom_css',
                'validation' => 'loose'
            ],
            'plugins.admin.whitelabel.custom_presets' => [
                'label' => 'PLUGIN_ADMIN.CUSTOM_PRESETS',
                'type' => 'editor',
                'codemirror' => [
                    'mode' => 'yaml',
                    'indentUnit' => 2,
                    'autofocus' => true,
                    'indentWithTabs' => false,
                    'lineNumbers' => true,
                    'styleActiveLine' => true,
                    'gutters' => [
                        0 => 'CodeMirror-lint-markers'
                    ],
                    'lint' => true
                ],
                'name' => 'plugins.admin.whitelabel.custom_presets',
                'validation' => 'loose'
            ],
            'plugins.admin.popularity' => [
                'type' => '_parent',
                'name' => 'plugins.admin.popularity',
                'form_field' => false
            ],
            'plugins.admin.popularity.enabled' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.VISITOR_TRACKING',
                'highlight' => 1,
                'default' => 1,
                'options' => [
                    1 => 'PLUGIN_ADMIN.ENABLED',
                    0 => 'PLUGIN_ADMIN.DISABLED'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'plugins.admin.popularity.enabled',
                'validation' => 'loose'
            ],
            'plugins.admin.dashboard' => [
                'type' => '_parent',
                'name' => 'plugins.admin.dashboard',
                'form_field' => false
            ],
            'plugins.admin.dashboard.days_of_stats' => [
                'type' => 'text',
                'label' => 'PLUGIN_ADMIN.DAYS_OF_STATS',
                'append' => 'days',
                'size' => 'x-small',
                'default' => 7,
                'validate' => [
                    'type' => 'int'
                ],
                'name' => 'plugins.admin.dashboard.days_of_stats',
                'validation' => 'loose'
            ],
            'plugins.admin.popularity.ignore' => [
                'type' => 'array',
                'label' => 'PLUGIN_ADMIN.IGNORE_URLS',
                'size' => 'large',
                'default' => [
                    0 => '/test*',
                    1 => '/modular'
                ],
                'value_only' => true,
                'name' => 'plugins.admin.popularity.ignore',
                'validation' => 'loose'
            ],
            'plugins.admin.popularity.history' => [
                'type' => '_parent',
                'name' => 'plugins.admin.popularity.history',
                'form_field' => false
            ],
            'plugins.admin.popularity.history.daily' => [
                'type' => 'hidden',
                'label' => 'PLUGIN_ADMIN.DAILY_HISTORY',
                'default' => 30,
                'name' => 'plugins.admin.popularity.history.daily',
                'validation' => 'loose'
            ],
            'plugins.admin.popularity.history.monthly' => [
                'type' => 'hidden',
                'label' => 'PLUGIN_ADMIN.MONTHLY_HISTORY',
                'default' => 12,
                'name' => 'plugins.admin.popularity.history.monthly',
                'validation' => 'loose'
            ],
            'plugins.admin.popularity.history.visitors' => [
                'type' => 'hidden',
                'label' => 'PLUGIN_ADMIN.VISITORS_HISTORY',
                'default' => 20,
                'name' => 'plugins.admin.popularity.history.visitors',
                'validation' => 'loose'
            ],
            'plugins.admin.pagemedia' => [
                'type' => '_parent',
                'name' => 'plugins.admin.pagemedia',
                'form_field' => false
            ],
            'plugins.admin.pagemedia.resize_width' => [
                'type' => 'number',
                'size' => 'x-small',
                'append' => 'PLUGIN_ADMIN.PIXELS',
                'label' => 'PLUGIN_ADMIN.RESIZE_WIDTH',
                'default' => 0,
                'validate' => [
                    'type' => 'number'
                ],
                'name' => 'plugins.admin.pagemedia.resize_width',
                'validation' => 'loose'
            ],
            'plugins.admin.pagemedia.resize_height' => [
                'type' => 'number',
                'size' => 'x-small',
                'append' => 'PLUGIN_ADMIN.PIXELS',
                'label' => 'PLUGIN_ADMIN.RESIZE_HEIGHT',
                'default' => 0,
                'validate' => [
                    'type' => 'number'
                ],
                'name' => 'plugins.admin.pagemedia.resize_height',
                'validation' => 'loose'
            ],
            'plugins.admin.pagemedia.res_min_width' => [
                'type' => 'number',
                'size' => 'x-small',
                'append' => 'PLUGIN_ADMIN.PIXELS',
                'label' => 'PLUGIN_ADMIN.RES_MIN_WIDTH',
                'default' => 0,
                'validate' => [
                    'type' => 'number'
                ],
                'name' => 'plugins.admin.pagemedia.res_min_width',
                'validation' => 'loose'
            ],
            'plugins.admin.pagemedia.res_min_height' => [
                'type' => 'number',
                'size' => 'x-small',
                'append' => 'PLUGIN_ADMIN.PIXELS',
                'label' => 'PLUGIN_ADMIN.RES_MIN_HEIGHT',
                'default' => 0,
                'validate' => [
                    'type' => 'number'
                ],
                'name' => 'plugins.admin.pagemedia.res_min_height',
                'validation' => 'loose'
            ],
            'plugins.admin.pagemedia.res_max_width' => [
                'type' => 'number',
                'size' => 'x-small',
                'append' => 'PLUGIN_ADMIN.PIXELS',
                'label' => 'PLUGIN_ADMIN.RES_MAX_WIDTH',
                'default' => 0,
                'validate' => [
                    'type' => 'number'
                ],
                'name' => 'plugins.admin.pagemedia.res_max_width',
                'validation' => 'loose'
            ],
            'plugins.admin.pagemedia.res_max_height' => [
                'type' => 'number',
                'size' => 'x-small',
                'append' => 'PLUGIN_ADMIN.PIXELS',
                'label' => 'PLUGIN_ADMIN.RES_MAX_HEIGHT',
                'default' => 0,
                'validate' => [
                    'type' => 'number'
                ],
                'name' => 'plugins.admin.pagemedia.res_max_height',
                'validation' => 'loose'
            ],
            'plugins.admin.pagemedia.resize_quality' => [
                'type' => 'number',
                'size' => 'x-small',
                'append' => '0...1',
                'label' => 'PLUGIN_ADMIN.RESIZE_QUALITY',
                'default' => 0.8,
                'validate' => [
                    'type' => 'number',
                    'step' => 0.01
                ],
                'name' => 'plugins.admin.pagemedia.resize_quality',
                'validation' => 'loose'
            ],
            'plugins.problems' => [
                'type' => '_root',
                'form_field' => false,
                'form' => [
                    'validation' => 'strict'
                ]
            ],
            'plugins.problems.enabled' => [
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
                ],
                'name' => 'plugins.problems.enabled',
                'validation' => 'strict'
            ],
            'plugins.problems.built_in_css' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_PROBLEMS.BUILTIN_CSS',
                'highlight' => 1,
                'default' => 1,
                'options' => [
                    1 => 'PLUGIN_ADMIN.ENABLED',
                    0 => 'PLUGIN_ADMIN.DISABLED'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'plugins.problems.built_in_css',
                'validation' => 'strict'
            ],
            'plugins.backtotop' => [
                'type' => '_root',
                'form_field' => false,
                'form' => [
                    'validation' => 'strict'
                ]
            ],
            'plugins.backtotop.enabled' => [
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
                ],
                'name' => 'plugins.backtotop.enabled',
                'validation' => 'strict'
            ],
            'plugins.backtotop.fontawesome_icons' => [
                'type' => 'toggle',
                'label' => 'Icons mode',
                'highlight' => 1,
                'default' => 1,
                'options' => [
                    1 => 'FontAwesome',
                    0 => 'SVG'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'plugins.backtotop.fontawesome_icons',
                'validation' => 'strict'
            ],
            'plugins.backtotop.fontawesome_css' => [
                'type' => 'toggle',
                'label' => 'Include FontAwesome Files',
                'highlight' => 0,
                'default' => 1,
                'options' => [
                    1 => 'PLUGIN_ADMIN.ENABLED',
                    0 => 'PLUGIN_ADMIN.DISABLED'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'plugins.backtotop.fontawesome_css',
                'validation' => 'strict'
            ],
            'plugins.prism-highlight' => [
                'type' => '_root',
                'form_field' => false,
                'form' => [
                    'validation' => 'strict'
                ]
            ],
            'plugins.prism-highlight.enabled' => [
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
                ],
                'name' => 'plugins.prism-highlight.enabled',
                'validation' => 'strict'
            ],
            'plugins.prism-highlight.theme' => [
                'type' => 'select',
                'label' => 'CSS Theme',
                'default' => 'prism-base16-ocean.dark.css',
                'size' => 'large',
                'data-options@' => '\\Grav\\Plugin\\PrismHighlightPlugin::themeOptions',
                'name' => 'plugins.prism-highlight.theme',
                'validation' => 'strict'
            ],
            'plugins.prism-highlight.all-pre-blocks' => [
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
                ],
                'name' => 'plugins.prism-highlight.all-pre-blocks',
                'validation' => 'strict'
            ],
            'plugins.prism-highlight.plugins' => [
                'type' => '_parent',
                'name' => 'plugins.prism-highlight.plugins',
                'form_field' => false
            ],
            'plugins.prism-highlight.plugins.line-numbers' => [
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
                ],
                'name' => 'plugins.prism-highlight.plugins.line-numbers',
                'validation' => 'strict'
            ],
            'plugins.prism-highlight.plugins.command-line' => [
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
                ],
                'name' => 'plugins.prism-highlight.plugins.command-line',
                'validation' => 'strict'
            ],
            'plugins.prism-highlight.plugins.command-line-prompt' => [
                'type' => 'text',
                'size' => 'small',
                'label' => 'Command Line Prompt',
                'name' => 'plugins.prism-highlight.plugins.command-line-prompt',
                'validation' => 'strict'
            ],
            'plugins.error' => [
                'type' => '_root',
                'form_field' => false,
                'form' => [
                    'validation' => 'strict'
                ]
            ],
            'plugins.error.enabled' => [
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
                ],
                'name' => 'plugins.error.enabled',
                'validation' => 'strict'
            ],
            'plugins.error.routes' => [
                'type' => '_parent',
                'name' => 'plugins.error.routes',
                'form_field' => false
            ],
            'plugins.error.routes.404' => [
                'type' => 'text',
                'size' => 'medium',
                'label' => 'PLUGIN_ERROR.ROUTE_404',
                'default' => '/error',
                'name' => 'plugins.error.routes.404',
                'validation' => 'strict'
            ],
            'plugins.login' => [
                'type' => '_root',
                'form_field' => false,
                'form' => [
                    'validation' => 'loose'
                ]
            ],
            'plugins.login.enabled' => [
                'type' => 'hidden',
                'label' => 'PLUGIN_LOGIN.PLUGIN_STATUS',
                'highlight' => 1,
                'default' => 1,
                'options' => [
                    1 => 'PLUGIN_ADMIN.ENABLED',
                    0 => 'PLUGIN_ADMIN.DISABLED'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'plugins.login.enabled',
                'validation' => 'loose'
            ],
            'plugins.login.built_in_css' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_LOGIN.BUILTIN_CSS',
                'highlight' => 1,
                'default' => 1,
                'options' => [
                    1 => 'PLUGIN_ADMIN.ENABLED',
                    0 => 'PLUGIN_ADMIN.DISABLED'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'plugins.login.built_in_css',
                'validation' => 'loose'
            ],
            'plugins.login.redirect_to_login' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_LOGIN.REDIRECT_TO_LOGIN',
                'default' => 0,
                'highlight' => 0,
                'options' => [
                    1 => 'PLUGIN_ADMIN.ENABLED',
                    0 => 'PLUGIN_ADMIN.DISABLED'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'plugins.login.redirect_to_login',
                'validation' => 'loose'
            ],
            'plugins.login.redirect_after_login' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_LOGIN.REDIRECT_AFTER_LOGIN',
                'force_bool' => true,
                'default' => 0,
                'highlight' => 0,
                'options' => [
                    1 => 'PLUGIN_ADMIN.ENABLED',
                    0 => 'PLUGIN_ADMIN.DISABLED'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'plugins.login.redirect_after_login',
                'validation' => 'loose'
            ],
            'plugins.login.redirect_after_logout' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_LOGIN.REDIRECT_AFTER_LOGOUT',
                'force_bool' => true,
                'default' => 1,
                'highlight' => 1,
                'options' => [
                    1 => 'PLUGIN_ADMIN.ENABLED',
                    0 => 'PLUGIN_ADMIN.DISABLED'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'plugins.login.redirect_after_logout',
                'validation' => 'loose'
            ],
            'plugins.login.parent_acl' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_LOGIN.USE_PARENT_ACL_LABEL',
                'highlight' => 0,
                'default' => 0,
                'options' => [
                    1 => 'PLUGIN_ADMIN.ENABLED',
                    0 => 'PLUGIN_ADMIN.DISABLED'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'plugins.login.parent_acl',
                'validation' => 'loose'
            ],
            'plugins.login.dynamic_page_visibility' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_LOGIN.DYNAMIC_VISIBILITY',
                'highlight' => 0,
                'default' => 0,
                'options' => [
                    1 => 'PLUGIN_ADMIN.ENABLED',
                    0 => 'PLUGIN_ADMIN.DISABLED'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'plugins.login.dynamic_page_visibility',
                'validation' => 'loose'
            ],
            'plugins.login.twofa_enabled' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_LOGIN.2FA_ENABLED',
                'highlight' => 0,
                'default' => 0,
                'options' => [
                    1 => 'PLUGIN_ADMIN.ENABLED',
                    0 => 'PLUGIN_ADMIN.DISABLED'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'plugins.login.twofa_enabled',
                'validation' => 'loose'
            ],
            'plugins.login.protect_protected_page_media' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_LOGIN.PROTECT_PROTECTED_PAGE_MEDIA_LABEL',
                'highlight' => 0,
                'default' => 0,
                'options' => [
                    1 => 'PLUGIN_ADMIN.ENABLED',
                    0 => 'PLUGIN_ADMIN.DISABLED'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'plugins.login.protect_protected_page_media',
                'validation' => 'loose'
            ],
            'plugins.login.session_user_sync' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_LOGIN.SESSION_USER_SYNC',
                'highlight' => 0,
                'default' => 0,
                'options' => [
                    1 => 'PLUGIN_ADMIN.ENABLED',
                    0 => 'PLUGIN_ADMIN.DISABLED'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'plugins.login.session_user_sync',
                'validation' => 'loose'
            ],
            'plugins.login.rememberme' => [
                'type' => '_parent',
                'name' => 'plugins.login.rememberme',
                'form_field' => false
            ],
            'plugins.login.rememberme.enabled' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.ENABLED',
                'highlight' => 1,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'plugins.login.rememberme.enabled',
                'validation' => 'loose'
            ],
            'plugins.login.rememberme.timeout' => [
                'type' => 'text',
                'size' => 'small',
                'default' => 604800,
                'label' => 'PLUGIN_ADMIN.TIMEOUT',
                'validate' => [
                    'type' => 'number',
                    'min' => 1
                ],
                'name' => 'plugins.login.rememberme.timeout',
                'validation' => 'loose'
            ],
            'plugins.login.rememberme.name' => [
                'type' => 'text',
                'size' => 'small',
                'label' => 'PLUGIN_ADMIN.NAME',
                'name' => 'plugins.login.rememberme.name',
                'validation' => 'loose'
            ],
            'plugins.login.route' => [
                'type' => 'text',
                'size' => 'medium',
                'label' => 'PLUGIN_LOGIN.ROUTE',
                'name' => 'plugins.login.route',
                'validation' => 'loose'
            ],
            'plugins.login.route_after_login' => [
                'type' => 'text',
                'size' => 'medium',
                'label' => 'PLUGIN_LOGIN.ROUTE_AFTER_LOGIN',
                'data-default@' => '\\Grav\\Plugin\\LoginPlugin::defaultRedirectAfterLogin',
                'name' => 'plugins.login.route_after_login',
                'validation' => 'loose'
            ],
            'plugins.login.route_after_logout' => [
                'type' => 'text',
                'size' => 'medium',
                'label' => 'PLUGIN_LOGIN.ROUTE_AFTER_LOGOUT',
                'data-default@' => '\\Grav\\Plugin\\LoginPlugin::defaultRedirectAfterLogout',
                'name' => 'plugins.login.route_after_logout',
                'validation' => 'loose'
            ],
            'plugins.login.route_forgot' => [
                'type' => 'text',
                'size' => 'medium',
                'label' => 'PLUGIN_LOGIN.ROUTE_FORGOT',
                'name' => 'plugins.login.route_forgot',
                'validation' => 'loose'
            ],
            'plugins.login.route_reset' => [
                'type' => 'text',
                'size' => 'medium',
                'label' => 'PLUGIN_LOGIN.ROUTE_RESET',
                'name' => 'plugins.login.route_reset',
                'validation' => 'loose'
            ],
            'plugins.login.route_profile' => [
                'type' => 'text',
                'size' => 'medium',
                'label' => 'PLUGIN_LOGIN.ROUTE_PROFILE',
                'name' => 'plugins.login.route_profile',
                'validation' => 'loose'
            ],
            'plugins.login.route_activate' => [
                'type' => 'text',
                'size' => 'medium',
                'label' => 'PLUGIN_LOGIN.ROUTE_ACTIVATE',
                'name' => 'plugins.login.route_activate',
                'validation' => 'loose'
            ],
            'plugins.login.user_registration' => [
                'type' => '_parent',
                'name' => 'plugins.login.user_registration',
                'form_field' => false
            ],
            'plugins.login.user_registration.redirect_after_activation' => [
                'type' => 'text',
                'size' => 'medium',
                'label' => 'PLUGIN_LOGIN.REDIRECT_AFTER_ACTIVATION',
                'name' => 'plugins.login.user_registration.redirect_after_activation',
                'validation' => 'loose'
            ],
            'plugins.login.route_register' => [
                'type' => 'text',
                'size' => 'medium',
                'label' => 'PLUGIN_LOGIN.ROUTE_REGISTER',
                'name' => 'plugins.login.route_register',
                'validation' => 'loose'
            ],
            'plugins.login.user_registration.redirect_after_registration' => [
                'type' => 'text',
                'size' => 'medium',
                'label' => 'PLUGIN_LOGIN.REDIRECT_AFTER_REGISTRATION',
                'name' => 'plugins.login.user_registration.redirect_after_registration',
                'validation' => 'loose'
            ],
            'plugins.login.user_registration.enabled' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_ADMIN.ENABLED',
                'highlight' => 0,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'plugins.login.user_registration.enabled',
                'validation' => 'loose'
            ],
            'plugins.login.user_registration.fields' => [
                'type' => 'array',
                'value_only' => true,
                'label' => 'PLUGIN_LOGIN.REGISTRATION_FIELDS',
                'name' => 'plugins.login.user_registration.fields',
                'validation' => 'loose'
            ],
            'plugins.login.user_registration.default_values' => [
                'type' => 'array',
                'label' => 'PLUGIN_LOGIN.DEFAULT_VALUES',
                'name' => 'plugins.login.user_registration.default_values',
                'validation' => 'loose'
            ],
            'plugins.login.user_registration.groups' => [
                'type' => 'select',
                'multiple' => true,
                'size' => 'large',
                'label' => 'PLUGIN_ADMIN.GROUPS',
                'data-options@' => '\\Grav\\Common\\User\\Group::groupNames',
                'classes' => 'fancy',
                'validate' => [
                    'type' => 'commalist'
                ],
                'name' => 'plugins.login.user_registration.groups',
                'validation' => 'loose'
            ],
            'plugins.login.user_registration.access' => [
                'type' => '_parent',
                'name' => 'plugins.login.user_registration.access',
                'form_field' => false
            ],
            'plugins.login.user_registration.access.site' => [
                'type' => 'array',
                'label' => 'PLUGIN_ADMIN.SITE_ACCESS',
                'multiple' => false,
                'validate' => [
                    'type' => 'array'
                ],
                'name' => 'plugins.login.user_registration.access.site',
                'validation' => 'loose'
            ],
            'plugins.login.user_registration.options' => [
                'type' => '_parent',
                'name' => 'plugins.login.user_registration.options',
                'form_field' => false
            ],
            'plugins.login.user_registration.options.validate_password1_and_password2' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_LOGIN.VALIDATE_PASSWORD1_AND_PASSWORD2',
                'highlight' => 1,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'plugins.login.user_registration.options.validate_password1_and_password2',
                'validation' => 'loose'
            ],
            'plugins.login.user_registration.options.set_user_disabled' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_LOGIN.SET_USER_DISABLED',
                'highlight' => 0,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'plugins.login.user_registration.options.set_user_disabled',
                'validation' => 'loose'
            ],
            'plugins.login.user_registration.options.login_after_registration' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_LOGIN.LOGIN_AFTER_REGISTRATION',
                'highlight' => 0,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'plugins.login.user_registration.options.login_after_registration',
                'validation' => 'loose'
            ],
            'plugins.login.user_registration.options.send_activation_email' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_LOGIN.SEND_ACTIVATION_EMAIL',
                'highlight' => 0,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'plugins.login.user_registration.options.send_activation_email',
                'validation' => 'loose'
            ],
            'plugins.login.user_registration.options.manually_enable' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_LOGIN.MANUALLY_ENABLE',
                'highlight' => 0,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'plugins.login.user_registration.options.manually_enable',
                'validation' => 'loose'
            ],
            'plugins.login.user_registration.options.send_notification_email' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_LOGIN.SEND_NOTIFICATION_EMAIL',
                'highlight' => 0,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'plugins.login.user_registration.options.send_notification_email',
                'validation' => 'loose'
            ],
            'plugins.login.user_registration.options.send_welcome_email' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_LOGIN.SEND_WELCOME_EMAIL',
                'highlight' => 0,
                'options' => [
                    1 => 'PLUGIN_ADMIN.YES',
                    0 => 'PLUGIN_ADMIN.NO'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'plugins.login.user_registration.options.send_welcome_email',
                'validation' => 'loose'
            ],
            'plugins.login.max_pw_resets_count' => [
                'type' => 'number',
                'size' => 'x-small',
                'label' => 'PLUGIN_LOGIN.MAX_RESETS_COUNT',
                'append' => 'PLUGIN_LOGIN.RESETS',
                'validate' => [
                    'type' => 'number',
                    'min' => 0
                ],
                'name' => 'plugins.login.max_pw_resets_count',
                'validation' => 'loose'
            ],
            'plugins.login.max_pw_resets_interval' => [
                'type' => 'number',
                'size' => 'x-small',
                'label' => 'PLUGIN_LOGIN.MAX_RESETS_INTERVAL',
                'append' => 'PLUGIN_LOGIN.MINUTES',
                'validate' => [
                    'type' => 'number',
                    'min' => 1
                ],
                'name' => 'plugins.login.max_pw_resets_interval',
                'validation' => 'loose'
            ],
            'plugins.login.max_login_count' => [
                'type' => 'number',
                'size' => 'x-small',
                'label' => 'PLUGIN_LOGIN.MAX_LOGINS_COUNT',
                'append' => 'PLUGIN_LOGIN.ATTEMPTS',
                'validate' => [
                    'type' => 'number',
                    'min' => 0
                ],
                'name' => 'plugins.login.max_login_count',
                'validation' => 'loose'
            ],
            'plugins.login.max_login_interval' => [
                'type' => 'number',
                'size' => 'x-small',
                'label' => 'PLUGIN_LOGIN.MAX_LOGINS_INTERVAL',
                'append' => 'PLUGIN_LOGIN.MINUTES',
                'validate' => [
                    'type' => 'number',
                    'min' => 1
                ],
                'name' => 'plugins.login.max_login_interval',
                'validation' => 'loose'
            ],
            'plugins.login.ipv6_subnet_size' => [
                'type' => 'number',
                'size' => 'x-small',
                'label' => 'PLUGIN_LOGIN.IPV6_SUBNET_SIZE',
                'append' => 'PLUGIN_LOGIN.MINUTES',
                'validate' => [
                    'type' => 'number',
                    'min' => 1
                ],
                'name' => 'plugins.login.ipv6_subnet_size',
                'validation' => 'loose'
            ],
            'plugins.email' => [
                'type' => '_root',
                'form_field' => false,
                'form' => [
                    'validation' => 'loose'
                ]
            ],
            'plugins.email.enabled' => [
                'type' => 'hidden',
                'label' => 'PLUGIN_ADMIN.PLUGIN_STATUS',
                'highlight' => 1,
                'default' => 1,
                'options' => [
                    1 => 'PLUGIN_ADMIN.ENABLED',
                    0 => 'PLUGIN_ADMIN.DISABLED'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'plugins.email.enabled',
                'validation' => 'loose'
            ],
            'plugins.email.mailer' => [
                'type' => '_parent',
                'name' => 'plugins.email.mailer',
                'form_field' => false
            ],
            'plugins.email.mailer.engine' => [
                'type' => 'select',
                'label' => 'PLUGIN_EMAIL.MAIL_ENGINE',
                'size' => 'medium',
                'options' => [
                    'none' => 'PLUGIN_ADMIN.DISABLED',
                    'smtp' => 'SMTP',
                    'sendmail' => 'Sendmail'
                ],
                'name' => 'plugins.email.mailer.engine',
                'validation' => 'loose'
            ],
            'plugins.email.content_type' => [
                'type' => 'select',
                'label' => 'PLUGIN_EMAIL.CONTENT_TYPE',
                'size' => 'medium',
                'default' => 'text/html',
                'options' => [
                    'text/plain' => 'PLUGIN_EMAIL.CONTENT_TYPE_PLAIN_TEXT',
                    'text/html' => 'HTML'
                ],
                'name' => 'plugins.email.content_type',
                'validation' => 'loose'
            ],
            'plugins.email.charset' => [
                'type' => 'text',
                'size' => 'medium',
                'label' => 'PLUGIN_EMAIL.CHARSET',
                'name' => 'plugins.email.charset',
                'validation' => 'loose'
            ],
            'plugins.email.from' => [
                'type' => 'email',
                'size' => 'medium',
                'label' => 'PLUGIN_EMAIL.EMAIL_FORM',
                'validate' => [
                    'required' => true,
                    'type' => 'email'
                ],
                'name' => 'plugins.email.from',
                'validation' => 'loose'
            ],
            'plugins.email.from_name' => [
                'type' => 'text',
                'size' => 'medium',
                'label' => 'PLUGIN_EMAIL.EMAIL_FROM_NAME',
                'name' => 'plugins.email.from_name',
                'validation' => 'loose'
            ],
            'plugins.email.to' => [
                'type' => 'email',
                'size' => 'medium',
                'label' => 'PLUGIN_EMAIL.EMAIL_TO',
                'multiple' => true,
                'validate' => [
                    'required' => true,
                    'type' => 'email'
                ],
                'name' => 'plugins.email.to',
                'validation' => 'loose'
            ],
            'plugins.email.to_name' => [
                'type' => 'text',
                'size' => 'medium',
                'label' => 'PLUGIN_EMAIL.EMAIL_TO_NAME',
                'name' => 'plugins.email.to_name',
                'validation' => 'loose'
            ],
            'plugins.email.cc' => [
                'type' => 'email',
                'size' => 'medium',
                'label' => 'PLUGIN_EMAIL.EMAIL_CC',
                'multiple' => true,
                'validate' => [
                    'type' => 'email'
                ],
                'name' => 'plugins.email.cc',
                'validation' => 'loose'
            ],
            'plugins.email.cc_name' => [
                'type' => 'text',
                'size' => 'medium',
                'label' => 'PLUGIN_EMAIL.EMAIL_CC_NAME',
                'name' => 'plugins.email.cc_name',
                'validation' => 'loose'
            ],
            'plugins.email.bcc' => [
                'type' => 'email',
                'size' => 'medium',
                'label' => 'PLUGIN_EMAIL.EMAIL_BCC',
                'multiple' => true,
                'validate' => [
                    'type' => 'email'
                ],
                'name' => 'plugins.email.bcc',
                'validation' => 'loose'
            ],
            'plugins.email.reply_to' => [
                'type' => 'email',
                'size' => 'medium',
                'label' => 'PLUGIN_EMAIL.EMAIL_REPLY_TO',
                'multiple' => true,
                'validate' => [
                    'type' => 'email'
                ],
                'name' => 'plugins.email.reply_to',
                'validation' => 'loose'
            ],
            'plugins.email.reply_to_name' => [
                'type' => 'text',
                'size' => 'medium',
                'label' => 'PLUGIN_EMAIL.EMAIL_REPLY_TO_NAME',
                'name' => 'plugins.email.reply_to_name',
                'validation' => 'loose'
            ],
            'plugins.email.body' => [
                'type' => 'textarea',
                'size' => 'medium',
                'label' => 'PLUGIN_EMAIL.EMAIL_BODY',
                'name' => 'plugins.email.body',
                'validation' => 'loose'
            ],
            'plugins.email.mailer.smtp' => [
                'type' => '_parent',
                'name' => 'plugins.email.mailer.smtp',
                'form_field' => false
            ],
            'plugins.email.mailer.smtp.server' => [
                'type' => 'text',
                'size' => 'medium',
                'label' => 'PLUGIN_EMAIL.SMTP_SERVER',
                'name' => 'plugins.email.mailer.smtp.server',
                'validation' => 'loose'
            ],
            'plugins.email.mailer.smtp.port' => [
                'type' => 'text',
                'size' => 'small',
                'label' => 'PLUGIN_EMAIL.SMTP_PORT',
                'validate' => [
                    'type' => 'number',
                    'min' => 1,
                    'max' => 65535
                ],
                'name' => 'plugins.email.mailer.smtp.port',
                'validation' => 'loose'
            ],
            'plugins.email.mailer.smtp.encryption' => [
                'type' => 'select',
                'size' => 'medium',
                'label' => 'PLUGIN_EMAIL.SMTP_ENCRYPTION',
                'options' => [
                    'none' => 'PLUGIN_EMAIL.SMTP_ENCRYPTION_NONE',
                    'ssl' => 'SSL',
                    'tls' => 'TLS'
                ],
                'name' => 'plugins.email.mailer.smtp.encryption',
                'validation' => 'loose'
            ],
            'plugins.email.mailer.smtp.user' => [
                'type' => 'text',
                'size' => 'medium',
                'autocomplete' => 'off',
                'label' => 'PLUGIN_EMAIL.SMTP_LOGIN_NAME',
                'name' => 'plugins.email.mailer.smtp.user',
                'validation' => 'loose'
            ],
            'plugins.email.mailer.smtp.password' => [
                'type' => 'password',
                'size' => 'medium',
                'autocomplete' => 'new-password',
                'label' => 'PLUGIN_EMAIL.SMTP_PASSWORD',
                'name' => 'plugins.email.mailer.smtp.password',
                'validation' => 'loose'
            ],
            'plugins.email.mailer.smtp.auth_mode' => [
                'type' => 'text',
                'size' => 'medium',
                'label' => 'PLUGIN_EMAIL.SMTP_AUTH_MODE',
                'name' => 'plugins.email.mailer.smtp.auth_mode',
                'validation' => 'loose'
            ],
            'plugins.email.mailer.sendmail' => [
                'type' => '_parent',
                'name' => 'plugins.email.mailer.sendmail',
                'form_field' => false
            ],
            'plugins.email.mailer.sendmail.bin' => [
                'type' => 'text',
                'size' => 'medium',
                'label' => 'PLUGIN_EMAIL.PATH_TO_SENDMAIL',
                'name' => 'plugins.email.mailer.sendmail.bin',
                'validation' => 'loose'
            ],
            'plugins.email.queue' => [
                'type' => '_parent',
                'name' => 'plugins.email.queue',
                'form_field' => false
            ],
            'plugins.email.queue.enabled' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_EMAIL.QUEUE_ENABLED',
                'highlight' => 0,
                'default' => 0,
                'options' => [
                    1 => 'PLUGIN_ADMIN.ENABLED',
                    0 => 'PLUGIN_ADMIN.DISABLED'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'plugins.email.queue.enabled',
                'validation' => 'loose'
            ],
            'plugins.email.queue.flush_frequency' => [
                'type' => 'cron',
                'label' => 'PLUGIN_EMAIL.QUEUE_FLUSH_FREQUENCY',
                'size' => 'medium',
                'default' => '* * * * *',
                'name' => 'plugins.email.queue.flush_frequency',
                'validation' => 'loose'
            ],
            'plugins.email.queue.flush_msg_limit' => [
                'type' => 'number',
                'label' => 'PLUGIN_EMAIL.QUEUE_FLUSH_MSG_LIMIT',
                'size' => 'x-small',
                'append' => 'PLUGIN_EMAIL.QUEUE_FLUSH_MSG_LIMIT_APPEND',
                'name' => 'plugins.email.queue.flush_msg_limit',
                'validation' => 'loose'
            ],
            'plugins.email.queue.flush_time_limit' => [
                'type' => 'number',
                'label' => 'PLUGIN_EMAIL.QUEUE_FLUSH_TIME_LIMIT',
                'size' => 'x-small',
                'append' => 'PLUGIN_EMAIL.QUEUE_FLUSH_TIME_LIMIT_APPEND',
                'name' => 'plugins.email.queue.flush_time_limit',
                'validation' => 'loose'
            ],
            'plugins.email.debug' => [
                'type' => 'toggle',
                'label' => 'PLUGIN_EMAIL.DEBUG',
                'highlight' => 1,
                'default' => 0,
                'options' => [
                    1 => 'PLUGIN_ADMIN.ENABLED',
                    0 => 'PLUGIN_ADMIN.DISABLED'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'plugins.email.debug',
                'validation' => 'loose'
            ],
            'themes.g5_hydrogen' => [
                'type' => '_root',
                'form_field' => false,
                'form' => [
                    'validation' => 'loose'
                ]
            ],
            'themes.deliver' => [
                'type' => '_root',
                'form_field' => false,
                'form' => [
                    'validation' => 'loose'
                ]
            ],
            'themes' => [
                'type' => '_parent',
                'name' => 'themes',
                'form_field' => false
            ],
            'themes.deliver.dropdown' => [
                'type' => '_parent',
                'name' => 'themes.deliver.dropdown',
                'form_field' => false
            ],
            'themes.deliver.dropdown.enabled' => [
                'type' => 'toggle',
                'label' => 'Dropdown in navbar',
                'highlight' => 1,
                'default' => 0,
                'options' => [
                    1 => 'PLUGIN_ADMIN.ENABLED',
                    0 => 'PLUGIN_ADMIN.DISABLED'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'themes.deliver.dropdown.enabled',
                'validation' => 'loose'
            ],
            'themes.deliver.sticky_menu' => [
                'type' => '_parent',
                'name' => 'themes.deliver.sticky_menu',
                'form_field' => false
            ],
            'themes.deliver.sticky_menu.enabled' => [
                'type' => 'toggle',
                'label' => 'Sticky menu',
                'highlight' => 1,
                'default' => 0,
                'options' => [
                    1 => 'PLUGIN_ADMIN.ENABLED',
                    0 => 'PLUGIN_ADMIN.DISABLED'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'themes.deliver.sticky_menu.enabled',
                'validation' => 'loose'
            ],
            'themes.quark' => [
                'type' => '_root',
                'form_field' => false,
                'form' => [
                    'validation' => 'loose'
                ]
            ],
            'themes.quark.production-mode' => [
                'type' => 'toggle',
                'label' => 'Production mode',
                'highlight' => 1,
                'default' => 1,
                'options' => [
                    1 => 'PLUGIN_ADMIN.ENABLED',
                    0 => 'PLUGIN_ADMIN.DISABLED'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'themes.quark.production-mode',
                'validation' => 'loose'
            ],
            'themes.quark.grid-size' => [
                'type' => 'select',
                'label' => 'Grid size',
                'size' => 'small',
                'options' => [
                    '' => 'None (full width)',
                    'grid-xl' => 'Extra Large',
                    'grid-lg' => 'Large',
                    'grid-md' => 'Medium'
                ],
                'name' => 'themes.quark.grid-size',
                'validation' => 'loose'
            ],
            'themes.quark.custom_logo' => [
                'array' => true,
                'media_field' => true,
                'validate' => [
                    'type' => 'ignore'
                ],
                'type' => 'file',
                'label' => 'Custom Logo',
                'size' => 'large',
                'destination' => 'theme://images/logo',
                'multiple' => false,
                'markdown' => true,
                'description' => 'Will be used instead of default logo `theme://images/grav-logo.svg`',
                'accept' => [
                    0 => 'image/*'
                ],
                'name' => 'themes.quark.custom_logo',
                'validation' => 'loose'
            ],
            'themes.quark.custom_logo_mobile' => [
                'array' => true,
                'media_field' => true,
                'validate' => [
                    'type' => 'ignore'
                ],
                'type' => 'file',
                'label' => 'Mobile Custom Logo',
                'size' => 'large',
                'destination' => 'theme://images/logo',
                'multiple' => false,
                'accept' => [
                    0 => 'image/*'
                ],
                'name' => 'themes.quark.custom_logo_mobile',
                'validation' => 'loose'
            ],
            'themes.quark.header-fixed' => [
                'type' => 'toggle',
                'label' => 'Fixed header',
                'highlight' => 1,
                'default' => 1,
                'options' => [
                    1 => 'PLUGIN_ADMIN.ENABLED',
                    0 => 'PLUGIN_ADMIN.DISABLED'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'themes.quark.header-fixed',
                'validation' => 'loose'
            ],
            'themes.quark.header-animated' => [
                'type' => 'toggle',
                'label' => 'Animated',
                'highlight' => 1,
                'default' => 1,
                'options' => [
                    1 => 'PLUGIN_ADMIN.ENABLED',
                    0 => 'PLUGIN_ADMIN.DISABLED'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'themes.quark.header-animated',
                'validation' => 'loose'
            ],
            'themes.quark.header-dark' => [
                'type' => 'toggle',
                'label' => 'Dark Style',
                'highlight' => 0,
                'default' => 0,
                'options' => [
                    1 => 'PLUGIN_ADMIN.ENABLED',
                    0 => 'PLUGIN_ADMIN.DISABLED'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'themes.quark.header-dark',
                'validation' => 'loose'
            ],
            'themes.quark.header-transparent' => [
                'type' => 'toggle',
                'label' => 'Transparent',
                'highlight' => 0,
                'default' => 0,
                'options' => [
                    1 => 'PLUGIN_ADMIN.ENABLED',
                    0 => 'PLUGIN_ADMIN.DISABLED'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'themes.quark.header-transparent',
                'validation' => 'loose'
            ],
            'themes.quark.sticky-footer' => [
                'type' => 'toggle',
                'label' => 'Sticky footer',
                'highlight' => 1,
                'default' => 1,
                'options' => [
                    1 => 'PLUGIN_ADMIN.ENABLED',
                    0 => 'PLUGIN_ADMIN.DISABLED'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'themes.quark.sticky-footer',
                'validation' => 'loose'
            ],
            'themes.quark.blog-page' => [
                'type' => 'text',
                'label' => 'Blog Page',
                'size' => 'medium',
                'default' => '/blog',
                'name' => 'themes.quark.blog-page',
                'validation' => 'loose'
            ],
            'themes.quark.spectre' => [
                'type' => '_parent',
                'name' => 'themes.quark.spectre',
                'form_field' => false
            ],
            'themes.quark.spectre.exp' => [
                'type' => 'toggle',
                'label' => 'Experimentals CSS',
                'highlight' => 0,
                'default' => 0,
                'options' => [
                    1 => 'PLUGIN_ADMIN.ENABLED',
                    0 => 'PLUGIN_ADMIN.DISABLED'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'themes.quark.spectre.exp',
                'validation' => 'loose'
            ],
            'themes.quark.spectre.icons' => [
                'type' => 'toggle',
                'label' => 'Icons CSS',
                'highlight' => 0,
                'default' => 0,
                'options' => [
                    1 => 'PLUGIN_ADMIN.ENABLED',
                    0 => 'PLUGIN_ADMIN.DISABLED'
                ],
                'validate' => [
                    'type' => 'bool'
                ],
                'name' => 'themes.quark.spectre.icons',
                'validation' => 'loose'
            ]
        ],
        'rules' => [
            
        ],
        'nested' => [
            'media' => [
                'types' => [
                    '*' => [
                        'type' => 'media.types.*.type',
                        'thumb' => 'media.types.*.thumb',
                        'mime' => 'media.types.*.mime',
                        'image' => 'media.types.*.image'
                    ]
                ]
            ],
            'backups' => [
                'history' => 'backups.history',
                'purge' => [
                    'trigger' => 'backups.purge.trigger',
                    'max_backups_count' => 'backups.purge.max_backups_count',
                    'max_backups_space' => 'backups.purge.max_backups_space',
                    'max_backups_time' => 'backups.purge.max_backups_time'
                ],
                'profiles' => [
                    '*' => [
                        'name' => 'backups.profiles.*.name',
                        'root' => 'backups.profiles.*.root',
                        'exclude_paths' => 'backups.profiles.*.exclude_paths',
                        'exclude_files' => 'backups.profiles.*.exclude_files',
                        'schedule' => 'backups.profiles.*.schedule',
                        'schedule_at' => 'backups.profiles.*.schedule_at'
                    ]
                ]
            ],
            'scheduler' => [
                'status' => 'scheduler.status',
                'custom_jobs' => [
                    '*' => [
                        'command' => 'scheduler.custom_jobs.*.command',
                        'args' => 'scheduler.custom_jobs.*.args',
                        'at' => 'scheduler.custom_jobs.*.at',
                        'output' => 'scheduler.custom_jobs.*.output',
                        'output_mode' => 'scheduler.custom_jobs.*.output_mode',
                        'email' => 'scheduler.custom_jobs.*.email'
                    ]
                ]
            ],
            'security' => [
                'xss_whitelist' => 'security.xss_whitelist',
                'xss_enabled' => [
                    'on_events' => 'security.xss_enabled.on_events',
                    'invalid_protocols' => 'security.xss_enabled.invalid_protocols',
                    'moz_binding' => 'security.xss_enabled.moz_binding',
                    'html_inline_styles' => 'security.xss_enabled.html_inline_styles',
                    'dangerous_tags' => 'security.xss_enabled.dangerous_tags'
                ],
                'xss_invalid_protocols' => 'security.xss_invalid_protocols',
                'xss_dangerous_tags' => 'security.xss_dangerous_tags',
                'uploads_dangerous_extensions' => 'security.uploads_dangerous_extensions',
                'sanitize_svg' => 'security.sanitize_svg'
            ],
            'site' => [
                'title' => 'site.title',
                'default_lang' => 'site.default_lang',
                'author' => [
                    'name' => 'site.author.name',
                    'email' => 'site.author.email'
                ],
                'taxonomies' => 'site.taxonomies',
                'summary' => [
                    'enabled' => 'site.summary.enabled',
                    'size' => 'site.summary.size',
                    'format' => 'site.summary.format',
                    'delimiter' => 'site.summary.delimiter'
                ],
                'metadata' => 'site.metadata',
                'redirects' => 'site.redirects',
                'routes' => 'site.routes'
            ],
            'streams' => [
                'schemes' => [
                    'xxx' => 'streams.schemes.xxx'
                ]
            ],
            'system' => [
                'home' => [
                    'alias' => 'system.home.alias',
                    'hide_in_urls' => 'system.home.hide_in_urls'
                ],
                'pages' => [
                    'theme' => 'system.pages.theme',
                    'process' => 'system.pages.process',
                    'types' => 'system.pages.types',
                    'dateformat' => [
                        'default' => 'system.pages.dateformat.default',
                        'short' => 'system.pages.dateformat.short',
                        'long' => 'system.pages.dateformat.long'
                    ],
                    'order' => [
                        'by' => 'system.pages.order.by',
                        'dir' => 'system.pages.order.dir'
                    ],
                    'list' => [
                        'count' => 'system.pages.list.count'
                    ],
                    'publish_dates' => 'system.pages.publish_dates',
                    'events' => 'system.pages.events',
                    'append_url_extension' => 'system.pages.append_url_extension',
                    'redirect_default_code' => 'system.pages.redirect_default_code',
                    'redirect_default_route' => 'system.pages.redirect_default_route',
                    'redirect_trailing_slash' => 'system.pages.redirect_trailing_slash',
                    'ignore_hidden' => 'system.pages.ignore_hidden',
                    'ignore_files' => 'system.pages.ignore_files',
                    'ignore_folders' => 'system.pages.ignore_folders',
                    'hide_empty_folders' => 'system.pages.hide_empty_folders',
                    'url_taxonomy_filters' => 'system.pages.url_taxonomy_filters',
                    'twig_first' => 'system.pages.twig_first',
                    'never_cache_twig' => 'system.pages.never_cache_twig',
                    'frontmatter' => [
                        'process_twig' => 'system.pages.frontmatter.process_twig',
                        'ignore_fields' => 'system.pages.frontmatter.ignore_fields'
                    ],
                    'expires' => 'system.pages.expires',
                    'cache_control' => 'system.pages.cache_control',
                    'last_modified' => 'system.pages.last_modified',
                    'etag' => 'system.pages.etag',
                    'vary_accept_encoding' => 'system.pages.vary_accept_encoding',
                    'markdown' => [
                        'extra' => 'system.pages.markdown.extra',
                        'auto_line_breaks' => 'system.pages.markdown.auto_line_breaks',
                        'auto_url_links' => 'system.pages.markdown.auto_url_links',
                        'escape_markup' => 'system.pages.markdown.escape_markup',
                        'valid_link_attributes' => 'system.pages.markdown.valid_link_attributes'
                    ],
                    'type' => 'system.pages.type'
                ],
                'timezone' => 'system.timezone',
                'languages' => [
                    'supported' => 'system.languages.supported',
                    'default_lang' => 'system.languages.default_lang',
                    'include_default_lang' => 'system.languages.include_default_lang',
                    'include_default_lang_file_extension' => 'system.languages.include_default_lang_file_extension',
                    'content_fallback' => 'system.languages.content_fallback',
                    'pages_fallback_only' => 'system.languages.pages_fallback_only',
                    'translations' => 'system.languages.translations',
                    'translations_fallback' => 'system.languages.translations_fallback',
                    'session_store_active' => 'system.languages.session_store_active',
                    'http_accept_language' => 'system.languages.http_accept_language',
                    'override_locale' => 'system.languages.override_locale'
                ],
                'value' => 'system.value',
                'cache' => [
                    'enabled' => 'system.cache.enabled',
                    'check' => [
                        'method' => 'system.cache.check.method'
                    ],
                    'driver' => 'system.cache.driver',
                    'prefix' => 'system.cache.prefix',
                    'purge_at' => 'system.cache.purge_at',
                    'clear_at' => 'system.cache.clear_at',
                    'clear_job_type' => 'system.cache.clear_job_type',
                    'clear_images_by_default' => 'system.cache.clear_images_by_default',
                    'cli_compatibility' => 'system.cache.cli_compatibility',
                    'lifetime' => 'system.cache.lifetime',
                    'gzip' => 'system.cache.gzip',
                    'allow_webserver_gzip' => 'system.cache.allow_webserver_gzip',
                    'memcache' => [
                        'server' => 'system.cache.memcache.server',
                        'port' => 'system.cache.memcache.port'
                    ],
                    'memcached' => [
                        'server' => 'system.cache.memcached.server',
                        'port' => 'system.cache.memcached.port'
                    ],
                    'redis' => [
                        'socket' => 'system.cache.redis.socket',
                        'server' => 'system.cache.redis.server',
                        'port' => 'system.cache.redis.port',
                        'password' => 'system.cache.redis.password',
                        'database' => 'system.cache.redis.database'
                    ]
                ],
                'flex' => [
                    'cache' => [
                        'index' => [
                            'enabled' => 'system.flex.cache.index.enabled',
                            'lifetime' => 'system.flex.cache.index.lifetime'
                        ],
                        'object' => [
                            'enabled' => 'system.flex.cache.object.enabled',
                            'lifetime' => 'system.flex.cache.object.lifetime'
                        ],
                        'render' => [
                            'enabled' => 'system.flex.cache.render.enabled',
                            'lifetime' => 'system.flex.cache.render.lifetime'
                        ]
                    ]
                ],
                'twig' => [
                    'cache' => 'system.twig.cache',
                    'debug' => 'system.twig.debug',
                    'auto_reload' => 'system.twig.auto_reload',
                    'autoescape' => 'system.twig.autoescape',
                    'umask_fix' => 'system.twig.umask_fix'
                ],
                'assets' => [
                    'css_pipeline' => 'system.assets.css_pipeline',
                    'css_pipeline_include_externals' => 'system.assets.css_pipeline_include_externals',
                    'css_pipeline_before_excludes' => 'system.assets.css_pipeline_before_excludes',
                    'css_minify' => 'system.assets.css_minify',
                    'css_minify_windows' => 'system.assets.css_minify_windows',
                    'css_rewrite' => 'system.assets.css_rewrite',
                    'js_pipeline' => 'system.assets.js_pipeline',
                    'js_pipeline_include_externals' => 'system.assets.js_pipeline_include_externals',
                    'js_pipeline_before_excludes' => 'system.assets.js_pipeline_before_excludes',
                    'js_minify' => 'system.assets.js_minify',
                    'enable_asset_timestamp' => 'system.assets.enable_asset_timestamp',
                    'enable_asset_sri' => 'system.assets.enable_asset_sri',
                    'collections' => 'system.assets.collections'
                ],
                'errors' => [
                    'display' => 'system.errors.display',
                    'log' => 'system.errors.log'
                ],
                'log' => [
                    'handler' => 'system.log.handler',
                    'syslog' => [
                        'facility' => 'system.log.syslog.facility'
                    ]
                ],
                'debugger' => [
                    'enabled' => 'system.debugger.enabled',
                    'provider' => 'system.debugger.provider',
                    'censored' => 'system.debugger.censored',
                    'shutdown' => [
                        'close_connection' => 'system.debugger.shutdown.close_connection'
                    ]
                ],
                'images' => [
                    'default_image_quality' => 'system.images.default_image_quality',
                    'cache_all' => 'system.images.cache_all',
                    'cache_perms' => 'system.images.cache_perms',
                    'debug' => 'system.images.debug',
                    'auto_fix_orientation' => 'system.images.auto_fix_orientation',
                    'defaults' => [
                        'loading' => 'system.images.defaults.loading'
                    ],
                    'seofriendly' => 'system.images.seofriendly',
                    'cls' => [
                        'auto_sizes' => 'system.images.cls.auto_sizes',
                        'aspect_ratio' => 'system.images.cls.aspect_ratio',
                        'retina_scale' => 'system.images.cls.retina_scale'
                    ]
                ],
                'media' => [
                    'enable_media_timestamp' => 'system.media.enable_media_timestamp',
                    'auto_metadata_exif' => 'system.media.auto_metadata_exif',
                    'allowed_fallback_types' => 'system.media.allowed_fallback_types',
                    'unsupported_inline_types' => 'system.media.unsupported_inline_types'
                ],
                'session' => [
                    'enabled' => 'system.session.enabled',
                    'initialize' => 'system.session.initialize',
                    'timeout' => 'system.session.timeout',
                    'name' => 'system.session.name',
                    'uniqueness' => 'system.session.uniqueness',
                    'secure' => 'system.session.secure',
                    'httponly' => 'system.session.httponly',
                    'domain' => 'system.session.domain',
                    'path' => 'system.session.path',
                    'samesite' => 'system.session.samesite',
                    'split' => 'system.session.split'
                ],
                'gpm' => [
                    'releases' => 'system.gpm.releases',
                    'proxy_url' => 'system.gpm.proxy_url',
                    'method' => 'system.gpm.method',
                    'official_gpm_only' => 'system.gpm.official_gpm_only',
                    'verify_peer' => 'system.gpm.verify_peer'
                ],
                'reverse_proxy_setup' => 'system.reverse_proxy_setup',
                'username_regex' => 'system.username_regex',
                'pwd_regex' => 'system.pwd_regex',
                'intl_enabled' => 'system.intl_enabled',
                'wrapped_site' => 'system.wrapped_site',
                'absolute_urls' => 'system.absolute_urls',
                'param_sep' => 'system.param_sep',
                'force_ssl' => 'system.force_ssl',
                'force_lowercase_urls' => 'system.force_lowercase_urls',
                'custom_base_url' => 'system.custom_base_url',
                'http_x_forwarded' => [
                    'protocol' => 'system.http_x_forwarded.protocol',
                    'host' => 'system.http_x_forwarded.host',
                    'port' => 'system.http_x_forwarded.port',
                    'ip' => 'system.http_x_forwarded.ip'
                ],
                'strict_mode' => [
                    'blueprint_compat' => 'system.strict_mode.blueprint_compat',
                    'yaml_compat' => 'system.strict_mode.yaml_compat',
                    'twig_compat' => 'system.strict_mode.twig_compat'
                ],
                'accounts' => [
                    'type' => 'system.accounts.type',
                    'storage' => 'system.accounts.storage'
                ]
            ],
            'plugins' => [
                'markdown-notices' => [
                    'enabled' => 'plugins.markdown-notices.enabled',
                    'built_in_css' => 'plugins.markdown-notices.built_in_css',
                    'base_classes' => 'plugins.markdown-notices.base_classes',
                    'level_classes' => 'plugins.markdown-notices.level_classes'
                ],
                'form' => [
                    'enabled' => 'plugins.form.enabled',
                    'built_in_css' => 'plugins.form.built_in_css',
                    'inline_css' => 'plugins.form.inline_css',
                    'refresh_prevention' => 'plugins.form.refresh_prevention',
                    'client_side_validation' => 'plugins.form.client_side_validation',
                    'inline_errors' => 'plugins.form.inline_errors',
                    'files' => [
                        'multiple' => 'plugins.form.files.multiple',
                        'limit' => 'plugins.form.files.limit',
                        'destination' => 'plugins.form.files.destination',
                        'accept' => 'plugins.form.files.accept',
                        'filesize' => 'plugins.form.files.filesize',
                        'avoid_overwriting' => 'plugins.form.files.avoid_overwriting',
                        'random_name' => 'plugins.form.files.random_name'
                    ],
                    'recaptcha' => [
                        'version' => 'plugins.form.recaptcha.version',
                        'theme' => 'plugins.form.recaptcha.theme',
                        'site_key' => 'plugins.form.recaptcha.site_key',
                        'secret_key' => 'plugins.form.recaptcha.secret_key'
                    ]
                ],
                'highlight' => [
                    'enabled' => 'plugins.highlight.enabled',
                    'lines' => 'plugins.highlight.lines',
                    'theme' => 'plugins.highlight.theme'
                ],
                'flex-objects' => [
                    'enabled' => 'plugins.flex-objects.enabled',
                    'built_in_css' => 'plugins.flex-objects.built_in_css',
                    'extra_admin_twig_path' => 'plugins.flex-objects.extra_admin_twig_path',
                    'directories' => 'plugins.flex-objects.directories'
                ],
                'admin' => [
                    'enabled' => 'plugins.admin.enabled',
                    'cache_enabled' => 'plugins.admin.cache_enabled',
                    'twofa_enabled' => 'plugins.admin.twofa_enabled',
                    'route' => 'plugins.admin.route',
                    'logo_text' => 'plugins.admin.logo_text',
                    'content_padding' => 'plugins.admin.content_padding',
                    'body_classes' => 'plugins.admin.body_classes',
                    'sidebar' => [
                        'activate' => 'plugins.admin.sidebar.activate',
                        'hover_delay' => 'plugins.admin.sidebar.hover_delay',
                        'size' => 'plugins.admin.sidebar.size'
                    ],
                    'theme' => 'plugins.admin.theme',
                    'edit_mode' => 'plugins.admin.edit_mode',
                    'frontend_preview_target' => 'plugins.admin.frontend_preview_target',
                    'pages' => [
                        'show_parents' => 'plugins.admin.pages.show_parents',
                        'parents_levels' => 'plugins.admin.pages.parents_levels',
                        'show_modular' => 'plugins.admin.pages.show_modular'
                    ],
                    'show_beta_msg' => 'plugins.admin.show_beta_msg',
                    'show_github_msg' => 'plugins.admin.show_github_msg',
                    'pages_list_display_field' => 'plugins.admin.pages_list_display_field',
                    'enable_auto_updates_check' => 'plugins.admin.enable_auto_updates_check',
                    'session' => [
                        'timeout' => 'plugins.admin.session.timeout'
                    ],
                    'hide_page_types' => 'plugins.admin.hide_page_types',
                    'hide_modular_page_types' => 'plugins.admin.hide_modular_page_types',
                    'widgets_display' => 'plugins.admin.widgets_display',
                    'notifications' => [
                        'feed' => 'plugins.admin.notifications.feed',
                        'dashboard' => 'plugins.admin.notifications.dashboard',
                        'plugins' => 'plugins.admin.notifications.plugins',
                        'themes' => 'plugins.admin.notifications.themes'
                    ],
                    'whitelabel' => [
                        'logo_login' => 'plugins.admin.whitelabel.logo_login',
                        'logo_custom' => 'plugins.admin.whitelabel.logo_custom',
                        'codemirror_theme' => 'plugins.admin.whitelabel.codemirror_theme',
                        'codemirror_fontsize' => 'plugins.admin.whitelabel.codemirror_fontsize',
                        'codemirror_md_font' => 'plugins.admin.whitelabel.codemirror_md_font',
                        'quicktray_recompile' => 'plugins.admin.whitelabel.quicktray_recompile',
                        'color_scheme' => [
                            'name' => 'plugins.admin.whitelabel.color_scheme.name',
                            'colors' => [
                                'logo-bg' => 'plugins.admin.whitelabel.color_scheme.colors.logo-bg',
                                'logo-link' => 'plugins.admin.whitelabel.color_scheme.colors.logo-link',
                                'nav-bg' => 'plugins.admin.whitelabel.color_scheme.colors.nav-bg',
                                'nav-text' => 'plugins.admin.whitelabel.color_scheme.colors.nav-text',
                                'nav-link' => 'plugins.admin.whitelabel.color_scheme.colors.nav-link',
                                'nav-selected-bg' => 'plugins.admin.whitelabel.color_scheme.colors.nav-selected-bg',
                                'nav-selected-link' => 'plugins.admin.whitelabel.color_scheme.colors.nav-selected-link',
                                'nav-hover-bg' => 'plugins.admin.whitelabel.color_scheme.colors.nav-hover-bg',
                                'nav-hover-link' => 'plugins.admin.whitelabel.color_scheme.colors.nav-hover-link',
                                'toolbar-bg' => 'plugins.admin.whitelabel.color_scheme.colors.toolbar-bg',
                                'toolbar-text' => 'plugins.admin.whitelabel.color_scheme.colors.toolbar-text',
                                'page-bg' => 'plugins.admin.whitelabel.color_scheme.colors.page-bg',
                                'page-text' => 'plugins.admin.whitelabel.color_scheme.colors.page-text',
                                'page-link' => 'plugins.admin.whitelabel.color_scheme.colors.page-link',
                                'content-bg' => 'plugins.admin.whitelabel.color_scheme.colors.content-bg',
                                'content-text' => 'plugins.admin.whitelabel.color_scheme.colors.content-text',
                                'content-link' => 'plugins.admin.whitelabel.color_scheme.colors.content-link',
                                'content-link2' => 'plugins.admin.whitelabel.color_scheme.colors.content-link2',
                                'content-header' => 'plugins.admin.whitelabel.color_scheme.colors.content-header',
                                'content-tabs-bg' => 'plugins.admin.whitelabel.color_scheme.colors.content-tabs-bg',
                                'content-tabs-text' => 'plugins.admin.whitelabel.color_scheme.colors.content-tabs-text',
                                'button-bg' => 'plugins.admin.whitelabel.color_scheme.colors.button-bg',
                                'button-text' => 'plugins.admin.whitelabel.color_scheme.colors.button-text',
                                'notice-bg' => 'plugins.admin.whitelabel.color_scheme.colors.notice-bg',
                                'notice-text' => 'plugins.admin.whitelabel.color_scheme.colors.notice-text',
                                'update-bg' => 'plugins.admin.whitelabel.color_scheme.colors.update-bg',
                                'update-text' => 'plugins.admin.whitelabel.color_scheme.colors.update-text',
                                'critical-bg' => 'plugins.admin.whitelabel.color_scheme.colors.critical-bg',
                                'critical-text' => 'plugins.admin.whitelabel.color_scheme.colors.critical-text'
                            ],
                            'accents' => [
                                'primary-accent' => 'plugins.admin.whitelabel.color_scheme.accents.primary-accent',
                                'secondary-accent' => 'plugins.admin.whitelabel.color_scheme.accents.secondary-accent',
                                'tertiary-accent' => 'plugins.admin.whitelabel.color_scheme.accents.tertiary-accent'
                            ]
                        ],
                        'custom_footer' => 'plugins.admin.whitelabel.custom_footer',
                        'custom_css' => 'plugins.admin.whitelabel.custom_css',
                        'custom_presets' => 'plugins.admin.whitelabel.custom_presets'
                    ],
                    'themes-preview' => 'plugins.admin.themes-preview',
                    'colorschemes' => 'plugins.admin.colorschemes',
                    'popularity' => [
                        'enabled' => 'plugins.admin.popularity.enabled',
                        'ignore' => 'plugins.admin.popularity.ignore',
                        'history' => [
                            'daily' => 'plugins.admin.popularity.history.daily',
                            'monthly' => 'plugins.admin.popularity.history.monthly',
                            'visitors' => 'plugins.admin.popularity.history.visitors'
                        ]
                    ],
                    'dashboard' => [
                        'days_of_stats' => 'plugins.admin.dashboard.days_of_stats'
                    ],
                    'pagemedia' => [
                        'resize_width' => 'plugins.admin.pagemedia.resize_width',
                        'resize_height' => 'plugins.admin.pagemedia.resize_height',
                        'res_min_width' => 'plugins.admin.pagemedia.res_min_width',
                        'res_min_height' => 'plugins.admin.pagemedia.res_min_height',
                        'res_max_width' => 'plugins.admin.pagemedia.res_max_width',
                        'res_max_height' => 'plugins.admin.pagemedia.res_max_height',
                        'resize_quality' => 'plugins.admin.pagemedia.resize_quality'
                    ]
                ],
                'problems' => [
                    'enabled' => 'plugins.problems.enabled',
                    'built_in_css' => 'plugins.problems.built_in_css'
                ],
                'backtotop' => [
                    'enabled' => 'plugins.backtotop.enabled',
                    'fontawesome_icons' => 'plugins.backtotop.fontawesome_icons',
                    'fontawesome_css' => 'plugins.backtotop.fontawesome_css'
                ],
                'prism-highlight' => [
                    'enabled' => 'plugins.prism-highlight.enabled',
                    'theme' => 'plugins.prism-highlight.theme',
                    'all-pre-blocks' => 'plugins.prism-highlight.all-pre-blocks',
                    'plugins' => [
                        'line-numbers' => 'plugins.prism-highlight.plugins.line-numbers',
                        'command-line' => 'plugins.prism-highlight.plugins.command-line',
                        'command-line-prompt' => 'plugins.prism-highlight.plugins.command-line-prompt'
                    ]
                ],
                'error' => [
                    'enabled' => 'plugins.error.enabled',
                    'routes' => [
                        404 => 'plugins.error.routes.404'
                    ]
                ],
                'login' => [
                    'enabled' => 'plugins.login.enabled',
                    'built_in_css' => 'plugins.login.built_in_css',
                    'redirect_to_login' => 'plugins.login.redirect_to_login',
                    'redirect_after_login' => 'plugins.login.redirect_after_login',
                    'redirect_after_logout' => 'plugins.login.redirect_after_logout',
                    'parent_acl' => 'plugins.login.parent_acl',
                    'dynamic_page_visibility' => 'plugins.login.dynamic_page_visibility',
                    'twofa_enabled' => 'plugins.login.twofa_enabled',
                    'protect_protected_page_media' => 'plugins.login.protect_protected_page_media',
                    'session_user_sync' => 'plugins.login.session_user_sync',
                    'rememberme' => [
                        'enabled' => 'plugins.login.rememberme.enabled',
                        'timeout' => 'plugins.login.rememberme.timeout',
                        'name' => 'plugins.login.rememberme.name'
                    ],
                    'route' => 'plugins.login.route',
                    'route_after_login' => 'plugins.login.route_after_login',
                    'route_after_logout' => 'plugins.login.route_after_logout',
                    'route_forgot' => 'plugins.login.route_forgot',
                    'route_reset' => 'plugins.login.route_reset',
                    'route_profile' => 'plugins.login.route_profile',
                    'route_activate' => 'plugins.login.route_activate',
                    'user_registration' => [
                        'redirect_after_activation' => 'plugins.login.user_registration.redirect_after_activation',
                        'redirect_after_registration' => 'plugins.login.user_registration.redirect_after_registration',
                        'enabled' => 'plugins.login.user_registration.enabled',
                        'fields' => 'plugins.login.user_registration.fields',
                        'default_values' => 'plugins.login.user_registration.default_values',
                        'groups' => 'plugins.login.user_registration.groups',
                        'access' => [
                            'site' => 'plugins.login.user_registration.access.site'
                        ],
                        'options' => [
                            'validate_password1_and_password2' => 'plugins.login.user_registration.options.validate_password1_and_password2',
                            'set_user_disabled' => 'plugins.login.user_registration.options.set_user_disabled',
                            'login_after_registration' => 'plugins.login.user_registration.options.login_after_registration',
                            'send_activation_email' => 'plugins.login.user_registration.options.send_activation_email',
                            'manually_enable' => 'plugins.login.user_registration.options.manually_enable',
                            'send_notification_email' => 'plugins.login.user_registration.options.send_notification_email',
                            'send_welcome_email' => 'plugins.login.user_registration.options.send_welcome_email'
                        ]
                    ],
                    'route_register' => 'plugins.login.route_register',
                    'max_pw_resets_count' => 'plugins.login.max_pw_resets_count',
                    'max_pw_resets_interval' => 'plugins.login.max_pw_resets_interval',
                    'max_login_count' => 'plugins.login.max_login_count',
                    'max_login_interval' => 'plugins.login.max_login_interval',
                    'ipv6_subnet_size' => 'plugins.login.ipv6_subnet_size'
                ],
                'email' => [
                    'enabled' => 'plugins.email.enabled',
                    'mailer' => [
                        'engine' => 'plugins.email.mailer.engine',
                        'smtp' => [
                            'server' => 'plugins.email.mailer.smtp.server',
                            'port' => 'plugins.email.mailer.smtp.port',
                            'encryption' => 'plugins.email.mailer.smtp.encryption',
                            'user' => 'plugins.email.mailer.smtp.user',
                            'password' => 'plugins.email.mailer.smtp.password',
                            'auth_mode' => 'plugins.email.mailer.smtp.auth_mode'
                        ],
                        'sendmail' => [
                            'bin' => 'plugins.email.mailer.sendmail.bin'
                        ]
                    ],
                    'content_type' => 'plugins.email.content_type',
                    'charset' => 'plugins.email.charset',
                    'from' => 'plugins.email.from',
                    'from_name' => 'plugins.email.from_name',
                    'to' => 'plugins.email.to',
                    'to_name' => 'plugins.email.to_name',
                    'cc' => 'plugins.email.cc',
                    'cc_name' => 'plugins.email.cc_name',
                    'bcc' => 'plugins.email.bcc',
                    'reply_to' => 'plugins.email.reply_to',
                    'reply_to_name' => 'plugins.email.reply_to_name',
                    'body' => 'plugins.email.body',
                    'queue' => [
                        'enabled' => 'plugins.email.queue.enabled',
                        'flush_frequency' => 'plugins.email.queue.flush_frequency',
                        'flush_msg_limit' => 'plugins.email.queue.flush_msg_limit',
                        'flush_time_limit' => 'plugins.email.queue.flush_time_limit'
                    ],
                    'debug' => 'plugins.email.debug'
                ]
            ],
            'themes' => [
                'g5_hydrogen' => 'themes.g5_hydrogen',
                'deliver' => [
                    'dropdown' => [
                        'enabled' => 'themes.deliver.dropdown.enabled'
                    ],
                    'sticky_menu' => [
                        'enabled' => 'themes.deliver.sticky_menu.enabled'
                    ]
                ],
                'quark' => [
                    'production-mode' => 'themes.quark.production-mode',
                    'grid-size' => 'themes.quark.grid-size',
                    'custom_logo' => 'themes.quark.custom_logo',
                    'custom_logo_mobile' => 'themes.quark.custom_logo_mobile',
                    'header-fixed' => 'themes.quark.header-fixed',
                    'header-animated' => 'themes.quark.header-animated',
                    'header-dark' => 'themes.quark.header-dark',
                    'header-transparent' => 'themes.quark.header-transparent',
                    'sticky-footer' => 'themes.quark.sticky-footer',
                    'blog-page' => 'themes.quark.blog-page',
                    'spectre' => [
                        'exp' => 'themes.quark.spectre.exp',
                        'icons' => 'themes.quark.spectre.icons'
                    ]
                ]
            ]
        ],
        'dynamic' => [
            
        ],
        'filter' => [
            'validation' => true,
            'xss_check' => true
        ]
    ]
];
