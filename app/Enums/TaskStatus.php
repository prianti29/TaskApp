<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class TaskStatus extends Enum
{
    //enum use kore jodi dropdown e kono update kora lage tokhon jate easy hoy , ei folder ei edit korle puro project editable hobe jay

    //const key = value;
    const Pending =   0; 
    const Ongoing =   1;
    const Done = 2;
    const Review = 3;

    //For overriding
    public static function getDescription($value): string
    {
        if ($value === self::Pending) 
        {
            return 'Task Pending'; //override pending key, amra jokhon kono key k override korte cai ba msg akare dekhate cai tokhon pending use kora hoy
        }
        return parent::getDescription($value);
    }
}
