<script>
  function toggleMenu() {
    const menu = document.getElementById('mobile-menu');
    menu.classList.toggle('hidden');
  }
</script>

<nav class="bg-white shadow-md">
  <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">
    <!-- Logo -->
    <a href="index.php" class="text-xl font-bold text-blue-600">
      CampusBookSwap
    </a>

    <!-- Desktop Nav Links -->
    <div class="hidden md:flex space-x-6 items-center">
      <a href="index.php" class="text-gray-700 hover:text-blue-600">Home</a>
      <a href="index.php?page=browse.php" class="text-gray-700 hover:text-blue-600">Browse</a>
      <?php #if ($isLoggedIn): ?>
        <a href="index.php?page=mybooks.php" class="text-gray-700 hover:text-blue-600">My Books</a>
        <a href="index.php?page=logout.php" class="text-gray-700 hover:text-blue-600">Logout</a>
      <?php #else: ?>
        <a href="index.php?page=login" class="text-gray-700 hover:text-blue-600">Login</a>
        <a href="index.php?page=register.php" class="text-gray-700 hover:text-blue-600">Register</a>
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

  <!-- Mobile Nav Links -->
  <div id="mobile-menu" class="md:hidden hidden px-4 pb-4 transition-all duration-300 ease-in-out">
    <a href="index.php" class="block py-2 text-gray-700 hover:text-blue-600">Home</a>
    <a href="index.php?page=browse.php" class="block py-2 text-gray-700 hover:text-blue-600">Browse</a>
    <?php #if ($isLoggedIn): ?>
      <a href="index.php?page=mybooks.php" class="block py-2 text-gray-700 hover:text-blue-600">My Books</a>
      <a href="index.php?page=logout.php" class="block py-2 text-gray-700 hover:text-blue-600">Logout</a>
    <?php #else: ?>
      <a href="index.php?page=index.php?page=login" class="block py-2 text-gray-700 hover:text-blue-600">Login</a>
      <a href="index.php?page=register.php" class="block py-2 text-gray-700 hover:text-blue-600">Register</a>
    <?php #endif; ?>
  </div>
</nav>
