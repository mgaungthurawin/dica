@extends('frontend.layouts.app')
@section('content')
<main class="page_main_wrapper">
  <div class="container">
    <div class="row">
        <div class="col-lg-12 mb-12">
            <div class="container-box">
                <table class="table">  
                    <tr>
                      <th rowspan="2">{{trans('app.name_of_company')}}</th>
                      <td>{!! $company->name !!}</td>
                    </tr>
                    <tr>
                      <td>{!! $company->mm_name !!}</td>
                    </tr>
                    <tr>
                      <td colspan="5">{!! $company->description !!}
                      </td>  
                    </tr>
                </table>
            </div>

            @include('frontend.layouts.company_media')

            <div class="row">
                <div class="col-lg-12 mb-12">
                    <div class="container-box">
                        <div class="col-lg-12 col-sm-12">
                            <h3>{{trans('app.product')}}</h3>
                            <table class="table table-striped">
                              <thead class="thead-dark">
                                <tr>
                                  <th scope="col">{{trans('app.no')}}</th>
                                  <th scope="col">{{trans('app.main_products')}}</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                  $product_index = 1;
                                  // $company_product = $company->products->pluck('id')->all();
                                  // $company_product = json_decode($company->products, TRUE);
                                  // $products = getMainProduct($company_product, $company->type);
                                  $product_array = json_decode($company->products, TRUE);
                                  $product_in_array = ['411', '421', '431', '441', '451', '461'];
                                ?>
                                @foreach(array_filter($product_array) as $key => $pr)
                                    @if(in_array($key, $product_in_array))
                                    <tr>
                                        <th scope="row">{{$product_index}}</th>
                                        <td>{{ getProductName($pr) }}</td>
                                    </tr>
                                    <?php $product_index++; ?>
                                    @endif
                                @endforeach
                              </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
             <div class="row">
                    <div class="col-lg-12 mb-12">
                        <div class="container-box">
                            <table class="table ">
                              <thead> 
                                <h3>{{trans('app.company')}}</h3>
                              </thead>
                              <tbody>
                                
                                <tr>
                                <th rowspan="11">{{trans('app.contact_two')}}</th>
                                <td colspan="6">{!! authValue($company->company_url) !!}</td>
                                </tr>
                                <tr>
                                   <td rowspan="2">{{trans('app.office')}}</td>
                                    <td colspan="5">{!! authValue($company->office_address) !!}</td>
                                    <tr>
                                      <td>{{ authValue(trans('app.tel')) }}</td>
                                      <td colspan="2">{!! authValue($company->office_tel) !!}</td>
                                      <td colspan="1">{{ authValue(trans('app.fax')) }}</td>
                                      <td>{!! authValue($company->office_fax) !!}</td>
                                    </tr>
                                </tr>
                                <tr>
                                  <td rowspan="2">{{trans('app.factory')}}</td>
                                    <td colspan="5">{!! authValue($company->factory_address) !!}</td>
                                    <tr>
                                      <td>{{ authValue(trans('app.tel')) }}</td>
                                      <td colspan="2">{!! authValue($company->factory_tel) !!}</td>
                                      <td colspan="1">{{ authValue(trans('app.fax')) }}</td>
                                      <td>{!! authValue($company->factory_fax) !!}</td>
                                    </tr>
                                </tr>
                                <tr>
                                  <td>{{trans('app.md_ceo')}}</td>
                                  <td>{{ authValue(trans('app.name')) }}</td>
                                  <td>{!! authValue($company->md_ceo_name) !!}</td>
                                  <td>{{ authValue(trans('app.postion')) }}</td>
                                  <td colspan="2">{!! authValue($company->md_ceo_position) !!}</td>
                                </tr>
                                <tr>
                                  <td>{{trans('app.production_factory_manager')}}</td>
                                  <td>{{ authValue(trans('app.name')) }}</td>
                                  <td>{!! authValue($company->factory_manager_name) !!}</td>
                                  <td>{{ authValue(trans('app.postion')) }}</td>
                                  <td colspan="2">{!! authValue($company->factory_manager_position) !!}</td>
                                </tr>
                                <tr>
                                  <td>{{trans('app.hygiene_manager')}}</td>
                                  <td>{{ authValue(trans('app.name')) }}</td>
                                  <td>{!! authValue($company->hygiene_manager_name) !!}</td>
                                  <td>{{ authValue(trans('app.postion')) }}</td>
                                  <td colspan="2">{!! authValue($company->hygiene_manager_position) !!}</td>
                                </tr>
                                <tr>
                                  <td rowspan="3">{{trans('app.contact_person')}}</td>
                                  <td>{{ authValue(trans('app.name')) }}</td>
                                  <td>{!! authValue($company->cp_name) !!}</td>
                                  <td>{{ authValue(trans('app.postion')) }}</td>
                                  <td colspan="2">{!! authValue($company->cp_position) !!}</td>
                                </tr>
                                <tr>
                                  <td>{{ authValue(trans('app.tel')) }}</td>
                                  <td>{!! authValue($company->cp_tel) !!}</td>
                                  <td>{{ authValue(trans('app.email')) }}</td>
                                  <td colspan="2">{!! authValue($company->cp_email) !!}</td>
                                </tr>


                                <tr>
                                  <td scope="row" colspan="1">Foreign Language</td>
                                  <td>{!! authValue(checkUncheck($company['language'])) !!}</td>
                                  <td>{{ authValue($company['language']) }}</td>
                                  <td>{!! authValue(checkUncheck($company['language_other'])) !!}</td>
                                  <td colspan="1">
                                    @if(Auth::user())
                                        Other (   {{ $company['language_other'] }}   )
                                    @endif
                                  </td>
                                </tr>


                                
                                <tr>
                                  <th rowspan="3">Outline</th>
                                  <td>Year of foundation   
                                  <td>{!! authValue($company->foundation) !!}</td>
                                  <td>Employees</td>
                                  <td>{!! authValue($company->employee) !!}</td>
                                  <td>Factory size</td>
                                  <td>{!! authValue($company->factory_size) !!}</td>
                                </tr>
                                  </td>
                                </tr>
                                <tr>
                                    <td>Capital stock</td>
                                    <td>{!! authValue($company->capital_stock) !!}</td>
                                    <td>Annal Sale</td>
                                    <td>{!! authValue($company->annual_sale) !!}</td>
                                    <td>Production capacity</td>
                                    <td>{!! authValue($company->production_capacity) !!}</td>
                                </tr>
                                <tr>
                                    <td>Primary materials</td>
                                    <td>{!! authValue($company->primary_meterial) !!}</td>
                                    <td>Source of materials</td>
                                    <td>{!! authValue($company->source_meterial) !!}</td>
                                    <td>Minimum order</td>
                                    <td>{!! authValue($company->minimum_order) !!}</td>
                                </tr>
                                

                                <tr>
                                  <th scope="row" rowspan="2" colspan="1">Customers</th>
                                  @foreach($customer['customer_prefix'] as $prefix)
                                    <td colspan="1">{!! authValue($prefix) !!}</td>
                                  @endforeach
                                  <td colspan="3"></td>
                                </tr>
                                <tr>
                                  @foreach($customer['customer_percent'] as $percent)
                                    <td colspan="1">{!! authValue($percent) !!}</td>
                                  @endforeach
                                  <td colspan="3"></td>
                                </tr>

                                <tr>
                                  <th scope="row" rowspan="2">Certification</th>
                                  @foreach($certificate as $c)
                                    <td colspan="1">
                                        @if(Auth::user())
                                            <i
                                            @if(in_array($c, $select_certificate['certificate']))
                                              class="fa fa-check-square"
                                            @else 
                                                class="fa fa-square"
                                            @endif
                                        >@endif
                                      {{ authValue($c) }}
                                    </td>
                                  @endforeach
                                  <td colspan="2">
                                    {!! authValue($select_certificate['certificate_other']) !!}
                                  </td>
                                </tr>

                                <tr>
                                  <td>Number =></td>
                                  <td colspan="1">
                                    {!! authValue($select_certificate['cer_number']) !!}
                                  </td>
                                  <td>Acquired Year =></td>
                                  <td colspan="1">
                                    {!! authValue($select_certificate['cer_acquired_year']) !!}
                                  </td>
                                  <td>Sprcify =></td>
                                  <td>
                                    {!! authValue($select_certificate['cer_sprcify']) !!}
                                  </td>
                                </tr>

                                <tr>
                                  <th scope="row" rowspan="1">Exportation</th>
                                  <td>Country Name</td>
                                  <td colspan="1">
                                    {!! authValue($company->expotation_country) !!}
                                  </td>
                                  <td>Product Name</td>
                                  <td colspan="1">
                                    {!! authValue($company->expotation_product) !!}
                                  </td>
                                  <td>USD/year</td>
                                  <td colspan="1">
                                    {!! authValue($company->expotation_year) !!}
                                  </td>
                                </tr>

                                <tr>
                                  <th scope="row" rowspan="3">Hygiene</th>
                                    @foreach($hygiene[0] as $hg)
                                      <td colspan="1">
                                        {!! authValue($hg) !!}
                                      </td>  
                                    @endforeach
                                    <td colspan="2"></td>
                                </tr>

                                <tr>
                                  @foreach($hygiene[1] as $hg)
                                    <td colspan="1">
                                        {!! authValue($hg) !!}
                                    </td>  
                                  @endforeach
                                  <td colspan="2"></td>
                                </tr>

                                <tr>
                                  <?php $hygienearray=[1,2,3,4]; ?>
                                  @for ($i=1; $i < 5; $i++) 
                                  <td colspan="1">
                                        @if(Auth::user())
                                          <i
                                            @if(in_array($i, $hygiene["2"]))
                                              class="fa fa-check-square"
                                            @else 
                                                class="fa fa-square"
                                            @endif
                                          >
                                        @endif
                                    </td>
                                  @endfor
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
                                                      {!! authValue($machinery['machinery'][$key]) !!}
                                                    </td>
                                                    <td>
                                                      {!! authValue($machinery['model_number'][$key]) !!}
                                                    </td>
                                                    <td>
                                                      {!! authValue($machinery['number'][$key]) !!}
                                                    </td>
                                                    <td>
                                                      {!! authValue($machinery['manufacturer'][$key]) !!}
                                                    </td>
                                                    <td>
                                                      {!! authValue($machinery['manufacturered_country'][$key]) !!}
                                                    </td>
                                                </tr>
                                                <?php $i++; ?>
                                            @endforeach
                                            <tr>
                                            <th scope="row">Remarks</th>
                                            <td colspan="12">
                                              {!! authValue($company->remark) !!}
                                            </td>
                                          </tr>

                                        </tbody>
                                    </table>
                                </div>
                    </div>
            </div>
        </div>             
    </div>
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