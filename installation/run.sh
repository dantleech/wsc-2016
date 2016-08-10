#!/usr/bin/env bash

composer install -n

my_dir="$(dirname "$0")"
$my_dir/reset.sh
