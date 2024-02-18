<?php

namespace domain\Facades\UserFacade;

use Illuminate\Support\Facades\Facade;
use domain\Services\UserService\UserService;

class UserFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return UserService::class;
    }
}
