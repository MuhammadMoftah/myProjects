@extends('admin.master')
@section('body')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                @include('admin.layouts.message')
                <h2 style="margin-bottom: 10px;">
                    Ideas - ({{$ideas->total()}})
                </h2>
                <hr style="width:100%;">
                <a href="" class="btn bg-indigo waves-effect" style="margin: 8px!important;">
                    <i class="material-icons">insert_drive_file</i>
                    <span>Export</span>
                </a>
                <a href="{{route('admin.idea.create.get')}}" class="btn btn-primary waves-effect">
                    <i class="material-icons">add</i>
                    <span>Create</span>
                </a>
                <form style="margin-top:10px;" id="form_advanced_validation" action="">
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="search" id="search" required>
                            <label class="form-label">* Search</label>
                        </div>
                    </div>
                </form>
            </div>
            @if($ideas->count()>0)
            <div class="body table-responsive ideas">
                @include('admin.pages.ideas.ideas_data')
            </div>
            @else
            <div class="alert bg-red">
                no Ideas Available
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
            var url = "{{route('admin.idea')}}";
            var url = url + '?page=' + page + '&keyword=' + keyword;
            $.ajax({
                type: "GET",
                url: url,
                success: function(data) {
                    $('.ideas').html(data);
                }
            });
        }
    });
</script>
<script>
    $('.delete_alert').click(function(e) {
        e.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
                window.location.href = $(this).attr('href');
            }
        });
    });
</script>
@endsection