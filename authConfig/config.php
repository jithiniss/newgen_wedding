<?php

return array(
    'jwt' => array(
//'key' => base64_encode(openssl_random_pseudo_bytes(64)), // Key for signing the JWT's, I suggest generate it with base64_encode(openssl_random_pseudo_bytes(64))
        'algorithm' => 'HS512', // Algorithm used to sign the token, see https://tools.ietf.org/html/draft-ietf-jose-json-web-algorithms-40#section-3
        'key' => 'sujan',
    ),
    'database' => array(
        'user' => 'root', // Database username
        'password' => 'mysql', // Database password
        'host' => 'localhost', // Database host
        'name' => 'newgen_wedding', // Database schema name
    ),
    'serverName' => 'localhost',
);
