@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-[#22C55E] focus:ring-[#22C55E] rounded-md shadow-sm']) !!}>