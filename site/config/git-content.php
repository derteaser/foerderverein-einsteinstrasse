<?php

return [
    'commit' => !filter_var(env('APP_DEBUG'), FILTER_VALIDATE_BOOLEAN),
];
