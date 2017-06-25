<?php
/**
 * Created by PhpStorm.
 * User: ronnyf
 * Date: 6/25/17
 * Time: 4:38 PM
 */

namespace Drupal\dino_roar\Controller;

use Symfony\Component\HttpFoundation\Response;

class RoarController
{
    public function roar($count)
    {
        $roar = 'R'.str_repeat('0', $count).'AR!';

        return new Response($roar);
    }
}