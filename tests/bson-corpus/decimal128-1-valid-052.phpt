--TEST--
Decimal128: Non-Canonical Parsing - -inf
--DESCRIPTION--
Generated by scripts/convert-bson-corpus-tests.php

DO NOT EDIT THIS FILE
--FILE--
<?php

require_once __DIR__ . '/../utils/tools.php';

$canonicalBson = hex2bin('18000000136400000000000000000000000000000000F800');
$canonicalExtJson = '{"d" : {"$numberDecimal" : "-Infinity"}}';
$degenerateExtJson = '{"d" : {"$numberDecimal" : "-inf"}}';

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
18000000136400000000000000000000000000000000f800
{"d":{"$numberDecimal":"-Infinity"}}
18000000136400000000000000000000000000000000f800
18000000136400000000000000000000000000000000f800
===DONE===