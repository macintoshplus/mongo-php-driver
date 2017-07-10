--TEST--
Decimal128: [basx347] Engineering notation tests
--DESCRIPTION--
Generated by scripts/convert-bson-corpus-tests.php

DO NOT EDIT THIS FILE
--FILE--
<?php

require_once __DIR__ . '/../utils/tools.php';

$canonicalBson = hex2bin('180000001364000A000000000000000000000000002A3000');
$canonicalExtJson = '{"d" : {"$numberDecimal" : "1.0E-10"}}';
$degenerateExtJson = '{"d" : {"$numberDecimal" : "10e-11"}}';

// Canonical BSON -> Native -> Canonical BSON 
echo bin2hex(fromPHP(toPHP($canonicalBson))), "\n";

// Canonical BSON -> Canonical extJSON 
echo json_canonicalize(toExtendedJSON($canonicalBson)), "\n";

// Canonical extJSON -> Canonical BSON 
echo bin2hex(fromJSON($canonicalExtJson)), "\n";

// Degenerate extJSON -> Canonical BSON 
echo bin2hex(fromJSON($degenerateExtJson)), "\n";

?>
===DONE===
<?php exit(0); ?>
--EXPECT--
180000001364000a000000000000000000000000002a3000
{"d":{"$numberDecimal":"1.0E-10"}}
180000001364000a000000000000000000000000002a3000
180000001364000a000000000000000000000000002a3000
===DONE===