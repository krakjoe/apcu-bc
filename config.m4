dnl $Id$
dnl config.m4 for apcu-bc extension

PHP_ARG_ENABLE(apc, whether to enable APCu BC support,
[  --enable-apc           Enable APCu BC support])

if test "$PHP_APC" != "no"; then
  PHP_NEW_EXTENSION(apc, php_apc.c, $ext_shared,, -DZEND_ENABLE_STATIC_TSRMLS_CACHE=1)
  PHP_ADD_EXTENSION_DEP(apc, apcu)
fi
