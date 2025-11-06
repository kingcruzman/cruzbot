<?php
// ===================================
// 🤖 CruzBot Signal Reader
// ===================================

// Include configuration
include 'bot_config.php';

// Telegram Bot Token (to read messages)
$telegram_bot_token = "YOUR_TELEGRAM_BOT_TOKEN_HERE"; // we’ll set this soon

// Telegram API URL
$api_url = "https://api.telegram.org/bot$telegram_bot_token/";

// Function to get latest messages
function getLatestMessages($channel, $api_url) {
    $update = file_get_contents($api_url . "getUpdates");
    $data = json_decode($update, true);
    return $data["result"];
}

// Function to extract signal from text
function extractSignal($text) {
    $pattern = '/🇬🇧|🇺🇸|🇪🇺|🇨🇳|\b[A-Z]{3}\/[A-Z]{3}\b|\bBUY\b|\bSELL\b|\d{2}:\d{2}/i';
    preg_match_all($pattern, $text, $matches);
    return implode(' ', $matches[0]);
}

// MAIN
$messages = getLatestMessages($signal_channel, $api_url);

foreach ($messages as $msg) {
    $text = $msg["message"]["text"] ?? "";
    if (stripos($text, "Expiration") !== false) {
        $signal = extractSignal($text);
        echo "📩 New signal found: $signal\n";
        // Later: send to Pocket Option bot
    }
}
?>
