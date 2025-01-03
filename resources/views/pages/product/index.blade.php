@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">@lang('cruds.user.title')</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" style="color: #007bff;">@lang('global.home')</a>
                        </li>
                        <li class="breadcrumb-item active">@lang('cruds.user.title')</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">@lang('cruds.user.title_singular')</h3>
                    @can('user.add')
                        <a href="{{ route('productAdd') }}" class="btn btn-success waves-effect waves-light float-right">
                            <span class="fas fa-plus-circle"></span>
                            @lang('global.add')
                        </a>
                    @endcan
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <!-- Data table -->
                    <table id="datatable" class="table table-bordered  w-100">
                        <thead>
                            <tr>
                                <th>@lang('cruds.user.fields.id')</th>
                                <th>@lang('cruds.user.fields.name')</th>
                                <th>@lang('cruds.user.fields.email')</th>
                   
                                <th class="w-25">@lang('global.actions')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->email }}</td>
                                 
                                    <td class="text-center">
                                        @can('user.delete')
                                            <form action="{{ route('productDestroy', $product->id) }}" method="post">
                                                @csrf
                                                <div class="btn-group">
                                                    @can('user.edit')
                                                        <a href="{{ route('productEdit', $product->id) }}" type="button"
                                                            class="btn btn-sm btn-info waves-effect waves-light">
                                                            @lang('global.edit')</a>
                                                    @endcan
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button type="button"
                                                        class="btn btn-danger btn-sm waves-effect waves-light"
                                                        onclick="if (confirm('Вы уверены?')) { this.form.submit() } ">
                                                        @lang('global.delete')</button>
                                                </div>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
@endsection
