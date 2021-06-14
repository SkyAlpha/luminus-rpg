<?php
return [
    '@class' => 'Grav\\Common\\File\\CompiledYamlFile',
    'filename' => '/Users/jonatan/Documents/Projects/games/collision/tutorial-admin/system/languages/et.yaml',
    'modified' => 1622714294,
    'data' => [
        'GRAV' => [
            'FRONTMATTER_ERROR_PAGE' => '---
pealkiri: %1$s
---

# Viga: vigane Frontmatter\'i

asukoht: `%2$s`

**%3$s**

```
%4$s
```',
            'INFLECTOR_PLURALS' => [
                '/(octop|vir)us$/i' => '\\1i'
            ],
            'INFLECTOR_SINGULAR' => [
                '/^(ox)en/i' => '\\1',
                '/(alias|status)es$/i' => '\\1',
                '/(shoe)s$/i' => '\\1',
                '/(o)es$/i' => '\\1',
                '/(bus)es$/i' => '\\1',
                '/(x|ch|ss|sh)es$/i' => '\\1',
                '/(tive)s$/i' => '\\1',
                '/(hive)s$/i' => '\\1'
            ],
            'INFLECTOR_UNCOUNTABLE' => [
                0 => 'equipment',
                1 => 'informatsioon',
                2 => 'riis',
                3 => 'raha',
                4 => 'species',
                5 => 'series',
                6 => 'kala',
                7 => 'lammas'
            ],
            'INFLECTOR_IRREGULAR' => [
                'person' => 'inimesed',
                'man' => 'mees',
                'child' => 'lapsed'
            ],
            'INFLECTOR_ORDINALS' => [
                'default' => '.',
                'first' => '.',
                'second' => '.',
                'third' => '.'
            ],
            'NICETIME' => [
                'NO_DATE_PROVIDED' => 'Kuupäev määramata',
                'BAD_DATE' => 'Vigane kuupäev',
                'AGO' => 'tagasi',
                'FROM_NOW' => 'praegusest',
                'JUST_NOW' => 'just nüüd',
                'SECOND' => 'sekund',
                'MINUTE' => 'minut',
                'HOUR' => 'tundi',
                'DAY' => 'päev',
                'WEEK' => 'nädal',
                'MONTH' => 'kuu',
                'YEAR' => 'aasta',
                'DECADE' => '10 aastat',
                'SEC' => 'sek',
                'MIN' => 'min',
                'HR' => 't',
                'WK' => 'näd',
                'MO' => 'k.',
                'YR' => 'a.',
                'DEC' => 'dekaad',
                'SECOND_PLURAL' => 'sekundit',
                'MINUTE_PLURAL' => 'minutit',
                'HOUR_PLURAL' => 'tundi',
                'DAY_PLURAL' => 'päeva',
                'WEEK_PLURAL' => 'nädalat',
                'MONTH_PLURAL' => 'kuud',
                'YEAR_PLURAL' => 'aastat',
                'DECADE_PLURAL' => 'dekaadi',
                'SEC_PLURAL' => 'sekundit',
                'MIN_PLURAL' => 'min',
                'HR_PLURAL' => 't',
                'WK_PLURAL' => 'näd',
                'MO_PLURAL' => 'kuud',
                'YR_PLURAL' => 'aastat',
                'DEC_PLURAL' => 'dek.'
            ],
            'FORM' => [
                'VALIDATION_FAIL' => '<b>Kinnitamine nurjus:</b>',
                'INVALID_INPUT' => 'Vigane sisend:',
                'MISSING_REQUIRED_FIELD' => 'Nõutud väli puudub:'
            ],
            'MONTHS_OF_THE_YEAR' => [
                0 => 'jaanuar',
                1 => 'veebruar',
                2 => 'märts',
                3 => 'aprill',
                4 => 'mai',
                5 => 'juuni',
                6 => 'juuli',
                7 => 'august',
                8 => 'september',
                9 => 'oktoober',
                10 => 'november',
                11 => 'detsember'
            ],
            'DAYS_OF_THE_WEEK' => [
                0 => 'esmaspäev',
                1 => 'teisipäev',
                2 => 'kolmapäev',
                3 => 'neljapäev',
                4 => 'reede',
                5 => 'laupäev',
                6 => 'pühapäev'
            ],
            'CRON' => [
                'EVERY' => 'iga',
                'EVERY_HOUR' => 'iga tund',
                'EVERY_MINUTE' => 'iga minut',
                'EVERY_DAY_OF_WEEK' => 'iga nädala päev',
                'EVERY_MONTH' => 'iga kuu',
                'TEXT_PERIOD' => 'Iga <b />',
                'ERROR1' => 'Silt %s pole toetatud!',
                'ERROR2' => 'Vale elementide arv',
                'ERROR3' => 'jqCron seadetes peaks olema määratud jquery_element',
                'ERROR4' => 'Tundmatu väljend'
            ]
        ]
    ]
];
