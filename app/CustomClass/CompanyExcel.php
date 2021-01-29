<?php

namespace App\CustomClass;

use App\Model\Company;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Model\Product;
use App\Model\Processing;

class CompanyExcel
{
    protected $spreadsheet;
    protected $inputFileType;
    protected $alpha_no;

    public function __construct()
    {
        $this->inputFileType = 'Xlsx'; // Xlsx - Xml - Ods - Slk - Gnumeric - Csv
        $inputFileName = storage_path('templates/company-excel.xlsx');

        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($this->inputFileType);
        $this->spreadsheet = $reader->load($inputFileName);
        $this->alpha_no = 'A';
        $this->setData();
    }

    public function increaseAlphaNo()
    {
        $current = $this->alpha_no;
        $this->alpha_no++;
        // dd($this->alpha_no);
        return $current;
    }

    public function setData()
    {
        $sheet = $this->spreadsheet->getActiveSheet();
        $companies = Company::all();
        $no = 2;
        $alpha_no = 'A';
        //testing
        // $gg = $companies->where('name', "Good Brothers' Company")->first();
        // dump($gg->toArray());
        // dump($gg->locations->toArray());
        // die;
        //testing end
        // ($companies->where('name', "Good Brothers' Company")->first()->toArray());
        $companies->load([
            'category'
        ]);
        foreach ($companies as $company) {

            $sheet->setCellValue($this->increaseAlphaNo().$no, $company->id);
            $sheet->setCellValue($this->increaseAlphaNo().$no, $company->category->title);
            $sheet->setCellValue($this->increaseAlphaNo().$no, $company->name);
            $sheet->setCellValue($this->increaseAlphaNo().$no, $company->mm_name);
            $sheet->setCellValue($this->increaseAlphaNo().$no, $company->description);
            $sheet->setCellValue($this->increaseAlphaNo().$no, $company->strong_point);
            $sheet->setCellValue($this->increaseAlphaNo().$no, $this->getFromJson($company->contact, [
                'office',
                'office_location'
            ]) );
            $sheet->setCellValue($this->increaseAlphaNo().$no, $company->office_address);
            $sheet->setCellValue($this->increaseAlphaNo().$no, $company->office_tel);
            $sheet->setCellValue($this->increaseAlphaNo().$no, $this->getFromJson($company->contact, [
                'representative',
                'repre_name'
            ]) );
            $sheet->setCellValue($this->increaseAlphaNo().$no, $this->getFromJson($company->contact, [
                'representative',
                'repre_tittle'
            ]) );
            $sheet->setCellValue($this->increaseAlphaNo().$no, $this->getFromJson($company->contact, ['pic', 'pic_name']) );
            $sheet->setCellValue($this->increaseAlphaNo().$no, $this->getFromJson($company->contact, ['pic', 'pic_title']) );
            $sheet->setCellValue($this->increaseAlphaNo().$no, $this->getFromJson($company->contact, ['pic', 'pic_tel']) );
            $sheet->setCellValue($this->increaseAlphaNo().$no, $this->getFromJson($company->contact, ['pic', 'pic_email']) );

            $sheet->setCellValue($this->increaseAlphaNo().$no, $company->company_url);
            $sheet->setCellValue($this->increaseAlphaNo().$no, $this->getFromJson($company->company_info, ['estabishment']) );
            $sheet->setCellValue($this->increaseAlphaNo().$no, $this->getFromJson($company->company_info, ['capital']) );
            $sheet->setCellValue($this->increaseAlphaNo().$no, $this->getFromJson($company->company_info, ['annual_amount']) );
            $sheet->setCellValue($this->increaseAlphaNo().$no, $this->getFromJson($company->company_info, ['no_employee']) );

            $sheet->setCellValue($this->increaseAlphaNo().$no,  $this->setProduct412($company->product_string));

            $this->setProducts($sheet, $no, $company->product_string);

            $this->setProcessings($sheet, $no, $company->processing_string);

            $sheet->setCellValue($this->increaseAlphaNo().$no, $this->getFromJson($company->main_machine_equipment, ['type_of_equipment', 0]) );
            $sheet->setCellValue($this->increaseAlphaNo().$no, $this->getFromJson($company->main_machine_equipment, ['model_destination', 0]) );
            $sheet->setCellValue($this->increaseAlphaNo().$no, $this->getFromJson($company->main_machine_equipment, ['no_machine', 0]) );
            $sheet->setCellValue($this->increaseAlphaNo().$no, $this->getFromJson($company->main_machine_equipment, ['machine_builder', 0]) );
            $sheet->setCellValue($this->increaseAlphaNo().$no, $this->getFromJson($company->main_machine_equipment, ['machine_country_origin', 0]) );

            $sheet->setCellValue($this->increaseAlphaNo().$no, $this->getFromJson($company->main_machine_equipment, ['type_of_equipment', 1]) );
            $sheet->setCellValue($this->increaseAlphaNo().$no, $this->getFromJson($company->main_machine_equipment, ['model_destination', 1]) );
            $sheet->setCellValue($this->increaseAlphaNo().$no, $this->getFromJson($company->main_machine_equipment, ['no_machine', 1]) );
            $sheet->setCellValue($this->increaseAlphaNo().$no, $this->getFromJson($company->main_machine_equipment, ['machine_builder', 1]) );
            $sheet->setCellValue($this->increaseAlphaNo().$no, $this->getFromJson($company->main_machine_equipment, ['machine_country_origin', 1]) );

            $sheet->setCellValue($this->increaseAlphaNo().$no, $this->getFromJson($company->main_machine_equipment, ['type_of_equipment', 2]) );
            $sheet->setCellValue($this->increaseAlphaNo().$no, $this->getFromJson($company->main_machine_equipment, ['model_destination', 2]) );
            $sheet->setCellValue($this->increaseAlphaNo().$no, $this->getFromJson($company->main_machine_equipment, ['no_machine', 2]) );
            $sheet->setCellValue($this->increaseAlphaNo().$no, $this->getFromJson($company->main_machine_equipment, ['machine_builder', 2]) );
            $sheet->setCellValue($this->increaseAlphaNo().$no, $this->getFromJson($company->main_machine_equipment, ['machine_country_origin', 2]) );

            $sheet->setCellValue($this->increaseAlphaNo().$no, $this->getFromJson($company->main_machine_equipment, ['type_of_equipment', 3]) );
            $sheet->setCellValue($this->increaseAlphaNo().$no, $this->getFromJson($company->main_machine_equipment, ['model_destination', 3]) );
            $sheet->setCellValue($this->increaseAlphaNo().$no, $this->getFromJson($company->main_machine_equipment, ['no_machine', 3]) );
            $sheet->setCellValue($this->increaseAlphaNo().$no, $this->getFromJson($company->main_machine_equipment, ['machine_builder', 3]) );
            $sheet->setCellValue($this->increaseAlphaNo().$no, $this->getFromJson($company->main_machine_equipment, ['machine_country_origin', 3]) );

            $sheet->setCellValue($this->increaseAlphaNo().$no, $this->getFromJson($company->main_machine_equipment, ['type_of_equipment', 4]) );
            $sheet->setCellValue($this->increaseAlphaNo().$no, $this->getFromJson($company->main_machine_equipment, ['model_destination', 4]) );
            $sheet->setCellValue($this->increaseAlphaNo().$no, $this->getFromJson($company->main_machine_equipment, ['no_machine', 4]) );
            $sheet->setCellValue($this->increaseAlphaNo().$no, $this->getFromJson($company->main_machine_equipment, ['machine_builder', 4]) );
            $sheet->setCellValue($this->increaseAlphaNo().$no, $this->getFromJson($company->main_machine_equipment, ['machine_country_origin', 4]) );

            $sheet->setCellValue($this->increaseAlphaNo().$no, $this->getFromJson($company->main_machine_equipment, ['type_of_equipment', 5]) );
            $sheet->setCellValue($this->increaseAlphaNo().$no, $this->getFromJson($company->main_machine_equipment, ['model_destination', 5]) );
            $sheet->setCellValue($this->increaseAlphaNo().$no, $this->getFromJson($company->main_machine_equipment, ['no_machine', 5]) );
            $sheet->setCellValue($this->increaseAlphaNo().$no, $this->getFromJson($company->main_machine_equipment, ['machine_builder', 5]) );
            $sheet->setCellValue($this->increaseAlphaNo().$no, $this->getFromJson($company->main_machine_equipment, ['machine_country_origin', 5]) );

            $sheet->setCellValue($this->increaseAlphaNo().$no, $this->getFromJson($company->low_material, ['name_of_material', 0]) );
            $sheet->setCellValue($this->increaseAlphaNo().$no, $this->getFromJson($company->low_material, ['supplier_name', 0]) );
            $sheet->setCellValue($this->increaseAlphaNo().$no, $this->getFromJson($company->low_material, ['country_origin', 0]) );

            $sheet->setCellValue($this->increaseAlphaNo().$no, $this->getFromJson($company->low_material, ['name_of_material', 1]) );
            $sheet->setCellValue($this->increaseAlphaNo().$no, $this->getFromJson($company->low_material, ['supplier_name', 1]) );
            $sheet->setCellValue($this->increaseAlphaNo().$no, $this->getFromJson($company->low_material, ['country_origin', 1]) );

            $sheet->setCellValue($this->increaseAlphaNo().$no, $this->getFromJson($company->low_material, ['name_of_material', 2]) );
            $sheet->setCellValue($this->increaseAlphaNo().$no, $this->getFromJson($company->low_material, ['supplier_name', 2]) );
            $sheet->setCellValue($this->increaseAlphaNo().$no, $this->getFromJson($company->low_material, ['country_origin', 2]) );

            $sheet->setCellValue($this->increaseAlphaNo().$no, $this->getFromJson($company->main_customer, ['mani_customer_prefix', 0]) );
            $sheet->setCellValue($this->increaseAlphaNo().$no, $this->getFromJson($company->main_customer, ['main_customer_percent', 0]) );

            $sheet->setCellValue($this->increaseAlphaNo().$no, $this->getFromJson($company->main_customer, ['mani_customer_prefix', 1]) );
            $sheet->setCellValue($this->increaseAlphaNo().$no, $this->getFromJson($company->main_customer, ['main_customer_percent', 1]) );

            $sheet->setCellValue($this->increaseAlphaNo().$no, $this->getFromJson($company->main_customer, ['mani_customer_prefix', 2]) );
            $sheet->setCellValue($this->increaseAlphaNo().$no, $this->getFromJson($company->main_customer, ['main_customer_percent', 2]) );

            $sheet->setCellValue($this->increaseAlphaNo().$no, $this->getFromJson($company->main_customer, ['mani_customer_prefix', 3]) );
            $sheet->setCellValue($this->increaseAlphaNo().$no, $this->getFromJson($company->main_customer, ['main_customer_percent', 3]) );

            $sheet->setCellValue($this->increaseAlphaNo().$no, $this->getFromJson($company->main_customer, ['mani_customer_prefix', 4]) );
            $sheet->setCellValue($this->increaseAlphaNo().$no, $this->getFromJson($company->main_customer, ['main_customer_percent', 4]) );

            $sheet->setCellValue($this->increaseAlphaNo().$no, $this->getFromJson($company->main_customer, ['mani_customer_prefix', 5]) );
            $sheet->setCellValue($this->increaseAlphaNo().$no, $this->getFromJson($company->main_customer, ['main_customer_percent', 5]) );

            $sheet->setCellValue($this->increaseAlphaNo().$no, $this->getFromJson($company->production, ['space_for_plant']) );
            $sheet->setCellValue($this->increaseAlphaNo().$no, $this->getFromJson($company->production, ['production_capacity']) );
            $sheet->setCellValue($this->increaseAlphaNo().$no, $this->getFromJson($company->production, ['operation_ratio']) );
            $sheet->setCellValue($this->increaseAlphaNo().$no, $this->getFromJson($company->production, ['min_order_quantity']) );

            $sheet->setCellValue($this->increaseAlphaNo().$no, $this->setCertificates($company->cer_standard));
            $sheet->setCellValue($this->increaseAlphaNo().$no, $this->getFromJson($company->export_impot, ['export_country']) );
            $sheet->setCellValue($this->increaseAlphaNo().$no, $this->getFromJson($company->export_impot, ['export_item']) );
            $sheet->setCellValue($this->increaseAlphaNo().$no, $this->getFromJson($company->export_impot, ['import_country']) );
            $sheet->setCellValue($this->increaseAlphaNo().$no, $this->getFromJson($company->export_impot, ['import_item']) );

            $no++;
            $this->alpha_no = 'A'; //reset
        }
    }

