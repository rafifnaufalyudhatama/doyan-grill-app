<?php

/**
 * File index.php ini dibuat khusus untuk deployment di shared hosting (seperti InfinityFree)
 * di mana Anda tidak bisa mengubah Document Root ke folder /public.
 * 
 * File ini akan mengarahkan semua request ke dalam folder /public dari aplikasi Laravel Anda.
 */

// Memanggil index.php bawaan Laravel yang ada di folder public/
require_once __DIR__ . '/public/index.php';
