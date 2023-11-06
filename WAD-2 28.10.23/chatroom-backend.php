<?php
/*if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $message = $_POST['message'];
    
    // You can store the messages in a file or database here.
    // For simplicity, we'll store them in a text file.

    $message = "<b>$username:</b> $message <br/>\n";
    file_put_contents('chat.txt', $message, FILE_APPEND);
} else {
    // Display the chat history
    echo file_get_contents('chat.txt');
}
*/
?>
<?php
    switch($_SERVER['REQUEST_METHOD']) {
        case 'POST':
            $username = $_POST['username'];
            $message = $_POST['message'];
            $sysmsg = $_POST['msgsys'];
            switch($sysmsg) {
                case 'join':
                    $message = "Joined the chatroom";
                    $message = "<b>$username:</b> <em><mark>$message</mark></em> <br/>\n";
                    file_put_contents('chat.txt', $message, FILE_APPEND);
                    break;
                case 'leave':
                    $message = "Left the chatroom";
                    $message = "<b>$username:</b> <em><mark>$message</mark></em> <br/>\n";
                    file_put_contents('chat.txt', $message, FILE_APPEND);
                    break;
                default:
                    // You can store the messages in a file or database here.
                    // For simplicity, we'll store them in a text file.
                    $message = "<b>$username:</b> $message <br/>\n";
                    file_put_contents('chat.txt', $message, FILE_APPEND);
            }
            break;
        case 'GET':
            // Display the chat history
            echo file_get_contents('chat.txt');
            break;
    }
?>