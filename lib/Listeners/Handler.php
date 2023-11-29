<?php

namespace Event\Model\Listeners;

use JetBrains\PhpStorm\NoReturn;

interface Handler
{
    #[noReturn] public static function handle(array &$arFields): void;
}