<!-- Content -->
<div class="container mx-auto px-4 py-8 pt-24">
    <div class="max-w-6xl mx-auto">
        <div class="mb-8">
            <h1 class="text-4xl font-bold text-gray-900 mb-2">
                Edit Your Book
            </h1>
            <p class="text-gray-600">
                Share your books with fellow students and help build our community
            </p>
        </div>

        
        <div class="grid lg:grid-cols-1 gap-8">
            <!-- Left Column -->
            <!-- Book Form -->
            <div class="bg-white rounded-lg shadow border border-gray-200 p-6">
                <h2 class="text-xl font-bold mb-4">
                    Book Details
                </h2>
                <!-- Form Start here -->
                <form method="post"  class="space-y-6" id="bookForm" action="<?= BASE_URL ?>/edit_a_book">
                    <!-- Title -->
                    <input type="hidden" name="book_id" value="<?= $book['id'] ?? '' ?>">
                    <div class="space-y-2">
                        <label for="title" class="block font-medium">Book Title *</label>
                        <input type="text" id="title" name="title" required placeholder="Enter the book title"
                          class="w-full border border-blue-200 rounded px-4 py-2 focus:outline-none focus:ring-blue-300 focus:border-blue-400"
                          value="<?= htmlspecialchars($book['title']??''); ?>">
                    </div>

                    <!-- Author -->
                    <div class="space-y-2">
                        <label for="author" class="block font-medium">Author *</label>
                        <input type="text" id="author" name="author" required placeholder="Enter the author's name"
                               class="w-full border border-blue-200 rounded px-4 py-2 focus:outline-none focus:ring-blue-300 focus:border-blue-400" value="<?= htmlspecialchars($book['author']??''); ?>">
                     </div>

                     <!-- Category & Condition -->
                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-2">
                            <label for="category" class="block font-medium">
                                Category *
                            </label>
                            <select name="category" id="category" required
                                  class="w-full border border-blue-200 rounded px-4 py-2 focus:outline-none focus:ring-blue-300 focus:border-blue-400">
                              <option value="textbooks" <?= $book['category'] === 'textbooks' ? 'selected' : '' ?>>Textbooks</option>
                              <option value="literature" <?= $book['category'] === 'literature' ? 'selected' : '' ?>>Literature</option>
                              <option value="science" <?= $book['category'] === 'science' ? 'selected' : '' ?>>Science</option>
                              <option value="tech" <?= $book['category'] === 'tech' ? 'selected' : '' ?>>Technology</option>
                              <option value="math" <?= $book['category'] === 'math' ? 'selected' : '' ?>>Mathematics</option>
                              <option value="history" <?= $book['category'] === 'history' ? 'selected' : '' ?>>History</option>
                              <option value="other" <?= $book['category'] === 'other' ? 'selected' : '' ?>>Other</option>
                          </select>

                        </div>
                        <div class="space-y-2">
                            <label for="condition" class="block font-medium">Condition *</label>
                            <select name="book_condition" id="condition" required
                              class="w-full border border-blue-200 rounded px-4 py-2 focus:outline-none focus:ring-blue-300 focus:border-blue-400">
                              <option value="new" <?= $book['book_condition'] === 'new' ? 'selected' : '' ?>>New</option>
                              <option value="like-new" <?= $book['book_condition'] === 'like-new' ? 'selected' : '' ?>>Like New</option>
                              <option value="used" <?= $book['book_condition'] === 'used' ? 'selected' : '' ?>>Used</option>
                              <option value="poor" <?= $book['book_condition'] === 'poor' ? 'selected' : '' ?>>Poor</option>
                            </select>
                        </div>
                    </div>

                    <!-- Donate or Price -->
                    <div class="space-y-4">
                      <input type="checkbox" id="freeCheckbox" name="isFree" value="1" class="accent-blue-500 h-4 w-4"
                      <?= isset($book['price']) == 0 ? 'checked' : '' ?>>
                      <label for="free" class="font-medium">Donate for free</label>

                      <!-- Price -->
                      <input type="number" id="price" name="price" step="0.01" placeholder="0.00"
                      class="w-full border border-blue-200 rounded px-4 py-2 focus:outline-none focus:ring-blue-300 focus:border-blue-400"
                      value="<?= !$book['price'] == 0 ? htmlspecialchars($book['price']) : 'FREE' ?>">
                    </div>

                    <!-- Description -->
                    <div class="space-y-2">
                        <label for="description" class="block font-medium">Description</label>
                        <textarea id="description" name="description" rows="4"
                          placeholder="Describe the book's condition, any highlights, missing pages, etc."
                          class="w-full border border-blue-200 rounded px-4 py-2 focus:outline-none focus:ring-blue-300 focus:border-blue-400"><?= htmlspecialchars($book['description']??'') ?>
                        </textarea>
                    </div>

                    <!-- Book Image Upload -->
                    

                    <?php if (!empty($book['images'])): ?>
                      <div id="imagePreview" class="flex flex-wrap gap-2 mt-2">
                          <?php foreach ($book['images'] as $image): ?>
                              <div class="relative w-24 h-24 border rounded overflow-hidden">
                                  <img src="../<?= htmlspecialchars($image) ?>" 
                                      alt="Book Image"
                                      class="object-cover w-full h-full" />
                              </div>
                          <?php endforeach; ?>
                      </div>
                  <?php else: ?>
                      <div id="imagePreview" class="hidden flex flex-wrap gap-2 mt-2"></div>
                  <?php endif; ?>

                    <h2 class="text-xl font-bold mb-4">Extra Book Details</h2>
                    <!-- Extra Book Details -->
                    <div class="grid grid-cols-2 gap-4">
                      <input type="text" id="isbn" name="isbn" placeholder="e.g., 978-0262033848"
                        class="w-full border border-blue-200 rounded px-4 py-2"
                        value="<?= htmlspecialchars($book['isbn'] ?? '') ?>">

                      <input type="number" id="pages" name="pages" placeholder="e.g., 1312"
                        class="w-full border border-blue-200 rounded px-4 py-2"
                        value="<?= htmlspecialchars($book['pages'] ?? '') ?>">

                      <input type="text" id="edition" name="edition" placeholder="e.g., 3rd Edition"
                        class="w-full border border-blue-200 rounded px-4 py-2"
                        value="<?= htmlspecialchars($book['edition'] ?? '') ?>">

                      <input type="text" id="weight" name="weight" placeholder="e.g., 3.2 lbs"
                        class="w-full border border-blue-200 rounded px-4 py-2"
                        value="<?= htmlspecialchars($book['weight'] ?? '') ?>">

                      <input type="text" id="publisher" name="publisher" placeholder="e.g., MIT Press"
                        class="w-full border border-blue-200 rounded px-4 py-2"
                        value="<?= htmlspecialchars($book['publisher'] ?? '') ?>">

                      <input type="text" id="dimensions" name="dimensions" placeholder="e.g., 9.2 x 7.5 x 2.2 inches"
                        class="w-full border border-blue-200 rounded px-4 py-2"
                        value="<?= htmlspecialchars($book['dimensions'] ?? '') ?>">

                      <input type="text" id="language" name="language" placeholder="e.g., English"
                        class="w-full border border-blue-200 rounded px-4 py-2"
                        value="<?= htmlspecialchars($book['language'] ?? '') ?>">
                    </div>

                    <!-- Submit Buttons -->
                    <div class="flex gap-4">
                        <button type="submit"
                                class="flex-1 bg-blue-500 text-white font-semibold px-4 py-2 rounded hover:bg-blue-600" id="submitButton">
                            Update
                        </button>
                        <button type="reset"
                                class="flex-1 border border-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-100">
                            Clear
                        </button>
                    </div>
                </form>
            </div>

            <!-- Right Column -->
             
        </div>
    </div>
