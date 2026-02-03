<?php

namespace App\Controller;
use App\Entity\Product;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(ProductRepository $productRepository): Response
    {
        if ($this->getUser()) {
            $this->addFlash('success', 'Welcome to our website!');
        }
        return $this->render('home/index.html.twig', [
            'products' => $productRepository->findForHome(),
        ]);
    }

    #[Route('/about', name: 'app_about')]
    public function about(ProductRepository $productRepository): Response
    {
        return $this->render('about/index.html.twig', [
            'pageTitle' => 'About Page',
            'nbActiveItems' => count($productRepository->findForHome()),
        ]);
    }

    #[Route('/products/{slug}', name: 'app_product_show')]
    public function show(ProductRepository $productRepository, string $slug): Response
    {
        return $this->render('product/show.html.twig', [
            'product' => $productRepository->findOneBy(['slug' => $slug]),
        ]);
    }
}
