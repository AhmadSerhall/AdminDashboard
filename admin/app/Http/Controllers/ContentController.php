<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContentController extends Controller
{
//     public function show($section)
//     {
//         return view('admin.' . $section);
//     }
//     // Add this method to your ContentController
// public function getUserContent()
// {
//     return view('admin.user-content');
// }
// ContentController.php

public function show($section)
{
    try {
        $content = view('admin.' . $section)->render();
        return response()->json(['html' => $content]);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}


}
