<?php 

namespace App\Service;

use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\RequestStack;

class CartService {

    private SessionInterface $session;
    private const CART_KEY = 'cart';

    // 1. construct 
    public function __construct(private ProductRepository $productRepository, RequestStack $requestStack) {
        $this->session = $requestStack->getSession();
    }

    // 2. Récupérer le panier entier.
    public function getCart(): array {
       return $this->session->get(self::CART_KEY, []);
    }

    // 3. Ajouter un produit.
    public function add(int $productId): void {
        $cart = $this->getCart();
        if(!isset($cart[$productId])) {
            $cart[$productId] = 0;
        }
        $cart[$productId]++;
        $this->session->set(self::CART_KEY, $cart);
    }

    // 4. Enlever un produit.
    public function remove(int $productId): void {
        $cart = $this->getCart();
        unset($cart[$productId]);
        $this->session->set(self::CART_KEY, $cart);
    }
    // 5. Vider le panier.
    public function clear(): void {
        $this->session->remove(self::CART_KEY);
        // $this->session->set(sefl::CART_KEY, []);
    }

    public function getDetailedItems(): array {
      $items = [];
      foreach($this->getCart() as $productId => $qty) {
        $product = $this->productRepository->find($productId);

        if (!$product) {
            continue;
        }

        $items[] = [
            'product' => $product,
            'qty' => $qty,
        ];
      }
      
      return $items;
    }
}