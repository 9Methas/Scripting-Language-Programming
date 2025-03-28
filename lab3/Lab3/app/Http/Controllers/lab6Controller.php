<?php

// ในไฟล์ app/Http/Controllers/lab6Controller.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class lab6Controller extends Controller
{
    public function welcome($firstname = null, $lastname = null)
    {
        // สมมติว่าเราต้องการแสดงข้อความตามโจทย์
        // "Welcome to James Bond homepage This is the third time to run Laravel Framework."
        // ก็สามารถส่งไปที่ view ได้ เช่น

        return view('lab6.index', compact('firstname', 'lastname'));
    }
}

