@extends('admin.master')
@section('styles')
 <style>
     .no-seen{
        background-color: #f98585;
        color: #fff;
     }
  </style>   
@endsection
@section('body')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                @include('admin.layouts.message')
                @include('admin.layouts.errors')
                <h2 style="margin-bottom: 10px;">
                    <span> <a href="{{route('admin.blogs.index')}}">blogs</a>  </span>/ comments report
                </h2>
                {{-- <a href="{{route('admin.reports.create')}}" class="btn btn-primary waves-effect">
                    <i class="material-icons">add</i>
                    <span>Create</span>
                </a> --}}
                
                
            </div>
            @if(count($reports)>0)
            <div class="body table-responsive">
                <table class="table table-bordered">
                    <thead> 
                        <tr>
                            <th>comment</th>
                            <th>Report</th>
                            <th>User</th>
                            <th>Created At</th>
                            <th>Actions</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reports as $report)
                        <tr class="@if($report->is_seen == 0 ) no-seen @endif ">
                           
                            <td>{{ str_limit($report->comment->body, $limit = 100, $end = '...') }}</td>
                            <td>{{ str_limit($report->body, $limit = 100, $end = '...') }}</td>
                           
                            
                            <td> 
                               
                                @if($report->comment_report_type == "App\User")
                                    <span>user - </span> {{$report->commentReport->full_name}}
                                @else
                                    <span>company - </span> {{$report->commentReport->name}}
                                @endif
                            </td>
                         
                            <td>{{$report->created_at}}</td>
                            <td>
                                <a href="{{route('admin.blogs.report.show',$report->id)}}" type="button" class="btn bg-green btn-circle waves-effect waves-circle waves-float">
                                    <i class="material-icons">visibility</i>
                                </a>
                                {{-- <a href="{{route('admin.reports.edit',$report->id)}}" type="button" class="btn bg-blue btn-circle waves-effect waves-circle waves-float">
                                    <i class="material-icons">edit</i>
                                </a>
                                <a href="{{route('admin.reports.delete',$report->id)}}" data-message="Are you sure  ? " data-form="#delted-form" type="button" class="btn bg-red btn-circle confirm-delte  waves-effect waves-circle waves-float">
                                    <i class="material-icons">delete</i>
                                </a> --}}
                                <a href="{{route('admin.blogs.report.delete',$report->id)}}" data-message="Are you sure  ? " data-form="#delted-form" type="button" class="btn bg-red btn-circle confirm-delte  waves-effect waves-circle waves-float">
                                    <i class="material-icons">delete</i>
                                </a>
                            </td>
                           
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div style="text-align:center;">
                    {{ $reports->appends(getRequestBetweenPages())->render() }}
                </div>
            </div>
            @else
            <div class="alert bg-red">
                no reports found
            </div>
            @endif
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