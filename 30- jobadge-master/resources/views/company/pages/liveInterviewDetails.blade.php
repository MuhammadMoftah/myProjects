@extends('master')
@section('styles')
<!-- Bootstrap Material Datetime Picker Css -->
<link href="{{asset('assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}" rel="stylesheet" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
@endsection
@section('body')
<!--===== Interview Type =====-->
<!--===== Interview Type =====-->
<div class="container-blog-posts">
    <div class="blog-posts-header">
        <div class="container">
            <h2>  <i class="fas fa-user-friends pb-3"></i> Interview Details </h2>
            <table class="table">
                <tr>
                    <th>Status</th>
                    <th>From</th>
                    <th>To</th>
                    @if($live->isExpire() && $live->declined == 1 )
                        <th>declined comment</th>
                    @endif
                </tr>
                <tr>
                    <td>
                        @if($live->isExpire())
                        <span class="label label-danger">Expired</span>
                        @else
                            @if($live->declined == 1)
                              <span class="label label-success">declined</span>
                              @else
                              <span class="label label-success">Not expired</span>
                            @endif
                        @endif
                    </td>
                    <td>{{$live->from}}</td>
                     <td>{{$live->to}}</td>
                     @if($live->isExpire() && $live->declined == 1 )
                          <p> {{ $live->comment ?? "----"}}</p>
                     @endif
                </tr>
            </table>
            <hr>
            <h2>  <i class="fas fa-user mt-4 pb-3"></i> Application </h2>
            <table class="table">
                <tr>
                    <th>Name</th>
                    <th>job</th>
                    <th>status</th>
                </tr>
                <tr>
                    <td>
                        <a href="{{route('user.get',$live->userjob->user->id)}}"> {{ $live->userjob->user->full_name }} </a>
                    </td>
                    <td>{{$live->userjob->job->title}}</td>
                     <td>
                        <ul class="timeline">
                            @if($live->userjob->view_state && !$live->userjob->qualified_state && !$live->userjob->reject_state && !$live->userjob->shortlist_state)
                            <li>
                                <p class="text-primary">Viewed</p>
                                <small class="text-muted">{{\Carbon\Carbon::parse($live->userjob->view_state)->diffForHumans()}}</small>
                            </li>
                            @elseif($live->userjob->shortlist_state)
                            <li>
                                <p class="text-primary">Shortlisted</p>
                                <small class="text-muted">{{\Carbon\Carbon::parse($live->userjob->shortlist_state)->diffForHumans()}}</small>
                            </li>
                            @elseif($live->userjob->reject_state)
                            <li>
                                <p class="text-danger">Rejected - {{$live->userjob->reason}}</p>
                                <small class="text-muted">{{\Carbon\Carbon::parse($live->userjob->reject_state)->diffForHumans()}}</small>
                            </li>
                            @elseif($live->userjob->qualified_state)
                            <li>
                                <p class="text-success">Qualified</p>
                                <small class="text-muted">{{\Carbon\Carbon::parse($live->userjob->qualified_state)->diffForHumans()}}</small>
                            </li>
                            @else
                            <li>
                                <p class="text-success">not viewed yet</p>
                                <small class="text-muted"></small>
                            </li>
                            @endif
                        </ul>
                     </td>
                </tr>
            </table>

        </div>
      
    </div>

    <section class="interview-type py-5">
        <div class="container py-5">
            <div class="row">
                @if(!$live->isExpire())
                <div class="col-md-4 text-center">
                    <button class="btn btn-warning part rounded-circle" data-toggle="modal" data-target=".live-modal">
                        <i class="fas fa-user-friends pb-3"></i>
                        <h3> Rearrange Interview</h3>
                    </button>
                </div>

                <div class="col-md-4 text-center">
                    <button class="btn btn-danger part rounded-circle" data-toggle="modal" data-target="#DeleteInfoModal">
                        <i class="far fa-window-close pb-3"></i>
                        <h3>Cancel Interview</h3>
                    </button>
                </div>
                @endif
                <div class="col-md-4 text-center">
                <button class="btn btn-info part rounded-circle" onclick="window.location.href= `{{ route('company.cvs.get') }}` ">
                        <i class="fas fa-sign-out-alt pb-3"></i>
                        <h3>Back</h3>
                    </button>
                </div>
            </div>
        </div>
    </section>

  

    <!-- Live Interview Modal-->
    <div class="modal fade live-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Live Interview</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form class="form-row" method="POST" action="{{route('company.live.interview.update',$live->id)}}">
                        {{csrf_field()}}
                        <input type="hidden" name="type" value="live" />
                        <div class="form-group col-md-6">
                            <label><span class="text-danger">*</span> Start From</label>
                            <input value="{{old('from')}}" type='text' name="from" class="form-control datetimepicker {{ $errors->has('from') && old('type')=='live'?'is-invalid' : ''}}" data-language='en' />
                            @if(old('type')=='live'){!! $errors->first('from', '<div class="invalid-feedback">:message</div>') !!}@endif
                        </div>

                        <div class="form-group col-md-6">
                            <label><span class="text-danger">*</span> End Date</label>
                            <input value="{{old('to')}}" type='text' name="to" class="form-control datetimepicker {{ $errors->has('to') && old('type')=='live'?'is-invalid' : ''}}" data-language='en' />
                            @if(old('type')=='live'){!! $errors->first('to', '<div class="invalid-feedback">:message</div>') !!}@endif
                        </div>

                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary ml-2">Save changes</button>
                    </form>
                </div>

            </div>
        </div>
    </div> <!-- End Modal -->
    <!-- Delete Modal -->
    <div id="DeleteInfoModal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="background-color: #1C1C1C;">
                <div class="modal-body p-4">
                <form action="{{route('company.live.interview.delete',$live->id)}}" method="POST" class="form-row text-center" >
                    @csrf
                        <div class="col-12 form-group mb-3">
                            <strong class="h4 text-white"> Are you sure you want to delete this?</strong>
                        </div>

                        <div class="form-group col-md-12 mb-0">
                            <button class="btn btn-main mx-2" type="button" data-dismiss="modal"> No </button>
                            <button class="btn btn-main mx-2" type="submit">Yes</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

</div>
@endsection
@section('scripts')
<!-- datepicker Js -->
<script src="{{asset('assets/plugins/momentjs/moment.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}"></script>
<script src="{{asset('assets/js/pages/forms/basic-form-elements.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var type = "{{old('type')?old('type'):''}}";

        if (type == "live") {
            $('.live-modal').modal('show');
        } else if (type == "record") {
            $(".record-modal").modal('show');
        }
    });
</script>
@endsection