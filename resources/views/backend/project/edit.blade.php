@extends('layouts.backend')

@section('title', 'Edit Project')
@section('content-header', 'Edit Project')

@section('content')
    <div class="row">
        <div class="col-md-5">
            @if($project->isCompleted)
                <span class="label label-success">Completed</span>
            @else
                <span class="label label-warning">Incomplete</span>
            @endif

            <form action="{{ route('admin.project.update', ['id' => $project->id]) }}" method="POST" class="form-horizontal">
                <input type="hidden" name="_method" value="PATCH">
                @include('backend.project._form')
                <div class="box-footer">
                    <a href="javascript:window.history.back()" class="btn btn-default">Cancel</a>
                    <button type="submit" class="btn btn-primary pull-right">Edit</button>
                </div>
            </form>
        </div>

        <div class="col-md-7">
            <div class="box">
                <div class="box-header with-border">
                    <label>Stages</label>
                    <a href="{{ route('admin.stage.create', ['project_id' => $project->id]) }}" class="btn btn-xs btn-primary">Add New</a>
                </div>
                <div class="box-body">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th>Name</th>
                                <th>Date Started</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            @foreach($project->stages as $stage)
                            <tr>
                                <td>{{ $stage->name }}</td>
                                <td>{{ $stage->started_at or '' }}</td>
                                <td>
                                    @if($stage->isCompleted)
                                    <span class="label label-success">Completed</span>
                                    @else
                                    <span class="label label-warning">Incomplete</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.stage.edit', ['id' => $stage->id]) }}" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i>Edit</a>
                                    <a href="{{ route('admin.stage.destroy', ['id' => $stage->id]) }}" class="btn btn-xs btn-danger" data-method="DELETE" data-confirm="Are you sure?"><i class="glyphicon glyphicon-danger"></i>Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('pre-scripts')
    <script src="{{ asset('assets/vendor/parsley/parsley.min.js') }}"></script>
@endpush

@push('post-scripts')
  <!-- <script>
    new FormValidation().validate('form');
  </script> -->
@endpush

