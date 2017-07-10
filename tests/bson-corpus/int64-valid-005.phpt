--TEST--
Int64 type: 1
--XFAIL--
PHP encodes integers as 32-bit if range allows
--DESCRIPTION--
Generated by scripts/convert-bson-corpus-tests.php

DO NOT EDIT THIS FILE
--FILE--
<?php

require_once __DIR__ . '/../utils/tools.php';

$canonicalBson = hex2bin('10000000126100010000000000000000');
$canonicalExtJson = '{"a" : {"$numberLong" : "1"}}';
$relaxedExtJson = '{"a" : 1}';

// Canonical BSON -> Native -> Canonical BSON 
echo bin2hex(fromPHP(toPHP($canonicalBson))), "\n";

// Canonical BSON -> Canonical extJSON 
echo json_canonicalize(toExtendedJSON($canonicalBson)), "\n";

// Canonical BSON -> Relaxed extJSON 
echo json_canonicalize(toJSON($canonicalBson)), "\n";

// Canonical extJSON -> Canonical BSON 
echo bin2hex(fromJSON($canonicalExtJson)), "\n";

// Relaxed extJSON -> BSON -> Relaxed extJSON 
echo json_canonicalize(toJSON(fromJSON($relaxedExtJson))), "\n";

?>
===DONE===
<?php exit(0); ?>
--EXPECT--
10000000126100010000000000000000
{"a":{"$numberLong":"1"}}
{"a":1}
10000000126100010000000000000000
{"a":1}
===DONE===