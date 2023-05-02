<?php

use Illuminate\Support\Facades\Config;

Config::set('app.env', 'testing');

uses(Tests\TestCase::class)->in('Feature');
