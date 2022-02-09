@extends('admin.homeMG')
@section('title')
    Máy Tính Cần Thơ
@endsection


@section('content')
<div style="margin-top:-10%" >
    <div class="card card-nav-tabs card-plain ">
        <ul class="nav nav-pills nav-pills-icons border-bottom border-dark" role="tablist">
            <li class="nav-item">
                <a class=" btn btn-link text-center" style="margin-left:-10%" aria-controls="nav-home" aria-selected="true"
                    data-toggle="tab" href="#link1" role="tablist" aria-expanded="true">
                    <samp style="font-size: 18px">Hệ Thống Quản Lý Bảo hành</samp>
                </a>
            </li>

        </ul>
    </div>
</div>
<div class="page-header "style="background-image: url(img/anhnen/nen-1.jpg); background-size: cover;">
    <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    {{--  --}}

</div>



@endsection
@section('scripts')

    <script>
        $(function() {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)


            $.extend(true, $.fn.dataTable.defaults, {
                order: [
                    [1, 'desc']
                ],
                pageLength: 25,
            });
            $('.datatable-dbs:not(.ajaxTable)').DataTable({
                buttons: dtButtons
            })
            $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });
        })
    </script>


@endsection
