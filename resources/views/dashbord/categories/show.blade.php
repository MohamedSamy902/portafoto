@extends('admin.layout.master')

@section('content')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>الاقسام الرئيسية</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/admin') }}">الرئيسية</a>
                        </li>
                        <li class="breadcrumb-item active">الاقسام</li>
                    </ol>
                </div>
                <div class="col-sm-6">
                    <!-- Bookmark Start-->
                    <div class="bookmark">
                        <ul>
                            <li>
                                <a href="{{ route('category.create') }}">
                                    <i data-feather="plus"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- Bookmark Ends-->
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <!-- no styling classes styles-->
            <div class="col-sm-12">
                <div class="card">
                    {{-- <div class="card-header">
                        <h5>الاقسام</h5>
                    </div> --}}
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example-style-2">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>الاسم</th>
                                        <th>الموظفين</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>{{ $category->id }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td>
                                                <ul>
                                                    @foreach ($category->permissioncat as $key)
                                                        <li>{{ $key->user->name }}</li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- no styling classes styles Ends-->
        </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection
