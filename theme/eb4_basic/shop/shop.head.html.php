<?php
/**
 * theme file : /theme/THEME_NAME/shop/shop.head.html.php
 */
if (!defined('_EYOOM_'))
  exit;

add_stylesheet('<link rel="stylesheet" href="' . EYOOM_THEME_URL . '/css/shop_style.css?ver=' . G5_CSS_VER . '">', 0);
add_stylesheet('<link rel="stylesheet" href="' . EYOOM_THEME_URL . '/css/custom.css?ver=' . G5_CSS_VER . '">', 0);

/**
 * 로고 타입 : 'image' || 'text'
 */
$logo = 'image';

/**
 * 메뉴바 전체 메뉴 출력 : 'yes' || 'no'
 */
$is_megamenu = 'yes';

/**
 * 상품 이미지 미리보기 종류 : 'zoom' || 'slider'
 */
$item_view = 'zoom';

/**
 * Default logo
 */
$default_logo = EYOOM_THEME_URL . "/image/Logo.png";
$logo_type = in_array($logo, ['text', 'image']) ? $logo : 'text';
$title = htmlspecialchars($config['cf_title'] ?? 'Default Title', ENT_QUOTES, 'UTF-8');
$image_logo = !G5_IS_MOBILE
  ? (file_exists($top_logo ?? '') && !is_dir($top_logo ?? '') ? $logo_src['top'] : $default_logo)
  : (file_exists($top_mobile_logo ?? '') && !is_dir($top_mobile_logo ?? '') ? $logo_src['mobile_top'] : $default_logo);

$image_src = htmlspecialchars($image_logo ?? '', ENT_QUOTES, 'UTF-8');
?>

