<?php

namespace App\Controller;

use App\Model\BookCategoryListResponse;
use App\Service\BookCategoryService;
use Nelmio\ApiDocBundle\Attribute\Model;
use OpenApi\Attributes as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BookCategoryController extends AbstractController
{
    public function __construct(private BookCategoryService $bookCategoryService)
    {
    }


    #[Route('/api/v1/book/categories', methods: ['GET'])]
    #[OA\Response(
        response: 200,
        description: "Returns book categories",
        content: new Model(type: BookCategoryListResponse::class)
    )]
    public function categories(): Response
    {
        return $this->json($this->bookCategoryService->getCategories());
    }
}
