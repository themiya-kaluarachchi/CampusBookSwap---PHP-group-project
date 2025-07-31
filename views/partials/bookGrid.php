<?php foreach ($books as $index => $book): ?>
  <div class="group relative bg-white rounded-3xl overflow-hidden shadow-lg transition-all duration-500 transform " data-aos="fade-up" data-aos-delay="<?= $index * 100 ?>">
    
    <!-- Love Button -->
    <button class="absolute top-4 right-4 z-10 w-10 h-10 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center shadow-lg hover:shadow-xl transition-all duration-300 group">
      <i data-lucide="heart" class="w-5 h-5 text-slate-400 group-hover:text-red-500 group-hover:scale-110 transition-all"></i>
    </button>

    <!-- Book Image -->
    <div class="img-group">
      <div class="hidden">
        <?php foreach ($book['images'] as $imgIndex => $imagePath): ?>
          <img src="<?= htmlspecialchars($imagePath) ?>" class="sub-img" />
        <?php endforeach; ?>
      </div>
      <div class="relative h-64 bg-gradient-to-br from-slate-100 to-slate-200 overflow-hidden group">
        <img 
          src="<?= htmlspecialchars($book['images'][0] ?? 'uploads/default.jpg') ?>" 
          alt="<?= htmlspecialchars($book['title']) ?>" 
          class="main-img w-full h-full object-cover transition-transform duration-50 group-hover:scale-110"
        />
        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
      </div>
    </div>

    <!-- Book Info -->
    <a href="<?= BASE_URL ?>/book_details/<?= htmlspecialchars($book['id']) ?>">
      <div class="p-6 space-y-4">
        <div class="flex items-center justify-between">
          <span class="bg-blue-100 text-blue-700 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wide">
            <?= htmlspecialchars($book['category']) ?>
          </span>
          <span class="bg-green-100 text-green-700 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wide">
            <?= htmlspecialchars($book['book_condition']) ?>
          </span>
        </div>
        <h3 class="text-xl font-bold text-slate-800 group-hover:text-blue-600 transition-colors line-clamp-2">
          <?= htmlspecialchars($book['title']) ?>
        </h3>
        <p class="text-slate-600 font-medium"><?= htmlspecialchars($book['author']) ?></p>
        <div class="flex items-center justify-between pt-4 border-t border-slate-100">
          <div class="text-2xl font-black text-blue-600">
            <?= htmlspecialchars($book['price'] == 0 ? 'FREE' : 'Rs: ' . $book['price']) ?>
          </div>
          <div class="text-sm text-slate-500 font-medium">
            by <?= htmlspecialchars($book['user_name'] ?? 'Sarah M.') ?>
          </div>
        </div>
      </div>
    </a>
  </div>
<?php endforeach; ?>

<script>
  jQuery.noConflict();
  jQuery(document).ready(function () {

    jQuery(".img-group").each(function () {
      const container = jQuery(this);
      const imgs = container.find(".sub-img").map(function () {
        return jQuery(this).attr("src");
      }).get();

      if (imgs.length <= 1) return; 

      let index = 0;
      const mainImg = container.find(".main-img");

      //console.log(imgs);

      setInterval(() => {
        index = (index + 1) % imgs.length;
        mainImg.attr("src", imgs[index]);
      }, 2000);
    });

  });
  
</script>
<script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>
<script>
  lucide.createIcons(); 
</script>

