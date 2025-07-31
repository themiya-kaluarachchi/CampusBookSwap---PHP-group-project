<?php
require_once __DIR__ . '/../models/Book.php';
  class BookController{

    private $bookModel;
    private $bookCount;

    public function __construct($db){
      $this->bookModel = new Book($db);
      $this->bookCount = $_POST['newCount'] ?? 3;
    }

    // Add a new book
   public function addABook() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        $title = trim($_POST['title'] ?? '');
        $author = trim($_POST['author'] ?? '');
        $category = $_POST['category'] ?? '';
        $book_condition = $_POST['book_condition'] ?? '';
        $isFree = isset($_POST['isFree']);
        $price = $isFree ? 0 : trim($_POST['price'] ?? '');
        $description = trim($_POST['description'] ?? '');
        $isbn = trim($_POST['isbn'] ?? '');
        $pages = trim($_POST['pages'] ?? '');
        $edition = trim($_POST['edition'] ?? '');
        $weight = trim($_POST['weight'] ?? '');
        $publisher = trim($_POST['publisher'] ?? '');
        $dimensions = trim($_POST['dimensions'] ?? '');
        $language = trim($_POST['language'] ?? '');

        $userId = $_SESSION['user_id'];
        $views = 0;

        // Create the book
        $bookData = compact(
            'userId', 'title', 'author', 'price', 'category', 'book_condition',
            'description', 'isbn', 'pages', 'edition', 'publisher', 'dimensions',
            'language', 'weight', 'views'
        );
        $bookData['image_path'] = ''; 
        $bookData['user_id'] = $userId;

        if ($this->bookModel->create($bookData)) {
            $bookId = $this->bookModel->getLastInsertId();

            // Upload and store multiple images
            $uploadedPaths = [];
            $uploadDir = 'uploads/';
            foreach ($_FILES['images']['tmp_name'] as $key => $tmpName) {
                if ($_FILES['images']['error'][$key] === UPLOAD_ERR_OK) {
                    $fileName = uniqid() . '_' . basename($_FILES['images']['name'][$key]);
                    $targetPath = $uploadDir . $fileName;
                    if (move_uploaded_file($tmpName, $targetPath)) {
                        $uploadedPaths[] = $targetPath;
                    }
                }
            }

            if (!empty($uploadedPaths)) {
                $this->bookModel->saveImages($bookId, $uploadedPaths);
            }

            echo "Book added successfully!";
            header('Location: ' . BASE_URL . '/browse');
            exit;

            exit;
        } else {
            echo "Failed to add book.";
            require __DIR__ . '/../views/books/addABook.php';
        }
    }else{
       require __DIR__ . '/../views/books/addABook.php';
    }
  }

  // Browse books
public function browse() {

    $limit = isset($_POST['limit']) ? (int)$_POST['limit'] : 6;
    $offset = isset($_POST['offset']) ? (int)$_POST['offset'] : 0;
    $category  = isset($_POST['category']) ? $_POST['category'] : [];
    $condition  = isset($_POST['condition']) ? $_POST['condition'] : [];
    $search  = isset($_POST['search']) ? $_POST['search'] : '';
    $sort = isset($_POST['sort']) ? $_POST['sort'] : '';

    $books = $this->bookModel->getAllWithImages($limit, $offset,$category,$condition,$search,$sort);

    if (
        !empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
        strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest'
    ) {
        require __DIR__ . '/../views/partials/bookGrid.php';
        return;
    }

    require __DIR__ . '/../views/books/browse.php';
}

public function count(){

    header('Content-Type: application/json');
    $count = $this->bookModel->getNumberOfBooks();
    echo json_encode(['count' => $count]);
    exit;
}

  }