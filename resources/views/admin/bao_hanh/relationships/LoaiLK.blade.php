
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("manager.Loai_Linh_Kien.create") }}">
                Thêm Loại Linh Kiện
            </a>
        </div>
    </div>


<div class="card">
    <div class="card-header">

    </div>
    <?php $LoaiLK=DB::select('select * from loai_linh_kien where nsx_ma='.$NSX);

    ?>
    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Room">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            ID Loại Linh Kiện
                        </th>
                        <th>
                            Tên Loại Linh Kiện
                        </th>
                        <th style="text-align: center;">
                           Thông Tin
                        </th>

                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody >
                    <?php
                    $stt = 1;
                    ?>
                     @foreach($LoaiLK as $key => $LoaiLK)
                     <tr data-entry-id="{{ $LoaiLK->llk_ma }}">
                        <td>

                        </td>
                        <td>
                            {{ $loop->index + 1 }}
                        </td>
                        <td>
                            {{ $LoaiLK->llk_ten ?? '' }}
                        </td>
                        <td style="text-align: center;" >
                            {{ $LoaiLK->llk_thongTin?? '' }}
                        </td>

                        <td>



                            <a class="btn  btn-primary" href="{{ route('manager.Loai_Linh_Kien.show', $LoaiLK->llk_ma ) }}">
                                Show
                            </a>


                                <a class="btn  btn-info" href="{{ route('manager.Loai_Linh_Kien.edit', $LoaiLK->llk_ma ) }}">
                                    Edit
                                </a>



                                <form action="{{ route('manager.Loai_Linh_Kien.destroy', $LoaiLK->llk_ma ) }}" method="POST" onsubmit="return confirm('Bạn có chắc không');" style="display: inline-block;">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="submit" style="margin-top: 20px"  class="btn  btn-danger" value="{{ trans('global.delete') }}">
                                </form>








                        </td>

                    </tr>
                        </tr>
                        <?php
                        $stt++;
                        ?>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)


  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-Room:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection
