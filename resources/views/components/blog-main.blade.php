@props(['blogs'])
<section class="container text-center" id="blogs">
    <h1 class="display-5 fw-bold mb-4">Blogs</h1>
      {{-- <select name="" id="" class="p-1 rounded-pill mx-3">
        <option value="">Filter by Tag</option>
      </select> --}}
    <x-category-dropdown/>
    <form action="" class="my-3">
      <div class="input-group mb-3">
        @if(request('category'))
        <input
          name="category"
          value="{{ request('category') }}"
          type="hidden"
        />
        @endif
        @if(request('username'))
        <input
          name="username"
          value="{{ request('username') }}"
          type="hidden"
        />
        @endif
        <input
          name="search"
          value="{{ request('search') }}"
          type="text"
          autocomplete="false"
          class="form-control"
          placeholder="Search Blogs..."
        />
        <button
          class="input-group-text bg-primary text-light"
          id="basic-addon2"
          type="submit"
        >
          Search
        </button>
      </div>
    </form>
    <x-blog-more :blogs="$blogs" />
</section>