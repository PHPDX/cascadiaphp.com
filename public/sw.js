importScripts('https://storage.googleapis.com/workbox-cdn/releases/3.4.1/workbox-sw.js');

workbox.precaching.precacheAndRoute([]);

self.addEventListener('install', event => {
    const urls = [
        'https://cdn.ampproject.org/v0.js',
        'https://cdn.ampproject.org/v0/amp-install-serviceworker-0.1.js',
        'https://cdn.ampproject.org/shadow-v0.js',
        '/',
        '/schedule',
        '/speakers',
        '/venue',
        '/sponsors',
        '/register',
        '/legal/coc',
        '/legal/terms'
    ];
    const cacheName = workbox.core.cacheNames.runtime;
    event.waitUntil(caches.open(cacheName).then(cache => cache.addAll(urls)));
});

// Make the pages all go through the network first
workbox.routing.registerRoute(/\/(schedule|speakers|venue|sponsors|register|legal\/coc|legal\/terms)$/,
    workbox.strategies.networkFirst()
);

// Images should be cache first
workbox.routing.registerRoute(/\.(js|css|png|gif|jpe?g|svg)$/,
    workbox.strategies.cacheFirst()
);

// And amp stuff should be stale while updating
workbox.routing.registerRoute(/(.*)cdn\.ampproject\.org(.*)/,
    workbox.strategies.staleWhileRevalidate()
);