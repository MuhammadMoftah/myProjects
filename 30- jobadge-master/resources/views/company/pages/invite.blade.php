@extends('master')
@section('body')
<!--===== Invite =====-->
<!--===== Invite =====-->
<div class="container-blog-posts">
    <div class="blog-posts-header">
        <div class="container">
            <h2 class="section-title"><span>Invite People</span></h2>
        </div>
    </div>

    <section class="contact">
        <div class="col-md-7 offset-md-3 py-5 ">
            @include('layouts.message')
            @include('layouts.errors')
            <form action="{{route('company.invite.post')}}" method="POST" class="form-row py-5 px-3 border">
                {{ csrf_field() }}
                <div id="emails_form">
                    <div class="form-group col-md-12">
                        <label>Email addresses</label>
                    <input type="email" name="emails[]" class="form-control" aria-describedby="emailHelp" placeholder="Enter email" value="{{old('emails.0')}}">
                    </div>
                </div>

                <div class="form-group col-md-12">
                    <input class="btn btn-primary px-5" type="submit" value="Send">
                    <input class="btn btn-info px-5" type="button" id="add_email" value="Another Email">
                </div>
            </form>
        </div>
    </section>


</div>
@endsection
@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
var i = 1;
    $('#add_email').click(function() {

        
        var input = '<div class="form-group col-md-12">' +
            '<input type="email" name="emails[]" class="form-control" aria-describedby="emailHelp" placeholder="Enter email" value="{{old('emails.i')}}" >' +
            '</div>';
        $('#emails_form').append(input);
        i++;
    });
</script>
@endsection