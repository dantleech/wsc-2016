#!/usr/bin/env bash

rm -Rf app/cache/*
php app/console doctrine:database:drop --force
php app/console doctrine:database:create
php app/console doctrine:schema:update --force
php app/console sylius:fixtures:load --no-interaction
