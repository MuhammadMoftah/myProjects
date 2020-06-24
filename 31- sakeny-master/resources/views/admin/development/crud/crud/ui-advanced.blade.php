<a class="btn btn-primary modal-ui-view-configration-btn" data-toggle="modal" href='#modal-ui-view-configration-btn-1'>Configrations </a>
<div class="modal fade modal-ui-view-configration" id="modal-ui-view-configration-btn-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Ui Advanced configration</h4>
            </div>
            <div class="modal-body">

                <div class="form-group{{ $errors->has('form_input[]') ? ' has-error' : '' }}">
                    {!! Form::label('form_input[]', 'Form input type') !!}
                    {!! Form::select('form_input[]',$form_input_types , null, ['class' => 'form-control', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('form_input[]') }}</small>
                </div>

                <div class="form-group{{ $errors->has('form_input_validation[]') ? ' has-error' : '' }}">
                    {!! Form::label('form_input_validation[]', 'Input validation') !!}
                    {!! Form::text('form_input_validation[]', null, ['class' => 'form-control', 'placeholder' => 'required|mimes:jpeg,png|unique:foobar']) !!}
                    <small class="text-danger">{{ $errors->first('form_input_validation[]') }}</small>
                </div>




                <div class="form-group">
                    <div class="checkbox checkbox-primary">
                        {!! Form::checkbox('show_in_table[]', '1', null, ['id' => 'show_in_table']) !!}
                        <label for="show_in_table">
                            Show in table
                        </label>
                    </div>
                    <small class="text-danger">{{ $errors->first('show_in_table') }}</small>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Save & Close</button>
            </div>
        </div>
    </div>
</div>
