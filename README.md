## SecretServer API Laravel alapokon

A <a href="https://github.com/ngabesz-wse/secret-server-task">https://github.com/ngabesz-wse/secret-server-task</a> feladat általam elképzelt megoldása. Nincs túlbonyolítva, csak az egyszerű megoldásra törekedtem. A megvalósításra Laravel keretrendszer került felhasználásra. A feladat kiírásában kér hostolási lehetőség megvalósítva a <a href="https://www.alwaysdata.com/">alwaysdata</a> szolgáltatásain keresztűl.

## Az API általam írt/módosított fájlai:

- app\Http\Controllers\SecretController.php
- app\Models\Secret.php
- database\migrations\2021_10_01_062411_create_secrets_table.php
- routes\api.php

## Az API elérése

<a href="http://veresi66.alwaysdata.net/secret/api/v1/secret/">http://veresi66.alwaysdata.net/secret/api/v1/secret/</a>

## Az API tesztelésének lehetőségei

Az API teszteléséhez készült egy egyszerű kis tesztprogram, mely elérhető weben a http://veresi66.alwaysdata.net/secret/api-test oldalon keresztül
