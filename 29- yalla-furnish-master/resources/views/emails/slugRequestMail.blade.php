<h4>Slug Change Request</h4>

<h5>Request from Showroom : {{$showroom->name_en}}</h5>

<h5>old slug : {{$showroom->slug}}</h5>

<h5>new slug : {{$slug}}</h5>

<a href="{{route('admin.showroom.edit',$showroom->id)}}">Change The Slug Link</a>