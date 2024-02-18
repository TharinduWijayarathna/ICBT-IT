<?php

namespace App\Traits;

use Carbon\Carbon;
use App\Models\Item;
use App\Models\Order;
use App\Models\Employee;
use App\Models\Quotation;
use App\Models\StockReturn;
use Illuminate\Support\Str;
use App\Models\ProductOrder;
use App\Models\ServiceOrder;
use App\Models\StockReceive;
use domain\Facades\ItemFacade;
use domain\Facades\OrderFacade;
use domain\Facades\ProfitFacade;
use domain\Facades\OrderWSFacade;
use domain\Facades\VisitorRequestFacade;
use Spatie\Permission\Models\Permission;
use PhpOffice\PhpWord\IOFactory;

trait FormHelper
{
    /**
     * check image and return
     *
     * @param  mixed $images
     * @return void
     */
    public function getImage($images)
    {
        if ($images) {
            $file = asset('storage/uploads/' . $images);
            return $file;

        } else {
            return null;
        }
    }
    public function getImageForView($images)
    {
        if ($images) {
            $file = asset('storage/uploads/' . $images);
            $extention = pathinfo($file, PATHINFO_EXTENSION);
            if ($extention == 'doc' || $extention == 'docx') {
                return asset('img/doc.png');
            } else {
                return $file;
            }
        } else {
            return null;
        }
    }

    public function displayDocument($filePath)
    {
        // $filePath = 'path/to/your/document.docx';

        $phpWord = IOFactory::load($filePath);
        $htmlWriter = IOFactory::createWriter($phpWord, 'HTML');
        $html = $htmlWriter->save('php://memory');

        return $html;
    }

    public function groupPermissions($group)
    {
        return Permission::where('group_name', $group->group_name)->get();
    }


    /**
     * limit String
     *
     * @param  mixed $str
     * @return void
     */
    public function limitStr($str, $limit)
    {
        return Str::limit($str ? $str : '', $limit);
    }

    /**
     * price format change to show decimal
     *
     * @param  mixed $price
     * @return void
     */
    public function priceFormat($price)
    {
        return number_format($price ? $price : 0, 2);
    }



    public function totalCountOfOrders()
    {
        return 0;
    }

    public function totalCountOfItems()
    {
        return 0;
    }

    public function totalCountOfUnreadVisitorRequests()
    {
        return VisitorRequestFacade::totalCountOfUnreadVisitorRequests();
    }

    public function monthlyProfit()
    {
        return 0;
    }

    public function popular()
    {
        return [];
    }
}
