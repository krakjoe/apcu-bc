--TEST--
APC compat: apc_clear_cache
--SKIPIF--
<?php require_once(dirname(__FILE__) . '/skipif.inc'); ?>
--INI--
apc.enabled=1
apc.enable_cli=1
apc.file_update_protection=0
--FILE--
<?php
$foo = 'hello world';
apc_store('foo', $foo);
var_dump(apc_fetch('foo'));
apc_clear_cache(); /* clear opcode cache, nop */
var_dump(apcu_fetch('foo'));
apc_clear_cache("user"); /* clear user cache */
var_dump(apcu_fetch('foo'));
?>
===DONE===
<?php exit(0); ?>
--EXPECTF--
string(11) "hello world"
string(11) "hello world"
bool(false)
===DONE===
