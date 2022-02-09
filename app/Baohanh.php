<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Baohanh extends Model
{

    const     CREATED_AT    = 'bh_taoMoi';
    const     UPDATED_AT    = 'bh_capNhat';

    protected $table        = 'Bao_Hanh';
    protected $fillable     = ['bh_ma', 'bh_ten','bh_dich','bh_thongTin','bh_taoMoi', 'bh_capNhat', 'bh_trangThai'];

    protected $guarded      = ['bh_ma'];
    protected $primaryKey   = 'bh_ma';

    protected $dates        = ['nsx_taoMoi', 'nsx_capNhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';
}
