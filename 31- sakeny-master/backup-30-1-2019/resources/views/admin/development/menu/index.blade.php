@extends('admin.layouts.app')

@section('title',trans("lang.$module_name")." - ".trans("lang.".end($breadcrumb)))

@push('head')
    {!! Html::style('backend/assets/plugins/nestable/jquery.nestable.css') !!}
@endpush

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
    <!-- PAGE CONTENT WRAPPER -->

            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box table-responsive">
                        <h4 class="m-t-0 header-title"><b>{!!Lang::get("lang.$bread")!!}</b></h4>

                            <div class="custom-dd dd" id="nestable_list_1">
                                 @foreach ($rows as $key => $row)
                                    {!! App\Http\Controllers\Admin\Development\MenuController::menuList($row) !!}
                                 @endforeach
                            </div>




                                  {{--   <li class="dd-item" data-id="2">
                                        <div class="dd-handle">
                                            Item 2
                                        </div>
                                        <ol class="dd-list">

                                            <li class="dd-item" data-id="5">
                                                <div class="dd-handle">
                                                    Item 5
                                                </div>
                                                <ol class="dd-list">
                                                    <li class="dd-item" data-id="6">
                                                        <div class="dd-handle">
                                                            Item 6
                                                        </div>
                                                    </li>
                                                    <li class="dd-item" data-id="7">
                                                        <div class="dd-handle">
                                                            Item 7
                                                        </div>
                                                    </li>
                                                    <li class="dd-item" data-id="8">
                                                        <div class="dd-handle">
                                                            Item 8
                                                        </div>
                                                    </li>
                                                </ol>
                                            </li>
                                            <li class="dd-item" data-id="9">
                                                <div class="dd-handle">
                                                    Item 9
                                                </div>
                                            </li>
                                            <li class="dd-item" data-id="10">
                                                <div class="dd-handle">
                                                    Item 10
                                                </div>
                                            </li>
                                        </ol>
                                    </li> --}}

                    </div>
                </div>
            </div>

@stop


@push('script')
    {!! Html::script('backend/assets/plugins/nestable/jquery.nestable.js') !!}
    {!! Html::script('backend/assets/pages/nestable.js') !!}

    <script type="text/javascript">
        !function($) {
            "use strict";

            var Nestable = function() {};

            Nestable.prototype.updateOutput = function (e) {
                var list = e.length ? e : $(e.target),
                    output = list.data('output');
                if (window.JSON) {
                    output.val(window.JSON.stringify(list.nestable('serialize'))); //, null, 2));
                    console.log(list.nestable('serialize'));
                } else {
                    output.val('JSON browser support required for this demo.');
                }
            },
            //init
            Nestable.prototype.init = function() {
                // activate Nestable for list 1
                $('#nestable_list_1').nestable({
                    group: 1
                }).on('change', this.updateOutput);

                // output initial serialised data
                this.updateOutput($('#nestable_list_1').data('output', $('#nestable_list_1_output')));
            },
            //init
            $.Nestable = new Nestable, $.Nestable.Constructor = Nestable
        }(window.jQuery),

        //initializing
        function($) {
            "use strict";
            $.Nestable.init()
        }(window.jQuery);

    </script>
@endpush
