<?php

$CI =& get_instance();

$config['root_url'] = str_replace('backend/', '', $CI->config->base_url());
$config['static_root'] = $config['root_url'] . 'statics/';

$config['vendor'] = $config['static_root'] . 'vendor/';
$config['assets'] = $config['static_root'] . 'assets/';

