<?php

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
}

//ページ用の変数
$pege_title = 'SPECIAL SALE｜STAFF RECOMMENDS｜調布PARCO';
$pege_description = '調布PARCO【SPECIAL SALE】のスタッフおすすめ情報を紹介いたします。';
$pege_keywords = '';
$page_shareurl = 'https://'.STORE_NAME.'.parco.jp/page/special_sale/'; //必ずディレクトリ名を変更する

?>
<!DOCTYPE html>
<html lang="ja">
<head>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/page/assets/inc/meta.php';?>

<?php include_once $_SERVER['DOCUMENT_ROOT'].'/assets/inc/tagmanager1.php';?>

<?php include_once $_SERVER['DOCUMENT_ROOT'].'/'.DIRNAME.'/assets/inc/css.php';?>
</head>

<body class="<?php echo STORE_NAME; ?> page-tag" id="top">
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
      <?php /* SPバナー */ ?>
      <source media="(max-width: 768px)" srcset="/<?php echo DIRNAME; ?>/assets/images/bnr1_sp.png">
      <?php /* PCバナー */ ?>
      <img src="/<?php echo DIRNAME; ?>/assets/images/bnr1_pc.png" alt="お好きな時にオトク PARCOポイント">
    </picture>
  </a></div>
<!-- /.top-bnr-block --></div>


<?php /* ==========================================================
Local navigation
============================================================== */ ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/'.DIRNAME.'/assets/inc/localnav.php'; ?>

<?php /* ==========================================================
タグ集約、ownlyなど
============================================================== */ ?>
<div class="contents-wrap">

  <?php /* PARCO NEWS */ ?>
  <div class="contents-block contents-blog newsevent">
    <h2 class="contents-ttl">PARCO NEWS</h2>
    <?php
    if ($productionFlag === true) {

      // 本番用
      $disp_data = array(); //初期化
      $tagname = "20年スペシャルセール"; //対象するタグの文字列をセット
      $data_target = "pnews";
        //pnews:パルコニュースのみ
        //shopnews:ショップニュースのみ
        //all:すべて
        //popupnews: POPUPSHOP（名古屋のみ使用可）
        //entnews: エンタテインメントニュース（名古屋のみ使用可）
      echo "<!-- タグ 「".$tagname."」-->\n"; //確認用
      echo "<!-- カテゴリ 「".$data_target."」-->\n\n"; //確認用
      include $_SERVER['DOCUMENT_ROOT'] . '/inc/tagsum_include.php';
      include $_SERVER['DOCUMENT_ROOT'].'/page/assets/inc/item-list.php';

    } else {

      // 静的デモ レイアウト調整用
      include $_SERVER['DOCUMENT_ROOT'].'/page/assets/inc/item-list-demo.php';

    }
    ?>
  <!-- /.contents-block --></div>



  <?php /* SHOP NEWS */ ?>
  <div class="contents-block contents-blog shopblog">
    <h2 class="contents-ttl">SHOP NEWS</h2>
    <?php
    if ($productionFlag === true) {

      // 本番用
      $disp_data = array(); //初期化
      $tagname = "20年スペシャルセール"; //対象するタグの文字列をセット
      $data_target = "shopnews";
        //pnews:パルコニュースのみ
        //shopnews:ショップニュースのみ
        //all:すべて
        //popupnews: POPUPSHOP（名古屋のみ使用可）
        //entnews: エンタテインメントニュース（名古屋のみ使用可）
      echo "<!-- タグ 「".$tagname."」-->\n"; //確認用
      echo "<!-- カテゴリ 「".$data_target."」-->\n\n"; //確認用
      include $_SERVER['DOCUMENT_ROOT'] . '/inc/tagsum_include.php';
      include $_SERVER['DOCUMENT_ROOT'].'/page/assets/inc/item-list.php';

    } else {

      // 静的デモ レイアウト調整用
      include $_SERVER['DOCUMENT_ROOT'].'/page/assets/inc/item-list-demo.php';
    }

    ?>
  <!-- /.contents-block --></div>

</div>

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