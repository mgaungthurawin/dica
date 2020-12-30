@extends('admin.layout.app')
@section('content')
    <section class="content-header">
        <h1>
            Create Company
        </h1>
        <span class="breadcrumb"><a href='{{ route("company.index") }}' class="btn btn-sm btn-primary"><i class="fa fa-arrow-circle-left"></i>&nbsp;&nbsp;Go To Company</a></span>
    </section>
   <div class="content">
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                    {!! Form::open(array('route' => 'company.store','method'=>'POST')) !!}
                        <input type="hidden" id="category_id" name="category_id">
                        <div class="form-group col-sm-12">
                            {!! Form::label('name', 'Company Category:') !!} <span class="text-danger">*</span>
                            <select name="company_category_id" id="company_category_id" class="form-control" required="">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}-{{ $category->prefix }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-6">
                            {!! Form::label('name', 'Name:') !!} <span class="text-danger">*</span>
                            {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                        </div>

                        <div class="form-group col-sm-6">
                            {!! Form::label('mm_name', 'Myanmar Name:') !!} <span class="text-danger">*</span>
                            {!! Form::text('mm_name', null, ['id' => 'mm_name','class' => 'form-control', 'required' => 'required']) !!}
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
                            <label for="description">Main Product</label><br/>
                            <select class="form-control" name="product_id[]" multiple required="">
                                @foreach($products as $product)
                                    <option value="{{ $product->id}}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="description">Main Processing Classification</label><br/>
                            <select class="form-control" name="processing_id[]" multiple required="">
                                @foreach($main_processings as $main_processing)
                                    <option value="{{ $main_processing->id}}">{{ $main_processing->main_process }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="description">Location</label><br/>
                            <select class="form-control" name="location_id[]" multiple required="">
                                @foreach($locations as $location)
                                    <option value="{{ $location->id}}">{{ $location->name }}</option>
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
                                            <td><input type="text" class="form-control" name="machine_country_origin[]"></td>
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
                                <td scope="row" rowspan="3" colspan="">Office</td>
                                <td>{{ Form::radio('office_location', 'Yangon', array('required' => 'required')) }} &nbsp;&nbsp;Yangon</td>
                                <td>{!! Form::radio('office_location', 'Mandalay') !!} &nbsp;&nbsp;Mandalay</td>
                                <td>{!! Form::radio('office_location', 'Other') !!}</td>
                                <td colspan="8"> {!! Form::text('office_location_other', null, ['class' => 'form-control', 'placeholder' => 'Other']) !!}</td>
                              </tr>
                              <tr>
                                <td rowspan="1">Address</td>
                                  <td scope="row" colspan="10">
                                  {!! Form::text('office_address', null, ['class' => 'form-control', 'required' => 'required']) !!}</td>
                              </tr>
                              <tr>
                                <td>TEL</td>
                                <td colspan="3">
                                {!! Form::text('office_tel', null, ['class' => 'form-control', 'required' => 'required']) !!}</td>
                                <td>FAX</td>
                                <td colspan="10">
                                {!! Form::text('office_fax', null, ['class' => 'form-control', 'required' => 'required']) !!}</td>
                              </tr>

                              <tr>
                                <td scope="row" rowspan="3">Plant</td>
                                <td>{{ Form::radio('plant_location', 'Yangon', array('required' => 'required')) }} &nbsp;&nbsp;Yangon</td>
                                <td>{!! Form::radio('plant_location', 'Mandalay') !!} &nbsp;&nbsp;Mandalay</td>
                                <td>{!! Form::radio('plant_location', 'Other') !!}</td>
                                <td colspan="8"> {!! Form::text('plant_location_other', null, ['class' => 'form-control', 'placeholder' => 'Other']) !!}</td>
                              </tr>                        
                              <tr>
                                <td rowspan="1">Address</td>
                                  <td scope="row" colspan="10">
                                  {!! Form::text('plant_address', null, ['class' => 'form-control', 'required' => 'required']) !!}</td>
                              </tr>
                              <tr>
                                <td>TEL</td>
                                <td colspan="3">
                                {!! Form::text('plant_tel', null, ['class' => 'form-control', 'required' => 'required']) !!}</td>
                                <td>FAX</td>
                                <td colspan="10">
                                    {!! Form::text('plant_fax', null, ['class' => 'form-control', 'required' => 'required']) !!}</td>
                              </tr>
                              <tr>
                                <td scope="row" colspan="1">Representative</td>
                                <td>Name</td>
                                <td colspan="3">
                                    {!! Form::text('repre_name', null, ['class' => 'form-control', 'required' => 'required']) !!}</td>
                                <td colspan="1">Title</td>
                                <td colspan="8"><input type="text" name="repre_tittle" class="form-control" required=""></td>
                              </tr>
                              <tr>
                                <td scope="row" colspan="1" rowspan="3">Person in charge</td>
                                <td>Name</td>
                                <td colspan="3">
                                    {!! Form::text('pic_name', null, ['class' => 'form-control', 'required' => 'required']) !!}</td>
                                <td colspan="1">Title</td>
                                <td colspan="8">
                                    {!! Form::text('pic_title', null, ['class' => 'form-control', 'required' => 'required']) !!}</td>
                              </tr>
                              <tr>
                                <td scope="row">TEL</td>
                                <td colspan="3">
                                    {!! Form::text('pic_tel', null, ['class' => 'form-control', 'required' => 'required']) !!}</td>
                                <td>Email</td>
                                <td colspan="8">
                                    {!! Form::text('pic_email', null, ['class' => 'form-control', 'required' => 'required']) !!}</td>
                              </tr>

                              <tr>
                                <td scope="row" rowspan="3">Language</td>
                                <td>{{ Form::radio('language', 'English', array('required' => 'required')) }} &nbsp;&nbsp;English</td>
                                <td>{!! Form::radio('language', 'Japanese') !!}&nbsp;&nbsp;Japanese</td>
                                <td>{!! Form::radio('language', 'Other') !!}</td>
                                <td colspan="8"> {!! Form::text('language_other', null, ['class' => 'form-control', 'placeholder' => 'Other']) !!}</td>
                              </tr>
                              <tr>
                                <th scope="row" rowspan="2">Company Info.</th>
                                <td>Year of estabishment</td>
                                <td colspan="2">
                                {!! Form::text('year_of_establish', null, ['class' => 'form-control', 'required' => 'required']) !!}</td>
                                <td>Num. of Employee</td>
                                <td colspan="2">
                                {!! Form::text('no_employee', null, ['class' => 'form-control', 'required' => 'required']) !!}</td>
                                <td rowspan="2" colspan="4"><center>Production</center>
                                </td>
                              </tr>
                              <tr>
                                <td scope="row">Capital</td>
                                <td colspan="2">
                                {!! Form::text('capital', null, ['class' => 'form-control', 'required' => 'required']) !!}</td>
                                <td>Annual Sales Amount</td>
                                <td colspan="2">
                                {!! Form::text('annual_amount', null, ['class' => 'form-control', 'required' => 'required']) !!}</td>
                              </tr>
                              <tr>
                                <th scope="row" rowspan="4">Low material</th>
                                <td colspan="2" style="text-align: right;">No</td>
                                <td colspan="2">1</td>
                                <td colspan="2">2</td>
                                <td colspan="2">3</td>
                                <td colspan="2">Space for Plant</td>
                                <td colspan="2"><input type="text" name="space_for_plant" class="form-control" required=""></td>
                              </tr>
                              <tr>
                                <td colspan="1">Name of Material</td>
                                <td colspan="2">
                                {!! Form::text('name_of_material[]', null, ['class' => 'form-control', 'required' => 'required']) !!}</td>
                                <td colspan="2">{!! Form::text('name_of_material[]', null, ['class' => 'form-control']) !!}</td>
                                <td colspan="3">{!! Form::text('name_of_material[]', null, ['class' => 'form-control']) !!}</td>
                                <td colspan="2">Production Capacity</td>
                                <td colspan="2"><input type="text" name="production_capacity" class="form-control" required=""></td>
                              </tr>
                              <tr>
                                <td colspan="1">Supplier Name</td>
                                <td colspan="2">
                                {!! Form::text('supplier_name[]', null, ['class' => 'form-control', 'required' => 'required']) !!}</td>
                                <td colspan="2">{!! Form::text('supplier_name[]', null, ['class' => 'form-control']) !!}</td>
                                <td colspan="3">{!! Form::text('supplier_name[]', null, ['class' => 'form-control']) !!}</td>
                                <td colspan="2">Operation Ratio</td>
                                <td colspan="2"><input type="text" name="operation_ratio" class="form-control" required=""></td>
                              </tr>
                              <tr>
                                <td colspan="1">Country of Origin</td>
                                <td colspan="2">
                                {!! Form::text('country_origin[]', null, ['class' => 'form-control', 'required' => 'required']) !!}</td>
                                <td colspan="2">{!! Form::text('country_origin[]', null, ['class' => 'form-control']) !!}</td>
                                <td colspan="3">{!! Form::text('country_origin[]', null, ['class' => 'form-control']) !!}</td>
                                <td colspan="2">Min Order Quantity</td>
                                <td colspan="2">
                                {!! Form::text('min_order_quantity', null, ['class' => 'form-control', 'required' => 'required']) !!}</td>
                              </tr>
                              <tr>
                                <th scope="row" rowspan="2" colspan="2">Main customer</th>
                                <td>
                                {!! Form::text('mani_customer_prefix[]', null, ['class' => 'form-control', 'required' => 'required']) !!}</td>
                                <td>{!! Form::text('mani_customer_prefix[]', null, ['class' => 'form-control']) !!}</td>
                                <td>{!! Form::text('mani_customer_prefix[]', null, ['class' => 'form-control']) !!}</td>
                                <td>{!! Form::text('mani_customer_prefix[]', null, ['class' => 'form-control']) !!}</td>
                                <td>{!! Form::text('mani_customer_prefix[]', null, ['class' => 'form-control']) !!}</td>
                                <td>{!! Form::text('mani_customer_prefix[]', null, ['class' => 'form-control']) !!}</td>
                              </tr>
                              <tr>
                                <td>
                                {!! Form::text('main_customer_percent[]', null, ['class' => 'form-control', 'required' => 'required']) !!}</td>
                                <td>{!! Form::text('main_customer_percent[]', null, ['class' => 'form-control']) !!}</td>
                                <td>{!! Form::text('main_customer_percent[]', null, ['class' => 'form-control']) !!}</td>
                                <td>{!! Form::text('main_customer_percent[]', null, ['class' => 'form-control']) !!}</td>
                                <td>{!! Form::text('main_customer_percent[]', null, ['class' => 'form-control']) !!}</td>
                                <td>{!! Form::text('main_customer_percent[]', null, ['class' => 'form-control']) !!}</td>
                              </tr>
                              <tr>
                                <th scope="row" rowspan="3">Certification and Standard</th>
                                @foreach($certificate as $c)
                                  <td>{!! Form::checkbox('certificate[]', $c, false); !!}</td>
                                  <input type="hidden" name="certificate[]" value="0">
                                  <td>{{ $c }}</td>
                                @endforeach
                                <td colspan="6">{!! Form::text('certificate_other', null, ['class' => 'form-control']) !!}</td>
                              </tr>
                              <tr>
                                @foreach($standard as $s)
                                  <td>{!! Form::checkbox('standard[]', $s, false); !!}</td>
                                  <input type="hidden" name="standard[]" value="0">
                                  <td>{{ $s }}</td>
                                @endforeach
                                </tr>
                                <tr>
                                <td colspan="12">{!! Form::text('standard_other', null, ['class' => 'form-control']) !!}</td>
                              </tr>
                              <tr>
                                <th scope="row" rowspan="2">Export and Import</th>
                                <td>Export Country</td>
                                <td colspan="4">
                                {!! Form::text('export_country', null, ['class' => 'form-control', 'required' => 'required']) !!}</td>
                                <td>Ex. Items</td>
                                <td colspan="6">
                                {!! Form::text('export_item', null, ['class' => 'form-control', 'required' => 'required']) !!}</td>
                              </tr>
                              <tr>
                                <td>Import Country</td>
                                <td colspan="4">
                                {!! Form::text('import_country', null, ['class' => 'form-control', 'required' => 'required']) !!}</td>
                                <td>Im. Items</td>
                                <td colspan="6">
                                {!! Form::text('import_item', null, ['class' => 'form-control', 'required' => 'required']) !!}</td>
                              </tr>
                            {{--<tr>
                            <th scope="row" rowspan="1"></th>
                              <td colspan="2">{!! Form::checkbox('hygiene_three[]', null, false); !!}</td>
                              <td colspan="2">{!! Form::checkbox('hygiene_three[]', null, false); !!}</td>
                              <td colspan="2">{!! Form::checkbox('hygiene_three[]', null, false); !!}</td>
                              <td colspan="4">{!! Form::checkbox('hygiene_three[]', null, false); !!}</td>
                            </tr>--}}

                            <tr>
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