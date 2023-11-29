<?php

namespace Event\Model\Listeners;

use JetBrains\PhpStorm\NoReturn;

class OnBeforeIBlockElementUpdate implements Handler
{
    #[noReturn] public static function handle(array &$arFields): void
    {
        $tagUpdateAt = self::getUpdateAtTag();
        $tags = $arFields['TAGS'];

        if (strlen($tags) === 0) {
            $arFields['TAGS'] = $tagUpdateAt;

            return;
        }

        if (str_ends_with($tags, ',')) {
            $arFields['TAGS'] = "$tags $tagUpdateAt";

            return;
        }

        if (!str_ends_with($tags, ',')) {
            $tagRandStr = self::getRandomString();
            $arFields['TAGS'] = "$tags, $tagRandStr";

            return;
        }
    }

    private static function getUpdateAtTag(): string
    {
        return 'был изменен ' . date('d.m.y:H.m.s');
    }

    private static function getRandomString(
        int $length = 64,
        string $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
    ): string {
        if ($length < 1) {
            throw new \RangeException("Length must be a positive integer");
        }
        $pieces = [];
        $max = mb_strlen($keyspace, '8bit') - 1;
        for ($i = 0; $i < $length; ++$i) {
            $pieces []= $keyspace[random_int(0, $max)];
        }

        return implode('', $pieces);
    }
}