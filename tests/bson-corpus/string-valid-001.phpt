--TEST--
String: Empty string
--DESCRIPTION--
Generated by scripts/convert-bson-corpus-tests.php

DO NOT EDIT THIS FILE
--FILE--
<?php

require_once __DIR__ . '/../utils/tools.php';

$canonicalBson = hex2bin('0D000000026100010000000000');
$canonicalExtJson = '{"a" : ""}';

// Canonical BSON -> Native -> Canonical BSON 
echo bin2hex(fromPHP(toPHP($canonicalBson))), "\n";

// Canonical BSON -> Canonical extJSON 
echo json_canonicalize(toExtendedJSON($canonicalBson)), "\n";

// Canonical extJSON -> Canonical BSON 
echo bin2hex(fromJSON($canonicalExtJson)), "\n";

?>
===DONE===
<?php exit(0); ?>
--EXPECT--
0d000000026100010000000000
{"a":""}
0d000000026100010000000000
===DONE===