<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Company;
use App\Model\Product;
use App\Model\Category;
use App\Model\Processing;
use App\Model\Location;
use App\Model\ProductLocation;
use App\Model\MediaReference;
Use Alert;
use App\CustomClass\CompanyExcel;
use DB;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $companies = Company::orderBy('id', 'DESC')->paginate(25);
        $categories = Category::all();
        if(count($request->all()) > 0) {
            $data = $request->all();
            if(array_key_exists('q', $data)) {
                $whereIn = [];
                $company_queries =  Company::whereRaw("name like ? ", array('%'.$data['q'].'%'))->get();
                $product_queries = Product::join('company_product as cp', 'cp.product_id', 'products.id')
                                        ->where('products.name', 'LIKE', '%'. $data["q"].'%')->get();
                $processing_queries = Processing::join('company_processing as cp', 'cp.processing_id', 'processing.id')
                                        ->where('processing.main_process', 'LIKE', '%'. $data["q"].'%')->get();
                $location_queries = Location::join('company_location as cl', 'cl.location_id', 'location.id')
                                        ->where('location.name', 'LIKE', '%'. $data["q"].'%')->get();
                foreach ($company_queries as $key => $cq) {
                    $whereIn[] = $cq->id;
                }
                foreach ($product_queries as $key => $pq) {
                    $whereIn[] = $pq->company_id;
                }
                foreach ($processing_queries as $key => $pq) {
                    $whereIn[] = $pq->company_id;
                }
                foreach ($location_queries as $key => $lq) {
                    $whereIn[] = $lq->company_id;
                }
                $companies = Company::whereIn('id', $whereIn)->paginate(25);
            }
        }
        return view('admin.company.index', compact('companies', 'categories'));
    }

    public function exportExcel()
    {
        $companyExcel = new CompanyExcel();
        $companyExcel->download();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $certificate = ['ISO', 'ISO9001', 'Other'];
        $standard = ['DIN', 'JIS', 'BS', 'AISI', 'UNS', 'Other'];
        $products = Product::orderBy('name', 'ASC')->get();
        $main_processings = Processing::all();
        $categories = Category::orderBy('id', 'DESC')->get();
        $locations = Location::all();
        return view('admin.company.create', compact('categories','products','certificate','standard','main_processings','locations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form = $request->all();
        $products = $form['product_id'];
        $category_id = $form['category_id'];
        $category = Category::find($form['category_id']);
        $constprodcts = json_decode(PRODUCT, TRUE);
        $product_array = [];

        foreach ($products as $key => $p) {
            $product_array[$constprodcts[$key]] = $p;
        }
        $product_json = json_encode($product_array);

        // Image Upload
        $media_reference = array();
        if ($request->hasFile('image_media')) {
            $medias = saveMultipleMedia($request, 'image');
            if (TRUE != $medias['status']) {
                Flash::error($medias['message']);
                return redirect(route('company.index'));
            } else {
                foreach ($medias['media_id'] as $key => $value) {
                    $media_reference[] = array('media_id' => $value, 'reference_type' => COMPANY_UPLOAD);
                }
            }
        }

        switch ($category->prefix) {
            case FOOD:
                $data = $this->foodPrepareData($form);
                $data['type'] = $category->prefix;
                $data['category_id'] = $category->id;
                $data['product_string'] = $product_json;
                $company = Company::create($data);
                $company->products()->sync(array_filter($request->product_id));
                $company->locations()->sync($request->location_id);
                break;
            default:
                $data = $this->prepareData($request->all());
                $data['type'] = $category->prefix;
                $data['product_string'] = $product_json;;
                $processings = $form['processing_id'];
                $constprocessings = json_decode(PROCESSING, TRUE);
                $processing_array = [];
                foreach ($processings as $key => $pr) {
                    $processing_array[$constprocessings[$key]] = $pr;
                }
                $processing_json = json_encode($processing_array);
                $data['processing_string'] = $processing_json;
                $company = Company::create($data);
                $company->products()->sync(array_filter($request->product_id));
                $company->processings()->sync(array_filter($request->processing_id));
                $company->locations()->sync($request->location_id);
                break;
        }

        foreach ($media_reference as $key => $value) {
            $media_reference[$key]['reference_id'] = $company->id;
        }
        // // Save Media Referencing Table
        if (count($media_reference)) MediaReference::insert($media_reference);
        Alert::success('Success', 'Successfully Created Company');
        return redirect(route('company.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::where('id', $id)->first();
        if(empty($company)) {
            Alert::error('Error', 'Company not found');
            return redirect(route('company.index'));
        }

        if(FOOD == $company->type)
        {
            $company = Company::find($id);
            $products = Product::orderBy('name', 'ASC')->get();
            $locations = Location::all();
            $selected_product = $company->products()->pluck('product_id')->all();
            $selected_location = $company->locations()->pluck('location_id')->all();
            $customer = json_decode($company->customer, TRUE);
            $certificate = ['ISO', 'HACCP', 'BRC', 'Other'];
            $select_certificate = json_decode($company->certificate, TRUE);
            $hygiene = json_decode($company->hygiene, TRUE);
            $machinery = json_decode($company->machinery, TRUE);
            return view('admin.company.food_edit', compact('company','products','locations','selected_product','selected_location','customer','certificate','select_certificate','hygiene','machinery'));
        }
        $certificate = ['ISO', 'ISO9001', 'Other'];
        $standard = ['DIN', 'JIS', 'BS', 'AISI', 'UNS', 'Other'];
        $categories = Category::all();
        $company = Company::find($id);
        $products = Product::orderBy('name', 'ASC')->get();
        $main_processings = Processing::all();
        $locations = Location::all();
        $selected_product = $company->products()->pluck('product_id')->all();
        $selected_processing = $company->processings()->pluck('processing_id')->all();
        $selected_location = $company->locations()->pluck('location_id')->all();
        $main_machine_equipment = json_decode($company->main_machine_equipment, TRUE);
        $contact = json_decode($company->contact, TRUE);
        $company_info = json_decode($company->company_info, TRUE);
        $production = json_decode($company->production, TRUE);
        $low_material = json_decode($company->low_material, TRUE);
        $main_customer = json_decode($company->main_customer, TRUE);
        $cer_standard = json_decode($company->cer_standard, TRUE);
        $export_impot = json_decode($company->export_impot, TRUE);


        return view('admin.company.edit', compact('company', 'products', 'main_processings', 'locations', 'contact', 'company_info', 'main_customer', 'cer_standard','categories', 'export_impot', 'low_material', 'production', 'certificate', 'standard', 'selected_product','selected_processing','selected_location', 'main_machine_equipment'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $company = Company::find($id);
        $data = $request->all();
        // products
        $products = $data['product_id'];
        $constprodcts = json_decode(PRODUCT, TRUE);
        $product_array = [];

        foreach ($products as $key => $p) {
            $product_array[$constprodcts[$key]] = $p;
        }
        $product_json = json_encode($product_array);

        $category = Category::find($data['category_id']);

        $media_reference = array();
        if ($request->hasFile('image_media')) {
            $medias = saveMultipleMedia($request, 'image');
            if (TRUE != $medias['status']) {
                Flash::error($medias['message']);
                return redirect(route('company.index'));
            } else {
                foreach ($medias['media_id'] as $key => $value) {
                    $media_reference[] = array('media_id' => $value, 'reference_type' => COMPANY_UPLOAD);
                }
            }
        }

        if (count($media_reference)) {
            $medias = json_decode($data['medias'], true);
            $media_label = json_decode(MEDIA_TYPE, true);
            $image_ext = $media_label['image']['extension'];

            foreach ($media_reference as $key => $value) {
                $media_reference[$key]['reference_id'] = $company->id;
            }

            // Save Media Referencing Table
            if (count($media_reference)) MediaReference::insert($media_reference);
        }

        switch ($category->prefix) {
            case FOOD:
                $update = $this->foodPrepareData($data);
                $update['product_string'] = $product_json;
                $update['type'] = $category->prefix;
                Company::find($id)->update($update);
                $company->products()->sync(array_filter($request->product_id));
                $company->locations()->sync($request->location_id);
                break;
            
            default:
                $update = $this->prepareData($request->all());
                $update['product_string'] = $product_json;
                $update['type'] = $category->prefix;
                $processings = $data['processing_id'];
                $constprocessings = json_decode(PROCESSING, TRUE);
                $processing_array = [];
                foreach ($processings as $key => $pr) {
                    $processing_array[$constprocessings[$key]] = $pr;
                }
                $processing_json = json_encode($processing_array);
                $update['processing_string'] = $processing_json;
                Company::find($id)->update($update);
                $company->products()->sync(array_filter($request->product_id));
                $company->processings()->sync(array_filter($request->processing_id));
                $company->locations()->sync($request->location_id);
                break;
        }

        Alert::success('Success', 'Successfully Updated Company');
        return redirect(route('company.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::find($id);
        if (empty($company)) {
            Alert::error('Error', 'company Not Found');
            return redirect(route('company.index'));
        }
        $company->delete();
        Alert::success('Success', 'Successfully deleted company');
        return redirect(route('company.index'));
    }

    public function food($category_id, $prefix){
        $certificate = ['ISO', 'HACCP', 'BRC', 'Other'];
        $products = Product::orderBy('name', 'ASC')->get();
        $locations = Location::all();
        return view('admin.company.food', compact('products','certificate','locations', 'category_id'));
    }

    private function foodPrepareData($data) {
        $customer = [
            'customer_prefix' => $data['customer_prefix'],
            'customer_percent' => $data['customer_percent']
        ];

        $certificate = [
            'certificate' => $data['certificate'],
            'certificate_other' => $data['certificate_other'],
            'cer_number' => $data['cer_number'],
            'cer_acquired_year' => $data['cer_acquired_year'],
            'cer_sprcify' => $data['cer_sprcify'],
        ];

        $hygiene = [
            $data['hygiene_one'],
            $data['hygiene_two'],
            $data['hygiene_three'],
        ];

        $machinery = [
            'machinery' => $data['machinery'],
            'model_number' => $data['model_number'],
            'number' => $data['number'],
            'manufacturer' => $data['manufacturer'],
            'manufacturered_country' => $data['manufacturered_country']
        ];

        $data['customer'] = json_encode($customer);
        $data['certificate'] = json_encode($certificate);
        $data['hygiene'] = json_encode($hygiene);
        $data['machinery'] = json_encode($machinery);
        return $data;


    }

    private function prepareData($data) {
        $office_location = NULL;
        if(array_key_exists('office_location', $data)){
            $office_location = $data['office_location'];
        }
        $plant_location = NULL;
        if(array_key_exists('plant_location', $data)){
            $plant_location = $data['plant_location'];
        }
        $language = NULL;
        if(array_key_exists('language', $data)){
            $language = $data['language'];
        }
        $content = [
            'office' => [
                'office_location' => $office_location,
                'office_location_other' => $data['office_location_other'],
                'office_address' => $data['office_address'],
                'office_tel' => $data['office_tel'],
                'office_fax' => $data['office_fax']
            ],
            'plant' => [
                'plant_location' => $plant_location,
                'plant_location_other' => $data['plant_location_other'],
                'plant_address' => $data['plant_address'],
                'plant_tel' => $data['plant_tel'],
                'plant_fax' => $data['plant_fax']
            ],
            'representative' => [
                'repre_name' => $data['repre_name'],
                'repre_tittle' => $data['repre_tittle']
            ],
            'pic' => [
                'pic_name' => $data['pic_name'],
                'pic_title' => $data['pic_title'],
                'pic_tel' => $data['pic_tel'],
                'pic_email' => $data['pic_email'],
                'language' => $language,
                'language_other' => $data['language_other']
            ]
        ];

        $company_info = [
            'estabishment' => $data['year_of_establish'],
            'no_employee' => $data['no_employee'],
            'capital' => $data['capital'],
            'annual_amount' => $data['annual_amount']
        ];

        $production = [
            'space_for_plant' => $data['space_for_plant'],
            'production_capacity' => $data['production_capacity'],
            'operation_ratio' => $data['operation_ratio'],
            'min_order_quantity' => $data['min_order_quantity']
        ];

        $low_meterial = [
            'name_of_material' => $data['name_of_material'],
            'supplier_name' => $data['supplier_name'],
            'country_origin' => $data['country_origin']
        ];

        $maincustomer = [
            'mani_customer_prefix' => $data['mani_customer_prefix'],
            'main_customer_percent' => $data['main_customer_percent']
        ];

        $car_starndard = [
            'certificate' => $data['certificate'],
            'certificate_other' => $data['certificate_other'],
            'standard' => $data['standard'],
            'standard_other' => $data['standard_other']
        ];

        $exportimport = [
            'export_country' => $data['export_country'],
            'export_item' => $data['export_item'],
            'import_country' => $data['import_country'],
            'import_item' => $data['import_item']
        ];

        $main_machine_equipment = [
            'type_of_equipment' => $data['type_of_equipment'],
            'model_destination' => $data['model_destination'],
            'no_machine' => $data['no_machine'],
            'machine_builder' => $data['machine_builder'],
            'machine_country_origin' => $data['machine_country_origin']
        ];

        $insert = [
            'category_id' => $data['category_id'],
            'name' => $data['name'],
            'mm_name' => $data['mm_name'],
            // 'abbreviation' => $data['abbreviation'],
            // 'nation' => $data['nation'],
            'description' => $data['description'],
            'company_url' => $data['company_url'],
            'main_machine_equipment' => json_encode($main_machine_equipment),
            'contact' => json_encode($content),
            'company_info' => json_encode($company_info),
            'production' => json_encode($production),
            'low_material' => json_encode($low_meterial),
            'main_customer' => json_encode($maincustomer),
            'cer_standard' => json_encode($car_starndard),
            'export_impot' => json_encode($exportimport),
            'special_note' => $data['special_note'],
            'strong_point' => $data['strong_point']
        ];
        return $insert;
    }
}
