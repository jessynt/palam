<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

/**
 * Class MediaController
 *
 * @package App\Http\Controllers\Admin
 */
class MediaController extends Controller
{
    public function index()
    {
        return view('admin.media.index');
    }
}