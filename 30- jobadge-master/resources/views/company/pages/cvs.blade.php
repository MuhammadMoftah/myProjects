@extends('master')

@section('body')
<!--===== Join Us =====-->
<!--===== Join Us =====-->
<div class="container-blog-posts">

    <section class="comp-profile" id="tabs">
        <div class="container">
            <div class="row">

                <div class="col-md-12 part">
                    <form action="{{route('company.cvs.get')}}" class="form-row">
                        <div class="form-group col-md-10">
                            <input value="{{request('keyword')}}" type="text" name="keyword" class="form-control m-1" placeholder="search in your cvs">
                        </div>
                        <div class="form-group col-md-2">
                            <input type="submit" class="form-control btn btn-info m-1" value="Search">
                        </div>
                    </form>
                    @include('layouts.message')
                    @include('layouts.errors')
                    @if(count($cvs)>0)
                    <table class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Name</th>
                                <th>Action on Cv</th>
                                <th>screening Status</th>
                                <th>Interview</th>
                                <th>Final status</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($cvs as $cv)
                            <tr>
                                <td><a href="{{route('user.get',$cv['user_id'])}}">{{$cv['title']}}</a>
                                    {{-- <a href="{{route('company.cv.delete',$cv['job_user']['id'])}}" class="close text-danger" data-dismiss="modal" aria-label="Close"> --}}
                                        {{-- <span aria-hidden="true">&times;</span> --}}
                                    </a>
                                </td>
                                <td>{{$cv['user_name']}}</td>
                                <td class="text-center">
                                    <a title="View CV" href="{{route('company.cv.view',$cv['job_user']['id'])}}" target="_blank" class="btn btn-info fas fa-eye"></a>
                                    <a class="btn btn-primary" title="Download CV" href="{{route('company.cv.download',$cv['name'])}}">
                                        <i class="far fa-arrow-alt-circle-down"></i>
                                    </a>
                                </td>
                                <td class="text-center">
                                    @if(!$cv['job_user']['qualified_state'])
                                    <a href="{{route('company.applicant.qualified',$cv['job_user']['id'])}}"><i title="Qualified" class="btn btn-success far fa-check-circle"></i></a>
                                    @endif
                                    @if(!$cv['job_user']['reject_state'])
                                    <a data-toggle="modal" data-target="#modal-{{$cv['job_user']['id']}}" href=""><i title="Rejected" class="btn btn-secondary far fa-times-circle"></i></a>
                                    <!-- Modal -->
                                    <div class="modal fade" id="modal-{{$cv['job_user']['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <form action="{{route('company.applicant.reject',$cv['job_user']['id'])}}" method="POST">
                                            {{csrf_field()}}
                                            <input type="hidden" name="type" value="screen">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header text-center">
                                                        <h5 class="modal-title w-100" id="exampleModalLabel">Reject with Reason</h5>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <select name="reason" class="form-control p-0">
                                                            <option disabled selected>* Select your Reason</option>
                                                            <option value="over_qualified">Over qualified</option>
                                                            <option value="not_qualified">Not qualified</option>
                                                            <option value="location">Location reason</option>
                                                        </select>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-success w-25 mx-auto">Reject</button>
                                                        <button type="button" class="btn btn-danger w-25  mx-auto" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                    @endif
                                    @if(!$cv['job_user']['shortlist_state'])
                                    <a href="{{route('company.applicant.shortlist',$cv['job_user']['id'])}}"><i title="Shortlisted" class="btn btn-warning far fa-list-alt"></i></a>
                                    @endif
                                </td>
                                <td>
                                   
                                    @if($cv['job_user']['qualified_state'] && !$cv['live_interview'] && !$cv['record_interview'])
                                    <a class="btn btn-sm btn-success w-100 mx-auto my-2" href="{{route('company.arrange.interview.get',$cv['job_user']['id'])}}">arrange</a>
                                    @elseif($cv['live_interview'])
                                       <a class="btn btn-sm btn-success w-100 mx-auto my-2" href="{{route('company.live.interview.get',$cv['live_interview']['id'])}}">Live Interview details</a>
                                    @else
                                    <button disabled class="btn btn-sm btn-success w-100 mx-auto my-2">arrange</button>
                                    @endif
                                    @if($cv['record_interview'] && $cv['record_interview']['user_video'])
                                    <button class="btn btn-sm btn-success w-100 mx-auto my-2" data-toggle="modal" data-target="#record-{{$cv['job_user']['id']}}"><i class="fas fa-camera-retro"></i> record</button>
                                    <!-- Live Interview Modal-->
                                    <div class="modal fade" id="record-{{$cv['job_user']['id']}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">{{$cv['title']}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <video width="100%" height="500" controls>
                                                        <source src="{{$cv['record']}}" type="video/mp4">
                                                    </video>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- End Modal -->
                                    @endif
                                </td>
                                <td>
                                    @if(($cv['live_interview'] && $cv['live_interview_expire'])||($cv['record_interview'] && $cv['record_interview_expire']))
                                    <a class="btn btn-sm btn-success w-100 mx-auto my-1" href="{{route('company.accept.applicant',$cv['job_user']['id'])}}">accept</a>
                                    <a data-toggle="modal" data-target="#reject-{{$cv['job_user']['id']}}" class="btn btn-sm btn-danger w-100 mx-auto my-1" href="{{route('company.reject.applicant',$cv['job_user']['id'])}}">reject</a>
                                    <div class="modal fade" id="reject-{{$cv['job_user']['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <form action="{{route('company.reject.applicant',$cv['job_user']['id'])}}" method="POST">
                                            {{csrf_field()}}
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header text-center">
                                                        <h5 class="modal-title w-100" id="exampleModalLabel">Reject with Reason</h5>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <select name="reason" class="form-control p-0">
                                                            <option disabled selected>* Select your Reason</option>
                                                            <option value="over_qualified">Over qualified</option>
                                                            <option value="not_qualified">Not qualified</option>
                                                            <option value="location">Location reason</option>
                                                        </select>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-success w-25 mx-auto">Reject</button>
                                                        <button type="button" class="btn btn-danger w-25  mx-auto" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                    @else
                                    <button disabled class="btn btn-sm btn-success w-100 my-1 mx-auto">accept</button>
                                    <button disabled class="btn btn-sm btn-danger w-100 my-1 mx-auto">reject</button>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <p class="text-center">No Cvs Found</p>
                    @endif
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-4 col-xl-2 text-center">
                            {{ $cvs->appends(getRequestBetweenPages())->render() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection