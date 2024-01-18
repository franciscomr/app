<?php

namespace App\Http\Controllers\Utils;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SelectController extends Controller
{
    public function select()
    {
        $resource = DB::table(request('resource'))->select('id', 'name')->pluck('name', 'id');
        return  $resource;
    }
}
