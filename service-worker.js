var cacheVersion = 2;
var currentCache = {
  offline: 'offline-cache' + cacheVersion
};
const offlineUrl = 'http://localhost:800/offline/';

this.addEventListener('install', event => {
  event.waitUntil(
    caches.open(currentCache.offline).then(function(cache) {
      return cache.addAll([
          offlineUrl
      ]);
    })
  );
});

console.log("HEY");
this.addEventListener('fetch', event => {
		console.log("TRY");
	  // request.mode = navigate isn't supported in all browsers
	  // so include a check for Accept: text/html header.
	  if (event.request.mode === 'navigate' || (event.request.method === 'GET' && event.request.headers.get('accept').includes('text/html'))) {
	        event.respondWith(
	          fetch(event.request.url).catch(error => {
	              // Return the offline page
	              return caches.match(offlineUrl);
	          })
	    );
	  }
	  else{
	        // Respond with everything else if we can
	        event.respondWith(caches.match(event.request)
	                        .then(function (response) {
	                        	console.log(response);
	                        	console.log(event.request);
	                        return response || fetch(event.request);
	                    })
	            );
	      }
	});
