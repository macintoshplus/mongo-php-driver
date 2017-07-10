--TEST--
Decimal128: [decq447] exponent lengths
--DESCRIPTION--
Generated by scripts/convert-bson-corpus-tests.php

DO NOT EDIT THIS FILE
--FILE--
<?php

require_once __DIR__ . '/../utils/tools.php';

$canonicalBson = hex2bin('1800000013640007000000000000000000000000000E3800');
$canonicalExtJson = '{"d" : {"$numberDecimal" : "7E+999"}}';

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
1800000013640007000000000000000000000000000e3800
{"d":{"$numberDecimal":"7E+999"}}
1800000013640007000000000000000000000000000e3800
===DONE===