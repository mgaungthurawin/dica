<?php

use Illuminate\Http\Request;
use App\Model\Media;
use App\Model\Location;
use App\Model\Processing;
use App\Model\Product;
use Auth;

function saveSingleMedia(Request $request, $upload_type)
{
    $media_paths = config('global')['MEDIA_PATH'];
    $media_types = config('global')['MEDIA_TYPE'];
    $mediaField = $media_types[$upload_type];

    $upload_path = $media_paths[config('global')[$request->media_path]] . "/" . date("Y") . "/" . date("m") . "/";
    if (!is_dir($upload_path)) {
        mkdir($upload_path, 0775, true);
        file_put_contents($upload_path . "/index.html", "");
    }

    $file = $request->file($mediaField['field_name']);
    $time = substr(number_format(time() * mt_rand(), 0, '', ''), 0, 10);
    $data = array(
        'file_name' => $time . "." . $file->getClientOriginalExtension(),
        'file_path' => $upload_path,
        'file_type' => $file->getClientOriginalExtension(),
        'file_size' => $file->getClientSize(),
        'file_caption' => $file->getClientOriginalName()
    );
    $result = saveUploadMedia($file, $data, $mediaField);
    if ($result['status'] == TRUE) {
        $result['media_id'] = Media::insertGetId($data);
    }
    return $result;
}

function saveMultipleMedia(Request $request, $upload_type)
{
    // $media_paths = json_decode(MEDIA_PATH, true);
    // $media_types = json_decode(MEDIA_TYPE, true);
    $media_paths = config('global')['MEDIA_PATH'];
    $media_types = config('global')['MEDIA_TYPE'];
    $mediaField = $media_types[$upload_type];


    $upload_path = $media_paths[$request->media_path] . "/" . date("Y") . "/" . date("m") . "/";
    if (!is_dir($upload_path)) {
        mkdir($upload_path, 0775, true);
        file_put_contents($upload_path . "/index.html", "");
    }

    $media_ids = array('media_id' => array(), 'status' => FALSE);
    foreach ($request->file($mediaField['field_name']) as $file) {
        $time = substr(number_format(time() * mt_rand(), 0, '', ''), 0, 10);
        $data = array(
            'file_name' => $time . "." . $file->getClientOriginalExtension(),
            'file_path' => $upload_path,
            'file_type' => $file->getClientOriginalExtension(),
            'file_size' => $file->getClientSize(),
            'file_caption' => $file->getClientOriginalName()
        );
        $result = saveUploadMedia($file, $data, $mediaField);
        if ($result['status'] == TRUE) {
            $media_ids['media_id'][] = Media::insertGetId($data);
        } else {
            return array('status' => FALSE, 'message' => $result['message']);
        }
    }
    $media_ids['status'] = TRUE;
    return $media_ids;
}

function saveUploadMedia($file, $data, $mediaField)
{
    $target_file = $data['file_path'] . $data['file_name'];
    $uploadOk = 1;

    if (file_exists($target_file)) {
        $result['status'] = FALSE;
        $result['message'] = "Sorry, file already exists.";
        return $result;
    }
    if ($data["file_size"] > $mediaField['max_size']) {
        $result['status'] = FALSE;
        $result['message'] = "Sorry, your file is too large.";
        return $result;
    }
    if (!in_array($data['file_type'], $mediaField['extension'])) {
        $result['status'] = FALSE;
        $result['message'] = "Sorry, we are not allow these files type to upload.";
        return $result;
    }
    $file->move($data['file_path'], $data['file_name']);
    if (file_exists($target_file)) {
        $result['status'] = TRUE;
        $result['message'] = "The file " . $data['file_caption'] . " has been uploaded.";
        return $result;
    } else {
        $result['status'] = FALSE;
        $result['message'] = "Sorry, there was an error uploading your file.";
        return $result;
    }
}

function getAllMedia($reference_id = 0, $reference_type, $media_type = null)
{
    if (0 == $reference_id) return array();
    $query = DB::table('media_reference as m_f')
        ->join('media', 'm_f.media_id', '=', 'media.id')
        ->where('m_f.reference_id', $reference_id)
        ->where('m_f.reference_type', $reference_type);
    if (null != $media_type && is_array($media_type)) {
        $query->whereIn('media.file_type', $media_type);
    }
    return $query->select('media.*')->get();
}

