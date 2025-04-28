<div class="container-table">
    <table class="table">
    <tr>
        <th>Időpont</th>
        <th>Küldő</th>
        <th>Üzenet</th>
    </tr>
    <?php
    $messages = $database_connection->select_query("SELECT * FROM (messages LEFT JOIN users USING(user_id)) ORDER BY message_time");
    foreach($messages as $message){
        $time = $message["message_time"];
        $sender = $message["username"] ? $message["username"] : "Vendég";
        $text = $message["message_text"];
        echo "<tr>
        <td>${time}</td>
        <td>${sender}</td>
        <td>${text}</td>
        </tr>";
    }
    ?>
</table>
</div>
