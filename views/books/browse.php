<?php
    include './config/book.php';
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
            <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600 rounded filter-category" value="TextBooks">
            <span class="ml-3 text-slate-600 font-medium">Text Books</span>
          </label>
          <label class="flex items-center cursor-pointer hover:bg-slate-50 rounded-lg p-2 transition-colors">
            <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600 rounded filter-category" value="Literature">
            <span class="ml-3 text-slate-600 font-medium">Literature</span>
          </label>
          <label class="flex items-center cursor-pointer hover:bg-slate-50 rounded-lg p-2 transition-colors">
            <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600 rounded filter-category" value="Science">
            <span class="ml-3 text-slate-600 font-medium">Science</span>
          </label>
          <label class="flex items-center cursor-pointer hover:bg-slate-50 rounded-lg p-2 transition-colors">
            <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600 rounded filter-category" value="Tech">
            <span class="ml-3 text-slate-600 font-medium">Tech</span>
          </label>
          <label class="flex items-center cursor-pointer hover:bg-slate-50 rounded-lg p-2 transition-colors">
            <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600 rounded filter-category" value="Mathematics" >
            <span class="ml-3 text-slate-600 font-medium">Mathematics</span>
          </label>
          <label class="flex items-center cursor-pointer hover:bg-slate-50 rounded-lg p-2 transition-colors">
            <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600 rounded filter-category" value="History">
            <span class="ml-3 text-slate-600 font-medium">History</span>
          </label>
          <label class="flex items-center cursor-pointer hover:bg-slate-50 rounded-lg p-2 transition-colors">
            <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600 rounded filter-category" value="Other">
            <span class="ml-3 text-slate-600 font-medium">Other</span>
          </label>
        </div>
      </div>

      <!-- Filter by Condition -->
      <div class="mb-8" data-aos="fade-up" data-aos-delay="200">
        <h4 class="text-lg font-semibold text-slate-700 mb-4">Condition</h4>
        <div class="space-y-3">
          <label class="flex items-center cursor-pointer hover:bg-slate-50 rounded-lg p-2 transition-colors">
            <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600 rounded filter-condition"value="New">
            <span class="ml-3 text-slate-600 font-medium">New</span>
          </label>
          <label class="flex items-center cursor-pointer hover:bg-slate-50 rounded-lg p-2 transition-colors">
            <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600 rounded filter-condition" value="Used">
            <span class="ml-3 text-slate-600 font-medium">Used</span>
          </label>
          <label class="flex items-center cursor-pointer hover:bg-slate-50 rounded-lg p-2 transition-colors">
            <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600 rounded filter-condition" value="Refurbished">
            <span class="ml-3 text-slate-600 font-medium">Refurbished</span>
          </label>
           <label class="flex items-center cursor-pointer hover:bg-slate-50 rounded-lg p-2 transition-colors">
            <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600 rounded filter-condition" value="Poor">
            <span class="ml-3 text-slate-600 font-medium">Poor</span>
          </label>
        </div>
      </div>

      <!-- Filter Actions -->
      <div class="flex space-x-3">
        <button class="flex-1 bg-blue-600 text-white py-2 px-4 rounded-lg font-medium hover:bg-blue-700 transition-colors apply-filters">
          Apply Filters
        </button>
        <button class="flex-1 bg-slate-200 text-slate-700 py-2 px-4 rounded-lg font-medium hover:bg-slate-300 transition-colors clear-filters">
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
              id = "searchInput"
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
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 book-grid">
        
      </div>

      <!-- Load More Button -->
      <div class="text-center mt-12 flex items-center justify-center">
        <button class="bg-slate-200 text-slate-700 py-3 px-8 rounded-xl font-medium hover:bg-slate-300 transition-colors prev-btn">
          previous
        </button>
        <p>
          <span class="mx-4 text-slate-600 font-medium current-page">1</span>
          of
          <span class="mx-4 text-slate-600 font-medium total-pages">?</span>
        </p>

        <button class="bg-slate-200 text-slate-700 py-3 px-8 rounded-xl font-medium hover:bg-slate-300 transition-colors next-btn">
          next
        </button>
      </div>
    </div>

  </div>
</div>

<script>
  jQuery(document).ready(function () {
    let currentPage = 1;
    const limit = 6;
    let totalPages = 1;

    // Get selected filters
    function getSelectedFilters(className) {
      const selected = [];
      jQuery(`input.${className}:checked`).each(function () {
        selected.push(jQuery(this).val());
      });
      return selected;
    }



    function loadBooks(page) {

      const offset = (page - 1) * limit;
      const selectedCategory = getSelectedFilters('filter-category');
      const selectedCondition = getSelectedFilters('filter-condition');
      let selectedTitle = jQuery('#searchInput').val();

      console.log(selectedCategory, selectedCondition);

      jQuery('.book-grid').html('<div class="text-center py-12">Loading...</div>');

      jQuery.ajax({
        url: '<?= BASE_URL ?>/browse',
        method: 'POST',
        data: { limit: limit, offset: offset, category: selectedCategory, condition: selectedCondition, title: selectedTitle },
        success: function (response) {
          jQuery('.book-grid').html(response);
          jQuery('.current-page').text(page);

          // Show/hide pagination buttons
          jQuery('.prev-btn').toggle(page > 1);
          jQuery('.next-btn').toggle(page < totalPages);
        },
        error: function () {
          alert('Failed to load books');
        }
      });
    }

    // Get total book count
    jQuery.ajax({
      url: '<?= BASE_URL ?>/count',
      method: 'POST', 
      success: function (response) {
        const bookCount = parseInt(response.count); 
        totalPages = Math.ceil(bookCount / limit);
        jQuery('.current-page').text(currentPage);
        jQuery('.total-pages').text(totalPages);
        loadBooks(currentPage);
      },
      error: function () {
        alert('Failed to count books');
      }
    });

    // Pagination
    jQuery('.next-btn').click(function () {
      if (currentPage < totalPages) {
        currentPage++;
        loadBooks(currentPage);
      }
    });

    jQuery('.prev-btn').click(function () {
      if (currentPage > 1) {
        currentPage--;
        loadBooks(currentPage);
      }
    });

    // Apply Filters
    jQuery('.apply-filters').click(function () {
      currentPage = 1;
      //updateTotalPagesAndLoad(currentPage);
      loadBooks(currentPage);
    });

    // Clear Filters
    jQuery('.clear-filters').click(function () {
        jQuery('.filter-category, .filter-condition').prop('checked', false);
        currentPage = 1;
        loadBooks(currentPage);
    });

    // Update Total Pages and Load Books
    function updateTotalPagesAndLoad(page) {
      currentPage = page;
      jQuery.ajax({
        url: '<?= BASE_URL ?>/count',
        method: 'POST',
        data: { title: jQuery('#searchInput').val() },
        success: function (response) {
          const bookCount = parseInt(response.count);
          totalPages = Math.ceil(bookCount / limit);
          jQuery('.current-page').text(currentPage);
          jQuery('.total-pages').text(totalPages);
          loadBooks(currentPage);
        },
        error: function () {
          alert('Failed to count books');
        }
      });
    }

    // Search
     let searchTimeout;
      jQuery('#searchInput').on('input', function () {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(() => {
          updateTotalPagesAndLoad(1);
        }, 400); 
      });


  });
</script>
