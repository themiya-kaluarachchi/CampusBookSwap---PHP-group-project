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
                        <label for="author" class="block font-medium">Author</label>
                        <input type="text" id="author" name="author" required placeholder="Enter the author's name"
                            class="w-full border border-blue-200 rounded px-4 py-2 focus:outline-none focus:ring-blue-300 focus:border-blue-400">
                     </div>

                     <!-- Category & Condition -->
                      <div>
                        
                      </div>
                </form>
             </div>
        </div>
    </div>
</div>



