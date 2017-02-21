<body>
    <h1>Please check your query</h1>
    <h2>
        <?php
        //If there is a message set, display that message to user
        if (isset($message)) {
            echo $message;
        }
        ?>
    </h2>
</body>