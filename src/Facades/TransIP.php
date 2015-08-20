<?php

/*
 * This file is part of Laravel TransIP.
 *
 * (c) Hidde Beydals <hello@hidde.co>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace HiddeCo\LaravelTransIP\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @author Hidde Beydals <hello@hidde.co>
 */
class TransIP extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'transip';
    }
}
