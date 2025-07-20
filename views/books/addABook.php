<?php
    $errors = [];
    $submitted = false;
    $uploadDir = 'uploads/';
    $uploadedImages = [];

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Basic validation
        $title = trim($_POST['title'] ?? '');
        $author = trim($_POST['author'] ?? '');
        $category = $_POST['category'] ?? '';
        $condition = $_POST['condition'] ?? '';
        $isFree = isset($_POST['isFree']) ? true : false;
        $price = $isFree ? 0 : trim($_POST['price'] ?? '');
        $description = trim($_POST['description'] ?? '');

        if (!$title || !$author || !$category || !$condition || (!$isFree && !$price)) {
            $errors[] = "Please fill all required fields.";
        }

        // Handle file upload (max 3)
        if (isset($_FILES['images']) && count($_FILES['images']['name']) > 0) {
            for ($i = 0; $i < min(3, count($_FILES['images']['name'])); $i++) {
                $tmpName = $_FILES['images']['tmp_name'][$i];
                $name = basename($_FILES['images']['name'][$i]);
                $size = $_FILES['images']['size'][$i];
                $type = mime_content_type($tmpName);
                $allowedTypes = ['image/jpeg', 'image/png'];

                if ($size > 5 * 1024 * 1024 || !in_array($type, $allowedTypes)) {
                    $errors[] = "Each image must be PNG or JPG and less than 5MB.";
                    continue;
                }

                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir);
                }

                $targetFile = $uploadDir . time() . '-' . $name;
                if (move_uploaded_file($tmpName, $targetFile)) {
                    $uploadedImages[] = $targetFile;
                } else {
                    $errors[] = "Failed to upload image: $name";
                }
            }
        }

        if (empty($errors)) {
            $submitted = true;
        }
    }
?>

