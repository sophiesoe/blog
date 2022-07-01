<x-layout>

    @if (session('success'))
    <div class="alert alert-warning text-center">{{ session('success') }}</div>
    @endif

    <x-hero />

    <x-blog-main 
    :blogs="$blogs"/>
</x-layout>



    