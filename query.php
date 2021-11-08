<?php
$conn = mysqli_connect("localhost","root","","onlinebot");


if($conn)
{
    $user_messages = mysqli_real_escape_string($conn, $_POST['messageValue']);

    $query = "SELECT * FROM chatbot WHERE messages LIKE '%$user_messages%'";
    $makeQuery = mysqli_query($conn, $query);

    if(mysqli_num_rows($makeQuery) > 0) 
    {
        $result = mysqli_fetch_assoc($makeQuery);

        echo $result['response'];
    }else{
        echo "Sorry, I can't understand you.";
    }
}else {
    echo "Connection failed" . mysqli_connect_errno();
}
?>