<?php
namespace Nopaad\PasargadBank;
class Gateway
{
	public static function sign($amount, $redirect, $invoice_number, $action){
		$plaintext =
			'#' . config('laravel-pasargad-bank.merchant') .
			'#' . config('laravel-pasargad-bank.terminal') .
			'#' . $invoice_number .
			'#' . date("Y-m-d H:i:s") .
			'#' . $amount .
			'#' . $redirect .
			'#' . $action .
			'#' . date("Y-m-d H:i:s") .
			'#';
		$rsa = new \phpseclib\Crypt\RSA();
		$rsa->loadKey(config('laravel-pasargad-bank.private_key')); // private key
		$rsa->setSignatureMode(\phpseclib\Crypt\RSA::SIGNATURE_PKCS1);
		$signature = $rsa->sign($plaintext);
		$signature = base64_encode($signature);
		return $signature;
	}
}
