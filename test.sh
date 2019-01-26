#!/usr/bin/env sh

#Instead of using xdebug for code coverage
#we'll use phpdbg, which is the debugger inside php

phpdbg -qrr ./vendor/bin/phpunit
