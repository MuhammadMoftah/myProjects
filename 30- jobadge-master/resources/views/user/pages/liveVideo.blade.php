@extends('master')
@section('body')
<div class="container-blog-posts">
    <section class="comp-profile" id="tabs">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <div id="remote-container" style="width:100%;"></div>
                    <div id="canvas-container" style="display:none;"></div>
                </div>


                <div class="col-md-2">
                    <div id="me" style="height:300px; width:300px;"></div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
@section('scripts')
<script src="https://cdn.agora.io/sdk/web/AgoraRTCSDK-2.6.1.js"></script>
<script type="text/javascript">
    var channel_name = "{{$live->channel_name}}";
</script>
<script src="{{asset('site/js/live.js')}}"></script>
@endsection