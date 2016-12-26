<?php
namespace Nopaad\PasargadBank;
class Gateway
{
	public static function sign($amount, $redirect, $invoice_number, $action){
		$output = $input = [
			'merchantCode' => config('laravel-pasargad-bank.merchant'),
			'terminalCode' => config('laravel-pasargad-bank.terminal'),
			'invoiceNumber' => $invoice_number,
			'invoiceDate' => date("Y-m-d H:i:s"),
			'amount' => $amount,
			'redirectAddress' => $redirect,
			'action' => $action,
			'timeStamp' => date("Y-m-d H:i:s"),
		];
		$plaintext = '#'. collect($input)->implode('#') . '#';
		$rsa = new \phpseclib\Crypt\RSA();
		$rsa->loadKey(config('laravel-pasargad-bank.private_key')); // private key
		$rsa->setSignatureMode(\phpseclib\Crypt\RSA::SIGNATURE_PKCS1);
		$output['sign'] = $rsa->sign($plaintext);
		$output['sign'] = base64_encode($output['sign']);

		return collect($output);
	}
}
