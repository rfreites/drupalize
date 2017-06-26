<?php
/**
 * Created by PhpStorm.
 * User: ronnyf
 * Date: 6/25/17
 * Time: 4:38 PM
 */

namespace Drupal\dino_roar\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Logger\LoggerChannelFactoryInterface;
use Drupal\dino_roar\Jurassic\RoarGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Response;

class RoarController extends ControllerBase
{
    private $roarGenerator;
    protected $loggerFactory;

    public function __construct(RoarGenerator $roarGenerator, LoggerChannelFactoryInterface  $loggerFactory)
    {
        $this->roarGenerator = $roarGenerator;
        $this->loggerFactory = $loggerFactory;
    }

    public function roar($count)
    {
        //key value store redis or database
//        $keyValueStore = $this->keyValue('dino');

        $roar = $this->roarGenerator->getRoar($count);

        //set set value
//        $keyValueStore->set('roar_string', $roar);

//        $roar = $keyValueStore->get('roar_string');

        $this->loggerFactory->get('default')
            ->debug($roar);

        return new Response($roar);
    }

    //override method to create from the ControllerBase and access to the container services
    public static function create(ContainerInterface $container)
    {
        $roarGenerator = $container->get('dino_roar.roar_generator');

        $loggerFactory = $container->get('logger.factory');

        return new static($roarGenerator, $loggerFactory);
    }
}