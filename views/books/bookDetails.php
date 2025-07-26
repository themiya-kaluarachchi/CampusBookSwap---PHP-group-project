<?php
  $bookId = (int)($_GET['id'] ?? 0);
?>

<div class="font-sans text-gray-800 bg-gray-50">

  <div class="min-h-screen px-4 py-16">
    <div class="max-w-fit mx-auto grid lg:grid-cols-3 gap-4 p-4">

      <!-- Book Details Section -->
      <div class="lg:col-span-2 bg-white  rounded-xl">

        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 p-6 rounded-lg border border-gray-200 shadow-sm bg-white">
          <div>
            <img src="b1.jpg" alt="Main book cover" class="w-full h-64 object-cover rounded-lg shadow-md mb-4" id="main-img">
            <div class="grid grid-cols-4 gap-4">
              <img src="././assets/images/books/b1.jpg" alt="Book thumbnail" class="object-cover rounded-lg shadow-md mb-4 cursor-pointer sub-img">
              <img src="././assets/images/books/b2.jpg" alt="Book thumbnail" class="object-cover rounded-lg shadow-md mb-4 cursor-pointer sub-img">
              <img src="././assets/images/books/b1.jpg" alt="Book thumbnail" class="object-cover rounded-lg shadow-md mb-4 cursor-pointer sub-img">
              <img src="././assets/images/books/b2.jpg" alt="Book thumbnail" class="object-cover rounded-lg shadow-md mb-4 cursor-pointer sub-img">
            </div>
          </div>

          <div>
            <div class="flex flex-wrap items-center justify-between gap-2">
              <span class="bg-black text-white text-xs px-2 py-1 rounded">Available</span>
              <span class="text-sm text-gray-500">Textbooks</span>
            </div>

            <h1 class="text-2xl font-bold mt-4">Introduction to Algorithms</h1>
            <p class="text-gray-600 mt-1">by Thomas H. Cormen, Charles E. Leiserson, Ronald L. Rivest, Clifford Stein</p>

            <div class="flex flex-wrap items-center gap-4 mt-4">
              <span class="text-blue-600 text-3xl font-bold">$45</span>
              <span class="line-through text-gray-400">$89</span>
              <span class="bg-gray-200 text-xs px-2 py-1 rounded">Like New</span>
            </div>

            <div class="flex flex-wrap items-center text-gray-500 text-sm mt-2 gap-4">
              <span class="flex items-center gap-1">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                </svg>
                47 views
              </span>
              <span class="flex items-center gap-1">
                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 6v6l4 2m4-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                Posted 2 days ago
              </span>
            </div>

            <button class="mt-4 bg-blue-600 hover:bg-blue-700 transition text-white font-medium px-6 py-2 rounded w-full">Contact Seller</button>

            <div class="mt-4 flex items-center justify-between gap-3">
              <button class="flex items-center gap-1 text-sm border border-gray-300 hover:border-gray-400 rounded px-3 py-1">
                <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 016.364 0L12 7.586l1.318-1.268a4.5 4.5 0 116.364 6.364L12 20.364l-7.682-7.682a4.5 4.5 0 010-6.364z"/>
                </svg>
                Add to Favorites
              </button>
              <button class="flex items-center gap-1 text-sm border border-gray-300 hover:border-gray-400 rounded px-3 py-1">
                <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 8a3 3 0 00-6 0v1.586a1 1 0 01-.293.707L7 12l1.707 1.707a1 1 0 01.293.707V16a3 3 0 006 0v-1.586a1 1 0 01.293-.707L17 12l-1.707-1.707a1 1 0 01-.293-.707V8z"/>
                </svg>
                Share
              </button>
            </div>

            <h2 class="text-lg font-semibold mt-6">Tags</h2>
            <div class="mt-4 flex flex-wrap gap-2">
              <span class="bg-gray-200 text-xs px-2 py-1 rounded">Computer Science</span>
              <span class="bg-gray-200 text-xs px-2 py-1 rounded">Algorithms</span>
              <span class="bg-gray-200 text-xs px-2 py-1 rounded">Data Structures</span>
              <span class="bg-gray-200 text-xs px-2 py-1 rounded">Programming</span>
            </div>
          </div>
        </div>

        <section class="mt-6 space-y-4 border border-gray-200 p-4 rounded-lg bg-white">
          <h2 class="text-lg font-semibold mb-2">Description</h2>
          <p class="text-gray-700 text-sm leading-relaxed">
            This comprehensive textbook covers a broad range of algorithms in depth, yet makes their design and analysis accessible to all levels of readers...
          </p>
        </section>

        <div class="mt-6 space-y-4 border border-gray-200 p-4 rounded-lg bg-white">
          <h2 class="text-lg font-semibold mb-2">Book Information</h2>
          <div class="grid grid-cols-2 gap-6 text-sm text-gray-700">
            <p class="flex justify-between"><strong>ISBN:</strong> 978-0262033848</p>
            <p class="flex justify-between"><strong>Pages:</strong> 1312</p>
            <p class="flex justify-between"><strong>Edition:</strong> 3rd Edition</p>
            <p class="flex justify-between"><strong>Weight:</strong> 3.2 lbs</p>
            <p class="flex justify-between"><strong>Publisher:</strong> MIT Press</p>
            <p class="flex justify-between"><strong>Dimensions:</strong> 9.2 x 7.5 x 2.2 inches</p>
            <p class="flex justify-between"><strong>Language:</strong> English</p>
            <p class="flex justify-between"><strong>Condition:</strong> Like New</p>
          </div>
        </div>
      </div>

      <!-- Sidebar Section -->
      <div class="space-y-6">

        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
          <h2 class="text-xl font-semibold mb-2">Seller Information</h2>
          <div class="flex items-center space-x-3">
            <img src="https://via.placeholder.com/40" class="w-10 h-10 rounded-full bg-gray-200" />
            <div>
              <p class="font-medium">Sarah Martinez <span class="text-green-600 text-sm">✔ Verified</span></p>
              <p class="text-sm text-gray-500">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-5 h-5 text-yellow-500" viewBox="0 0 24 24">
                  <path d="M12 17.27L18.18 21l-1.63-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.45 4.73L5.82 21z"/>
                </svg>
                4.8 (23 reviews)</p>
            </div>
          </div>
          <hr class="my-4 border-gray-200"/>
          <ul class="text-sm text-gray-600 space-y-1">
            <li class="flex items-center gap-1">
              <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                  viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M12 6v6l4 2m4-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
              </svg>
              Responds within 2 hours
            </li>
            <li class="flex items-center gap-1">
              <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                  viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M12 11c1.657 0 3-1.343 3-3S13.657 5 12 5s-3 1.343-3 3 1.343 3 3 3z"></path>
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M12 22s8-4.5 8-11a8 8 0 10-16 0c0 6.5 8 11 8 11z"></path>
              </svg>
              Campus Area - Engineering Building
            </li>
            <li class="flex items-center gap-1">
              <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                  viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M8 7V3m8 4V3M5 11h14M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2h-3l-1-2h-4l-1 2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                </path>
              </svg>
              Member since Sept 2023
            </li>
          </ul>
          <hr class="my-4 border-gray-200"/>
          <div class="flex justify-between text-sm">
            <p><strong>15</strong> Books Sold</p>
            <p><strong>3</strong> Active Listings</p>
          </div>
          <button class="mt-3 border border-gray-300 hover:border-gray-400 w-full rounded px-3 py-2 text-sm">👤 View Profile</button>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
          <h2 class="text-lg font-semibold inline-flex gap-2">
            <svg class="w-6 h-6 text-black" fill="none" stroke="currentColor" stroke-width="2"
                  viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M12 11c1.657 0 3-1.343 3-3S13.657 5 12 5s-3 1.343-3 3 1.343 3 3 3z"></path>
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M12 22s8-4.5 8-11a8 8 0 10-16 0c0 6.5 8 11 8 11z"></path>
              </svg>
            <span>Preferred Meeting Locations </span>
          </h2>
          <ul class="text-sm text-gray-600 mt-2 space-y-1">
            <li><span class="inline-block w-3 h-3 bg-green-500 rounded-full"></span> Campus Library</li>
            <li><span class="inline-block w-3 h-3 bg-green-500 rounded-full"></span> Student Center</li>
            <li><span class="inline-block w-3 h-3 bg-green-500 rounded-full"></span> Engineering Building</li>
          </ul>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
          <h2 class="text-lg font-semibold inline-flex gap-2">
            <svg class="w-6 h-6 text-black" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
              <path stroke-linecap="round" stroke-linejoin="round"
                    d="M9 12l2 2 4-4" />
            </svg>
            Safety Tips
          </h2>
          <ul class="text-sm text-gray-600 mt-2 space-y-1">
            <li class="flex items-center gap-1">
              <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
              </svg>
              Meet in public places on campus
            </li>
            <li class="flex items-center gap-1">
              <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
              </svg>
              Inspect the book before payment
            </li>
            <li class="flex items-center gap-1">
              <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
              </svg>
              Use secure payment methods
            </li>
            <li class="flex items-center gap-1">
              <svg class="w-4 h-4 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m0-4h.01M12 2a10 10 0 100 20 10 10 0 000-20z"/>
              </svg>
              Report suspicious activity
            </li>
          </ul>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
          <h2 class="text-lg font-semibold pb-4">Similar Books</h2>
          <div class="grid grid-cols gap-2">
            <div class="bg-white p-2 rounded-lg shadow-sm grid grid-cols-2 md:grid-cols-3 gap-2 border border-gray-200">
              <img src="././assets/images/books/b1.jpg" alt="Book cover" class="object-cover rounded-lg mb-2">
              <div class="ml-2">
                <h3 class="text-sm font-semibold">Data Structures and Algorithms</h3>
                <p class="text-gray-500 text-xs">$30</p>
                <p>by John Doe</p>
              </div>
              <span class="inline-block px-2 ml-8 text-sm font-semibold text-black bg-white border border-gray-300 rounded-full shadow-sm h-6 w-[50px] flex items-center justify-center">
                Used
              </span>

            </div>
            <div class="bg-white p-2 rounded-lg shadow-sm grid grid-cols-2 md:grid-cols-3 gap-2 border border-gray-200">
              <img src="././assets/images/books/b1.jpg" alt="Book cover" class="object-cover rounded-lg mb-2">
              <div class="ml-2">
                <h3 class="text-sm font-semibold">Data Structures and Algorithms</h3>
                <p class="text-gray-500 text-xs">$30</p>
                <p>by John Doe</p>
              </div>
              <span class="inline-block px-2 ml-8 text-sm font-semibold text-black bg-white border border-gray-300 rounded-full shadow-sm h-6 w-[50px] flex items-center justify-center">
                Used
              </span>

            </div>
            <div class="bg-white p-2 rounded-lg shadow-sm grid grid-cols-2 md:grid-cols-3 gap-2 border border-gray-200 items-center">
              <img src="././assets/images/books/b1.jpg" alt="Book cover" class="object-cover rounded-lg mb-2">
              <div class="ml-2">
                <h3 class="text-sm font-semibold flex">Data Structures and Algorithms</h3>
                <p class="text-gray-500 text-xs">$30</p>
                <p>by John Doe</p>
              </div>
              <span class="inline-block px-2 ml-8 text-sm font-semibold text-black bg-white border border-gray-300 rounded-full shadow-sm h-6 w-[50px] flex items-center justify-center">
                Used
              </span>
            </div>
          </div>
        </div>

      </div>

    </div>
  </div>

  <script>

    jQuery.noConflict();

    jQuery(document).ready(function (){

      var imgs = jQuery(".sub-img").map(function(){
        return jQuery(this).attr("src");
      }).get();

      console.log(imgs)

      var index = 0;
      var mainImg = jQuery("#main-img");
      mainImg.attr("src",imgs[index]);
      jQuery(".sub-img").eq(index).addClass("border-2 border-blue-500");

      setInterval(() => {
        index = (index+1) % imgs.length;
        mainImg.attr("src",imgs[index]);
        jQuery(".sub-img").removeClass("border-2 border-blue-500");
        jQuery(".sub-img").eq(index).addClass("border-2 border-blue-500");
      }, 2000);

      jQuery(".sub-img").on("click",function(){
        jQuery(".sub-img").removeClass("border-2 border-blue-500");
        jQuery(this).addClass("border-2 border-blue-500");
        index = imgs.indexOf(jQuery(this).attr("src"));
        mainImg.attr("src",imgs[index]);
      });
    });

  </script>

</div>