
<div class="col-sm-4 col-6 mx-auto my-1">
    <select name="branches[][working_from]" class="working_from form-control form-control-sm" @if(isset($showroom_branch)) id="working_from_{{$day}}_{{$showroom_branch->id}}" @else id="working_from_{{$day}}" @endif>
        @for($i=1 ; $i<13 ; $i++) <option @if(isset($showroom_branch)) @foreach($showroom_branch->info as $info)
            @if($info->day == $day && $info->from == $i.' AM')
            selected
            @endif
            @endforeach
            @endif
            value="{{$i}} AM">{{$i}} AM</option>
            @endfor

            @for($i=1 ; $i<13 ; $i++) <option @if(isset($showroom_branch)) @foreach($showroom_branch->info as $info)
                @if($info->day == $day && $info->from == $i.' PM')
                selected
                @endif
                @endforeach
                @endif
                value="{{$i}} PM">{{$i}} PM</option>
                @endfor
    </select>
</div>
<div class="col-sm-4 col-6 mx-auto my-1">
    <select name="branches[][working_to]" class="working_to form-control form-control-sm" @if(isset($showroom_branch)) id="working_to_{{$day}}_{{$showroom_branch->id}}" @else id="working_to_{{$day}}" @endif>
        @for($i=1 ; $i<13 ; $i++) <option @if(isset($showroom_branch)) @foreach($showroom_branch->info as $info)
            @if($info->day == $day && $info->to == $i.' AM')
            selected
            @endif
            @endforeach
            @endif
            value="{{$i}} AM">{{$i}} AM</option>
            @endfor

            @for($i=1 ; $i<13 ; $i++) <option @if(isset($showroom_branch)) @foreach($showroom_branch->info as $info)
                @if($info->day == $day && $info->to == $i.' PM')
                selected
                @endif
                @endforeach
                @endif
                value="{{$i}} PM">{{$i}} PM</option>
                @endfor
    </select>
</div>