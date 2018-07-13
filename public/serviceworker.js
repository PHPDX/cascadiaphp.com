var filesToCache = [
    '/venue'
];

var staticCacheName = 'pages-cache-v2';

self.addEventListener('install', function(event) {
    console.log('Attempting to install service worker and cache static assets');
    event.waitUntil(
        caches.open(staticCacheName)
            .then(function(cache) {
                return cache.addAll(filesToCache);
            })
    );
});

self.addEventListener('fetch', function(event) {
    event.respondWith(
        caches.open(staticCacheName).then(function(cache) {
            return cache.match(event.request).then(function(response) {
                var fetchPromise = fetch(event.request).then(function(networkResponse) {
                    if (event.request.method != 'POST') {
                        cache.put(event.request, networkResponse.clone());
                    }
                    return networkResponse;
                })

                return response || fetchPromise;
            })
        })
    );
});
