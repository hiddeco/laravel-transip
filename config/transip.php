<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the connections below you wish to use as
    | your default connection for all work. Of course, you may use many
    | connections at once using the manager class.
    |
    */

    'default' => 'main',

    /*
    |--------------------------------------------------------------------------
    | TransIP Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the connections setup for your application. Examples of
    | configuring each connection is shown below.
    |
    */

    'connections' => [

        'main' => [
            'username'      => 'transip-username',
            'private_key'   => 'transip-private-key',
        ],

        'alternative' => [
            'username'      => 'transip-username',
            'private_key'   => 'transip-private-key',
            'mode'          => 'readwrite', // default: readonly
            'endpoint'      => 'api.transip.eu', // default: api.transip.nl
        ],

    ],

];
