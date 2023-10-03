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
                    @foreach ($additions as $addition)
                    <tr>
                        <td>{{ $addition->file }}</td>
                        <td>{{ $addition->game_rank }}</td>
                        <td>{{ $addition->comments }}</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="{{ route('admin.reviewers.show',$addition->id) }}">Reviewed</a>
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