    protected function setCertificates($data)
    {
        $data = json_decode($data);

        $result = [];

        foreach((object)$data as $array){
            if(is_array($array)){
                foreach($array as $value){
                    $result[] = $value;
                }
            }else{
                $result[] = $array;
            }

        };
        $result = array_filter($result); //remove zeros;

        return implode(", ",$result);
    }

    protected function setProduct412($products)
    {
        $products = (array)json_decode($products);
        if(!$products[412]){
            return '';
        }

        return Product::findOrFail($products[412])->name;
    }

    protected function setProducts($sheet, $no, $products)
    {
        $products = (array)json_decode($products);
        // $products = array_values($products);
        $array = [
            411, 421, 431, 441, 451, 461
        ];

        // $products = Product::whereIn('id', $products)->pluck('name')->toArray();

        for($i = 0; $i < 6; $i++){
            $product_name = isset($products[$array[$i]]) ? Product::findOrFail($products[$array[$i]])->name : '';
            $sheet->setCellValue($this->increaseAlphaNo().$no, $product_name);
        }

        return;
    }

    protected function setProcessings($sheet, $no, $data)
    {
        $data = (array)json_decode($data);
        $array = [
            511,521,531,541,551,561
        ];
        // $data = array_values($data);

        // $data = Processing::whereIn('id', $data)->pluck('main_process')->toArray();

        for($i = 0; $i < 6; $i++){
            $main_process = isset($data[$array[$i]]) ? Processing::findOrFail($data[$array[$i]])->main_process : '';
            $sheet->setCellValue($this->increaseAlphaNo().$no, $main_process);
        }

        return;
    }

    protected function getFromJson($json, $array) {
        $data = json_decode($json);
        if(!$data){
            return '';
        }

        foreach($array as $value){
            if(is_array($data)){
                $data = $data[$value];
            }else{
                $data = $data->$value;
            }
        }

        return $data;
    }

    public function download()
    {
        $writer = new Xlsx($this->spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment; filename=\"fileName.{$this->inputFileType}\"");
        $writer->save('php://output');
        return;
    }
}
