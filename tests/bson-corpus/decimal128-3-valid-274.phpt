--TEST--
Decimal128: [basx216] Numbers with E
--DESCRIPTION--
Generated by scripts/convert-bson-corpus-tests.php

DO NOT EDIT THIS FILE
--FILE--
<?php

require_once __DIR__ . '/../utils/tools.php';

$canonicalBson = hex2bin('18000000136400F1040000000000000000000000003C3000');
$canonicalExtJson = '{"d" : {"$numberDecimal" : "12.65"}}';
$degenerateExtJson = '{"d" : {"$numberDecimal" : "126.5E-1"}}';

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
18000000136400f1040000000000000000000000003c3000
{"d":{"$numberDecimal":"12.65"}}
18000000136400f1040000000000000000000000003c3000
18000000136400f1040000000000000000000000003c3000
===DONE===