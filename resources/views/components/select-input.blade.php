@props(['disabled' => false, 'name' => '', 'value' => '', 'options' => []])

<select name="{{ $name }}" {!! $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) !!}>
    <option value=""> Select
    </option>
    @foreach($options as $key => $option)
        <option
            value="{{ $key }}"
            @selected($key == $value || old($name) != null && old($name) == 0)
        >
            {{ $option }}
        </option>
    @endforeach
</select>
