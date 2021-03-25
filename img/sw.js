const cacheName = 'waroengsteakandshake1';
const cacheFiles = [
    '.',
    'home'
    // 'about',
    // 'kegiatan',
    // 'layanan',
    // 'login',
    // 'lokasi',
    // 'menu',
    // 'promo',
    // 'saran',
    // 'sponsorsip',

    // 'assets/css/admin.css',
    // 'assets/css/bootstrap-touch-slider.css',
    // 'assets/css/jquery.DonutWidget.min.css',
    // 'assets/css/owl.carousel.min.css',
    // 'assets/css/owl.theme.default.css',
    // 'assets/css/style.css',
    // 'assets/css/tagsinput.css',

    // 'assets/js/vendor/bootstrap.min.js',
    // 'assets/js/vendor/jquery-2.2.4.min.js',

    // 'assets/js/bootstrap-swipe-carousel.js',
    // 'assets/js/bootstrap-touch-slider.js',
    // 'assets/js/card_slide.js',
    // 'assets/js/font-awesome.min.js',
    // 'assets/js/gmaps.js',
    // 'assets/js/jquery-2.2.3.min.js',
    // 'assets/js/jquery.ajaxchimp.min.js',
    // 'assets/js/jquery.DonutWidget.min.js',
    // 'assets/js/jquery.js',
    // 'assets/js/jquery.magnific-popup.min.js',
    // 'assets/js/jQuery.min.js',
    // 'assets/js/jquery.nice-select.min.js',
    // 'assets/js/jquery.sticky.js',
    // 'assets/js/main.js',
    // 'assets/js/owl.carousel.min.js',
    // 'assets/js/parallax.min.js',
    // 'assets/js/tagsinput.js',

    // 'assets/images/icons/icon-72x72.png',
    // 'assets/images/icons/icon-96x96.png',
    // 'assets/images/icons/icon-128x128.png',
    // 'assets/images/icons/icon-144x144.png',
    // 'assets/images/icons/icon-152x152.png',
    // 'assets/images/icons/icon-192x192.png',
    // 'assets/images/icons/icon-384x384.png',
    // 'assets/images/icons/icon-512x512.png'
];

self.addEventListener('install', function (event) {
    event.waitUntil(
        caches.open(cacheName).then(function (cache) {
            return cache.addAll(cacheFiles);
        })
    );
});

self.addEventListener('fetch', function (event) {
    event.respondWith(
        caches.open(cacheName).then(function (cache) {
            return cache.match(event.request).then(function (response) {
                return response || fetch(event.request).then(function (response) {
                    cache.put(event.request, response.clone());
                    return response;
                });
            });
        })
    );
});

self.addEventListener('activate', function activator(event) {
    event.waitUntil(
        caches.keys().then(function (keys) {
            return Promise.all(keys
                .filter(function (key) {
                    return key.indexOf(cacheName) !== 0;
                })
                .map(function (key) {
                    return caches.delete(key);
                })
            );
        })
    );
});
