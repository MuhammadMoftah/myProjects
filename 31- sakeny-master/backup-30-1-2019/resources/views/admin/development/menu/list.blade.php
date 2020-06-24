    <ol class="dd-list">

         <li class="dd-item" data-id="{{ $loop->depth * $loop->iteration }}">
         <div class="dd-handle">
            {{ $row->name }}
        </div>
        {!! @App\Http\Controllers\Admin\Development\MenuController::menuList($row) !!}
     </li>

</ol>
