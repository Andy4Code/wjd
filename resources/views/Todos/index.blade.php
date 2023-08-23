@extends('Todos.todo-layout')
@section('content')
    <div class="container">
        <div class="d-flex bd-highlight mb-4">
            <div class="p-2 w-100 bd-highlight">
                <h2>Laravel AJAX Example</h2>
            </div>
            <div class="p-2 flex-shrink-0 bd-highlight">
                <button class="btn btn-success" id="btn-add">
                    Add Todo
                </button>
            </div>
        </div>

        <div id="result"></div>



{{--        add model           --}}
        <div class="modal fade" id="formModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="formModalLabel">Create Todo</h4>
                    </div>
                    <div class="modal-body">
                        <form id="myForm" name="myForm" action="{{ route('todos.store') }}" method="POST"
                            class="form-horizontal" novalidate="">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" id="title_add" name="title"
                                    placeholder="Enter title" value="">
                                <div class="text-danger" id="title_add_err"></div>

                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <input type="text" class="form-control" id="desc_add" name="desc"
                                    placeholder="Enter Description" value="">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="btn-save" value="add">Save changes
                        </button>
                    </div>
                </div>
            </div>
        </div>
{{-- end add model--}}




{{--        edit model --}}
        <div class="modal fade" id="editModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="formModalLabel">Update Todo</h4>
                    </div>
                    <div class="modal-body">
                        <form id="formUpdate" name="formUpdate" method="POST"
                              class="form-horizontal" novalidate="">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" id="title_edit" name="title"
                                       placeholder="Enter title" value="">
                                <div class="text-danger" id="title_edit_err"></div>

                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <input type="text" class="form-control" id="desc_edit" name="desc"
                                       placeholder="Enter Description" value="">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" id="btn-update">Update
                        </button>
                        <input type="hidden" id="todo_id" name="todo_id" value="0">
                    </div>
                </div>
            </div>
        </div>
{{--        end edit model--}}
    </div>
@endsection
