--TEST--
APC compat: apc_inc / apc_dec
--SKIPIF--
<?php require_once(dirname(__FILE__) . '/skipif.inc'); ?>
--INI--
apc.enabled=1
apc.enable_cli=1
apc.file_update_protection=0
--FILE--
<?php
echo "* Key not set\n";
var_dump(apc_inc('foo'));
var_dump(apc_inc('foo', 1, $res), $res);
unset($res);
var_dump(apc_dec('foo'));
var_dump(apc_dec('foo', 1, $res), $res);
unset($res);
echo "* Set the key\n";
var_dump(apc_store('foo', 100));
echo "* Key set\n";
var_dump(apc_inc('foo'));
var_dump(apc_inc('foo', 2, $res), $res);
unset($res);
var_dump(apc_dec('foo'));
var_dump(apc_dec('foo', 3, $res), $res);
unset($res);
?>
===DONE===
--EXPECTF--
* Key not set
bool(false)
bool(false)
bool(false)
bool(false)
bool(false)
bool(false)
* Set the key
bool(true)
* Key set
int(101)
int(103)
bool(true)
int(102)
int(99)
bool(true)
===DONE===
