<?php
/**
 * theme file : /theme/THEME_NAME/shop.tail.html.php
 */
if (!defined('_EYOOM_'))
	exit;
?>

<?php if (!$wmode) { ?>
	<?php if (defined('_INDEX_')) { ?>
		</main>
	<?php } else { ?>
		</div><?php /* End .container */ ?>
		</main>
	<?php } ?>
	</div><?php /* End .basic-body */ ?>

	<?php /*----- footer 시작 -----*/ ?>
	<footer class="footer">
		<div class="footer-container">
			<div class="footertop">
				<!-- Logo -->
				<div class="footer-logo">
					<img src="<?= EYOOM_THEME_URL . '/image/LogoFooter.png' ?>" alt="P2U Logo">
				</div>

				<!-- Navigation Menu -->
				<nav class="footer-nav">
					<a href="#">카카오톡 채널추가</a>
					<a href="#">상품후기</a>
					<a href="#">1:1문의</a>
					<a href="#">FAQ</a>
					<a href="#">공지사항</a>
				</nav>

			</div>


			<!-- CS Info -->
			<div class="cs-info">
				<div class="cs-info-top">
					<p class="cs-center">CS CENTER 1522-2041</p>
					<p class="cs-hours">평일 10:00 ~ 17:00 (점심 12:00 ~ 13:00)</p>
				</div>
				<div class="cs-contact">
					<p>soo@p2u.kr</p>
					<p>토요일, 일요일, 공휴일은 휴무입니다. 근무시간 이후 문의는 1:1 문의를 이용해주세요.</p>
				</div>
			</div>


			<!-- Company Info -->
			<div class="company-info">
				<p class="title">주식회사 포인투유 | 대표 : 최병호</p>
				<div class="content">
					<p>사업자 등록번호 : 443-86-024-22</p>
					<p>통신판매업 : 제2024-서울금천-0326호</p>
					<p>주소 : 08502 서울 금천구 가산디지털1로 212 202-52호(가산동, 코오롱디지털타워차에이스트)</p>
				</div>
			</div>

			<!-- Copyright -->
			<div class="copyright">
				<p>Copyright © P2U :: 포인투유. All Rights Reserved</p>
			</div>

			<!-- Bottom Links -->
			<div class="bottom-links">
				<a href="#">이용약관</a>
				<a href="#">개인정보처리방침</a>
				<a href="#">이메일무단수집거부</a>
			</div>
		</div>
	</footer>

	<?php /*----- footer 끝 -----*/ ?>
	</div>
	<?php /*----- wrapper 끝 -----*/ ?>

	<?php /*----- 전체 검색 입력창 시작 -----*/ ?>
	<div class="search-full">
		<div class="search-close-btn"></div>
		<fieldset class="search-field">
			<legend>쇼핑몰 전체검색</legend>
			<form name="frmsearch1" action="<?php echo G5_SHOP_URL; ?>/search.php" onsubmit="return search_submit(this);">
				<input type="hidden" name="sfl" value="wr_subject||wr_content">
				<input type="hidden" name="sop" value="and">
				<label for="mobile_search_input" class="sound_only">검색어 입력 필수</strong></label>
				<input type="text" name="q" value="<?php echo stripslashes(get_text(get_search_string($q))); ?>"
					id="mobile_search_input" class="sch_stx" placeholder="상품 검색어 입력">
				<button type="submit" class="search-btn" value="검색"><i class="fas fa-search" aria-hidden="true"></i><span
						class="sound_only">검색</span></button>
			</form>

			<script>
				function search_submit(f) {
					if (f.q.value.length < 2) {
						alert("검색어는 두글자 이상 입력하십시오.");
						f.q.select();
						f.q.focus();
						return false;
					}
					return true;
				}
			</script>
		</fieldset>
	</div>
	<?php /*----- 전체 검색 입력창 끝 -----*/ ?>

	<?php /*----- 쇼핑몰 회원 사이드바 시작 -----*/ ?>
	<button type="button" class="sidebar-shop-trigger sidebar-shop-member-btn mo-btn" data-bs-toggle="offcanvas"
		data-bs-target="#offcanvasShopRight" aria-controls="offcanvasShopRight"><i class="fas fa-shopping-cart"></i></button>
	<div class="sidebar-shop-member-wrap">
		<button type="button" class="sidebar-shop-trigger sidebar-shop-member-btn pc-btn" data-bs-toggle="offcanvas"
			data-bs-target="#offcanvasShopRight" aria-controls="offcanvasShopRight"><i class="fas fa-shopping-cart"></i><span
				class="direction-icon"><i class="fas fa-outdent"></i></span></button>
		<div class="sidebar-shop-member offcanvas offcanvas-end" tabindex="-1" id="offcanvasShopRight"
			aria-labelledby="offcanvasShopRightLabel">
			<div class="offcanvas-header">
				<h5 class="offcanvas-title f-s-16r" id="offcanvasShopRightLabel"><i class="fas fa-boxes text-gray"></i> 나의 쇼핑 박스
				</h5>
				<button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
			</div>
			<div class="sidebar-shop-member-in">
				<?php /* 아웃로그인 시작 */ ?>
				<?php if ($eyoom['use_gnu_outlogin'] == 'y') { //그누보드 스킨일 경우 ?>
					<?php echo outlogin('basic'); ?>
				<?php } else { //이윰 스킨일 경우 ?>
					<?php echo eb_outlogin($eyoom['outlogin_skin']); ?>
				<?php } ?>
				<?php /* 아웃로그인 끝 */ ?>

				<div class="shop-member-box">
					<div class="shop-member-box-title">오늘본상품<span
							class="badge badge-red rounded"><?php echo get_view_today_items_count(); ?></span></div>
					<?php include(EYOOM_THEME_SHOP_SKIN_PATH . '/boxtodayview.skin.html.php'); // 오늘 본 상품 ?>
					<div class="shop-member-box-title">장바구니<span
							class="badge badge-red rounded"><?php echo get_boxcart_datas_count(); ?></span></div>
					<?php include_once(EYOOM_THEME_SHOP_SKIN_PATH . '/boxcart.skin.html.php'); // 장바구니 ?>
					<div class="shop-member-box-title">위시리스트<span
							class="badge badge-red rounded"><?php echo get_wishlist_datas_count(); ?></span></div>
					<?php include_once(EYOOM_THEME_SHOP_SKIN_PATH . '/boxwish.skin.html.php'); // 위시리스트 ?>
				</div>

				<?php /* 투표 시작 */ ?>
				<?php if ($eyoom['use_gnu_poll'] == 'y') { //그누보드 스킨일 경우 ?>
					<?php echo poll('basic'); ?>
				<?php } else { //이윰 스킨일 경우 ?>
					<?php echo eb_poll($eyoom['poll_skin']); ?>
				<?php } ?>
				<?php /* 투표 끝 */ ?>
			</div>
		</div>
	</div>
	<?php /*----- 쇼핑몰 회원 사이드바 끝 -----*/ ?>

	<?php /* Side Nav Mobile Toggler */ ?>
	<button type="button" class="navbar-mobile-toggler" data-bs-toggle="offcanvas" data-bs-target="#offcanvasLeft"
		aria-controls="offcanvasLeft"><i class="fas fa-bars"></i></button>

	<?php /* Back To Top */ ?>
	<div class="eb-backtotop">
		<svg class="backtotop-progress" width="100%" height="100%" viewBox="-1 -1 102 102">
			<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
			<span class="progress-count"></span>
		</svg>
	</div>
<?php } // !$wmode ?>

