<?php

return [
    // config default 3 - ARGON2DI - PHP >= 7.3
    'helper.password.algo' => 3, // 1 BCRYPT, 2 ARGON2I, 3 ARGON2DI
    'helper.password.options' => [
        'memory_cost' => 1<<17,
        'time_cost'   => 3,
        'threads'     => 4,
    ]

    /* config 2 - ARGON2I - PHP >= 7.2
    'helper.password.algo' => 2, // 1 BCRYPT, 2 ARGON2I, 3 ARGON2DI
    'helper.password.options' => [
        'memory_cost' => 1<<17,
        'time_cost'   => 3,
        'threads'     => 4,
    ]
    */

    /* config 1 - BCRYPT
    'helper.password.algo' => 1, // 1 BCRYPT, 2 ARGON2I, 3 ARGON2DI
    'helper.password.options' => [
        'cost' => 8,
    ]
    */
];
