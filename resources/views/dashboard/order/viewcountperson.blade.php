@extends('dashboard.layout.main')
@section('title')
    <title>Dashboard | Input Kapasitas</title>
@endsection
@section('content')
    <!-- Page Heading -->
    <div class="container">
        <div class="mb-3">
            <link rel="stylesheet" href="/style/progress-indication.css">
            @include('dashboard.order.progressbar')
        </div>

    </div>
    <!-- Content Row -->
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-8 mt-2">
                <div class="card shadow border-0">
                    <div class="card-header">
                        <h5>Search a Room</h5>
                    </div>
                    <div class="card-body">
                        <div class="col-md-auto">
                            <form action="{{ route('chooseroom') }}" method="post">
                                @csrf
                                <input type="text" name="c_id" id="c_id" hidden value="{{ $c_id }}">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="count" class="form-label">How many Person? </label>
                                        <input type="text" autofocus class="form-control" id="count" name='count'
                                            required">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mt-2">
                                        <label for="from" class="form-label">From </label>
                                        <input type="date" class="form-control" id="from" name='from' required">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mt-2">
                                        <label for="to" class="form-label">To </label>
                                        <input type="date" class="form-control" id="to" name='to' required">
                                    </div>
                                </div>
                                <button class="ms-auto btn btn-dark mt-4" type="submit">Submit</button>
                                {{-- <a href="/dashboard/order/chooseroom" >NEXT</a> --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mt-2">
                <div class="card shadow-sm">
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
                        <table>
                            <tr>
                                <td style="text-align: center; width:50px">
                                    <span>
                                        <i class="fas {{ $customer->jk == 'L' ? 'fa-male' : 'fa-female' }}">
                                        </i>
                                    </span>
                                </td>
                                <td>
                                    {{ $customer->name ?? '-' }}
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center; ">
                                    <span>
                                        <i class="fas fa-user-md"></i>
                                    </span>
                                </td>
                                <td>{{ $customer->job ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td style="text-align: center; ">
                                    <span>
                                        <i class="fas fa-birthday-cake"></i>
                                    </span>
                                </td>
                                <td>
                                    {{ Carbon\Carbon::parse($customer->birthdate)->isoformat('D MMM YYYY') }}
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center"><i class="fas fa-phone"></i></td>
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
                                <td style="text-align: center; ">
                                    <span>
                                        <i class="fas fa-map-marker-alt"></i>
                                    </span>
                                </td>
                                <td>
                                    {{ $customer->address ?? '-' }}
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:center"><i class="far fa-id-card"></i></td>
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

@endsection
<!-- End of Main Content -->
