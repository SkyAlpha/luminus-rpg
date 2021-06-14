<?php
return [
    '@class' => 'Grav\\Common\\File\\CompiledYamlFile',
    'filename' => '/Users/jonatan/Documents/Projects/games/collision/tutorial-admin/system/languages/cs.yaml',
    'modified' => 1622714294,
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
                0 => 'vybavení',
                1 => 'informace',
                2 => 'rýže',
                3 => 'peníze',
                4 => 'druhy',
                5 => 'série',
                6 => 'ryba',
                7 => 'ovce'
            ],
            'INFLECTOR_IRREGULAR' => [
                'person' => 'lidé',
                'man' => 'muži',
                'child' => 'děti',
                'sex' => 'pohlaví',
                'move' => 'pohyby'
            ],
            'INFLECTOR_ORDINALS' => [
                'default' => '.',
                'first' => '.',
                'second' => '.',
                'third' => '.'
            ],
            'NICETIME' => [
                'NO_DATE_PROVIDED' => 'Datum nebylo vloženo',
                'BAD_DATE' => 'Chybné datum',
                'AGO' => 'zpět',
                'FROM_NOW' => 'od teď',
                'JUST_NOW' => 'právě teď',
                'SECOND' => 'sekunda',
                'MINUTE' => 'minuta',
                'HOUR' => 'hodina',
                'DAY' => 'den',
                'WEEK' => 'týden',
                'MONTH' => 'měsíc',
                'YEAR' => 'rok',
                'DECADE' => 'dekáda',
                'SEC' => 'sek',
                'MIN' => 'min',
                'HR' => 'hod',
                'WK' => 't',
                'MO' => 'm',
                'YR' => 'r',
                'DEC' => 'dek',
                'SECOND_PLURAL' => 'sekundy',
                'MINUTE_PLURAL' => 'minuty',
                'HOUR_PLURAL' => 'hodiny',
                'DAY_PLURAL' => 'dny',
                'WEEK_PLURAL' => 'týdny',
                'MONTH_PLURAL' => 'měsíce',
                'YEAR_PLURAL' => 'roky',
                'DECADE_PLURAL' => 'dekády',
                'SEC_PLURAL' => 'sek',
                'MIN_PLURAL' => 'min',
                'HR_PLURAL' => 'hod',
                'WK_PLURAL' => 't',
                'MO_PLURAL' => 'm',
                'YR_PLURAL' => 'r',
                'DEC_PLURAL' => 'dek'
            ],
            'FORM' => [
                'VALIDATION_FAIL' => '<b>Ověření se nezdařilo:</b>',
                'INVALID_INPUT' => 'Neplatný vstup v',
                'MISSING_REQUIRED_FIELD' => 'Chybí požadované pole:',
                'XSS_ISSUES' => 'Byly zjištěny možné problémy XSS v poli \'%s\''
            ],
            'MONTHS_OF_THE_YEAR' => [
                0 => 'leden',
                1 => 'únor',
                2 => 'březen',
                3 => 'duben',
                4 => 'květen',
                5 => 'červen',
                6 => 'červenec',
                7 => 'srpen',
                8 => 'září',
                9 => 'říjen',
                10 => 'listopad',
                11 => 'prosinec'
            ],
            'DAYS_OF_THE_WEEK' => [
                0 => 'pondělí',
                1 => 'úterý',
                2 => 'středa',
                3 => 'čtvrtek',
                4 => 'pátek',
                5 => 'sobota',
                6 => 'neděle'
            ],
            'YES' => 'Ano',
            'NO' => 'Ne',
            'CRON' => [
                'EVERY' => 'každý',
                'EVERY_HOUR' => 'každou hodinu',
                'EVERY_MINUTE' => 'každou minutu',
                'EVERY_DAY_OF_WEEK' => 'každý den v týdnu',
                'EVERY_DAY_OF_MONTH' => 'každý den v měsíci',
                'EVERY_MONTH' => 'každý měsíc',
                'TEXT_PERIOD' => 'Every <b />',
                'TEXT_MINS' => ' at <b /> minute(s) past the hour',
                'TEXT_TIME' => ' at <b />:<b />',
                'TEXT_DOW' => ' on <b />',
                'TEXT_MONTH' => ' of <b />',
                'TEXT_DOM' => ' on <b />',
                'ERROR1' => 'Tag %s není podporován!',
                'ERROR2' => 'Chybný počet prvků',
                'ERROR3' => 'jquery_element musí být nastaven v nastaveních pro jqCron',
                'ERROR4' => 'Nerozpoznaný výraz'
            ]
        ]
    ]
];
