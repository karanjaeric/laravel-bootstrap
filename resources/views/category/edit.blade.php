<x-app-web-layout>
    <x-slot name="pageTitle">
        Home Page view
    </x-slot>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
            @if(session('status'))
                <div class="alert alert-success">{{session('status')}}</div>
            @endif
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Category
                        <a href="{{url('categories/')}}" class="btn btn-primary float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{url('categories/'.$category->id.'/update')}}" method="POST" enctype="multipart/form-data">
                        @method("PUT")
                        @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" value="{{$category->name}}" class="form-control" id="name" name="name"/>
                                @error('name')<span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="code" class="form-label">Code</label>
                                <input type="text" value="{{$category->code}}" class="form-control" id="code" name="code"/>
                                @error('code')<span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" rows="5" id="description" name="description">{{$category->description}}</textarea>
                                @error('description')<span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="is_active">Is Active</label>
                                <input type="checkbox" {{$category->is_active == true ? 'checked' : ''}} id="is_active" name="is_active"/>
                            </div>
                            <div class="mb-3">
                                <label for="image"></label>
                                <input type="file" class="form-control"  name="image" id="image" />
                                @error('image')<span class="text-danger">{{$message}}</span> @enderror
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-web-layout>
