@extends('admin.app')

@section('title', 'Dahsboard')

@section('content')
<!-- Page Heading -->
<div class="card shadow mb-4">
    <div class="card-body">
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="h3 mb-0 m-4">All Users</h1>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Actions</th>
                    </tr>
                    @foreach ($Users as $User)
                    <tr>
                        <td>{{ $User->name }}</td>
                        <td>{{ $User->email }}</td>
                        <td>{{ $User->password }}</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="{{ route('admin.users.edit', $User->id) }}"><i class="fas fa-edit"></i></a>
                        </td>
                    </tr>
                @endforeach
                </thead>
            </table>
        </div>
    </div>
</div>
</div>
{{ $Users->links() }}
@section('scripts')
<script>
  @if (session('msg'))
  Swal.fire({
    icon: "{{ session('type') }}",
    title: "{{ session('msg') }}",
    text: "{{session('text')  }}"
  })
  @endif
</script>
  @endsection

@stop


