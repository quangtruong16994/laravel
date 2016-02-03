<?php return array (
    'default' => 'memcache',
    'stores' =>
        array (
            'apc' =>
                array (
                    'driver' => 'apc',
                ),
            'array' =>
                array (
                    'driver' => 'array',
                ),
            'database' =>
                array (
                    'driver' => 'database',
                    'table' => 'cache',
                    'connection' => NULL,
                ),
            'file' =>
                array (
                    'driver' => 'file',
                    'path' => 'F:\\OpenServer523\\domains\\demo\\laravel\\storage\\framework/cache',
                ),
            'memcached' =>
                array (
                    'driver' => 'memcached',
                    'servers' =>
                        array (
                            0 =>
                                array (
                                    'host' => '127.0.0.1',
                                    'port' => 11211,
                                    'weight' => 100,
                                ),
                        ),
                ),
            'memcache' => [
                'driver'  => 'memcache',
                'servers' => [
                    [
                        'host' => '127.0.0.1', 'port' => 11211, 'weight' => 100,
                    ],
                ],
            ],
            'redis' =>
                array (
                    'driver' => 'redis',
                    'connection' => 'default',
                ),
        ),
    'connections' =>[
        'default' =>[['host' => '127.0.0.1', 'port' => 11211, 'weight' => 100],],
    ],
    'prefix' => 'laravel',
);