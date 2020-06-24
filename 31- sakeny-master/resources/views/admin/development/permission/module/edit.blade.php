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
            <div class="card-box table-responsive">
                <h4 class="m-t-0 header-title"><b>{!!Lang::get("$bread")!!}</b></h4>
                <div class="clearfix"></div>
	                {!! Form:: model($row,['method'=>'PATCH','url' => [ADMIN_PATH."/$route",$row->id], 'files'=>true,'class' => 'ajax-form-request']) !!}
	                    <div class="panel-body">
                        @foreach ($inputs as $input)
                            @if (in_array($input['type'], ['text','textarea','email']))

                                <div class="form-group{{ $errors->has($input['name']) ? ' has-error' : '' }} {{ @$input['wrap_class'] }}">
                                    {!! Form::label($input['name'], $input['label']) !!}
                                    {!! Form::$input['type']($input['name'], $input['value'], $input['options']) !!}
                                    <small class="text-danger">{{ $errors->first($input['name']) }}</small>
                                </div>

                            @elseif ($input['type'] == 'password')

                                <div class="form-group{{ $errors->has($input['name']) ? ' has-error' : '' }} {{ @$input['wrap_class'] }}">
                                    {!! Form::label($input['name'], $input['label']) !!}
                                    {!! Form::password($input['name'], $input['options']) !!}
                                    <small class="text-danger">{{ $errors->first($input['name']) }}</small>
                                </div>
                            @elseif($input['type'] == 'file')
                                <div class="form-group{{ $errors->has($input['name']) ? ' has-error' : '' }} {{ @$input['wrap_class'] }}">
                                    {!! Form::label($input['name'], $input['label'],['class'=>'control-label']) !!}
                                    {!! Form::file($input['name'], $input['options']) !!}
                                    <small class="text-danger">{{ $errors->first($input['name']) }}</small>
                                </div>



                            @elseif($input['type'] == 'select')
                                <div class="form-group{{ $errors->has($input['name']) ? ' has-error' : '' }} {{ @$input['wrap_class'] }}">
                                    {!! Form::label($input['name'], $input['label']) !!}
                                    {!! Form::select($input['name'], $input['select_options'], $input['value'], $input['options']) !!}
                                    <small class="text-danger">{{ $errors->first($input['name']) }}</small>
                                </div>

                            @elseif(in_array($input['type'],['checkbox','radio']))
                                {!! Form::label('', $input['label']) !!}
                                <div class="clearfix"></div>
                                @foreach ($input['select_options'] as $key => $value)
                                    <div class="{{ $input['type'] }} {{ $input['type'] }}-primary col-md-3">
                                        {!! Form::$input['type']($input['name'], $key, @$value[1], array_merge(['id'=>$input['name'].'_'.$key],$input['options'])) !!}
                                        {!! Form::label(@$input['options']['id'] ? $input['options']['id'] :  $input['name'].'_'.$key, $value[0]) !!}
                                    </div>
                                @endforeach
                                <div class="clearfix"></div>
                            @elseif($input['type'] == 'custom')
                                {!! $input['input'] !!}
                            @else

                                <div class="form-group{{ $errors->has($input['name']) ? ' has-error' : '' }} {{ @$input['wrap_class'] }}">
                                    {!! Form::label($input['name'], $input['label']) !!}
                                    {!! Form::input($input['type'],$input['name'], $input['value'], $input['options']) !!}
                                    <small class="text-danger">{{ $errors->first($input['name']) }}</small>
                                </div>

                            @endif
                        @endforeach


                    <hr>
                    <h3>Actions</h3>
                    <div class="table-responsive">
                        <table id="actions" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Action</th>
                                    <th>Method</th>
                                    <th>Element</th>
                                    <th>Linked to </th>
                                    <th>Status</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($row->actions as $url)
                                <tr>
                                    <td>
                                        {!! Form::hidden('action[id][]', $url->id) !!}
                                        {!! Form::text('action[title][]', $url->title, ['class'=>'form-control']) !!}
                                    </td>
                                    <td>{!! Form::text('action[action][]', $url->action, ['class'=>'form-control']) !!}</td>
                                    <td>
                                        {!! Form::select('action[method][]',
                                        ['GET'=>'GET','POST'=>'POST','PUT'=>'PUT','PATCH'=>'PATCH','DELETE'=>'DELETE']
                                            ,$url->method, ['class'=>'form-control']) !!}
                                    </td>
                                    <td>
                                        {!! Form::select('action[element][]',
                                            ['a'=>'a','form'=>'form','button'=>'button'],
                                                $url->element, ['class'=>'form-control']) !!}
                                     </td>
                                    <td>
                                        {!! Form::select('action[linked_to][]',[''=>'Not Linked']+$actions_lists, $url->linked_to, ['class'=>'form-control', 'placeholder'=>'Link with an action']) !!}
                                    </td>
                                    <td>{!! Form::select('action[status][]', [1=>'Active', 0=>'Deactive'], $url->status, ['class'=>'form-control']) !!}</td>
                                    <td>
                                        <a data-toggle="delete-row" href="{{ action('Admin\Development\Permission\ProtectedUrlController@destroy',$url->id) }}" data-method="DELETE" data-message="Are you sure to delete this ?" class="btn btn-danger"> <i class="fa fa-trash remove" ></i> </a>
                                    </td>
                                </tr>
                            @endforeach



                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2">
                                        {!! Form::select('', [0=>'Regular', 1=>'Resource'], null, ['class' => 'form-control','id'=>'action_type']) !!}
                                    </td>
                                    <td colspan="2">
                                        {!! Form::text('', null, ['class' => 'form-control','placeholder'=>'Admin\ActionController@method','id'=>'action_method']) !!}
                                    </td>
                                    <td colspan="2">
                                            <button id="add_action" type="button" class="btn btn-primary"><i class="fa fa-plus"></i></button>
                                     </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                        <button type="submit" class="btn btn-success">@lang('lang.update')</button>

                    </div>
	                {!! Form::close() !!}
            </div>
        </div>
    </div>


 <table>
    <tr id="cloningTr" class="hide">
        <td>{!! Form::text('action[title][]', null, ['class'=>'form-control']) !!}</td>
        <td>{!! Form::text('action[action][]', null, ['class'=>'form-control']) !!}</td>
        <td>{!! Form::select('action[method][]', ['GET'=>'GET','POST'=>'POST','PUT'=>'PUT','PATCH'=>'PATCH','DELETE'=>'DELETE'],null, ['class'=>'form-control']) !!}</td>
        <td>
             {!! Form::select('action[element][]',
            ['a'=>'a','form'=>'form','button'=>'button'],
                null, ['class'=>'form-control']) !!}
        </td>
        <td>{!! Form::text('action[linked_to][]', null, ['class'=>'form-control']) !!}</td>
        <td>{!! Form::select('action[status][]', [1=>'Active', 0=>'Deactive'], null, ['class'=>'form-control']) !!}</td>
        <td><a href="javascript:void(0)" class="btn btn-danger"> <i class="fa fa-trash remove" ></i> </a></td>
    </tr>
