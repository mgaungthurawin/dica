<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Company;
use App\Model\Category;
use App\Model\Product;
use App\Model\News;
use App\Model\Location;
use App\Model\Processing;
use DB;
use Alert;

class WebController extends Controller
{
    // public function index(Request $request) {
    //     $companies = Company::orderBy('created_at', 'DESC')->limit(3)->get();
    //     return view('frontend.index', compact('companies'));
    // }
     public function index(Request $request) {
        $news = News::orderBy('created_at', 'DESC')->limit(3)->get();
        return view('frontend.index', compact('news'));
    }
    public function outline(Request $request) {
        return view('frontend.outline');
    }
    public function usedatabase(Request $request) {
        return view('frontend.usedatabase');
    }
    public function login(Request $request) {
        return view('frontend.login');
    }
    public function register(Request $request) {
        return view('frontend.register');
    }
    public function search() { 
        $categories = Category::all();
        return view('frontend.search', compact('categories'));
    }
    public function material($category_id) {
        $category = Category::find($category_id);
        if(empty($category)) {
            Alert::error('Category not found');
            return redirect(url('/'));
        }
        /*
        $companies = Company::where('category_id', $category_id)->get();
        $recommands = Product::where('recommend', TRUE)->GROUPBY('id')->get();
        
        $processing_array = [];
        $product_array = [];
        $location_array = [];
        foreach ($companies as $key => $company) {
            foreach ($company->processings as $processing) {
                $processing_array[] = $processing->id;
            }
        }

        foreach ($companies as $key => $company) {
            foreach ($company->products as $product) {
                $product_array[] = $product->id;
            }
        }

        foreach ($companies as $key => $company) {
            foreach ($company->locations as $location) {
                $location_array[] = $location->id;
            }
        }
        $processings = Processing::whereIn('id', $processing_array)->get();        
        $products = Product::whereIn('id', $product_array)->get();        
        $locations = Location::whereIn('id', $location_array)->get();
        */  
        $companies = Company::where('category_id', $category_id)->get();
        $processings = Processing::where('prefix', $category->prefix)->get();    
        $products = Product::where('prefix', $category->prefix)->get();
        $locations = Location::all();    
        return view('frontend.material', compact('companies', 'category', 'products', 'category_id', 'processings', 'products', 'locations'));

    }

    public function textile(Request $request) {
        return view('frontend.textile');
    }
    public function food(Request $request) {
        
         return view('frontend.food');
    }
     public function news(Request $request) {
        $news = News::orderBy('id', 'DESC')->paginate(12);
        return view('frontend.news', compact('news'));
    }
    public function search_result(Request $request, $category_id) {
        $companyArray = []; 
        $category = Category::find($category_id);
        if(empty($category)) {
            Alert::error('Category not found');
            return redirect(url('/'));
        }
        $data = $request->all();
        $companies = Company::where('category_id', $category_id)->get();
        if (array_key_exists('product', $data)) {
            
            foreach ($companies as $key => $company) {
                foreach ($company->products as $key => $product) {
                    if ($data['product'] == $product->id) {
                        $companyArray[] = $company->id;
                    }
                }
            }
            $companies = Company::whereIn('id', $companyArray)->get();
        }

        if (array_key_exists('processing', $data)) {
            foreach ($companies as $key => $company) {
                foreach ($company->processings as $key => $processing) {
                    if ($data['processing'] == $processing->id) {
                        $companyArray[] = $company->id;
                    }
                }
            }
            $companies = Company::whereIn('id', $companyArray)->get();
        }

        if (array_key_exists('location', $data)) {
            foreach ($companies as $key => $company) {
                foreach ($company->locations as $key => $location) {
                    if ($data['location'] == $location->id) {
                        $companyArray[] = $company->id;
                    }
                }
            }
            $companies = Company::whereIn('id', $companyArray)->get();
        }

        if(count($data) > 0) {
            if (array_key_exists('q', $data)) {
                // $queries = DB::select("call search('?')",array($data['q']));
                $queries = DB::select('SELECT c.* FROM companies as c join company_product as cp on c.id = cp.company_id 
    join products as p on p.id = cp.product_id join company_processing as cpr on cpr.company_id = c.id 
    join processing as pro on pro.id=cpr.processing_id 
    where p.name LIKE "%' . $data['q'].'%" or pro.main_process LIKE "%'. $data['q'] .'%" or c.name LIKE "%'. $data['q'] .'%" or c.main_machine_equipment LIKE "%'. $data['q'] .'%" GROUP BY c.id');
                $whereIn = [];
                foreach ($queries as $key => $query) {
                    $whereIn[] = $query->id;
                }
                $companies = Company::whereIn('id', $whereIn)->get();
            }
        }
        return view('frontend.search_result', compact('companies'));
    }

    public function industry($company_id) {
        $company = Company::find($company_id);
        if(empty($company)) {
            Alert::error('company not found');
            return redirect(url('/'));
        }
        if(FOOD == $company->type) {
           $products = Product::all();
           $locations = Location::all();
           $selected_product = $company->products()->pluck('product_id')->all();
           $selected_location = $company->locations()->pluck('location_id')->all();
           $customer = json_decode($company->customer, TRUE);
           $certificate = ['ISO', 'HACCP', 'BRC', 'Other'];
           $select_certificate = json_decode($company->certificate, TRUE);
           $hygiene = json_decode($company->hygiene, TRUE);
           $machinery = json_decode($company->machinery, TRUE);
           return view('frontend.food', compact('company','products','locations','selected_product','selected_location','customer','certificate','select_certificate','hygiene','machinery')); 
        }

        $certificate = ['ISO', 'ISO9001', 'Other'];
        $standard = ['DIN', 'JIS', 'BS', 'AISI', 'UNS'];
        $main_machine_equipment = json_decode($company->main_machine_equipment, TRUE);
        $contact = json_decode($company->contact, TRUE);
        $company_info = json_decode($company->company_info, TRUE);
        $production = json_decode($company->production, TRUE);
        $low_material = json_decode($company->low_material, TRUE);
        $main_customer = json_decode($company->main_customer, TRUE);
        $cer_standard = json_decode($company->cer_standard, TRUE);
        $export_impot = json_decode($company->export_impot, TRUE);
        return view('frontend.individual', compact('company', 'main_machine_equipment', 'contact', 'company_info', 'production', 'low_material', 'main_customer','cer_standard', 'export_impot', 'certificate', 'standard'));
    }
    
     public function sitemap(Request $request) {

        return view('frontend.sitemap');
    }
    public function new_detail(Request $request) {

        return view('frontend.new_detail');
    }

}
