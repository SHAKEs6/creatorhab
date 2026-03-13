// script.js

document.addEventListener('DOMContentLoaded', () => {
    // 1. Navbar Scroll Effect
    const navbar = document.querySelector('.navbar');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            navbar.style.background = 'rgba(15, 15, 15, 0.95)';
            navbar.style.boxShadow = '0 10px 30px rgba(0,0,0,0.5)';
        } else {
            navbar.style.background = 'rgba(15, 15, 15, 0.85)';
            navbar.style.boxShadow = 'none';
        }
    });

    // 2. Reveal Sections on Scroll (Intersection Observer)
    const revealElements = document.querySelectorAll('.card, .section-header, .consultation-box');
    
    // Initial hidden state
    revealElements.forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(20px)';
        el.style.transition = 'all 0.6s cubic-bezier(0.4, 0, 0.2, 1)';
    });

    const revealOptions = {
        threshold: 0.1,
        rootMargin: "0px 0px -50px 0px"
    };

    const revealOnScroll = new IntersectionObserver(function(entries, observer) {
        entries.forEach(entry => {
            if (!entry.isIntersecting) return;
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
            observer.unobserve(entry.target);
        });
    }, revealOptions);

    revealElements.forEach(el => revealOnScroll.observe(el));

    // 3. Interactive Calendar Mockup
    const days = document.querySelectorAll('.cal-grid .day:not(.fade)');
    days.forEach(day => {
        day.addEventListener('click', () => {
            document.querySelector('.cal-grid .day.active')?.classList.remove('active');
            day.classList.add('active');
        });
    });

    const timeBtns = document.querySelectorAll('.time-btn');
    timeBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            document.querySelector('.time-btn.active')?.classList.remove('active');
            btn.classList.add('active');
        });
    });

    // 4. Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            if(targetId === '#') return;
            const target = document.querySelector(targetId);
            if(target) {
                const navHeight = document.querySelector('.navbar').offsetHeight;
                const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - navHeight;
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });

    // 5. Real-time Notifications System
    initializeNotificationSystem();
});

// Notification System
function initializeNotificationSystem() {
    const bellButton = document.getElementById('notification-bell');
    const dropdown = document.getElementById('notification-dropdown');
    const closeBtn = document.getElementById('close-notifications');
    const notificationListEl = document.getElementById('notification-list');
    const notificationBadge = document.getElementById('notification-count');
    
    if (!bellButton) return; // User not logged in

    // Toggle notification dropdown
    bellButton.addEventListener('click', (e) => {
        e.stopPropagation();
        dropdown.classList.toggle('show');
        if (dropdown.classList.contains('show')) {
            fetchNotifications();
        }
    });

    // Close notification dropdown
    if (closeBtn) {
        closeBtn.addEventListener('click', () => {
            dropdown.classList.remove('show');
        });
    }

    // Close dropdown when clicking outside
    document.addEventListener('click', (e) => {
        if (!e.target.closest('.notification-bell-container')) {
            dropdown.classList.remove('show');
        }
    });

    // Register Service Worker for push notifications
    registerServiceWorker();

    // Poll for new notifications every 5 seconds
    setInterval(fetchNotifications, 5000);

    // Initial fetch
    fetchNotifications();
}

// Register Service Worker
function registerServiceWorker() {
    if (!('serviceWorker' in navigator)) {
        console.log('Service Workers not supported');
        return;
    }

    navigator.serviceWorker.register('/sw.js')
        .then(registration => {
            console.log('Service Worker registered successfully:', registration);
            
            // Request push notification permission
            if ('Notification' in window && Notification.permission === 'default') {
                Notification.requestPermission().then(permission => {
                    if (permission === 'granted') {
                        console.log('Push notifications enabled');
                    }
                });
            }
        })
        .catch(error => {
            console.error('Service Worker registration failed:', error);
        });
}

