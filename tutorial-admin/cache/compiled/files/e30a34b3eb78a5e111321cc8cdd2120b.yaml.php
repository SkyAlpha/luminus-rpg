<?php
return [
    '@class' => 'Grav\\Common\\File\\CompiledYamlFile',
    'filename' => '/Users/jonatan/Downloads/grav-admin/system/languages/nl.yaml',
    'modified' => 1617729503,
    'data' => [
        'GRAV' => [
            'FRONTMATTER_ERROR_PAGE' => '---
titel: %1$s
---

# Fout: ongeldige frontmatter

Pad: `%2$s`

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
                0 => 'uitrusting',
                1 => 'informatie',
                2 => 'rijst',
                3 => 'geld',
                4 => 'soorten',
                5 => 'reeks',
                6 => 'vis',
                7 => 'schaap'
            ],
            'INFLECTOR_IRREGULAR' => [
                'person' => 'personen',
                'man' => 'mensen',
                'child' => 'kinderen',
                'sex' => 'geslacht',
                'move' => 'verplaatsen'
            ],
            'INFLECTOR_ORDINALS' => [
                'default' => 'th',
                'first' => 'st',
                'second' => 'nd',
                'third' => 'rd'
            ],
            'NICETIME' => [
                'NO_DATE_PROVIDED' => 'geen datum opgegeven',
                'BAD_DATE' => 'Datumformaat onjuist',
                'AGO' => 'geleden',
                'FROM_NOW' => 'vanaf nu',
                'JUST_NOW' => 'zojuist',
                'SECOND' => 'seconde',
                'MINUTE' => 'minuut',
                'HOUR' => 'uur',
                'DAY' => 'dag',
                'WEEK' => 'week',
                'MONTH' => 'maand',
                'YEAR' => 'jaar',
                'DECADE' => 'decennium',
                'SEC' => 's',
                'MIN' => 'min',
                'HR' => 'u',
                'WK' => 'week',
                'MO' => 'ma',
                'YR' => 'j',
                'DEC' => 'decennia',
                'SECOND_PLURAL' => 'seconden',
                'MINUTE_PLURAL' => 'minuten',
                'HOUR_PLURAL' => 'uren',
                'DAY_PLURAL' => 'dagen',
                'WEEK_PLURAL' => 'weken',
                'MONTH_PLURAL' => 'maanden',
                'YEAR_PLURAL' => 'jaren',
                'DECADE_PLURAL' => 'decennia',
                'SEC_PLURAL' => 'seconden',
                'MIN_PLURAL' => 'minuten',
                'HR_PLURAL' => 'uren',
                'WK_PLURAL' => 'weken',
                'MO_PLURAL' => 'maanden',
                'YR_PLURAL' => 'jaren',
                'DEC_PLURAL' => 'decennia'
            ],
            'FORM' => [
                'VALIDATION_FAIL' => '<b>Validatie mislukt:</b>',
                'INVALID_INPUT' => 'Ongeldige invoer in',
                'MISSING_REQUIRED_FIELD' => 'Ontbrekend verplicht veld:'
            ],
            'MONTHS_OF_THE_YEAR' => [
                0 => 'Januari',
                1 => 'Februari',
                2 => 'Maart',
                3 => 'April',
                4 => 'Mei',
                5 => 'Juni',
                6 => 'Juli',
                7 => 'Augustus',
                8 => 'September',
                9 => 'Oktober',
                10 => 'November',
                11 => 'December'
            ],
            'DAYS_OF_THE_WEEK' => [
                0 => 'Maandag',
                1 => 'Dinsdag',
                2 => 'Woensdag',
                3 => 'Donderdag',
                4 => 'Vrijdag',
                5 => 'Zaterdag',
                6 => 'Zondag'
            ],
            'CRON' => [
                'EVERY' => 'elke',
                'EVERY_HOUR' => 'elk uur',
                'EVERY_MINUTE' => 'elke minuut',
                'EVERY_DAY_OF_WEEK' => 'elke dag van de week',
                'EVERY_DAY_OF_MONTH' => 'elke dag van de maand',
                'EVERY_MONTH' => 'elke maand',
                'TEXT_PERIOD' => 'Elke <b />',
                'TEXT_MINS' => ' <b /> minuten te laat',
                'TEXT_TIME' => ' op <b />:<b />',
                'TEXT_DOW' => ' op <b />',
                'TEXT_MONTH' => ' van <b />',
                'TEXT_DOM' => ' op <b />',
                'ERROR1' => 'De tag %s wordt niet ondersteund!',
                'ERROR2' => 'Slecht aantal elementen',
                'ERROR3' => 'Het jquery_element moet ingesteld worden in de jqCron instellingen',
                'ERROR4' => 'Onbekende expressie'
            ]
        ]
    ]
];
