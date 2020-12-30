@extends('admin.layout.app')
@section('content')
    <section class="content-header">
        <h1>
            Create Food Processing
        </h1>
        <span class="breadcrumb"><a href='{{ route("company.index") }}' class="btn btn-sm btn-primary"><i class="fa fa-arrow-circle-left"></i>&nbsp;&nbsp;Go To Company</a></span>
    </section>
   <div class="content">
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                    {!! Form::open(array('route' => 'company.store', 'method'=>'POST')) !!}
                        <input type="hidden" name="type" value="{{ FOOD }}">
                        <input type="hidden" name="category_id" value="{{ $category_id }}">
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
                        <div class="form-group col-sm-6">
                            <label for="description">Main Product</label><br/>
                            <select class="form-control" name="product_id[]" multiple required="">
                                @foreach($products as $product)
                                    <option value="{{ $product->id}}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="description">Location</label><br/>
                            <select class="form-control" name="location_id[]" multiple required="">
                                @foreach($locations as $location)
                                    <option value="{{ $location->id }}">{{ $location->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <hr>
                        
                        <div class="form-group col-sm-12">
                          <table class="table">
                            <tbody>
                              <tr>
                                <th scope="row" rowspan="11">Contact</th>
                                <td colspan="1">URL</td>
                                <th colspan="12">
                                {!! Form::text('company_url', null, ['class' => 'form-control', 'required' => 'required']) !!}</th>
                              </tr>
                              <tr>
                                <td scope="row" rowspan="3" colspan="">Office</td> 
                              <tr>
                                <td rowspan="1">Address</td>
                                  <td scope="row" colspan="11">
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
                                <td scope="row" rowspan="3">Factory</td>
                              <tr>
                                <td rowspan="1">Address</td>
                                  <td scope="row" colspan="11">
                                  {!! Form::text('factory_address', null, ['class' => 'form-control', 'required' => 'required']) !!}</td>
                              </tr>
                              <tr>
                                <td>TEL</td>
                                <td colspan="3">
                                {!! Form::text('factory_tel', null, ['class' => 'form-control', 'required' => 'required']) !!}</td>
                                <td>FAX</td>
                                <td colspan="10">
                                    {!! Form::text('factory_fax', null, ['class' => 'form-control', 'required' => 'required']) !!}</td>
                              </tr>
                              <tr>
                                <td scope="row" colspan="1">MD/CEO</td>
                                <td>Name</td>
                                <td colspan="3">
                                    {!! Form::text('md_ceo_name', null, ['class' => 'form-control', 'required' => 'required']) !!}</td>
                                <td colspan="1">Position</td>
                                <td colspan="8">
                                    {!! Form::text('md_ceo_position', null, ['class' => 'form-control', 'required' => 'required']) !!}</td>
                              </tr>

                              <tr>
                                <td scope="row" colspan="1">Production/Factory Manager</td>
                                <td>Name</td>
                                <td colspan="3">
                                    {!! Form::text('factory_manager_name', null, ['class' => 'form-control', 'required' => 'required']) !!}</td>
                                <td colspan="1">Position</td>
                                <td colspan="8">
                                    {!! Form::text('factory_manager_position', null, ['class' => 'form-control', 'required' => 'required']) !!}</td>
                              </tr>

                              <tr>
                                <td scope="row" colspan="1">Hygiene Manager</td>
                                <td>Name</td>
                                <td colspan="3">
                                    {!! Form::text('hygiene_manager_name', null, ['class' => 'form-control', 'required' => 'required']) !!}</td>
                                <td colspan="1">Position</td>
                                <td colspan="8">
                                    {!! Form::text('hygiene_manager_position', null, ['class' => 'form-control', 'required' => 'required']) !!}</td>
                              </tr>

                              <tr>
                                <td scope="row" colspan="1" rowspan="3">Contact Person</td>
                                <td>Name</td>
                                <td colspan="3">
                                    {!! Form::text('cp_name', null, ['class' => 'form-control', 'required' => 'required']) !!}</td>
                                <td colspan="1">Position</td>
                                <td colspan="8">
                                    {!! Form::text('cp_position', null, ['class' => 'form-control', 'required' => 'required']) !!}</td>
                              </tr>
                              <tr>
                                <td scope="row" colspan="1" rowspan="3"></td>
                                <td scope="row">TEL</td>
                                <td colspan="3">
                                    {!! Form::text('cp_tel', null, ['class' => 'form-control', 'required' => 'required']) !!}</td>
                                <td>Email</td>
                                <td colspan="8">
                                    {!! Form::text('cp_email', null, ['class' => 'form-control', 'required' => 'required']) !!}</td>
                              </tr>

                              <tr>
                                <td scope="row" rowspan="3">Foreign Language</td>
                                <td>{{ Form::radio('language', 'English', array('required' => 'required')) }} &nbsp;&nbsp;English</td>
                                <td>{!! Form::radio('language', 'Japanese') !!}&nbsp;&nbsp;Japanese</td>
                                <td>{!! Form::radio('language', 'Other') !!}</td>
                                <td colspan="8"> {!! Form::text('language_other', null, ['class' => 'form-control', 'placeholder' => 'Other']) !!}</td>
                              </tr>

                              <tr>
                                  <td scope="row" rowspan="2"></td>
                              </tr>
                              <tr>
                                <th scope="row" rowspan="4">Outline</th>
                                <td colspan="2">Year of foundation</td>
                                <td colspan="2">
                                    {!! Form::text('foundation', null, ['class' => 'form-control', 'required' => 'required']) !!}</td>
                                <td colspan="2">Employees</td>
                                <td colspan="2">
                                    {!! Form::text('employee', null, ['class' => 'form-control', 'required' => 'required']) !!}</td>
                                <td colspan="2">Factory Size</td>
                                <td colspan="2">
                                {!! Form::text('factory_size', null, ['class' => 'form-control', 'required' => 'required']) !!}</td>
                              </tr>
                              <tr>
                                <th scope="row" rowspan="4"></th>
                                <td colspan="3">Capital Stock</td>
                                <td colspan="2">
                                    {!! Form::text('capital_stock', null, ['class' => 'form-control', 'required' => 'required']) !!}</td>
                                <td colspan="2">Annual Sales</td>
                                <td colspan="2">
                                    {!! Form::text('annual_sale', null, ['class' => 'form-control', 'required' => 'required']) !!}</td>
                                <td colspan="2">Production Capacity</td>
                                <td colspan="2">
                                {!! Form::text('production_capacity', null, ['class' => 'form-control', 'required' => 'required']) !!}</td>
                              </tr>
                              <tr>
                                <th scope="row" rowspan="4"></th>
                                <td colspan="2">Primary Materials</td>
                                <td colspan="2">
                                    {!! Form::text('primary_meterial', null, ['class' => 'form-control', 'required' => 'required']) !!}</td>
                                <td colspan="2">Source of Materials</td>
                                <td colspan="2">
                                    {!! Form::text('source_meterial', null, ['class' => 'form-control', 'required' => 'required']) !!}</td>
                                <td colspan="2">Minimum Order</td>
                                <td colspan="2">
                                {!! Form::text('minimum_order', null, ['class' => 'form-control', 'required' => 'required']) !!}</td>
                              </tr>

                              <tr>
                                  <th scope="row" colspan="2"></th>
                              </tr>

                              <tr>
                                <th scope="row" rowspan="2" colspan="2">Customers</th>
                                <td>
                                {!! Form::text('customer_prefix[]', null, ['class' => 'form-control', 'required' => 'required']) !!}</td>
                                <td>{!! Form::text('customer_prefix[]', null, ['class' => 'form-control']) !!}</td>
                                <td>{!! Form::text('customer_prefix[]', null, ['class' => 'form-control']) !!}</td>
                              </tr>


                              <tr>
                                <td>
                                {!! Form::text('customer_percent[]', null, ['class' => 'form-control', 'required' => 'required']) !!}</td>
                                <td>{!! Form::text('customer_percent[]', null, ['class' => 'form-control']) !!}</td>
                                <td>{!! Form::text('customer_percent[]', null, ['class' => 'form-control']) !!}</td>
                              </tr>

                              <tr>
                                <th scope="row" rowspan="3">Certification</th>
                                @foreach($certificate as $c)
                                  <td>{!! Form::checkbox('certificate[]', $c, false); !!}</td>
                                  <input type="hidden" name="certificate[]" value="0">
                                  <td>{{ $c }}</td>
                                @endforeach
                                <td colspan="6">{!! Form::text('certificate_other', null, ['class' => 'form-control']) !!}</td>
                              </tr>

                              <tr>
                                <th scope="row" rowspan="2"></th>
                                <td>Number</td>
                                <td colspan="2">
                                {!! Form::text('cer_number', null, ['class' => 'form-control', 'required' => 'required']) !!}</td>
                                <td>Acquired Year</td>
                                <td colspan="2">
                                {!! Form::text('cer_acquired_year', null, ['class' => 'form-control', 'required' => 'required']) !!}</td>
                                <td>Sprcify</td>
                                <td colspan="6">
                                {!! Form::text('cer_sprcify', null, ['class' => 'form-control', 'required' => 'required']) !!}</td>
                              </tr>

                              <tr>
                                  <th scope="row" rowspan="2"></th>
                              </tr>

                              <tr>
                                <th scope="row" rowspan="2">Exportation</th>
                                <td>Country Name</td>
                                <td colspan="2">
                                {!! Form::text('expotation_country', null, ['class' => 'form-control', 'required' => 'required']) !!}</td>
                                <td>Product Name</td>
                                <td colspan="2">
                                {!! Form::text('expotation_product', null, ['class' => 'form-control', 'required' => 'required']) !!}</td>
                                <td>USD/year</td>
                                <td colspan="6">
                                {!! Form::text('expotation_year', null, ['class' => 'form-control', 'required' => 'required']) !!}</td>
                              </tr>

                              <tr>
                                  <th scope="row" rowspan="2"></th>
                              </tr>
                              
                                <th scope="row" rowspan="2">Hygiene</th>
                                <td colspan="2">{!! Form::text('hygiene_one[]', null, ['class' => 'form-control']) !!}</td>
                                <td colspan="2">{!! Form::text('hygiene_one[]', null, ['class' => 'form-control']) !!}</td>
                                <td colspan="2">{!! Form::text('hygiene_one[]', null, ['class' => 'form-control']) !!}</td>
                                <td colspan="4">{!! Form::text('hygiene_one[]', null, ['class' => 'form-control']) !!}</td>
                              </tr>
                              <tr>
                                <th scope="row" rowspan="2"></th>
                                <td colspan="2">{!! Form::text('hygiene_two[]', null, ['class' => 'form-control']) !!}</td>
                                <td colspan="2">{!! Form::text('hygiene_two[]', null, ['class' => 'form-control']) !!}</td>
                                <td colspan="2">{!! Form::text('hygiene_two[]', null, ['class' => 'form-control']) !!}</td>
                                <td colspan="4">{!! Form::text('hygiene_two[]', null, ['class' => 'form-control']) !!}</td>
                              </tr>
                              <tr>
                              <th scope="row" rowspan="1"></th>
                                @for ($i=1; $i < 5; $i++)
                                    <td colspan="2">{!! Form::checkbox('hygiene_three[]', $i, false); !!}</td>
                                    <input type="hidden" name="hygiene_three[]" value="0">
                                @endfor
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
                                        @for ($i=1; $i < 7; $i++)  
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td><input type="text" class="form-control" name="machinery[]"></td>
                                                <td><input type="text" class="form-control" name="model_number[]"></td>
                                                <td><input type="text" class="form-control" name="number[]"></td>
                                                <td><input type="text" class="form-control" name="manufacturer[]"></td>
                                                <td><input type="text" class="form-control" name="manufacturered_country[]"></td>
                                            </tr>
                                        @endfor
                                    </tbody>
                                </table>
                            </div>
                            </tbody>
                          </table>
                        </div>
                        <div class="form-group" class="col-sm-12">
                            <label>Remarks</label>
                              {!! Form::text('remark', null, ['class' => 'form-control', 'required' => 'required']) !!}
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