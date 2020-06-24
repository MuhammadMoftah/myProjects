<!-- Job Target Modal-->
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="view-jobs">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Our Jobs</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body" style="height: 500px; overflow: auto;">
                <div class="post-job-list-view">
                    @foreach($active_jobs as $job)
                    <div class="list-view-item">
                        <div class="row align-items-center no-gutters">
                            <div class="col-12 col-md-3 col-xl-7">
                                <div class="item-post-job">
                                    <div class="item-post">
                                        <h4 class="post-name"><a href="{{route('user.get.job',$job->slug)}}">{{$job->title}}</a></h4>
                                        <span class="post-date">{{$job->created_at->diffForHumans()}}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-7 col-xl-5">
                                <div class="row no-gutters">
                                    <div class="col-12 col-md-6">
                                        <div class="item-time-type">
                                            <img src="{{ asset('site/images/icon/time.png')}}" class="mx-1" width="18" alt="">
                                            <span class="type-text">{{$job->jobtype->name_en}}</span>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 text-sm-center text-md-right">
                                        <a href="{{route('company.invite.job',['job_id'=>$job->id,'user_id'=>$user->id])}}" class="button-outline"><span>Invite</span></a>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                    @endforeach
                    @if(count($active_jobs)==0)
                        <h1 style="text-align:center;">no jobs added</h1>
                    @endif
                </div>
            </div>

        </div>
    </div>
</div> <!-- End modal-->