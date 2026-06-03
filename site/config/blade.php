<?php

return [
    'ifs' => [
        'isajax' => function (): bool {
            return (bool) kirby()->request()->header('X-Alpine-Request');
        },
    ],
];
