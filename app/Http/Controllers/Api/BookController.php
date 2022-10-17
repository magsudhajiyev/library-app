<?php

namespace App\Http\Controllers\Api;

use App\Services\BookService;
use App\Http\Requests\BookStoreRequest;
use GuzzleHttp\Psr7\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Request as FacadesRequest;

class BookController extends BaseController
{
    protected BookService $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    public function store(BookStoreRequest $request): JsonResponse
    {
        try {
            $result = $this->bookService->store($request);
        } catch (\Exception $e) {
            $result = [
              'status' => 500,
              'error' => $e->getMessage()
            ];
        }

        return $this->jsonResponse($result, $result['status']);
    }

    public function find($id): JsonResponse
    {
        try {
            $result = $this->bookService->find($id);
        } catch (\Exception $e) {
            $result = [
              'status' => 500,
              'error' => $e->getMessage()
            ];
        }

        return $this->jsonResponse($result, $result['status']);
    }

    public function update(HttpRequest $request, $id): JsonResponse
    {
        try {
            $result = $this->bookService->update($id, $request->all());
        } catch (\Exception $e) {
            $result = [
              'status' => 500,
              'error' => $e->getMessage()
            ];
        }

        return $this->jsonResponse($result, $result['status']);
    }

    public function delete($id): JsonResponse
    {
        try {
            $result = $this->bookService->delete($id);
        } catch (\Exception $e) {
            $result = [
              'status' => 500,
              'error' => $e->getMessage()
            ];
        }

        return $this->jsonResponse($result, $result['status']);
    }
}
