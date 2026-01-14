document.addEventListener('DOMContentLoaded', () => {

  /* =================================================
     IntersectionObserver（統合）
  ================================================= */
  const observer = new IntersectionObserver((entries, obs) => {
    entries.forEach(entry => {
      if (!entry.isIntersecting) return;

      const el = entry.target;

      if (el.classList.contains('section_header')) {
        el.classList.add('animate');
      }

      if (el.classList.contains('message-animate')) {
        el.classList.add('visible');
      }

      if (el.classList.contains('border-animate')) {
        el.classList.add('is-visible');
      }

      obs.unobserve(el);
    });
  }, {
    threshold: 0.15,
    rootMargin: '0px 0px 20% 0px'
  });

  /* セクションタイトル */
  document.querySelectorAll('.section_header')
    .forEach(el => observer.observe(el));

  /* メッセージ・段落 */
  document.querySelectorAll(
    '.message p, .gnmedia-message p, .gnmedia-message-sub, ' +
    '.gnstudio-message p, .gnstudio-message-sub, ' +
    '.gnacademy-message p, .gnacademy-message-sub, .mvv-block'
  ).forEach(el => {
    el.classList.add('message-animate');
    observer.observe(el);
  });

  /* 下線アニメーション */
  document.querySelectorAll('.gnmedia-collaboration-lead, .mvv-subtitle')
    .forEach(el => {
      el.classList.add('border-animate');
      observer.observe(el);
    });

  /* =================================================
     HERO 固定処理（scroll を1本化）
  ================================================= */
  const heroes = document.querySelectorAll(
    '.about-hero,.gnmedia-hero,.gnstudio-hero,.gnacademy-hero'
  );

  const heroData = [...heroes].map(hero => ({
    el: hero,
    height: hero.offsetHeight
  }));

  if (heroData.length) {
    document.addEventListener('scroll', () => {
      const y = window.scrollY;

      heroData.forEach(({ el, height }) => {
        if (y >= height) {
          el.style.position = 'absolute';
          el.style.top = `${height}px`;
          el.style.pointerEvents = 'none';
        } else if (y <= 700) {
          el.style.position = 'fixed';
          el.style.top = '0';
          el.style.pointerEvents = 'auto';
        }
      });
    }, { passive: true });
  }

  /* =================================================
     タイトル文字アニメーション（軽量）
  ================================================= */
  document.querySelectorAll(
    '.message-title, .gnmedia-message-title, .gnstudio-message-title, .gnacademy-message-title'
  ).forEach(title => {

    const frag = document.createDocumentFragment();

    [...title.textContent].forEach((char, i) => {
      const span = document.createElement('span');

      if (char === ' ') {
        span.innerHTML = '&nbsp;';
        span.style.animationDelay = '0s';
        span.classList.add('space');
      } else {
        span.textContent = char;
        span.style.animationDelay = `${i * 0.05}s`;
      }

      frag.appendChild(span);
    });

    title.textContent = '';
    title.appendChild(frag);
  });


  /* =================================================
     ハンバーガーメニュー
  ================================================= */
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

  /* =================================================
     SP OUR SOLUTIONS ドロップダウン
  ================================================= */
  document.querySelector('.mobile-dropdown-toggle')
    ?.addEventListener('click', () =>
      document.querySelector('.mobile-dropdown')
        ?.classList.toggle('open')
    );

});
