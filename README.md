# lib-user-auth-handshake

## Instalasi

Jalankan perintah di bawah di folder aplikasi:

```
mim app install lib-user-auth-handshake
```

## Penggunaan

Module ini menambahkan satu library dengan nama `LibUserAuthHandshake\Library\Handshake` yang
bisa digunakan untuk menggenerasi dan memvalidasi token handshake.

```php
use LibUserAuthHandshake\Library\Handshake;

$user_id    = 1;
$session_id = 1;
$user_ip    = '127.0.0.1';
$user_agent = 'Google Chrome';

// generate 
$token = Handshake::generate($user_id, $session_id, $user_ip, $user_agent); 

// validasi
$valid = Handshake::validate($token, $user_ip, $user_agent);
```