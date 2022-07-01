<x-admin-layout>
    <div class="mb-5">
        <h3 class="text-center mt-4 mb-2">Create a new Blog</h3>
        <div class="container">
                <x-card-wrapper>
                <form enctype="multipart/form-data" action="/admin/blogs/store" method="POST">
                    @csrf
                    <x-form.input name="title" />
                    <x-form.input name="slug" />
                    <x-form.input name="intro" />
                    <x-form.text-area name="body" />
                    <x-form.input name="thumbnail" type="file" />
                    <x-form.input-wrapper>
                        <x-form.label name="category" />
                        <select name="category_id" id="category" class="form-control">
                        @foreach ($categories as $category)
                        <option {{ $category->id== old('category_id') ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                        </select> 
                        <x-error name='category_id' />
                    </x-form.input-wrapper>
                    <div class="d-flex justify-content-center mt-5 mb-3">
                        <button type="submit" class="btn btn-primary w-100 fw-bold">Submit</button>
                    </div>
                </form>
                </x-card-wrapper>
        </div>
    </div>     
</x-admin-layout>