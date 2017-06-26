<?php

namespace  Drupal\dino_roar\Jurassic;
/**
 * Created by PhpStorm.
 * User: ronnyf
 * Date: 6/25/17
 * Time: 6:20 PM
 */
class RoarGenerator
{
    public function getRoar($length)
    {
        return 'R'.str_repeat('0', $length).'AR!';
    }
}