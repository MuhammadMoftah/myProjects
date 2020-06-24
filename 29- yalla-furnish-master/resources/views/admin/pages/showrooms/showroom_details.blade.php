@extends('admin.master')
@section('styles')
<link href="{{asset('assets/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet" />
@endsection
@section('body')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="body table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Showroom name</th>
                            <td>{{$showroom->name_en}}</td>
                        </tr>
                        <tr>
                            <th>showroom image</th>
                            <td><img src="{{ $showroom->showroom_image }}" width="150px" height="50px" alt=""></td>
                        </tr>
                        <tr>
                            <th>showroom Cover image</th>
                            <td><img src="{{ $showroom->showroom_coverImage }}" width="150px" height="50px" alt=""></td>
                        </tr>
                        <tr>
                            <th>showroom rate</th>
                            <td>{{$showroom->showroom_rate}} From 5</td>
                        </tr>
                        <tr>
                            <th>showroom youtube link</th>
                            <td>{{$showroom->getOriginal('yt')}}</td>
                        </tr>
                        <tr>
                            <th>showroom facebook link</th>
                            <td>{{$showroom->getOriginal('fb')}}</td>
                        </tr>
                        <tr>
                            <th>showroom twitter link</th>
                            <td>{{$showroom->getOriginal('tw')}}</td>
                        </tr>
                        <tr>
                            <th>showroom website link</th>
                            <td>{{$showroom->getOriginal('website')}}</td>
                        </tr>
                        <tr>
                            <th>showroom instgram link</th>
                            <td>{{$showroom->getOriginal('instgram')}}</td>
                        </tr>
                        <tr>
                            <th>about</th>
                            <td>{{$showroom->about}}</td>
                        </tr>
                        <tr>
                            <th>owner</th>
                            <td>{{$showroom->user->name}}</td>
                        </tr>
                        <tr>
                            <th>active</th>
                            <td>{{ $showroom->active == 1?'Active':'DisAcive' }}</td>
                        </tr>
                        <tr>
                            <th>Styles</th>
                            <td>
                                @foreach($showroom->styles as $style)
                                {{$style->name_en}} @if(!$loop->last)-@endif 
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>Categories</th>
                            <td>
                                @foreach($showroom->categories as $category)
                                {{$category->name_en}} @if(!$loop->last)-@endif 
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                                @if($showroom->approve)
                                <th>Showroom Status</th>
                                <td>
                                    @if(!$showroom->active)
                                    <a href="{{route('admin.showroom.status.change',$showroom->id)}}" class="btn btn-success">ON</a>
                                    @endif
                                    @if(!$showroom->active && !$showroom->reason)
                                    <button data-type="prompt" class="btn btn-danger sweetalert">OFF</button>
                                    @endif
                                    @if($showroom->active)
                                    <button data-type="prompt" class="btn btn-danger sweetalert">OFF</button>
                                    @endif
                                </td>
                            </tr>
                            @endif
                            <tr>
                                    <th>Showroom Approval</th>
                                    <td>
                                        @if(!$showroom->approve)
                                        <a href="{{route('admin.showroom.approve.change',$showroom->id)}}" class="btn btn-success">Approve</a>
                                        @endif       
                                        @if($showroom->approve)
                                        <span class="label bg-green">Approved</span>
                                        @endif
                                    </td>
                                </tr>
                        <tr>
                            <th>Branches</th>
                            <td>
                                @foreach($showroom->branches as $branch)
                                {{$branch->address_en}} @if(!$loop->last)|@endif
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>Showroom Created At</th>
                            <td>{{$showroom->created_at}}</td>
                        </tr>
                        <tr>
                            <th>Contact Phone</th>
                            <td>{{$showroom->phone}}</td>
                        </tr>
                        <tr>
                            <th>Contact Name</th>
                            <td>{{$showroom->contact_name}}</td>
                        </tr>
                        <tr>
                            <th>Contact Email</th>
                            <td>{{$showroom->contact_email}}</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<!-- SweetAlert Plugin Js -->
<script src="{{asset('assets/plugins/sweetalert/sweetalert.min.js')}}"></script>
<script src="{{asset('assets/js/dismiss.js')}}"></script>
<script type="text/javascript">
    function showPromptMessage() {
        swal({
            title: "Dismiss showroom",
            text: "Reason for dismiss this showroom",
            type: "input",
            showCancelButton: true,
            closeOnConfirm: false,
            animation: "slide-from-top",
            inputPlaceholder: "Reason"
        }, function(inputValue) {
            if (inputValue === false) return false;
            if ($.trim(inputValue) === "") {
                swal.showInputError("You need to write something!");
                return false
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var showroom = '{{$showroom->id}}';
            var url = "{{route('admin.showroom.dismiss',':showroom')}}".replace(":showroom", showroom);
            $.ajax({
                type: 'POST',
                url: url,
                data: {
                    reason: inputValue
                }
            }).done(function(response) {
                swal("Nice!", "you decline with reason: " + inputValue, "success");
                setTimeout(function() {
                    location.reload();
                }, 1200);
            }).fail(function(error) {
                console.log(error);
                swal("something went wrong", "reason must be less than 250 characters");
            });
        });
    }
</script>
@endsection