--TEST--
Decimal128: [decq612] fold-down full sequence
--DESCRIPTION--
Generated by scripts/convert-bson-corpus-tests.php

DO NOT EDIT THIS FILE
--FILE--
<?php

require_once __DIR__ . '/../utils/tools.php';

$canonicalBson = hex2bin('18000000136400000000106102253E5ECE4F200000FE5F00');
$canonicalExtJson = '{"d" : {"$numberDecimal" : "1.0000000000000000000000000000E+6139"}}';

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
18000000136400000000106102253e5ece4f200000fe5f00
{"d":{"$numberDecimal":"1.0000000000000000000000000000E+6139"}}
18000000136400000000106102253e5ece4f200000fe5f00
===DONE===