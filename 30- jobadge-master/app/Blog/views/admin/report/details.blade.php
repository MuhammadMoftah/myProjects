@extends('admin.master')
@section('body')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                @include('admin.layouts.message')
                @include('admin.layouts.errors')
                <h2 style="margin-bottom: 10px;">
                <span> <a href="{{route('admin.blogs.index')}}">blogs</a>  </span> / <a href="{{route('admin.blogs.report.index')}}">comments report</a> / details
                </h2>
               
                
                
            </div>

            <div style="padding:30px;">
                
                <div class="card-body">
                    <div class="row">
                        
                        <div class="col-md-6">
                                <h3>Report By</h3>
                                @if($report->comment_report_type == "App\User")
                                    <p>name  : {{$report->commentReport->full_name}} </p>
                                    <p>type  : user</p>
                                @else
                                    <p>name  :  {{$report->commentReport->full_name}} </p>
                                    
                                    <p>type  : company</p>
                                @endif
                        </div>

                        <div class="col-md-6">
                            <h3>Comment</h3>
                            <div>
                                <p> 
                                    {{ $report->comment->body}}
                                
                                </p>
                                <span>
                                   by  : 
                                </span> 
                                        @if($report->comment->comment_type == "App\User")
                                            <span>user - </span> {{$report->comment->comment->full_name}}
                                        @else
                                            <span>company - </span> {{$report->comment->comment->name}}
                                        @endif
                                    
            
                            </div>

                            <div style="margin-top: 15px;">
                                @if($report->comment->is_active == 0)    
                                <a href="{{route('admin.blogs.comments.toggle', $report->comment->id)}}" class="btn btn-info">Active</a>
                                @else
                                <a href="{{route('admin.blogs.comments.toggle', $report->comment->id)}}" class="btn btn-danger">Deactive</a>
                                @endif
                        
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Report </h3>
                            <p class="">{{$report->body}}</p>
                        </div>

                        <div class="col-md-12 " style="padding-bottom: 20px">
                             <a href="{{route('admin.blogs.report.delete',$report->id)}}" data-message="Are you sure  ? " data-form="#delted-form" type="button" class="btn btn-danger  confirm-delte    ">
                                Delete
                             </a>
                             <a  class="btn btn-info" href="{{route('admin.blogs.report.index')}}">Reports </a>
                        </div>
                        

                    </div>
                </div>
            </div>
           
        </div>
    </div>
</div>


<form method="POST" id="delted-form" action=" " style="display: none">
    @csrf

</form>

<!-- #END# Bordered Table -->
@endsection
@section('scripts')
<!-- Validation Plugin Js -->
<script src="{{asset('assets/plugins/jquery-validation/jquery.validate.js')}}"></script>
<script src="{{asset('assets/js/pages/forms/form-validation.js')}}"></script>

<script>
    $(".confirm-delte").click(function(e){
              e.preventDefault();
              var _elm = $(this);
              $msg  = _elm.data("message")
              let x = confirm($msg)
              if(x){
                  var _form = $(_elm.data("form") );
                  _form.prop('action', _elm.attr("href"))
                  _form.submit();
              }


     })   
</script>
@endsection 