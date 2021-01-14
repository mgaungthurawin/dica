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
                          <td>{{ $company->nation }}</td>
                          <td colspan="2">&nbsp;</td>
                        </tr>
                        <tr>
                          <td colspan="4">{{ $company->description }}</td>
                        </tr>
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
        @if(!empty(Auth::user()))
        @include('frontend.layouts.company_media')
        <div class="row">
            <div class="col-lg-12 mb-12">
                <div class="container-box">
                    @if(MATERIAL==$company->type)
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
                            <?php $processing_index = 1;?>
                            @foreach($company->processings->pluck('main_process')->all() as $processing)
                            <tr>
                                <th scope="row">{{$processing_index}}</th>
                                <td>{{ $processing }}</td>
                            </tr>
                            <?php $processing_index++; ?>
                            @endforeach
                          </tbody>
                        </table>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <h4>Main products</h4>
                        <table class="table table-striped">
                          <thead class="thead-dark">
                            <tr>
                              <th scope="col">No</th>
                              <th scope="col">Main product</th>
                            </tr>
                          </thead>
                          <tbody>
                                <?php $product_index = 1;?>
                                @foreach($company->products->pluck('name')->all() as $product)
                                <tr>
                                    <th scope="row">{{$product_index}}</th>
                                    <td>{{ $product }}</td>
                                </tr>
                                <?php $product_index++; ?>
                                @endforeach
                          </tbody>
                        </table>
                    </div>
                    @endif
                    @if(TEXTILE == $company->type)
                      <div class="col-lg-6 col-sm-6">
                          <h4>Main processing classification</h4>
                          <table class="table table-striped">
                            <thead class="thead-dark">
                              <tr>
                                <th scope="col">No</th>
                                <th scope="col">Processing Classification</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php $processing_index = 1;?>
                              @foreach($company->processings->pluck('main_process')->all() as $processing)
                              <tr>
                                  <th scope="row">{{$processing_index}}</th>
                                  <td>{{ $processing }}</td>
                              </tr>
                              <?php $processing_index++; ?>
                              @endforeach
                            </tbody>
                          </table>
                      </div>
                      <div class="col-lg-6 col-sm-6">
                          <h4>Locations</h4>
                          <table class="table table-striped">
                            <thead class="thead-dark">
                              <tr>
                                <th scope="col">No</th>
                                <th scope="col">Location</th>
                              </tr>
                            </thead>
                            <tbody>
                                  <?php $location_index = 1;?>
                                  @foreach($company->locations->pluck('name')->all() as $location)
                                  <tr>
                                      <th scope="row">{{$location_index}}</th>
                                      <td>{{ $location }}</td>
                                  </tr>
                                  <?php $location_index++; ?>
                                  @endforeach
                            </tbody>
                          </table>
                      </div>
                    @endif

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
                          <th colspan="8">{{ $company->company_url }}</th>
                        </tr>
                        <tr>
                          <td scope="row" rowspan="3" colspan="2">Office</td>
                          <td rowspan="2" colspan="2">Address</td>
                          <td><i class="fa fa-check-square"></i></td>
                          <td>{{ $contact['office']['office_location'] }}</td>
                          <td><i class="fa fa-square"></i></td>
                          <td colspan="5">Other (    {{ $contact['office']['office_location_other'] }}         )</td>
                        </tr>
                        <tr>
                            <td scope="row" colspan="8">{{ $contact['office']['office_address'] }}</td>
                        </tr>
                        <tr>
                          <td scope="row" colspan="2">TEL</td>
                          <td colspan="3">{{ $contact['office']['office_tel'] }}</td>
                          <td colspan="2">FAX</td>
                          <td colspan="3">{{ $contact['office']['office_tel'] }}</td>
                        </tr>
                        <tr>
                          <td scope="row" rowspan="3" colspan="2">Plant</td>
                          <td rowspan="2" colspan="2">Address</td>
                          <td>{!! checkUncheck($contact['plant']['plant_location']) !!}</i></td>
                          <td>{{ $contact['plant']['plant_location'] }}</td>
                          <td>{!! checkUncheck($contact['plant']['plant_location_other']) !!}</i></td>
                          <td colspan="5">Other (     {{ $contact['plant']['plant_location_other'] }}        )</td>
                        </tr>                        
                        <tr>
                            <td scope="row" colspan="8">{{ $contact['plant']['plant_address'] }}</td>
                        </tr>
                        <tr>
                          <td scope="row" colspan="2">TEL</td>
                          <td colspan="3">{{ $contact['plant']['plant_tel'] }}</td>
                          <td colspan="2">FAX</td>
                          <td colspan="3">{{ $contact['plant']['plant_fax'] }}</td>
                        </tr>
                        <tr>
                          <td scope="row" colspan="2">Representative</td>
                          <td colspan="2">Name</td>
                          <td colspan="3">{{ $contact['representative']['repre_name'] }}</td>
                          <td colspan="2">Title</td>
                          <td colspan="2">{{ $contact['representative']['repre_tittle'] }}</td>
                        </tr>
                        <tr>
                          <td scope="row" colspan="2" rowspan="3">Person in charge</td>
                          <td colspan="2">Name</td>
                          <td colspan="3">{{ $contact['pic']['pic_name'] }}</td>
                          <td colspan="2">Title</td>
                          <td colspan="2">{{ $contact['pic']['pic_title'] }}</td>
                        </tr>
                        <tr>
                          <td scope="row" colspan="2">TEL</td>
                          <td colspan="3">{{ $contact['pic']['pic_tel'] }}</td>
                          <td colspan="2">Email</td>
                          <td colspan="3">{{ $contact['pic']['pic_email'] }}</td>
                        </tr>
                        <tr>
                          <td scope="row" colspan="2">Language</td>
                          <td>{!! checkUncheck($contact['pic']['language']) !!}</td>
                          <td>{{ $contact['pic']['language'] }}</td>
                          <td>{!! checkUncheck($contact['pic']['language_other']) !!}</td>
                          <td colspan="5">Other (   {{ $contact['pic']['language_other'] }}   )</td>
                        </tr>
                        <tr>
                          <th scope="row" rowspan="2">Company Info.</th>
                          <td colspan="2">Year of estabishment</td>
                          <td colspan="2">{{ $company_info['estabishment'] }}</td>
                          <td colspan="2">Num. of Employee</td>
                          <td colspan="2">{{ $company_info['no_employee'] }}</td>
                          <td rowspan="2" colspan="4">Production</td>
                        </tr>
                        <tr>
                          <td scope="row" colspan="2">Capital</td>
                          <td colspan="2">{{ $company_info['capital'] }}</td>
                          <td colspan="2">Annual Sales Amount</td>
                          <td colspan="2">{{ $company_info['annual_amount'] }}</td>
                        </tr>
                        <tr>
                          <th scope="row" rowspan="4">Low material</th>
                          <td colspan="2" style="text-align: right;">No</td>
                          @foreach($low_material['name_of_material'] as $key => $lm)
                            <td colspan="2">{{ $key + 1 }}</td>
                          @endforeach
                          <td colspan="2">Space for Plant</td>
                          <td colspan="2">{{ $production['space_for_plant'] }}</td>
                        </tr>
                        <tr>
                          <td colspan="2">Name of Material</td>
                          @foreach($low_material['name_of_material'] as $key => $lm)
                            <td colspan="2">{{ $lm }}</td>
                          @endforeach
                          <td colspan="2">Production Capacity</td>
                          <td colspan="2">{{ $production['production_capacity'] }}</td>
                        </tr>
                        <tr>
                          <td colspan="2">Supplier Name</td>
                          @foreach($low_material['supplier_name'] as $key => $sn)
                            <td colspan="2">{{ $sn }}</td>
                          @endforeach
                          <td colspan="2">Operation Ratio</td>
                          <td colspan="2">{{ $production['operation_ratio'] }}</td>
                        </tr>
                        <tr>
                          <td colspan="2">Country of Origin</td>
                          @foreach($low_material['country_origin'] as $key => $co)
                            <td colspan="2">{{ $co }}</td>
                          @endforeach
                          <td colspan="2">Min Order Quantity</td>
                          <td colspan="2">{{ $production['min_order_quantity'] }}</td>
                        </tr>
                        <tr>
                          <th scope="row" rowspan="2">Main customer</th>
                          @foreach($main_customer['mani_customer_prefix'] as $prefix)
                            <td colspan="2">{{ $prefix }}</td>
                          @endforeach
                        </tr>
                        <tr>
                          @foreach($main_customer['main_customer_percent'] as $percent)
                            <td colspan="2">{{ $percent }}</td>
                          @endforeach
                        </tr>
                        <tr>
                          <th scope="row" rowspan="3">Certification and Standard</th>
                          @foreach($certificate as $c)
                            <td><i
                                @if(in_array($c, $cer_standard['certificate']))
                                  class="fa fa-check-square"
                                @else 
                                    class="fa fa-square"
                                @endif
                              ></td>
                            <td>{{ $c }}</td>
                          @endforeach
                          <td colspan="5">{{ $cer_standard['certificate_other'] }}</td>
                        </tr>
                        <tr>
                          @foreach($standard as $s)
                            <td><i
                                @if(in_array($s, $cer_standard['standard']))
                                  class="fa fa-check-square"
                                @else 
                                    class="fa fa-square"
                                @endif
                              ></td>
                            <td>{{ $s }}</td>
                          @endforeach
                          <td>{{ $cer_standard['standard_other'] }}</td>
                        </tr>
                        <tr>
                            <td>
                                @if(in_array($s, $cer_standard['standard']))
                                  <i class="fa fa-check-square"></i>
                                @else 
                                    <i class="fa fa-square"></i>
                                @endif
                                Other
                            </td>
                          <td colspan="7">{{ $cer_standard['standard_other'] }}</td>
                          <td colspan="3"></td>
                        </tr>
                        <tr>
                          <th scope="row" rowspan="2">Export and Import</th>
                          <td>Export</td>
                          <td>Country</td>
                          <td colspan="4">{{ $export_impot['export_country'] }}</td>
                          <td>Ex. Items</td>
                          <td colspan="5">{{ $export_impot['export_item'] }}</td>
                        </tr>
                        <tr>
                          <td>Import</td>
                          <td>Country</td>
                          <td colspan="4">{{ $export_impot['import_country'] }}</td>
                          <td>Im. Items</td>
                          <td colspan="5">{{ $export_impot['import_item'] }}</td>
                        </tr>
                        <tr>
                          <th scope="row">Special Notes</th>
                          <td colspan="12">{{ $company->special_note }}</td>
                        </tr>
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
      @endif
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