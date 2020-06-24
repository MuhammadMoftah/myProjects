@extends('admin.master')
@section('body')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                @include('admin.layouts.message')
                @include('admin.layouts.errors')
                <h2 style="margin-bottom: 10px;">
                    blogs
                </h2>
                <a href="{{route('admin.blogs.create')}}" class="btn btn-primary waves-effect">
                    <i class="material-icons">add</i>
                    <span>Create</span>
                </a>
                
                <a href="{{route('admin.blogs.report.index')}}" class="btn btn-primary waves-effect">
                    <i class="material-icons">report</i>
                    <span>comments reports</span>
                    <span class="label label-danger">{{$report_count}}</span>
                </a>

                <form style="margin-top:40px;" id="form_advanced_validation" action="{{route('admin.blogs.search')}}">
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="search" required>
                            <label class="form-label">* Search</label>
                        </div>
                    </div>
                </form>
            </div>
            @if(count($blogs)>0)
            <div class="body table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Body</th>
                            <th>Actions</th>
                            <th>Comment</th>
                            <th>Like</th>
                            <th>View</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($blogs as $blog)
                        <tr>
                           
                            <td>{{$blog->title}}</td>
                            <td>{{ str_limit($blog->body, $limit = 100, $end = '...') }}</td>
                            <td>
                                {{-- <a href="{{route('admin.jobs.view',$blog->id)}}" type="button" class="btn bg-green btn-circle waves-effect waves-circle waves-float">
                                    <i class="material-icons">visibility</i>
                                </a> --}}
                                <a href="{{route('admin.blogs.edit',$blog->id)}}" type="button" class="btn bg-blue btn-circle waves-effect waves-circle waves-float">
                                    <i class="material-icons">edit</i>
                                </a>
                                <a href="{{route('admin.blogs.delete',$blog->id)}}" data-message="Are you sure  ? " data-form="#delted-form" type="button" class="btn bg-red btn-circle confirm-delte  waves-effect waves-circle waves-float">
                                    <i class="material-icons">delete</i>
                                </a>
                            </td>
                            
                            <td>{{$blog->comments_count}}</td>
                            <td>{{$blog->likes_count}}</td>
                            <td>{{$blog->views}}</td>
                            <td>{{$blog->created_at}}</td>
                           
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div style="text-align:center;">
                    {{ $blogs->appends(getRequestBetweenPages())->render() }}
                </div>
            </div>
            @else
            <div class="alert bg-red">
                no blogs found
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