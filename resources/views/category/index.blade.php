<x-app-web-layout>
    <x-slot name="title">
    Categories
    </x-slot>
    <div class="container">
        <div class="row py-5">
            <div class="col-md-12">
                @if(session('status'))
                    <div class="alert alert-success">{{session('status')}}</div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h4>Categories
                        <a href="{{url('categories/create')}}" class="btn btn-primary float-end">Add Category</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderd table-stripe">
                                <thead>
                                    <tr>
                                    <th>ID</th>
                                        <th>Name</th>
                                        <th>Code</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Is Active</th>
                                        <th>Action</th>
                                    </tr>


                                </thead>
                                <tbody>
                                    @foreach($categories as $category)
                                    <tr>
                                    <td>{{$category->id}}</td> 
                                        <td>{{$category->name}}</td>   
                                        <td>{{$category->code}}</td>
                                        <td>{{$category->description}}</td> 
                                        <td>
                                            <img src="{{asset($category->image)}}" alt="img" style="width:70px;width:70px" />
                                        </td>
                                        <td>
                                            @if($category->is_active==1)
                                              <span class="text-success">  Active</span>
                                            @else
                                               <span class="text-danger"> InActive</span>
                                            @endif
                                                                            
                                    </td> 
                                        <td>
                                            <a href="{{url('categories/' . $category->id . '/edit')}}" class="btn btn-success mx-2">Edit</a>
                                            <a href="{{url('categories/'.$category->id.'/delete')}}" class="btn btn-danger mx-1">Delete</a>
                                        </td>  
                                    </tr>
                                    @endforeach
                                </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-web-layout>
