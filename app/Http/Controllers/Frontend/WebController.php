<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Company;
use App\Model\Category;
use App\Model\Product;
use App\Model\News;
use App\Model\Location;
use DB;
use Alert;

class WebController extends Controller
{
    public function index(Request $request) {
        $companies = Company::orderBy('created_at', 'DESC')->limit(3)->get();
        return view('frontend.index', compact('companies'));
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
        $companies = Company::where('category_id', $category_id)->get();
        $recommands = Product::where('recommend', TRUE)->get();
        return view('frontend.material', compact('companies', 'category', 'recommands', 'category_id'));
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
                $queries = DB::select('call search(?)',array($data['q']));
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

}
