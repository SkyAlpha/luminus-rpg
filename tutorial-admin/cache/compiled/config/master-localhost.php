<?php
return [
    '@class' => 'Grav\\Common\\Config\\CompiledConfig',
    'timestamp' => 1623681900,
    'checksum' => '4eea77003f395dd25d38e8f5de5e4cc4',
    'files' => [
        'user/config' => [
            'media' => [
                'file' => 'user/config/media.yaml',
                'modified' => 1617807489
            ],
            'plugins/highlight' => [
                'file' => 'user/config/plugins/highlight.yaml',
                'modified' => 1621433530
            ],
            'plugins/prism-highlight' => [
                'file' => 'user/config/plugins/prism-highlight.yaml',
                'modified' => 1621433530
            ],
            'security' => [
                'file' => 'user/config/security.yaml',
                'modified' => 1621433530
            ],
            'site' => [
                'file' => 'user/config/site.yaml',
                'modified' => 1621433530
            ],
            'system' => [
                'file' => 'user/config/system.yaml',
                'modified' => 1623681895
            ],
            'themes/quark' => [
                'file' => 'user/config/themes/quark.yaml',
                'modified' => 1621433530
            ],
            'versions' => [
                'file' => 'user/config/versions.yaml',
                'modified' => 1623681895
            ]
        ],
        'system/config' => [
            'backups' => [
                'file' => 'system/config/backups.yaml',
                'modified' => 1622714294
            ],
            'media' => [
                'file' => 'system/config/media.yaml',
                'modified' => 1622714294
            ],
            'permissions' => [
                'file' => 'system/config/permissions.yaml',
                'modified' => 1622714294
            ],
            'security' => [
                'file' => 'system/config/security.yaml',
                'modified' => 1622714294
            ],
            'site' => [
                'file' => 'system/config/site.yaml',
                'modified' => 1622714294
            ],
            'system' => [
                'file' => 'system/config/system.yaml',
                'modified' => 1622714294
            ]
        ],
        'user/plugins' => [
            'plugins/markdown-notices' => [
                'file' => 'user/plugins/markdown-notices/markdown-notices.yaml',
                'modified' => 1621433531
            ],
            'plugins/form' => [
                'file' => 'user/plugins/form/form.yaml',
                'modified' => 1621433530
            ],
            'plugins/highlight' => [
                'file' => 'user/plugins/highlight/highlight.yaml',
                'modified' => 1621433530
            ],
            'plugins/flex-objects' => [
                'file' => 'user/plugins/flex-objects/flex-objects.yaml',
                'modified' => 1621433530
            ],
            'plugins/admin' => [
                'file' => 'user/plugins/admin/admin.yaml',
                'modified' => 1621433530
            ],
            'plugins/problems' => [
                'file' => 'user/plugins/problems/problems.yaml',
                'modified' => 1621433531
            ],
            'plugins/backtotop' => [
                'file' => 'user/plugins/backtotop/backtotop.yaml',
                'modified' => 1621433530
            ],
            'plugins/prism-highlight' => [
                'file' => 'user/plugins/prism-highlight/prism-highlight.yaml',
                'modified' => 1621433531
            ],
            'plugins/error' => [
                'file' => 'user/plugins/error/error.yaml',
                'modified' => 1621433530
            ],
            'plugins/login' => [
                'file' => 'user/plugins/login/login.yaml',
                'modified' => 1621433530
            ],
            'plugins/email' => [
                'file' => 'user/plugins/email/email.yaml',
                'modified' => 1621433530
            ]
        ],
        'user/themes' => [
            'themes/g5_hydrogen' => [
                'file' => 'user/themes/g5_hydrogen/g5_hydrogen.yaml',
                'modified' => 1621433531
            ],
            'themes/deliver' => [
                'file' => 'user/themes/deliver/deliver.yaml',
                'modified' => 1621433531
            ],
            'themes/quark' => [
                'file' => 'user/themes/quark/quark.yaml',
                'modified' => 1621433531
            ]
        ]
    ],
    'data' => [
        'themes' => [
            'g5_hydrogen' => [
                'enabled' => true
            ],
            'deliver' => [
                'enabled' => true,
                'dropdown' => [
                    'enabled' => false
                ],
                'sticky_menu' => [
                    'enabled' => false
                ]
            ],
            'quark' => [
                'enabled' => true,
                'production-mode' => true,
                'grid-size' => 'grid-lg',
                'header-fixed' => true,
                'header-animated' => true,
                'header-dark' => false,
                'header-transparent' => false,
                'sticky-footer' => true,
                'blog-page' => '/blog',
                'spectre' => [
                    'exp' => false,
                    'icons' => false
                ],
                'custom_logo' => [
                    'user/themes/quark/images/logo/candle.png' => [
                        'name' => 'candle.png',
                        'type' => 'image/png',
                        'size' => 2984,
                        'path' => 'user/themes/quark/images/logo/candle.png'
                    ]
                ],
                'custom_logo_mobile' => [
                    
                ]
            ]
        ],
        'plugins' => [
            'markdown-notices' => [
                'enabled' => true,
                'built_in_css' => true,
                'base_classes' => 'notices',
                'level_classes' => [
                    0 => 'yellow',
                    1 => 'red',
                    2 => 'blue',
                    3 => 'green'
                ]
            ],
            'form' => [
                'enabled' => true,
                'built_in_css' => true,
                'inline_css' => true,
                'refresh_prevention' => false,
                'client_side_validation' => true,
                'inline_errors' => false,
                'files' => [
                    'multiple' => false,
                    'limit' => 10,
                    'destination' => 'self@',
                    'avoid_overwriting' => false,
                    'random_name' => false,
                    'filesize' => 0,
                    'accept' => [
                        0 => 'image/*'
                    ]
                ],
                'recaptcha' => [
                    'version' => '2-checkbox',
                    'theme' => 'light',
                    'site_key' => NULL,
                    'secret_key' => NULL
                ]
            ],
            'highlight' => [
                'enabled' => true,
                'theme' => 'monokai',
                'lines' => true
            ],
            'flex-objects' => [
                'enabled' => true,
                'built_in_css' => true,
                'extra_admin_twig_path' => 'theme://admin/templates',
                'admin_list' => [
                    'per_page' => 15,
                    'order' => [
                        'by' => 'updated_timestamp',
                        'dir' => 'desc'
                    ]
                ],
                'directories' => [
                    0 => 'blueprints://flex-objects/pages.yaml',
                    1 => 'blueprints://flex-objects/user-accounts.yaml',
                    2 => 'blueprints://flex-objects/user-groups.yaml'
                ]
            ],
            'admin' => [
                'enabled' => true,
                'route' => '/admin',
                'cache_enabled' => true,
                'theme' => 'grav',
                'logo_text' => '',
                'body_classes' => '',
                'content_padding' => true,
                'twofa_enabled' => true,
                'sidebar' => [
                    'activate' => 'tab',
                    'hover_delay' => 100,
                    'size' => 'auto'
                ],
                'dashboard' => [
                    'days_of_stats' => 7
                ],
                'widgets_display' => [
                    'dashboard-maintenance' => true,
                    'dashboard-statistics' => true,
                    'dashboard-notifications' => true,
                    'dashboard-feed' => true,
                    'dashboard-pages' => true
                ],
                'pages' => [
                    'show_parents' => 'both',
                    'show_modular' => true
                ],
                'session' => [
                    'timeout' => 1800
                ],
                'edit_mode' => 'normal',
                'frontend_preview_target' => 'inline',
                'show_github_msg' => true,
                'pages_list_display_field' => 'title',
                'admin_icons' => 'line-awesome',
                'enable_auto_updates_check' => true,
                'notifications' => [
                    'feed' => true,
                    'dashboard' => true,
                    'plugins' => true,
                    'themes' => true
                ],
                'popularity' => [
                    'enabled' => true,
                    'ignore' => [
                        0 => '/test*',
                        1 => '/modular'
                    ],
                    'history' => [
                        'daily' => 30,
                        'monthly' => 12,
                        'visitors' => 20
                    ]
                ],
                'whitelabel' => [
                    'quicktray_recompile' => false,
                    'codemirror_theme' => 'paper',
                    'codemirror_fontsize' => 'md',
                    'codemirror_md_font' => 'sans',
                    'logo_custom' => NULL,
                    'logo_login' => NULL,
                    'color_scheme' => [
                        'accents' => [
                            'primary-accent' => 'button',
                            'secondary-accent' => 'notice',
                            'tertiary-accent' => 'critical'
                        ],
                        'colors' => [
                            'logo-bg' => '#323640',
                            'logo-link' => '#FFFFFF',
                            'nav-bg' => '#3D424E',
                            'nav-text' => '#B7B9BD',
                            'nav-link' => '#ffffff',
                            'nav-selected-bg' => '#323640',
                            'nav-selected-link' => '#ffffff',
                            'nav-hover-bg' => '#434753',
                            'nav-hover-link' => '#ffffff',
                            'toolbar-bg' => '#ffffff',
                            'toolbar-text' => '#3D424E',
                            'page-bg' => '#F6F6F6',
                            'page-text' => '#6f7b8a',
                            'page-link' => '#0090D9',
                            'content-bg' => '#ffffff',
                            'content-text' => '#6f7b8a',
                            'content-link' => '#0090D9',
                            'content-link2' => '#da4b46',
                            'content-header' => '#414147',
                            'content-tabs-bg' => '#e6e6e6',
                            'content-tabs-text' => '#808080',
                            'button-bg' => '#0090D9',
                            'button-text' => '#ffffff',
                            'notice-bg' => '#06A599',
                            'notice-text' => '#ffffff',
                            'update-bg' => '#77559D',
                            'update-text' => '#ffffff',
                            'critical-bg' => '#F45857',
                            'critical-text' => '#ffffff'
                        ]
                    ]
                ]
            ],
            'problems' => [
                'enabled' => true,
                'built_in_css' => true
            ],
            'backtotop' => [
                'enabled' => true,
                'fontawesome_icons' => true,
                'fontawesome_css' => true
            ],
            'prism-highlight' => [
                'enabled' => false,
                'theme' => 'prism-base16-ocean.dark.css',
                'all-pre-blocks' => true,
                'plugins' => [
                    'line-numbers' => false,
                    'command-line' => false,
                    'command-line-prompt' => '$'
                ]
            ],
            'error' => [
                'enabled' => true,
                'routes' => [
                    404 => '/error'
                ]
            ],
            'login' => [
                'enabled' => true,
                'built_in_css' => true,
                'redirect_to_login' => false,
                'redirect_after_login' => false,
                'redirect_after_logout' => true,
                'session_user_sync' => false,
                'route' => '/login',
                'route_after_login' => '/',
                'route_after_logout' => '/',
                'route_activate' => '/activate_user',
                'route_forgot' => '/forgot_password',
                'route_reset' => '/reset_password',
                'route_profile' => '/user_profile',
                'route_register' => '/user_register',
                'route_unauthorized' => '/user_unauthorized',
                'twofa_enabled' => false,
                'dynamic_page_visibility' => false,
                'parent_acl' => false,
                'protect_protected_page_media' => false,
                'rememberme' => [
                    'enabled' => true,
                    'timeout' => 604800,
                    'name' => 'grav-rememberme'
                ],
                'max_pw_resets_count' => 2,
                'max_pw_resets_interval' => 60,
                'max_login_count' => 5,
                'max_login_interval' => 10,
                'ipv6_subnet_size' => 64,
                'user_registration' => [
                    'enabled' => false,
                    'fields' => [
                        0 => 'username',
                        1 => 'password',
                        2 => 'email',
                        3 => 'fullname',
                        4 => 'title',
                        5 => 'level',
                        6 => 'twofa_enabled'
                    ],
                    'default_values' => [
                        'level' => 'Newbie'
                    ],
                    'access' => [
                        'site' => [
                            'login' => 'true'
                        ]
                    ],
                    'redirect_after_registration' => '',
                    'redirect_after_activation' => '',
                    'options' => [
                        'validate_password1_and_password2' => true,
                        'set_user_disabled' => false,
                        'login_after_registration' => false,
                        'send_activation_email' => false,
                        'manually_enable' => false,
                        'send_notification_email' => false,
                        'send_welcome_email' => false
                    ]
                ]
            ],
            'email' => [
                'enabled' => true,
                'from' => NULL,
                'from_name' => NULL,
                'to' => NULL,
                'to_name' => NULL,
                'queue' => [
                    'enabled' => false,
                    'flush_frequency' => '* * * * *',
                    'flush_msg_limit' => 10,
                    'flush_time_limit' => 100
                ],
                'mailer' => [
                    'engine' => 'sendmail',
                    'smtp' => [
                        'server' => 'localhost',
                        'port' => 25,
                        'encryption' => 'none',
                        'user' => '',
                        'password' => '',
                        'auth_mode' => ''
                    ],
                    'sendmail' => [
                        'bin' => '/usr/sbin/sendmail -bs'
                    ]
                ],
                'content_type' => 'text/html',
                'debug' => false
            ]
        ],
        'backups' => [
            'purge' => [
                'trigger' => 'space',
                'max_backups_count' => 25,
                'max_backups_space' => 5,
                'max_backups_time' => 365
            ],
            'profiles' => [
                0 => [
                    'name' => 'Default Site Backup',
                    'root' => '/',
                    'schedule' => false,
                    'schedule_at' => '0 3 * * *',
                    'exclude_paths' => '/backup
/cache
/images
/logs
/tmp',
                    'exclude_files' => '.DS_Store
.git
.svn
.hg
.idea
.vscode
node_modules'
                ]
            ]
        ],
        'media' => [
            'types' => [
                'defaults' => [
                    'type' => 'file',
                    'thumb' => 'media/thumb.png',
                    'mime' => 'application/octet-stream',
                    'image' => [
                        'filters' => [
                            'default' => [
                                0 => 'enableProgressive'
                            ]
                        ]
                    ]
                ],
                'jpg' => [
                    'type' => 'image',
                    'thumb' => 'media/thumb-jpg.png',
                    'mime' => 'image/jpeg'
                ],
                'jpe' => [
                    'type' => 'image',
                    'thumb' => 'media/thumb-jpg.png',
                    'mime' => 'image/jpeg'
                ],
                'jpeg' => [
                    'type' => 'image',
                    'thumb' => 'media/thumb-jpg.png',
                    'mime' => 'image/jpeg'
                ],
                'png' => [
                    'type' => 'image',
                    'thumb' => 'media/thumb-png.png',
                    'mime' => 'image/png'
                ],
                'webp' => [
                    'type' => 'image',
                    'thumb' => 'media/thumb-webp.png',
                    'mime' => 'image/webp'
                ],
                'gif' => [
                    'type' => 'animated',
                    'thumb' => 'media/thumb-gif.png',
                    'mime' => 'image/gif'
                ],
                'svg' => [
                    'type' => 'vector',
                    'thumb' => 'media/thumb-svg.png',
                    'mime' => 'image/svg+xml'
                ],
                'mp4' => [
                    'type' => 'video',
                    'thumb' => 'media/thumb-mp4.png',
                    'mime' => 'video/mp4'
                ],
                'mov' => [
                    'type' => 'video',
                    'thumb' => 'media/thumb-mov.png',
                    'mime' => 'video/quicktime'
                ],
                'm4v' => [
                    'type' => 'video',
                    'thumb' => 'media/thumb-m4v.png',
                    'mime' => 'video/x-m4v'
                ],
                'swf' => [
                    'type' => 'video',
                    'thumb' => 'media/thumb-swf.png',
                    'mime' => 'video/x-flv'
                ],
                'flv' => [
                    'type' => 'video',
                    'thumb' => 'media/thumb-flv.png',
                    'mime' => 'video/x-flv'
                ],
                'webm' => [
                    'type' => 'video',
                    'thumb' => 'media/thumb-webm.png',
                    'mime' => 'video/webm'
                ],
                'ogv' => [
                    'type' => 'video',
                    'thumb' => 'media/thumb-ogg.png',
                    'mime' => 'video/ogg'
                ],
                'mp3' => [
                    'type' => 'audio',
                    'thumb' => 'media/thumb-mp3.png',
                    'mime' => 'audio/mp3'
                ],
                'ogg' => [
                    'type' => 'audio',
                    'thumb' => 'media/thumb-ogg.png',
                    'mime' => 'audio/ogg'
                ],
                'wma' => [
                    'type' => 'audio',
                    'thumb' => 'media/thumb-wma.png',
                    'mime' => 'audio/wma'
                ],
                'm4a' => [
                    'type' => 'audio',
                    'thumb' => 'media/thumb-m4a.png',
                    'mime' => 'audio/m4a'
                ],
                'wav' => [
                    'type' => 'audio',
                    'thumb' => 'media/thumb-wav.png',
                    'mime' => 'audio/wav'
                ],
                'aiff' => [
                    'type' => 'audio',
                    'thumb' => 'media/thumb-aif.png',
                    'mime' => 'audio/aiff'
                ],
                'aif' => [
                    'type' => 'audio',
                    'thumb' => 'media/thumb-aif.png',
                    'mime' => 'audio/aif'
                ],
                'txt' => [
                    'type' => 'file',
                    'thumb' => 'media/thumb-txt.png',
                    'mime' => 'text/plain'
                ],
                'xml' => [
                    'type' => 'file',
                    'thumb' => 'media/thumb-xml.png',
                    'mime' => 'application/xml'
                ],
                'doc' => [
                    'type' => 'file',
                    'thumb' => 'media/thumb-doc.png',
                    'mime' => 'application/msword'
                ],
                'docx' => [
                    'type' => 'file',
                    'thumb' => 'media/thumb-docx.png',
                    'mime' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
                ],
                'xls' => [
                    'type' => 'file',
                    'thumb' => 'media/thumb-xls.png',
                    'mime' => 'application/vnd.ms-excel'
                ],
                'xlsx' => [
                    'type' => 'file',
                    'thumb' => 'media/thumb-xlsx.png',
                    'mime' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
                ],
                'ppt' => [
                    'type' => 'file',
                    'thumb' => 'media/thumb-ppt.png',
                    'mime' => 'application/vnd.ms-powerpoint'
                ],
                'pptx' => [
                    'type' => 'file',
                    'thumb' => 'media/thumb-pptx.png',
                    'mime' => 'application/vnd.openxmlformats-officedocument.presentationml.presentation'
                ],
                'pps' => [
                    'type' => 'file',
                    'thumb' => 'media/thumb-pps.png',
                    'mime' => 'application/vnd.ms-powerpoint'
                ],
                'rtf' => [
                    'type' => 'file',
                    'thumb' => 'media/thumb-rtf.png',
                    'mime' => 'application/rtf'
                ],
                'bmp' => [
                    'type' => 'file',
                    'thumb' => 'media/thumb-bmp.png',
                    'mime' => 'image/bmp'
                ],
                'tiff' => [
                    'type' => 'file',
                    'thumb' => 'media/thumb-tiff.png',
                    'mime' => 'image/tiff'
                ],
                'mpeg' => [
                    'type' => 'file',
                    'thumb' => 'media/thumb-mpg.png',
                    'mime' => 'video/mpeg'
                ],
                'mpg' => [
                    'type' => 'file',
                    'thumb' => 'media/thumb-mpg.png',
                    'mime' => 'video/mpeg'
                ],
                'mpe' => [
                    'type' => 'file',
                    'thumb' => 'media/thumb-mpe.png',
                    'mime' => 'video/mpeg'
                ],
                'avi' => [
                    'type' => 'file',
                    'thumb' => 'media/thumb-avi.png',
                    'mime' => 'video/msvideo'
                ],
                'wmv' => [
                    'type' => 'file',
                    'thumb' => 'media/thumb-wmv.png',
                    'mime' => 'video/x-ms-wmv'
                ],
                'html' => [
                    'type' => 'file',
                    'thumb' => 'media/thumb-html.png',
                    'mime' => 'text/html'
                ],
                'htm' => [
                    'type' => 'file',
                    'thumb' => 'media/thumb-html.png',
                    'mime' => 'text/html'
                ],
                'ics' => [
                    'type' => 'iCal',
                    'thumb' => 'media/thumb-ics.png',
                    'mime' => 'text/calendar'
                ],
                'pdf' => [
                    'type' => 'file',
                    'thumb' => 'media/thumb-pdf.png',
                    'mime' => 'application/pdf'
                ],
                'ai' => [
                    'type' => 'file',
                    'thumb' => 'media/thumb-ai.png',
                    'mime' => 'image/ai'
                ],
                'psd' => [
                    'type' => 'file',
                    'thumb' => 'media/thumb-psd.png',
                    'mime' => 'image/psd'
                ],
                'zip' => [
                    'type' => 'file',
                    'thumb' => 'media/thumb-zip.png',
                    'mime' => 'application/zip'
                ],
                '7z' => [
                    'type' => 'file',
                    'thumb' => 'media/thumb-7z.png',
                    'mime' => 'application/x-7z-compressed'
                ],
                'gz' => [
                    'type' => 'file',
                    'thumb' => 'media/thumb-gz.png',
                    'mime' => 'application/gzip'
                ],
                'tar' => [
                    'type' => 'file',
                    'thumb' => 'media/thumb-tar.png',
                    'mime' => 'application/x-tar'
                ],
                'css' => [
                    'type' => 'file',
                    'thumb' => 'media/thumb-css.png',
                    'mime' => 'text/css'
                ],
                'js' => [
                    'type' => 'file',
                    'thumb' => 'media/thumb-js.png',
                    'mime' => 'application/javascript'
                ],
                'json' => [
                    'type' => 'file',
                    'thumb' => 'media/thumb-json.png',
                    'mime' => 'application/json'
                ]
            ]
        ],
        'permissions' => [
            'actions' => [
                'site' => [
                    'type' => 'access',
                    'label' => 'Site'
                ],
                'admin' => [
                    'type' => 'access',
                    'label' => 'Admin'
                ],
                'admin.pages' => [
                    'type' => 'access',
                    'label' => 'Pages'
                ],
                'admin.users' => [
                    'type' => 'access',
                    'label' => 'User Accounts'
                ]
            ],
            'types' => [
                'default' => [
                    'type' => 'access'
                ],
                'crud' => [
                    'type' => 'compact',
                    'letters' => [
                        'c' => [
                            'action' => 'create',
                            'label' => 'PLUGIN_ADMIN.CREATE'
                        ],
                        'r' => [
                            'action' => 'read',
                            'label' => 'PLUGIN_ADMIN.READ'
                        ],
                        'u' => [
                            'action' => 'update',
                            'label' => 'PLUGIN_ADMIN.UPDATE'
                        ],
                        'd' => [
                            'action' => 'delete',
                            'label' => 'PLUGIN_ADMIN.DELETE'
                        ]
                    ]
                ],
                'crudp' => [
                    'type' => 'crud',
                    'letters' => [
                        'p' => [
                            'action' => 'publish',
                            'label' => 'PLUGIN_ADMIN.PUBLISH'
                        ]
                    ]
                ],
                'crudl' => [
                    'type' => 'crud',
                    'letters' => [
                        'l' => [
                            'action' => 'list',
                            'label' => 'PLUGIN_ADMIN.LIST'
                        ]
                    ]
                ],
                'crudpl' => [
                    'type' => 'crud',
                    'use' => [
                        0 => 'crudp',
                        1 => 'crudl'
                    ]
                ]
            ]
        ],
        'security' => [
            'xss_whitelist' => [
                0 => 'admin.super'
            ],
            'xss_enabled' => [
                'on_events' => true,
                'invalid_protocols' => true,
                'moz_binding' => true,
                'html_inline_styles' => true,
                'dangerous_tags' => true
            ],
            'xss_invalid_protocols' => [
                0 => 'javascript',
                1 => 'livescript',
                2 => 'vbscript',
                3 => 'mocha',
                4 => 'feed',
                5 => 'data'
            ],
            'xss_dangerous_tags' => [
                0 => 'applet',
                1 => 'meta',
                2 => 'xml',
                3 => 'blink',
                4 => 'link',
                5 => 'style',
                6 => 'script',
                7 => 'embed',
                8 => 'object',
                9 => 'iframe',
                10 => 'frame',
                11 => 'frameset',
                12 => 'ilayer',
                13 => 'layer',
                14 => 'bgsound',
                15 => 'title',
                16 => 'base'
            ],
            'uploads_dangerous_extensions' => [
                0 => 'php',
                1 => 'html',
                2 => 'htm',
                3 => 'js',
                4 => 'exe'
            ],
            'sanitize_svg' => true,
            'salt' => 'tVEpP8nFlCXB7O'
        ],
        'site' => [
            'title' => 'Grav',
            'default_lang' => 'en',
            'author' => [
                'name' => 'Joe Bloggs',
                'email' => 'joe@example.com'
            ],
            'taxonomies' => [
                0 => 'category',
                1 => 'tag'
            ],
            'metadata' => [
                'description' => 'Grav is an easy to use, yet powerful, open source flat-file CMS'
            ],
            'summary' => [
                'enabled' => true,
                'format' => 'short',
                'size' => 300,
                'delimiter' => '==='
            ],
            'redirects' => NULL,
            'routes' => NULL,
            'blog' => [
                'route' => '/blog'
            ]
        ],
        'system' => [
            'absolute_urls' => false,
            'timezone' => NULL,
            'default_locale' => NULL,
            'param_sep' => ':',
            'wrapped_site' => false,
            'reverse_proxy_setup' => false,
            'force_ssl' => false,
            'force_lowercase_urls' => true,
            'custom_base_url' => NULL,
            'username_regex' => '^[a-z0-9_-]{3,16}$',
            'pwd_regex' => '(?=.*\\d)(?=.*[a-z])(?=.*[A-Z]).{8,}',
            'intl_enabled' => true,
            'http_x_forwarded' => [
                'protocol' => true,
                'host' => false,
                'port' => true,
                'ip' => true
            ],
            'languages' => [
                'supported' => NULL,
                'default_lang' => NULL,
                'include_default_lang' => true,
                'include_default_lang_file_extension' => true,
                'translations' => true,
                'translations_fallback' => true,
                'session_store_active' => false,
                'http_accept_language' => false,
                'override_locale' => false,
                'content_fallback' => [
                    
                ],
                'pages_fallback_only' => false
            ],
            'home' => [
                'alias' => '/home',
                'hide_in_urls' => false
            ],
            'pages' => [
                'type' => 'regular',
                'theme' => 'quark',
                'order' => [
                    'by' => 'default',
                    'dir' => 'asc'
                ],
                'list' => [
                    'count' => 20
                ],
                'dateformat' => [
                    'default' => NULL,
                    'short' => 'jS M Y',
                    'long' => 'F jS \\a\\t g:ia'
                ],
                'publish_dates' => true,
                'process' => [
                    'markdown' => true,
                    'twig' => false
                ],
                'twig_first' => false,
                'never_cache_twig' => false,
                'events' => [
                    'page' => true,
                    'twig' => true
                ],
                'markdown' => [
                    'extra' => false,
                    'auto_line_breaks' => false,
                    'auto_url_links' => false,
                    'escape_markup' => false,
                    'special_chars' => [
                        '>' => 'gt',
                        '<' => 'lt'
                    ],
                    'valid_link_attributes' => [
                        0 => 'rel',
                        1 => 'target',
                        2 => 'id',
                        3 => 'class',
                        4 => 'classes'
                    ]
                ],
                'types' => [
                    0 => 'html',
                    1 => 'htm',
                    2 => 'xml',
                    3 => 'txt',
                    4 => 'json',
                    5 => 'rss',
                    6 => 'atom'
                ],
                'append_url_extension' => NULL,
                'expires' => 604800,
                'cache_control' => NULL,
                'last_modified' => false,
                'etag' => true,
                'vary_accept_encoding' => false,
                'redirect_default_code' => '302',
                'redirect_trailing_slash' => 1,
                'redirect_default_route' => 0,
                'ignore_files' => [
                    0 => '.DS_Store'
                ],
                'ignore_folders' => [
                    0 => '.git',
                    1 => '.idea'
                ],
                'ignore_hidden' => true,
                'hide_empty_folders' => false,
                'url_taxonomy_filters' => true,
                'frontmatter' => [
                    'process_twig' => false,
                    'ignore_fields' => [
                        0 => 'form',
                        1 => 'forms'
                    ]
                ]
            ],
            'cache' => [
                'enabled' => true,
                'check' => [
                    'method' => 'file'
                ],
                'driver' => 'auto',
                'prefix' => 'g',
                'purge_at' => '0 4 * * *',
                'clear_at' => '0 3 * * *',
                'clear_job_type' => 'standard',
                'clear_images_by_default' => true,
                'cli_compatibility' => false,
                'lifetime' => 604800,
                'gzip' => false,
                'allow_webserver_gzip' => false,
                'redis' => [
                    'socket' => '0',
                    'password' => NULL,
                    'database' => NULL,
                    'server' => NULL,
                    'port' => NULL
                ],
                'memcache' => [
                    'server' => NULL,
                    'port' => NULL
                ],
                'memcached' => [
                    'server' => NULL,
                    'port' => NULL
                ]
            ],
            'twig' => [
                'cache' => true,
                'debug' => true,
                'auto_reload' => true,
                'autoescape' => true,
                'undefined_functions' => true,
                'undefined_filters' => true,
                'safe_functions' => [
                    
                ],
                'safe_filters' => [
                    
                ],
                'umask_fix' => false
            ],
            'assets' => [
                'css_pipeline' => false,
                'css_pipeline_include_externals' => true,
                'css_pipeline_before_excludes' => true,
                'css_minify' => true,
                'css_minify_windows' => false,
                'css_rewrite' => true,
                'js_pipeline' => false,
                'js_pipeline_include_externals' => true,
                'js_pipeline_before_excludes' => true,
                'js_minify' => true,
                'enable_asset_timestamp' => false,
                'enable_asset_sri' => false,
                'collections' => [
                    'jquery' => 'system://assets/jquery/jquery-2.x.min.js'
                ]
            ],
            'errors' => [
                'display' => 1,
                'log' => true
            ],
            'log' => [
                'handler' => 'file',
                'syslog' => [
                    'facility' => 'local6'
                ]
            ],
            'debugger' => [
                'enabled' => false,
                'provider' => 'clockwork',
                'censored' => false,
                'shutdown' => [
                    'close_connection' => true
                ],
                'twig' => true
            ],
            'images' => [
                'default_image_quality' => 85,
                'cache_all' => false,
                'cache_perms' => '0755',
                'debug' => false,
                'auto_fix_orientation' => true,
                'seofriendly' => false,
                'cls' => [
                    'auto_sizes' => false,
                    'aspect_ratio' => false,
                    'retina_scale' => '1'
                ],
                'defaults' => [
                    'loading' => 'auto'
                ]
            ],
            'media' => [
                'enable_media_timestamp' => false,
                'unsupported_inline_types' => NULL,
                'allowed_fallback_types' => NULL,
                'auto_metadata_exif' => false,
                'upload_limit' => 2097152
            ],
            'session' => [
                'enabled' => true,
                'initialize' => true,
                'timeout' => 1800,
                'name' => 'grav-site',
                'uniqueness' => 'path',
                'secure' => false,
                'httponly' => true,
                'samesite' => 'Lax',
                'split' => true,
                'domain' => NULL,
                'path' => NULL
            ],
            'gpm' => [
                'releases' => 'stable',
                'proxy_url' => NULL,
                'method' => 'auto',
                'verify_peer' => true,
                'official_gpm_only' => true
            ],
            'accounts' => [
                'type' => 'regular',
                'storage' => 'file'
            ],
            'flex' => [
                'cache' => [
                    'index' => [
                        'enabled' => true,
                        'lifetime' => 60
                    ],
                    'object' => [
                        'enabled' => true,
                        'lifetime' => 600
                    ],
                    'render' => [
                        'enabled' => true,
                        'lifetime' => 600
                    ]
                ]
            ],
            'strict_mode' => [
                'yaml_compat' => false,
                'twig_compat' => false,
                'blueprint_compat' => false
            ]
        ],
        'versions' => [
            'core' => [
                'grav' => [
                    'version' => '1.7.16',
                    'schema' => '1.7.0_2020-11-20_1',
                    'history' => [
                        0 => [
                            'version' => '1.7.16',
                            'date' => '2021-06-14 14:44:55'
                        ]
                    ]
                ]
            ]
        ]
    ]
];
