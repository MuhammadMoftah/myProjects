@extends('admin.layouts.app')
@section('content')
<!-- PAGE CONTENT WRAPPER -->

<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            <br>
            <a class="btn btn-primary btn-style-custom" href="{{route('agents.export',$company->id)}}">Export</a>
            <hr>

            <div class="clearfix"></div>
            <div class="m-separator m-separator--dashed d-xl-none"></div>
            <div class="body table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Agent name</th>
                            <th>Agent Email</th>
                            <th>Agent Mobile</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($agents as $agent)
                        <tr>
                            <td>{{$agent->name}}</td>
                            <td>{{$agent->email}}</td>
                            <td>{{$agent->phone}}</td>
                            <td>
                                <a type="button" class="btn btn-info btn-flat" href="{{route('admin.agents.change',$agent->id)}}">
                                    @if($agent->activation==1)
                                    deactivate
                                    @else
                                    activate
                                    @endif
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

@endsection