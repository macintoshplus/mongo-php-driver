--TEST--
Decimal128: [decq656] fold-down full sequence
--DESCRIPTION--
Generated by scripts/convert-bson-corpus-tests.php

DO NOT EDIT THIS FILE
--FILE--
<?php

require_once __DIR__ . '/../utils/tools.php';

$canonicalBson = hex2bin('1800000013640040420F0000000000000000000000FE5F00');
$canonicalExtJson = '{"d" : {"$numberDecimal" : "1.000000E+6117"}}';

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
1800000013640040420f0000000000000000000000fe5f00
{"d":{"$numberDecimal":"1.000000E+6117"}}
1800000013640040420f0000000000000000000000fe5f00
===DONE===