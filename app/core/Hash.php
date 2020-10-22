<?php

class Hash {
    public static function create($data, $salt, $algo='sha1') {
        $context = hash_init($algo, HASH_HMAC, $salt);
        hash_update($context, $data);
        return hash_final($context);
    }

}
