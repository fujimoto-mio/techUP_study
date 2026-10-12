<?php

namespace App\Services;

use App\Models\NgWord;

class NgWordService
{
    public static function contains(string $text): bool
    {
        foreach (NgWord::pluck('word') as $word) {
            if (mb_stripos($text, $word) !== false) {
                return true;
            }
        }
        return false;
    }

    public static function mask(string $text): string
    {
        foreach (NgWord::all() as $ngWord) {
            $text = str_ireplace(
                $ngWord->word,
                $ngWord->mask ?? '***',
                $text
            );
        }
        return $text;
    }
}