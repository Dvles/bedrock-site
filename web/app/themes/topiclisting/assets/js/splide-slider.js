document.addEventListener('DOMContentLoaded', function () {
  new Splide('#splide-latest-projects', {
    type: 'loop',
    perPage: 3,
    gap: '1rem',
    breakpoints: {
      768: { perPage: 1 },
      1024: { perPage: 2 },
    }
  }).mount();
});