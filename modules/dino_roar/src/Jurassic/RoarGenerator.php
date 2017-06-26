<?php

namespace  Drupal\dino_roar\Jurassic;
use Drupal\Core\KeyValueStore\KeyValueFactoryInterface;

/**
 * Created by PhpStorm.
 * User: ronnyf
 * Date: 6/25/17
 * Time: 6:20 PM
 */
class RoarGenerator
{

    /**
     * @var KeyValueFactoryInterface
     */
    private $keyValueFactory;

    private $useCache;

    public function __construct(KeyValueFactoryInterface $keyValueFactory, $useCache)
    {

        $this->keyValueFactory = $keyValueFactory;
        $this->useCache = $useCache;
    }

    public function getRoar($length)
    {
        $key = 'roar_'.$length;

        $store = $this->keyValueFactory->get('dino');

        if ($this->useCache && $store->has($key))
        {
            return $store->get($key);
        }

        $string = 'R'.str_repeat('0', $length).'AR!';

        if ($this->useCache)
        {
            $store->set($key, $string);
        }else{
            sleep(5);
        }

        return $string;
    }
}