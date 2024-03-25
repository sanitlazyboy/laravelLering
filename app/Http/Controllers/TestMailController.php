<?php

namespace App\Http\Controllers;
use App\Models\Testmail;

use Illuminate\Http\Request;

class TestMailController extends Controller
{
    public function testmail()
    {
        return view('mail.testmail');
    }
}
