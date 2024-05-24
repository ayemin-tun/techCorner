<?php

namespace App\Helpers;

use Jantinnerezo\LivewireAlert\LivewireAlert;

class Alert
{
    public static function message($type, $message, $component)
    {
        $component->alert($type, $message, [
            'position' => 'bottom-end',
            'timer' => 3000,
            'toast' => true,
        ]);
    }
}
