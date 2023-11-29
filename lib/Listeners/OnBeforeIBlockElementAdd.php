<?php

namespace Event\Model\Listeners;

use JetBrains\PhpStorm\NoReturn;

class OnBeforeIBlockElementAdd implements Handler
{
    private const EXCLAMATION_MARK = '!';

    #[NoReturn] public static function handle(array &$arFields): void
    {
        if ($arFields['RESULT'] === false) {
            return;
        }

        $elementName = $arFields['NAME'];
        $firstSymbolInName = $elementName[0];


        if ($firstSymbolInName !== '!') {
            $arFields['NAME'] = self::EXCLAMATION_MARK . $elementName;
        }
    }
}