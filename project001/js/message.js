// message.js

document.addEventListener('DOMContentLoaded', function () {
    // Check if msg-other is visible
    var msgOther = document.getElementById('msg-other');
    if (msgOther && getComputedStyle(msgOther).display !== 'none') {
        // Hide msg-product if msg-other is visible
        var msgProduct = document.getElementById('msg-product');
        if (msgProduct) {
            msgProduct.style.display = 'none';
        }
    }
});
