<a class="btn btn-primary modal-database-configration-btn" data-toggle="modal" href='#modal-database-configration-btn-1'>Configrations </a>
<div class="modal fade modal-database-configration" id="modal-database-configration-btn-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Database Advanced configration</h4>
            </div>
            <div class="modal-body">
                <div class="form-group{{ $errors->has('type[]') ? ' has-error' : '' }}">
                    {!! Form::label('type[]', 'Type') !!}
                    {!! Form::select('type[]',$data_type_lists , null, ['class' => 'form-control', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('type[]') }}</small>
                </div>
                <div class="form-group{{ $errors->has('length[]') ? ' has-error' : '' }}">
                    {!! Form::label('length[]', 'Length') !!}
                    {!! Form::number('length[]', null, ['class' => 'form-control']) !!}
                    <small class="text-danger">{{ $errors->first('length[]') }}</small>
                </div>
                <div class="form-group{{ $errors->has('default_value[]') ? ' has-error' : '' }}">
                    {!! Form::label('default_value[]', 'Default Value') !!}
                    {!! Form::text('default_value[]', null, ['class' => 'form-control', 'required' => 'required','placeholder'=>'Default: Nullable']) !!}
                    <small class="text-danger">{{ $errors->first('default_value[]') }}</small>
                </div>
                <div class="form-group{{ $errors->has('attributes[]') ? ' has-error' : '' }}">
                    {!! Form::label('attributes[]', 'Attributes') !!}
                    {!! Form::select('attributes[]', $database_attributes, null, ['id' => 'attributes[]', 'class' => 'form-control', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('attributes[]') }}</small>
                </div>

                <div class="form-group">
                    <div class="checkbox checkbox-primary">
                        {!! Form::checkbox('relationable[]', '1', null, ['id' => 'relationable']) !!}
                        <label for="relationable">
                            Has Relation
                        </label>
                    </div>
                    <small class="text-danger">{{ $errors->first('relationable') }}</small>
                </div>
                <div class="relation-section hidden">
                    <div class="form-group{{ $errors->has('related_table[]') ? ' has-error' : '' }} col-md-6">
                        {!! Form::label('related_table[]', 'Related table') !!}
                        {!! Form::select('related_table[]',$databsae_table_lists , null, ['id' => 'related_table[]', 'class' => 'form-control']) !!}
                        <small class="text-danger">{{ $errors->first('related_table[]') }}</small>
                    </div>

                    <div class="form-group{{ $errors->has('references_column[]') ? ' has-error' : '' }} col-md-6">
                        {!! Form::label('references_column[]', 'References') !!}
                        {!! Form::text('references_column[]', 'id', ['class' => 'form-control', 'readonly' => 'readonly']) !!}
                        <small class="text-danger">{{ $errors->first('references_column[]') }}</small>
                    </div>

                    <div class="form-group{{ $errors->has('onUpdate[]') ? ' has-error' : '' }} col-md-6">
                        {!! Form::label('onUpdate[]', 'onUpdate') !!}
                        {!! Form::select('onUpdate[]', $databsae_relations_attributes_lists, null, ['id' => 'onUpdate[]', 'class' => 'form-control', 'required' => 'required']) !!}
                        <small class="text-danger">{{ $errors->first('onUpdate[]') }}</small>
                    </div>
                    <div class="form-group{{ $errors->has('onDelete[]') ? ' has-error' : '' }} col-md-6">
                        {!! Form::label('onDelete[]', 'onDelete') !!}
                        {!! Form::select('onDelete[]', $databsae_relations_attributes_lists, null, ['id' => 'onDelete[]', 'class' => 'form-control', 'required' => 'required']) !!}
                        <small class="text-danger">{{ $errors->first('onDelete[]') }}</small>
                    </div>



                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Save & Close</button>
            </div>
        </div>
    </div>
</div>
