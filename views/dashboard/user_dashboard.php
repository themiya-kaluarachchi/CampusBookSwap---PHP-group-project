<div class="flex p-16">
    <!-- Sidebar -->
    <div class="w-80 bg-white shadow-sm border-r border-gray-200 min-h-screen">
        <!-- User Profile -->
        <div class="p-6 border-b border-gray-200">
            <div class="flex items-center space-x-4">
                <div class="w-12 h-12 bg-gray-300 rounded-full flex items-center justify-center">
                    <span class="text-gray-600 font-medium"><?php echo substr($_SESSION['fname'], 0, 1); ?></span>
                </div>
                <div>
                    <h3 class="font-semibold text-gray-900">
                        <span class="text-blue-600">
                             <?php echo $_SESSION['fname'] . ' ' . $_SESSION['lname']; ?>
                        </span>
                    </h3>
                    <p class="text-sm text-gray-500">
                        <?php echo $_SESSION['email']; ?>
                    </p>

                </div>
            </div>
        </div>

        <!-- Navigation Menu -->
        <nav class="p-4">
            <ul class="space-y-2">
                <li>
                    <button  class="flex items-center space-x-3 px-4 py-3  text-gray-700 rounded-lg my-listing">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                        <span class="font-medium">My Listings</span>
                    </button>
                </li>
                <li>
                    <button class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg favorites">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                        <span>Favorites</span>
                    </button>
                </li>
                <li>
                    <button class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg massages">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                        </svg>
                        <span>Messages</span>
                        <span class="ml-auto bg-red-500 text-white text-xs px-2 py-1 rounded-full">12</span>
                    </button>
                </li>
                <li>
                    <button class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg settings">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <span>Settings</span>
                    </button>
                </li>
            </ul>
            
            <div class="mt-8 pt-4 border-t border-gray-200">
                <a href="#" class="flex items-center space-x-3 px-4 py-3 text-red-600 hover:bg-red-50 rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                    <span>Logout</span>
                </a>
            </div>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="flex-1 p-8">
        <!-- Stats Cards -->
        <div class="grid grid-cols-4 gap-6 mb-8">
            <!-- Total Listings -->
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Total Listings</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2">8</p>
                    </div>
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Active Sales -->
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Active Sales</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2">5</p>
                    </div>
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Total Earnings -->
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Total Earnings</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2">$245</p>
                    </div>
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                        <span class="text-green-600 text-xl font-bold">$</span>
                    </div>
                </div>
            </div>

            <!-- Messages -->
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Messages</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2">12</p>
                    </div>
                    <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- My Listings Section -->
        <div class='sub-container'>
          
        </div>
    </div>
</div>

<script>
  jQuery.noConflict();
  jQuery(function ($) {
    // Initial load of My Listings
    $.ajax({
      url: '<?= BASE_URL ?>/my_listings',
      method: 'POST',
      success: function (response) {
        $('.sub-container').html(response);
      },
      error: function () {
        alert('Failed to load books');
      }
    });

    // Click handler for My Listings
    $('.my-listing').click(function () {
      $.ajax({
        url: '<?= BASE_URL ?>/my_listings',
        method: 'POST',
        success: function (response) {
          $('.sub-container').html(response);
        },
        error: function () {
          alert('Failed to load books');
        }
      });
    });

    // Click handler for Favorites
    $('.favorites').click(function () {
      $.ajax({
        url: '<?= BASE_URL ?>/favorites',
        method: 'POST',
        success: function (response) {
          $('.sub-container').html(response);
        },
        error: function () {
          alert('Failed to load favorites');
        }
      });
    });
  });
</script>

