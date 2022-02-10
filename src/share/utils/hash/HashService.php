<?php

class HashService {
    private readonly string $ciphering;
    private readonly string $key;
    private readonly string $iv;
    private readonly string $salt;
    private readonly int $options;

    public function __construct() {
        $this->ciphering = 'AES-128-CTR';
        $this->key = 'examplekey';
        $this->salt = 'strongsalt';
        $this->iv = '1234567891011121';
        $this->options = 0;
    }

    /**
     * @param string[] $data
     * @return string
     */
    public function encrypt(array $datas): string {
        $text = implode(" $this->salt ", $datas);

        return openssl_encrypt($text, $this->ciphering, $this->key, $this->options, $this->iv);
    }

    /**
     * @param string $cipher
     * @return string[]
     */
    public function decrypt(string $cipher): array {
        $decryption = openssl_decrypt($cipher, $this->ciphering, $this->key, $this->options, $this->iv);

        return explode(" $this->salt ", $decryption);
    }
}
