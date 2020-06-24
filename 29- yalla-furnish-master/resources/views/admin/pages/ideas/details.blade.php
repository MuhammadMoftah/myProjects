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
                            <th>Idea English name</th>
                            <td>{!!$idea->name_en!!}</td>
                        </tr>
                        <tr>
                            <th>Idea Arabic name</th>
                            <td>{!!$idea->name_ar!!}</td>
                        </tr>
                        <tr>
                            <th>idea image</th>
                            <td><img src="{{ $idea->idea_image }}" width="200px" height="160px" alt=""></td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>
                                @if($idea->active)
                                <button data-type="prompt" class="btn btn-danger sweetalert">Suspend</button>
                                @else
                                <a href="{{ route('admin.idea.change.status',$idea->id) }}" type="button" class="btn bg-green waves-effect waves-float">
                                    Active
                                </a>
                                @endif
                            </td>
                        </tr>
                        {{-- @TODO Update User & Category Links   --}}
                        <tr>
                            <th>Content Creator</th>
                            <td><a href="#">{{$idea->user->fullname}}</a></td>
                        </tr>
                        <tr>
                            <th>Categories</th>
                            <td>
                                @foreach($idea->categories as $category)
                                {{$category->name_en}} @if(!$loop->last)|@endif
                                @endforeach
                            </td>
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
@foreach($idea->paragraphs as $paragraph)
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="body table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Paragraph English title</th>
                            <td>{!!$paragraph->title_en!!}</td>
                        </tr>
                        <tr>
                            <th>Paragraph Arabic title</th>
                            <td>{!!$paragraph->title_ar!!}</td>
                        </tr>
                        <tr>
                            <th>Paragraph English Description</th>
                            <td>{!! $paragraph->description_en !!}</td>
                        </tr>
                        <tr>
                            <th>Paragraph Arabic Description</th>
                            <td>{!! $paragraph->description_ar !!}</td>
                        </tr>
                        @if($paragraph->youtube_link)
                        <tr>
                            <th>Paragraph Youtube Video</th>
                            <td>
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="{{$paragraph->youtube_link}}" allowfullscreen></iframe>
                                </div>
                            </td>
                        </tr>
                        @endif
                        @if($paragraph->getOriginal('image'))
                        <tr>
                            <th>paragraph image</th>
                            <td><img src="{{ $paragraph->image }}" width="200px" height="160px" alt=""></td>
                        </tr>
                        <tr>
                            <th>Position</th>
                            <td>
                                {{$paragraph->position}}
                            </td>
                        </tr>
                        @endif
                        <tr>
                            <th>Status</th>
                            <td>
                                {{$paragraph->active==1?'Active':'Deactive'}}
                            </td>
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
@endforeach
@endsection
@section('scripts')
<script src="{{asset('assets/plugins/sweetalert/sweetalert.min.js')}}"></script>
<script src="{{asset('assets/js/dismiss.js')}}"></script>
<script type="text/javascript">
    function showPromptMessage() {
        swal({
            title: "Suspend Idea",
            text: "Reason for suspend this idea",
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

            var idea = '{{$idea->id}}';
            var url = "{{route('admin.idea.dismiss',':idea')}}".replace(":idea", idea);
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
                swal("something went wrong", "reason must be less than 250 characters");
            });
        });
    }
</script>
@endsection