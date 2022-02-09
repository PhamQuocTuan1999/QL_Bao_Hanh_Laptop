<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nhasanxuat extends Model
{

    const     CREATED_AT    = 'nsx_taoMoi';
    const     UPDATED_AT    = 'nsx_capNhat';

    protected $table        = 'nha_san_xuat';
    protected $fillable     = ['nsx_ma', 'nsx_ten','nsx_thongTin','nsx_taoMoi', 'nsx_capNhat', 'lp_trangThai'];

    protected $guarded      = ['nsx_ma'];
    protected $primaryKey   = 'nsx_ma';

    protected $dates        = ['nsx_taoMoi', 'nsx_capNhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';
}
