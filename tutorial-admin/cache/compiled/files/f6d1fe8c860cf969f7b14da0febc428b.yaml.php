<?php
return [
    '@class' => 'Grav\\Common\\File\\CompiledYamlFile',
    'filename' => '/Users/jonatan/Downloads/grav-admin/system/languages/el.yaml',
    'modified' => 1617729503,
    'data' => [
        'GRAV' => [
            'FRONTMATTER_ERROR_PAGE' => '---
Τίτλος: %1$s
---

# Σφάλμα: Μη έγκυρη διαδρομή Frontmatter

Διαδρομή: `%2$s`

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
                0 => 'εξοπλισμός',
                1 => 'πληροφοριες',
                2 => 'rice',
                3 => 'χρήματα',
                4 => 'είδη',
                5 => 'σειρές',
                6 => 'ψάρι',
                7 => 'πρόβατο'
            ],
            'INFLECTOR_IRREGULAR' => [
                'person' => 'άνθρωποι',
                'man' => 'άνδρες',
                'child' => 'παιδιά',
                'sex' => 'φύλο',
                'move' => 'κινήσεις'
            ],
            'INFLECTOR_ORDINALS' => [
                'default' => 'th',
                'first' => 'st',
                'second' => 'nd',
                'third' => 'rd'
            ],
            'NICETIME' => [
                'NO_DATE_PROVIDED' => 'Δεν δόθηκε καμία ημερομηνία',
                'BAD_DATE' => 'Εσφαλμένη ημερομηνία',
                'AGO' => 'πρίν',
                'FROM_NOW' => 'από τώρα',
                'JUST_NOW' => 'μόλις τώρα',
                'SECOND' => 'δευτερόλεπτο',
                'MINUTE' => 'λεπτό',
                'HOUR' => 'ώρα',
                'DAY' => 'ημέρα',
                'WEEK' => 'εβδομάδα',
                'MONTH' => 'μήνας',
                'YEAR' => 'έτος',
                'DECADE' => 'δεκαετία',
                'SEC' => 'δευτερόλεπτο',
                'MIN' => 'λεπτό',
                'HR' => 'ώρα',
                'WK' => 'εβδ',
                'MO' => 'μην',
                'YR' => 'έτος',
                'DEC' => 'δεκαετία',
                'SECOND_PLURAL' => 'δευτερόλεπτα',
                'MINUTE_PLURAL' => 'λεπτά',
                'HOUR_PLURAL' => 'ώρες',
                'DAY_PLURAL' => 'ημέρες',
                'WEEK_PLURAL' => 'εβδομάδες',
                'MONTH_PLURAL' => 'μήνες',
                'YEAR_PLURAL' => 'έτη',
                'DECADE_PLURAL' => 'δεκαετίες',
                'SEC_PLURAL' => 'δευτ.',
                'MIN_PLURAL' => 'λεπτά',
                'HR_PLURAL' => 'ώρες',
                'WK_PLURAL' => 'εβδομάδες',
                'MO_PLURAL' => 'μήνες',
                'YR_PLURAL' => 'έτη',
                'DEC_PLURAL' => 'δεκαετίες'
            ],
            'FORM' => [
                'VALIDATION_FAIL' => '<b>Η επικύρωση απέτυχε:</b>',
                'INVALID_INPUT' => 'Μη έγκυρα δεδομένα σε',
                'MISSING_REQUIRED_FIELD' => 'Λείπει το απαιτούμενο πεδίο:'
            ],
            'MONTHS_OF_THE_YEAR' => [
                0 => 'Ιανουάριος',
                1 => 'Φεβρουάριος',
                2 => 'Μάρτιος',
                3 => 'Απρίλιος',
                4 => 'Μάιος',
                5 => 'Ιούνιος',
                6 => 'Ιούλιος',
                7 => 'Αύγουστος',
                8 => 'Σεπτέμβριος',
                9 => 'Οκτώβριος',
                10 => 'Νοέμβριος',
                11 => 'Δεκέμβριος'
            ],
            'DAYS_OF_THE_WEEK' => [
                0 => 'Δευτέρα',
                1 => 'Τρίτη',
                2 => 'Τετάρτη',
                3 => 'Πέμπτη',
                4 => 'Παρασκευή',
                5 => 'Σάββατο',
                6 => 'Κυριακή'
            ],
            'CRON' => [
                'EVERY' => 'κάθε',
                'EVERY_HOUR' => 'κάθε ώρα',
                'EVERY_MINUTE' => 'κάθε λεπτό',
                'EVERY_DAY_OF_WEEK' => 'κάθε μέρα της εβδομάδος',
                'EVERY_DAY_OF_MONTH' => 'κάθε μέρα του μήνα',
                'EVERY_MONTH' => 'κάθε μήνα',
                'TEXT_PERIOD' => 'Κάθε <b />',
                'TEXT_MINS' => ' κατά <b /> λεπτό(ά) μετά την ώρα',
                'TEXT_TIME' => ' στο <b />:<b />',
                'TEXT_DOW' => ' στις <b />',
                'TEXT_MONTH' => ' από <b />',
                'TEXT_DOM' => ' στις <b />',
                'ERROR1' => 'Η ετικέτα %s δεν υποστηρίζεται!',
                'ERROR2' => 'Μη έγκυρος αριθμός στοιχείων',
                'ERROR3' => 'Το jquery_element θα έπρεπε να οριστεί στις ρυθμίσεις του jqCron',
                'ERROR4' => 'Μη αναγνωρισμένη έκφραση'
            ]
        ]
    ]
];
