<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Processing;

class HelperController extends Controller
{
    public function getProductByCategory(Request $request) {
    	$category_id = $request->category_id;
    	$categories = Product::where('category_id', $category_id)->get();
    	return $categories;
    }

    public function getProcessingByCategory(Request $request) {
    	$prefix = $request->prefix;
    	$processing = Processing::where('prefix', $prefix)->get();
    	return $processing;
    }
}
