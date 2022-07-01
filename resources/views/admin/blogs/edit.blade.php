<x-admin-layout>
    <div class="mb-5">
        <h3 class="text-center mt-4 mb-2">Edit your blog</h3>
        <div class="container">
                <x-card-wrapper>
                <form enctype="multipart/form-data" action="/admin/blogs/{{ $blog->slug }}/update" method="POST">
                    @csrf
                    @method('patch')
                    <x-form.input name="title" value="{{ $blog->title }}" />
                    <x-form.input name="slug" value="{{ $blog->slug }}" />
                    <x-form.input name="intro" value="{{ $blog->intro }}" />
                    <x-form.text-area name="body" value="{{ $blog->body }}" />
                    <x-form.input name="thumbnail" type="file" value="{{ $blog->thumbnail }}" />
                        <img src="/storage/{{ $blog->thumbnail }}" width="150px" height="100px" class="rounded mb-2" alt="">
                    <x-form.input-wrapper>
                        <x-form.label name="category" />
                        <select name="category_id" id="category" class="form-control">
                        @foreach ($categories as $category)
                        <option {{ $category->id==old('category_id', $blog->category->id) ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
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