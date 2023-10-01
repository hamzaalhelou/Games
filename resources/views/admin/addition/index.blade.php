@extends('admin.app')

@section('title', 'Dahsboard')

@section('content')
<!-- Page Heading -->
<div class="card shadow mb-4">
    <div class="card-body">
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="h3 mb-0 m-4">My Demos</h1>
        <a class="btn btn-primary m-4" href="{{ route('admin.additions.create') }}">Add New </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Demo</th>
                        <th>Game Rank</th>
                        <th>Comments</th>
                        <th>Reviewed</th>
                    </tr>
                    @foreach ($additions as $addition)
                    <tr>
                        <td>{{ $addition->created_at }}</td>
                        <td><a href="{{ asset('uploads/files/'.$addition->file) }}" download >{{ $addition->file }}</a></td>
                        <td>{{ $addition->game_rank }}</td>
                        <td>{{ $addition->comments }}</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="{{ route('admin.additions.edit', $addition->id) }}"><i class="fas fa-edit"></i></a>
                            <form class="d-inline" method="POST" action="{{ route('admin.additions.destroy', $addition->id) }}">
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
{{ $additions->links() }}
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


