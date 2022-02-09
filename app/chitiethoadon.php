<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chitiethoadon extends Model
{

    const     CREATED_AT    = 'cthd_taoMoi';
    const     UPDATED_AT    = 'cthd_capNhat';

    protected $table        = 'chi_tiet_hoa_don';
    protected $fillable     = ['cthd_ma', 'hd_ma','lk_ma','cthd_taoMoi', 'cthd_capNhat', 'cthd_soLuong','cthd_ghichu'];

    protected $guarded      = ['cthd_ma'];
    protected $primaryKey   = 'cthd_ma';

    protected $dates        = ['cthd_taoMoi', 'cthd_capNhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';
}
