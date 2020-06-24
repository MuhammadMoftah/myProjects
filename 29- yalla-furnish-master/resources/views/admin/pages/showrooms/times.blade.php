<span class="text-muted mx-2"> from </span>
<select name="working_from_{{$day}}" class="working_from" style="width:75px">
    @for($i=1 ; $i<13 ; $i++)
    <option {{old('working_from_'.$day)?'selected':''}} value="{{$i}} AM">{{$i}} AM</option>
    @endfor

    @for($i=1 ; $i<13 ; $i++)
    <option value="{{$i}} PM">{{$i}} PM</option>
    @endfor
</select>
<span class="text-muted mx-2"> to </span>
<select name="working_to_{{$day}}" class="working_to" style="width:75px">
    @for($i=1 ; $i<13 ; $i++)
    <option {{old('working_to_'.$day)?'selected':''}} value="{{$i}} AM">{{$i}} AM</option>
    @endfor
    @for($i=1 ; $i<13 ; $i++)
    <option value="{{$i}} PM">{{$i}} PM</option>
    @endfor
</select>