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
                            <input type="checkbox" id="free" name="isFree" value="1"
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

                        <!-- Preview Section -->
                        <div id="preview" class="flex flex-wrap gap-2 mt-4"></div>
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
            </div>

            <!-- Right Column -->
             <div class="space-y-6">
                <!-- Live Preview -->

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
  const input = document.getElementById('bookImages');
  const preview = document.getElementById('preview');

  input.addEventListener('change', () => {
    preview.innerHTML = ''; // clear previous preview
    const files = [...input.files].slice(0, 3); // allow only max 3
    files.forEach(file => {
      const reader = new FileReader();
      reader.onload = () => {
        const img = document.createElement('img');
        img.src = reader.result;
        img.className = 'w-24 h-24 object-cover rounded border border-gray-300 shadow-sm';
        preview.appendChild(img);
      };
      reader.readAsDataURL(file);
    });
  });

  

</script>
