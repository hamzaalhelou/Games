@extends('admin.app')

@section('title', 'Dahsboard')

@section('content')
<!-- Page Heading -->
<div class="card shadow mb-4">
    <div class="card-body">
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="h3 mb-0 m-4">All Roles</h1>
        <a class="btn btn-primary m-4" href="{{ route('admin.roles.create') }}">Add New </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
    <tr >
        <th>ID</th>
        <th>Name</th>
        <th>Actions</th>
    </tr>
    @foreach ($roles as $role)
        <tr>
            <td>{{ $role->id }}</td>
            <td>{{ $role->name }}</td>
            <td>
                <form class="d-inline" method="POST" action="{{ route('admin.roles.destroy', $role->id) }}">
                    @csrf
                    @method('delete')
                    <button onclick="return confirm('Are you sure?!')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                </form>
            </td>
        </tr>
    @endforeach
</thead>
</table>
</div>
</div>
</div>
</div>
{{ $roles->links() }}
@section('scripts')
<script>
  @if (session('msg'))
  Swal.fire({
    icon: "{{ session('type') }}",
    title: "{{ session('msg') }}",
  })
  @endif
</script>
  @endsection
@stop


