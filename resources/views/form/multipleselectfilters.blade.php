<div class="form-group {!! !$errors->has($errorKey) ?: 'has-error' !!}">

    <div class="col-sm-12">

        @include('admin::form.error')
        {{--@php--}}
            {{--var_dump($column);--}}
            {{--var_dump($value);--}}
            {{--var_dump((array)old($column, $value));--}}
        {{--@endphp--}}
        @foreach($data as $group)
            <div class ="row">
                <div class="col-sm-12">
                    {{$group['info']->title}}
                </div>
                @foreach($group['filters'] as $item)
                    <div class="col-sm-2">
                        <label class="checkbox-inline">
                            <input type="checkbox" name="{{$name}}[]" value="{{$item->id}}" class="{{$class}}" {{  in_array($item->id, (array)old($column, $value)) ?'checked':'' }}  {!! $attributes !!} />&nbsp;{{$item->title}}
                        </label>
                    </div>
                @endforeach
            </div>
            <hr/>
        @endforeach
        <input type="hidden" name="{{$name}}[]" />
        @include('admin::form.help-block')

    </div>
</div>
