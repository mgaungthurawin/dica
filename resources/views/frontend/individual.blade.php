@extends('frontend.layouts.app')
@section('content')
<main class="page_main_wrapper">    
    <div class="container">    
        <div class="row">
            <div class="col-lg-12 mb-12">
                <div class="container-box" style="width: 100%;">
                    <div class="col-lg-4 mb-4">
                        <p>Category：{{ $company->category->title }}</p>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <p>Main Product：{{ implode(",",$company->products->pluck('name')->all()) }}</p>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <p>Main processing：{{ implode(",",$company->processings->pluck('main_process')->all()) }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 mb-12">
                <div class="container-box">
                    <table class="table">
                      <tbody>
                        <tr>
                          <td rowspan="2">Name of company</td>
                          <td width="50%">{{ $company->name }}</td>
                          <td width="25%">abbreviation</td>
                          <td width="25%">{{ $company->abbreviation }}</td>
                        </tr>
                        <tr>
                          <td>Burmese Notation</td>
                          <td colspan="2">{!! $company->mm_name !!}</td>
                        </tr>
                        <tr>
                          <td colspan="4">{{ $company->description }}</td>
                        </tr>
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
        @include('frontend.layouts.company_media')
        <div class="row">
            <div class="col-lg-12 mb-12">
                <div class="container-box">
                    <div class="col-lg-6 col-sm-6">
                        <h4>Main products including the use of you product</h4>
                        <table class="table table-striped">
                          <thead class="thead-dark">
                            <tr>
                              <th scope="col">No</th>
                              <th scope="col">Main product</th>
                            </tr>
                          </thead>
                          <tbody>
                                <?php 
                                  $product_index = 1;
                                  $company_product = $company->products->pluck('id')->all();
                                  $products = getMainProduct($company_product);
                                ?>
                                @foreach($products as $product)
                                <tr>
                                    <th scope="row">{{$product_index}}</th>
                                    <td>{{ $product->name }}</td>
                                </tr>
                                <?php $product_index++; ?>
                                @endforeach
                          </tbody>
                        </table>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <h4>Main processing classification</h4>
                        <table class="table table-striped">
                          <thead class="thead-dark">
                            <tr>
                              <th scope="col">No</th>
                              <th scope="col">Processing classification</th>
                            </tr>
                          </thead>

                          <tbody>
                            <?php 
                              $processing_index = 1;
                              $company_processing = $company->processings->pluck('id')->all();
                              $processings = getMainProcessing($company_processing);
                            ?>
                            @foreach($processings as $processing)
                            <tr>
                                <th scope="row">{{$processing_index}}</th>
                                <td>{{ $processing->main_process }}</td>
                            </tr>
                            <?php $processing_index++; ?>
                            @endforeach
                          </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>

        <!-- <tr>
            <th class="row" colspan="7" rowspan="1">Main Machine and Equipment</th>
        </tr> -->
        <div class="row">
          <div class="form-group col-sm-12">
            <div class="container-box">
                <h4>Main Machine and Equipment</h4>
                  <table class="table">
                      <thead class="thead-dark">
                          <th>#</th>
                          <th>Type Of Equipment</th>
                          <th>Model Destigation</th>
                          <th>Num. of Machine</th>
                          <th>Machine builder</th>
                          <th>Country Origin</th>
                      </thead>
                      <tbody>
                          <?php $i=1; ?>
                          @foreach($main_machine_equipment['type_of_equipment'] as $key => $mm)
                              <tr>
                                  <td>{{ $i }}</td>
                                    <td>
                                      {!! authValue($main_machine_equipment['type_of_equipment'][$key]) !!}
                                    </td>
                                    <td>
                                      {!! authValue($main_machine_equipment['model_destination'][$key]) !!}
                                    </td>
                                    <td>
                                      {!! authValue($main_machine_equipment['no_machine'][$key]) !!}
                                    </td>
                                    <td>
                                      {!! authValue($main_machine_equipment['machine_builder'][$key]) !!}
                                    </td>
                                    <td>
                                      {!! authValue($main_machine_equipment['machine_country_origin'][$key]) !!}
                                    </td>
                              </tr>
                              <?php $i++; ?>
                          @endforeach

                      </tbody>
                  </table>
            </div>
          </div>
        </div>


        <div class="row">
            <div class="col-lg-12 mb-12">
                <div class="container-box">
                    <h4>Company Profile</h4>
                    <table class="table">
                      <tbody>
                        <tr>
                          <th scope="row" rowspan="11">Contact</th>
                          <td colspan="4">URL</td>
                          <th colspan="8">
                            {{ authValue($company->company_url) }}</th>
                        </tr>
                        <tr>
                          <td scope="row" rowspan="3" colspan="2">Office</td>
                          <td rowspan="2" colspan="2">{{ authValue("Address") }}</td>
                          <td>{!! authValue('<i class="fa fa-check-square"></i>') !!}</td>
                          <td>{{ authValue($contact['office']['office_location']) }}</td>
                          <td>{!! authValue('<i class="fa fa-square"></i>') !!}</td>
                          <td colspan="5">
                            @if(Auth::user())
                              Other (    {{ $contact['office']['office_location_other'] }}         )
                            @endif
                        </td>
                        </tr>
                        <tr>
                            <td scope="row" colspan="8">{{ authValue($contact['office']['office_address']) }}</td>
                        </tr>
                        <tr>
                          <td scope="row" colspan="2">{{ authValue("TEL") }}</td>
                          <td colspan="3">{{ authValue($contact['office']['office_tel']) }}</td>
                          <td colspan="2">{{ authValue("FAX") }}</td>
                          <td colspan="3">{{ authValue($contact['office']['office_tel']) }}</td>
                        </tr>
                        <tr>
                          <td scope="row" rowspan="3" colspan="2">Plant</td>
                          <td rowspan="2" colspan="2">{{ authValue("Address") }}</td>
                          <td>{!! authValue(checkUncheck($contact['plant']['plant_location'])) !!}</i></td>
                          <td>{{ authValue($contact['plant']['plant_location']) }}</td>
                          <td>{!! authValue(checkUncheck($contact['plant']['plant_location_other'])) !!}</i></td>
                          <td colspan="5">
                            @if(Auth::user())
                              Other (     {{ $contact['plant']['plant_location_other'] }}        )
                            @endif
                            </td>
                        </tr>                        
                        <tr>
                            <td scope="row" colspan="8">{{ authValue($contact['plant']['plant_address']) }}</td>
                        </tr>
                        <tr>
                          <td scope="row" colspan="2">{{ authValue("TEL") }}</td>
                          <td colspan="3">{{ authValue($contact['plant']['plant_tel']) }}</td>
                          <td colspan="2">{{ authValue("FAX") }}</td>
                          <td colspan="3">{{ authValue($contact['plant']['plant_fax']) }}</td>
                        </tr>
                        <tr>
                          <td scope="row" colspan="2">Representative</td>
                          <td colspan="2">{{ authValue("Name") }}</td>
                          <td colspan="3">{{ authValue($contact['representative']['repre_name']) }}</td>
                          <td colspan="2">{{ authValue("Title") }}</td>
                          <td colspan="2">{{ authValue($contact['representative']['repre_tittle']) }}</td>
                        </tr>
                        <tr>
                          <td scope="row" colspan="2" rowspan="3">Person in charge</td>
                          <td colspan="2">{{ authValue("Name") }}</td>
                          <td colspan="3">{{ authValue($contact['pic']['pic_name']) }}</td>
                          <td colspan="2">{{ authValue("Title") }}</td>
                          <td colspan="2">{{ authValue($contact['pic']['pic_title']) }}</td>
                        </tr>
                        <tr>
                          <td scope="row" colspan="2">{{ authValue("TEL") }}</td>
                          <td colspan="3">{{ authValue($contact['pic']['pic_tel']) }}</td>
                          <td colspan="2">{{ authValue("Email") }}</td>
                          <td colspan="3">{{ authValue($contact['pic']['pic_email']) }}</td>
                        </tr>
                        <tr>
                          <td scope="row" colspan="2">{{ authValue("Language") }}</td>
                          <td>{!! authValue(checkUncheck($contact['pic']['language'])) !!}</td>
                          <td>{{ authValue($contact['pic']['language']) }}</td>
                          <td>{!! authValue(checkUncheck($contact['pic']['language_other'])) !!}</td>
                          <td colspan="5">
                            @if(Auth::user())
                              Other (   {{ $contact['pic']['language_other'] }}   )
                            @endif
                            </td>
                        </tr>
                        <tr>

                          <th scope="row" rowspan="2">Company Info.</th>
                          <td colspan="2">Year of estabishment</td>
                          <td colspan="2">{{ authValue($company_info['estabishment']) }}</td>
                          <td colspan="2">{{ authValue("Num. of Employee") }}</td>
                          <td colspan="2">{{ authValue($company_info['no_employee']) }}</td>
                          <td rowspan="2" colspan="4">{{ authValue("Production") }}</td>
                        </tr>
                        <tr>
                          <td scope="row" colspan="2">Capital</td>
                          <td colspan="2">{{ authValue($company_info['capital']) }}</td>
                          <td colspan="2">{{ authValue("Annual Sales Amount") }}</td>
                          <td colspan="2">{{ authValue($company_info['annual_amount']) }}</td>
                        </tr>
                        <tr>
                          <th scope="row" rowspan="4">Low material</th>
                            <td colspan="2" style="text-align: right;">{{ authValue("No") }}</td>
                            @foreach($low_material['name_of_material'] as $key => $lm)
                              <td colspan="2">{{ authValue($key + 1) }}</td>
                            @endforeach
                            <td colspan="2">{{ authValue("Space for Plant") }}</td>
                            <td colspan="2">{{ authValue($production['space_for_plant']) }}</td>
                        </tr>
                        <tr>
                          <td colspan="2">{{ authValue("Name of Material") }}</td>
                          @foreach($low_material['name_of_material'] as $key => $lm)
                            <td colspan="2">{{ authValue($lm) }}</td>
                          @endforeach
                          <td colspan="2">{{ authValue("Production Capacity") }}</td>
                          <td colspan="2">{{ authValue($production['production_capacity']) }}</td>
                        </tr>
                        <tr>
                          <td colspan="2">{{ authValue("Supplier Name") }}</td>
                          @foreach($low_material['supplier_name'] as $key => $sn)
                            <td colspan="2">{{ authValue($sn) }}</td>
                          @endforeach
                          <td colspan="2">{{ authValue("Operation Ratio") }}</td>
                          <td colspan="2">{{ authValue($production['operation_ratio']) }}</td>
                        </tr>
                        <tr>
                          <td colspan="2">{{ authValue("Country of Origin") }}</td>
                          @foreach($low_material['country_origin'] as $key => $co)
                            <td colspan="2">{{ authValue($co) }}</td>
                          @endforeach
                          <td colspan="2">{{ authValue("Min Order Quantity") }}</td>
                          <td colspan="2">{{ authValue($production['min_order_quantity']) }}</td>
                        </tr>
                        <tr>
                          <th scope="row" rowspan="2"> {{ authValue("Main customer") }}</th>
                          @foreach($main_customer['mani_customer_prefix'] as $prefix)
                            <td colspan="2">{{ authValue($prefix) }}</td>
                          @endforeach
                        </tr>
                        <tr>
                          @foreach($main_customer['main_customer_percent'] as $percent)
                            <td colspan="2">{{ authValue($percent) }}</td>
                          @endforeach
                        </tr>
                        <tr>
                          <th scope="row" rowspan="3">Certification and Standard</th>
                            @foreach($certificate as $c)
                              <td>
                                @if(Auth::user())
                                <i
                                  @if(in_array($c, $cer_standard['certificate']))
                                    class="fa fa-check-square"
                                  @else 
                                      class="fa fa-square"
                                  @endif
                                >
                                @endif
                              </td>
                              <td>{{ authValue($c) }}</td>
                            @endforeach
                            <td colspan="5">{{ authValue($cer_standard['certificate_other']) }}</td>
                        </tr>
                        <tr>
                          @foreach($standard as $s)
                            <td>
                              @if(Auth::user())
                              <i
                                @if(in_array($s, $cer_standard['standard']))
                                  class="fa fa-check-square"
                                @else 
                                    class="fa fa-square"
                                @endif
                              >
                              @endif
                            </td>
                            <td>{{ authValue($s) }}</td>
                          @endforeach
                          <td>{{ authValue($cer_standard['standard_other']) }}</td>
                        </tr>
                        <tr>
                            <td>
                              @if(Auth::user())
                                @if(in_array($s, $cer_standard['standard']))
                                  <i class="fa fa-check-square"></i>
                                @else 
                                    <i class="fa fa-square"></i>
                                @endif
                              @endif
                                {{ authValue("Other") }}
                            </td>
                          <td colspan="7">{{ authValue($cer_standard['standard_other']) }}</td>
                          <td colspan="3"></td>
                        </tr>
                        <tr>
                          <th scope="row" rowspan="2">Export and Import</th>
                          <td>{{ authValue("Export") }}</td>
                          <td>{{ authValue("Country") }}</td>
                          <td colspan="4">{{ authValue($export_impot['export_country']) }}</td>
                          <td>{{ authValue("Ex. Items") }}</td>
                          <td colspan="5">{{ authValue($export_impot['export_item']) }}</td>
                        </tr>
                        <tr>
                          <td>{{ authValue("Import") }}</td>
                          <td>{{ authValue("Country") }}</td>
                          <td colspan="4">{{ authValue($export_impot['import_country']) }}</td>
                          <td>{{ authValue("Im. Items") }}</td>
                          <td colspan="5">{{ authValue($export_impot['import_item']) }}</td>
                        </tr>
                        <tr>
                          <th scope="row">Special Notes</th>
                          <td colspan="12">{{ authValue($company->special_note) }}</td>
                        </tr>
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.row -->         
    </div>
</main>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script>
  $(document).ready(function(){
    $("#alert").modal('show');
  });
</script>
@endsection