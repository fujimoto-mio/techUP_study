/* =================================================
   YouTube背景 + ページアニメーション 完全版
================================================= */

let player;

/* =============================
   YouTube API 遅延ロード
============================= */
function loadYouTubeAPI() {
  return new Promise(resolve => {
    if (window.YT && window.YT.Player) return resolve();

    const script = document.createElement('script');
    script.src = 'https://www.youtube.com/iframe_api';
    document.body.appendChild(script);

    window.onYouTubeIframeAPIReady = () => resolve();
  });
}

/* =============================
   YouTube Player 初期化
============================= */
function initYouTube(videoId) {
  player = new YT.Player('yt-player', {
    videoId,
    playerVars: {
      autoplay: 1,
      controls: 0,
      loop: 1,
      playlist: videoId,
      mute: 1,
      playsinline: 1,
      modestbranding: 1,
      rel: 0
    },
    events: {
      onReady: e => {
        e.target.mute();
        e.target.playVideo();
      }
    }
  });
}

/* =================================================
   HERO フェードイン
================================================= */
const heroObserver = new IntersectionObserver(
  ([entry], obs) => {
    if (!entry.isIntersecting) return;

    entry.target
      .querySelectorAll('.hero-content_copy-en, .hero-content_copy-ja')
      .forEach((el, i) =>
        setTimeout(() => el.classList.add('fade-in'), i * 120)
      );

    obs.unobserve(entry.target);
  },
  { threshold: 0.2 }
);

/* =================================================
   ABOUT + ナビ背景 & 動画ぼかし
================================================= */

let lastScrollY = window.scrollY;

const aboutObserver = new IntersectionObserver(
  (entries) => {
    entries.forEach(entry => {
      const nav = document.querySelector('.global-nav');
      const bgVideo = document.querySelector('.js-bg-video');

      const currentScrollY = window.scrollY;
      const isScrollingUp = currentScrollY < lastScrollY;
      lastScrollY = currentScrollY;

      if (entry.isIntersecting) {
        /* ========= ABOUT に入った ========= */

        entry.target
          .querySelectorAll(
            '.about-section_left, .about-section_right p, .about-section_link-wrapper'
          )
          .forEach((el, i) => {
            if (!el.classList.contains('fade-in')) {
              setTimeout(() => el.classList.add('fade-in'), i * 120);
            }
          });

        nav?.classList.add('is-visible');
        bgVideo?.classList.add('is-blur');

      } else {
        /* ========= ABOUT を抜けた ========= */

        if (isScrollingUp) {
          /* 上に戻ったときだけ OFF */
          nav?.classList.remove('is-visible');
          bgVideo?.classList.remove('is-blur');
        }
        /* 下に抜けた場合は何もしない */
      }
    });
  },
  {
    threshold: 0.15,
    rootMargin: '0px 0px 30% 0px'
  }
);

/* ABOUT 監視開始 */
document.querySelectorAll('.about-section')
  .forEach(el => aboutObserver.observe(el));


/* =================================================
   SOLUTIONS（カード単位フェード・SPは画像先）
================================================= */
const solutionsObserver = new IntersectionObserver(
  (entries, obs) => {
    entries.forEach(entry => {
      if (!entry.isIntersecting) return;

      const isSP = window.matchMedia('(max-width: 768px)').matches;

      if (isSP) {
        // ① 画像フェード
        entry.target.classList.add('fade-in-img');

        // ② 少し遅れてテキスト
        setTimeout(() => {
          entry.target.classList.add('fade-in-text');
        }, 250);

      } else {
        // PCは従来通り
        entry.target.classList.add('fade-in');
      }

      obs.unobserve(entry.target);
    });
  },
  { threshold: 0.3 }
);


/* =================================================
   DOMContentLoaded
================================================= */
document.addEventListener('DOMContentLoaded', async () => {

  /* YouTube 背景 */
  await loadYouTubeAPI();
  initYouTube(window._GLOBE_BG_VIDEO_ID || 'qZ_BO9WMSTs');

  /* HERO */
  const hero = document.querySelector('.hero-content');
  if (hero) heroObserver.observe(hero);

  /* ABOUT */
  document
    .querySelectorAll('.about-section')
    .forEach(el => aboutObserver.observe(el));

  /* SOLUTIONS */
  document
    .querySelectorAll('.gn-media, .gn-studio, .gn-academy')
    .forEach(el => solutionsObserver.observe(el));
});
