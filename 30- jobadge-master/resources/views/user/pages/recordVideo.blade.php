@extends('master')
@section('styles')
<script src="https://www.webrtc-experiment.com/RecordRTC.js"></script>
<script src="https://webrtc.github.io/adapter/adapter-latest.js"></script>
@endsection
@section('body')
<!--===== Interview Type =====-->
<!--===== Interview Type =====-->
<div class="container-blog-posts">
    <div class="blog-posts-header">
        <div class="container">
            <h2 class="section-title"> <span>Record Your Video</span></h2>
        </div>
    </div>

    <section class="record-interview py-5">
        <div class="container py-5">
            <div class="row">
                <div class="section-header col-md-12">
                    <h3 class="section-title text-left text-info">
                        <span>Q1: {{$record->question1}}</span>
                    </h3>
                </div>
                @if($record->question2)
                <div class="section-header col-md-12">
                    <h3 class="section-title text-left text-info">
                        <span>Q2: {{$record->question2}}</span>
                    </h3>
                </div>
                @endif
                @if($record->question3)
                <div class="section-header col-md-12">
                    <h3 class="section-title text-left text-info">
                        <span>Q3: {{$record->question3}}</span>
                    </h3>
                </div>
                @endif
                <div class="col-md-10">
                    <video width="70%" height="350px" id="your-video-id" controls autoplay playsinline></video>
                </div>
                <h1 id="counter" class="text-danger col-md-12 my-5 mx-5"></h1>
                <div style="display:none;" class="alert alert-danger col-md-5 ml-5" role="alert"></div>
                <div style="display:none;" class="alert alert-info col-md-5 ml-5" role="alert"></div>
                <div class="col-md-12 pt-5">
                    <button id="start_record" class="btn btn-danger"> Start Recording </button>
                    <button id="stop_record" disabled class="btn btn-danger"> Stop Recording </button>
                    <button id="upload_btn" disabled class="btn btn-primary"> Upload </button>
                    <button id="new_video" disabled class="btn btn-success"> New Video </button>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection
@section('scripts')
<script type="text/javascript">
    var upload_link = "{{route('user.upload.record',$record->id)}}";
    var redirect_url = "{{route('user.recommendations')}}";
</script>
<script type="text/javascript" src="{{asset('site/js/record.js')}}"></script>
<script src="https://www.webrtc-experiment.com/common.js"></script>
@endsection