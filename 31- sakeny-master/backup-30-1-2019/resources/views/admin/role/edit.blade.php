@extends('admin.layouts.app')

@section('title',trans("lang.$module_name")." - ".end($breadcrumb))

@section('content')

    <!-- Page-Title -->
    @section('breadcrumb')
        @foreach ($breadcrumb as $bread)
            @if ($loop->remaining == 1)
                <li><a href="{{ url("$base_view/$route") }}">@lang("lang.$bread")</a></li>
            @elseif($loop->last)
                <li class="active">@lang("$bread")</li>
            @else
                <li>@lang("lang.$bread")</li>
            @endif
        @endforeach
    @stop
     <div class="row">
        <div class="col-sm-12">
        {!! Form:: model($row,['method'=>'PATCH','url' => ["admin/$route",$row->id], 'files'=>true,'class' => 'ajax-form-request']) !!}

            <div class="card-box table-responsive">
                <h4 class="m-t-0 header-title"><b>{!!Lang::get("$bread")!!}</b></h4>
                <div class="clearfix"></div>
                 <div class="panel-body">
                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                        {!! Form::label('title', trans('lang.title')) !!}
                        {!! Form::text('title', null, ['class' => 'form-control']) !!}
                        <small class="text-danger">{{ $errors->first('title') }}</small>
                    </div>
                </div>
            </div>
                        @foreach ($modules as $module)

                            <div class="col-lg-6">
                                <div class="portlet">
                                    <div class="portlet-heading bg-inverse">
                                        <h3 class="portlet-title">
                                            <label class="m-0">
                                                <input {{ in_array($module->id,$row->modules->pluck('id')->toArray()) ? 'checked' : '' }} class="module_select" type="checkbox" name="module_id[]" value="{{$module->id}}">
                                                <span class="text-white">{{$module->title}}</span>
                                            </label>
                                        </h3>
                                        <div class="portlet-widgets">
                                            <a data-toggle="collapse" data-parent="#accordion1" href="#module-{{$module->id}}"><i class="ion-minus-round"></i></a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div id="module-{{$module->id}}" class="panel-collapse collapse in">
                                        <div class="portlet-body">
                                           @foreach ($module->urls()->whereStatus(1)->get() as $url)
                                                <div class="checkbox checkbox-primary ">
                                                    <input id="role-{{ $url->id }}" class="protected_url" {{ in_array($url->id, $row->url()->pluck('url_id')->toArray()) ? 'checked' : '' }} parent-id="{{$module->id}}"  type="checkbox" name="url_id[]" value="{{$url->id}}">
                                                    <label for="role-{{ $url->id }}">
                                                        {{$url->title}}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                </div>
            <div class="clearfix"></div>
             <div class="card-box table-responsive">
                 <div class="panel-body">
                    <button type="submit" class="btn btn-success">@lang('lang.update')</button>
                </div>
            </div>
                    {!! Form::close() !!}
            </div>
        </div>
    </div>

@stop
@push('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.module_select').on('change', function(e){
                $this = $(this)
                $checkboxs = $('[parent-id="'+$this.val()+'"]');
                if ($this.is(':checked')) {
                    $checkboxs.prop('checked',true);
                }
                else {
                    $checkboxs.prop('checked',false);
                }
            });

            $('.protected_url').on('change', function(e){
                $this = $(this)
                $parent = $this.attr('parent-id');

                if ($this.is(':checked')) {
                    $('.module_select[value="'+$parent+'"]').prop('checked',true);
                }
                else {
                    $checkboxs = $('[parent-id="'+$parent+'"]:checked');
                    if ($checkboxs.length == 0) {
                        $('.module_select[value="'+$parent+'"]').prop('checked',false);
                    }
                }
            });
        });
    </script>
@endpush

