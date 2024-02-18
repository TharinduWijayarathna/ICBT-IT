<?php

namespace domain\Facades\DocumentFacade;

use Illuminate\Support\Facades\Facade;
use domain\Services\DocumentService\DocumentService;



class DocumentFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return DocumentService::class;
    }
}
