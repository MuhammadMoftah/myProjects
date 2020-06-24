@extends('admin.master')
@section('body')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                @include('admin.layouts.message')
                <h2 style="margin-bottom: 10px;">
                    Roles
                </h2>
                <a href="{{route('admin.role.create.get')}}" class="btn btn-primary waves-effect">
                    <i class="material-icons">add</i>
                    <span>Create</span>
                </a>
                {{--<form style="margin-top:10px;" id="form_advanced_validation" action="{{route('admin.categories.search')}}">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" class="form-control" name="search" required>
                        <label class="form-label">* Search</label>
                    </div>
                </div>
                </form>--}}
            </div>
            @if(count($roles)>0)
            <div class="body table-responsive admins">
                @include('admin.pages.roles.roles_data')
            </div>
            @else
            <div class="alert bg-red">
                no roles found
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
            category = $.trim(category);
            by_following = $.trim(by_following);
            fetch_data(1);
        });

        $(document).on('click', '.pagination a', function(e) {
            e.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            fetch_data(page);
        });

        function fetch_data(page) {
            var url = "{{route('admin.roles.get')}}";
            var url = url + '?page=' + page;
            $.ajax({
                type: "GET",
                url: url,
                success: function(data) {
                    $('.roles').html(data);
                }
            });
        }
    });
</script>
@endsection