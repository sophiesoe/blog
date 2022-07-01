@props(['blogs'])


<div class="row">
  @forelse ($blogs as $blog )
  <div class="col-md-4 mb-4">
    <x-blog-card :blog="$blog" />
  </div>
  @empty 
  <h6 class="text-center">No Blogs Found.</h6>
  @endforelse
  {{ $blogs->links() }}
  </div>