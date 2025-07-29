</main>

    <!-- Footer -->
    <footer class="bg-slate-800 text-gray-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                
                <!-- Brand Section -->
                <div class="lg:col-span-1">
                    <div class="flex items-center mb-4">
                        <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center mr-3">
                            <i data-lucide="book-open" class="w-5 h-5 text-white"></i>
                        </div>
                        <h3 class="text-xl font-bold text-white">CampusBookSwap</h3>
                    </div>
                    <p class="text-gray-400 leading-relaxed">
                        Making textbooks affordable and accessible for every student.
                    </p>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="text-lg font-semibold text-white mb-4">Quick Links</h4>
                    <ul class="space-y-3">
                        <li><a href="index.php?page=browse-books" class="text-gray-400 hover:text-white transition-colors duration-200">Browse Books</a></li>
                        <li><a href="index.php?page=post-book" class="text-gray-400 hover:text-white transition-colors duration-200">Post a Book</a></li>
                        <li><a href="index.php?page=how-it-works" class="text-gray-400 hover:text-white transition-colors duration-200">How It Works</a></li>
                        <li><a href="index.php?page=categories" class="text-gray-400 hover:text-white transition-colors duration-200">Categories</a></li>
                    </ul>
                </div>

                <!-- Support -->
                <div>
                    <h4 class="text-lg font-semibold text-white mb-4">Support</h4>
                    <ul class="space-y-3">
                        <li><a href="index.php?page=about" class="text-gray-400 hover:text-white transition-colors duration-200">About Us</a></li>
                        <li><a href="index.php?page=contact" class="text-gray-400 hover:text-white transition-colors duration-200">Contact Us</a></li>
                        <li><a href="index.php?page=faq" class="text-gray-400 hover:text-white transition-colors duration-200">FAQ</a></li>
                        <li><a href="index.php?page=terms" class="text-gray-400 hover:text-white transition-colors duration-200">Terms of Use</a></li>
                    </ul>
                </div>

                <!-- Follow Us -->
                <div>
                    <h4 class="text-lg font-semibold text-white mb-4">Follow Us</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center hover:bg-blue-600 transition-colors duration-200">
                            <i data-lucide="twitter" class="w-5 h-5 text-gray-300"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center hover:bg-blue-600 transition-colors duration-200">
                            <i data-lucide="facebook" class="w-5 h-5 text-gray-300"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center hover:bg-pink-600 transition-colors duration-200">
                            <i data-lucide="instagram" class="w-5 h-5 text-gray-300"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center hover:bg-blue-700 transition-colors duration-200">
                            <i data-lucide="linkedin" class="w-5 h-5 text-gray-300"></i>
                        </a>
                    </div>
                    <div class="mt-6">
                        <p class="text-sm text-gray-500 mb-2">Get updates on new books</p>
                        <div class="flex">
                            <input type="email" placeholder="Enter your email" 
                                   class="flex-1 px-4 py-2 bg-gray-700 text-white rounded-l-lg border border-gray-600 focus:outline-none focus:border-blue-500">
                            <button class="bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-r-lg transition-colors duration-200">
                                <i data-lucide="mail" class="w-4 h-4 text-white"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom Bar -->
            <div class="border-t border-gray-700 mt-8 pt-6 flex flex-col md:flex-row justify-between items-center">
                <p class="text-sm text-gray-500">
                    © 2024 CampusBookSwap. All rights reserved.
                </p>
                <div class="flex space-x-6 mt-4 md:mt-0">
                    <a href="index.php?page=privacy" class="text-sm text-gray-500 hover:text-white transition-colors duration-200">Privacy Policy</a>
                    <a href="index.php?page=terms" class="text-sm text-gray-500 hover:text-white transition-colors duration-200">Terms of Service</a>
                    <a href="index.php?page=cookies" class="text-sm text-gray-500 hover:text-white transition-colors duration-200">Cookie Policy</a>
                </div>
            </div>
        </div>
    </footer>

  </div> <!-- end wrapper -->

  <script>
    lucide.createIcons();
  </script>
  <script src="./public/js/main.js"></script>
  
  <!--AOS JS-->

  <script>
    AOS.init({
        duration: 800,
        once: false,
        easing: 'ease-in-out',
    });
  </script>

</body>
</html>
