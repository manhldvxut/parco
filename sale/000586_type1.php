<?php
$sale_system_type = 'saleandtag';
include_once $_SERVER['DOCUMENT_ROOT'].'/assets/inc/global-config.php';
//下記のパス「demo」を変更
include_once $_SERVER['DOCUMENT_ROOT'].'/page/special_sale/assets/inc/config.php';

$nowURL = $_SERVER['HTTP_HOST'];
$pageURL = STORE_NAME.'.parco.jp';
$devURL = 'dev-'.STORE_NAME.'-parco.sc-concierge.jp';

//ドメインの判定
if ($nowURL === $pageURL || $devURL === $pageURL) {
  $productionFlag = true; //本番とdev
} else {
  $productionFlag = false; //上記以外
}

if ($productionFlag === true) {
  //basic include
  include_once $_SERVER['DOCUMENT_ROOT'] . '/inc/page_include.php';

  //名古屋店のみtype2（西館）がパラメーターなしのURLになる
  if (STORE_NAME == nagoya) {
    $floor_type = (empty($floor_type))? "type2" : $floor_type;
  } else {
    $floor_type = (empty($floor_type))? "type1" : $floor_type;
  }

  $sale_id = $_GET["slcd"]; //セールID取得
  include_once $_SERVER['DOCUMENT_ROOT'] . '/inc/sale_include.php';
} else {
  $floor_type = $_GET['floor_type'];
}

//ページ用の変数
$pege_title = 'SPECIAL SALE｜調布PARCO';
$pege_description = '調布PARCO【SPECIAL SALE】の情報を紹介いたします。';
$pege_keywords = '';
$page_shareurl = 'https://'.STORE_NAME.'.parco.jp/page/sale/?slcd='.$sale_id;

?>
<!DOCTYPE html>
<html lang="ja">
<head>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/page/assets/inc/meta.php';?>

<?php include_once $_SERVER['DOCUMENT_ROOT'].'/assets/inc/tagmanager1.php';?>

<?php include_once $_SERVER['DOCUMENT_ROOT'].'/'.DIRNAME.'/assets/inc/css.php';?>
</head>

<body class="<?php echo STORE_NAME; ?> page-sale <?php echo $floor_type; ?>" id="top">
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/assets/inc/tagmanager2.php';?>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/page/assets/inc/svgs.php';?>

<div class="wrapper">

<?php
/**
 * Header
 */
?>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/'.DIRNAME.'/assets/inc/header.php'; ?>


<?php
/**
 * Main contents
 */
?>
<main class="main-contents">


<?php /* ==========================================================
ヘッダー下バナー、youtubeなど
============================================================== */ ?>
<?php /* バナー */ ?>
<div class="top-bnr-block">
  <div class="bnr sp-to-fix"><a href="https://point.parco.jp/pnews/detail/?id=7871" target="_blank">
    <picture>
      <source media="(min-width: 769px)" srcset="/<?php echo DIRNAME; ?>/assets/images/bnr1_pc.png">
      <source media="(max-width: 768px)" srcset="/<?php echo DIRNAME; ?>/assets/images/bnr1_sp.png">
      <img src="/<?php echo DIRNAME; ?>/assets/images/bnr1_pc.png" alt="お好きな時にオトク PARCOポイント">
    </picture>
  </a></div>
<!-- /.top-bnr-block --></div>



<?php /* ==========================================================
Local navigation
============================================================== */ ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/'.DIRNAME.'/assets/inc/localnav.php'; ?>


<?php /* ==========================================================
値書き
============================================================== */ ?>
<div class="contents-wrap">

  <?php
  if ($productionFlag === true) {
    // 動的ソース
    include_once $_SERVER['DOCUMENT_ROOT'].'/page/assets/inc/salelist.php';
  } else {
    // 静的デモ レイアウト調整用
    include_once $_SERVER['DOCUMENT_ROOT'].'/page/assets/inc/salelist-demo.php';
  }
  ?>

<!-- /.contents-wrap --></div>



<?php /* ==========================================================
フッター上バナーなど
============================================================== */ ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/page/assets/inc/foot-banner.php'; ?>

</main>


<?php
/**
 * Footer
 */
?>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/page/assets/inc/footer.php'; ?>
</div>

<!-- Javascript -->
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/'.DIRNAME.'/assets/inc/js.php';?>
<!-- /Javascript -->
</body>
</html>