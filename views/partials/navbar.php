<script>
  function toggleMenu() {
    const menu = document.getElementById('mobile-menu');
    menu.classList.toggle('hidden');
  }
</script>

<nav class="bg-white shadow-md fixed  w-full z-50 md:h-16 items-center">
  <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">
    <!-- Logo -->
    <a href="index.php" class="text-xl font-bold text-blue-600 flex items-center gap-2">
       <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center mr-3">
          <i data-lucide="book-open" class="w-5 h-5 text-white"></i>
       </div>
      CampusBookSwap
    </a>

    <!-- Desktop Nav Links -->
    <div class="hidden md:flex space-x-6 items-center">
      <a href="index.php" class="text-gray-700 hover:text-blue-600">Home</a>
      <a href="index.php?page=browse.php" class="text-gray-700 hover:text-blue-600">Browse</a>
      <?php #if ($isLoggedIn): ?>
        <a href="index.php?page=mybooks.php" class="text-gray-700 hover:text-blue-600">My Books</a>
        <!-- <a href="index.php?page=logout.php" class="text-gray-700 hover:text-blue-600">Logout</a> -->
      <?php #else: ?>
        <a href="index.php?page=login" class="text-gray-700 hover:text-blue-600 border border-blue-600 text-blue-600 px-4 py-2 rounded">Login</a>
        <a href="index.php?page=register.php" class="text-gray-700 hover:text-blue-600 bg-blue-600 text-white px-4 py-2 rounded">Sign Up</a>
      <?php #endif; ?>
    </div>

    <!-- Mobile menu button -->
    <button class="md:hidden flex items-center px-3 py-2 border rounded text-blue-600 border-blue-600" onclick="toggleMenu()" aria-label="Toggle navigation">
      <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M4 6h16M4 12h16M4 18h16" />
      </svg>
    </button>
  </div>

  <div id="mobile-menu" class="md:hidden hidden px-4 pb-4 transition-all duration-300 ease-in-out">
    <a href="index.php" class="block py-2 text-gray-700 hover:text-blue-600">Home</a>
    <a href="index.php?page=browse.php" class="block py-2 text-gray-700 hover:text-blue-600">Browse</a>

    <?php #if (isset($isLoggedIn) && $isLoggedIn): ?>
      <a href="index.php?page=mybooks.php" class="block py-2 text-gray-700 hover:text-blue-600">My Books</a>
      <a href="index.php?page=logout.php" class="block py-2 text-red-600 hover:text-red-800">Logout</a>
    <?php #else: ?>
      <hr class="my-2 border-gray-300">
      <a href="index.php?page=login" class="block py-2 border border-blue-600 text-blue-600 text-center rounded mb-2 hover:bg-blue-50">Login</a>
      <a href="index.php?page=register.php" class="block py-2 bg-blue-600 text-white text-center rounded hover:bg-blue-700">Sign Up</a>
    <?php #endif; ?>
  </div>

</nav>
