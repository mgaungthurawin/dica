@extends('frontend.layouts.app')
@section('content')
<main class="page_main_wrapper">
    <div class="row">
        <div class="col-lg-12 mb-12">
            <div class="container-box">
                <table class="table">  
                    <tr>
                      <th rowspan="2">Company name</th>
                      <td>{!! $company->name !!}</td>
                    </tr>
                    <tr>
                      <td>{!! $company->mm_name !!}</td>
                    </tr>
                    <tr>
                      <td colspan="5">{!! $company->abbreviation !!}
                      </td>  
                    </tr> 
                    <tr>
                      <td colspan="5">
                        <div class="row">
                        @foreach($company->products as $product)
                        <div class="col-md-6"><img src="{{ asset($product->media->file_path . $product->media->file_name) }}" alt="" class="img-responsive"></div>
                        @endforeach


                        {{--<div class="col-md-6"><img src="{{ asset('frontend/images/slide-03.jpg') }}" alt="" class="img-responsive"></div>--}}
                      </div>    
                      </td>  
                    </tr> 
                </table>
            </div>

            <div class="row">
                <div class="col-lg-12 mb-12">
                    <div class="container-box">
                        <div class="col-lg-5 col-sm-5">
                            <h3>Products</h3>
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
                        
                    </div>
                </div>
            </div>
      
            {{--<div class="row">
                <div class="col-lg-12 mb-12">
                    <div class="container-box">
                        <table class="table">
                          <thead> 
                            <h3> Products</h3>
                          </thead>
                          <tbody>
                            <tr>
                              <th scope="row"><center>1</center></th>
                              <td>Green tea</td>
                              <td><center>4</center></td>
                              <td>Purple tea</td>
                            </tr>
                            <tr>
                              <th scope="row"><center>2</center></th>
                              <td>White tea</td>
                              <td><center>5</center></td>
                              <td>Flavor tea</td>
                            </tr>
                            <tr>
                              <th scope="row"><center>3</center></th>
                              <td>Black tea</td>
                              <td><center>6</center></td>
                              <td>Pu'erh Tea</td>
                            </tr>
                            
                          </tbody>
                        </table>
                    </div>
                </div>
             </div>--}}


             <div class="row">
                    <div class="col-lg-12 mb-12">
                        <div class="container-box">
                            <table class="table ">
                              <thead> 
                                <h3>Company</h3>
                              </thead>
                              <tbody>
                                
                                <tr>
                                <th rowspan="11">Contact</th>
                                <td colspan="6">{!! $company->company_url !!}</td>
                                </tr>
                                <tr>
                                   <td rowspan="2">Office</td>
                                    <td colspan="5">{!! $company->office_address !!}</td>
                                    <tr>
                                      <td>TEL</td>
                                      <td colspan="2">{!! $company->office_tel !!}</td>
                                      <td colspan="1">FAX</td>
                                      <td>{!! $company->office_fax !!}</td>
                                    </tr>
                                </tr>
                                <tr>
                                  <td rowspan="2">Factory</td>
                                    <td colspan="5">{!! $company->factory_address !!}</td>
                                    <tr>
                                      <td>TEL</td>
                                      <td colspan="2">{!! $company->factory_tel !!}</td>
                                      <td colspan="1">FAX</td>
                                      <td>{!! $company->factory_fax !!}</td>
                                    </tr>
                                </tr>
                                <tr>
                                  <td>MD/CEO</td>
                                  <td>Name</td>
                                  <td>{!! $company->md_ceo_name !!}</td>
                                  <td>Position</td>
                                  <td colspan="2">{!! $company->md_ceo_position !!}</td>
                                </tr>
                                <tr>
                                  <td>Production/Factory Manager</td>
                                  <td>Name</td>
                                  <td>{!! $company->factory_manager_name !!}</td>
                                  <td>Position</td>
                                  <td colspan="2">{!! $company->factory_manager_position !!}</td>
                                </tr>
                                <tr>
                                  <td>Hygiene manager</td>
                                  <td>Name</td>
                                  <td>{!! $company->hygiene_manager_name !!}</td>
                                  <td>Position</td>
                                  <td colspan="2">{!! $company->hygiene_manager_position !!}</td>
                                </tr>
                                <tr>
                                  <td rowspan="3">Contact Person</td>
                                  <td>Name</td>
                                  <td>{!! $company->cp_name !!}</td>
                                  <td>Position</td>
                                  <td colspan="2">{!! $company->cp_position !!}</td>
                                </tr>
                                <tr>
                                  <td>TEL</td>
                                  <td>{!! $company->cp_tel !!}</td>
                                  <td>Email</td>
                                  <td colspan="2">{!! $company->cp_email !!}</td>
                                </tr>


                                <tr>
                                  <td scope="row" colspan="1">Foreign Language</td>
                                  <td>{!! checkUncheck($company['language']) !!}</td>
                                  <td>{{ $company['language'] }}</td>
                                  <td>{!! checkUncheck($company['language_other']) !!}</td>
                                  <td colspan="1">Other (   {{ $company['language_other'] }}   )</td>
                                </tr>


                                {{--<tr>
                                  <td>Foreign Language</td>
                                  <td>
                                    <div class="col-md-6">
                                       <input type="checkbox">
                                      </div>
                                      <div class="col-md-6">
                                        {!! checkUncheck($company['language']) !!}
                                      </div>
                                  </td>
                                  <td>
                                    <div class="col-md-6">
                                       <input type="checkbox">
                                      </div>
                                      <div class="col-md-6">
                                        {!! checkUncheck($company['language']) !!}
                                      </div>
                                  </td>
                                  
                                  <td colspan="2"><div class="col-md-6">
                                       <input type="checkbox">
                                      </div>
                                      <div class="col-md-6">
                                        {!! checkUncheck($company['language_other']) !!}
                                      </div>
                                  </td>
                                </tr>--}}



                                <tr>
                                  <th rowspan="3">Outline</th>
                                  <td>Year of foundation   
                                  <td>{!! $company->foundation !!}</td>
                                  <td>Employees</td>
                                  <td>{!! $company->employee !!}</td>
                                  <td>Factory size</td>
                                  <td>{!! $company->factory_size !!}</td>
                                </tr>
                                  </td>
                                </tr>
                                <tr>
                                    <td>Capital stock</td>
                                    <td>{!! $company->capital_stock !!}</td>
                                    <td>Annal Sale</td>
                                    <td>{!! $company->annual_sale !!}</td>
                                    <td>Production capacity</td>
                                    <td>{!! $company->production_capacity !!}</td>
                                </tr>
                                <tr>
                                    <td>Primary materials</td>
                                    <td>{!! $company->primary_meterial !!}</td>
                                    <td>Source of materials</td>
                                    <td>{!! $company->source_meterial !!}</td>
                                    <td>Minimum order</td>
                                    <td>{!! $company->minimum_order !!}</td>
                                </tr>
                                

                                <tr>
                                  <th scope="row" rowspan="2" colspan="1">Customers</th>
                                  @foreach($customer['customer_prefix'] as $prefix)
                                    <td colspan="1">{!! $prefix !!}</td>
                                  @endforeach
                                  <td colspan="2"></td>
                                </tr>
                                <tr>
                                  @foreach($customer['customer_percent'] as $percent)
                                    <td colspan="1">{!! $percent !!}</td>
                                  @endforeach
                                  <td colspan="2"></td>
                                </tr>

                                {{--<tr>
                                  <th>Customers</th>
                                  <td>1</td>
                                  <td>%</td>
                                  <td>2</td>
                                  <td>%</td>
                                  <td>3</td>
                                  <td>%</td>
                                </tr>--}}

                                <tr>
                                  <th scope="row" rowspan="2">Certification</th>
                                  @foreach($certificate as $c)
                                    <td colspan="1"><input type="checkbox" name="certificate[]" value="{{ $c }}"
                                      @if(in_array($c, $select_certificate['certificate']))
                                        checked="" 
                                      @endif
                                    >{{ $c }}</td>
                                  @endforeach
                                  <td colspan="2">
                                    {!! $select_certificate['certificate_other'] !!}
                                  </td>
                                </tr>

                                <tr>
                                  <td>Number =></td>
                                  <td colspan="1">
                                    {!! $select_certificate['cer_number'] !!}
                                  </td>
                                  <td>Acquired Year =></td>
                                  <td colspan="1">
                                    {!! $select_certificate['cer_acquired_year'] !!}
                                  </td>
                                  <td>Sprcify =></td>
                                  <td>
                                    {!! $select_certificate['cer_sprcify'] !!}
                                  </td>
                                </tr>


                                 {{--<tr>
                                  <th rowspan="4">Certification</th>
                                  <td><input type="checkbox"></td>
                                  <td>ISO</td>
                                  <td colspan="4">
                                     <div class="col-md-6">
                                       Number =>
                                      </div>
                                      <div class="col-md-6">
                                        Acquired year =>
                                      </div>
                                </tr>
                                <tr>
                                  <td><input type="checkbox"></td>
                                  <td>HACCP</td>
                                  <td colspan="4"> Acquired year =></td>
                                </tr>
                                <tr>
                                   <td><input type="checkbox"></td>
                                   <td>BRC</td>
                                  <td colspan="4"> Acquired year =></td> 
                                </tr>
                                <tr>
                                   <td><input type="checkbox"></td>
                                   <td>Others</td>
                                   <td colspan="4"> 
                                      <div class="col-md-4">
                                       Sprcify =>GAP, FDA, HALAL
                                      </div>
                                      <div class="col-md-4">
                                        Acquired year =>
                                      </div>
                                      <div class="col-md-4">
                                        08/082020, 30/12/2019, 15/08/2020
                                      </div>
                                   </td>
                                </tr>

                                <tr>
                                  <th rowspan="3">Exportation</th>
                                  <td colspan="6">
                                      <div class="col-md-3">
                                        1. Country name => China 
                                      </div>
                                      <div class="col-md-3">
                                        Product name =>
                                      </div>
                                      <div class="col-md-3">
                                        Pu'erh Tea
                                      </div>
                                      <div class="col-md-3">
                                        USD/year => 24 million MMK
                                      </div>
                                    
                                  </td>
                                </tr>
                                <tr>
                                  <td colspan="6">
                                      <div class="col-md-3">
                                        1. Country name => Thailand
                                      </div>
                                      <div class="col-md-3">
                                        Product name =>
                                      </div>
                                      <div class="col-md-3">
                                        Green tea
                                      </div>
                                      <div class="col-md-3">
                                        USD/year => 24 million MMK
                                      </div>
                                    
                                  </td>
                                </tr>
                                <tr>
                                 <td colspan="6">
                                      <div class="col-md-3">
                                        1. Country name => 
                                      </div>
                                      <div class="col-md-3">
                                        Product name =>
                                      </div>
                                      <div class="col-md-3">
                                        
                                      </div>
                                      <div class="col-md-3">
                                        USD/year => 
                                      </div>
                                    
                                  </td>
                                </tr>--}}

                                <tr>
                                  <th scope="row" rowspan="1">Exportation</th>
                                  <td>Country Name</td>
                                  <td colspan="1">
                                    {!! $company->expotation_country !!}
                                  </td>
                                  <td>Product Name</td>
                                  <td colspan="1">
                                    {!! $company->expotation_product !!}
                                  </td>
                                  <td>USD/year</td>
                                  <td colspan="1">
                                    {!! $company->expotation_year !!}
                                  </td>
                                </tr>

                                {{--<tr>
                                  <th rowspan="4">Hygiene</th>
                                  <td colspan="2">AC in the production place in the factory</td>
                                  <td>Yes</td>
                                  <td> <input type="checkbox"></td>
                                  <td colspan="2"></td>
                                </tr>
                                <tr>
                                  <td colspan="2">Floor drainage in the production place in the factory</td>
                                  <td>Yes</td>
                                  <td> <input type="checkbox"></td>
                                  <td colspan="2"></td>
                                </tr>
                                <tr>
                                  <td colspan="2">Hand and Foot bath at the entrance of the production place</td>
                                  <td>Yes</td>
                                  <td> <input type="checkbox"></td>
                                  <td colspan="2"></td>
                                </tr>
                                <tr>
                                  <td colspan="2">Hygiene training programs for employees</td>
                                  <td>Yes</td>
                                  <td> <input type="checkbox"></td>
                                  <td colspan="2"></td>
                                </tr>--}}

                                <tr>
                                  <th scope="row" rowspan="3">Hygiene</th>
                                    @foreach($hygiene[0] as $hg)
                                      <td colspan="1">
                                        {!! $hg !!}
                                      </td>  
                                    @endforeach
                                    <td colspan="2"></td>
                                </tr>
                                <tr>
                                  @foreach($hygiene[1] as $hg)
                                    <td colspan="1">
                                        {!! $hg !!}
                                    </td>  
                                  @endforeach
                                  <td colspan="2"></td>
                                </tr>
                                <tr>
                                  @foreach($hygiene[2] as $hg)
                                    <td colspan="1">
                                      <input type="checkbox" name="hygiene_three[]"
                                        @if(isset($hg))
                                          checked="" 
                                        @endif
                                      >
                                    </td>  
                                  @endforeach
                                  <td colspan="2"></td>
                                </tr>

                                <tr>
                                    <th class="row" colspan="7" rowspan="1">Machinery</th>
                                </tr>
                                <div class="form-group col-sm-12">
                                    <table class="table table-striped table-hover tbl_repeat">
                                        <thead>
                                            <th>#</th>
                                            <th>Machinery</th>
                                            <th>Model Number</th>
                                            <th>Number</th>
                                            <th>Manufacturer</th>
                                            <th>Manufacturered Country</th>
                                        </thead>
                                        <tbody>
                                            <?php $i=1; ?>
                                            @foreach($machinery['machinery'] as $key => $mm)
                                                <tr>
                                                    <td>{{ $i }}</td>
                                                    <td>
                                                      {!! $machinery['machinery'][$key] !!}
                                                    </td>
                                                    <td>
                                                      {!! $machinery['model_number'][$key] !!}
                                                    </td>
                                                    <td>
                                                      {!! $machinery['number'][$key] !!}
                                                    </td>
                                                    <td>
                                                      {!! $machinery['manufacturer'][$key] !!}
                                                    </td>
                                                    <td>
                                                      {!! $machinery['manufacturered_country'][$key] !!}
                                                    </td>
                                                </tr>
                                                <?php $i++; ?>
                                            @endforeach
                                            <tr>
                                            <th scope="row">Remarks</th>
                                            <td colspan="12">
                                              {!! $company->remark !!}
                                            </td>
                                          </tr>

                                        </tbody>
                                    </table>
                                </div>
                    </div>
            </div>
        </div>             
    </div>

    {{--<div class="row">
        <div class="col-lg-12 mb-12">
            <div class="container-box">
                <table class="table">
                  <thead> 
                    <h3>Machinery</h3>
                  </thead>
                  <tbody>
                    <tr> 
                      <th>Machinery</th>
                      <th>Model number</th>
                      <th>Number</th>
                      <th>Manufacturer</th>
                      <th>Manufactuered country</th>
                    </tr>
                   <tr>             
                      <td>Enzyme</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td>China</td>
                    </tr>
                    <tr>
                      <td>BRoller</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td>China</td>
                    </tr>
                    <tr>   
                      <td>Grading</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td>China</td>
                    </tr>
                    <tr>
                      <td>Roasting</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>Remarks</td>
                      <td colspan="5"></td>
                    </tr>
                    
                  </tbody>
                </table>
            </div>
        </div>
    </div>--}}
             
</main>
@endsection