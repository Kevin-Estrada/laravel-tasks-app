@extends('layouts.master')

@section('content')
<div>
    <div class="float-start">
        <h4 class="pb-3">Create Task</h4>
    </div>
    <div class="float-end">
        <a href=" {{ route('index') }} " class="btn btn-info">
            All Tasks
        </a>
    </div>
    <div class="clearfix"></div>
</div>

{{-- @php
    dd($tasks)
@endphp --}}

<div class="card card-body bg-light p-4">
    <form action="{{ route('task.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea type="text" class="form-control" id="description" name="description" rows="5"></textarea>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Status</label>
            <select name="status" id="status" class="form-control">
                @foreach ($statuses as $status)
                    <option value="{{ $status['value'] }}">{{ $status['label'] }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
    
{{-- <div class="row mt-5">
    <div class="col-md-6">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">
                    {{ $error }}
                </div>
            @endforeach
        @endif

        @if (session()->has('msg'))
            <div class="alert alert-success">
                {{ session()->get('msg') }}
            </div>
        @endif

        <div class="container p-5">
            <h4 class="pb-3">My Tasks</h4>
        </div>

        <div class="card">
            <div class="card-header">
                Add Task
            </div>
            <div class="card-body">
                <form action="{{ route('task.create') }}" method="GET">
                    @csrf
                    <div class="form-group">
                        <label for="task">Task</label>
                        <input type="text" name="title" id="task" placeholder="Task" class="form-control {{ $errors->has('title') ? 'is-invalid' : ''}}">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            {{ $errors->has('title') ? $errors->first('title') : '' }}
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> --}}

{{-- <div class="row mt-5">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                View Tasks
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Task</th>
                        <th>Completed?</th>
                        <th style="width: 2em">Action</th>
                    </tr>
                    
                    {{ dd($tasks) }}

                    @foreach ($tasks as $task)

                    <tr>
                        <td>{{ $task->title }}</td>

                        <td>
                            <div>
                                <form action="" method="POST">
                                    @csrf
                                    <input class="form-check-input" type="checkbox" id="status" value="checked" name="statusChecked">
                                </form>
                            </div>
                        </td>

                        <td>
                            <form action=" {{ route('task.destroy', $task->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>

                    </tr>

                    @endforeach

                </table>
    </div>
</div> --}}

@endsection