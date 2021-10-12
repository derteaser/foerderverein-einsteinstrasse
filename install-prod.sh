#!/usr/bin/env bash
git pull
php80 /usr/bin/composer install --no-dev -d ${PWD}
