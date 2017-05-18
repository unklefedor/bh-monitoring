/* eslint-env browser, serviceworker, es6 */

'use strict';

var urlToredirect = null;
self.addEventListener('push', function(event) {
  console.log('[Service Worker] Push Received.');
  console.log(`[Service Worker] Push had this data: "${event.data.text()}"`);

  var result = JSON.parse(event.data.text());
  var string = result.date+'\r\n'+result.link+'\r\n'+result.text;
  urlToredirect = result.url?result.url:result.link;

  const title = 'BH Monitor';
  const options = {
    body: string,
    icon: 'images/icon_512.png',
    badge: 'images/icon_512.png'
  };

  event.waitUntil(self.registration.showNotification(title, options));
});

self.addEventListener('notificationclick', function(event) {
    console.log('[Service Worker] Notification click Received.');

    event.notification.close();
    if (urlToredirect) {
        event.waitUntil(
            clients.openWindow(urlToredirect)
        );
    }
});