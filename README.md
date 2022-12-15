## Feladat leírása

Implementation: You have to implement the whole Secret Server API. If it is not specified you can choose the technology you want to use (database, programming language, framework, etc). However it would be wise to store the data using encryption now this is not part of the task. You can use plain text to store your secrets.

Response types The API must be able to response with XML or JSON too, based on the Accept header. Other response types (such as YAML) might be added later so prepare your code to be extandable.

Hosting: You also have to deploy and host the service. There are plenty of free solutions to do this. So this shouldn't be an issue. If this API was used in production, then HTTPS would be a must but this is not the case now. It is allowed to use HTTP too.

Code quality matters: We love OOP style well documented PSR compatible clean code. Automation test coverage is not a requirement but definitely is a plus.

Share the code: Upload the code to your GitHub account and share with us.

## SecretServer API Laravel alapokon

A <a href="https://github.com/ngabesz-wse/secret-server-task">https://github.com/ngabesz-wse/secret-server-task</a> feladat általam elképzelt megoldása. Nincs túlbonyolítva, csak az egyszerű megoldásra törekedtem. A megvalósításra Laravel keretrendszer került felhasználásra. A feladat kiírásában kér hostolási lehetőség megvalósítva a <a href="https://www.alwaysdata.com/">alwaysdata</a> (sajnos ezt már törölték) szolgáltatásain keresztűl.

A feladatban csak az egyedi lekérdezés, illetve a lekérdezések rögzítésének lehetősége volt meghatározva, így az esetleges más típusú kérések (PUT, DELETE, illetve az összes tétel lekérdezése) "403 - Illegal request!" üzenettel tér vissza! 

## Az API általam írt/módosított fájlai:

- **app\Http\Controllers\SecretController.php**
- **app\Models\Secret.php**
- **database\migrations\2021_10_01_062411_create_secrets_table.php**
- **routes\api.php (módosítva)**

## Az API elérése

**https://veresi66.alwaysdata.net/secret/api/v1/secret/**

## Az API tesztelésének lehetőségei

Az API teszteléséhez készült egy egyszerű kis tesztprogram, mely elérhető weben a https://veresi66.alwaysdata.net/secret/api-test oldalon keresztül. De mondhatni, ugyanarról a szerverről könnyű, megoldani, ezért a \testPage mappa tartalma a saját számítógépre másolva, egy JavaScript képes böngészővel szintén tesztelhető az API.
Amennyiben olyan kérés érkezik az API felé, mely nem tartalmaz "Accept" fejlécet, vagy nem olyan fejlécet tartalmaz, melyre fel van készítve, akkor "405 - The request contains an invalid "Accept" header!" üzenet a válasz. A teszt oldalhoz a Laravel keretrendszer, illetve Bootstrap, jQuery, JavaScript, HTML5, CSS3 technikák kerültek felhasználásra.

## A tesztprogram általam írt/módosított részei

- **app\Http\Controllers\ApiTestController.php**
- **resources\views\layouts\main.blade.php**
- **resources\views\apiTest\index.blade.php**
- **routes\web.php (módosítva)**
- **public\scripts\vip.js**
- **public\styles\vip.css**
