<x-layout>
    <div class="container">
      <div class="row">
        <div class="col-md-6 mx-auto text-center">
          <img
            src='{{ asset("/storage/$blog->thumbnail") }}'
            class="card-img-top mt-4 rounded"
            alt="..."
          />
          <h3 class="my-3">{{ $blog->title }}</h3>
          <div>Autor - <a href="/?users={{ $blog->author->username }}" class="text-decoration-none">{{ $blog->author->name }}</a></div>
          <div class="badge bg-primary"><a href="/?category={{ $blog->category->slug }}" class="text-white text-decoration-none">
            {{ $blog->category->name }}</a></div>
          <div class="text-secondary">{{ $blog->created_at->diffForHumans() }}</div>
          <p class="lh-md mt-3">
            {!! $blog->body !!}
          </p>
          <div>
            <form action="/blogs/{{ $blog->slug }}/subscription" method="POST">
              @csrf
              @auth
                @if (auth()->user()->isSubscribed($blog))
                <button class="btn btn-sm fw-bold btn-danger text-light mb-3">Unsubscribe</button> 
                @else
                <button class="btn btn-sm fw-bold btn-warning text-light mb-3">Subscribe</button>
                @endif
              @endauth
          </form>
          </div>
        </div>
      </div>
    </div>
    <section class="container">
    <div class="col-md-8 mx-auto">
      @auth
      <x-comment-form :blog="$blog" />
      @else 
      <p class="text-center">Please <a href="/login" class="text-decoration-none">Login</a> to comment on this post.</p>
      @endauth
    </div>
    </section>
     @if ($blog->comments->count())
    <x-comments :comments="$blog->comments()->latest()->paginate(3)"/> 
     @endif
    <x-blog-may-like :randomBlogs="$randomBlogs"/>
</x-layout>

        
