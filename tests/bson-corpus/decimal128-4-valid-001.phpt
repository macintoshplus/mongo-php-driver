--TEST--
Decimal128: [basx023] conform to rules and exponent will be in permitted range).
--DESCRIPTION--
Generated by scripts/convert-bson-corpus-tests.php

DO NOT EDIT THIS FILE
--FILE--
<?php

require_once __DIR__ . '/../utils/tools.php';

$canonicalBson = hex2bin('1800000013640001000000000000000000000000003EB000');
$canonicalExtJson = '{"d" : {"$numberDecimal" : "-0.1"}}';

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
1800000013640001000000000000000000000000003eb000
{"d":{"$numberDecimal":"-0.1"}}
1800000013640001000000000000000000000000003eb000
===DONE===