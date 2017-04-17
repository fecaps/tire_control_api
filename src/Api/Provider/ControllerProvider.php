<?php
declare(strict_types=1);

namespace Api\Provider;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Api\Controller;

class ControllerProvider implements ServiceProviderInterface
{
    public function register(Container $app)
    {
        $app->register(new Controller\AuthControllerProvider);
        $app->register(new Controller\UserControllerProvider);
        $app->register(new Controller\TireControllerProvider);
        $app->register(new Controller\VehicleControllerProvider);
    }
}
