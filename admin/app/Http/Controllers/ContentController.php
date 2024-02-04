<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function getUserContent()
    {
        try {
            $content = view('admin.user-content')->render();
            return response()->json(['html' => $content]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
