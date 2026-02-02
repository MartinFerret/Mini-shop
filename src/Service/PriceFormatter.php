<?php 

namespace App\Service;

class PriceFormatter {
    public function format(int $priceCents) :string {
       return number_format($priceCents / 100, 2, ',', ' ') . ' €';
    }
}