<form name="fitem_for_list" method="post" action="" onsubmit="return fitem_for_list_submit(this);">
	<input type="hidden" name="url">
	<input type="hidden" name="it_id">
</form>

<?php
include_once(EYOOM_THEME_PATH . '/misc.html.php');
?>

<?php
if ($is_member && $eyoomer['onoff_push'] == 'on') {
	include_once(EYOOM_THEME_PATH . '/skin/push/basic/push.skin.html.php');
}
?>

<script src="<?php echo EYOOM_THEME_URL; ?>/js/shop_app.js?ver=<?php echo G5_JS_VER; ?>"></script>
<script>
	function item_wish_for_list(it_id) {
		var f = document.fitem_for_list;
		f.url.value = "<?php echo G5_SHOP_URL; ?>/wishupdate.php?it_id=" + it_id;
		f.it_id.value = it_id;
		f.action = "<?php echo G5_SHOP_URL; ?>/wishupdate.php";
		f.submit();
	}

	<?php if ($is_admin == 'super') { ?>
		$(document).ready(function () {
			var edit_mode = "<?php echo $eyoom_default['edit_mode']; ?>";
			if (edit_mode == 'on') {
				$(".btn-edit-mode").show();
			} else {
				$(".btn-edit-mode").hide();
			}

			$("#btn_edit_mode").click(function () {
				var edit_mode = $("#edit_mode").val();
				if (edit_mode == 'on') {
					$(".btn-edit-mode").hide();
					$("#edit_mode").val('');
				} else {
					$(".btn-edit-mode").show();
					$("#edit_mode").val('on');
				}

				$.post("<?php echo G5_ADMIN_URL; ?>/?dir=theme&pid=theme_editmode&smode=1", { edit_mode: edit_mode });
			});
		});
	<?php } ?>
</script>