function fileSizeFormat($bytes)
{
    $label = array('B', 'KB', 'MB', 'GB', 'TB', 'PB');
    for ($i = 0; $bytes >= 1024 && $i < (count($label) - 1); $bytes /= 1024, $i++) ;
    return (round($bytes, 2) . " " . $label[$i]);
}

function showPrettyStatus($status)
{
    switch ($status) {
        case TRUE:
            return '<i class="fa fa-check-circle text-green"></i>';
            break;
        case FALSE:
            return '<i class="fa fa-times-circle-o text-red"></i>';
            break;
    }
}

function parentName($parent) {
    if (0 !== $parent) {
        $location = Location::find($parent);
        return $location->name;
    }
}

function pName($parent) {
    if (0 !== $parent) {
        $product = Product::find($parent);
        if (!empty($product)) {
            return $product->name;
        }
    }
}

function officeAddress($json) {
    $array = json_decode($json, TRUE);
    $address = [
        $array['office']['office_location'],
        $array['office']['office_location_other'],
        $array['office']['office_address']
    ];
    return implode(",", $address);

}

function checkUncheck($value) {
    if (NULL !== $value) {
        return '<i class="fa fa-check-square">'; 
    }

    return '<i class="fa fa-square"></i>';    
}

function languageSwitcher($string){
    if(FALSE == strpos($string, "|&|")) {
        return $string;
    }
    $array = explode("|&|", $string);
    if ('en' == Session::get('locale')) {
        return $array[0];
    } else {
        return $array[1];
    }
    return $array[1];
}

function en($string) {
    if(FALSE == strpos($string, "|&|")) {
        return $string;
    }
    $array = explode("|&|", $string);
    return $array[0];
}

function mm($string) {
    if(FALSE == strpos($string, "|&|")) {
        return $string;
    }
    $array = explode("|&|", $string);
    return $array[1];
}

function main_processing($processing_id) {
    if (NULL == $processing_id) {
        return NULL;
    }
    $processing = Processing::find($processing_id);
    return $processing->main_process;
}

function main_product($product_id) {

    if (NULL == $product_id) {
        return NULL;
    }

    $product = Product::find($product_id);
    return $product->name;
}


function main_location($company) {
    $locationArray = $company->locations->pluck('id');
    $locations = Location::whereIn('id', $locationArray)->pluck('name');
    if(0 > count($locations)) {
        return implode(" ",$locations);
    }
    if(0 == count($locations)) {
        return 'N/A';
    }
    return $locations[0];
}


function getProductName($id) {
    return Product::find($id)->name;
}

function getProcessingName($id) {
    return Processing::find($id)->main_process;
}

function mainProducts($array) {
    $string = NULL;
    $array = array_filter($array);
    if(NULL == $array) {
        return 'N/A';
    }
    foreach ($array as $key => $arr) {
        $string .= Product::find($arr)->name;
        $string .= ",";
    }

    return $string;
}

function mainProcessings($array) {
    $string = NULL;
    $array = array_filter($array);
    if(NULL == $array) {
        return 'N/A';
    }
    foreach ($array as $key => $arr) {
        $string .= Processing::find($arr)->main_process;
        $string .= ",";
    }

    return $string;
}


function limit_text($text, $limit) {
    if (str_word_count($text, 0) > $limit) {
        $words = str_word_count($text, 2);
        $pos   = array_keys($words);
        $text  = substr($text, 0, $pos[$limit]) . '...';
    }
    return $text;
}

function authValue($text) {

    if(Auth::user()){
        return $text;
    }

    return NULL;

}

function getMainProduct($company_product, $prefix) {
    $products = Product::whereIn('id', $company_product)
                    ->where('prefix', $prefix)->where('main_product', TRUE)->get();
    return $products;
}

function getMainProcessing($company_processing, $prefix) {
    $processings = Processing::whereIn('id', $company_processing)
                    ->where('prefix', $prefix)->where('main_classification', TRUE)->get();
    return $processings;
}





