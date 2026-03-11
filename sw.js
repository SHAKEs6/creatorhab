// Service Worker for push notifications

self.addEventListener('push', function(event) {
    if (!event.data) return;

    const data = event.data.json();
    const notificationOptions = {
        body: data.message || 'You have a new notification',
        icon: '/assets/images/favicon.png',
        badge: '/assets/images/favicon.png',
        tag: 'notification-' + data.id,
        data: {
            url: data.url || '/',
            id: data.id
        },
        actions: [
            {
                action: 'open',
                title: 'Open'
            },
            {
                action: 'close',
                title: 'Dismiss'
            }
        ]
    };

    event.waitUntil(
        self.registration.showNotification(data.title || 'CreatorHub Notification', notificationOptions)
    );
});

// Handle notification click
self.addEventListener('notificationclick', function(event) {
    event.notification.close();

    if (event.action === 'close') {
        return;
    }

    const urlToOpen = event.notification.data.url || '/';

    event.waitUntil(
        clients.matchAll({
            type: 'window',
            includeUncontrolled: true
        }).then(function(windowClients) {
            // Check if there is already a window/tab open with the target URL
            for (let i = 0; i < windowClients.length; i++) {
                const client = windowClients[i];
                if (client.url === urlToOpen && 'focus' in client) {
                    return client.focus();
                }
            }
            // If not, open a new window/tab with the target URL
            if (clients.openWindow) {
                return clients.openWindow(urlToOpen);
            }
        })
    );
});

// Handle service worker update
self.addEventListener('activate', function(event) {
    event.waitUntil(clients.claim());
});

// Keep service worker alive and check for notifications
self.addEventListener('message', function(event) {
    if (event.data && event.data.type === 'CHECK_NOTIFICATIONS') {
        // Fetch latest notifications from server
        fetch('/dashboard/api_notifications')
            .then(response => response.json())
            .then(data => {
                if (data.notifications && data.notifications.length > 0) {
                    data.notifications.forEach(notification => {
                        if (!notification.is_read) {
                            self.registration.showNotification(notification.title, {
                                body: notification.message,
                                icon: '/assets/images/favicon.png',
                                tag: 'notification-' + notification.id,
                                data: {
                                    id: notification.id,
                                    url: '/dashboard'
                                }
                            });
                        }
                    });
                }
            })
            .catch(error => console.error('Error checking notifications:', error));
    }
});
