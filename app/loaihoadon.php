<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loaihoadon extends Model
{

    const     CREATED_AT    = 'lhd_taoMoi';
    const     UPDATED_AT    = 'lhd_capNhat';

    protected $table        = 'loai_hoa_don';
    protected $fillable     = ['lhd_ma', 'lhd_ten','lhd_taoMoi', 'lhd_thongTin', 'lhd_capNhat', 'lhd_trangThai'];

    protected $guarded      = ['lhd_ma'];
    protected $primaryKey   = 'lhd_ma';

    protected $dates        = ['lhd_taoMoi', 'lhd_capNhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';
}
