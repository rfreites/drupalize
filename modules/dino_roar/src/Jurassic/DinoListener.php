<?php
/**
 * Created by PhpStorm.
 * User: ronnyf
 * Date: 6/25/17
 * Time: 11:36 PM
 */

namespace Drupal\dino_roar\Jurassic;

use Drupal\Core\Logger\LoggerChannelFactoryInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class DinoListener implements EventSubscriberInterface
{

    /**
     * @var LoggerChannelFactoryInterface
     */
    private $loggerChannelFactory;

    public function __construct(LoggerChannelFactoryInterface $loggerChannelFactory)
    {

        $this->loggerChannelFactory = $loggerChannelFactory;
    }

    public function onKernelRequest(GetResponseEvent $even)
    {
//        var_dump($even);die;
        $request = $even->getRequest();
        $shoudroar = $request->query->get('roar');

        if ($shoudroar)
        {
            $this->loggerChannelFactory->get('default')
                ->debug('Roar requested Roooarrr!!!');
        }
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::REQUEST => 'onKernelRequest'
        ];
    }

}