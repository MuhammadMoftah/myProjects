<div class="panel-body">

	<div class="col-lg-12">

		<!-- for any notes on the form -->

        {{-- <p class="text-muted font-14 m-b-20">
            Parsley is a javascript form validation library. It helps you provide your users with feedback on their form submission before sending it to your server.
        </p> --}}


		<div class="form-group {{ $errors->has('title_ar') ? ' has-error' : '' }} col-md-6">
		    {!! Form::label('title_ar', __('lang.title_ar')) !!}
		    {!! Form::text('title_ar', isset($row->user->title_ar) ? $row->user->title_ar : null, ['class' => 'form-control', 'placeholder' =>  __('lang.title_ar')]) !!}
		</div>

		<div class="form-group {{ $errors->has('title_en') ? ' has-error' : '' }} col-md-6">
		    {!! Form::label('title_en', __('lang.title_en')) !!}
		    {!! Form::text('title_en', null, ['class' => 'form-control', 'placeholder' =>  __('lang.title_en')]) !!}
		    <small class="text-danger">{{ $errors->first('title_en') }}</small>
		</div>
		<div class="clearfix"></div>
		<div class="form-group {{ $errors->has('cover') ? ' has-error' : '' }} col-md-6">
		    {!! Form::label('cover', __('Cover')) !!}
		    {!! Form::file('cover', ['class' => 'form-control', 'placeholder' =>  __('lang.cover')]) !!}
		    <small class="text-danger">{{ $errors->first('cover') }}</small>
		</div>
		<div class="clearfix"></div>

		<div class="form-group {{ $errors->has('description_ar') ? ' has-error' : '' }} col-md-6">
		    {!! Form::label('description_ar', __('lang.description_ar')) !!}
		    {!! Form::textarea('description_ar', null, ['class' => 'form-control', 'placeholder' =>  __('lang.description_ar'), 'rows' => 3]) !!}
		</div>

		<div class="form-group {{ $errors->has('description_en') ? ' has-error' : '' }} col-md-6">
		    {!! Form::label('description_en', __('lang.description_en')) !!}
		    {!! Form::textarea('description_en', null, ['class' => 'form-control', 'placeholder' =>  __('lang.description_en'), 'rows' => 3]) !!}
		</div>

		<div class="clearfix"></div>

		<div class="form-group {{ $errors->has('keywords_ar') ? ' has-error' : '' }} col-md-6">
		    {!! Form::label('keywords_ar', __('lang.keywords_ar')) !!}
		    {!! Form::textarea('keywords_ar', null, ['class' => 'form-control', 'placeholder' =>  __('lang.keywords_ar'), 'rows' => 3]) !!}
		</div>

		<div class="form-group {{ $errors->has('keywords_en') ? ' has-error' : '' }} col-md-6">
		    {!! Form::label('keywords_en', __('lang.keywords_en')) !!}
		    {!! Form::textarea('keywords_en', null, ['class' => 'form-control', 'placeholder' =>  __('lang.keywords_en'), 'rows' => 3]) !!}
		</div>

		<div class="clearfix"></div>
		<hr> <h3> @lang('lang.Contact Info') </h3> <hr>

		<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }} col-md-6">
		    {!! Form::label('email', __('lang.email')) !!}
		    {!! Form::email('email', isset($row->user->email) ? $row->user->email : null, ['class' => 'form-control', 'placeholder' =>  __('lang.email')]) !!}
		    <small class="text-danger">{{ $errors->first('email') }}</small>
		</div>

		<div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }} col-md-6">
		    {!! Form::label('phone', __('lang.phone')) !!}
		    {!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' =>  __('lang.phone')]) !!}
		    <small class="text-danger">{{ $errors->first('phone') }}</small>
		</div>

		<div class="form-group{{ $errors->has('facebook') ? ' has-error' : '' }} col-md-6">
		    {!! Form::label('facebook', 'Facebook') !!}
		    {!! Form::url('facebook', null, ['class' => 'form-control']) !!}
		    <small class="text-danger">{{ $errors->first('facebook') }}</small>
		</div>

		<div class="form-group{{ $errors->has('twitter') ? ' has-error' : '' }} col-md-6">
		    {!! Form::label('twitter', 'twitter') !!}
		    {!! Form::url('twitter', null, ['class' => 'form-control']) !!}
		    <small class="text-danger">{{ $errors->first('twitter') }}</small>
		</div>
		<div class="form-group{{ $errors->has('instgram') ? ' has-error' : '' }} col-md-6">
		    {!! Form::label('instgram', 'instgram') !!}
		    {!! Form::url('instgram', null, ['class' => 'form-control']) !!}
		    <small class="text-danger">{{ $errors->first('instgram') }}</small>
		</div>
		<div class="form-group{{ $errors->has('youtube') ? ' has-error' : '' }} col-md-6">
		    {!! Form::label('youtube', 'youtube') !!}
		    {!! Form::url('youtube', null, ['class' => 'form-control']) !!}
		    <small class="text-danger">{{ $errors->first('youtube') }}</small>
		</div>
		<div class="form-group{{ $errors->has('linkedIn') ? ' has-error' : '' }} col-md-6">
		    {!! Form::label('linkedIn', 'linkedIn') !!}
		    {!! Form::url('linkedIn', null, ['class' => 'form-control']) !!}
		    <small class="text-danger">{{ $errors->first('linkedIn') }}</small>
		</div>
		<div class="clearfix"></div>

	{{-- 	<div class="clearfix"></div>
		<hr> <h3> @lang('lang.Packages Info') </h3> <hr>

		<div class="clearfix"></div> --}}

    </div>

	<div class="form-group text-right m-b-0">
		<button type="submit" class="btn btn-primary waves-effect waves-light btn-style-custom">{{ $submitButton }}</button>
	</div>




</div>

