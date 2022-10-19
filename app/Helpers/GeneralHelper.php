<?php

namespace App\Helpers;

use App\Models\CarreraPregrado;
use App\Models\IzipayPaymentsTransaction;
use App\Models\PaymentProof;
use App\Models\PaymentProofDetail;
use App\Models\Structure;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Lyra\Exceptions\LyraException;
use Lyra\Client;

class GeneralHelper{
    public static function formatNumberToRight($length, $code, $char = 0, $type = 'd'){

        $format = "%{$char}{$length}{$type}"; // or "$010d";
        $numberFormatted = sprintf($format, $code);
        return $numberFormatted;
    }

    public static function encriptString($token){
        $key = 'Pi7UGP8ZUiLDRzwjERPz';
        $plaintext = $token;
        $ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC");
        $iv = openssl_random_pseudo_bytes($ivlen);
        $ciphertext_raw = openssl_encrypt($plaintext, $cipher, $key, $options=OPENSSL_RAW_DATA, $iv);
        $hmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary=true);
        $ciphertext = base64_encode( $iv.$hmac.$ciphertext_raw );
        $ciphertext = str_replace("+", "•", $ciphertext);
        return $ciphertext;
    }

    public static function decriptString($token){
        $key = 'Pi7UGP8ZUiLDRzwjERPz';
        $c = base64_decode($token);
        $ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC");
        $iv = substr($c, 0, $ivlen);
        $hmac = substr($c, $ivlen, $sha2len=32);
        $ciphertext_raw = substr($c, $ivlen+$sha2len);
        $original_plaintext = openssl_decrypt($ciphertext_raw, $cipher, $key, $options=OPENSSL_RAW_DATA, $iv);
        $calcmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary=true);
        if (hash_equals($hmac, $calcmac))//PHP 5.6+ timing attack safe comparison
        {
            return $original_plaintext;
        }
    }

    public static function registrarPostulanteFromInteresado($dni, $modalidad, $estructura, $nombres, $apPaterno, $apMaterno, $celular, $correo){

    }

    public static function findEsctructuraByNombre($nombre){
            CarreraPregrado::where('descripcion', $nombre)->exists();
    }

}
