@extends('admin.layouts.app')

@section('title',trans("lang.$module_name")." - ".trans("lang.".end($breadcrumb)))

@section('content')

    <!-- Page-Title -->
    @section('breadcrumb')
        @foreach ($breadcrumb as $bread)
            @if ($loop->remaining == 1)
                <li><a href="{{ url("$base_view/$route") }}">@lang("lang.$bread")</a></li>
            @elseif($loop->last)
                <li class="active">@lang("lang.$bread")</li>
            @else
                <li>@lang("lang.$bread")</li>
            @endif
        @endforeach
    @stop
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <h4 class="m-t-0 header-title"><b>{!!Lang::get("lang.$bread")!!}</b></h4>
                <div class="clearfix"></div>
                  {!! Form::open(['route'=>ADMIN_PATH.'.admin-permission.store','class'=>'','files'=>true]) !!}
                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    {!! Form::label('title', trans('lang.title')) !!}
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                    <small class="text-danger">{{ $errors->first('title') }}</small>
                </div>
                <hr>
                @foreach ($modules as $module)
                    <div class="col-md-6 ">
                      <div class="panel box box-primary">
                          <div class="box-header with-border">
                            <h4 class="box-title">
                                  <label {{-- data-toggle="collapse" data-parent="#accordion" --}} href="#module-{{$module->id}}">
                                      <input class="module_select icheck" type="checkbox" name="module_id[]" value="{{$module->id}}">
                                      {{$module->title}}
                                  </label>
                            </h4>
                          </div>
                          <div id="module-{{$module->id}}" class="panel-collapse collapse in">
                            <div class="box-body">
                               @foreach ($module->urls()->whereStatus(1)->get() as $url)
                                    <div class="checkbox ">
                                        <label>
                                            <input class="protected_url icheck" parent-id="{{$module->id}}"  type="checkbox" name="url_id[]" value="{{$url->id}}">
                                            {{$url->title}}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                          </div>
                        </div>
                      </div>
                @endforeach
           <button id="submit" class="btn btn-primary btn-block btn-flat">أضافة تصريح</button>
           {!! Form::close() !!}


            </div>
        </div>
    </div>

@endsection


 @push('script')
<script type="text/javascript">
          $(function() {

            $('input.module_select').on('ifChecked', function(event){
              var val = $(this).val();
              $('input[parent-id="'+val+'"]').iCheck('check');
            });

            $('input.module_select').on('ifUnchecked', function(event){
              var val = $(this).val();
              $('input[parent-id="'+val+'"]').iCheck('uncheck');
            });


        });
</script>
@stop

