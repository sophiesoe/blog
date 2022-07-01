<x-admin-layout>
    <h3 class="mt-4 text-center">Your current blogs</h3>
    <x-card-wrapper>
        <table class="table my-2 mb-4">
            <thead>
              <tr>
                <th scope="col">Title</th>
                <th scope="col">Intro</th>
                <th scope="col" colspan="2">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($blogs as $blog)
                <tr>
                    <td>
                        {{ $blog->title }}
                    </td>
                    <td>
                        {{ $blog->intro }}
                    </td>
                    <td>
                        <a href="/admin/blogs/{{ $blog->slug }}/edit" class="btn btn-primary text-light px-3 rounded-pill">Edit</a>
                    </td>
                    <td>
                        <form 
                        action="/admin/blogs/{{ $blog->slug }}/delete"
                        method="POST">
                        @csrf
                        @method('DELETE')
                            <button type="submit" class="btn btn-danger text-light rounded-pill">
                                Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
          {{ $blogs->links() }}
    </x-card-wrapper>
</x-admin-layout>
