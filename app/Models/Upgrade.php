<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upgrade extends Model
{
    use HasFactory;

    const PIECE = 'pcs';
    const SQM = 'sqm';

    protected $fillable = [
        'name',
        'add_on',
        'unit',
    ];

    /**
     * @param mixed $unit
     * @return string
     */
    public static function getUnit(mixed $unit): string
    {
        return trim($unit) == 'per sqm' ? self::SQM : self::PIECE;
    }

    /**
     * @return string
     */
    public function getPriceUnit(): string
    {
        return trim($this->unit) == self::SQM ? 'per sqm' : 'per pcs]';
    }
}
