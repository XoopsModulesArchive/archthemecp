<?php

declare(strict_types=1);

include '../../../mainfile.php';
require_once XOOPS_ROOT_PATH . '/class/xoopsmodule.php';
require XOOPS_ROOT_PATH . '/include/cp_functions.php';
if ($xoopsUser) {
    $xoopsModule = XoopsModule::getByDirname('archthemecp');

    if (!$xoopsUser->isAdmin($xoopsModule->mid())) {
        redirect_header(XOOPS_URL . '/', 3, _NOPERM);

        exit();
    }
} else {
    redirect_header(XOOPS_URL . '/', 3, _NOPERM);

    exit();
}
if (file_exists('../language/' . $xoopsConfig['language'] . '/main.php')) {
    include '../language/' . $xoopsConfig['language'] . '/main.php';
} else {
    include '../language/english/main.php';
}
$op = 'list';
if (isset($_GET)) {
    foreach ($_GET as $k => $v) {
        $$k = $v;
    }
}
if (isset($_POST)) {
    foreach ($_POST as $k => $v) {
        $$k = $v;
    }
}
if ('list' == $op) {
    $myts = MyTextSanitizer::getInstance();

    xoops_cp_header();

    echo "
    <form action='index.php' method='post'>
    <table width='100%' border='1' cellpadding='4' cellspacing='1'>
    <tr class='bg3' align='center'><td align='center'><strong><big>ArchTheme Control Panel</big></strong></td></tr><tr class='bg3' align='center'><td align='left'><strong><big>Messages</big></strong></td></tr>";

    $result = $xoopsDB->query('SELECT * FROM ' . $xoopsDB->prefix('archthemecp'));

    while (list($msg1, $msg2, $msg3, $link1, $link2, $link3, $link4, $link5, $link1url, $link2url, $link3url, $link4url, $link5url) = $xoopsDB->fetchRow($result)) {
        echo "<tr class='bg1'>
        <td align='left'>MESSAGE 1:  
            <input type='hidden' value='$msg1' name='oldmsg1'>
            <input type='text' value='$msg1' name='newmsg1'  size='60'>
        </td>
		</tr>
		<tr class='bg1'>
		<td align='left'>MESSAGE 2: 
            <input type='hidden' value='$msg2' name='oldmsg2'>
            <input type='text' value='$msg2' name='newmsg2'  size='60'>
        </td>
		</tr>
		<tr class='bg1'>
		<td align='left'>MESSAGE 3:   
            <input type='hidden' value='$msg3' name='oldmsg3'>
            <input type='text' value='$msg3' name='newmsg3'  size='60'>
        </td>
		</tr><tr class='bg3' align='center'><td align='left'><strong><big>Links</big></strong></td>
</tr>
		<tr class='bg1'>
		<td align='left'>LINK 1 NAME:  
            <input type='hidden' value='$link1' name='oldlink1'>
            <input type='text' value='$link1' name='newlink1'  size='20'>
        </td>
		</tr>
		<tr class='bg1'>
		<td align='left'>LINK 1  URL:   
            <input type='hidden' value='$link1url' name='oldlink1url'>
            <input type='text' value='$link1url' name='newlink1url'  size='60'>
        </td>
		</tr>
		<tr class='bg1'>
		<td align='left'>LINK 2 NAME: 
            <input type='hidden' value='$link2' name='oldlink2'>
            <input type='text' value='$link2' name='newlink2'  size='20'>
        </td>
		</tr>
		<tr class='bg1'>
		<td align='left'>LINK 2  URL:  
            <input type='hidden' value='$link2url' name='oldlink2url'>
            <input type='text' value='$link2url' name='newlink2url'  size='60'>
        </td>
		</tr>
		<tr class='bg1'>
		<td align='left'>LINK 3 NAME:  
            <input type='hidden' value='$link3' name='oldlink3'>
            <input type='text' value='$link3' name='newlink3'  size='20'>
        </td>
		</tr>
		<tr class='bg1'>
		<td align='left'>LINK 3  URL: 
            <input type='hidden' value='$link3url' name='oldlink3url'>
            <input type='text' value='$link3url' name='newlink3url'  size='60'>
        </td>
		</tr>
		<tr class='bg1'>
		<td align='left'>LINK 4 NAME: 
            <input type='hidden' value='$link4' name='oldlink4'>
            <input type='text' value='$link4' name='newlink4'  size='20'>
        </td>
		</tr>
		<tr class='bg1'>
		<td align='left'>LINK 4  URL:
            <input type='hidden' value='$link4url' name='oldlink4url'>
            <input type='text' value='$link4url' name='newlink4url'  size='60'>
        </td>
		</tr>
		<tr class='bg1'>
		<td align='left'>LINK 5 NAME: 
            <input type='hidden' value='$link5' name='oldlink5'>
            <input type='text' value='$link5' name='newlink5'  size='20'>
        </td>
		</tr>
		<tr class='bg1'>
		<td align='left'>LINK 5  URL: 
            <input type='hidden' value='$link5url' name='oldlink5url'>
            <input type='text' value='$link5url' name='newlink5url'  size='60'>
        </td>
        </tr>";
    }

    {
        echo "<tr align='center' class='bg3'><td colspan='4'><input type='submit' value='" . _SUBMIT . "'><input type='hidden' name='op' value='edit'></td></tr></table>";
    }

    xoops_cp_footer();

    exit();
}

if ('edit' == $op) {
    $myts = MyTextSanitizer::getInstance();

    {
            $msg1 = $myts->addSlashes($newmsg1);
            $msg2 = $myts->addSlashes($newmsg2);
            $msg3 = $myts->addSlashes($newmsg3);
            $link1 = $myts->addSlashes($newlink1);
            $link2 = $myts->addSlashes($newlink2);
            $link3 = $myts->addSlashes($newlink3);
            $link4 = $myts->addSlashes($newlink4);
            $link5 = $myts->addSlashes($newlink5);
            $link1url = $myts->addSlashes($newlink1url);
            $link2url = $myts->addSlashes($newlink2url);
            $link3url = $myts->addSlashes($newlink3url);
            $link4url = $myts->addSlashes($newlink4url);
            $link5url = $myts->addSlashes($newlink5url);

            $sql = 'UPDATE ' . $xoopsDB->prefix('archthemecp') . " SET msg1='" . $msg1 . "', msg2='" . $msg2 . "', msg3='" . $msg3 . "', link1='" . $link1 . "', link2='" . $link2 . "', link3='" . $link3 . "', link4='" . $link4 . "', link5='" . $link5 . "', link1url='" . $link1url . "', link2url='" . $link2url . "', link3url='" . $link3url . "', link4url='" . $link4url . "', link5url='" . $link5url . "' ";
            $xoopsDB->query($sql);
    }

    redirect_header('index.php?op=list', 1, _AT_DBUPDATED);

    exit();
}
