<table class="table table-bordered">
    <thead>
        <tr>
            <th>Product Owner</th>
            <th>Name</th>
            <th>Price</th>
            <th>Style</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td><a href="{{route('user.get.singleShowroom',['slug'=>$product->showroom->slug  ])}}">{{$product->showroom->name_en}}</a></td>
            <td><a href="{{route('user.product.get',['id'=>$product->id])}}">{{$product->name_en}}</a></td>
            <td>{{$product->price}} EGP</td>
            <td><a href="#">{{$product->style->name_en}}</a></td>
            <td>
                <a href="{{route('admin.products.view',['id'=>$product->id])}}" type="button" class="btn bg-green btn-circle waves-effect waves-circle waves-float">
                    <i class="material-icons">visibility</i>
                </a>
                <a href="{{ route('admin.product.edit.get',$product->id) }}" type="button" class="btn bg-blue btn-circle waves-effect waves-circle waves-float">
                    <i class="material-icons">edit</i>
                </a>
                <a href="{{route('admin.product.delete',$product->id)}}" data-route="{{  route('admin.product.delete',$product->id) }}" type="button" class="btn delete_alert bg-red btn-circle waves-effect waves-circle waves-float">
                    <i class="material-icons">delete</i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div style="text-align:center;">
    {{ $products->links() }}
</div>