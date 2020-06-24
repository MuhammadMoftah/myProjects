@extends('admin.master')
@section('body')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                @include('admin.layouts.message')
                <h2 style="margin-bottom: 10px;">
                    Users - ({{$users->total()}})
                </h2>
                 <a href="" class="btn btn-primary waves-effect ">
                    <i class="material-icons">add</i>
                    <span>Create</span>   
                </a>
                
                <div class="form-group form-float" style="margin-top:50px;">
                    <div class="form-line">
                        <input type="text" id="search" class="form-control" name="search" required>
                        <label class="form-label">* Search</label>
                    </div>
                </div>
            </div>
            @if(count($users)>0)
            <div class="body table-responsive users">
                @include('admin.pages.users.users_data')
            </div>
            @else
            <div class="alert bg-red">
                no users found
            </div>
            @endif
        </div>
    </div>
</div>
<!-- #END# Bordered Table -->
@endsection
@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {

        var keyword = '';

        $(document).on('keyup', '#search', function(e) {
            keyword = $.trim($('#search').val());
            fetch_data(1);
        });

        $(document).on('click', '.pagination a', function(e) {
            e.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            fetch_data(page);
        });

        function fetch_data(page) {
            var url = "{{route('admin.users.get')}}";
            var url = url + '?search=' + keyword + '&page=' + page;
            $.ajax({
                type: "GET",
                url: url,
                success: function(data) {
                    $('.users').html(data);
                }
            });
        }
    });
</script>
@endsection