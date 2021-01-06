<?php

use Illuminate\Http\Request;
use App\Model\Media;
use App\Model\Location;
use App\Model\Product;

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