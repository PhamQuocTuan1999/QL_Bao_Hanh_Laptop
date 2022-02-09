@extends('admin.CSSKid')
@section('title')
 Thông Tin Vai Trò
@endsection
@section('styles')
<!-- Các css dành cho thư viện bootstrap-fileinput -->
<link href="{{ asset('vendor/bootstrap-fileinput/css/fileinput.css') }}" media="all" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
<link href="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.css') }}" media="all" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="form-group">
    <a class="btn btn-default" href="{{ route('admin.roles.index') }}">
        <span class="material-icons">
            keyboard_backspace
        </span>  Về Menu chính
    </a>
</div>
<div class="card">
    <div class="card-header text-left card-header-social card-header-text">
        <div class="card-text">
          <h6 class="card-title"> Sửa Thông Tin Vai Trò</h6>
        </div>
      </div>
    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.role.fields.id') }}
                        </th>
                        <td>
                            {{ $role->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.role.fields.title') }}
                        </th>
                        <td>
                            {{ $role->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Permissions
                        </th>
                        <td>
                            @foreach($role->permissions()->pluck('name') as $permission)
                                <span class="label label-info label-many">{{ $permission }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>

        <nav class="mb-3">
            <div class="nav nav-tabs">

            </div>
        </nav>
        <div class="tab-content">

        </div>
    </div>
</div>
@endsection
