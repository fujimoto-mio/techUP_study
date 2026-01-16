import '../../css/admin/common.css';

/**
 * モバイルメニュー操作スクリプト
 * - ハンバーガーボタンでメニュー開閉
 * - オーバーレイクリックでメニュー閉じる
 * - ドロップダウンメニューの開閉制御
 */
document.addEventListener('DOMContentLoaded', () => {

  // DOM要素取得
  const hamburger = document.getElementById('hamburgerBtn');
  const mobileMenu = document.getElementById('mobileMenu');
  const overlay = document.getElementById('menuOverlay');

  // 必須要素が存在しない場合は処理しない
  if (!hamburger || !mobileMenu || !overlay) return;

  /**
   * メニューを開く
   */
  const openMenu = () => {
    hamburger.classList.add('is-open');
    mobileMenu.classList.add('is-open');
    overlay.classList.add('is-open');
    document.body.classList.add('menu-open'); // 背景スクロール制御など
  };

  /**
   * メニューを閉じる
   */
  const closeMenu = () => {
    hamburger.classList.remove('is-open');
    mobileMenu.classList.remove('is-open');
    overlay.classList.remove('is-open');
    document.body.classList.remove('menu-open');
  };

  // ハンバーガークリックで開閉切替
  hamburger.addEventListener('click', () => {
    mobileMenu.classList.contains('is-open') ? closeMenu() : openMenu();
  });

  // オーバーレイクリックで閉じる
  overlay.addEventListener('click', closeMenu);

  // ドロップダウンメニューの開閉制御
  document.querySelectorAll('.mobile-dropdown-trigger').forEach(btn => {
    btn.addEventListener('click', () => {
      btn.parentElement?.classList.toggle('is-open');
    });
  });

});
