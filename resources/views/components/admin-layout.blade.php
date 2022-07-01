<x-layout>
    @if (session('success'))
    <div class="alert alert-warning text-center">{{ session('success') }}</div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-md-2 mt-5">
                <ul class="list-group mt-5">
                    <li class="list-group-item"><a class="text-decoration-none" href="/admin/blogs">Dashboard</a></li>
                    <li class="list-group-item"><a class="text-decoration-none" href="/admin/blogs/create">Create Blog</a></li>
                  </ul>
            </div>
            <div class="col-md-10">
                {{ $slot }}
            </div>
        </div>
    </div>
</x-layout>