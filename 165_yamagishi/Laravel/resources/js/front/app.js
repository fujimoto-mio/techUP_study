document.addEventListener('DOMContentLoaded', () => {

  /* ==========================================
     セクションタイトル アニメーション
     - 画面に75%表示されたら .animate を付与
  ========================================== */
  const sectionHeaders = document.querySelectorAll('.section_header');
  if (sectionHeaders.length > 0) {
    const titleObserver = new IntersectionObserver((entries, observer) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add('animate');
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.75 });
    sectionHeaders.forEach(header => titleObserver.observe(header));
  }

  /* ==========================================
     HERO 固定処理
     - スクロールで一定位置まで固定、超えたら絶対配置
  ========================================== */
  const heroes = document.querySelectorAll('.about-hero,.gnmedia-hero,.gnstudio-hero,.gnacademy-hero');
  if (heroes.length) {
    heroes.forEach(hero => {
      const heroHeight = hero.offsetHeight;
      document.addEventListener('scroll', () => {
        const y = window.scrollY;
        if (y >= heroHeight) {
          hero.style.position = 'absolute';
          hero.style.top = `${heroHeight}px`;
          hero.style.pointerEvents = 'none';
        } else if (y <= 700) {
          hero.style.position = 'fixed';
          hero.style.top = '0';
          hero.style.pointerEvents = 'auto';
        }
      });
    });
  }

  /* ==========================================
     タイトル文字アニメーション
     - 各文字にspanを作成し、アニメーション遅延を設定
  ========================================== */
  const titles = document.querySelectorAll('.message-title, .gnmedia-message-title, .gnstudio-message-title, .gnacademy-message-title');
  titles.forEach(title => {
    const text = title.textContent;
    title.textContent = '';
    text.split('').forEach((char, index) => {
      const span = document.createElement('span');
      span.textContent = char;
      if (char === ' ') span.style.width = '0.25em';
      else span.style.animationDelay = `${index * 0.05}s`;
      title.appendChild(span);
    });
  });

  /* ==========================================
     メッセージ・段落スクロールアニメーション
     - 画面下部に入ると .visible を付与
  ========================================== */
  const messageParagraphs = document.querySelectorAll(
    '.message p, .gnmedia-message p, .gnmedia-message-sub, ' +
    '.gnstudio-message p, .gnstudio-message-sub, ' +
    '.gnacademy-message p, .gnacademy-message-sub, .mvv-block'
  );
  if (messageParagraphs.length > 0) {
    const pObserver = new IntersectionObserver((entries, observer) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0, rootMargin: '0px 0px -40% 0px' });
    messageParagraphs.forEach(p => pObserver.observe(p));
  }

  /* ==========================================
     下線（ボーダーライン）スクロールアニメーション
     - GN MEDIA lead / MVV subtitle
  ========================================== */
  const borderTargets = document.querySelectorAll('.gnmedia-collaboration-lead, .mvv-subtitle');
  if (borderTargets.length > 0) {
    const borderObserver = new IntersectionObserver((entries, observer) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.4, rootMargin: '0px 0px -20% 0px' });
    borderTargets.forEach(el => borderObserver.observe(el));
  }

  /* ==========================================
     ハンバーガーメニュー
     - クリックで開閉 / オーバーレイクリックで閉じる
  ========================================== */
  const burger = document.querySelector('.js-burger');
  const mobileMenu = document.querySelector('.mobile-menu');
  const menuOverlay = document.querySelector('.js-menu-overlay');
  if (burger && mobileMenu && menuOverlay) {
      const toggleMenu = () => {
          burger.classList.toggle('active');
          mobileMenu.classList.toggle('active');
          menuOverlay.classList.toggle('active');
          document.body.classList.toggle('menu-open');
      };
      burger.addEventListener('click', toggleMenu);
      menuOverlay.addEventListener('click', toggleMenu);
  }

  /* ==========================================
     SP用 OUR SOLUTIONS ドロップダウン
     - モバイル時のみ開閉
  ========================================== */
  const spDropdown = document.querySelector('.mobile-dropdown-toggle');
  const spDropdownWrapper = document.querySelector('.mobile-dropdown');
  if (spDropdown && spDropdownWrapper) {
    spDropdown.addEventListener('click', () => {
      spDropdownWrapper.classList.toggle('open');
    });
  }

});
