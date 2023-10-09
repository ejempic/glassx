<?php

namespace App\Models;

class ProductProfile
{
    public int $productType;
    public int $frame;
    public int $glass;
    public string $handle;
    public ?string $upgrade;

    const STANDARD = "STANDARD";
    const DELUXE = "DELUXE";
    const PREMIUM = "PREMIUM";
    const LUXURY = "LUXURY";
    const SLIM_PROFILE = "SLIM PROFILE";
    const CURTAIN_WALL = "CURTAIN WALL";
    const FRAMELESS = "FRAMELESS";

}
