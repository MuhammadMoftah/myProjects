@extends('admin.layouts.app')

@section('title',trans("lang.$module_name")." - ".end($breadcrumb))
@push('head')
    <link href="{{ url('backend') }}/assets/plugins/codemirror/css/codemirror.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('backend') }}/assets/plugins/codemirror/css/ambiance.css" rel="stylesheet" type="text/css" />
@endpush
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
            <div class="card-box table-responsive">
                <h4 class="m-t-0 header-title"><b>{!!Lang::get("$bread")!!}</b></h4>
                <div class="clearfix"></div>
                    {!! Form::model($row,['method'=>'POST','url' => [ADMIN_PATH."/$route",$row->id], 'files'=>true,'class' => 'ajax-form-request']) !!}

                        <div class="panel-body">
                            <div class="form-group{{ $errors->has('lang') ? ' has-error' : '' }}">
                                {!! Form::label('lang', 'Translation file') !!}
                                {!! Form::textarea('lang', null, ['id' => 'code2']) !!}
                                <p class="help-block">Format :
                                    $translations = [
                                        'key1'=>'val1',
                                        'key2'=>'val2',
                                    ]
                                </p>
                            </div>
                            <div class="radio radio-primary">
                                {!! Form::radio('option',1,  1,['id'=>'option1']) !!}
                                <label for="option1">
                                    Skip Duplication!
                                </label>
                            </div>
                            <div class="radio radio-primary">
                                {!! Form::radio('option',2,  null,['id'=>'option2']) !!}
                                <label for="option2">
                                    Overide if key exist!
                                </label>
                            </div>


                            <button type="submit" class="btn btn-primary">Merge</button>
                        </div>
                    {!! Form::close() !!}
            </div>
        </div>
    </div>

@stop

@push('script')
    <!-- Code mirror js -->
    <script src="{{ url('backend') }}/assets/plugins/codemirror/js/codemirror.js"></script>
    <script src="{{ url('backend') }}/assets/plugins/codemirror/js/formatting.js"></script>
    <script src="{{ url('backend') }}/assets/plugins/codemirror/js/xml.js"></script>
    {{-- <script src="{{ url('backend') }}/assets/pages/jquery.codemirror.init.js"></script> --}}

    <script type="text/javascript">
        $(document).ready(function() {
              //example 2
            CodeMirror.fromTextArea(document.getElementById("code2"), {
                mode: {name: "php"},
                lineNumbers: true,
                theme: 'ambiance',
                indentUnit:4,
                smartIndent:true,
                indentWithTabs:true,
                // specialChars:true,
                showCursorWhenSelecting:true,
                // lineWiseCopyCut:true,
                pasteLinesPerSelection:true
            });
        });
    </script>
@endpush