</div>

<?php if (!empty($book['images'])): ?>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const sliderContainer = document.getElementById('imageSlider');
    const sliderTrack = document.getElementById('sliderTrack');
    const previewContainer = document.getElementById('imagePreview');
    const defaultContent = document.getElementById('uploadDefault');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');

    const images = <?= json_encode($book['images']) ?>;

    // Show containers
    sliderContainer.classList.remove('hidden');
    previewContainer.classList.remove('hidden');
    defaultContent.classList.add('hidden');

    prevBtn.classList.toggle('hidden', images.length <= 1);
    nextBtn.classList.toggle('hidden', images.length <= 1);

    images.forEach(url => {
        // Add to preview box
        const previewImg = document.createElement('img');
        previewImg.src = url;
        previewImg.classList.add('w-24', 'h-24', 'object-cover', 'rounded', 'shadow-sm', 'border');
        previewContainer.appendChild(previewImg);

        // Add to slider
        const sliderImg = document.createElement('img');
        sliderImg.src = url;
        sliderImg.className = 'w-full h-full object-contain flex-shrink-0';
        sliderTrack.appendChild(sliderImg);
    });

    currentIndex = 0;
    updateSlider(); // you already defined this function
});
</script>
<?php endif; ?>


<script>


   /*  document.addEventListener("DOMContentLoaded", function () {
        const form = document.getElementById("addBookForm");

        <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($bookId)) : ?>
        // Reset form after successful submit
        alert("Book added successfully!");
        form.reset();
        <?php endif; ?>
    });
 */

  // Initialize Lucide icons
  lucide.createIcons();

  // Price disable 
  const freeCheckbox = document.getElementById('freeCheckbox');
  const priceInput = document.getElementById('price');

  freeCheckbox.addEventListener('change', () => {
    if (freeCheckbox.checked) {
      priceInput.disabled = true;
      priceInput.value = ''; 
      priceInput.classList.add('bg-gray-100', 'cursor-not-allowed'); 
    } else {
      priceInput.disabled = false;
      priceInput.classList.remove('bg-gray-100', 'cursor-not-allowed');
    }
    updatePreview(); // update live preview if needed
  });

  function togglePriceInput(checkbox) {
        document.getElementById('priceInput').style.display = checkbox.checked ? 'none' : 'block';
    }

    // Image preview
    const imageInput = document.getElementById('bookImages');
    const sliderTrack = document.getElementById('sliderTrack');
    const sliderContainer = document.getElementById('imageSlider');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    let currentIndex = 0;

    document.getElementById('bookImages').addEventListener('change', function () {
    const files = Array.from(this.files).slice(0, 3);
    const previewContainer = document.getElementById('imagePreview');
    const defaultContent = document.getElementById('uploadDefault');
    const sliderTrack = document.getElementById('sliderTrack');
    const sliderContainer = document.getElementById('imageSlider');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');

    previewContainer.innerHTML = '';
    sliderTrack.innerHTML = '';

    if (files.length > 3) {
        alert('You can upload a maximum of 3 images.');
        this.value = '';
        previewContainer.classList.add('hidden');
        defaultContent.classList.remove('hidden');
        sliderContainer.classList.add('hidden');
        return;
    }

    if (files.length === 0) {
        previewContainer.classList.add('hidden');
        defaultContent.classList.remove('hidden');
        sliderContainer.classList.add('hidden');
        return;
    }

    // Show both image preview and slider
    previewContainer.classList.remove('hidden');
    defaultContent.classList.add('hidden');
    sliderContainer.classList.remove('hidden');
    prevBtn.classList.toggle('hidden', files.length <= 1);
    nextBtn.classList.toggle('hidden', files.length <= 1);

    let index = 0;

    files.forEach(file => {
        const reader = new FileReader();
        reader.onload = function (e) {
            // Preview (box)
            const previewImg = document.createElement('img');
            previewImg.src = e.target.result;
            previewImg.classList.add('w-24', 'h-24', 'object-cover', 'rounded', 'shadow-sm', 'border');
            previewContainer.appendChild(previewImg);

            // Slider (live preview)
            const sliderImg = document.createElement('img');
            sliderImg.src = e.target.result;
            sliderImg.className = 'w-full h-full object-contain flex-shrink-0';
            sliderTrack.appendChild(sliderImg);
        };
        reader.readAsDataURL(file);
    });

    currentIndex = 0;
    updateSlider();
});


   function updateSlider() {
        const slideWidth = document.getElementById('imageSlider').clientWidth;
        document.getElementById('sliderTrack').style.transform = `translateX(-${currentIndex * slideWidth}px)`;
    }

    prevBtn.addEventListener('click', () => {
        currentIndex = Math.max(currentIndex - 1, 0);
        updateSlider();
    });

    nextBtn.addEventListener('click', () => {
        const total = sliderTrack.children.length;
        currentIndex = Math.min(currentIndex + 1, total - 1);
        updateSlider();
    });


    // Text/inputs preview
    const inputs = ['title', 'author', 'category', 'condition', 'description', 'price', 'freeCheckbox'];
    inputs.forEach(id => {
        const el = document.getElementById(id);
        if (el) {
            el.addEventListener('input', updatePreview);
            el.addEventListener('change', updatePreview);
        }
    });

    function updatePreview() {
        document.getElementById('previewTitle').innerText = document.getElementById('title').value || 'Title';
        document.getElementById('previewAuthor').innerText = document.getElementById('author').value || 'Author';
        document.getElementById('previewCategory').innerText = document.getElementById('category').value || 'Category';
        document.getElementById('previewCondition').innerText = document.getElementById('condition').value || 'Condition';
        document.getElementById('previewDescription').innerText = document.getElementById('description').value || 'Description';

        const isFree = document.getElementById('freeCheckbox').checked;
        const previewPrice = document.getElementById('previewPrice');
        if (isFree) {
            previewPrice.innerHTML = `<span class="text-blue-600 font-bold text-lg">FREE</span>`;
        } else {
            const priceVal = document.getElementById('price').value;
            previewPrice.innerHTML = `<span class="text-green-600 font-bold text-lg">Rs. ${priceVal || '0.00'}</span>`;
        }
    }

    // Initialize preview with default values
    updatePreview();
</script>

