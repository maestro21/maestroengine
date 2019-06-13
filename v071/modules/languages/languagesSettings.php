<?php

class langsSettings extends settings
{
    protected $labels = [
        'langs' => 'Languages',
    ];

    protected $settings = [
        'flag_api_url' => 'http://www.webstudio-maestro.ch/langselect/',
        'flag_default' => 'united-states-of-america.png',
        'deflang' => 'en',
    ];

    protected $defdata = [
        [
            'abbr' => 'en',
            'name' => 'English',
            'pos' => 1,
            'active' => 1,
        ]
    ];


}
