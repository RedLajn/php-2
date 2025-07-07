<?php

// src/EventListener/RoomListener.php
namespace App\EventListener;

use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Symfony\Component\HttpFoundation\Request;

class RoomListener
{
    public function __invoke(ControllerEvent $event): void
    {
        $request = $event->getRequest();

        if (str_contains($request->getPathInfo(), '/pokoje')) {
            $request->attributes->set('room_accessed', true);
        }
    }
}
