@extends('layouts.app')

@section('title', 'Products')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush
@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Products</h1>

                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Product</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('products.index') }}"> All Product</a></div>
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
                                <a href="{{ route('products.create') }}" class="btn btn-primary btn-large">Add New</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Image</th>
                                                <th>Category</th>
                                                <th>Price</th>
                                                <th class="text-center">Status</th>
                                                <th>Created At</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = 1;
                                            @endphp
                                            @foreach ($products as $product)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $product->name }}</td>
                                                    <td>
                                                        @if ($product->image)
                                                            <img src="{{ asset($product->image) }}" alt="Product Image"
                                                                style="width: 100px; height: 100px;">
                                                        @else
                                                            <span class="badge badge-secondary">No Image</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $product->category->name }}</td>
                                                    <td>{{ $product->price }}</td>
                                                    <td class="text-center">
                                                        @if ($product->status == 1)
                                                            <i class="fas fa-square-check text-success"
                                                                style="font-size: 24px;" data-toggle="tooltip"
                                                                title="Active"></i>
                                                        @else
                                                            <i class="fas fa-square-xmark text-danger"
                                                                style="font-size: 24px;" data-toggle="tooltip"
                                                                title="Inactive"></i>
                                                        @endif
                                                    </td>
                                                    <td>{{ $product->created_at->format('d-m-Y') }}</td>

                                                    <td>
                                                        <div class="d-flex justify-content-center">
                                                            <a href="{{ route('products.edit', $product->id) }}"
                                                                class="btn btn-sm btn-primary">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                            <form action="{{ route('products.destroy', $product->id) }}"
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
