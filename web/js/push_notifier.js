/* eslint-env browser, es6 */

'use strict';

const applicationServerPublicKey = 'BLzNMA6TLEF9Rs9FSJKgPyrBVFmQZXo1_oWPKKSQqRNU9Dker69j7zEQGuGYCAMc4A17CvpXxiuavBhIZz-ZlZE';

let isSubscribed = false;
let swRegistration = null;
var subscrip = null;

function urlB64ToUint8Array(base64String) {
    const padding = '='.repeat((4 - base64String.length % 4) % 4);
    const base64 = (base64String + padding)
        .replace(/\-/g, '+')
        .replace(/_/g, '/');

    const rawData = window.atob(base64);
    const outputArray = new Uint8Array(rawData.length);

    for (let i = 0; i < rawData.length; ++i) {
        outputArray[i] = rawData.charCodeAt(i);
    }

    return outputArray;
}

function updateSubscriptionOnServer(subscription) {
    sendSebscriptionData(subscription);
}

function sendSebscriptionData(subscription) {

    console.log(JSON.stringify(subscription));
    const p256dh = subscription.getKey('p256dh');
    const auth = subscription.getKey('auth');

    $.ajax({
        url: '/eventer/registersubscription',
        method: 'POST',
        dataType: 'text',
        data: {subscription:  JSON.stringify({
            endpoint: subscription.endpoint,
            p256dh: p256dh ? btoa(String.fromCharCode.apply(null, new Uint8Array(subscription.getKey('p256dh')))) : null,
            auth: auth ? btoa(String.fromCharCode.apply(null, new Uint8Array(subscription.getKey('auth')))) : null
        })},
        success: function(result){
            console.log(result);
        }
    });
}

function subscribeUser() {
    const applicationServerKey = urlB64ToUint8Array(applicationServerPublicKey);
    swRegistration.pushManager.subscribe({
        userVisibleOnly: true,
        applicationServerKey: applicationServerKey
    })
        .then(function(subscription) {
            console.log('User is subscribed');

            updateSubscriptionOnServer(subscription);
            isSubscribed = true;
            subscrip = subscription;
        })
        .catch(function(err) {
            console.log('Failed to subscribe the user: ', err);
        });
}

function unsubscribeUser() {
    swRegistration.pushManager.getSubscription()
        .then(function(subscription) {
            if (subscription) {
                return subscription.unsubscribe();
            }
        })
        .catch(function(error) {
            console.log('Error unsubscribing', error);
        })
        .then(function() {
            //updateSubscriptionOnServer(null);

            console.log('User is unsubscribed.');
            isSubscribed = false;
        });
}


function initialise() {
    if (isSubscribed) {

    } else {
        subscribeUser();
    }
}

if ('serviceWorker' in navigator && 'PushManager' in window) {
    console.log('Service Worker and Push is supported');

    navigator.serviceWorker.register('/js/sw.js?='+(new Date().getTime()))
        .then(function(swReg) {
            console.log('Service Worker is registered', swReg);

            swRegistration = swReg;
            /*initialise();*/
        })
        .catch(function(error) {
            console.error('Service Worker Error', error);
        });

} else {
    console.warn('Push messaging is not supported');
}