<?php if (!$wmode) { ?>
  <?php /*----- wrapper 시작 -----*/ ?>
  <div class="wrapper">
    <h1 id="hd-h1"><?php echo $g5['title'] ?></h1>
    <div class="to-content"><a href="#container">본문 바로가기</a></div>
    <?php
    // 팝업창
    if (defined('_INDEX_') && $newwin_contents) { // index에서만 실행
      echo $newwin_contents;
    }
    ?>

    <?php /*----- header 시작 -----*/ ?>
    <header class="header-wrap <?php if (!defined('_INDEX_')) { ?>page-header-wrap<?php } ?>">
      <div class="top-header">
        <div class="container">
          <div class="row align-items-center position-relative">
            <div class="col-lg-6 d-none d-lg-block">
              <ul class="top-header-nav list-unstyled thn-start">
                <?php if ($eyoom['use_shop_index'] == 'n') { ?>
                  <li class="cs-nav c-nav"><a href="<?php echo G5_URL; ?>"><span class="deactivate">커뮤니티</span></a></li>
                <?php } ?>
                <li class="cs-nav s-nav"><a href="<?php echo G5_SHOP_URL; ?>" class="disabled"><span
                      class="activate">쇼핑몰</span></a></li>
                <li><a href="<?php echo G5_SHOP_URL; ?>/couponzone.php"><i class="fas fa-ticket-alt"></i>쿠폰존</a></li>
                <?php if ($is_admin) { // 관리자일 경우 ?>
                  <li>
                    <div class="eyoom-form">
                      <input type="hidden" name="edit_mode" id="edit_mode"
                        value="<?php echo $eyoom_default['edit_mode']; ?>">
                      <label class="toggle">
                        <input type="checkbox" id="btn_edit_mode" <?php echo $eyoom_default['edit_mode'] == 'on' ? 'checked' : ''; ?>><i></i><span class="text-black"><span class="fas fa-sliders-h m-r-5"></span>편집모드</span>
                      </label>
                    </div>
                  </li>
                <?php } ?>
              </ul>
            </div>
            <div class="col-lg-6 clearfix">
              <ul class="top-header-nav list-unstyled thn-end">
                <?php if ($is_member) { ?>
                  <?php if ($is_admin) { ?>
                    <li><a href="<?php echo correct_goto_url(G5_ADMIN_URL); ?>"><i class="fas fa-cog text-crimson"></i>관리자</a>
                    </li>
                  <?php } ?>
                  <li><a href="<?php echo G5_BBS_URL ?>/logout.php"><i class="fas fa-sign-out-alt"></i>로그아웃</a></li>
                <?php } else { ?>
                  <li><a href="<?php echo G5_BBS_URL ?>/login.php"><i class="fas fa-unlock-alt"></i>로그인</a>
                  </li>
                  <li><a href="<?php echo G5_BBS_URL ?>/register.php"><i class="fas fa-user-plus"></i>회원가입</a>
                  </li>
                <?php } ?>
                <li class="dropdown">
                  <a class="dropdown-toggle" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-plus-circle"></i>추가메뉴
                  </a>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a href="<?php echo G5_SHOP_URL; ?>/cart.php">장바구니</a>
                    <a href="<?php echo G5_SHOP_URL; ?>/wishlist.php">위시리스트</a>
                    <a href="<?php echo G5_SHOP_URL; ?>/orderinquiry.php">주문/배송조회</a>
                    <a href="<?php echo G5_SHOP_URL; ?>/couponzone.php">쿠폰존</a>
                    <a href="<?php echo G5_SHOP_URL; ?>/personalpay.php">개인결제</a>
                    <a href="<?php echo G5_SHOP_URL; ?>/itemuselist.php">사용후기</a>
                    <a href="<?php echo G5_BBS_URL ?>/faq.php">자주묻는 질문</a>
                    <a href="<?php echo G5_BBS_URL ?>/qalist.php">1:1문의</a>
                    <?php if ($is_member) { // 회원일 경우 ?>
                      <a href="<?php echo G5_BBS_URL; ?>/member_confirm.php?url=register_form.php">회원정보수정</a>
                    <?php } ?>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="header-title">
        <div class="container">
          <?php /* ===== 사이트 로고 시작 ===== */ ?>
          <?php if ($is_admin == 'super' && !G5_IS_MOBILE) { ?>
            <div class="adm-edit-btn btn-edit-mode" style="top:0;left:12px;text-align:left">
              <div class="btn-group">
                <a href="<?php echo G5_ADMIN_URL; ?>/?dir=theme&amp;pid=biz_info&amp;amode=logo&amp;thema=<?php echo $theme; ?>&amp;wmode=1"
                  onclick="eb_admset_modal(this.href); return false;" class="ae-btn-l"><i class="far fa-edit"></i> 로고 설정</a>
                <a href="<?php echo G5_ADMIN_URL; ?>/?dir=theme&amp;pid=biz_info&amp;amode=logo&amp;thema=<?php echo $theme; ?>"
                  target="_blank" class="ae-btn-r" title="새창 열기">
                  <i class="fas fa-external-link-alt"></i>
                </a>
              </div>
            </div>
          <?php } ?>
          <a href="<?php echo G5_SHOP_URL; ?>" class="title-logo">
            <?php if ($logo_type === 'text'): ?>
              <h1><?php echo $title; ?></h1>
            <?php elseif ($logo_type === 'image' && !empty($image_src)): ?>
              <img src="<?php echo $image_src; ?>" class="site-logo" alt="<?php echo $title; ?>">
            <?php else: ?>
              <h1><?php echo $title; ?></h1>
            <?php endif; ?>
          </a>
          <?php /* ===== 사이트 로고 끝 ===== */ ?>

          <span class="mobile-top">P2U내역</span>

          <?php if (!G5_IS_MOBILE) { ?>
            <div class="header-container">
              <div class="left-section">
                <span class="user-points">홍길동님</span>
                <span class="point-amount">11,181,887 P2U</span>
              </div>

              <div class="center-nav">
                <a href="#" class="nav-item">장바구니</a>
                <a href="#" class="nav-item">마이페이지</a>
                <a href="#" class="nav-item">로그아웃</a>
                <div class="more-menu">
                  <button class="more-button">더보기 <i class="fas fa-angle-down"></i></button>
                  <div class="menu-list">
                    <a href="#" class="more-menu-item">장바구니</a>
                    <a href="#" class="more-menu-item active">위시리스트</a>
                    <a href="#" class="more-menu-item">주문/배송조회</a>
                    <a href="#" class="more-menu-item">이벤트</a>
                    <a href="#" class="more-menu-item">개인결제</a>
                    <a href="#" class="more-menu-item">사용후기</a>
                    <a href="#" class="more-menu-item">FAQ</a>
                    <a href="#" class="more-menu-item">1:1문의</a>
                  </div>
                </div>
              </div>

              <div class="search-section">
                <form class="search-form" action="#" method="GET">
                  <input type="text" placeholder="상품명 검색" name="search" class="search-input" autocomplete="off">
                  <button type="submit" class="search-button">
                    <i class="fas fa-search"></i>
                  </button>
                </form>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
      <div class="nav-wrap">
        <div class="container">
          <nav class="navbar navbar-expand-lg">
            <div class="sidebar-left offcanvas offcanvas-start" tabindex="-1" id="offcanvasLeft"
              aria-controls="offcanvasLeftLabel">
              <div class="sidebar-left-content">
                <div class="offcanvas-header">
                  <h5 class="offcanvas-title f-s-16r" id="offcanvasLeftLabel"><i
                      class="fas fa-bars m-r-10 text-gray"></i>NAVIGATION</h5>
                  <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
                </div>
                <?php /* ---------- 모바일용 컨텐츠 시작 // 991픽셀 이하에서만 출력 ---------- */ ?>
                <?php if ($eyoom['is_shop_theme'] == 'y' || $is_member): ?>
                  <div class="sidebar-member-menu">
                    <?php if ($eyoom['is_shop_theme'] == 'y'): ?>
                      <a href="<?php echo G5_URL; ?>" class="btn-e btn-e-md btn-e-navy btn-e-block m-t-10 m-b-10">
                        커뮤니티<i class="far fa-caret-square-right m-l-5"></i>
                      </a>
                    <?php endif; ?>

                    <div class="m-t-10">
                      <?php
                      $menu_items = [
                        ['url' => G5_SHOP_URL . '/cart.php', 'label' => '장바구니', 'float' => false],
                        ['url' => G5_SHOP_URL . '/wishlist.php', 'label' => '위시리스트', 'float' => 'float-end'],
                      ];
                      foreach ($menu_items as $item):
                        ?>
                        <a href="<?php echo $item['url']; ?>" class="sidebar-member-btn-box">
                          <div class="sidebar-member-btn <?php echo $item['float']; ?>">
                            <?php echo $item['label']; ?>
                          </div>
                        </a>
                      <?php endforeach; ?>
                      <div class="clearfix"></div>
                    </div>

                    <div class="m-t-10 m-b-10">
                      <?php
                      $menu_items = [
                        ['url' => G5_SHOP_URL . '/couponzone.php', 'label' => '쿠폰존', 'float' => false],
                        ['url' => G5_SHOP_URL . '/orderinquiry.php', 'label' => '주문/배송조회', 'float' => 'float-end'],
                      ];
                      foreach ($menu_items as $item):
                        ?>
                        <a href="<?php echo $item['url']; ?>" class="sidebar-member-btn-box">
                          <div class="sidebar-member-btn <?php echo $item['float']; ?>">
                            <?php echo $item['label']; ?>
                          </div>
                        </a>
                      <?php endforeach; ?>
                      <div class="clearfix"></div>
                    </div>
                  </div>
                <?php endif; ?>
                <?php /* ---------- 모바일용 컨텐츠 끝 ---------- */ ?>

                <nav class="main-nav">
                  <ul class="nav-list">
                    <?php if (!empty($menu) && is_array($menu)): ?>
                      <?php foreach ($menu as $key => $menu_1): ?>
                        <li class="nav-item">
                          <a href="<?php echo htmlspecialchars($menu_1['me_link'] ?? '#'); ?>"
                            target="<?php echo htmlspecialchars($menu_1['me_target'] ?? '_self'); ?>" class="nav-link">
                            <?php if (!empty($menu_1['me_icon'])): ?>
                              <i class="<?php echo htmlspecialchars($menu_1['me_icon']); ?> nav-cate-icon margin-right-5"></i>
                            <?php endif; ?>
                            <?php echo htmlspecialchars($menu_1['me_name'] ?? ''); ?>
                          </a>

                          <?php if (!empty($menu_1['submenu']) && is_array($menu_1['submenu'])): ?>
                            <div class="wisnu-menu">
                              <div class="wisnu-menu-content">
                                <ul class="menu-level-1">
                                  <?php foreach ($menu_1['submenu'] as $subkey => $menu_2): ?>
                                    <li class="menu-item">
                                      <a href="<?php echo htmlspecialchars($menu_2['me_link'] ?? '#'); ?>"
                                        target="<?php echo htmlspecialchars($menu_2['me_target'] ?? '_self'); ?>"
                                        class="menu-link<?php echo (!empty($menu_2['active'])) ? ' active' : ''; ?>">
                                        <?php echo htmlspecialchars($menu_2['me_name'] ?? ''); ?>
                                        <?php if (!empty($menu_2['subsub']) && is_array($menu_2['subsub'])): ?>
                                          <i class="fas fa-angle-right"></i>
                                        <?php endif; ?>
                                      </a>

                                      <?php if (!empty($menu_2['subsub']) && is_array($menu_2['subsub'])): ?>
                                        <ul class="menu-level-2">
                                          <?php foreach ($menu_2['subsub'] as $ssubkey => $menu_3): ?>
                                            <li class="menu-item">
                                              <a href="<?php echo htmlspecialchars($menu_3['me_link'] ?? '#'); ?>"
                                                target="<?php echo htmlspecialchars($menu_3['me_target'] ?? '_self'); ?>"
                                                class="menu-link<?php echo (!empty($menu_3['active'])) ? ' active' : ''; ?>">
                                                <?php echo htmlspecialchars($menu_3['me_name'] ?? ''); ?>
                                                <?php if (!empty($menu_3['new'])): ?>
                                                  <i class="far fa-check-circle text-indigo"></i>
                                                <?php endif; ?>
                                                <?php if (!empty($menu_3['subsub']) && is_array($menu_3['subsub'])): ?>
                                                  <i class="fas fa-angle-right"></i>
                                                <?php endif; ?>
                                              </a>

                                              <?php if (!empty($menu_3['subsub']) && is_array($menu_3['subsub'])): ?>
                                                <ul class="menu-level-3">
                                                  <?php foreach ($menu_3['subsub'] as $sssubkey => $menu_4): ?>
                                                    <li class="menu-item">
                                                      <a href="<?php echo htmlspecialchars($menu_4['me_link'] ?? '#'); ?>"
                                                        target="<?php echo htmlspecialchars($menu_4['me_target'] ?? '_self'); ?>"
                                                        class="menu-link<?php echo (!empty($menu_4['active'])) ? ' active' : ''; ?>">
                                                        <?php echo htmlspecialchars($menu_4['me_name'] ?? ''); ?>
                                                        <?php if (!empty($menu_4['new'])): ?>
                                                          <i class="far fa-check-circle text-indigo"></i>
                                                        <?php endif; ?>
                                                      </a>
                                                    </li>
                                                  <?php endforeach; ?>
                                                </ul>
                                              <?php endif; ?>
                                            </li>
                                          <?php endforeach; ?>
                                        </ul>
                                      <?php endif; ?>
                                    </li>
                                  <?php endforeach; ?>
                                </ul>
                              </div>
                            </div>
                          <?php endif; ?>
                        </li>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  </ul>
                </nav>

                <?php /* ---------- 모바일용 컨텐츠 시작 // 991픽셀 이하에서만 출력 ---------- */ ?>
                <div class="sidebar-mobile-menu">
                  <a href="<?php echo shop_type_url(1); ?>">히트상품</a>
                  <a href="<?php echo shop_type_url(2); ?>">추천상품</a>
                  <a href="<?php echo shop_type_url(3); ?>">최신상품</a>
                  <a href="<?php echo shop_type_url(4); ?>">인기상품</a>
                  <a href="<?php echo shop_type_url(5); ?>">할인상품</a>
                </div>
                <?php /* ---------- 모바일용 컨텐츠 끝 ---------- */ ?>
              </div>
            </div>
          </nav>
        </div>
      </div>
    </header>
    <?php /*----- header 끝 -----*/ ?>

    <?php if (!defined('_INDEX_')) { // 메인이 아닐때 ?>
      <?php /*----- page title 시작 -----*/ ?>
      <div class="page-title-wrap">
        <div class="container">
          <?php if (!defined('_EYOOM_MYPAGE_')) { ?>
            <h2>
              <?php if (!$it_id) { ?>
                <i class="fas fa-arrow-alt-circle-right m-r-10"></i><?php echo $subinfo['title']; ?>
              <?php } else { ?>
                <i class="fas fa-arrow-alt-circle-right m-r-10"></i><?php echo $subinfo['title']; ?>
              <?php } ?>
            </h2>
            <?php if (!$it_id) { ?>
              <div class="sub-breadcrumb-wrap">
                <ul class="sub-breadcrumb hidden-xs">
                  <?php echo $subinfo['path']; ?>
                </ul>
              </div>
            <?php } ?>
          <?php } else { ?>
            <h2><i class="fas fa-arrow-alt-circle-right"></i> 마이페이지</h2>
          <?php } ?>
        </div>
      </div>
      <?php /*----- page title 끝 -----*/ ?>
    <?php } ?>

    <div class="basic-body <?php if (!defined('_INDEX_')) { ?>page-body<?php } ?>">
      <?php if (defined('_INDEX_')) { ?>
        <main class="basic-body-main">
        <?php } else { ?>
          <div class="container">
            <main class="basic-body-main">
            <?php } ?>
          <?php } // !$wmode ?>