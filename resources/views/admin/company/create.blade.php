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
                            <select name="company_category_id" id="company_category_id" class="form-control">
                                <option value="0">Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}-{{ $category->prefix }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-6">
                            {!! Form::label('name', 'Name:') !!} <span class="text-danger">*</span>
                            {!! Form::text('name', null, ['class' => 'form-control','required' => 'required']) !!}
                        </div>

                        <div class="form-group col-sm-6">
                            {!! Form::label('mm_name', 'Myanmar Name:') !!} <span class="text-danger">*</span>
                            {!! Form::text('mm_name', null, ['id' => 'mm_name','class' => 'form-control']) !!}
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
                        <div class="form-group col-sm-4">
                            <label for="description">Main Product</label><br/>
                            <select class="form-control" name="product_id[]" id="pro_id" multiple>
                                @foreach($products as $product)
                                    <option value="{{ $product->id}}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="description">Main Processing Classification</label><br/>
                            <select class="form-control" name="processing_id[]" id="process_id" multiple>
                                @foreach($main_processings as $main_processing)
                                    <option value="{{ $main_processing->id}}">{{ $main_processing->main_process }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="description">Location</label><br/>
                            <select class="form-control" name="location_id[]" id="loc_id" multiple>
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
                            <label for="contact">Contact</label><br/>
                        </div>
                        <div class="form-group col-sm-12">
                            {!! Form::label('url', 'URL') !!} <span class="text-danger">*</span>
                            {!! Form::text('company_url', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group col-sm-12">
                            <label for="">Office</label>
                        </div>
                        
                        <div class="form-group col-sm-2">
                            {{ Form::radio('office_location', 'Yangon') }} &nbsp;&nbsp;Yangon 
                        </div>
                        <div class="form-group col-sm-2">
                            {!! Form::radio('office_location', 'Mandalay') !!} &nbsp;&nbsp;Mandalay
                        </div>
                        <div class="form-group col-sm-8">
                            <div class="col-sm-1">
                            {!! Form::radio('office_location', 'Other') !!}
                            </div>
                            <div class="form-group col-sm-11">
                             {!! Form::text('office_location_other', null, ['class' => 'form-control', 'placeholder' => 'Other']) !!}
                            </div>
                        </div>
                        <div class="form-group col-sm-12">
                            {!! Form::label('address', 'Address') !!} <span class="text-danger">*</span>
                            {!! Form::text('office_address', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-sm-6">
                            {!! Form::label('tel', 'TEL') !!} <span class="text-danger">*</span>
                            {!! Form::text('office_tel', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-sm-6">
                            {!! Form::label('fax', 'FAX') !!} <span class="text-danger">*</span>
                            {!! Form::text('office_fax', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group col-sm-12" style="margin-top: 10px;">
                            <label for="">Plant</label><br/>
                        </div>
                        
                        <div class="form-group col-sm-2">
                            {{ Form::radio('plant_location', 'Yangon') }} &nbsp;&nbsp;Yangon 
                        </div>
                        <div class="form-group col-sm-2">
                            {!! Form::radio('plant_location', 'Mandalay') !!} &nbsp;&nbsp;Mandalay
                        </div>
                        <div class="form-group col-sm-8">
                            <div class="col-sm-1">
                            {!! Form::radio('plant_location', 'Other') !!}
                            </div>
                            <div class="form-group col-sm-11">
                             {!! Form::text('plant_location_other', null, ['class' => 'form-control', 'placeholder' => 'Other']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group col-sm-12">
                            {!! Form::label('address', 'Address') !!} <span class="text-danger">*</span>
                            {!! Form::text('plant_address', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-sm-6">
                            {!! Form::label('tel', 'TEL') !!} <span class="text-danger">*</span>
                            {!! Form::text('plant_tel', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-sm-6">
                            {!! Form::label('fax', 'FAX') !!} <span class="text-danger">*</span>
                            {!! Form::text('plant_fax', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group col-sm-12" style="margin-top: 10px;">
                            <label for="">Top Management</label><br/>
                        </div>
                        <div class="col-sm-6">
                            {!! Form::label('name', 'Name') !!} <span class="text-danger">*</span>
                            {!! Form::text('repre_name', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-sm-6">
                            {!! Form::label('position', 'Position') !!} <span class="text-danger">*</span>
                            {!! Form::text('repre_tittle', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group col-sm-12" style="margin-top: 20px;">
                            <label for="">Person in charge</label><br/>
                        </div>
                        <div class="col-sm-6">
                            {!! Form::label('name', 'Name') !!} <span class="text-danger">*</span>
                            {!! Form::text('pic_name', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-sm-6">
                            {!! Form::label('position', 'Position') !!} <span class="text-danger">*</span>
                            {!! Form::text('pic_title', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-sm-6">
                            {!! Form::label('name', 'TEL') !!} <span class="text-danger">*</span>
                            {!! Form::text('pic_tel', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-sm-6">
                            {!! Form::label('position', 'Email') !!} <span class="text-danger">*</span>
                            {!! Form::text('pic_email', null, ['class' => 'form-control']) !!}
                        </div>
                        
                        <div class="form-group col-sm-12" style="margin-top: 10px;">
                            <label for="">Language</label><br/>
                        </div>
                        
                        <div class="form-group col-sm-2">
                            {{ Form::radio('language', 'English') }} &nbsp;&nbsp;English 
                        </div>
                        <div class="form-group col-sm-2">
                            {!! Form::radio('language', 'Japanese') !!} &nbsp;&nbsp;Japanese
                        </div>
                        <div class="form-group col-sm-8">
                            <div class="col-sm-1">
                            {!! Form::radio('language', 'Other') !!}
                            </div>
                            <div class="form-group col-sm-11">
                             {!! Form::text('language_other', null, ['class' => 'form-control', 'placeholder' => 'Other']) !!}
                            </div>
                        </div>

                        <div class="form-group col-sm-12" style="margin-top: 20px;">
                            <label for="">Company Info</label><br/>
                        </div>
                        <div class="col-sm-6">
                            {!! Form::label('name', 'Year of estabishment') !!} <span class="text-danger">*</span>
                            {!! Form::text('year_of_establish', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-sm-6">
                            {!! Form::label('position', 'Num. of Employee') !!} <span class="text-danger">*</span>
                            {!! Form::text('no_employee', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-sm-6">
                            {!! Form::label('name', 'Capital Investment') !!} <span class="text-danger">*</span>
                            {!! Form::text('capital', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-sm-6">
                            {!! Form::label('position', 'Annual Sales Amount') !!} <span class="text-danger">*</span>
                            {!! Form::text('annual_amount', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group col-sm-12" style="margin-top: 20px;">
                            <label for="">Production</label><br/>
                        </div>
                        <div class="col-sm-6">
                            {!! Form::label('name', 'Space for Plant') !!} <span class="text-danger">*</span>
                            {!! Form::text('space_for_plant', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-sm-6">
                            {!! Form::label('position', 'Production Capacity') !!} <span class="text-danger">*</span>
                            {!! Form::text('production_capacity', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-sm-6">
                            {!! Form::label('name', 'Operation Ratio') !!} <span class="text-danger">*</span>
                            {!! Form::text('operation_ratio', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-sm-6">
                            {!! Form::label('position', 'Min Order Quantity') !!} <span class="text-danger">*</span>
                            {!! Form::text('min_order_quantity', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group col-sm-12" style="margin-top: 30px;">
                            <div class="col-sm-3">
                                <label>Low material</label>
                            </div>
                            <div class="col-sm-3">
                                <label>1</label>
                            </div>
                            <div class="col-sm-3">
                                <label>2</label>
                            </div>
                            <div class="col-sm-3">
                                <label>3</label>
                            </div>
                        </div>
                        <div class="form-group col-sm-12">
                            <div class="col-sm-3">
                                <label>Name of Material</label>
                            </div>
                            <div class="col-sm-3">
                                {!! Form::text('name_of_material[]', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="col-sm-3">
                                {!! Form::text('name_of_material[]', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="col-sm-3">
                                {!! Form::text('name_of_material[]', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group col-sm-12">
                            <div class="col-sm-3">
                                <label>Supplier Name</label>
                            </div>
                            <div class="col-sm-3">
                                {!! Form::text('supplier_name[]', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="col-sm-3">
                                {!! Form::text('supplier_name[]', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="col-sm-3">
                                {!! Form::text('supplier_name[]', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group col-sm-12">
                            <div class="col-sm-3">
                                <label>Country of Origin</label>
                            </div>
                            <div class="col-sm-3">
                                {!! Form::text('country_origin[]', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="col-sm-3">
                                {!! Form::text('country_origin[]', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="col-sm-3">
                                {!! Form::text('country_origin[]', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>


                        <div class="form-group col-sm-12" style="margin-top: 10px;">
                            <label>Main customer</label>
                        </div>
                        <div class="form-group col-sm-12">
                            <div class="col-sm-2">
                                {!! Form::text('mani_customer_prefix[]', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="col-sm-2">
                                {!! Form::text('mani_customer_prefix[]', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="col-sm-2">
                                {!! Form::text('mani_customer_prefix[]', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="col-sm-2">
                                {!! Form::text('mani_customer_prefix[]', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="col-sm-2">
                                {!! Form::text('mani_customer_prefix[]', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="col-sm-2">
                                {!! Form::text('mani_customer_prefix[]', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group col-sm-12">
                            <div class="col-sm-2">
                                {!! Form::text('main_customer_percent[]', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="col-sm-2">
                                {!! Form::text('main_customer_percent[]', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="col-sm-2">
                                {!! Form::text('main_customer_percent[]', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="col-sm-2">
                                {!! Form::text('main_customer_percent[]', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="col-sm-2">
                                {!! Form::text('main_customer_percent[]', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="col-sm-2">
                                {!! Form::text('main_customer_percent[]', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group col-sm-12" style="margin-top: 20px;">
                            <label for="">Certification and Standard</label><br/>
                        </div>
                        <div class="form-group col-sm-12">
                            @foreach($certificate as $c)
                            <div class="form-group col-sm-2">
                                {!! Form::checkbox('certificate[]', $c, false); !!} &nbsp;&nbsp; &nbsp;&nbsp;
                                <input type="hidden" name="certificate[]" value="0">
                                {{ $c }} 
                            </div>
                            @endforeach
                            <span><div class="col-sm-6">
                                {!! Form::text('certificate_other', null, ['class' => 'form-control']) !!}</div>
                            </span>
                        </div>

                        <div class="form-group col-sm-12">
                            @foreach($standard as $s)
                            <div class="form-group col-sm-2">
                                {!! Form::checkbox('standard[]', $s, false); !!} &nbsp;&nbsp; &nbsp;&nbsp;
                                <input type="hidden" name="standard[]" value="0">
                                {{ $s }} 
                            </div>
                            @endforeach
                            <span><div class="col-sm-12">
                                {!! Form::text('standard_other', null, ['class' => 'form-control']) !!}</div>
                            </span>
                        </div>

                        <div class="form-group col-sm-12" style="margin-top: 20px;">
                            <label for="">Export and Import</label><br/>
                        </div>
                        <div class="col-sm-6">
                            {!! Form::label('name', 'Export Country') !!} <span class="text-danger">*</span>
                            {!! Form::text('export_country', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-sm-6">
                            {!! Form::label('position', 'Ex. Items') !!} <span class="text-danger">*</span>
                            {!! Form::text('export_item', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-sm-6">
                            {!! Form::label('name', 'Import Country') !!} <span class="text-danger">*</span>
                            {!! Form::text('import_country', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-sm-6">
                            {!! Form::label('position', 'Im. Items') !!} <span class="text-danger">*</span>
                            {!! Form::text('import_item', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group col-sm-12" style="margin-top: 20px;">
                            {!! Form::label('address', 'Special Notes') !!} <span class="text-danger">*</span>
                            {!! Form::text('special_note', null, ['class' => 'form-control']) !!}
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