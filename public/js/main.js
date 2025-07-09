const hero_image = ["./assets/images/homePage/hero.jpg", 
                    "./assets/images/homePage/hero2.jpg", 
                    "./assets/images/homePage/hero3.jpg"];

console.log(document.getElementById('hero-bg-image').src);

let current = 0;
setInterval(() => {
  document.getElementById('hero-bg-image').src= hero_image[current];
  current = (current + 1) % hero_image.length;
}, 5000);