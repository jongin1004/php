<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        ini_set("display_errors", 1);
        $uploaddir = 'C:\xampp\htdocs\PHP\file\\';
        $uploadfile = $uploaddir.basename($_FILES['userFile']['name']);
        echo "<pre>";
        
        if (move_uploaded_file($_FILES['userFile']['tmp_name'], $uploadfile)) {
            echo "파일이 유효하고, 성공적으로 업로드 되었습니다. \n";
        } else {
            echo "파일 업로드 공격의 가능성이 있습니다! \n";
        }
        echo "자세한 디버깅 정보입니다: ";
        print_r($_FILES);
        echo "</pre>";
    ?>

    <img src="./<?=$_FILES['userFile']['name']?>">
</body>
</html>