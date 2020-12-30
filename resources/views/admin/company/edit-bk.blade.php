@extends('admin.layout.app')
@section('content')
    <section class="content-header">
        <h1>
            Edit Company
        </h1>
        <span class="breadcrumb"><a href='{{ route("company.index") }}' class="btn btn-sm btn-primary"><i class="fa fa-arrow-circle-left"></i>&nbsp;&nbsp;Go To Company</a></span>
    </section>
   <div class="content">
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                    {!! Form::model($company, ['method' => 'PATCH','route' => ['company.update', $company->id]]) !!}
                     
                        <div class="form-group col-sm-12">
                            {!! Form::label('name', 'Category Name:') !!} <span class="text-danger">*</span>
                            <select class="form-control" name="category_id">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id}}"
                                      @if($category->id == $company->category_id))
                                        selected
                                      @endif
                                      >{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-sm-6">
                            {!! Form::label('name', 'Name:') !!} <span class="text-danger">*</span>
                            {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                        </div>

                        <div class="form-group col-sm-6">
                            {!! Form::label('mm_name', 'Myanmar Name:') !!} <span class="text-danger">*</span>
                            {!! Form::text('mm_name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                        </div>

                        <div class="form-group col-sm-6">
                            {!! Form::label('abbreviation', 'Abbreviation:') !!} <span class="text-danger">*</span>
                            {!! Form::text('abbreviation', null, ['class' => 'form-control', 'required' => 'required']) !!}
                        </div>

                        <div class="form-group col-sm-6">
                            {!! Form::label('nation', 'Nation:') !!} <span class="text-danger">*</span>
                            {!! Form::text('nation', null, ['class' => 'form-control', 'required' => 'required']) !!}
                        </div>

                        <div class="form-group col-sm-12">
                            {!! Form::label('description', 'Description:') !!} <span class="text-danger">*</span>
                            {!! Form::textarea('description', null, ['class' => 'form-control', 'required' => 'required']) !!}
                        </div>

                        <div class="form-group col-sm-4">
                            <label for="description">Select Product</label><br/>
                            <select class="form-control" name="product_id[]" multiple>
                                @foreach($products as $product)
                                    <option value="{{ $product->id}}"
                                      @if(in_array($product->id, $selected_product))
                                        selected
                                      @endif
                                      >{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="description">Main Processing</label><br/>
                            <select class="form-control" name="processing_id[]" multiple>
                                @foreach($main_processing as $processing)
                                    <option value="{{ $processing->id }}"
                                      @if(in_array($processing->id, $selected_processing))
                                        selected
                                      @endif
                                      >{{ $processing->main_process }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="description">Select Location</label><br/>
                            <select class="form-control" name="location_id[]" multiple>
                                @foreach($locations as $location)
                                    <option value="{{ $location->id}}"
                                      @if(in_array($location->id, $selected_location))
                                        selected
                                      @endif
                                      >{{ $location->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-sm-12">
                            <label for="description">Main Machine and Equipment</label><br/>
                            <table class="table table-striped table-hover tbl_repeat">
                                <thead>
                                    <th>#</th>
                                    <th>Type Of Equipment</th>
                                    <th>Model Destigation</th>
                                    <th>Num. of Machine</th>
                                    <th>Machine builder</th>
                                    <th>Country Origin</th>
                                </thead>
                                <tbody>
                                    @for ($i=1; $i < 7; $i++)  
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td><input type="text" class="form-control" name="type_of_equipment[]"></td>
                                            <td><input type="text" class="form-control" name="model_destination[]"></td>
                                            <td><input type="text" class="form-control" name="no_machine[]"></td>
                                            <td><input type="text" class="form-control" name="machine_builder[]"></td>
                                            <td><input type="text" class="form-control" name="country_origin[]"></td>
                                        </tr>
                                    @endfor
                                </tbody>
                            </table>
                        </div>

                        <hr>
                        <div class="form-group col-sm-12">
                          <table class="table">
                            <tbody>
                              <tr>
                                <th scope="row" rowspan="11">Contact</th>
                                <td colspan="1">URL</td>
                                <th colspan="11">
                                    {!! Form::text('company_url', null, ['class' => 'form-control', 'required' => 'required']) !!}</th>
                              </tr>
                              <tr>
                                <td scope="row" rowspan="3" colspan="">Office Location</td>
                                <td><input type="radio" name="office_location" value="Yangon" 
                                    @if("Yangon" == $contact["office"]["office_location"])
                                      checked
                                    @endif
                                  >&nbsp;&nbsp;Yangon</td>
                                <td><input type="radio" name="office_location" value="Mandalay" 
                                    @if("Mandalay" == $contact["office"]["office_location"])
                                      checked
                                    @endif
                                  >&nbsp;&nbsp;Mandalay</td>
                                <td><input type="radio" name="office_location" value="Other" 
                                    @if("Other" == $contact["office"]["office_location"])
                                      checked 
                                    @endif
                                  ></td>
                                <td colspan="8"> 
                                    {!! Form::text('office_location_other', $contact["office"]["office_location_other"], ['class' => 'form-control', 'placeholder' => 'Other']) !!}</td>
                              </tr>
                              <tr>
                                <td rowspan="1">Address</td>
                                  <td scope="row" colspan="10">
                                    {!! Form::text('office_address', $contact['office']['office_address'], ['class' => 'form-control', 'required' => 'required']) !!}</td>
                              </tr>
                              <tr>
                                <td>TEL</td>
                                <td colspan="3">
                                    {!! Form::text('office_tel', $contact['office']['office_tel'], ['class' => 'form-control', 'required' => 'required']) !!}</td>
                                <td>FAX</td>
                                <td colspan="10">
                                    {!! Form::text('office_fax', $contact['office']['office_fax'], ['class' => 'form-control', 'required' => 'required']) !!}</td>
                              </tr>
                              <tr>
                                <td scope="row" rowspan="3">Plant Location</td>
                                <td><input type="radio" name="plant_location" value="Yangon" 
                                    @if("Yangon" == $contact["plant"]["plant_location"])
                                      checked
                                    @endif
                                  >&nbsp;&nbsp;Yangon</td>
                                <td><input type="radio" name="plant_location" value="Mandalay" 
                                    @if("Mandalay" == $contact["plant"]["plant_location"])
                                      checked
                                    @endif
                                  >&nbsp;&nbsp;Mandalay</td>
                                <td><input type="radio" name="plant_location" value="Other" 
                                    @if("Other" == $contact["plant"]["plant_location"])
                                      checked
                                    @endif
                                  ></td>
                                <td colspan="8"> 
                                    {!! Form::text('plant_location_other', $contact["plant"]["plant_location_other"], ['class' => 'form-control', 'placeholder' => 'Other']) !!}</td>
                              </tr>                        
                              <tr>
                                <td rowspan="1">Address</td>
                                  <td scope="row" colspan="10">
                                    {!! Form::text('plant_address', $contact['plant']['plant_address'], ['class' => 'form-control', 'required' => 'required']) !!}</td>
                              </tr>
                              <tr>
                                <td>TEL</td>
                                <td colspan="3">
                                    {!! Form::text('plant_tel', $contact['plant']['plant_tel'], ['class' => 'form-control', 'required' => 'required']) !!}</td>
                                <td>FAX</td>
                                <td colspan="10">
                                    {!! Form::text('plant_fax', $contact['plant']['plant_fax'], ['class' => 'form-control', 'required' => 'required']) !!}</td>
                              </tr>
                              <tr>
                                <td scope="row" colspan="1">Representative</td>
                                <td>Name</td>
                                <td colspan="3">
                                    {!! Form::text('repre_name', $contact['representative']['repre_name'], ['class' => 'form-control', 'required' => 'required']) !!}</td>
                                <td colspan="1">Title</td>
                                <td colspan="8">
                                    {!! Form::text('repre_tittle', $contact['representative']['repre_tittle'], ['class' => 'form-control', 'required' => 'required']) !!}</td>
                              </tr>
                              <tr>
                                <td scope="row" colspan="1" rowspan="3">Person in charge</td>
                                <td>Name</td>
                                <td colspan="3">
                                    {!! Form::text('pic_name', $contact['pic']['pic_name'], ['class' => 'form-control', 'required' => 'required']) !!}</td>
                                <td colspan="1">Title</td>
                                <td colspan="8">
                                    {!! Form::text('pic_title', $contact['pic']['pic_title'], ['class' => 'form-control', 'required' => 'required']) !!}</td>
                              </tr>
                              <tr>
                                <td scope="row">TEL</td>
                                <td colspan="3">
                                    {!! Form::text('pic_tel', $contact['pic']['pic_tel'], ['class' => 'form-control', 'required' => 'required']) !!}</td>
                                <td>Email</td>
                                <td colspan="8">
                                    {!! Form::text('pic_email', $contact['pic']['pic_email'], ['class' => 'form-control', 'required' => 'required']) !!}</td>
                              </tr>
                              <tr>
                                <td scope="row" rowspan="3">Language</td>
                                <td><input type="radio" name="language" value="English" 
                                    @if("English" == $contact["pic"]["language"])
                                      checked
                                    @endif
                                  >&nbsp;&nbsp;English</td>
                                <td><input type="radio" name="language" value="Japanese" 
                                    @if("Japanese" == $contact["pic"]["language"])
                                      checked
                                    @endif
                                  >&nbsp;&nbsp;Japanese</td>
                                <td><input type="radio" name="language" value="Other" 
                                    @if("Other" == $contact["pic"]["language"])
                                      checked
                                    @endif
                                  ></td>
                                <td colspan="8"> 
                                    {!! Form::text('language_other', $contact["pic"]["language_other"], ['class' => 'form-control', 'placeholder' => 'Other']) !!}</td>
                              </tr>
                              <tr>
                                <th scope="row" rowspan="2">Company Info.</th>
                                <td>Year of estabishment</td>
                                <td colspan="2">
                                    {!! Form::text('year_of_establish', $company_info['estabishment'], ['class' => 'form-control', 'required' => 'required']) !!}</td>
                                <td>Num. of Employee</td>
                                <td colspan="2">
                                    {!! Form::text('no_employee', $company_info['no_employee'], ['class' => 'form-control', 'required' => 'required']) !!}</td>
                                <td rowspan="2" colspan="4"><center>Production</center></td>
                              </tr>
                              <tr>
                                <td scope="row">Capital</td>
                                <td colspan="2">
                                    {!! Form::text('capital', $company_info['capital'], ['class' => 'form-control', 'required' => 'required']) !!}</td>
                                <td>Annual Sales Amount</td>
                                <td colspan="2">
                                    {!! Form::text('annual_amount', $company_info['annual_amount'], ['class' => 'form-control', 'required' => 'required']) !!}</td>
                              </tr>
                              <tr>
                                <th scope="row" rowspan="4">Low material</th>
                                <td colspan="2" style="text-align: right;">No</td>
                                @foreach($low_material['name_of_material'] as $key => $lm)
                                  <td colspan="2">{{ $key + 1 }}</td>
                                @endforeach
                                <td colspan="2">Space for Plant</td>
                                <td colspan="2">
                                    {!! Form::text('space_for_plant', $production['space_for_plant'], ['class' => 'form-control', 'required' => 'required']) !!}</td>
                              </tr>
                              <tr>
                                <td colspan="1">Name of Material</td>
                                @foreach($low_material['name_of_material'] as $key => $lm)
                                  <td colspan="2">{!! Form::text('name_of_material[]', $lm, ['class' => 'form-control']) !!}</td>
                                @endforeach
                                <td colspan="2">Production Capacity</td>
                                <td colspan="2">{!! Form::text('production_capacity', $production['production_capacity'], ['class' => 'form-control', 'required' => 'required']) !!}</td>
                              </tr>
                              <tr>
                                <td colspan="1">Supplier Name</td>
                                @foreach($low_material['supplier_name'] as $key => $sn)
                                  <td colspan="2">{!! Form::text('supplier_name[]', $sn, ['class' => 'form-control']) !!}</td>
                                @endforeach
                                <td colspan="2">Operation Ratio</td>
                                <td colspan="2">{!! Form::text('operation_ratio', $production['operation_ratio'], ['class' => 'form-control', 'required' => 'required']) !!}</td>
                              </tr>
                              <tr>
                                <td colspan="1">Country of Origin</td>
                                @foreach($low_material['country_origin'] as $key => $co)
                                  <td colspan="2">{!! Form::text('country_origin[]', $co, ['class' => 'form-control']) !!}</td>
                                @endforeach
                                <td colspan="2">Min Order Quantity</td>
                                <td colspan="2">{!! Form::text('min_order_quantity', $production['min_order_quantity'], ['class' => 'form-control', 'required' => 'required']) !!}</td> 
                              </tr>
                              <tr>
                                <th scope="row" rowspan="2" colspan="2">Main customer</th>
                                @foreach($main_customer['mani_customer_prefix'] as $prefix)
                                  <td>{!! Form::text('mani_customer_prefix[]', $prefix, ['class' => 'form-control']) !!}</td>
                                @endforeach
                              </tr>
                              <tr>
                                @foreach($main_customer['main_customer_percent'] as $percent)
                                  <td>{!! Form::text('main_customer_percent[]', $percent, ['class' => 'form-control']) !!}</td>
                                @endforeach
                              </tr>
                              <tr>
                                <th scope="row" rowspan="3">Certification and Standard</th>
                                @foreach($certificate as $c)
                                 <td>{!! Form::checkbox('certificate[]', $c, false); !!}</td>
                                 <td>{{ $c }}</td>
                                @endforeach
                                <td colspan="6">{!! Form::text('certificate_other', $cer_standard['certificate_other'], ['class' => 'form-control']) !!}</td>
                              </tr>
                              <tr>
                                @foreach($standard as $s)
                                  <td><input type="checkbox" name="standard[]" value="{{ $s }}"
                                      @if(in_array($s, $cer_standard['standard']))
                                        checked="" 
                                      @endif
                                    ></td>
                                  <td>{{ $s }}</td>
                                @endforeach
                                </tr>
                                <tr>
                                <td colspan="12">{!! Form::text('standard_other', $cer_standard['standard_other'], ['class' => 'form-control']) !!}</td>
                              </tr>
                              <tr>
                                <th scope="row" rowspan="2">Export and Import</th>
                                <td>Export Country</td>
                                <td colspan="4">
                                    {!! Form::text('export_country', $export_impot['export_country'], ['class' => 'form-control', 'required' => 'required']) !!}</td>
                                <td>Ex. Items</td>
                                <td colspan="6">
                                    {!! Form::text('export_item', $export_impot['export_item'], ['class' => 'form-control', 'required' => 'required']) !!}</td>
                              </tr>
                              <tr>
                                <td>Import Country</td>
                                <td colspan="4">
                                    {!! Form::text('import_country', $export_impot['import_country'], ['class' => 'form-control', 'required' => 'required']) !!}</td>
                                <td>Im. Items</td>
                                <td colspan="6">
                                    {!! Form::text('import_item', $export_impot['import_item'], ['class' => 'form-control', 'required' => 'required']) !!}</td>
                              </tr>
                              <tr>

                                <tr>
                                  <th scope="row" rowspan="2">Hygiene</th>
                                  @foreach($hygiene[0] as $hg)
                                    <td colspan="2">{!! Form::text('hygiene_one[]', $hg, ['class' => 'form-control']) !!}</td>  
                                  @endforeach
                                </tr>
                                <tr>
                                  @foreach($hygiene[1] as $hg)
                                    <td colspan="2">{!! Form::text('hygiene_two[]', $hg, ['class' => 'form-control']) !!}</td>  
                                  @endforeach
                                </tr>
                                <th scope="row" rowspan="1"></th>
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
                                <th scope="row">Special Notes</th>
                                <td colspan="12">
                                    {!! Form::text('special_note', null, ['class' => 'form-control', 'required' => 'required']) !!}</td>
                              </tr>
                            </tbody>
                          </table>


                        </div>

                        <div class="form-group col-sm-12">
                            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                            <a href="{!! route('company.index') !!}" class="btn btn-default">Cancel</a>
                        </div>
                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection