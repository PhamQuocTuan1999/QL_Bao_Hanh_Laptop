<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loailinhkien extends Model
{

    const     CREATED_AT    = 'llk_taoMoi';
    const     UPDATED_AT    = 'llk_capNhat';

    protected $table        = 'loai_linh_kien';
    protected $fillable     = ['llk_ma', 'llk_ten','llk_taoMoi', 'llk_thongTin', 'llk_capNhat', 'llk_trangThai'];

    protected $guarded      = ['llk_ma'];
    protected $primaryKey   = 'llk_ma';

    protected $dates        = ['llk_taoMoi', 'llk_capNhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';
}
