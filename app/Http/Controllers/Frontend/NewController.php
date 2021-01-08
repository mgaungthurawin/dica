<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\News;
class NewController extends Controller
{
    
    public function new($new_id) {
        $new = News::find($new_id);
        if(empty($new)) {
            $error =  trans('Error'); 
            $not_found =  trans('not_found');          
            alert()->error($error,$not_found);
    	    return redirect(url('/'));
    	}
    	return $new;
     
    }

}
