# Real-Time Notification System - Implementation Guide

## System Overview
The notification system provides real-time push notifications that work even when users are offline, using Service Workers and browser notifications APIs.

## ✅ What's Been Implemented

### 1. Frontend Components

#### Bell Icon in Header (`app/views/templates/header.php`)
- Red notification bell icon in navbar (when user is logged in)
- Animated badge showing unread notification count
- Clicking opens dropdown with all notifications
- Smooth animations and glassmorphism design

#### Notification Dropdown
- Displays up to 10 most recent notifications
- Each notification shows:
  - Title and message
  - Time ago (e.g., "5 minutes ago")
  - Status indicator for unread notifications
- Action buttons to mark as read or delete
- Empty state message when no notifications

#### Real-Time Polling System (`public/script.js`)
- Automatically fetches notifications every 5 seconds
- Updates badge count in real-time
- Shows browser notifications for new unread messages
- Handles notification interactions (read, delete)

#### Service Worker (`public/sw.js`)
- Registers automatically on page load
- Listens for push events
- Shows browser notifications even when site is closed
- Handles notification clicks to open app

### 2. Backend API Endpoints

All endpoints require authentication (logged-in user session).

#### GET `/dashboard/api_notifications`
Returns all notifications for the current user
```json
{
  "success": true,
  "notifications": [
    {
      "id": 1,
      "user_id": 2,
      "title": "Welcome",
      "message": "Your notification",
      "type": "info",
      "is_read": false,
      "created_at": "2026-03-11 10:30:00"
    }
  ],
  "unread_count": 3
}
```

#### POST `/dashboard/api_mark_notification_read`
Mark a notification as read
```json
POST body: { "notification_id": 1 }
Response: { "success": true, "message": "Notification marked as read" }
```

#### POST `/dashboard/api_delete_notification`
Delete a notification
```json
POST body: { "notification_id": 1 }
Response: { "success": true, "message": "Notification deleted" }
```

#### POST `/dashboard/api_register_push`
Register for push notifications (optional)
```json
POST body: { "subscription": {...} }
Response: { "success": true, "message": "Push notifications enabled" }
```

### 3. Database Schema

```sql
CREATE TABLE notifications (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  title VARCHAR(255) NOT NULL,
  message TEXT NOT NULL,
  type VARCHAR(50) DEFAULT 'info',
  is_read TINYINT(1) DEFAULT 0,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);
```

### 4. Styling
- Notification badge with pulsing animation
- Smooth dropdown transitions
- Responsive design for mobile
- Dark theme matching YouTube aesthetic
- Hover effects on interactive elements

## How to Use

### For Users
1. Log in to the platform
2. Look for the bell icon in the top navigation
3. Unread notifications show as a red badge with count
4. Click the bell icon to open the dropdown
5. View all your notifications with timestamps
6. Click the checkmark to mark as read
7. Click the trash icon to delete
8. Browser will show push notifications if you grant permission

### For Admins/Super Admins - Sending Notifications

#### From AdminController
```php
public function send_notification() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $user_id = $_POST['user_id'];
        $title = $_POST['title'];
        $message = $_POST['message'];
        
        $notificationModel = $this->model('Notification');
        $result = $notificationModel->sendNotification([
            'user_id' => $user_id,
            'title' => $title,
            'message' => $message,
            'type' => 'info'
        ]);
        
        if ($result) {
            echo "Notification sent successfully!";
        }
    }
}
```

#### From SuperAdminController - Broadcast to All
```php
public function send_notification() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $recipient_type = $_POST['recipient_type']; // all, admins, users
        $title = $_POST['title'];
        $message = $_POST['message'];
        
        $notificationModel = $this->model('Notification');
        
        if ($recipient_type == 'all') {
            // Send to all users
            $users = $this->userModel->getUsers();
            foreach ($users as $user) {
                $notificationModel->sendNotification([
                    'user_id' => $user->id,
                    'title' => $title,
                    'message' => $message,
                    'type' => 'info'
                ]);
            }
        }
    }
}
```

## Features in Detail

### Real-Time Detection
- Frontend checks for new notifications every 5 seconds
- Automatically updates the badge count
- Shows browser notifications for unread messages
- No page refresh needed

### Browser Push Notifications
- User sees notification even if site tab is closed
- Clicking notification brings focus to site
- Works on Chrome, Firefox, Edge, Safari
- Requires user permission (granted on first prompt)

### Unread Indicator
- Unread notifications have light red background
- Badge shows total unread count
- Mark as read removes the highlight

### Time Display
- Shows relative time (e.g., "5 minutes ago")
- Handles seconds, minutes, hours, days, months, years

### Offline Support
- Service Worker keeps app responsive offline
- Stores notification preferences
- Syncs when connection is restored

## Testing

### Test With Admin Account
1. Log in as: `admin@creatorhub.com` / `admin123`
2. Go to Admin Dashboard
3. Send notification to yourself or other users
4. See it appear in the bell dropdown in real-time

### Test With Super Admin
1. Log in as: `shakesian6@gmail.com` / `admin@1234`
2. Go to Super Admin Dashboard
3. Broadcast a system announcement
4. All users receive the notification

### Check Browser Notifications
1. Ensure notifications permission is granted
2. Send a notification while looking at the site
3. Browser notification should appear (5 second delay)
4. Click it to focus the window

## Troubleshooting

### Notifications not appearing?
1. Check browser console (F12) for errors
2. Verify user is logged in
3. Check that user_id is correct in database
4. Test `/dashboard/api_notifications` endpoint manually

### Badge not updating?
1. Verify JavaScript polling is running (check Console)
2. Check Network tab to see API calls being made
3. Ensure session is still valid

### Push notifications not working?
1. Requires HTTPS in production (works on localhost)
2. User must grant notification permission
3. Service Worker must be registered
4. Check F12 DevTools > Application > Service Workers

### Service Worker not registering?
1. Check DevTools > Application > Service Workers tab
2. Verify `/sw.js` file exists and is accessible
3. Check browser console for registration errors
4. Try clearing browser cache and reloading

## Files Modified

| File | Changes |
|------|---------|
| `app/views/templates/header.php` | Added bell icon + notification dropdown HTML |
| `public/script.js` | Added 300+ lines for notification system (polling, UI, push) |
| `public/sw.js` | NEW - Service Worker for offline push notifications |
| `public/styles.css` | Added 200+ lines of notification styling |
| `app/controllers/DashboardController.php` | Added 5 API endpoints |

## Security Considerations

1. **Authentication**: All API endpoints check `$_SESSION['user_id']`
2. **CSRF Protection**: Frontend uses CSRF tokens
3. **SQL Injection**: All queries use prepared statements
4. **XSS Prevention**: Notifications are HTML-escaped before display
5. **Rate Limiting**: Consider adding rate limits to prevent spam

## Future Enhancements

- [ ] Email notifications for important messages
- [ ] Desktop/mobile app push notifications
- [ ] Notification categories and filtering
- [ ] Do Not Disturb scheduling
- [ ] Notification history/archive
- [ ] WebSocket support for true real-time (instead of polling)
- [ ] Read receipts for administrators
- [ ] Notification templates for common messages
