<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;

    const PRODUCT_TYPE = 'product_type';
    const GLASS = 'glass';
    const FRAME = 'frame';
    const HANDLE = 'handle';
    const UPGRADE = 'upgrade';
    const UPGRADE_GLASS = 'upgrade_glass';
}
