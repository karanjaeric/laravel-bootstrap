<x-app-web-layout>
    <x-slot name="pageTitle">
        Home Page view
    </x-slot>
    <div class="container">
        <div class="row py-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Categories
                        <a href="{{url('categories/create')}}" class="btn btn-primary float-end">Add Category</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <h1>Welcome to Laravel 8</h1>
                        <p>This is the home page</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-web-layout>
