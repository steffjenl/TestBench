<?php

declare(strict_types=1);

/*
 * This file is part of Alt Three TestBench.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AltThree\TestBench;

use GrahamCampbell\TestBenchCore\LaravelTrait;
use GrahamCampbell\TestBenchCore\ServiceProviderTrait as ProviderTrait;
use ReflectionClass;

/**
 * This is the service provider trait.
 *
 * @author Graham Campbell <graham@alt-three.com>
 * @author James Brooks <james@alt-three.com>
 */
trait ServiceProviderTrait
{
    use LaravelTrait;
    use ProviderTrait;

    protected static function getServiceProviderClass(): string
    {
        $class = static::getServiceProviderClass();
        $reflection = new ReflectionClass($class);
        $split = explode('\\', $reflection->getName());
        $class = substr(end($split), 0, -4);

        return "{$split[0]}\\{$split[2]}\\Providers\\{$class}";
    }
}