<!-- Content -->
<div class="container mx-auto px-4 py-8 pt-24">
    <div class="max-w-6xl mx-auto">
        <div class="mb-8">
            <h1 class="text-4xl font-bold text-gray-900 mb-2">
                List Your Book
            </h1>
            <p class="text-gray-600">
                Share your books with fellow students and help build our community
            </p>
        </div>

        
        <div class="grid lg:grid-cols-2 gap-8">
            <!-- Left Column -->
            <!-- Book Form -->
            <div class="bg-white rounded-lg shadow border border-gray-200 p-6">
                <h2 class="text-xl font-bold mb-4">
                    Book Details
                </h2>
                <!-- Form Start here -->
                <form method="post" enctype="multipart/form-data" class="space-y-6">
                    <!-- Title -->
                    <div class="space-y-2">
                        <label for="title" class="block font-medium">Book Title *</label>
                        <input type="text" id="title" name="title" required placeholder="Enter the book title"
                               class="w-full border border-blue-200 rounded px-4 py-2 focus:outline-none focus:ring-blue-300 focus:border-blue-400">
                    </div>

                    <!-- Author -->
                    <div class="space-y-2">
                        <label for="author" class="block font-medium">Author *</label>
                        <input type="text" id="author" name="author" required placeholder="Enter the author's name"
                               class="w-full border border-blue-200 rounded px-4 py-2 focus:outline-none focus:ring-blue-300 focus:border-blue-400">
                     </div>

                     <!-- Category & Condition -->
                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-2">
                            <label for="category" class="block font-medium">
                                Category *
                            </label>
                            <select name="category" id="category" required
                                    class="w-full border border-blue-200 rounded px-4 py-2 focus:outline-none focus:ring-blue-300 focus:border-blue-400">
                                <option value="">Select category</option>
                                    <option value="textbooks">Textbooks</option>
                                    <option value="literature">Literature</option>
                                    <option value="science">Science</option>
                                    <option value="tech">Technology</option>
                                    <option value="math">Mathematics</option>
                                    <option value="history">History</option>
                                    <option value="other">Other</option> 
                            </select>
                        </div>
                        <div class="space-y-2">
                            <label for="condition" class="block font-medium">Condition *</label>
                            <select name="condition" id="condition" required
                                    class="w-full border border-blue-200 rounded px-4 py-2 focus:outline-none focus:ring-blue-300 focus:border-blue-400">
                            <option value="">Select condition</option>
                            <option value="new">New</option>
                            <option value="like-new">Like New</option>
                            <option value="used">Used</option>
                            <option value="poor">Poor</option>
                            </select>
                        </div>
                    </div>

                    <!-- Donate or Price -->
                    <div class="space-y-4">
                        <div class="flex items-center space-x-2">
                            <input type="checkbox" id="freeCheckbox" name="isFree" value="1"
                                class="accent-blue-500 h-4 w-4">
                            <label for="free" class="font-medium">Donate for free</label>
                        </div>

                        <div class="space-y-2">
                            <label for="price" class="block font-medium">Price (Rs) *</label>
                            <input type="text" id="price" name="price" step="0.01" placeholder="0.00"
                                class="w-full border border-blue-200 rounded px-4 py-2 focus:outline-none focus:ring-blue-300 focus:border-blue-400">
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="space-y-2">
                        <label for="description" class="block font-medium">Description</label>
                        <textarea id="description" name="description" rows="4"
                                    placeholder="Describe the book's condition, any highlights, missing pages, etc."
                                    class="w-full border border-blue-200 rounded px-4 py-2 focus:outline-none focus:ring-blue-300 focus:border-blue-400"></textarea>
                    </div>

                    <!-- Book Image Upload -->
                    <div class="space-y-2">
                        <label class="block font-medium text-sm">Book Images (Max 3)</label>

                        <!-- Upload Box -->
                        <label for="bookImages"
                            class="flex flex-col items-center justify-center w-full h-48 border-2 border-dashed border-gray-300 rounded-lg cursor-pointer hover:border-blue-300 transition text-center px-4 py-6">

                            <!-- Lucide Upload Icon -->
                            <i data-lucide="upload-cloud" class="w-10 h-10 text-gray-400 mb-2"></i>

                            <p class="text-gray-600 text-sm font-medium mb-1">Click to upload or drag and drop</p>
                            <p class="text-xs text-gray-500 mb-4">PNG, JPG up to 5MB each</p>

                            <span class="inline-block bg-white border border-gray-300 text-sm px-4 py-2 rounded shadow-sm hover:bg-gray-50">
                            Choose Files
                            </span>

                            <!-- Hidden Input -->
                            <input id="bookImages" type="file" name="images[]" multiple accept="image/*" class="hidden" />
                        </label>

                    </div>
                   

                    <!-- Submit Buttons -->
                    <div class="flex gap-4">
                        <button type="submit"
                                class="flex-1 bg-blue-500 text-white font-semibold px-4 py-2 rounded hover:bg-blue-600">
                            Submit Listing
                        </button>
                        <button type="reset"
                                class="flex-1 border border-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-100">
                            Clear
                        </button>
                    </div>
                </form>

                <!-- Validation Details -->
                <?php if ($submitted): ?>
                <div class="bg-green-100 text-green-800 p-4 rounded mt-6">
                    <h3 class="font-bold text-lg mb-2">Book Listed Successfully!</h3>
                    <ul class="text-sm space-y-1">
                        <li><strong>Title:</strong> <?= htmlspecialchars($title) ?></li>
                        <li><strong>Author:</strong> <?= htmlspecialchars($author) ?></li>
                        <li><strong>Category:</strong> <?= htmlspecialchars($category) ?></li>
                        <li><strong>Condition:</strong> <?= htmlspecialchars($condition) ?></li>
                        <li><strong>Price:</strong> <?= $isFree ? 'Free' : 'Rs. ' . htmlspecialchars($price) ?></li>
                        <li><strong>Description:</strong> <?= nl2br(htmlspecialchars($description)) ?></li>
                    </ul>
                    <?php if ($uploadedImages): ?>
                        <div class="mt-4 flex gap-4">
                            <?php foreach ($uploadedImages as $img): ?>
                                <img src="<?= $img ?>" class="h-24 rounded border">
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <?php elseif (!empty($errors)): ?>
                    <div class="bg-red-100 text-red-800 p-4 rounded mt-6">
                        <h3 class="font-bold">There were some errors:</h3>
                        <ul class="list-disc list-inside text-sm">
                            <?php foreach ($errors as $err): ?>
                                <li><?= $err ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Right Column -->
             <div class="space-y-6">
                <!-- Live Preview -->
                <div class="bg-white rounded-lg shadow border border-gray-200 p-6">
                    <h2 class="text-xl font-semibold mb-4">Live Preview</h2>

                    <div id="imageSlider" class="w-full h-48 overflow-hidden relative bg-gray-50 border border-gray-200 rounded mb-4 hidden">
                        <div id="sliderTrack" class="flex transition-transform duration-300 ease-in-out h-full">
                            <!-- Images will be inserted here -->
                        </div>

                        <!-- Navigation buttons -->
                        <!-- Previous Button -->
                        <button id="prevBtn" type="button"
                            class="absolute top-1/2 left-4 transform -translate-y-1/2 bg-blue-200 rounded-full p-2 hover:bg-blue-400 transition-all duration-200 hidden">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                            </svg>
                        </button>

                        <!-- Next Button -->
                        <button id="nextBtn" type="button"
                            class="absolute top-1/2 right-4 transform -translate-y-1/2 bg-blue-200 rounded-full p-2 hover:bg-blue-400 transition-all duration-200 hidden">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>

                    </div>

                    
                    <div class="text-sm inline-flex items-center px-2 py-1 rounded-full bg-gray-200 text-gray-800 mb-1" id="previewCategory">Category</div>

                    <h3 class="text-lg font-bold" id="previewTitle">Title</h3>
                    <p class="text-gray-600">by <span id="previewAuthor">Author</span></p>

                    <div class="mt-2" id="previewPrice">Price</div>

                    <div class="mt-1 px-2 py-1 text-xs bg-gray-300 inline-block rounded" id="previewCondition">Condition</div>

                    <p class="mt-3 text-sm text-gray-700" id="previewDescription">Description</p>
                </div>
                <!-- Tips Card -->
                <div class="bg-white rounded-lg shadow border border-gray-200 p-6">
                    <h2 class="text-xl font-bold mb-4">Tips for Better Listings</h2>
                    <ul class="list-disc list-inside space-y-2 text-sm text-gray-700 marker:text-blue-600">
                        <li>Use clear, well-lit photos showing the book's condition</li>
                        <li>Be honest about the condition and any damage</li>
                        <li>Include edition number and ISBN if available</li>
                        <li>Price competitively by checking similar listings</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>



