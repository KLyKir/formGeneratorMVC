
<html>
<head>
    <title>Генерація форм</title>
</head>
<body>

<?php if($status): ?>
    <?php echo $errors;?>
    <form action="/generation" method = "POST" id = "genF" name = "genF">
        <input type = "text" hidden value = '[{"element" : "text", "id" : "id1", "name" : "First name", "optionArr": []},{"element" : "text", "id" : "id2", "name" : "Last Name", "optionArr" : []}, {"element" : "text", "id" : "id2", "name" : "Email", "optionArr" : []}, {"element" : "text", "id" : "id2", "name" : "Password", "optionArr" : []}, {"element" : "submit", "id" : "submit", "name" : "", "optionArr" : []}]' name = "form">
        <input type = 'submit' id = 'submitButton'>
    </form>
<?php else:
    echo $formInfo;
endif; ?>
</body>
</html>