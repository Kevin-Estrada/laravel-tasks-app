@extends('layouts.master')

@section('content')
<div>
    <div class="float-start">
        <h4 class="pb-3">My Tasks</h4>
    </div>
    <div class="float-end">
        <a href=" {{ route('task.create') }} " class="btn btn-info">
            Create Task
        </a>
    </div>
    <div class="clearfix"></div>
</div>

{{-- @php
    dd($tasks)
@endphp --}}

@foreach ($tasks as $task)
<div class="card">
    <div class="card-header">
        {{ $task->title }}
        <span class="badge rounded-pill bg-warning text-dark">
            {{ \Carbon\Carbon::parse($task->created_at)->diffForHumans() }}
        </span>
    </div>
    <div class="card-body">
        <div class="card-text">
            <div class="float-start">
                {{ $task->description }}
                <br>

                @if ($task->status === 'TODO')
                <span class="badge rounded-pill bg-info text-dark">
                    TODO
                </span>

                @else
                <span class="badge rounded-pill bg-success text-white">
                    DONE
                </span>

                @endif

                <small>Last Updated - {{ \Carbon\Carbon::parse($task->updated_at)->diffForHumans() }}</small>
            </div>
            <div class="float-end">
                <a href=" {{ route('task.edit', $task->id) }} " class="btn btn-success">
                    Edit Task
                </a>
                <a href=" {{ route('task.edit', $task->id) }} " class="btn btn-danger">
                    Delete Task
                </a>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
@endforeach
    
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

<div class="row mt-5">
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
                    
                    {{-- {{ dd($tasks) }} --}}

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
</div>

@endsection