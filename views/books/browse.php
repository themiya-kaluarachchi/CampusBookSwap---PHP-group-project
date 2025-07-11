<?php
    include './config/book.php';
    $limitBooks = array_slice($sampleBooks, 0, 6);
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
  <div class="flex flex-col lg:flex-row gap-8">
    
    <!-- Sidebar - Filter Section -->
    <div class="lg:w-80 bg-white rounded-3xl shadow-lg p-6 h-fit">
      <h3 class="text-2xl font-bold text-slate-800 mb-6" data-aos="fade-up">
        Filter By
      </h3>
      
      <!-- Filter by Category -->
      <div class="mb-8" data-aos="fade-up" data-aos-delay="100">
        <h4 class="text-lg font-semibold text-slate-700 mb-4">Category</h4>
        <div class="space-y-3">
          <label class="flex items-center cursor-pointer hover:bg-slate-50 rounded-lg p-2 transition-colors">
            <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600 rounded">
            <span class="ml-3 text-slate-600 font-medium">Text Books</span>
          </label>
          <label class="flex items-center cursor-pointer hover:bg-slate-50 rounded-lg p-2 transition-colors">
            <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600 rounded">
            <span class="ml-3 text-slate-600 font-medium">Literature</span>
          </label>
          <label class="flex items-center cursor-pointer hover:bg-slate-50 rounded-lg p-2 transition-colors">
            <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600 rounded">
            <span class="ml-3 text-slate-600 font-medium">Science</span>
          </label>
          <label class="flex items-center cursor-pointer hover:bg-slate-50 rounded-lg p-2 transition-colors">
            <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600 rounded">
            <span class="ml-3 text-slate-600 font-medium">Tech</span>
          </label>
          <label class="flex items-center cursor-pointer hover:bg-slate-50 rounded-lg p-2 transition-colors">
            <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600 rounded">
            <span class="ml-3 text-slate-600 font-medium">Math</span>
          </label>
          <label class="flex items-center cursor-pointer hover:bg-slate-50 rounded-lg p-2 transition-colors">
            <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600 rounded">
            <span class="ml-3 text-slate-600 font-medium">History</span>
          </label>
        </div>
      </div>

      <!-- Filter by Condition -->
      <div class="mb-8" data-aos="fade-up" data-aos-delay="200">
        <h4 class="text-lg font-semibold text-slate-700 mb-4">Condition</h4>
        <div class="space-y-3">
          <label class="flex items-center cursor-pointer hover:bg-slate-50 rounded-lg p-2 transition-colors">
            <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600 rounded">
            <span class="ml-3 text-slate-600 font-medium">New</span>
          </label>
          <label class="flex items-center cursor-pointer hover:bg-slate-50 rounded-lg p-2 transition-colors">
            <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600 rounded">
            <span class="ml-3 text-slate-600 font-medium">Used</span>
          </label>
          <label class="flex items-center cursor-pointer hover:bg-slate-50 rounded-lg p-2 transition-colors">
            <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600 rounded">
            <span class="ml-3 text-slate-600 font-medium">Refurbished</span>
          </label>
        </div>
      </div>

      <!-- Filter Actions -->
      <div class="flex space-x-3">
        <button class="flex-1 bg-blue-600 text-white py-2 px-4 rounded-lg font-medium hover:bg-blue-700 transition-colors">
          Apply Filters
        </button>
        <button class="flex-1 bg-slate-200 text-slate-700 py-2 px-4 rounded-lg font-medium hover:bg-slate-300 transition-colors">
          Clear All
        </button>
      </div>
    </div>

    <!-- Main Content Area -->
    <div class="flex-1">
      
      <!-- Search and Sort Section -->
      <div class="bg-white rounded-3xl shadow-lg p-6 mb-8">
        <div class="flex flex-col sm:flex-row gap-4">
          <div class="flex-1">
            <input 
              type="text" 
              placeholder="Search for a book..." 
              class="w-full px-4 py-3 bg-slate-50 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
            >
          </div>
          <div class="sm:w-48">
            <select class="w-full px-4 py-3 bg-slate-50 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
              <option value="newest">Sort by: Newest</option>
              <option value="oldest">Sort by: Oldest</option>
              <option value="price-low">Price: Low to High</option>
              <option value="price-high">Price: High to Low</option>
              <option value="title">Title: A to Z</option>
            </select>
          </div>
        </div>
      </div>

      <!-- Books Grid -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        <?php foreach ($limitBooks as $index => $book): ?>
          <div class="group relative bg-white rounded-3xl overflow-hidden shadow-lg transition-all duration-500 transform " data-aos="fade-up" data-aos-delay="<?= $index * 100 ?>">
            
            <!-- Love Button -->
            <button class="absolute top-4 right-4 z-10 w-10 h-10 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center shadow-lg hover:shadow-xl transition-all duration-300 group">
              <i data-lucide="heart" class="w-5 h-5 text-slate-400 group-hover:text-red-500 group-hover:scale-110 transition-all"></i>
            </button>

            <!-- Book Image -->
            <div class="relative h-64 bg-gradient-to-br from-slate-100 to-slate-200 overflow-hidden">
              <img 
                src="./assets/images/books/book1.jpg" 
                alt="<?= htmlspecialchars($book['title']) ?>" 
                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
              />
              <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            </div>

            <!-- Book Info -->
            <div class="p-6 space-y-4">
              <div class="flex items-center justify-between">
                <span class="bg-blue-100 text-blue-700 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wide">
                  <?= htmlspecialchars($book['category']) ?>
                </span>
                <span class="bg-green-100 text-green-700 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wide">
                  <?= htmlspecialchars($book['condition']) ?>
                </span>
              </div>
              
              <h3 class="text-xl font-bold text-slate-800 group-hover:text-blue-600 transition-colors line-clamp-2">
                <?= htmlspecialchars($book['title']) ?>
              </h3>
              
              <p class="text-slate-600 font-medium"><?= htmlspecialchars($book['author']) ?></p>
              
              <div class="flex items-center justify-between pt-4 border-t border-slate-100">
                <div class="text-2xl font-black text-blue-600">
                  $<?= htmlspecialchars($book['price'] ?? '45') ?>
                </div>
                <div class="text-sm text-slate-500 font-medium">
                  by <?= htmlspecialchars($book['user_name'] ?? 'Sarah M.') ?>
                </div>
              </div>

              <!-- Action Buttons -->
              <!-- <div class="flex space-x-3 pt-4">
                <button class="flex-1 bg-blue-600 text-white py-2 px-4 rounded-lg font-medium hover:bg-blue-700 transition-colors">
                  View Details
                </button>
                <button class="bg-slate-200 text-slate-700 py-2 px-4 rounded-lg font-medium hover:bg-slate-300 transition-colors">
                  <i data-lucide="message-circle" class="w-4 h-4"></i>
                </button>
              </div> -->
            </div>
          </div>
        <?php endforeach; ?>
      </div>

      <!-- Load More Button -->
      <div class="text-center mt-12 flex items-center justify-center">
        <button class="bg-slate-200 text-slate-700 py-3 px-8 rounded-xl font-medium hover:bg-slate-300 transition-colors">
          previous
        </button>
        <p><span class="mx-4 text-slate-600 font-medium">1</span>of<span class="mx-4 text-slate-600 font-medium">10</span></p>
        <button class="bg-slate-200 text-slate-700 py-3 px-8 rounded-xl font-medium hover:bg-slate-300 transition-colors">
          next
        </button>
      </div>
    </div>

  </div>
</div>