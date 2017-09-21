@extends('layouts.app')

@section('content')
    <!-- bootstrap reeglid -->
    
    <div class="panel-body">
        <!-- kuvame vea teated -->
        @include('common.errors')
        
        <!-- uue task-i lisamine vorm -->
        <form action="{{ url('task')}}" method="POST" class="form-horizontal">
            {!! csrf_field() !!}
            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Task</label>
                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-6 col-sm-offset-3">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Add Task
                    </button>
                </div>
            </div>

        </form>
        
    </div>
    <!-- task-ide nimekiri -->
    @if (count($tasks) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Current tasks
            </div>
            <div class="panel-body">
                <table class="table table-striped task-table">
                    <thead>
                        <th>Task</th>
                        <th>A</th>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <td class="table-text">
                                    <div>{{ $task->name }}</div>
                                </td>
                                <td>
                                    <form action="{{ url('/task/'.$task->id)}}" method="POST">
                                        {!! csrf_field() !!}
                                        {!! method_field('DELETE') !!}
                                        <button>Delete Task</button>
                                    </form>
                                </td>
                            </tr> 
                        @endforeach
                    </tbody>
                    
                </table>
            </div>
        </div>
    @endif

@endsection