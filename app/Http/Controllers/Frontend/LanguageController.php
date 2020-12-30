<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
class LanguageController extends Controller
{
    public function changeLanguage(Request $request) {
    	$data = $request->all();
    	$locale = $data['locale'];
    	Session::put('locale', $locale);
    	$response = [];
    	$response['status'] = TRUE;
    	return $response;
    }
}
