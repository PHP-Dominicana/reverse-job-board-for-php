@props([
    'disabled' => false,
    'options' => [],
    'selected' => '',
    ])

<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) !!}>
    @foreach($options as $option)
        <option {{ $selected === $option['value'] ? 'selected' : ''   }}  value="{{ $option['value'] }}">{{ $option['label'] }}</option>
    @endforeach
</select>
