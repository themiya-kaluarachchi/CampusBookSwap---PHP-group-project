<!-- Listing Items -->
<div class="bg-white rounded-xl shadow-sm border border-gray-200">
    <div class="flex items-center justify-between p-6 border-b border-gray-200">
        <h2 class="text-xl font-semibold text-gray-900">My Listings</h2>
        <a href="<?= BASE_URL ?>/add_a_book">
            <button class="bg-gray-900 hover:bg-gray-800 text-white px-4 py-2 rounded-lg font-medium">
                Add New Listing
            </button>
        </a>
    </div>
    <div class="divide-y divide-gray-200">

    <?php foreach ($books as $book): ?>
        <div class="p-6 hover:bg-gray-50 opacity-75">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                   <!--  <div class="w-16 h-20 bg-gray-200 rounded-lg flex items-center justify-center">
                        <img src="uploads/<?= htmlspecialchars($book['cover_image'] ?? 'default.jpg') ?>" alt="<?= htmlspecialchars($book['title']) ?>" class="w-full h-full object-cover rounded-lg">
                    </div> -->
                    <div>
                        <h3 class="font-semibold text-gray-900"><?= htmlspecialchars($book['title']) ?></h3>
                        <p class="text-sm text-gray-500">by <?= htmlspecialchars($book['author']) ?></p>
                        <div class="flex items-center space-x-4 mt-2">
                            <span class="text-2xl font-bold text-blue-600">$<?= htmlspecialchars($book['price']) ?></span>
                            <span class="px-3 py-1 bg-yellow-100 text-yellow-800 text-xs font-medium rounded-full"><?= ucfirst(htmlspecialchars($book['condition'] ?? 'Used')) ?></span>
                            <?php if (!empty($book['is_sold']) && $book['is_sold']): ?>
                                <span class="px-3 py-1 bg-gray-100 text-gray-800 text-xs font-medium rounded-full">Sold</span>
                            <?php endif; ?>
                        </div>
                        <div class="flex items-center space-x-4 mt-2 text-xs text-gray-500">
                            <span class="flex items-center space-x-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                                <span><?= htmlspecialchars($book['views'] ?? 0) ?> views</span>
                            </span>
                            <span>Posted <?= htmlspecialchars($book['posted_time'] ?? 'unknown') ?></span>
                        </div>
                    </div>
                </div>
                <div class="flex items-center space-x-2">
                    <a class="p-2 text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded-lg" title="Edit" href="<?= BASE_URL ?>/edit_book/<?= $book['id'] ?>">
                        <!-- Pencil Icon -->
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                    </a>
                    <button class="p-2 text-gray-400 hover:text-red-600 hover:bg-red-50 rounded-lg delete-btn" title="Delete" data-book-id="<?= $book['id'] ?>">
                        <!-- Trash Icon -->
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    <?php endforeach; ?>    
    </div>
</div>

<script>

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
</script>

  