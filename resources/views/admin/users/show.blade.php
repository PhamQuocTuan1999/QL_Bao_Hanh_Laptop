@extends('admin.CSSKid')
@section('title')
Chi Tiết Nhân Viên
@endsection
@section('content')

<div class="form-group">
    <a class="btn btn-default" href="{{ route('manager.users.index') }}">
        <span class="material-icons">
            keyboard_backspace
        </span> Về Menu chính
    </a>
</div>
<div class="card">
    <div class="card-header text-left card-header-social card-header-text">
        <div class="card-text">
          <h6 class="card-title"> Thông Tin Nhân Viên</h6>
        </div>
      </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.id') }}
                        </th>
                        <td>
                            {{ $user->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.name') }}
                        </th>
                        <td>
                            {{ $user->nv_hoTen }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <td>
                            {{ $user->nv_email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Tài Khoản đăng nhập
                        </th>
                        <td>
                            {{ $user->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                         Vai Trò
                        </th>
                        <td>

                            @foreach($user->roles()->pluck('name') as $role)
                            <span class="badge badge-info">{{ $role }}</span>
                        @endforeach

                        </td>
                    </tr>
                    <tr>
                        <th>
                            Số điện thoại
                        </th>
                        <td>
                            {{ $user->nv_dienThoai }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                           Trạng Thái
                        </th>
                        <td>

                            <span class="label label-info">
                                @if( $user->nv_trangThai ==1) Khóa
                                @else Khả Dụng
                                @endif
                            </span>
                        </td>
                    </tr>
                </tbody>

            </table>

        </div>
    </div>
</div>



@endsection
