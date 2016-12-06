<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

/**
 * Class MediaController.
 */
class MediaController extends Controller
{
    public function index()
    {
        return view('admin.media.index');
    }
}
