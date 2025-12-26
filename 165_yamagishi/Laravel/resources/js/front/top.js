/* =========================================================
   YouTube背景動画制御 + ページアニメーション統合版
========================================================= */

let player; // YouTubeプレイヤーオブジェクト

// =============================
// YouTube APIロード
// =============================
function loadYouTubeAPI() {
  return new Promise((resolve) => {
    if (window.YT && window.YT.Player) return resolve();

    const tag = document.createElement("script");
    tag.src = "https://www.youtube.com/iframe_api";
    tag.id = 'youtube-api-script';
    document.body.appendChild(tag);

    window.onYouTubeIframeAPIReady = () => resolve();
  });
}

// =============================
// YouTubeプレイヤー初期化
// =============================
function initYouTubePlayer(videoId) {
  player = new YT.Player("yt-player", {
    videoId,
    playerVars: {
      autoplay: 1,
      controls: 0,
      showinfo: 0,
      modestbranding: 1,
      loop: 1,
      playlist: videoId,
      mute: 1,
      rel: 0,
      playsinline: 1
    },
    events: {
      onReady: (event) => {
        event.target.mute();
        event.target.playVideo();
      }
    }
  });
}

// =============================
// 汎用フェードイン監視
// =============================
function observeFadeIn(targetSelectorOrNode, options = { threshold: 0.15, rootMargin: '0px 0px -20% 0px' }, childSelectors = []) {
  if (!targetSelectorOrNode) return;

  let targets;
  if (typeof targetSelectorOrNode === 'string') {
    targets = document.querySelectorAll(targetSelectorOrNode);
  } else if (targetSelectorOrNode instanceof Element) {
    targets = [targetSelectorOrNode];
  } else if (NodeList.prototype.isPrototypeOf(targetSelectorOrNode) || Array.isArray(targetSelectorOrNode)) {
    targets = targetSelectorOrNode;
  } else {
    return;
  }

  if (!targets.length) return;

  const observer = new IntersectionObserver((entries, obs) => {
    entries.forEach(entry => {
      if (!entry.isIntersecting) return;

      let nodesToAnimate = [];
      if (Array.isArray(childSelectors) && childSelectors.length) {
        childSelectors.forEach(sel => {
          const found = entry.target.querySelectorAll(sel);
          if (found.length) nodesToAnimate = nodesToAnimate.concat(Array.from(found));
        });
      } else {
        nodesToAnimate = [entry.target];
      }

      nodesToAnimate.forEach((el, i) => {
        if (!el) return;
        setTimeout(() => el.classList.add('fade-in'), i * 120);
      });

      obs.unobserve(entry.target);
    });
  }, options);

  targets.forEach(t => observer.observe(t));
}

// =============================
// ナビ背景 & 動画ぼかし切替
// =============================
function observeNavBlur(sloganSelector, navSelector, bgVideoSelector) {
  const slogan = document.querySelector(sloganSelector);
  const nav = document.querySelector(navSelector);
  const bgVideo = document.querySelector(bgVideoSelector);
  if (!slogan || !nav) return;

  new IntersectionObserver(
    ([entry]) => {
      nav.classList.toggle('is-visible', !entry.isIntersecting);
      bgVideo?.classList.toggle('is-blur', !entry.isIntersecting);
    },
    { threshold: 0.15 }
  ).observe(slogan);
}

// =============================
// DOMContentLoaded で初期化
// =============================
document.addEventListener('DOMContentLoaded', async () => {
  // YouTube背景動画
  await loadYouTubeAPI();
  initYouTubePlayer(window._GLOBE_BG_VIDEO_ID || 'qZ_BO9WMSTs');

  // ナビ背景 + 動画ぼかし切替
  observeNavBlur('.js-slogan', '.global-nav', '.js-bg-video');

  // HEROセクションフェードイン
  observeFadeIn('.hero-content', 
    { threshold: 0.15, rootMargin: '0px 0px -10% 0px' }, 
    ['.hero-content_copy-en', '.hero-content_copy-ja']
  );

  // ABOUTセクションフェードイン
  observeFadeIn('.about-section', 
    { threshold: 0.12, rootMargin: '0px 0px -25% 0px' }, 
    ['.about-section_left', '.about-section_right p', '.about-section_link-wrapper']
  );

  // SOLUTIONSセクションフェードイン（li単位）
  observeFadeIn('.gn-media, .gn-studio, .gn-academy', 
    { threshold: 0.6, rootMargin: '0px 0px -10% 0px' }
  );

});
