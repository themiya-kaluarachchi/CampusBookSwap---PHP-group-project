<?php
    require_once __DIR__  . '/../config/db.php';
    include './config/book.php';
    $featuredBooks = array_slice($sampleBooks, 0, 4);

    $conn = Database::getInstance()->getConnection();

   /*  if($conn){
      echo "<div class='alert alert-success mt-14 pt-14'>Database connection successful!</div>";
    }else{
      echo "<div class='alert alert-danger mt-14 pt-14'>Database connection failed!</div>";
    } */
?>

<div class="modern-homepage">
  <!-- Hero Section -->
  <section class="relative w-full min-h-screen bg-slate-900 overflow-hidden" role="banner" aria-label="Hero Section">
    <!-- Background Image -->
    <div class="absolute inset-0 z-0">
      <img 
        id="hero-bg-image"
        src="./assets/images/homePage/hero.jpg" 
        alt="Stack of books" 
        class="w-full h-full object-cover object-center"
      />
      <!-- Modern Overlay -->
      <div class="absolute inset-0 bg-gradient-to-br from-slate-900/80 via-blue-900/70 to-indigo-900/80"></div>
      <div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 via-transparent to-transparent"></div>
    </div>

    <!-- Animated Background Elements -->
    <div class="absolute inset-0 overflow-hidden z-10">
      <div class="absolute -top-40 -right-40 w-80 h-80 bg-gradient-to-br from-blue-400/10 to-purple-400/10 rounded-full blur-3xl animate-pulse"></div>
      <div class="absolute -bottom-40 -left-40 w-96 h-96 bg-gradient-to-br from-indigo-400/10 to-pink-400/10 rounded-full blur-3xl animate-pulse" style="animation-delay: 2s;"></div>
    </div>

    <!-- Floating Book Icons -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none z-10">
      <div class="absolute top-1/4 left-1/4 w-8 h-8 text-white/20 animate-float">
        <i data-lucide="book-open" class="w-full h-full"></i>
      </div>
      <div class="absolute top-1/3 right-1/3 w-6 h-6 text-blue-300/30 animate-float-delayed">
        <i data-lucide="graduation-cap" class="w-full h-full"></i>
      </div>
      <div class="absolute bottom-1/4 right-1/4 w-7 h-7 text-purple-300/30 animate-float">
        <i data-lucide="heart" class="w-full h-full"></i>
      </div>
    </div>

    <div class="relative z-20 flex flex-col items-center justify-center min-h-screen px-4 text-center">
      <div class="max-w-5xl mx-auto">
        <h1 class="text-5xl md:text-7xl lg:text-8xl font-black mb-6 leading-tight" data-aos="fade-up">
          <span class="bg-gradient-to-r from-white via-blue-100 to-purple-100 bg-clip-text text-transparent drop-shadow-lg">
            Find, Sell or Donate
          </span>
          <br>
          <span class="bg-gradient-to-r from-blue-300 via-purple-300 to-indigo-300 bg-clip-text text-transparent drop-shadow-lg">
            Books on Campus
          </span>
        </h1>
        <p class="text-xl md:text-2xl text-blue-100 mb-8 font-medium leading-relaxed drop-shadow-md" data-aos="fade-up" data-aos-delay="200">
          Connect with fellow students to buy, sell, and share textbooks and novels.
          <br class="hidden md:block" />
          <span class="text-yellow-300">Make learning affordable and sustainable.</span>
        </p>
        
        <!-- CTA Buttons -->
        <div class="flex flex-col sm:flex-row gap-4 justify-center mb-8" data-aos="fade-up" data-aos-delay="400">
          <a href="index.php?page=post-book"
             class="group relative inline-flex items-center justify-center px-8 py-4 text-lg font-bold text-slate-900 bg-gradient-to-r from-white to-blue-50 rounded-2xl shadow-2xl hover:shadow-2xl transition-all duration-300 transform hover:scale-105 hover:-translate-y-1 border border-white/20">
            <span class="relative z-10">Post Your Book</span>
            <i data-lucide="arrow-right" class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform"></i>
            <div class="absolute inset-0 bg-gradient-to-r from-blue-50 to-white rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
          </a>
          <a href="index.php?page=browse-books"
             class="group inline-flex items-center justify-center px-8 py-4 text-lg font-bold text-white bg-white/20 backdrop-blur-sm rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105 hover:-translate-y-1 border border-white/30 hover:bg-white/30">
            <span>Browse Books</span>
            <i data-lucide="search" class="w-5 h-5 ml-2 group-hover:scale-110 transition-transform"></i>
          </a>
        </div>

        <!-- Stats -->
        <div class="grid grid-cols-3 gap-8 max-w-md mx-auto" data-aos="fade-up" data-aos-delay="600">
          <div class="text-center">
            <div class="text-2xl font-bold text-white drop-shadow-lg">5K+</div>
            <div class="text-sm text-blue-200">Students</div>
          </div>
          <div class="text-center">
            <div class="text-2xl font-bold text-white drop-shadow-lg">15K+</div>
            <div class="text-sm text-blue-200">Books</div>
          </div>
          <div class="text-center">
            <div class="text-2xl font-bold text-white drop-shadow-lg">$500K+</div>
            <div class="text-sm text-blue-200">Saved</div>
          </div>
        </div> 
      </div>
    </div>
  </section>

  <!-- How It Works -->
  <section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center mb-16">
        <h2 class="text-4xl md:text-6xl font-black text-slate-800 mb-4" data-aos="fade-up">
          How It <span class="text-blue-600">Works</span>
        </h2>
        <p class="text-xl text-slate-600 max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="200">
          Three simple steps to start trading books with your campus community
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-8 lg:gap-12">
        <?php
        $steps = [
          [
            'icon' => 'user-plus', 
            'title' => 'Create Account', 
            'desc' => 'Sign up with your college email and join thousands of students already saving money.',
            'color' => 'blue'
          ],
          [
            'icon' => 'book-open', 
            'title' => 'List or Browse', 
            'desc' => 'Post books you want to sell or donate, or discover amazing deals from other students.',
            'color' => 'purple'
          ],
          [
            'icon' => 'handshake', 
            'title' => 'Connect & Trade', 
            'desc' => 'Chat directly with other students and arrange safe exchanges on campus.',
            'color' => 'indigo'
          ],
        ];
        
        $colorClasses = [
          'blue' => 'from-blue-500 to-blue-600',
          'purple' => 'from-purple-500 to-purple-600',
          'indigo' => 'from-indigo-500 to-indigo-600'
        ];

        foreach ($steps as $i => $step):
        ?>
        <div class="relative group" data-aos="fade-up" data-aos-delay="<?= ($i + 1) * 150 ?>">
          <div class="absolute inset-0 bg-gradient-to-r <?= $colorClasses[$step['color']] ?> rounded-3xl opacity-0 group-hover:opacity-10 transition-opacity duration-300 transform group-hover:scale-105"></div>
          <div class="relative bg-white rounded-3xl p-8 shadow-lg group-hover:shadow-2xl transition-all duration-300 transform group-hover:-translate-y-2 border border-slate-100">
            <div class="flex items-center justify-center w-16 h-16 bg-gradient-to-r <?= $colorClasses[$step['color']] ?> rounded-2xl mb-6 shadow-lg">
              <i data-lucide="<?= $step['icon'] ?>" class="w-8 h-8 text-white"></i>
            </div>
            <h3 class="text-2xl font-bold text-slate-800 mb-4"><?= $step['title'] ?></h3>
            <p class="text-slate-600 leading-relaxed"><?= $step['desc'] ?></p>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- Featured Books -->
  <section class="py-24 bg-gradient-to-br from-slate-50 to-blue-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center mb-16">
        <h2 class="text-4xl md:text-6xl font-black text-slate-800 mb-4" data-aos="fade-up">
          Featured <span class="text-blue-600">Books</span>
        </h2>
        <p class="text-xl text-slate-600 max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="200">
          Discover the latest books available from students in your campus community
        </p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
        <?php foreach ($featuredBooks as $index => $book): ?>
        <div class="group relative bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2" data-aos="fade-up" data-aos-delay="<?= $index * 100 ?>">
          <!-- Love Button -->
          <button class="absolute top-4 right-4 z-10 w-10 h-10 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center shadow-lg hover:shadow-xl transition-all duration-300 group">
            <i data-lucide="heart" class="w-5 h-5 text-slate-400 group-hover:text-red-500 group-hover:scale-110 transition-all"></i>
          </button>

          <!-- Book Image -->
          <div class="relative h-64 bg-gradient-to-br from-slate-100 to-slate-200 overflow-hidden">
            <img 
              src="./assets/images/books/book1.jpg" 
              alt="<?= $book['title'] ?>" 
              class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
            />
            <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
          </div>

          <!-- Book Info -->
          <div class="p-6 space-y-4">
            <div class="flex items-center justify-between">
              <span class="bg-blue-100 text-blue-700 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wide">
                <?= $book['category'] ?>
              </span>
              <span class="bg-green-100 text-green-700 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wide">
                <?= $book['condition'] ?>
              </span>
            </div>
            
            <h3 class="text-xl font-bold text-slate-800 group-hover:text-blue-600 transition-colors">
              <?= $book['title'] ?>
            </h3>
            
            <p class="text-slate-600 font-medium"><?= $book['author'] ?></p>
            
            <div class="flex items-center justify-between pt-4 border-t border-slate-100">
              <div class="text-2xl font-black text-blue-600">
                $<?= $book['price'] ?? '45' ?>
              </div>
              <div class="text-sm text-slate-500 font-medium">
                by <?= $book['user_name'] ?? 'Sarah M.' ?>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>

      <div class="text-center mt-16" data-aos="fade-up" data-aos-delay="300">
        <a href="index.php?page=browse-books" 
          class="group inline-flex items-center justify-center px-8 py-4 text-lg font-bold text-white bg-gradient-to-r from-blue-600 to-purple-600 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105 hover:-translate-y-1">
          <span>Explore All Books</span>
          <i data-lucide="arrow-right" class="w-5 h-5 ml-2 group-hover:translate-x-2 transition-transform"></i>
        </a>
      </div>
    </div>
  </section>

  <!-- CTA Section -->
  <section class="relative py-24 bg-gradient-to-r from-blue-600 via-purple-600 to-indigo-600 overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
      <div class="absolute inset-0" style="background-image: radial-gradient(circle at 25% 25%, white 2px, transparent 2px); background-size: 60px 60px;"></div>
    </div>

    <div class="relative max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8" data-aos="zoom-in">
      <h2 class="text-4xl md:text-6xl font-black text-white mb-6 leading-tight">
        Ready to Start Your
        <br class="hidden md:block" />
        <span class="text-yellow-300">Book Journey?</span>
      </h2>
      <p class="text-xl md:text-2xl text-blue-100 mb-8 leading-relaxed">
        Join thousands of students already saving money and sharing knowledge
      </p>
      
      <div class="flex flex-col sm:flex-row gap-4 justify-center">
        <a href="index.php?page=register" 
           class="group inline-flex items-center justify-center px-8 py-4 text-lg font-bold text-blue-600 bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105 hover:-translate-y-1">
          <span>Start Trading Today</span>
          <i data-lucide="rocket" class="w-5 h-5 ml-2 group-hover:scale-110 transition-transform"></i>
        </a>
        <a href="index.php?page=how-it-works" 
           class="group inline-flex items-center justify-center px-8 py-4 text-lg font-bold text-white bg-white/20 backdrop-blur-sm rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105 hover:-translate-y-1 border border-white/30">
          <span>Learn More</span>
          <i data-lucide="play-circle" class="w-5 h-5 ml-2 group-hover:scale-110 transition-transform"></i>
        </a>
      </div>
    </div>
  </section>
</div>

<!-- Custom Animations -->
<style>
@keyframes float {
  0%, 100% { transform: translateY(0px); }
  50% { transform: translateY(-20px); }
}

@keyframes float-delayed {
  0%, 100% { transform: translateY(0px); }
  50% { transform: translateY(-15px); }
}

.animate-float {
  animation: float 6s ease-in-out infinite;
}

.animate-float-delayed {
  animation: float-delayed 8s ease-in-out infinite;
}

</style>