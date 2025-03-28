<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; //การนำเข้าคลาสที่จำเป็น
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController//นำเข้าคลาสาจากคอนโทรเลอร์
{
    use AuthorizesRequests, ValidatesRequests;

    // เมธอด welcome รับพารามิเตอร์เป็นชื่อและนามสกุล
    // (ค่า default = null เพื่อรองรับกรณีที่ไม่มีการส่งพารามิเตอร์)
    public function welcome($firstname = null, $lastname = null)
    {
        if ($firstname && $lastname) {
            // กรณีมีค่าพารามิเตอร์ทั้งชื่อและนามสกุล
            return "
                <h1>Welcome to {$firstname} {$lastname} homepage</h1>
                <p>This is the second time to run Laravel Framework.</p>
            ";
        } else {
            // กรณีไม่มีค่าพารามิเตอร์
            return "
                <h1>Welcome to homepage</h1>
                <p>This is the second time to run Laravel Framework.</p>
            ";
        }
    }
}
