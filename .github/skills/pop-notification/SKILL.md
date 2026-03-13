---
name: pop-notification
description: Implement pop-up notification system in PHP web applications. Use when: adding toast notifications, modal alerts, or pop-up messages for user feedback in web apps.
---

# Pop Notification Implementation Skill

## Overview
This skill guides the implementation of pop-up notifications (toasts, modals, alerts) in PHP web applications, providing user feedback for actions like form submissions, errors, or success messages.

## Workflow Steps

### 1. Plan the Notification System
- **Decide on types**: Toast (non-blocking), modal (blocking), or banner notifications
- **Identify triggers**: Form submissions, AJAX responses, page loads, user actions
- **Define message types**: Success, error, warning, info
- **Consider persistence**: Session-based or database-stored

### 2. Create Frontend Components

#### HTML Structure
Add to your base template (e.g., `app/views/templates/footer.php` or header):
```html
<!-- Notification Container -->
<div id="popup-container" class="popup-container">
  <!-- Popups will be inserted here dynamically -->
</div>
```

#### CSS Styling (`public/styles.css` or new `popup.css`)
```css
.popup-container {
  position: fixed;
  top: 20px;
  right: 20px;
  z-index: 1000;
}

.popup {
  background: #fff;
  border-radius: 8px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.15);
  margin-bottom: 10px;
  min-width: 300px;
  opacity: 0;
  transform: translateX(100%);
  transition: all 0.3s ease;
}

.popup.show {
  opacity: 1;
  transform: translateX(0);
}

.popup.success { border-left: 4px solid #28a745; }
.popup.error { border-left: 4px solid #dc3545; }
.popup.warning { border-left: 4px solid #ffc107; }
.popup.info { border-left: 4px solid #17a2b8; }
```

#### JavaScript Functionality (`public/script.js` or new `popup.js`)
```javascript
class PopupNotification {
  static show(message, type = 'info', duration = 5000) {
    const container = document.getElementById('popup-container');
    const popup = document.createElement('div');
    popup.className = `popup ${type}`;
    popup.innerHTML = `
      <div class="popup-content">
        <span class="popup-message">${message}</span>
        <button class="popup-close">&times;</button>
      </div>
    `;
    
    container.appendChild(popup);
    
    // Show animation
    setTimeout(() => popup.classList.add('show'), 10);
    
    // Auto-hide
    if (duration > 0) {
      setTimeout(() => this.hide(popup), duration);
    }
    
    // Close button
    popup.querySelector('.popup-close').onclick = () => this.hide(popup);
  }
  
  static hide(popup) {
    popup.classList.remove('show');
    setTimeout(() => popup.remove(), 300);
  }
}

// Make globally available
window.PopupNotification = PopupNotification;
```

### 3. Backend Integration

#### PHP Helper Class (`app/helpers/popup_helper.php`)
```php
class PopupHelper {
  public static function add($message, $type = 'info') {
    if (!isset($_SESSION['popups'])) {
      $_SESSION['popups'] = [];
    }
    $_SESSION['popups'][] = ['message' => $message, 'type' => $type];
  }
  
  public static function getAll() {
    $popups = $_SESSION['popups'] ?? [];
    unset($_SESSION['popups']);
    return $popups;
  }
}
```

#### Usage in Controllers
```php
// In any controller after an action
PopupHelper::add('Profile updated successfully!', 'success');
PopupHelper::add('Failed to save changes.', 'error');
```

#### Display in Views
Add to your base template (e.g., `app/views/templates/header.php`):
```php
<?php
$popups = PopupHelper::getAll();
foreach ($popups as $popup): ?>
<script>
PopupNotification.show('<?= htmlspecialchars($popup['message']) ?>', '<?= $popup['type'] ?>');
</script>
<?php endforeach; ?>
```

### 4. Testing and Refinement
- Test all notification types
- Verify auto-hide functionality
- Check mobile responsiveness
- Ensure accessibility (screen readers, keyboard navigation)
- Test with different browsers

## Quality Checks
- [ ] Notifications appear correctly for all types
- [ ] Auto-hide works as expected
- [ ] Manual close button functions
- [ ] No JavaScript errors in console
- [ ] Responsive on mobile devices
- [ ] Accessible to screen readers

## Common Issues
- **Popups not showing**: Check if JavaScript is loaded after HTML
- **Session issues**: Ensure session is started in bootstrap.php
- **Styling conflicts**: Use specific CSS classes to avoid overrides
- **Multiple popups**: Ensure they stack properly without overlapping