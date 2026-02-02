<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use App\Service\PriceFormatter;
use Twig\TwigFilter;

class PriceFilter extends AbstractExtension {
    private PriceFormatter $priceFormatter;

    public function __construct(PriceFormatter $priceFormatter) {
        $this->priceFormatter = $priceFormatter;
    }

    public function getFilters(): array {
        return [
            new TwigFilter('price', [$this, 'formatPrice'])
        ];
    }

    public function formatPrice(int $priceCents) :string {
       return $this->priceFormatter->format($priceCents);
    }
}
