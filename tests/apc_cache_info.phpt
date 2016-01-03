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
// 2 Misses
for ($i=0 ; $i<2 ; $i++) apc_fetch('foo');
// 1 entry
apc_store('foo', $foo);
// 3 Hits
for ($i=0 ; $i<3 ; $i++) apc_fetch('foo');
var_dump(apc_cache_info()); // opcode, nop
var_dump(apc_cache_info("user", true)); // user
?>
===DONE===
<?php exit(0); ?>
--EXPECTF--
NULL
array(10) {
  ["num_slots"]=>
  int(%d)
  ["ttl"]=>
  int(%d)
  ["num_hits"]=>
  float(3)
  ["num_misses"]=>
  float(2)
  ["num_inserts"]=>
  float(1)
  ["num_entries"]=>
  int(1)
  ["expunges"]=>
  float(0)
  ["start_time"]=>
  int(%d)
  ["mem_size"]=>
  float(%d)
  ["memory_type"]=>
  string(%d) "%s"
}
===DONE===
