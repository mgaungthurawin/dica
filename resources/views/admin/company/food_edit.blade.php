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
                    {!! Form::model($company, ['method' => 'PATCH','route' => ['company.update', $company->id], 'files' => 'true']) !!}
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

                        @include('admin.company.edit_media')

                        <?php
                            $constproduts = json_decode(PRODUCT, TRUE);
                            $existingproducts = json_decode($company->product_string, TRUE);
                        ?>

                        <div class="col-md-12">
                            <label for="description">Main Product</label><br/>
                            @foreach($constproduts as $cp)
                                <div class="form-group col-sm-3">
                                    <select class="form-control" name="product_id[]" id="pro_id_{{$cp}}">
                                        <option value="">Select {{ $cp }} Product</option>
                                        @foreach($products as $key => $product)
                                            <option value="{{ $product->id}}"
                                                @if($product->id == $existingproducts[$cp])
                                                    selected 
                                                @endif
                                                >{{ $product->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endforeach
                        </div>
                        
                        <div class="form-group col-sm-6">
                            <label for="description">Location</label><br/>
                            <select class="form-control" name="location_id[]" id="loc_id" multiple>
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
                            <label for="contact">Contact</label><br/>
                        </div>
                        <div class="form-group col-sm-12">
                            {!! Form::label('url', 'URL') !!} <span class="text-danger">*</span>
                            {!! Form::text('company_url', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group col-sm-12">
                            <label for="">Office</label>
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

                        <div class="form-group col-sm-12" style="margin-top: 20px;">
                            <label for="">Factory</label>
                        </div>
                        
                        <div class="form-group col-sm-12">
                            {!! Form::label('address', 'Address') !!} <span class="text-danger">*</span>
                            {!! Form::text('factory_address', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-sm-6">
                            {!! Form::label('tel', 'TEL') !!} <span class="text-danger">*</span>
                            {!! Form::text('factory_tel', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-sm-6">
                            {!! Form::label('fax', 'FAX') !!} <span class="text-danger">*</span>
                            {!! Form::text('factory_fax', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group col-sm-12" style="margin-top: 20px;">
                            <label for="">MD/CEO</label>
                        </div>
                        <div class="col-sm-6">
                            {!! Form::label('tel', 'Name') !!} <span class="text-danger">*</span>
                            {!! Form::text('md_ceo_name', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-sm-6">
                            {!! Form::label('fax', 'Position') !!} <span class="text-danger">*</span>
                            {!! Form::text('md_ceo_position', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group col-sm-12" style="margin-top: 20px;">
                            <label for="">Production/Factory Manager</label>
                        </div>
                        <div class="col-sm-6">
                            {!! Form::label('tel', 'Name') !!} <span class="text-danger">*</span>
                            {!! Form::text('factory_manager_name', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-sm-6">
                            {!! Form::label('fax', 'Position') !!} <span class="text-danger">*</span>
                            {!! Form::text('factory_manager_position', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group col-sm-12" style="margin-top: 20px;">
                            <label for="">Hygiene Manager</label>
                        </div>
                        <div class="col-sm-6">
                            {!! Form::label('tel', 'Name') !!} <span class="text-danger">*</span>
                            {!! Form::text('hygiene_manager_name', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-sm-6">
                            {!! Form::label('fax', 'Position') !!} <span class="text-danger">*</span>
                            {!! Form::text('hygiene_manager_position', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group col-sm-12" style="margin-top: 20px;">
                            <label for="">Contact Person</label>
                        </div>
                        <div class="col-sm-6">
                            {!! Form::label('tel', 'Name') !!} <span class="text-danger">*</span>
                            {!! Form::text('cp_name', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-sm-6">
                            {!! Form::label('fax', 'Position') !!} <span class="text-danger">*</span>
                            {!! Form::text('cp_position', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-sm-6">
                            {!! Form::label('tel', 'TEL') !!} <span class="text-danger">*</span>
                            {!! Form::text('cp_tel', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-sm-6">
                            {!! Form::label('fax', 'Email') !!} <span class="text-danger">*</span>
                            {!! Form::text('cp_email', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group col-sm-12" style="margin-top: 10px;">
                            <label for="">Foreign Language</label><br/>
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
                            <label for="">Outline</label>
                        </div>
                        <div class="col-sm-4">
                            {!! Form::label('tel', 'Year of foundation') !!} <span class="text-danger">*</span>
                            {!! Form::text('foundation', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-sm-4">
                            {!! Form::label('fax', 'Employees') !!} <span class="text-danger">*</span>
                            {!! Form::text('employee', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-sm-4">
                            {!! Form::label('tel', 'Factory Size') !!} <span class="text-danger">*</span>
                            {!! Form::text('factory_size', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-sm-4">
                            {!! Form::label('tel', 'Capital Stock') !!} <span class="text-danger">*</span>
                            {!! Form::text('capital_stock', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-sm-4">
                            {!! Form::label('fax', 'Annual Sales') !!} <span class="text-danger">*</span>
                            {!! Form::text('annual_sale', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-sm-4">
                            {!! Form::label('tel', 'Production Capacity') !!} <span class="text-danger">*</span>
                            {!! Form::text('production_capacity', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-sm-4">
                            {!! Form::label('tel', 'Primary Materials') !!} <span class="text-danger">*</span>
                            {!! Form::text('primary_meterial', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-sm-4">
                            {!! Form::label('fax', 'Source of Materials') !!} <span class="text-danger">*</span>
                            {!! Form::text('source_meterial', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-sm-4">
                            {!! Form::label('tel', 'Minimum Order') !!} <span class="text-danger">*</span>
                            {!! Form::text('minimum_order', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group col-sm-12" style="margin-top: 20px;">
                            <label>Customers</label>
                        </div>
                        <div class="form-group col-sm-12">
                            @foreach($customer['customer_prefix'] as $prefix)
                            <div class="col-sm-4">
                                {!! Form::text('customer_prefix[]', $prefix, ['class' => 'form-control']) !!}
                            </div>
                            @endforeach
                        </div>
                        <div class="form-group col-sm-12">
                            @foreach($customer['customer_percent'] as $percent)
                            <div class="col-sm-4">
                                {!! Form::text('customer_percent[]', $percent, ['class' => 'form-control']) !!}
                            </div>
                            @endforeach
                        </div>

                        <div class="form-group col-sm-12" style="margin-top: 20px;">
                            <label for="">Certification</label><br/>
                        </div>
                        <div class="form-group col-sm-12">
                            @foreach($certificate as $c)
                            <div class="form-group col-sm-2">
                                <input type="checkbox" name="certificate[]" value="{{ $c }}"
                                    @if(FALSE !== $c)
                                      @if(in_array($c, $select_certificate['certificate']))
                                        checked="" 
                                      @endif
                                    @endif
                                  >
                                {{ $c }} 
                                <input type="hidden" name="certificate[]" value="0">
                            </div>
                            @endforeach
                            <span><div class="col-sm-4">
                                {!! Form::text('certificate_other', $select_certificate['certificate_other'], ['class' => 'form-control']) !!}</div>
                            </span>
                        </div>

                        <div class="col-sm-4">
                            {!! Form::label('tel', 'Number') !!} <span class="text-danger">*</span>
                            {!! Form::text('cer_number', $select_certificate['cer_number'], ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-sm-4">
                            {!! Form::label('fax', 'Acquired Year') !!} <span class="text-danger">*</span>
                            {!! Form::text('cer_acquired_year', $select_certificate['cer_acquired_year'], ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-sm-4">
                            {!! Form::label('tel', 'Specify') !!} <span class="text-danger">*</span>
                            {!! Form::text('cer_sprcify', $select_certificate['cer_sprcify'], ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group col-sm-12" style="margin-top: 20px;">
                            <label for="">Exportation</label><br/>
                        </div>
                        <div class="col-sm-4">
                            {!! Form::label('tel', 'Country Name') !!} <span class="text-danger">*</span>
                            {!! Form::text('expotation_country', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-sm-4">
                            {!! Form::label('fax', 'Product Name') !!} <span class="text-danger">*</span>
                            {!! Form::text('expotation_product', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-sm-4">
                            {!! Form::label('tel', 'USD/year') !!} <span class="text-danger">*</span>
                            {!! Form::text('expotation_year', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group col-sm-12" style="margin-top: 20px;">
                            <label for="">Hygiene</label><br/>
                        </div>
                        @foreach($hygiene[0] as $hg)
                        <div class="form-group col-sm-3">
                            {!! Form::text('hygiene_one[]', $hg, ['class' => 'form-control']) !!}
                        </div>
                        @endforeach

                        @foreach($hygiene[1] as $hg)
                        <div class="form-group col-sm-3">
                            {!! Form::text('hygiene_two[]', $hg, ['class' => 'form-control']) !!}
                        </div>
                        @endforeach

                        <?php $hygienearray=[1,2,3,4]; ?>
                        @for ($i=1; $i < 5; $i++)
                        <div class="col-sm-3">
                            <input type="checkbox" value="{{$i}}" name="hygiene_three[]"
                                          @if(in_array($i, $hygiene['2']))
                                            checked="" 
                                          @endif
                                        >&nbsp; &nbsp; Yes
                            <input type="hidden" name="hygiene_three[]" value="0">
                        </div>
                        @endfor

                        <div class="form-group col-sm-12" style="margin-top: 30px;">
                            <label>Machine Equipments</label>
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
                        </div>

                        <div class="form-group col-sm-12">
                            {!! Form::label('address', 'Remarks') !!} <span class="text-danger">*</span>
                            {!! Form::text('remark', null, ['class' => 'form-control']) !!}
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