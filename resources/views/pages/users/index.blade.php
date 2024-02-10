@extends('layouts.app')

@section('title', 'Users')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush
@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Users</h1>

                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Users</a></div>
                    <div class="breadcrumb-item"><a href="#">Users</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('users.index') }}"> All Users</a></div>
                </div>
            </div>
            <div class="section-body">
                {{-- <h2 class="section-title">Users</h2>
                <p class="section-lead">
                    You can manage all Users, such as editing, deleting and more.
                </p> --}}
                <div class="row" id="myRow">
                    <div class="col-3 hidden-content" id="myCol">
                        @include('layouts.alert')
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <a href="{{ route('users.create') }}" class="btn btn-primary btn-large">Add New</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>

                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Created At</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($users as $user)
                                                <tr>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>
                                                        @if ($user->role == 'admin')
                                                            <img alt="image" src="{{ asset('img/avatar/avatar-1.png') }}"
                                                                class="rounded-circle" width="35" data-toggle="tooltip"
                                                                title="{{ $user->role }}">
                                                        @elseif ($user->role == 'staff')
                                                            <img alt="image" src="{{ asset('img/avatar/avatar-2.png') }}"
                                                                class="rounded-circle" width="35" data-toggle="tooltip"
                                                                title="{{ $user->role }}">
                                                        @else
                                                            <img alt="image"
                                                                src="{{ asset('img/avatar/avatar-4.png') }}"
                                                                class="rounded-circle" width="35" data-toggle="tooltip"
                                                                title="{{ $user->role }}">
                                                        @endif

                                                    </td>
                                                    <td>{{ $user->created_at->format('d-m-Y') }}</td>
                                                    <td>
                                                        <div class="d-flex justify-content-center">
                                                            <a href="{{ route('users.edit', $user->id) }}"
                                                                class="btn btn-sm btn-primary">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                            <form action="{{ route('users.destroy', $user->id) }}"
                                                                method="POST" class="ml-2">
                                                                <input type="hidden" name="_method" value="DELETE">
                                                                <input type="hidden" name="_token"
                                                                    value="{{ csrf_token() }}">
                                                                <button
                                                                    class="btn btn-sm btn-danger btn-icon confirm-delete">
                                                                    <i class="fas fa-trash"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <script>
            var myCol = document.getElementById("myCol");
            setTimeout(function() {
                myCol.style.display = "none";
            }, 3000);
        </script>
    @endsection
    @push('scripts')
        <!-- JS Libraies -->
        <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

        <!-- Page Specific JS File -->
        <script src="{{ asset('js/page/features-posts.js') }}"></script>
    @endpush
