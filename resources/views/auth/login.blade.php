<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto my-5">
                <h4 class="text-center text-primary mt-2">Login Form</h4>
                <x-card-wrapper>
                <form method="POST">
                    @csrf
                    <x-form.input name="email" type="email" />
                    <x-form.input name="password" type="password" />
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </x-card-wrapper>
            </div>
        </div>
    </div>
    </x-layout>
    
    
    
    