<?php
    include './config/book.php';
    #gets first 4 books
    $featuredBooks = array_slice($sampleBooks, 0, 4);
?>

<div>
  <!-- Hero Section -->
  <section class="relative w-full min-h-[100vh] bg-white overflow-hidden" role="banner" aria-label="Hero Section">
    <!-- Background Image and Overlay -->
    <div class="absolute inset-0 z-0">
      <img 
        id="hero-bg-image"
        src="./assets/images/homePage/hero.jpg" 
        alt="Stack of books" 
        class="w-full h-full object-cover object-center opacity-100"
      />
      <div class="absolute inset-0 bg-gradient-to-b from-white/5 to-white"></div>
    </div>

    <!-- Text Content -->
    <div class="relative z-10 flex flex-col items-center justify-center min-h-[100vh] px-4 text-center">
      <h1 class="text-5xl md:text-7xl font-bold mb-4 bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-blue-800 drop-shadow flex flex-wrap" data-aos="fade-up" data-aos-delay="100">
        Find, Sell or Donate Books on <br> Campus
      </h1>
      <p class="text-base md:text-xl max-w-2xl text-gray-700" data-aos="fade-up" data-aos-delay="300">
        Connect with fellow students to buy, sell, and share textbooks and novels.  
        <br />
        Make learning affordable and sustainable.
      </p>
      <a
        href="index.php?page=post-book"
        class="mt-6 inline-block bg-blue-600 hover:bg-blue-700 px-6 py-3 text-white font-semibold rounded-lg shadow-md transition duration-300"
        data-aos="zoom-in" data-aos-delay="500"
      >
        Post a Book
      </a>
    </div>
  </section>

  <!-- How It Works Section -->
  <section class="bg-white py-16">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
      <h2 class="text-3xl md:text-5xl font-bold text-center text-blue-700 mb-12" data-aos="fade-up">How It Works</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
        <div class="flex flex-col items-center text-center border border-blue-600 rounded-lg p-6 shadow-lg md:p-8" data-aos="zoom-in" data-aos-delay="100">
          <div class="mb-4 bg-blue-100 p-5 rounded-full shadow">
            <i data-lucide="user" class="text-blue-600 w-6 h-6"></i>
          </div>
          <h3 class="text-xl font-semibold text-blue-800 mb-2">1. Sign up or log in</h3>
          <p class="text-gray-600">Create your account using your college email to join the student community.</p>
        </div>

        <div class="flex flex-col items-center text-center border border-blue-600 rounded-lg p-6 shadow-lg md:p-8" data-aos="zoom-in" data-aos-delay="200">
          <div class="mb-4 bg-blue-100 p-5 rounded-full shadow">
            <i data-lucide="book" class="text-blue-600 w-6 h-6"></i>
          </div>
          <h3 class="text-xl font-semibold text-blue-800 mb-2">2. List or Browse Books</h3>
          <p class="text-gray-600">Post books you want to sell or donate, or browse listings by other students.</p>
        </div>

        <div class="flex flex-col items-center text-center border border-blue-600 rounded-lg p-6 shadow-lg md:p-8" data-aos="zoom-in" data-aos-delay="300">
          <div class="mb-4 bg-blue-100 p-5 rounded-full shadow">
            <i data-lucide="contact" class="text-blue-600 w-6 h-6"></i>
          </div>
          <h3 class="text-xl font-semibold text-blue-800 mb-2">3. Connect & Exchange</h3>
          <p class="text-gray-600">Chat with other students, finalize the deal, and make the swap on campus.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Featured Books Section -->
  <section class="featured-books py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center mb-16">
        <h2 class="text-3xl md:text-5xl font-bold text-blue-700 mb-4" data-aos="fade-up">Featured Books</h2>
        <p class="text-gray-600 text-lg max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="200">
          Discover the latest books available from students in your campus community.
        </p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        <?php foreach ($featuredBooks as $index => $book) : ?>
        <div class="bg-white rounded-2xl overflow-hidden shadow-md card-hover relative group" data-aos="fade-up" data-aos-delay="<?= $index * 100 ?>">
          <button class="favorite-btn absolute top-4 right-4 z-10 bg-white/90 backdrop-blur-sm rounded-full p-2 shadow-md hover:bg-white hover:shadow-lg transition-all duration-300 pulse-heart">
            <i data-lucide="heart" class="w-5 h-5 text-gray-400 group-hover:text-red-500 transition-colors"></i>
          </button>

          <div class="book-image h-56 bg-gray-100 flex items-center justify-center overflow-hidden">
            <img 
              src="./assets/images/books/book1.jpg" 
              alt="Introduction to Algorithms book cover" 
              class="object-contain h-full w-full transition-transform scale-105 duration-300 group-hover:scale-110 group-hover:rotate-5"
            />
          </div>

          <div class="book-info p-6 space-y-3">
            <div class="flex items-center justify-between">
              <span class="category bg-blue-100 text-blue-700 text-xs font-medium px-3 py-1 rounded-full">
                <?php echo $book['category']; ?>
              </span>
              <span class="condition bg-green-100 text-green-700 text-xs font-medium px-3 py-1 rounded-full">
                <?php echo $book['condition']; ?>
              </span>
            </div>

            <h3 class="book-title text-lg font-semibold text-gray-900 leading-tight line-clamp-2">
              <?php echo $book['title']; ?>
            </h3>
            
            <p class="book-author text-sm text-gray-600">
              <?php echo $book['author']; ?>
            </p>

            <div class="price-section flex items-center justify-between pt-2">
              <span class="price text-blue-600 font-bold text-xl">$45</span>
              <div class="seller-info flex items-center text-sm text-gray-500">
                <span class="text-gray-400 mr-1">Posted by:</span>
                <span>Sarah M.</span>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>

      <div class="text-center mt-12" data-aos="fade-up" data-aos-delay="300">
        <a href="index.php?page=browse-books" 
          class="inline-flex items-center justify-center bg-blue-600 hover:bg-blue-700 px-8 py-3 text-white font-semibold rounded-lg shadow-md transition-all duration-300 hover:shadow-lg">
          <span>View All Books</span>
          <i data-lucide="arrow-right" class="w-5 h-5 ml-2"></i>
        </a>
      </div>
    </div>
  </section>

  <!-- CTA Section -->
  <section class="cta-section py-20 bg-gradient-to-r from-blue-500 to-blue-700" data-aos="fade-up">
    <div class="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8" data-aos="zoom-in" data-aos-delay="200">
      <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
        Ready to Start Trading Books?
      </h2>
      <p class="text-xl text-blue-100 mb-8">
        Join thousands of students already saving money and sharing knowledge.
      </p>
      <div class="flex flex-col sm:flex-row gap-4 justify-center">
        <a href="index.php?page=register" 
           class="inline-flex items-center justify-center bg-white text-blue-600 hover:bg-gray-50 px-8 py-3 font-semibold rounded-lg shadow-md transition-all duration-300 hover:shadow-lg"
           data-aos="zoom-in-up" data-aos-delay="400">
          Post Your First Book Today
        </a>
      </div>
    </div>
  </section>
</div>



