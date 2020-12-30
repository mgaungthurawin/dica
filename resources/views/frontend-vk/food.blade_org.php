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
                    <div class="col-md-6"><img src="frontend/images/slide-02.jpg" alt="" class="img-responsive"></div>
                    <div class="col-md-6"><img src="frontend/images/slide-03.jpg" alt="" class="img-responsive"></div>
                  </div>    
                  </td>  
                </tr> 
              </table>

                <table class="table">
                  <tbody>
                    <tr>
                      <th scope="row" rowspan="11">Contact</th>
                      <td colspan="1">URL</td>
                      <th colspan="12">
                        {!! $company->company_url !!}
                      </th>
                    </tr>
                    <tr>
                      <td scope="row" rowspan="3" colspan="">Office</td> 
                    <tr>
                      <td rowspan="1">Address</td>
                        <td scope="row" colspan="11">
                            {!! $company->office_address !!}
                        </td>
                    </tr>
                    <tr>
                      <td>TEL</td>
                      <td colspan="3">
                        {!! $company->office_tel !!}
                      </td>
                      <td>FAX</td>
                      <td colspan="10">
                        {!! $company->office_fax !!}</td>
                    </tr>

                    <tr>
                      <td scope="row" rowspan="3">Factory</td>
                    <tr>
                      <td rowspan="1">Address</td>
                        <td scope="row" colspan="11">
                            {!! $company->factory_address !!}
                        </td>
                    </tr>
                    <tr>
                      <td>TEL</td>
                      <td colspan="3">
                        {!! $company->factory_tel !!}
                      </td>
                      <td>FAX</td>
                      <td colspan="10">
                        {!! $company->factory_fax !!}
                      </td>
                    </tr>
                    <tr>
                      <td scope="row" colspan="1">MD/CEO</td>
                      <td>Name</td>
                      <td colspan="3">
                        {!! $company->md_ceo_name !!}
                      </td>
                      <td colspan="1">Position</td>
                      <td colspan="8">
                        {!! $company->md_ceo_position !!}
                      </td>
                    </tr>

                    <tr>
                      <td scope="row" colspan="1">Production/Factory Manager</td>
                      <td>Name</td>
                      <td colspan="3">
                        {!! $company->factory_manager_name !!}
                      </td>
                      <td colspan="1">Position</td>
                      <td colspan="8">
                        {!! $company->factory_manager_position !!}
                      </td>
                    </tr>

                    <tr>
                      <td scope="row" colspan="1">Hygiene Manager</td>
                      <td>Name</td>
                      <td colspan="3">
                        {!! $company->hygiene_manager_name !!}
                      </td>
                      <td colspan="1">Position</td>
                      <td colspan="8">
                        {!! $company->hygiene_manager_position !!}
                      </td>
                    </tr>

                    <tr>
                      <td scope="row" colspan="1" rowspan="3">Contact Person</td>
                      <td>Name</td>
                      <td colspan="3">
                          {!! $company->cp_name !!}
                        </td>
                      <td colspan="1">Position</td>
                      <td colspan="8">
                        {!! $company->cp_position !!}
                      </td>
                    </tr>
                    <tr>
                      <td scope="row" colspan="1" rowspan="3"></td>
                      <td scope="row">TEL</td>
                      <td colspan="3">
                        {!! $company->cp_tel !!}
                      </td>
                      <td>Email</td>
                      <td colspan="8">
                        {!! $company->cp_email !!}
                      </td>
                    </tr>

                    <tr>
                      <td scope="row" rowspan="3">Foreign Language</td>
                        <td>{!! checkUncheck($company['language']) !!}</td>
                        <td>{{ $company['language'] }}</td>
                        <td>{!! checkUncheck($company['language_other']) !!}</td>
                        <td colspan="5">Other (   {{ $company['language_other'] }}   )</td>
                    </tr>

                      {{--<td>
                        <input type="radio" name="language" value="English" 
                        @if("English" == $company["language"])
                            checked
                        @endif>&nbsp;&nbsp;English
                      </td>
                      <td>
                        <input type="radio" name="language" value="Japanese"
                        @if("Japanese" == $company["language"])
                          checked
                        @endif>&nbsp;&nbsp;Japanese
                      </td>
                      <td>
                        <input type="radio" name="language_other" value="Other">&nbsp;&nbsp;Other</td>
                        <td> {!! $company->language_other !!} </td>
                      </td>
                    </tr>--}}

                    <tr>
                        <td scope="row" rowspan="2"></td>
                    </tr>
                    <tr>
                      <th scope="row" rowspan="4">Outline</th>
                      <td colspan="2">Year of foundation</td>
                      <td colspan="2">
                        {!! $company->foundation !!}
                      </td>
                      <td colspan="2">Employees</td>
                      <td colspan="2">
                        {!! $company->employee !!}
                      </td>
                      <td colspan="2">Factory Size</td>
                      <td colspan="2">
                        {!! $company->factory_size !!}
                      </td>
                    </tr>
                    <tr>
                      <th scope="row" rowspan="4"></th>
                      <td colspan="3">Capital Stock</td>
                      <td colspan="2">
                        {!! $company->capital_stock !!}
                      </td>
                      <td colspan="2">Annual Sales</td>
                      <td colspan="2">
                        {!! $company->annual_sale !!}
                      </td>
                      <td colspan="2">Production Capacity</td>
                      <td colspan="2">
                        {!! $company->production_capacity !!}
                      </td>
                    </tr>
                    <tr>
                      <th scope="row" rowspan="4"></th>
                      <td colspan="2">Primary Materials</td>
                      <td colspan="2">
                        {!! $company->primary_meterial !!}
                      </td>
                      <td colspan="2">Source of Materials</td>
                      <td colspan="2">
                        {!! $company->source_meterial !!}
                      </td>
                      <td colspan="2">Minimum Order</td>
                      <td colspan="2">
                        {!! $company->minimum_order !!}
                      </td>
                    </tr>

                    <tr>
                        <th scope="row" colspan="2"></th>
                    </tr>

                    <tr>
                      <th scope="row" rowspan="2" colspan="2">Customers</th>
                      @foreach($customer['customer_prefix'] as $prefix)
                        <td>{!! $prefix !!}</td>
                      @endforeach
                    </tr>
                    <tr>
                      @foreach($customer['customer_percent'] as $percent)
                        <td>{!! $percent !!}</td>
                      @endforeach
                    </tr>

                    <tr>
                      <th scope="row" rowspan="3">Certification</th>
                      @foreach($certificate as $c)
                        <td><input type="checkbox" name="certificate[]" value="{{ $c }}"
                          @if(in_array($c, $select_certificate['certificate']))
                            checked="" 
                          @endif
                        ></td>
                      <td>{{ $c }}</td>
                      @endforeach
                      <td colspan="6">
                        {!! $select_certificate['certificate_other'] !!}
                      </td>
                    </tr>

                    <tr>
                      <th scope="row" rowspan="2"></th>
                      <td>Number</td>
                      <td colspan="2">
                        {!! $select_certificate['cer_number'] !!}
                      </td>
                      <td>Acquired Year</td>
                      <td colspan="2">
                        {!! $select_certificate['cer_acquired_year'] !!}
                      </td>
                      <td>Sprcify</td>
                      <td colspan="6">
                        {!! $select_certificate['cer_sprcify'] !!}
                      </td>
                    </tr>

                    <tr>
                        <th scope="row" rowspan="2"></th>
                    </tr>

                    <tr>
                      <th scope="row" rowspan="2">Exportation</th>
                      <td>Country Name</td>
                      <td colspan="2">
                        {!! $company->expotation_country !!}
                      </td>
                      <td>Product Name</td>
                      <td colspan="2">
                        {!! $company->expotation_product !!}
                      </td>
                      <td>USD/year</td>
                      <td colspan="6">
                        {!! $company->expotation_year !!}
                      </td>
                    </tr>

                    <tr>
                        <th scope="row" rowspan="2"></th>
                    </tr>


                    <tr>
                      <th scope="row" rowspan="2">Hygiene</th>
                        @foreach($hygiene[0] as $hg)
                          <td colspan="2">
                            {!! $hg !!}
                          </td>  
                        @endforeach
                    </tr>
                    <tr>
                      <th scope="row" rowspan="2"></th>
                      @foreach($hygiene[1] as $hg)
                        <td colspan="2">
                            {!! $hg !!}
                        </td>  
                      @endforeach
                    </tr>
                    <tr>
                    <th scope="row" rowspan="2"></th>
                      @foreach($hygiene[2] as $hg)
                        <td colspan="2">
                          <input type="checkbox" name="hygiene_three[]"
                            @if(isset($hg))
                              checked="" 
                            @endif
                          >
                        </td>  
                      @endforeach
                    </tr>

                  <div class="form-group col-sm-12">
                      <!-- <label for="description">Machinery</label><br/> -->
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
                        <td colspan="6">URL https://motherslovetea.com/en/</td>
                        </tr>
                        <tr>
                           <td rowspan="2">Office</td>
                            <td colspan="6">Sa/2, Sein Pan St, Bayintnaung Broker Center, Mayangone T.S, Yangon</td>
                            <tr>
                              <td>TEL</td>
                              <td>09-440777764</td>
                              <td colspan="3">FAX</td>
                            </tr>
                        </tr>
                        <tr>
                          <td rowspan="2">Factory</td>
                            <td colspan="6">Kho Yaung Village, Lashio Tang Yan Main Road, Lashio District, Tang Yan Township, Northern Shan</td>
                            <tr>
                              <td>TEL</td>
                              <td>09-440777764</td>
                              <td colspan="3">FAX</td>
                            </tr>
                        </tr>
                        <tr>
                          <td>MD/CEO</td>
                          <td>Name</td>
                          <td>Daw Yi Yi Myint</td>
                          <td>Position</td>
                          <td colspan="2">Managing Director</td>
                        </tr>
                        <tr>
                          <td>Production/factory manager</td>
                          <td>Name</td>
                          <td>U Kyaw Myo San </td>
                          <td>Position</td>
                          <td colspan="2"></td>
                        </tr>
                        <tr>
                          <td>Hygiene manager</td>
                          <td>Name</td>
                          <td></td>
                          <td>Position</td>
                          <td colspan="2"></td>
                        </tr>
                        <tr>
                          <td rowspan="3">Contact person</td>
                          <td>Name</td>
                          <td>Daw Wai Wai </td>
                          <td>Position</td>
                          <td colspan="2">Director </td>
                        </tr>
                        <tr>
                          <td>TEL</td>
                          <td>09-5262873 </td>
                          <td>Email</td>
                          <td colspan="2"> </td>
                        </tr>
                        <tr>
                          <td>Foreign Language</td>
                          <td>
                            <div class="col-md-6">
                               <input type="checkbox">
                              </div>
                              <div class="col-md-6">
                                English 
                              </div>
                          </td>
                          <td>
                            <div class="col-md-6">
                               <input type="checkbox">
                              </div>
                              <div class="col-md-6">
                                Japanese
                              </div>
                          </td>
                          
                          <td colspan="2"><div class="col-md-6">
                               <input type="checkbox">
                              </div>
                              <div class="col-md-6">
                                Others() 
                              </div>
                          </td>
                        </tr>



                        <tr>
                          <th rowspan="4">Outline</th>
                          <td>Year of foundation   
                          <td>1993</td>
                          <td>Employees</td>
                          <td>130</td>
                          <td>Factory size</td>
                          <td>2100 m2</td>
                        </tr>
                          </td>
                        </tr>
                        <tr>
                            <td>Capital stock</td>
                            <td>53 million MMK</td>
                            <td>Annal Sale</td>
                            <td>800 million MMK</td>
                            <td>Production capacity</td>
                            <td>500 ton/year</td>
                        </tr>
                        <tr>
                            <td>Primary materials</td>
                            <td>1</td>
                            <td>2</td>
                            <td>3</td>
                            <td>Minimum order</td>
                            <td>kg/case</td>
                        </tr>
                        <tr>
                            <td>Source of materials</td>
                            <td>1</td>
                            <td>2</td>
                            <td>3</td>
                            <td colspan="2"></td>
                            
                        </tr>

                        <tr>
                          <th>Customers</th>
                          <td>1</td>
                          <td>%</td>
                          <td>2</td>
                          <td>%</td>
                          <td>3</td>
                          <td>%</td>
                        </tr>
                         <tr>
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
                        </tr>
                        <tr>
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
                        </tr>     
                      </tbody>
                    </table>
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