<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Ignored Files
    |--------------------------------------------------------------------------
    |
    | Maneuver will check .gitignore for ignore files, but you can conveniently
    | add here additional files to be ignored.
    |
    */
    'ignored' => array('/.env','/vendor','/bootstrap','/config','/database','/storage','tests'),

    /*
    |--------------------------------------------------------------------------
    | Default server
    |--------------------------------------------------------------------------
    |
    | Default server to deploy to when running 'deploy' without any arguments.
    | If this options isn't set, deployment will be run to all servers.
    |
    */
    'default' => 'development',

    /*
    |--------------------------------------------------------------------------
    | Connections List
    |--------------------------------------------------------------------------
    |
    | Servers available for deployment. Specify one or more connections, such
    | as: 'deployment', 'production', 'stating'; each with its own credentials.
    |
    */

    'connections' => array(

        'development' => array(
            'scheme'    => 'ftp',
            'host'      => 'ftp.umkmnaikkelas.com',
            'user'      => 'umkmnai1',
            'pass'      => 'wt6q7W2Wg0',
            'path'      => '/public_html/dev.umkmnaikkelas.com/',
            'port'      => 21,
            'passive'   => true
        ),

        'production' => array(
            'scheme'    => 'ftp',
            'host'      => 'ftp.umkmnaikkelas.com',
            'user'      => 'umkmnai1',
            'pass'      => 'wt6q7W2Wg0',
            'path'      => '/public_html/',
            'port'      => 21,
            'passive'   => true
        ),

    ),

);