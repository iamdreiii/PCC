<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cryptojs {
    public function __construct() {
        require_once(APPPATH.'libraries/cryptojs/core.js');
        require_once(APPPATH.'libraries/cryptojs/enc-base64.js');
        require_once(APPPATH.'libraries/cryptojs/enc-utf16.js');
        require_once(APPPATH.'libraries/cryptojs/aes.js');
    }
}
