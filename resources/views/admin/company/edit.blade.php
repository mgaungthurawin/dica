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
                    {!! Form::model($company, ['method' => 'PATCH','route' => ['company.update', $company->id], 'files' => 'true']) !!}
                        <input type="hidden" id="category_id" name="category_id">
                        <div class="form-group col-sm-12">
                            {!! Form::label('name', 'Company Category:') !!} <span class="text-danger">*</span>
                            <select name="company_category_id" id="company_category_id" class="form-control">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" 
                                        @if($category->id == $company->category_id) selected 
                                        @endif>
                                        {{ $category->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
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
                        </div> --}}

                        <div class="form-group col-sm-12">
                            {!! Form::label('description', 'Description:') !!} <span class="text-danger">*</span>
                            {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                        </div>

                        @include('admin.company.edit_media')

                        <div class="form-group col-sm-4">
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
                        <div class="form-group col-sm-4">
                            <label for="description">Main Processing Classification</label><br/>
                            <select class="form-control" name="processing_id[]" multiple>
                                @foreach($main_processings as $processing)
                                    <option value="{{ $processing->id }}"
                                      @if(in_array($processing->id, $selected_processing))
                                        selected
                                      @endif
                                      >{{ $processing->main_process }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="description">Location</label><br/>
                            <select class="form-control" name="location_id[]" multiple="">
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
                                <?php $i=1; ?>
                                @foreach($main_machine_equipment['type_of_equipment'] as $key => $mm)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td><input type="text" class="form-control" name="type_of_equipment[]" value="{{ $main_machine_equipment['type_of_equipment'][$key] }}"></td>
                                        <td><input type="text" class="form-control" name="model_destination[]" value="{{ $main_machine_equipment['model_destination'][$key] }}"></td>
                                        <td><input type="text" class="form-control" name="no_machine[]" value="{{ $main_machine_equipment['no_machine'][$key] }}"></td>
                                        <td><input type="text" class="form-control" name="machine_builder[]" value="{{ $main_machine_equipment['machine_builder'][$key] }}"></td>
                                        <td><input type="text" class="form-control" name="machine_country_origin[]" value="{{ $main_machine_equipment['machine_country_origin'][$key] }}"></td>
                                    </tr>
                                    <?php $i++; ?>
                                @endforeach
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
                            <input type="radio" name="office_location" value="Yangon" 
                                @if("Yangon" == $contact["office"]["office_location"])
                                  checked
                                @endif
                              >&nbsp;&nbsp;Yangon
                        </div>
                        <div class="form-group col-sm-2">
                            <input type="radio" name="office_location" value="Mandalay" 
                                @if("Mandalay" == $contact["office"]["office_location"])
                                  checked
                                @endif
                              >&nbsp;&nbsp;Mandalay
                        </div>
                        <div class="form-group col-sm-8">
                            <div class="col-sm-1">
                            <input type="radio" name="office_location" value="Other" 
                                    @if("Other" == $contact["office"]["office_location"])
                                      checked 
                                    @endif
                                  >
                            </div>
                            <div class="form-group col-sm-11">
                             {!! Form::text('office_location_other', $contact["office"]["office_location_other"], ['class' => 'form-control', 'placeholder' => 'Other']) !!}
                            </div>
                        </div>
                        <div class="form-group col-sm-12">
                            {!! Form::label('address', 'Address') !!} <span class="text-danger">*</span>
                            {!! Form::text('office_address', $contact['office']['office_address'], ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-sm-6">
                            {!! Form::label('tel', 'TEL') !!} <span class="text-danger">*</span>
                            {!! Form::text('office_tel', $contact['office']['office_tel'], ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-sm-6">
                            {!! Form::label('fax', 'FAX') !!} <span class="text-danger">*</span>
                            {!! Form::text('office_fax', $contact['office']['office_fax'], ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group col-sm-12" style="margin-top: 10px;">
                            <label for="">Plant</label><br/>
                        </div>
                        
                        <div class="form-group col-sm-2">
                            <input type="radio" name="plant_location" value="Yangon" 
                                    @if("Yangon" == $contact["plant"]["plant_location"])
                                      checked
                                    @endif
                                  >&nbsp;&nbsp;Yangon
                        </div>
                        <div class="form-group col-sm-2">
                            <input type="radio" name="plant_location" value="Mandalay" 
                                    @if("Mandalay" == $contact["plant"]["plant_location"])
                                      checked
                                    @endif
                                  >&nbsp;&nbsp;Mandalay
                        </div>
                        <div class="form-group col-sm-8">
                            <div class="col-sm-1">
                            <input type="radio" name="plant_location" value="Other" 
                                    @if("Other" == $contact["plant"]["plant_location"])
                                      checked
                                    @endif
                                  >
                            </div>
                            <div class="form-group col-sm-11">
                             {!! Form::text('plant_location_other', $contact["plant"]["plant_location_other"], ['class' => 'form-control', 'placeholder' => 'Other']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group col-sm-12">
                            {!! Form::label('address', 'Address') !!} <span class="text-danger">*</span>
                            {!! Form::text('plant_address', $contact['plant']['plant_address'], ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-sm-6">
                            {!! Form::label('tel', 'TEL') !!} <span class="text-danger">*</span>
                            {!! Form::text('plant_tel', $contact['plant']['plant_tel'], ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-sm-6">
                            {!! Form::label('fax', 'FAX') !!} <span class="text-danger">*</span>
                            {!! Form::text('plant_fax', $contact['plant']['plant_fax'], ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group col-sm-12" style="margin-top: 10px;">
                            <label for="">Top Management</label><br/>
                        </div>
                        <div class="col-sm-6">
                            {!! Form::label('name', 'Name') !!} <span class="text-danger">*</span>
                            {!! Form::text('repre_name', $contact['representative']['repre_name'], ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-sm-6">
                            {!! Form::label('position', 'Position') !!} <span class="text-danger">*</span>
                            {!! Form::text('repre_tittle', $contact['representative']['repre_tittle'], ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group col-sm-12" style="margin-top: 20px;">
                            <label for="">Person in charge</label><br/>
                        </div>
                        <div class="col-sm-6">
                            {!! Form::label('name', 'Name') !!} <span class="text-danger">*</span>
                            {!! Form::text('pic_name', $contact['pic']['pic_name'], ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-sm-6">
                            {!! Form::label('position', 'Position') !!} <span class="text-danger">*</span>
                            {!! Form::text('pic_title', $contact['pic']['pic_title'], ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-sm-6">
                            {!! Form::label('name', 'TEL') !!} <span class="text-danger">*</span>
                            {!! Form::text('pic_tel', $contact['pic']['pic_tel'], ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-sm-6">
                            {!! Form::label('position', 'Email') !!} <span class="text-danger">*</span>
                            {!! Form::text('pic_email', $contact['pic']['pic_email'], ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group col-sm-12" style="margin-top: 10px;">
                            <label for="">Language</label><br/>
                        </div>
                        
                        <div class="form-group col-sm-2">
                            <input type="radio" name="language" value="English" 
                                    @if("English" == $contact["pic"]["language"])
                                      checked
                                    @endif
                                  >&nbsp;&nbsp;English 
                        </div>
                        <div class="form-group col-sm-2">
                            <input type="radio" name="language" value="Japanese" 
                                    @if("Japanese" == $contact["pic"]["language"])
                                      checked
                                    @endif
                                  >&nbsp;&nbsp;Japanese
                        </div>
                        <div class="form-group col-sm-8">
                            <div class="col-sm-1">
                            <input type="radio" name="language" value="Other" 
                                    @if("Other" == $contact["pic"]["language"])
                                      checked
                                    @endif
                                  >
                            </div>
                            <div class="form-group col-sm-11">
                             {!! Form::text('language_other', $contact["pic"]["language_other"], ['class' => 'form-control', 'placeholder' => 'Other']) !!}
                            </div>
                        </div>

                        <div class="form-group col-sm-12" style="margin-top: 20px;">
                            <label for="">Company Info</label><br/>
                        </div>
                        <div class="col-sm-6">
                            {!! Form::label('name', 'Year of estabishment') !!} <span class="text-danger">*</span>
                            {!! Form::text('year_of_establish', $company_info['estabishment'], ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-sm-6">
                            {!! Form::label('position', 'Num. of Employee') !!} <span class="text-danger">*</span>
                            {!! Form::text('no_employee', $company_info['no_employee'], ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-sm-6">
                            {!! Form::label('name', 'Capital Investment') !!} <span class="text-danger">*</span>
                            {!! Form::text('capital', $company_info['capital'], ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-sm-6">
                            {!! Form::label('position', 'Annual Sales Amount') !!} <span class="text-danger">*</span>
                            {!! Form::text('annual_amount', $company_info['annual_amount'], ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group col-sm-12" style="margin-top: 20px;">
                            <label for="">Production</label><br/>
                        </div>
                        <div class="col-sm-6">
                            {!! Form::label('name', 'Space for Plant') !!} <span class="text-danger">*</span>
                            {!! Form::text('space_for_plant', $production['space_for_plant'], ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-sm-6">
                            {!! Form::label('position', 'Production Capacity') !!} <span class="text-danger">*</span>
                            {!! Form::text('production_capacity', $production['production_capacity'], ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-sm-6">
                            {!! Form::label('name', 'Operation Ratio') !!} <span class="text-danger">*</span>
                            <input type="text" name="operation_ratio" class="form-control" value="{{ $production['operation_ratio'] }}">
                        </div>
                        <div class="col-sm-6">
                            {!! Form::label('position', 'Min Order Quantity') !!} <span class="text-danger">*</span>
                            {!! Form::text('min_order_quantity', $production['operation_ratio'], ['class' => 'form-control']) !!}
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
                            @foreach($low_material['name_of_material'] as $key => $lm)
                            <div class="col-sm-3">
                                {!! Form::text('name_of_material[]', $lm, ['class' => 'form-control']) !!}
                            </div>
                            @endforeach
                        </div>
                        <div class="form-group col-sm-12">
                            <div class="col-sm-3">
                                <label>Supplier Name</label>
                            </div>
                            @foreach($low_material['supplier_name'] as $key => $sn)
                            <div class="col-sm-3">
                              {!! Form::text('supplier_name[]', $sn, ['class' => 'form-control']) !!}
                            </div>
                            @endforeach
                        </div>
                        <div class="form-group col-sm-12">
                            <div class="col-sm-3">
                                <label>Country of Origin</label>
                            </div>
                            @foreach($low_material['country_origin'] as $key => $co)
                            <div class="col-sm-3">
                              {!! Form::text('country_origin[]', $co, ['class' => 'form-control']) !!}
                            </div>
                            @endforeach
                        </div>

                        <div class="form-group col-sm-12" style="margin-top: 10px;">
                            <label>Main customer</label>
                        </div>
                        <div class="form-group col-sm-12">
                            @foreach($main_customer['mani_customer_prefix'] as $prefix)
                            <div class="col-sm-2">
                                {!! Form::text('mani_customer_prefix[]', $prefix, ['class' => 'form-control']) !!}
                            </div>
                            @endforeach
                        </div>
                        <div class="form-group col-sm-12">
                            @foreach($main_customer['main_customer_percent'] as $percent)
                            <div class="col-sm-2">
                                {!! Form::text('main_customer_percent[]', $percent, ['class' => 'form-control']) !!}
                            </div>
                            @endforeach
                        </div>

                        <div class="form-group col-sm-12" style="margin-top: 20px;">
                            <label for="">Certification and Standard</label><br/>
                        </div>
                        <div class="form-group col-sm-12">
                            @foreach($certificate as $c)
                            <div class="form-group col-sm-2">
                                <input type="checkbox" name="certificate[]" value="{{ $c }}"
                                      @if(in_array($c, $cer_standard['certificate']))
                                        checked="" 
                                      @endif
                                    >{{ $c }}&nbsp;&nbsp; &nbsp;&nbsp;
                                  <input type="hidden" name="certificate[]" value="0">
                            </div>
                            @endforeach
                            <span><div class="col-sm-6">
                                {!! Form::text('certificate_other', $cer_standard['certificate_other'], ['class' => 'form-control']) !!}</div>
                            </span>
                        </div>

                        <div class="form-group col-sm-12">
                            @foreach($standard as $s)
                            <div class="form-group col-sm-2">
                                <input type="checkbox" name="standard[]" value="{{ $s }}"
                                      @if(in_array($s, $cer_standard['standard']))
                                        checked="" 
                                      @endif
                                    >{{ $s }}&nbsp;&nbsp; &nbsp;&nbsp;
                                  <input type="hidden" name="standard[]" value="0"> 
                            </div>
                            @endforeach
                            <span><div class="col-sm-12">
                                {!! Form::text('standard_other', $cer_standard['standard_other'], ['class' => 'form-control']) !!}</div>
                            </span>
                        </div>

                        <div class="form-group col-sm-12" style="margin-top: 20px;">
                            <label for="">Export and Import</label><br/>
                        </div>
                        <div class="col-sm-6">
                            {!! Form::label('name', 'Export Country') !!} <span class="text-danger">*</span>
                            {!! Form::text('export_country', $export_impot['export_country'], ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-sm-6">
                            {!! Form::label('position', 'Ex. Items') !!} <span class="text-danger">*</span>
                            {!! Form::text('export_item', $export_impot['export_item'], ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-sm-6">
                            {!! Form::label('name', 'Import Country') !!} <span class="text-danger">*</span>
                            {!! Form::text('import_country', $export_impot['import_country'], ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-sm-6">
                            {!! Form::label('position', 'Im. Items') !!} <span class="text-danger">*</span>
                            {!! Form::text('import_item', $export_impot['import_item'], ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group col-sm-12" style="margin-top: 20px;">
                            {!! Form::label('address', 'Special Notes') !!} <span class="text-danger">*</span>
                            {!! Form::text('special_note', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group col-sm-12" style="margin-top: 20px;">
                            {!! Form::label('strong_point', 'Strong Points') !!} <span class="text-danger">*</span>
                            {!! Form::text('strong_point', null, ['class' => 'form-control']) !!}
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


