<?php

return [
    'ifs' => [
        'isajax' => function () {
            $request = kirby()->request();
            return $request->header('X-Alpine-Request') ?? false;
        },
    ],
];
