<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
        <div class="header">
            @include('admin.layouts.message')
            @include('admin.layouts.errors')
            <h2 style="margin-bottom: 10px;">
                showrooms - ({{ $showrooms->total()}}) 
            </h2>
            <hr style="width:100%;">
            <span class=""></span>

            <a href="{{ route('admin.create.showroom') }}" class="btn btn-primary waves-effect">
                <i class="material-icons">add</i>
                <span>Create</span>
            </a>
            <form style="margin-top:20px;" id="form_advanced_validation" action="">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" class="form-control" id="search" name="search" required>
                        <label class="form-label">* Search</label>
                    </div>
                </div>
            </form>
        </div>
        @if(count($showrooms)>0)
        <div class="body table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name </th>
                        <th>Owner</th>
                        <th>Status</th>
                        <th>No.Followers</th>
                        <th>Contact Phone</th>
                        <th>Contact Phone</th>
                        <th>Contact Eamil</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($showrooms as $showroom)
                    <tr>
                        <td><a href="{{route('user.get.singleShowroom',['slug' => $showroom->slug  ])}}">{{ substr($showroom->name_en,0,20)}}</a></td>
                        <td>
                        @if(!$showroom->user)
                            Not Assigned To User
                        @else
                            <a href="{{route('user.view.profile',$showroom->user->id)}}">{{substr($showroom->user->fullname,0,20)}}</a>
                        @endif
                        </td>
                        <td>@if ($showroom->active == 1)
                                <span class="label bg-green">Active</span>
                                @else
                                <span class="label bg-red">InActive</span>

                        @endif</td>
                        <td>{{$showroom->followers->count()}}</td>
                        <td>{{$showroom->contact_name}}</td>
                        <td>{{$showroom->phone}}</td>
                        <td>{{$showroom->contact_email}}</td>

                        <td>
                            <a href="{{ route('admin.showroom.details',$showroom->id) }}" type="button" class="btn bg-green btn-circle waves-effect waves-circle waves-float">
                                <i class="material-icons">visibility</i>
                            </a>
                            <a href="{{ route('admin.showroom.edit',$showroom->id) }}" type="button" class="btn bg-blue btn-circle waves-effect waves-circle waves-float">
                                <i class="material-icons">edit</i>
                            </a>
                            <a href="{{ route('admin.showroom.delete',$showroom->id) }}" data-route="{{ route('admin.showroom.delete',$showroom->id) }}" type="button" class="delete_alert btn bg-red btn-circle waves-effect waves-circle waves-float">
                                <i class="material-icons">delete</i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div style="text-align:center;">
                {{ $showrooms->links()}}
            </div>
        </div>
        @else
        <div class="alert bg-red">
            no showrooms found
        </div>
        @endif
    </div>
</div>