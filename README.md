# NewsPage
PHP,MySQL,AXAJ

Простая форма новостной страницы. Присутсвует элементарная форма регистрации/авторизацию(требует добаротки со стороны безопасности). 
Минимум css стиля, что позволяет сделать внешний как Вам надо.
Все сообщения отправленные формой автоматический без обновления страницы появляется под формой отсортированые по дате добавления.


P.S. Формы авторизации/регистрации очень простая, т.е. отсутсвует какая-либо проверка, а именно не проверяется в базе есть ли такой зарегистрированый или может быть человек с таким ником уже есть.
Это исправляется доп. запросов в бд + проверкой например так: 
  <pre>  $res = mysql_query("SELECT * FROM user WHERE name = '$login' ");
    $data = mysql_fetch_array($res);
    if(empty($data['name'])){
        session_start();
        $_SESSION['name'] = false;
        header("location: index.php");
        exit;
    }
    else if($password != $data['password']){
        session_start();
        $_SESSION['passwordCheck'] = false;
        header("location: index.php");
        exit;
    }
    </pre>
    
А дальше уже в главном коде php писать проверку на полученные данные, чтобы сообщить пользователю об удачном или неудачнов входе.


