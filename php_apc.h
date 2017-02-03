/*
  +----------------------------------------------------------------------+
  | APC                                                                  |
  +----------------------------------------------------------------------+
  | Copyright (c) 2015-2016 The PHP Group                                |
  +----------------------------------------------------------------------+
  | This source file is subject to version 3.01 of the PHP license,      |
  | that is bundled with this package in the file LICENSE, and is        |
  | available through the world-wide-web at the following url:           |
  | http://www.php.net/license/3_01.txt                                  |
  | If you did not receive a copy of the PHP license and are unable to   |
  | obtain it through the world-wide-web, please send a note to          |
  | license@php.net so we can mail you a copy immediately.               |
  +----------------------------------------------------------------------+
  | Authors: krakjoe													 |
  +----------------------------------------------------------------------+
 */

#ifndef PHP_APC_H
#define PHP_APC_H

#define PHP_APC_EXTNAME "apc"
#define PHP_APCU_BC_VERSION "1.0.3"
#define PHP_APC_VERSION PHP_APCU_BC_VERSION

/*
 * This module defines utilities and helper functions used elsewhere in APC.
 */
#ifdef PHP_WIN32
# define PHP_APCU_API __declspec(dllexport)
#elif defined(__GNUC__) && __GNUC__ >= 4
# define PHP_APCU_API __attribute__ ((visibility("default")))
#else
# define PHP_APCU_API
#endif

PHP_APCU_API zend_class_entry* apc_iterator_ce;

extern zend_module_entry apc_module_entry;
#define apc_module_ptr &apc_module_entry

#define phpext_apc_ptr apc_module_ptr

#if defined(ZTS) && defined(COMPILE_DL_APC)
ZEND_TSRMLS_CACHE_EXTERN();
#endif

#endif /* PHP_APC_H */

/*
 * Local variables:
 * tab-width: 4
 * c-basic-offset: 4
 * End:
 * vim>600: expandtab sw=4 ts=4 sts=4 fdm=marker
 * vim<600: expandtab sw=4 ts=4 sts=4
 */