// Fetch notifications from server
function fetchNotifications() {
    const bellButton = document.getElementById('notification-bell');
    const notificationListEl = document.getElementById('notification-list');
    const notificationBadge = document.getElementById('notification-count');

    if (!bellButton) return;

    fetch('/dashboard/api_notifications')
        .then(response => response.json())
        .then(data => {
            if (!data.success) {
                console.error('Failed to fetch notifications');
                return;
            }

            const notifications = data.notifications || [];
            const unreadCount = data.unread_count || 0;

            // Update badge
            if (unreadCount > 0) {
                notificationBadge.textContent = unreadCount;
                notificationBadge.style.display = 'flex';
            } else {
                notificationBadge.style.display = 'none';
            }

            // Update notification list
            if (notifications.length === 0) {
                notificationListEl.innerHTML = '<p class="empty-message">No notifications yet</p>';
                return;
            }

            notificationListEl.innerHTML = '';
            notifications.forEach((notification, index) => {
                const notifEl = createNotificationElement(notification, index);
                notificationListEl.appendChild(notifEl);
            });

            // Browser notification for unread
            if (unreadCount > 0 && 'Notification' in window && Notification.permission === 'granted') {
                const latestUnread = notifications.find(n => !n.is_read);
                if (latestUnread) {
                    showBrowserNotification(latestUnread);
                }
            }
        })
        .catch(error => {
            console.error('Error fetching notifications:', error);
        });
}

// Create notification element for display
function createNotificationElement(notification, index) {
    const div = document.createElement('div');
    div.className = `notification-item${!notification.is_read ? ' unread' : ''}`;
    div.setAttribute('data-id', notification.id);

    const timeAgo = getTimeAgo(new Date(notification.created_at));

    div.innerHTML = `
        <div class="notification-content">
            <div class="notification-title">${escapeHtml(notification.title)}</div>
            <div class="notification-message">${escapeHtml(notification.message)}</div>
            <div class="notification-time">${timeAgo}</div>
        </div>
        <div class="notification-actions">
            ${!notification.is_read ? `<button class="read-btn" onclick="markNotificationRead(${notification.id}, event)" title="Mark as read"><i class="fas fa-check"></i></button>` : ''}
            <button class="delete-btn" onclick="deleteNotification(${notification.id}, event)" title="Delete"><i class="fas fa-trash"></i></button>
        </div>
    `;

    return div;
}

// Mark notification as read
function markNotificationRead(notificationId, event) {
    event.stopPropagation();

    fetch('/dashboard/api_mark_notification_read', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ notification_id: notificationId })
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                fetchNotifications();
            }
        })
        .catch(error => console.error('Error marking as read:', error));
}

// Delete notification
function deleteNotification(notificationId, event) {
    event.stopPropagation();

    fetch('/dashboard/api_delete_notification', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ notification_id: notificationId })
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                fetchNotifications();
            }
        })
        .catch(error => console.error('Error deleting notification:', error));
}

// Show browser notification
function showBrowserNotification(notification) {
    if ('Notification' in window && Notification.permission === 'granted') {
        const browserNotif = new Notification(notification.title, {
            body: notification.message,
            icon: '/assets/images/favicon.png',
            tag: 'notification-' + notification.id
        });

        // Close notification after 5 seconds
        setTimeout(() => browserNotif.close(), 5000);
    }
}

// Helper function to get time ago
function getTimeAgo(date) {
    const seconds = Math.floor((new Date() - date) / 1000);
    let interval = seconds / 31536000;

    if (interval > 1) return Math.floor(interval) + ' years ago';
    interval = seconds / 2592000;
    if (interval > 1) return Math.floor(interval) + ' months ago';
    interval = seconds / 86400;
    if (interval > 1) return Math.floor(interval) + ' days ago';
    interval = seconds / 3600;
    if (interval > 1) return Math.floor(interval) + ' hours ago';
    interval = seconds / 60;
    if (interval > 1) return Math.floor(interval) + ' minutes ago';
    return Math.floor(seconds) + ' seconds ago';
}

// Helper function to escape HTML
function escapeHtml(text) {
    const map = {
        '&': '&amp;',
        '<': '&lt;',
        '>': '&gt;',
        '"': '&quot;',
        "'": '&#039;'
    };
    return text.replace(/[&<>"']/g, m => map[m]);
}
