<?php
define('_IN_JOHNCMS', 1);

require('system/bootstrap.php');

$act = isset($_GET['act']) ? trim($_GET['act']) : '';


if (isset($_SESSION['ref'])) {
    unset($_SESSION['ref']);
}

if (isset($_GET['err'])) {
    $act = 404;
}

/*$file = $_SERVER['DOCUMENT_ROOT'] . "/pages/test/re.txt";

if (isset($_SERVER['HTTP_REFERER'])){
	$referer = parse_url ($_SERVER['HTTP_REFERER']);
	$ReferingSite = $referer['host'];
	if (!isset($_SESSION['referer']) && !empty($ReferingSite) && $ReferingSite!='chatola.org' && $ReferingSite!='chatsex.site'){
		$_SESSION['referer'] = "set";
		$Add_Referrer = "$ReferingSite\\r\
";
		$fp = fopen($file, "a") or die("Couldn't open $file for writing!");
		fwrite($fp, $Add_Referrer) or die("Couldn't write values to file!");
		fclose($fp);
	}
}*/

switch ($act) {
    case '404':
        /** @var Johncms\Api\ToolsInterface $tools */
        $tools = App::getContainer()->get(Johncms\Api\ToolsInterface::class);

        $headmod = 'error404';
        require('system/head.php');
        echo $tools->displayError('Trang bạn vừa truy cập không tồn tại. Vui lòng nhấn về trang chủ: <a href="https://chatola.org">https://chatola.org</a> msS');
        require('system/end.php');
        break;

    default:
        // Главное меню сайта
        if (isset($_SESSION['ref'])) {
            unset($_SESSION['ref']);
        }
        $headmod = 'mainpage';
        require('system/head.php');
        include 'system/mainmenu_bk.php';
        require('system/end.php');
}
