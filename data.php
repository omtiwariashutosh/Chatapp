<?php
while ($row = mysqli_fetch_assoc($query)) {
    $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id={$row['unique_id']})
    OR (outgoing_msg_id = {$row['unique_id']} AND outgoing_msg_id = {$outgoing_id})
    OR (incoming_msg_id = {$row['unique_id']}) ORDER BY msg_id DESC LIMIT 1";

    $query2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($query2);


    if (mysqli_num_rows($query2) > 0) {
        $result = $row2['msg'];
        $you = ($outgoing_id == $row2['outgoing_msg_id']) ? "You: " : "";
    } else {
        $result = 'No message found';
        $you = "";
    }


    $msg = (strlen($result) > 28) ? substr($result, 0, 28) . '...' : $result;


    $offline = ($row['status'] == "Offline now") ? "offline" : "";
    $hid_me = ($outgoing_id == $row['unique_id']) ? "hide" : "";

    $output .= '<a href="chat.php?user_id=' . $row['unique_id'] . '">
    <div class="content">
        <img src="images/.' . $row['img'] . '" alt="">
        <div class="details">
            <span>' . $row['fname'] . " " . $row['lname'] . '</span>
            <p>' . $you . $msg . '</p>
        </div>
    </div>
    <div class="status-dot ' . $offline . '"><i class="fas fa-circle"></i></div>
    </a>';
}