<script>

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

    imageInput.addEventListener('change', function () {
        const files = Array.from(this.files).slice(0, 3); // limit to 3 images
        sliderTrack.innerHTML = ''; // clear previous
        if (files.length === 0) {
            sliderContainer.classList.add('hidden');
            return;
        }

        files.forEach(file => {
            const reader = new FileReader();
            reader.onload = function (e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.className = 'w-full h-full object-contain flex-shrink-0';
                sliderTrack.appendChild(img);
            };
            reader.readAsDataURL(file);
        });

        sliderContainer.classList.remove('hidden');
        prevBtn.classList.toggle('hidden', files.length <= 1);
        nextBtn.classList.toggle('hidden', files.length <= 1);
        currentIndex = 0;
        updateSlider();
    });

    function updateSlider() {
        const slideWidth = sliderContainer.clientWidth;
        sliderTrack.style.transform = `translateX(-${currentIndex * slideWidth}px)`;
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
        document.getElementById('previewTitle').innerText = document.getElementById('title').value;
        document.getElementById('previewAuthor').innerText = document.getElementById('author').value;
        document.getElementById('previewCategory').innerText = document.getElementById('category').value;
        document.getElementById('previewCondition').innerText = document.getElementById('condition').value;
        document.getElementById('previewDescription').innerText = document.getElementById('description').value;

        const isFree = document.getElementById('freeCheckbox').checked;
        const previewPrice = document.getElementById('previewPrice');
        if (isFree) {
            previewPrice.innerHTML = `<span class="text-blue-600 font-bold text-lg">FREE</span>`;
        } else {
            const priceVal = document.getElementById('price').value;
            previewPrice.innerHTML = `<span class="text-green-600 font-bold text-lg">Rs. ${priceVal}</span>`;
        }
    }

</script>
