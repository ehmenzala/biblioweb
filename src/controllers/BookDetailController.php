<?php

class BookDetailController {

    private $bookService;

    function __construct(BookService $bookService) {
        $this->bookService = $bookService;
    }

    public function index(): void {
        $bookId = $_GET['id'];
        $book = $this->bookService->get($bookId);
        require 'src/views/detalle-libro.php';
    }

}
