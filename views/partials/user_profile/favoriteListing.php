<div class="max-w-7xl mx-auto p-6 bg-white rounded-lg shadow border-gray-200">
  <h2 class="text-2xl font-semibold mb-6">Favorite Books</h2>

  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    
    <!-- Book Card -->
     <?php foreach ($favoriteBooks as $index => $book): ?>
      <div class="bg-white border-gray-200 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition">
        <div class="bg-gray-200 h-48 flex items-center justify-center">
          <img src="<?= $book['images'][0]  ?? 'default.jpg' ?>" alt="" class="w-full h-full object-cover">
        </div>
        <div class="p-4">
          <a href="<?= BASE_URL ?>/book_details/<?= $book['id'] ?>">
            <h3 class="text-lg font-semibold mb-2 hover:text-blue-600"><?= $book['title'] ?></h3">
          </a>
          <p class="text-sm text-gray-500 mb-1">by <?= $book['author'] ?></p>
          <div class="flex items-center justify-between mt-2">
            <span class="text-blue-600 font-bold text-lg">$<?= $book['price'] == 0?'FREE':$book['price'] ?></span>
            <span class="text-xs px-2 py-1 bg-gray-200 rounded-full"><?= $book['book_condition'] ?></span>
          </div>
          <p class="text-sm text-gray-400 mt-2">Listed by Emma L.</p>
          <button class="mt-4 w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-900 transition">Contact Seller</button>
        </div>
      </div>
    <?php endforeach; ?>

  </div>
</div>

<!-- <script>

    jQuery(document).ready(function() {
        jQuery('.delete-btn').on('click', function() {
            if (!confirm('Are you sure you want to delete this book?')) return;
            
            const bookId = jQuery(this).data('book-id');
            /* alert(bookId);
            console.log(bookId); */

            jQuery.ajax({
                url: '<?= BASE_URL ?>/delete_book', 
                type: 'POST',
                data: { book_id: bookId },
                success: function(response) {
                    const res = JSON.parse(response);
                    if (res.success) {
                        location.reload(); 
                    } else {
                        alert(res.message || 'Failed to delete the book.');
                    }
                },
                error: function() {
                    alert('Error while deleting the book.');
                }
            });
        });
    });
</script> -->