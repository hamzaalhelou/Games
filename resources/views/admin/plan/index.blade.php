@extends('admin.app')

@section('title', 'Dahsboard')

@section('content')
<div class="container">
    <section>
      <div class="container py-5">
        <div class="row text-center align-items-end">
            @foreach($plans as $plan)
        <div class="col-lg-4 mb-5 mb-lg-0">
            <div class="bg-white p-5 rounded-lg shadow">
            <h1 class="h6 text-uppercase font-weight-bold mb-4">{{ $plan->name }}</h1>
            <h2 class="h1 font-weight-bold">${{ $plan->price }}</h2>

            <div class="custom-separator my-4 mx-auto bg-primary"></div>

            <ul class="list-unstyled my-5 text-small text-left font-weight-normal">
                <li class="mb-3">
                <h6>{{ $plan->description }}</h6></li>
            </ul>
            <a href="{{ route('admin.plans.show', $plan->slug) }}" class="btn btn-primary btn-block shadow rounded-pill">Buy Now</a>
            </div>
        </div>
        @endforeach
    </div>
  </div>
</section>

</div>
@stop

