<?php
  $isLoggedIn = isset($_SESSION['user_id']);
  $fname = $isLoggedIn && isset($_SESSION['fname']) ? $_SESSION['fname'] : 'User';
?>

<script>
  function toggleMenu() {
    const menu = document.getElementById('mobile-menu');
    menu.classList.toggle('hidden');
  }
</script>

<header>
  <nav class="bg-white shadow-md fixed w-full z-50 md:h-16">
    <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">
  
    <!-- Left: Logo -->
    <div class="flex items-center gap-4">
      <a href="<?= BASE_URL ?>/" class="text-xl font-bold text-blue-600 flex items-center gap-2">
        <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center">
          <i data-lucide="book-open" class="w-5 h-5 text-white"></i>
        </div>
        CampusBookSwap
      </a>
    </div>

    <!-- Center: Navigation -->
    <div class="hidden md:flex items-center gap-6">
      <a href="<?= BASE_URL ?>/" class="text-gray-700 hover:text-blue-600">Home</a>
      <a href="<?= BASE_URL ?>/browse" class="text-gray-700 hover:text-blue-600">Browse</a>
      <?php if ($isLoggedIn): ?>
        <a href="<?= BASE_URL ?>/add_a_book" class="text-gray-700 hover:text-blue-600">Add a Book</a>
        <a href="<?= BASE_URL ?>/profile" class="text-gray-700 hover:text-blue-600">Profile</a>
      <?php endif; ?>
    </div>

    <!-- Right: Auth Links -->
    <div class="hidden md:flex items-center gap-4">
      <?php if ($isLoggedIn): ?>
        <span class="text-gray-700">
          <?= htmlspecialchars('Welcome'.' '.$_SESSION['fname'])?>
        </span>
        <a href="<?= BASE_URL ?>/logout" class="text-red-600 hover:text-red-700">Logout</a>
      <?php else: ?>
        <a href="<?= BASE_URL ?>/login" class="text-gray-700 hover:text-blue-600 border border-blue-600 px-4 py-2 rounded">Login</a>
        <a href="<?= BASE_URL ?>/signup" class="bg-blue-600 text-white hover:bg-blue-800 px-4 py-2 rounded">Sign Up</a>
      <?php endif; ?>
    </div>

  <!-- Mobile Menu Button -->
  <button class="md:hidden flex items-center px-3 py-2 border rounded text-blue-600 border-blue-600" onclick="toggleMenu()" aria-label="Toggle navigation">
    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M4 6h16M4 12h16M4 18h16" />
    </svg>
  </button>
</div>


    <!-- Mobile Navigation Menu -->
    <div id="mobile-menu" class="md:hidden hidden px-4 pb-4 transition-all duration-300 ease-in-out">
      <a href="<?= BASE_URL ?>/" class="block py-2 text-gray-700 hover:text-blue-600">Home</a>
      <a href="<?= BASE_URL ?>/browse" class="block py-2 text-gray-700 hover:text-blue-600">Browse</a>

      <?php if ($isLoggedIn): ?>
        <!-- <a href="<?= BASE_URL ?>/mybooks" class="block py-2 text-gray-700 hover:text-blue-600">My Books</a> -->
        <a href="<?= BASE_URL ?>/add_a_book" class="block py-2 text-gray-700 hover:text-blue-600">Add a Book</a>
        <a href="<?= BASE_URL ?>/dashboard" class="block py-2 text-gray-700 hover:text-blue-600">Dashboard</a>
        <a href="<?= BASE_URL ?>/logout" class="block py-2 text-red-600 hover:text-red-800">Logout</a>
        <p class="mt-2 text-gray-700">Welcome, <?= htmlspecialchars($fname) ?></p>
      <?php else: ?>
        <hr class="my-2 border-gray-300">
        <a href="<?= BASE_URL ?>/login" class="block py-2 border border-blue-600 text-blue-600 text-center rounded mb-2 hover:bg-blue-50">Login</a>
        <a href="<?= BASE_URL ?>/signup" class="block py-2 bg-blue-600 text-white text-center rounded hover:bg-blue-700">Sign Up</a>
      <?php endif; ?>
    </div>
  </nav>
</header>

<main class="flex-grow">
