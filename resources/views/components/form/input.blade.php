@props(['name', 'type' => 'text', 'value'=>''])
<x-form.input-wrapper>
    <x-form.label :name="$name"/>
    <input type="{{ $type }}" name="{{ $name }}" value='{{ old("$name", $value) }}' class="form-control" id="{{ $name }}">
    <x-error :name="$name" />
</x-form.input-wrapper>