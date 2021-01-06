@extends('admin.layout.app')
@section('content')
    <section class="content-header">
        <h1>
            Edit Food Processing
        </h1>
        <span class="breadcrumb"><a href='{{ route("company.index") }}' class="btn btn-sm btn-primary"><i class="fa fa-arrow-circle-left"></i>&nbsp;&nbsp;Go To Company</a></span>
    </section>
   <div class="content">
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                    {!! Form::model($company, ['method' => 'PATCH','route' => ['company.update', $company->id]]) !!}
                        <input type="hidden" name="type" value="{{ FOOD }}">
                        <input type="hidden" name="category_id" value="{{ $company->category_id }}">
                        <div class="form-group col-sm-6">
                            {!! Form::label('name', 'Name:') !!} <span class="text-danger">*</span>
                            {!! Form::text('name', null, ['class' => 'form-control','required' => 'required']) !!}
                        </div>

                        <div class="form-group col-sm-6">
                            {!! Form::label('mm_name', 'Myanmar Name:') !!} <span class="text-danger">*</span>
                            {!! Form::text('mm_name', null, ['class' => 'form-control']) !!}
                        </div>

                        {{--<div class="form-group col-sm-6">
                            {!! Form::label('abbreviation', 'Abbreviation:') !!} <span class="text-danger">*</span>
                            {!! Form::text('abbreviation', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group col-sm-6">
                            {!! Form::label('nation', 'Nation:') !!} <span class="text-danger">*</span>
                            {!! Form::text('nation', null, ['class' => 'form-control']) !!}
                        </div>--}}

                        <div class="form-group col-sm-12">
                            {!! Form::label('description', 'Description:') !!} <span class="text-danger">*</span>
                            {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="description">Main Product</label><br/>
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
                        <div class="form-group col-sm-6">
                            <label for="description">Location</label><br/>
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
                        
                        <hr>
                        
                        <div class="form-group col-sm-12">
                          <table class="table">
                            <tbody>
                              <tr>
                                <th scope="row" rowspan="11">Contact</th>
                                <td colspan="1">URL</td>
                                <th colspan="12">
                                {!! Form::text('company_url', null, ['class' => 'form-control']) !!}</th>
                              </tr>
                              <tr>
                                <td scope="row" rowspan="3" colspan="">Office</td> 
                              <tr>
                                <td rowspan="1">Address</td>
                                  <td scope="row" colspan="11">
                                  {!! Form::text('office_address', null, ['class' => 'form-control']) !!}</td>
                              </tr>
                              <tr>
                                <td>TEL</td>
                                <td colspan="3">
                                {!! Form::text('office_tel', null, ['class' => 'form-control']) !!}</td>
                                <td>FAX</td>
                                <td colspan="10">
                                {!! Form::text('office_fax', null, ['class' => 'form-control']) !!}</td>
                              </tr>

                              <tr>
                                <td scope="row" rowspan="3">Factory</td>
                              <tr>
                                <td rowspan="1">Address</td>
                                  <td scope="row" colspan="11">
                                  {!! Form::text('factory_address', null, ['class' => 'form-control']) !!}</td>
                              </tr>
                              <tr>
                                <td>TEL</td>
                                <td colspan="3">
                                {!! Form::text('factory_tel', null, ['class' => 'form-control']) !!}</td>
                                <td>FAX</td>
                                <td colspan="10">
                                    {!! Form::text('factory_fax', null, ['class' => 'form-control']) !!}</td>
                              </tr>
                              <tr>
                                <td scope="row" colspan="1">MD/CEO</td>
                                <td>Name</td>
                                <td colspan="3">
                                    {!! Form::text('md_ceo_name', null, ['class' => 'form-control']) !!}</td>
                                <td colspan="1">Position</td>
                                <td colspan="8">{!! Form::text('md_ceo_position', null, ['class' => 'form-control']) !!}</td>
                              </tr>

                              <tr>
                                <td scope="row" colspan="1">Production/Factory Manager</td>
                                <td>Name</td>
                                <td colspan="3">
                                    {!! Form::text('factory_manager_name', null, ['class' => 'form-control']) !!}</td>
                                <td colspan="1">Position</td>
                                <td colspan="8">
                                {!! Form::text('factory_manager_position', null, ['class' => 'form-control']) !!}</td>
                              </tr>

                              <tr>
                                <td scope="row" colspan="1">Hygiene Manager</td>
                                <td>Name</td>
                                <td colspan="3">
                                    {!! Form::text('hygiene_manager_name', null, ['class' => 'form-control']) !!}</td>
                                <td colspan="1">Position</td>
                                <td colspan="8">
                                    {!! Form::text('hygiene_manager_position', null, ['class' => 'form-control']) !!}</td>
                              </tr>

                              <tr>
                                <td scope="row" colspan="1" rowspan="3">Contact Person</td>
                                <td>Name</td>
                                <td colspan="3">
                                    {!! Form::text('cp_name', null, ['class' => 'form-control']) !!}</td>
                                <td colspan="1">Position</td>
                                <td colspan="8">
                                    {!! Form::text('cp_position', null, ['class' => 'form-control']) !!}</td>
                              </tr>
                              <tr>
                                <td scope="row" colspan="1" rowspan="3"></td>
                                <td scope="row">TEL</td>
                                <td colspan="3">
                                    {!! Form::text('cp_tel', null, ['class' => 'form-control']) !!}</td>
                                <td>Email</td>
                                <td colspan="8">
                                    {!! Form::text('cp_email', null, ['class' => 'form-control']) !!}</td>
                              </tr>

                              <tr>
                                <td scope="row" rowspan="3">Foreign Language</td>
                                <td>{{ Form::radio('language', 'English') }} &nbsp;&nbsp;English</td>
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
                                    {!! Form::text('foundation', null, ['class' => 'form-control']) !!}</td>
                                <td colspan="2">Employees</td>
                                <td colspan="2">
                                    {!! Form::text('employee', null, ['class' => 'form-control']) !!}</td>
                                <td colspan="2">Factory Size</td>
                                <td colspan="2">
                                {!! Form::text('factory_size', null, ['class' => 'form-control']) !!}</td>
                              </tr>
                              <tr>
                                <th scope="row" rowspan="4"></th>
                                <td colspan="3">Capital Stock</td>
                                <td colspan="2">
                                    {!! Form::text('capital_stock', null, ['class' => 'form-control']) !!}</td>
                                <td colspan="2">Annual Sales</td>
                                <td colspan="2">
                                    {!! Form::text('annual_sale', null, ['class' => 'form-control']) !!}</td>
                                <td colspan="2">Production Capacity</td>
                                <td colspan="2">
                                {!! Form::text('production_capacity', null, ['class' => 'form-control']) !!}</td>
                              </tr>
                              <tr>
                                <th scope="row" rowspan="4"></th>
                                <td colspan="2">Primary Materials</td>
                                <td colspan="2">
                                    {!! Form::text('primary_meterial', null, ['class' => 'form-control']) !!}</td>
                                <td colspan="2">Source of Materials</td>
                                <td colspan="2">
                                    {!! Form::text('source_meterial', null, ['class' => 'form-control']) !!}</td>
                                <td colspan="2">Minimum Order</td>
                                <td colspan="2">
                                {!! Form::text('minimum_order', null, ['class' => 'form-control']) !!}</td>
                              </tr>

                              <tr>
                                  <th scope="row" colspan="2"></th>
                              </tr>

                              <tr>
                                <th scope="row" rowspan="2" colspan="2">Customers</th>
                                @foreach($customer['customer_prefix'] as $prefix)
                                  <td>{!! Form::text('customer_prefix[]', $prefix, ['class' => 'form-control']) !!}</td>
                                @endforeach
                              </tr>
                              <tr>
                                @foreach($customer['customer_percent'] as $percent)
                                  <td>{!! Form::text('customer_percent[]', $percent, ['class' => 'form-control']) !!}</td>
                                @endforeach
                              </tr>

                              <tr>
                                <th scope="row" rowspan="3">Certification</th>
                                @foreach($certificate as $c)
                                  <td><input type="checkbox" name="certificate[]" value="{{ $c }}"
                                    @if(FALSE !== $c)
                                      @if(in_array($c, $select_certificate['certificate']))
                                        checked="" 
                                      @endif
                                    @endif
                                  ></td>
                                <td>{{ $c }}</td>
                                <input type="hidden" name="certificate[]" value="0">
                                @endforeach
                                <td colspan="6">{!! Form::text('certificate_other', $select_certificate['certificate_other'], ['class' => 'form-control']) !!}</td>
                              </tr>

                              <tr>
                                <th scope="row" rowspan="2"></th>
                                <td>Number</td>
                                <td colspan="2">
                                {!! Form::text('cer_number', $select_certificate['cer_number'], ['class' => 'form-control']) !!}</td>
                                <td>Acquired Year</td>
                                <td colspan="2">
                                {!! Form::text('cer_acquired_year', $select_certificate['cer_acquired_year'], ['class' => 'form-control']) !!}</td>
                                <td>Sprcify</td>
                                <td colspan="6">
                                {!! Form::text('cer_sprcify', $select_certificate['cer_sprcify'], ['class' => 'form-control']) !!}</td>
                              </tr>

                              <tr>
                                  <th scope="row" rowspan="2"></th>
                              </tr>

                              <tr>
                                <th scope="row" rowspan="2">Exportation</th>
                                <td>Country Name</td>
                                <td colspan="2">
                                {!! Form::text('expotation_country', null, ['class' => 'form-control']) !!}</td>
                                <td>Product Name</td>
                                <td colspan="2">
                                {!! Form::text('expotation_product', null, ['class' => 'form-control']) !!}</td>
                                <td>USD/year</td>
                                <td colspan="6">
                                {!! Form::text('expotation_year', null, ['class' => 'form-control']) !!}</td>
                              </tr>

                              <tr>
                                  <th scope="row" rowspan="2"></th>
                              </tr>


                              <tr>
                                <th scope="row" rowspan="2">Hygiene</th>
                                  @foreach($hygiene[0] as $hg)
                                    <td colspan="2">{!! Form::text('hygiene_one[]', $hg, ['class' => 'form-control']) !!}</td>  
                                  @endforeach
                              </tr>
                              <tr>
                                <th scope="row" rowspan="2"></th>
                                @foreach($hygiene[1] as $hg)
                                  <td colspan="2">{!! Form::text('hygiene_two[]', $hg, ['class' => 'form-control']) !!}</td>  
                                @endforeach
                              </tr>
                              <tr>
                              <th scope="row" rowspan="2"></th>
                                <?php $hygienearray=[1,2,3,4]; ?>
                                @for ($i=1; $i < 5; $i++) 
                                    <td colspan="2">
                                        <input type="checkbox" value="{{$i}}" name="hygiene_three[]"
                                          @if(in_array($i, $hygiene['2']))
                                            checked="" 
                                          @endif
                                        >
                                      </td> 
                                    </td>
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
                                        <?php $i=1; ?>
                                        @foreach($machinery['machinery'] as $key => $mm)
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td><input type="text" class="form-control" name="machinery[]" value="{{ $machinery['machinery'][$key] }}"></td>
                                                <td><input type="text" class="form-control" name="model_number[]" value="{{ $machinery['model_number'][$key] }}"></td>
                                                <td><input type="text" class="form-control" name="number[]" value="{{ $machinery['number'][$key] }}"></td>
                                                <td><input type="text" class="form-control" name="manufacturer[]" value="{{ $machinery['manufacturer'][$key] }}"></td>
                                                <td><input type="text" class="form-control" name="manufacturered_country[]" value="{{ $machinery['manufacturered_country'][$key] }}"></td>
                                            </tr>
                                            <?php $i++; ?>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <tr>
                                <th scope="row">Remarks</th>
                                <td colspan="12">
                                {!! Form::text('remark', null, ['class' => 'form-control']) !!}</td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <br><br>
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