<?php

declare(strict_types=1);

$modversion['name'] = _MI_ARCHTHEMECP_NAME;
$modversion['version'] = 1.00;
$modversion['description'] = _MI_ARCHTHEMECP_DESC;
$modversion['credits'] = '';
$modversion['author'] = 'Archangel Artifacts, Inc.';
$modversion['help'] = '';
$modversion['license'] = 'GPL see LICENSE';
$modversion['official'] = 1;
$modversion['image'] = 'images/slogo.png';
$modversion['dirname'] = 'archthemecp';

$modversion['sqlfile']['mysql'] = 'sql/mysql.sql';
$modversion['tables'][0] = 'archthemecp';

// Admin things
$modversion['hasAdmin'] = 1;
$modversion['adminindex'] = 'admin/index.php';
$modversion['adminmenu'] = 'admin/menu.php';

$modversion['hasMain'] = 0;
