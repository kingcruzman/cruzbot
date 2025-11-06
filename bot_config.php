<?php
// ===============================
// 🔧 CruzBot Configuration File
// ===============================

// Telegram signal channel username (without @)
$signal_channel = "thelorenzotrader";

// Your Pocket Option login details (for demo)
$pocket_email = "mancruz581@gmail.com";
$pocket_password = "YOUR_PASSWORD_HERE"; // <-- Replace this later

// Default trade settings
$trade_amount = 1; // Amount per trade in USD
$martingale_levels = 3; // Number of martingale levels
$expiration_minutes = 5; // Trade expiry time
$pair = "GBP/USD"; // Default pair, will update from signal

echo "✅ CruzBot config loaded successfully";
?>
