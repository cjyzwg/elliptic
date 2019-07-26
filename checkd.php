<?php
/**
first:00e1e39a39e23735adab690d0ffbefda6cacc063b4a5fcc605de060bd370adc54c94370d966b9a3fae5ed16bd58a02224cbefca4146a083951b70be2a2ce3dcc
Secret:  00e1e39a39e23735adab690d0ffbefda6cacc063b4a5fcc605de060bd370adc54c94370d966b9a3fae5ed16bd58a02224cbefca4146a083951b70be2a2ce3dcc
Private: 5bcbe386f9bbf2e3b3c9bc841d0eb532c9a5dcd14fcdd057d79cde0814c44bd8
Public:  80608476d5669c6ea55e683017ea5028d3c182803bf3d7f5451d3a7198dff443
sig:D0AD0882742FC6D8978EC28976DB05A49648BE10550257D344A8E6DD1B541DBAE86919272FAEC8D50F9DF33D77FF1F8BAD4F1C54CCFEF00BD06D6AEED0331705
**/
require_once "./vendor/autoload.php";
use Elliptic\EdDSA;
// Create and initialize EdDSA context
// (better do it once and reuse it)
$ec = new EdDSA('ed25519');
//$mnemonic = "crm1";
//$secret = hash_pbkdf2('sha512', $mnemonic, 'mnemonic', 2048);
// Create key pair from secret
//$key = $ec->keyFromSecret('00e1e39a39e23735adab690d0ffbefda6cacc063b4a5fcc605de060bd370adc54c94370d966b9a3fae5ed16bd58a02224cbefca4146a083951b70be2a2ce3dcc'); // hex string or array of bytes
//$secret="00e1e39a39e23735adab690d0ffbefda6cacc063b4a5fcc605de060bd370adc54c94370d966b9a3fae5ed16bd58a02224cbefca4146a083951b70be2a2ce3dcc";
//$key = $ec->keyFromSecret('00e1e39a39e23735adab690d0ffbefda6cacc063b4a5fcc605de060bd370adc54c94370d966b9a3fae5ed16bd58a02224cbefca4146a083951b70be2a2ce3dcc');
//$key = $ec->keyFromSecret('61233ca4590acd');
//$key = $ec->keyFromSecret($secret);

//die();
// Sign message (can be hex sequence or array)
//$msg = "111scheme spot photo card baby mountain device kick cradle pact join borrow";
//$signature = $key->sign($msg,$secret)->toHex();
//echo $signature."\n";
//die();
// Verify signature
//echo "Verified: " . (($key->verify($msg, $signature) == TRUE) ? "true" : "false") . "\n";

// CHECK WITH NO PRIVATE KEY
//$msg = "1";
//$signature = $key->sign($msg,'abcd')->toHex();
echo $signature."\n";
// Import public key
//$pub = '80608476d5669c6ea55e683017ea5028d3c182803bf3d7f5451d3a7198dff443';
//$kp = $ec->keyFromPublic($pub, 'hex');
$msg = "crm1";
$secret = hash_pbkdf2('sha512', $msg, $msg, 20);
//echo $secret;
$key = $ec->keyFromSecret($secret);
$signature = $key->sign($msg,$secret)->toHex();
//$pub = '80608476d5669c6ea55e683017ea5028d3c182803bf3d7f5451d3a7198dff443';
$pub = '8f2ffe48c9d150b5738fd90a1a1698ed4a488cd9b779a93716ba459c1e1f21a0';
$kp = $ec->keyFromPublic($pub, 'hex');
//echo $signature;
// Verify signature
//$signature = 'D0AD0882742FC6D8978EC28976DB05A49648BE10550257D344A8E6DD1B541DBAE86919272FAEC8D50F9DF33D77FF1F8BAD4F1C54CCFEF00BD06D6AEED0331705';
echo "Verified: " . (($kp->verify($msg, $signature) == TRUE) ? "true" : "false") . "\n";
