<?php
return [
    '@class' => 'Grav\\Common\\File\\CompiledYamlFile',
    'filename' => '/Users/jonatan/Downloads/grav-admin/system/languages/sk.yaml',
    'modified' => 1617729503,
    'data' => [
        'GRAV' => [
            'FRONTMATTER_ERROR_PAGE' => '---
title: %1$s
---

# Chyba: Chybný frontmatter

Path: `%2$s`

**%3$s**

```
%4$s
```',
            'INFLECTOR_PLURALS' => [
                '/(quiz)$/i' => '\\1zes',
                '/^(ox)$/i' => '\\1en',
                '/([m|l])ouse$/i' => '\\1ice',
                '/(matr|vert|ind)ix|ex$/i' => '\\1ices',
                '/(x|ch|ss|sh)$/i' => '\\1es',
                '/([^aeiouy]|qu)ies$/i' => '\\1y',
                '/([^aeiouy]|qu)y$/i' => '\\1ies',
                '/(hive)$/i' => '\\1s',
                '/(?:([^f])fe|([lr])f)$/i' => '\\1\\2ves',
                '/sis$/i' => 'ses',
                '/([ti])um$/i' => '\\1a',
                '/(buffal|tomat)o$/i' => '\\1oes',
                '/(bu)s$/i' => '\\1ses',
                '/(alias|status)/i' => '\\1es',
                '/(octop|vir)us$/i' => '\\1i',
                '/(ax|test)is$/i' => '\\1es',
                '/s$/i' => 's',
                '/$/' => 's'
            ],
            'INFLECTOR_SINGULAR' => [
                '/(quiz)zes$/i' => '\\1',
                '/(matr)ices$/i' => '\\1ix',
                '/(vert|ind)ices$/i' => '\\1ex',
                '/^(ox)en/i' => '\\1',
                '/(alias|status)es$/i' => '\\1',
                '/([octop|vir])i$/i' => '\\1us',
                '/(cris|ax|test)es$/i' => '\\1is',
                '/(shoe)s$/i' => '\\1',
                '/(o)es$/i' => '\\1',
                '/(bus)es$/i' => '\\1',
                '/([m|l])ice$/i' => '\\1ouse',
                '/(x|ch|ss|sh)es$/i' => '\\1',
                '/(m)ovies$/i' => '\\1ovie',
                '/(s)eries$/i' => '\\1eries',
                '/([^aeiouy]|qu)ies$/i' => '\\1y',
                '/([lr])ves$/i' => '\\1f',
                '/(tive)s$/i' => '\\1',
                '/(hive)s$/i' => '\\1',
                '/([^f])ves$/i' => '\\1fe',
                '/(^analy)ses$/i' => '\\1sis',
                '/((a)naly|(b)a|(d)iagno|(p)arenthe|(p)rogno|(s)ynop|(t)he)ses$/i' => '\\1\\2sis',
                '/([ti])a$/i' => '\\1um',
                '/(n)ews$/i' => '\\1ews'
            ],
            'INFLECTOR_UNCOUNTABLE' => [
                0 => 'vybavenie',
                1 => 'informácie',
                2 => 'ryža',
                3 => 'peniaze',
                4 => 'druhy',
                5 => 'séria',
                6 => 'ryba',
                7 => 'ovce'
            ],
            'INFLECTOR_IRREGULAR' => [
                'person' => 'ľudia',
                'man' => 'muži',
                'child' => 'deti',
                'sex' => 'pohlavia',
                'move' => 'pohyby'
            ],
            'INFLECTOR_ORDINALS' => [
                'default' => '.',
                'first' => '.',
                'second' => '.',
                'third' => '.'
            ],
            'NICETIME' => [
                'NO_DATE_PROVIDED' => 'Neposkytnutý žiaden dátum',
                'BAD_DATE' => 'Nesprávny dátum',
                'AGO' => 'pred',
                'FROM_NOW' => 'odteraz',
                'JUST_NOW' => 'práve teraz',
                'SECOND' => 'sekunda',
                'MINUTE' => 'minúta',
                'HOUR' => 'hodina',
                'DAY' => 'deň',
                'WEEK' => 'týždeň',
                'MONTH' => 'mesiac',
                'YEAR' => 'rok',
                'DECADE' => 'desaťročie',
                'SEC' => 'sek',
                'MIN' => 'min',
                'HR' => 'hod',
                'WK' => 't',
                'MO' => 'm',
                'YR' => 'r',
                'DEC' => 'dec',
                'SECOND_PLURAL' => 'sekúnd',
                'MINUTE_PLURAL' => 'minút',
                'HOUR_PLURAL' => 'hodín',
                'DAY_PLURAL' => 'dní',
                'WEEK_PLURAL' => 'týždňov',
                'MONTH_PLURAL' => 'mesiacov',
                'YEAR_PLURAL' => 'rokov',
                'DECADE_PLURAL' => 'dekád',
                'SEC_PLURAL' => 'sek',
                'MIN_PLURAL' => 'min',
                'HR_PLURAL' => 'hod',
                'WK_PLURAL' => 't',
                'MO_PLURAL' => 'mes.',
                'YR_PLURAL' => 'rokov',
                'DEC_PLURAL' => 'dekád'
            ],
            'FORM' => [
                'VALIDATION_FAIL' => '<b>Overenie zlyhalo:</b>',
                'INVALID_INPUT' => 'Neplatný vstup v',
                'MISSING_REQUIRED_FIELD' => 'Chýba vyžadované pole:'
            ],
            'MONTHS_OF_THE_YEAR' => [
                0 => 'Január',
                1 => 'Február',
                2 => 'Marec',
                3 => 'Apríl',
                4 => 'Máj',
                5 => 'Jún',
                6 => 'Júl',
                7 => 'August',
                8 => 'September',
                9 => 'Október',
                10 => 'November',
                11 => 'December'
            ],
            'DAYS_OF_THE_WEEK' => [
                0 => 'Pondelok',
                1 => 'Utorok',
                2 => 'Streda',
                3 => 'Štvrtok',
                4 => 'Piatok',
                5 => 'Sobota',
                6 => 'Nedeľa'
            ],
            'CRON' => [
                'EVERY' => 'každý',
                'EVERY_HOUR' => 'každú hodinu',
                'EVERY_MINUTE' => 'každú minútu',
                'EVERY_DAY_OF_WEEK' => 'každý deň v týždni',
                'EVERY_DAY_OF_MONTH' => 'každý deň v mesiaci',
                'EVERY_MONTH' => 'každý mesiac',
                'TEXT_PERIOD' => 'Každý <b />',
                'TEXT_MINS' => ' at <b /> minute(s) past the hour',
                'TEXT_TIME' => ' at <b />:<b />',
                'TEXT_DOW' => ' on <b />',
                'TEXT_MONTH' => ' of <b />',
                'TEXT_DOM' => ' on <b />',
                'ERROR1' => 'Tag %s nieje podporovaný!',
                'ERROR2' => 'Chybný počet položiek',
                'ERROR3' => 'jquery_element musí byť nastavený v nastaveniach pre jqCron',
                'ERROR4' => 'Neznámy výraz'
            ]
        ]
    ]
];
