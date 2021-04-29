<?php
return [
    '@class' => 'Grav\\Common\\File\\CompiledYamlFile',
    'filename' => '/Users/jonatan/Downloads/grav-admin/system/languages/de.yaml',
    'modified' => 1617729503,
    'data' => [
        'GRAV' => [
            'FRONTMATTER_ERROR_PAGE' => '---
title: %1$s
---
# Fehler: Frontmatter enthält Fehler

Pfad: `%2$s`

**%3$s ** 

```
%4$s
```',
            'INFLECTOR_PLURALS' => [
                '/(quiz)$/i' => '\\1zes',
                '/^(ox)$/i' => '\\1en',
                '/([m|l])ouse$/i' => '\\1ice',
                '/(matr|vert|ind)ix|ex$/i' => '\\1ice',
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
                '/(cris|ax|test)es$/i' => '\\1ies',
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
                '/((a)naly|(b)a|(d)iagno|(p)arenthe|(p)rogno|(s)ynop|(t)he)ses$/i' => '\\1\\2ves',
                '/([ti])a$/i' => '\\1um',
                '/(n)ews$/i' => '\\1ews'
            ],
            'INFLECTOR_UNCOUNTABLE' => [
                0 => 'Ausstattung',
                1 => 'Informationen',
                2 => 'Reis',
                3 => 'Geld',
                4 => 'Arten',
                5 => 'Serie',
                6 => 'Fisch',
                7 => 'Schaf'
            ],
            'INFLECTOR_IRREGULAR' => [
                'person' => 'Personen',
                'man' => 'Menschen',
                'child' => 'Kinder',
                'sex' => 'Geschlecht',
                'move' => 'Züge'
            ],
            'INFLECTOR_ORDINALS' => [
                'default' => '.',
                'first' => '.',
                'second' => '.',
                'third' => '.'
            ],
            'NICETIME' => [
                'NO_DATE_PROVIDED' => 'Kein Datum angegeben',
                'BAD_DATE' => 'Falsches Datum',
                'AGO' => 'her',
                'FROM_NOW' => 'ab jetzt',
                'JUST_NOW' => 'jetzt gerade',
                'SECOND' => 'Sekunde',
                'MINUTE' => 'Minute',
                'HOUR' => 'Stunde',
                'DAY' => 'Tag',
                'WEEK' => 'Woche',
                'MONTH' => 'Monat',
                'YEAR' => 'Jahr',
                'DECADE' => 'Jahrzehnt',
                'SEC' => 'Sek.',
                'MIN' => 'Min.',
                'HR' => 'Std.',
                'WK' => 'Wo.',
                'MO' => 'Mo.',
                'YR' => 'J.',
                'DEC' => 'Dez',
                'SECOND_PLURAL' => 'Sekunden',
                'MINUTE_PLURAL' => 'Minuten',
                'HOUR_PLURAL' => 'Stunden',
                'DAY_PLURAL' => 'Tage',
                'WEEK_PLURAL' => 'Wochen',
                'MONTH_PLURAL' => 'Monate',
                'YEAR_PLURAL' => 'Jahre',
                'DECADE_PLURAL' => 'Jahrzehnte',
                'SEC_PLURAL' => 'Sekunden',
                'MIN_PLURAL' => 'Minuten',
                'HR_PLURAL' => 'Stunden',
                'WK_PLURAL' => 'Wochen',
                'MO_PLURAL' => 'Monate',
                'YR_PLURAL' => 'Jahre',
                'DEC_PLURAL' => 'Jahrzehnten'
            ],
            'FORM' => [
                'VALIDATION_FAIL' => '<b>Überprüfung fehlgeschlagen:</b>',
                'INVALID_INPUT' => 'Ungültige Eingabe in',
                'MISSING_REQUIRED_FIELD' => 'Erforderliches Feld fehlt:',
                'XSS_ISSUES' => 'Potenzielle XSS-Probleme im Feld \'%s\' erkannt'
            ],
            'MONTHS_OF_THE_YEAR' => [
                0 => 'Januar',
                1 => 'Februar',
                2 => 'März',
                3 => 'April',
                4 => 'Mai',
                5 => 'Juni',
                6 => 'Juli',
                7 => 'August',
                8 => 'September',
                9 => 'Oktober',
                10 => 'November',
                11 => 'Dezember'
            ],
            'DAYS_OF_THE_WEEK' => [
                0 => 'Montag',
                1 => 'Dienstag',
                2 => 'Mittwoch',
                3 => 'Donnerstag',
                4 => 'Freitag',
                5 => 'Samstag',
                6 => 'Sonntag'
            ],
            'YES' => 'Ja',
            'NO' => 'Nein',
            'CRON' => [
                'EVERY' => 'jede',
                'EVERY_HOUR' => 'jede Stunde',
                'EVERY_MINUTE' => 'Jede Minute',
                'EVERY_DAY_OF_WEEK' => 'jeden Tag der Woche',
                'EVERY_DAY_OF_MONTH' => 'jeden Tag des Monats',
                'EVERY_MONTH' => 'jeden Monat',
                'TEXT_PERIOD' => 'Alle <b />',
                'TEXT_MINS' => ' bei <b /> Minuten nach der vollen Stunde (n)',
                'TEXT_TIME' => ' bei <b />:<b />',
                'TEXT_DOW' => ' auf <b />',
                'TEXT_MONTH' => ' von <b />',
                'TEXT_DOM' => ' auf <b />',
                'ERROR1' => 'Der Tag %s wird nicht unterstützt!',
                'ERROR2' => 'Ungültige Anzahl von Elementen',
                'ERROR3' => 'jquery_element sollte in den jqCron Einstellungen gesetzt werden',
                'ERROR4' => 'Unbekannter Ausdruck'
            ]
        ]
    ]
];
