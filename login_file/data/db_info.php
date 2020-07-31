<?php
  $mysql_hostname = "localhost"; //localhost 즉 자기자신을 말한다.
  $mysql_username = "jongin"; // jongin 계정으로 접속을 한다.
  $mysql_password = "1004"; //jongin 계정의 설정된 비밀번호.
  $mysql_database = "login"; // 접속하고자 하는 데이터 베이스
  $mysql_port = "3306"; //접속할때 사용하는 포트 번호
  $mysql_charset = "UTF8"; //localhost 즉 자기자신을 말한다.

  //2.db연결
  $mysqli = new mysqli($mysql_hostname, $mysql_username, $mysql_password,
                      $mysql_database, $mysql_port, $mysql_charset);

 ?>
