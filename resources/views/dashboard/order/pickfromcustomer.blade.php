@extends('dashboard.layout.main')
@section('title')
    <title>Dashboard | Pick From Customer</title>
@endsection
@section('content')
    <!-- Page Heading -->
    <div class="container">
        <div class="mb-3">
            <link rel="stylesheet" href="/style/progress-indication.css">
            @include('dashboard.order.progressbar')
        </div>
    </div>

    <div class="container-fluid mt-3">

        <div class="row justify-content-md-center mt-4 my-3">
            <div class="col-lg-8 ">
                <form class="d-flex" method="GET" action="{{ route('pick') }}">
                    @csrf
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                        id="search-user" name="q" value="{{ request()->input('q') }}">
                    <button class="btn btn-outline-dark" type="submit">Search</button>
                </form>
            </div>
        </div>


        <div class="row justify-content-md-center">
            <div class="col-lg-12">
                @if (!empty(request()->input('q')))
                    <h4>Result for "{{ request()->input('q') }}"</h4>
                    <h4>Total Data: {{ $customersCount }}</h4>
                @endif
            </div>
        </div>

        <div class="row justify-content-md-center mt-3">
            <div class="col-sm-10 d-flex mx-auto justify-content-md-center">
                <div class="pagination-block">
                    {{ $customers->onEachSide(1) }}
                </div>
            </div>
        </div>

        <div class="row">
            @foreach ($customers as $customer)
                <div class="col-lg-3 col-md-4 col-sm-6 my-1">
                    <div class="card shadow-sm justify-content-start" style="min-height:350px;">
                        @if ($customer->User)
                            @if ($customer->User->image)
                                <img class="myImages" src="{{ asset('storage/' . $customer->User->image) }}"
                                    style="object-fit: cover; height:250px; border-top-right-radius: 0.5rem; border-top-left-radius: 0.5rem;">
                            @else
                                <img class="myImages" src="/img/default-user.jpg"
                                    style="object-fit: cover; height:250px; border-top-right-radius: 0.5rem; border-top-left-radius: 0.5rem;">
                            @endif
                        @else
                            <img class="myImages" src="/img/default-user.jpg"
                                style="object-fit: cover; height:250px; border-top-right-radius: 0.5rem; border-top-left-radius: 0.5rem;">
                        @endif
                        <div class="card-body">
                            <div class="card-text">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h5 class="mt-0">{{ $customer->name }}
                                                </h5>
                                                <div class="table-responsive">
                                                    <table>
                                                        <tr>
                                                            <td><i class="fas fa-envelope"></i></td>
                                                            <td>
                                                                <span>
                                                                    @if ($customer->User)
                                                                        @if ($customer->User->email)
                                                                            {{ $customer->User->email }}
                                                                        @endif
                                                                    @else
                                                                        -
                                                                    @endif
                                                                </span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><i class="fas fa-user-md"></i></td>
                                                            <td>
                                                                <span>
                                                                    {{ $customer->job }}
                                                                </span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><i class="fas fa-map-marker-alt"></i></td>
                                                            <td style="white-space:nowrap" class="overflow-hidden">
                                                                <span>
                                                                    {{ $customer->address }}
                                                                </span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><i class="fas fa-phone"></i></td>
                                                            <td>
                                                                <span>
                                                                    @if ($customer->User)
                                                                        @if ($customer->User->telp)
                                                                            0{{ $customer->User->telp }}
                                                                        @else
                                                                            -
                                                                        @endif
                                                                    @else
                                                                        -
                                                                    @endif
                                                                </span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><i class="fas fa-birthday-cake"></i></td>
                                                            <td>
                                                                <span>
                                                                    {{ $customer->birthdate }}
                                                                </span>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td><i class="far fa-id-card"></i></td>
                                                            <td>
                                                                <span>
                                                                    {{ $customer->nik ?? '-' }}
                                                                </span>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="d-grid gap-2 col-6 mx-auto">
                                        <form action="{{ route('countperson') }}" method="POST"> @csrf
                                            <input type="hidden" name="customer" value="{{ $customer->id }}">
                                            <BUTTON class="btn btn-primary">Choose</BUTTON>
                                        </form>
                                        {{-- <a href="{{ route('countperson', ['customer' => $customer->id]) }}"class="btn btn-primary">Choose</a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row justify-content-md-center mt-3">
            <div class="col-sm-10 d-flex mx-auto justify-content-md-center">
                <div class="pagination-block">
                    {{-- {{ $customers->onEachSide(1)->links('template.paginationlinks') }} --}}
                </div>
            </div>
        </div>
    </div>
@endsection
<!-- End of Main Content -->
