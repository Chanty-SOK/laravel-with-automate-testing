<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class MainController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * All data request
     *
     * @param $request
     * @param array $except
     * @return array
     */
    public function dataRequest($request, $except = [])
    {
        return collect($request)->except($except)
            ->toArray();
    }
}