</table>

@stop
@push('script')
    <script type="text/javascript">
        $(document).ready(function() {

            $('#add_action').on('click', function(e){
                $action = $('#action_method').val();

                if ($action == '')
                    return false;

                $action_type = $('#action_type').val();

                if ($action_type == 0) {
                    $item = $('#cloningTr').clone();
                    $item.removeAttr('class');
                    $item.removeAttr('id');
                    $item.find('[name="action[title][]"]')
                    $item.find('[name="action[action][]"]').val($action)
                    $item.find('[name="action[method][]"]')
                    $item.find('[name="action[element][]"]')
                    $item.find('[name="action[linked_to][]"]')
                    $('#actions tbody').append($item);
                }
                else
                {
                    // index
                    $item = $('#cloningTr').clone();
                    $item.removeAttr('class');
                    $item.removeAttr('id');
                    $item.find('[name="action[title][]"]').val('Index')
                    $item.find('[name="action[action][]"]').val($action + '@index')
                    $item.find('[name="action[method][]"]')
                    $item.find('[name="action[element][]"]')
                    $item.find('[name="action[linked_to][]"]')
                    $('#actions tbody').append($item);

                    // create
                    $item = $('#cloningTr').clone();
                    $item.removeAttr('class');
                    $item.removeAttr('id');
                    $item.find('[name="action[title][]"]').val('Create')
                    $item.find('[name="action[action][]"]').val($action + '@create')
                    $item.find('[name="action[method][]"]')
                    $item.find('[name="action[element][]"]')
                    $item.find('[name="action[linked_to][]"]')
                    $('#actions tbody').append($item);

                    // store
                    $item = $('#cloningTr').clone();
                    $item.removeAttr('class');
                    $item.removeAttr('id');
                    $item.find('[name="action[title][]"]').val('Store')
                    $item.find('[name="action[action][]"]').val($action + '@store')
                    $item.find('[name="action[method][]"]').find('option[value="POST"]').attr('selected', 'selected')
                    $item.find('[name="action[element][]"]').find('option[value="form"]').attr('selected', 'selected')
                    $item.find('[name="action[linked_to][]"]').val(1)
                    $('#actions tbody').append($item);

                    // show
                    $item = $('#cloningTr').clone();
                    $item.removeAttr('class');
                    $item.removeAttr('id');
                    $item.find('[name="action[title][]"]').val('Show')
                    $item.find('[name="action[action][]"]').val($action + "@@show")
                    $item.find('[name="action[method][]"]')
                    $item.find('[name="action[element][]"]')
                    $item.find('[name="action[linked_to][]"]')
                    $('#actions tbody').append($item);

                    // edit
                    $item = $('#cloningTr').clone();
                    $item.removeAttr('class');
                    $item.removeAttr('id');
                    $item.find('[name="action[title][]"]').val('Edit')
                    $item.find('[name="action[action][]"]').val($action + '@edit')
                    $item.find('[name="action[method][]"]')
                    $item.find('[name="action[element][]"]')
                    $item.find('[name="action[linked_to][]"]')
                    $('#actions tbody').append($item);

                    // update
                    $item = $('#cloningTr').clone();
                    $item.removeAttr('class');
                    $item.removeAttr('id');
                    $item.find('[name="action[title][]"]').val('Update')
                    $item.find('[name="action[action][]"]').val($action + '@update')
                    $item.find('[name="action[method][]"]').find('option[value="PATCH"]').attr('selected', 'selected')
                    $item.find('[name="action[element][]"]').find('option[value="form"]').attr('selected', 'selected')
                    $item.find('[name="action[linked_to][]"]').val(1)
                    $('#actions tbody').append($item);

                    // destroy
                    $item = $('#cloningTr').clone();
                    $item.removeAttr('class');
                    $item.removeAttr('id');
                    $item.find('[name="action[title][]"]').val('Destroy')
                    $item.find('[name="action[action][]"]').val($action + '@destroy')
                    $item.find('[name="action[method][]"]').find('option[value="DELETE"]').attr('selected', 'selected')
                    $item.find('[name="action[element][]"]').find('option[value="form"]').attr('selected', 'selected')
                    $item.find('[name="action[linked_to][]"]')
                    $('#actions tbody').append($item);
                }
                $('#action_method').val('');

            });

            $('#action_type').on('change', function(e){
                $val = $(this).val();

                if ($val == 0) {
                    $('#action_method').prop('placeholder','Admin\ActionController@method')
                }
                else
                {
                    $('#action_method').prop('placeholder','Admin\ActionController')
                }
            });

            $(document).on('click','.remove',function(e){
                $(this).parent().parent().parent().remove();
            });



        });

    </script>


@endpush
