<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * SecretServer API controller test controller
 * 
 * @author    Veress Imre <veress.imre.debrecen@gmail.com>
 * @copyright (c) 2021-, Veress Imre
 * @version   1.0
 */
class ApiTestController extends Controller
{
    public function index()
    {
        return view('apiTest.index');
    }
}
