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
            <h2 class="section-title"> Choose <span>Interview</span> Type</h2>
        </div>
    </div>

    <section class="interview-type py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-6 text-center">
                    <button class="btn btn-danger part rounded-circle" data-toggle="modal" data-target=".live-modal">
                        <i class="fas fa-user-friends pb-3"></i>
                        <h3>Live Interview</h3>
                    </button>
                </div>

                {{-- <div class="col-md-6 text-center">
                    <button class="btn btn-info part rounded-circle" data-toggle="modal" data-target=".record-modal">
                        <i class="fas fa-headset pb-3"></i>
                        <h3>Record Interview</h3>
                    </button>
                </div> --}}
            </div>
        </div>
    </section>

    <!-- Record Interview Modal-->
    <div class="modal fade record-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Record Interview</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form class="form-row" method="POST" action="{{route('company.arrange.record.post',$userjob_id)}}">
                        {{csrf_field()}}
                        <input type="hidden" name="type" value="record" />
                        <div class="form-group col-md-6">
                            <label><span class="text-danger">*</span> Start From</label>
                            <input value="{{old('from')}}" type='text' name="from" class="form-control datetimepicker {{ $errors->has('from') && old('type')=='record'?'is-invalid' : ''}}" data-language='en' />
                            @if(old('type')=='record'){!! $errors->first('from', '<div class="invalid-feedback">:message</div>') !!}@endif
                        </div>

                        <div class="form-group col-md-6">
                            <label><span class="text-danger">*</span> End Date</label>
                            <input value="{{old('to')}}" type='text' name="to" class="form-control datetimepicker {{ $errors->has('to') && old('type')=='record'?'is-invalid' : ''}}" data-language='en' />
                            @if(old('type')=='record'){!! $errors->first('to', '<div class="invalid-feedback">:message</div>') !!}@endif
                        </div>

                        <div class="form-group col-md-12">
                            <label><span class="text-danger">*</span> Q1</label>
                            <input value="{{old('question1')}}" type='text' name="question1" class="form-control {{ $errors->has('question1') && old('type')=='record'?'is-invalid' : ''}}" data-language='en' />
                            @if(old('type')=='record'){!! $errors->first('question1', '<div class="invalid-feedback">:message</div>') !!}@endif
                        </div>

                        <div class="form-group col-md-6">
                            <label><span class="text-danger"></span> Q2</label>
                            <input value="{{old('question2')}}" type='text' name="question2" class="form-control {{ $errors->has('question2') && old('type')=='record'?'is-invalid' : ''}}" data-language='en' />
                            @if(old('type')=='record'){!! $errors->first('question2', '<div class="invalid-feedback">:message</div>') !!}@endif
                        </div>

                        <div class="form-group col-md-6">
                            <label><span class="text-danger"></span> Q3</label>
                            <input value="{{old('question3')}}" type='text' name="question3" class="form-control {{ $errors->has('question3') && old('type')=='record'?'is-invalid' : ''}}" data-language='en' />
                            @if(old('type')=='record'){!! $errors->first('question3', '<div class="invalid-feedback">:message</div>') !!}@endif
                        </div>


                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary ml-2">Save changes</button>
                    </form>
                </div>

            </div>
        </div>
    </div> <!-- End Modal -->

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
                    <form class="form-row" method="POST" action="{{route('company.arrange.live.post',$userjob_id)}}">
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