--TEST--
APC compat: apc_inc segfaults if APCU is disabled
--SKIPIF--
<?php require_once(dirname(__FILE__) . '/skipif.inc'); ?>
--INI--
apc.enabled=0
apc.enable_cli=0
--FILE--
<?php
var_dump(apc_inc('foo'));
?>
===DONE===
--EXPECTF--
bool(false)
===DONE===
