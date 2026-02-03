<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Service\CartService;
use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\Request;

final class CartController extends AbstractController
{
    #[Route('/cart', name: 'app_cart')]
    public function index(CartService $cartService): Response
    {
        return $this->render('cart/index.html.twig', [
           'items' => $cartService->getDetailedItems()
        ]);
    }

    #[Route('/cart/add/{id}', name: 'app_cart_add')]
    public function add (int $id, Request $request, ProductRepository $productRepository, CartService $cartService) {
        $product = $productRepository->find($id);
        $cartService->add($product->getId());
        $this->addFlash('success', 'Product well added to cart.');

        $referer = $request->headers->get('referer');
        return $this->redirect($referer);
    }

    #[Route('/cart/remove/{id}', name: 'app_cart_remove')]
    public function remove (int $id, Request $request, CartService $cartService) {

        $cartService->remove($id);
        $this->addFlash('success', 'Product well removed from cart.');

        $referer = $request->headers->get('referer');
        return $this->redirect($referer);
    }

    #[Route('/cart/clear', name: 'app_cart_clear')]
    public function clear (Request $request, CartService $cartService) {

        $cartService->clear();
        $this->addFlash('success', 'Cart empty.');

        $referer = $request->headers->get('referer');
        return $this->redirect($referer);
    }
}
