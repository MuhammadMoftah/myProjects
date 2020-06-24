{!! Form::open(['method' => 'DELETE', 'url' => [ADMIN_PATH."/$route",$row->id], 'style' => 'display:inline']) !!}
        {!! Form::hidden('id', $row->id) !!}
        <button type="submit" class="btn btn-icon btn-danger waves-effect  waves-light" onclick="return confirm('Confirm Delete operation ?');"> <i class="icon-trash"></i> </button>
{!! Form::close() !!}

<a class="btn btn-default" data-toggle="modal" href='#modal-{{ $row->id }}'> <i class="icon-eye"></i> </a>
<div class="modal fade" id="modal-{{ $row->id }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">{{ $row->name }} - #{{ $row->id }}</h4>
            </div>
            <div class="modal-body">
                {{ $row->message }}
                <div class="clearfix"></div>
                {!! Form::open(['method' => 'POST', 'action' => 'Admin\ContactUsController@postReply']) !!}
                <div class="clearfix"></div>
                <div class="clearfix"></div>

                    <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }} col-md-12">
                        {!! Form::label('subject', 'Subject') !!}
                        <br>
                        {!! Form::text('subject', null, ['class' => 'form-control col-md-12', 'required' => 'required','style'=>'width:100%']) !!}
                        <small class="text-danger">{{ $errors->first('subject') }}</small>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} col-md-12">
                        {!! Form::label('email', 'Email address') !!}
                        <br>
                        {!! Form::email('email',$row->email, ['class' => 'form-control col-md-12', 'required' => 'required','style'=>'width:100%','readonly'=>'readonly']) !!}
                        <small class="text-danger">{{ $errors->first('email') }}</small>
                    </div>

                    <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }} col-md-12">
                        {!! Form::label('message', 'Message') !!}
                        <br>
                        {!! Form::textarea('message', null, ['class' => 'form-control col-md-12', 'required' => 'required','style'=>'width:100%']) !!}
                        <small class="text-danger">{{ $errors->first('message') }}</small>
                    </div>

                    <div class="btn-group ">
                        <button class='btn pull-right btn-primary btn-block waves-effect waves-light' type="submit">Send</button>
                    </div>

                {!! Form::close() !!}
                <div class="clearfix"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
