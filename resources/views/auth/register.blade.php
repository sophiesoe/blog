<x-layout>
<div class="container">
    <div class="row">
        <div class="col-md-5 mx-auto">
            <h4 class="text-center text-primary mt-4">Registration Form</h4>
            <div class="card my-4 p-4 shadow-sm">
            <form method="POST">
                @csrf
                <x-form.input name="name" />
                <x-form.input name="username" />
                  <x-form.input name="email" type="email" />
                  <x-form.input name="password" type="password" />
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
        </div>
    </div>
</div>
</x-layout>



