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

    public function __construct()
    {
        $this->inputFileType = 'Xlsx'; // Xlsx - Xml - Ods - Slk - Gnumeric - Csv
        $inputFileName = storage_path('templates/company-excel.xlsx');

        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($this->inputFileType);
        $this->spreadsheet = $reader->load($inputFileName);

        $this->setData();
    }

    public function setData()
    {
        $sheet = $this->spreadsheet->getActiveSheet();
        $companies = Company::all();
        $no = 2;

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

            $sheet->setCellValue('A'.$no, $company->id);
            $sheet->setCellValue('B'.$no, $company->category->title);
            $sheet->setCellValue('C'.$no, $company->name);
            $sheet->setCellValue('D'.$no, $company->mm_name);
            $sheet->setCellValue('E'.$no, $company->description);
            $sheet->setCellValue('F'.$no, $company->strong_point);
            $sheet->setCellValue('G'.$no, $this->getFromJson($company->contact, [
                'office',
                'office_location'
            ]) );
            $sheet->setCellValue('H'.$no, $company->office_address);
            $sheet->setCellValue('I'.$no, $company->office_tel);
            $sheet->setCellValue('J'.$no, $this->getFromJson($company->contact, [
                'representative',
                'repre_name'
            ]) );
            $sheet->setCellValue('K'.$no, $this->getFromJson($company->contact, [
                'representative',
                'repre_tittle'
            ]) );
            $sheet->setCellValue('L'.$no, $this->getFromJson($company->contact, ['pic', 'pic_name']) );
            $sheet->setCellValue('M'.$no, $this->getFromJson($company->contact, ['pic', 'pic_title']) );
            $sheet->setCellValue('N'.$no, $this->getFromJson($company->contact, ['pic', 'pic_tel']) );
            $sheet->setCellValue('O'.$no, $this->getFromJson($company->contact, ['pic', 'pic_email']) );

            $sheet->setCellValue('P'.$no, $company->company_url);
            $sheet->setCellValue('Q'.$no, $this->getFromJson($company->company_info, ['estabishment']) );
            $sheet->setCellValue('R'.$no, $this->getFromJson($company->company_info, ['capital']) );
            $sheet->setCellValue('S'.$no, $this->getFromJson($company->company_info, ['annual_amount']) );
            $sheet->setCellValue('T'.$no, $this->getFromJson($company->company_info, ['no_employee']) );

            $this->setProducts($sheet, $no, $company->products);

            $this->setProcessings($sheet, $no, $company->processings);

            $sheet->setCellValue('AG'.$no, $this->getFromJson($company->main_machine_equipment, ['type_of_equipment', 0]) );
            $sheet->setCellValue('AH'.$no, $this->getFromJson($company->main_machine_equipment, ['model_destination', 0]) );
            $sheet->setCellValue('AI'.$no, $this->getFromJson($company->main_machine_equipment, ['no_machine', 0]) );
            $sheet->setCellValue('AJ'.$no, $this->getFromJson($company->main_machine_equipment, ['machine_builder', 0]) );
            $sheet->setCellValue('AK'.$no, $this->getFromJson($company->main_machine_equipment, ['machine_country_origin', 0]) );

            $sheet->setCellValue('AL'.$no, $this->getFromJson($company->main_machine_equipment, ['type_of_equipment', 1]) );
            $sheet->setCellValue('AM'.$no, $this->getFromJson($company->main_machine_equipment, ['model_destination', 1]) );
            $sheet->setCellValue('AN'.$no, $this->getFromJson($company->main_machine_equipment, ['no_machine', 1]) );
            $sheet->setCellValue('AO'.$no, $this->getFromJson($company->main_machine_equipment, ['machine_builder', 1]) );
            $sheet->setCellValue('AP'.$no, $this->getFromJson($company->main_machine_equipment, ['machine_country_origin', 1]) );

            $sheet->setCellValue('AQ'.$no, $this->getFromJson($company->main_machine_equipment, ['type_of_equipment', 2]) );
            $sheet->setCellValue('AR'.$no, $this->getFromJson($company->main_machine_equipment, ['model_destination', 2]) );
            $sheet->setCellValue('AS'.$no, $this->getFromJson($company->main_machine_equipment, ['no_machine', 2]) );
            $sheet->setCellValue('AT'.$no, $this->getFromJson($company->main_machine_equipment, ['machine_builder', 2]) );
            $sheet->setCellValue('AU'.$no, $this->getFromJson($company->main_machine_equipment, ['machine_country_origin', 2]) );

            $sheet->setCellValue('AV'.$no, $this->getFromJson($company->main_machine_equipment, ['type_of_equipment', 3]) );
            $sheet->setCellValue('AW'.$no, $this->getFromJson($company->main_machine_equipment, ['model_destination', 3]) );
            $sheet->setCellValue('AX'.$no, $this->getFromJson($company->main_machine_equipment, ['no_machine', 3]) );
            $sheet->setCellValue('AY'.$no, $this->getFromJson($company->main_machine_equipment, ['machine_builder', 3]) );
            $sheet->setCellValue('AZ'.$no, $this->getFromJson($company->main_machine_equipment, ['machine_country_origin', 3]) );

            $sheet->setCellValue('BA'.$no, $this->getFromJson($company->main_machine_equipment, ['type_of_equipment', 4]) );
            $sheet->setCellValue('BB'.$no, $this->getFromJson($company->main_machine_equipment, ['model_destination', 4]) );
            $sheet->setCellValue('BC'.$no, $this->getFromJson($company->main_machine_equipment, ['no_machine', 4]) );
            $sheet->setCellValue('BD'.$no, $this->getFromJson($company->main_machine_equipment, ['machine_builder', 4]) );
            $sheet->setCellValue('BE'.$no, $this->getFromJson($company->main_machine_equipment, ['machine_country_origin', 4]) );

            $sheet->setCellValue('BF'.$no, $this->getFromJson($company->main_machine_equipment, ['type_of_equipment', 5]) );
            $sheet->setCellValue('BG'.$no, $this->getFromJson($company->main_machine_equipment, ['model_destination', 5]) );
            $sheet->setCellValue('BH'.$no, $this->getFromJson($company->main_machine_equipment, ['no_machine', 5]) );
            $sheet->setCellValue('BI'.$no, $this->getFromJson($company->main_machine_equipment, ['machine_builder', 5]) );
            $sheet->setCellValue('BJ'.$no, $this->getFromJson($company->main_machine_equipment, ['machine_country_origin', 5]) );

            $sheet->setCellValue('BK'.$no, $this->getFromJson($company->low_material, ['name_of_material', 0]) );
            $sheet->setCellValue('BL'.$no, $this->getFromJson($company->low_material, ['supplier_name', 0]) );
            $sheet->setCellValue('BM'.$no, $this->getFromJson($company->low_material, ['country_origin', 0]) );

            $sheet->setCellValue('BN'.$no, $this->getFromJson($company->low_material, ['name_of_material', 1]) );
            $sheet->setCellValue('BO'.$no, $this->getFromJson($company->low_material, ['supplier_name', 1]) );
            $sheet->setCellValue('BP'.$no, $this->getFromJson($company->low_material, ['country_origin', 1]) );

            $sheet->setCellValue('BQ'.$no, $this->getFromJson($company->low_material, ['name_of_material', 2]) );
            $sheet->setCellValue('BR'.$no, $this->getFromJson($company->low_material, ['supplier_name', 2]) );
            $sheet->setCellValue('BS'.$no, $this->getFromJson($company->low_material, ['country_origin', 2]) );

            $sheet->setCellValue('BT'.$no, $this->getFromJson($company->main_customer, ['mani_customer_prefix', 0]) );
            $sheet->setCellValue('BU'.$no, $this->getFromJson($company->main_customer, ['main_customer_percent', 0]) );

            $sheet->setCellValue('BV'.$no, $this->getFromJson($company->main_customer, ['mani_customer_prefix', 1]) );
            $sheet->setCellValue('BW'.$no, $this->getFromJson($company->main_customer, ['main_customer_percent', 1]) );

            $sheet->setCellValue('BX'.$no, $this->getFromJson($company->main_customer, ['mani_customer_prefix', 2]) );
            $sheet->setCellValue('BY'.$no, $this->getFromJson($company->main_customer, ['main_customer_percent', 2]) );

            $sheet->setCellValue('BZ'.$no, $this->getFromJson($company->main_customer, ['mani_customer_prefix', 3]) );
            $sheet->setCellValue('CA'.$no, $this->getFromJson($company->main_customer, ['main_customer_percent', 3]) );

            $sheet->setCellValue('CB'.$no, $this->getFromJson($company->main_customer, ['mani_customer_prefix', 4]) );
            $sheet->setCellValue('CC'.$no, $this->getFromJson($company->main_customer, ['main_customer_percent', 4]) );

            $sheet->setCellValue('CD'.$no, $this->getFromJson($company->main_customer, ['mani_customer_prefix', 5]) );
            $sheet->setCellValue('CE'.$no, $this->getFromJson($company->main_customer, ['main_customer_percent', 5]) );

            $sheet->setCellValue('CF'.$no, $this->getFromJson($company->production, ['space_for_plant']) );
            $sheet->setCellValue('CG'.$no, $this->getFromJson($company->production, ['production_capacity']) );
            $sheet->setCellValue('CH'.$no, $this->getFromJson($company->production, ['operation_ratio']) );
            $sheet->setCellValue('CI'.$no, $this->getFromJson($company->production, ['min_order_quantity']) );

            $sheet->setCellValue('CJ'.$no, $this->setCertificates($company->cer_standard));
            $sheet->setCellValue('CK'.$no, $this->getFromJson($company->export_impot, ['export_country']) );
            $sheet->setCellValue('CL'.$no, $this->getFromJson($company->export_impot, ['export_item']) );
            $sheet->setCellValue('CM'.$no, $this->getFromJson($company->export_impot, ['import_country']) );
            $sheet->setCellValue('CN'.$no, $this->getFromJson($company->export_impot, ['import_item']) );

            $no++;
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

    protected function setProducts($sheet, $no, $products)
    {
            $products = (array)json_decode($products);
            $products = array_values($products);
            $products = Product::whereIn('id', $products)->pluck('name')->toArray();

            $alphabets = [
                'U', 'V', 'W', 'X', 'Y', 'Z'
            ];

            for($i = 0; $i < 6; $i++){
                $sheet->setCellValue($alphabets[$i].$no, $products[$i]);
            }

            return;
    }

    protected function setProcessings($sheet, $no, $data)
    {
            $data = (array)json_decode($data);
            $data = array_values($data);
            $data = Processing::whereIn('id', $data)->pluck('main_process')->toArray();

            $alphabets = [
                'AA', 'AB', 'AC', 'AD', 'AE', 'AF'
            ];

            for($i = 0; $i < 6; $i++){
                $sheet->setCellValue($alphabets[$i].$no, $data[$i]);
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
