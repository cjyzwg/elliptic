<?php
require_once "./vendor/autoload.php";
use Elliptic\EdDSA;

//$mnemonic = "scheme spot photo card baby mountain device kick cradle pact join borrow";
$msg = "crm1";
$secret = hash_pbkdf2('sha512', $msg,$msg, 20);
echo "secret first:".$secret."\n";
$ec =  new EdDSA('ed25519');
$kp = $ec->keyFromSecret($secret);

assert($secret == $kp->getSecret('hex'));
echo "Secret:  " . $kp->getSecret('hex') . PHP_EOL;

echo "Private: " . $kp->priv()->toString('hex') . PHP_EOL;
echo "Public:  " . $kp->getPublic('hex') .  PHP_EOL;


