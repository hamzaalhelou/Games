@extends('admin.app')

@section('title', 'Dahsboard')

@section('content')
<!-- Page Heading -->
<div class="card shadow mb-4">
    <div class="card-body">
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="h3 mb-0 m-4">Reviewer</h1>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Demo</th>
                        <th>Game Rank</th>
                        <th>Comments</th>
                        <th>Reviewed</th>
                    </tr>
                    @foreach ($reviewers as $reviewer)
                    <tr>
                        <td><a href="{{ asset('uploads/files/'.$reviewer->file) }}" >{{ $reviewer->file->file }}</a></td>
                        <td>{{ $reviewer->files->game_rank }}</td>
                        <td>{{ $reviewer->files->comments }}</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="{{ route('admin.reviewers.edit', $reviewer->id) }}"><i class="fas fa-edit"></i></a>
                            <form class="d-inline" method="POST" action="{{ route('admin.reviewers.destroy', $reviewer->id) }}">
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
{{ $reviewers->links() }}
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


