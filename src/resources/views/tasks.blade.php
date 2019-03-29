@extends('todolist::layouts.layout')

@section('content')
<div>
        <div class="jumbotron rounded shadow">
            <h1 class="display-6 font-weight-bold">Todo List</h1>
            <div class="lead">
                <h5 class="font-weight-bold">Categories:</h5>
                <form action="{{ route('categories.store') }}" method="post">
                    @csrf
                    <div class="input-group">
                        <input type="text" autocomplete="off" name="categories" class="form-control" placeholder="New Category">
                        <div class="input-group-append">
                        <button type="submit" class="btn btn-secondary text-monospace" style="width:150px"><i class="fas fa-plus mr-1"></i>Add Category</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal fade" id="categoriesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Categories</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <form action="" method="post" id="categories-update">
                            @csrf
                            @method('put')
                            <div class="form-group">
                            <label for="description">Categories</label>
                            <input type="text" autocomplete="off" value="" class="form-control" name="categories" id="categoryName">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-secondary">Update changes</button>
                    </div>
                </form>
                    </div>
                </div>
            </div>

            <div>
                <table class="table table-borderless table-hover">
                    <tbody>
                        @foreach ($categories as $category)
                        <tr class="border-bottom">
                            <td>
                                <a href="{{ route('tasks.index') }}?category={{ $category->id }}">{{$category->categories}}</a>
                                <br>
                                <small class="text-secondary float-left">
                                    Created
                                    {{ ($category->created_at->diffForHumans()) }}
                                </small>
                            </td>
                            <td>
                                <i class="fas fa-edit pointer float-right" data-categories-id="{{$category->id}}" data-categories-name="{{$category->categories}}" data-toggle="modal" data-target="#categoriesModal"></i>
                            </td>
                            <td>
                                <form class="ml-3 d-inline" action="{{ route('categories.delete', [$category->id]) }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="close border_no" >
                                        <span aria-hidden="false">&times;</span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <section class="mt-5 bg-light">
                     <h5 class="font-weight-bold pt-2">
                        {{ $current_cat  ? " {$current_cat->categories} " : "Tasks:" }}
                     </h5> 
                            <div>
                                @if(null == $tasks)
                                    <div class="jumbotron">

                                        <p class="text-center font-weight-bold">Select or add a category to access tasks</p>
                                    </div>
        
                                @else
                                <form action="{{ route('tasks.store') }}" method="post">
                                    @csrf
                                    <div class="input-group">
                                        <input type="text" autocomplete="off" required name="name" class="form-control" placeholder="New task">
                                        <input type="hidden" name="category_id" value="{{ $current_cat->id ?? null }}">
                                        <div class="input-group-append">
                                            <button class="btn btn-secondary text-monospace" style="width:150px" type="submit"><i class="fas fa-plus mr-1"></i>Add Task</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            
                    <table class="table table-borderless table-hover bg-light">
                        <tbody>
                            @foreach($tasks as $task)
                            <tr class="border-bottom">
                                <td>
                                    <span class="float-left">@if($task->completed==true) <del>{{$task->name}}</del> @else {{ $task->name }} @endif </span>
                                    <br>
                                    <small class="text-secondary float-left">
                                        Created
                                        {{ ($task->created_at->diffForHumans()) }}
                                    </small>
                                </td>
    
                                <td>
                                    <input class="mt-2 float-right" type="checkbox" {{ $task->completed ? "checked" : ""  }} onchange="changestatus('{{$task->id}}')" value="{{ $task->completed }}">
                                </td>
    
                                <td>
                                    <form class="ml-3 d-inline" id="delete-task" action="{{ route('tasks.delete', [$task->id])}}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="close" >
                                            <span aria-hidden="false">&times;</span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </section>


               </div>
            @endif
            </div>
        </div>
            </div>
        </div>
</div>      
@endsection

@section('script')
<script src="{{ (asset('js/axios/axios.min.js')) }}"></script>
<script>
    function changestatus(task_id)
    {
        var form = new FormData;
        form.append("taskId", task_id);
        form.append("_token", "{{csrf_token()}}");
        axios.post("{{route('tasks.status')}}", form)
        .then(function(serverResponse) {
            window.location.reload();
        })
        .catch(function(error) {
            console.log(error.response.data);
        })
    }
 var url = "{{ route('categories.update')}}"
        
        $("#categoriesModal").on('show.bs.modal', function(event){
            var btn = event.relatedTarget;
            var id = $(btn).data('categories-id');
            var categoriesName = $(btn).data('categories-name');
            $("#categoryName").val(categoriesName);

            $("#categories-update").attr('action', url+'/'+id)
        })

</script>
@endsection