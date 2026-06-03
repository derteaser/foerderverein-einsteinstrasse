<?php

return [
    'methods' => explode(',', env('AUTH_METHODS') ?? ''),
];
