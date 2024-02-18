<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\FormHelper;
use domain\Facades\OrderFacade;
use domain\Facades\OrderFacade\ProductOrderFacade;
use domain\Facades\OrderFacade\ServiceOrderFacade;
use domain\Facades\ProfitFacade;
use Illuminate\Http\Request;

class HomeController extends ParentController
{
    use FormHelper;

    /**
     * dashboard
     *
     * @return void
     */
    public function index()
    {
        $response['tc'] = $this;
        return view('pages.dashboard.index')->with($response);
    }
}
