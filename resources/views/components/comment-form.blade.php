@props(['blog'])
<x-card-wrapper>
    <form action="/blogs/{{ $blog->slug }}/comments" method="POST">
      @csrf
      <div class="mb-3">
        <textarea class="form-control border border-0" name="body" id="" cols="10" rows="5" placeholder="say something..."></textarea>
      </div>
      <x-error name="body" />
      <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </x-card-wrapper>