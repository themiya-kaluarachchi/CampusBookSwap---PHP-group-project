<?php

$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
$host = $_SERVER['HTTP_HOST'];
$scriptName = dirname($_SERVER['SCRIPT_NAME']);
$basePath = $scriptName === '/' ? '' : $scriptName;

define('BASE_URL', $basePath);

// Extract clean route
$requestUri = $_SERVER['REQUEST_URI'];
$basePath = str_replace('/index.php', '', $_SERVER['SCRIPT_NAME']);
$route = str_replace($basePath, '', $requestUri);
$route = strtok($route, '?'); 
$page = trim($route, '/');
$page = $page ?: 'home';

$segments = explode('/', $page);
$page = $segments[0];
$param = $segments[1] ?? null;
