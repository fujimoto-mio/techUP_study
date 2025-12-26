document.addEventListener('DOMContentLoaded', () => {

  /* ==============================
     GN MEDIA WORKS
     - 画像ズーム＋フェードインアニメーション
     - IntersectionObserverでスクロール時に発火
  ============================== */
  const targets = document.querySelectorAll('.js-zoom-fade');

  if (targets.length) {
    const observer = new IntersectionObserver(
      (entries, obs) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            // 要素が画面に入ったらフェードインクラス付与
            entry.target.classList.add('is-visible');
            obs.unobserve(entry.target); // 一度表示したら監視解除
          }
        });
      },
      { threshold: 0.6 } // 要素が60%表示されたら発火
    );

    targets.forEach(target => observer.observe(target));
  }

});

/* ==============================
   GN MEDIA HERO YouTube 背景動画
   - 自動再生・ループ・ミュート設定
   - 背景として動画を再生
============================== */
let gnmediaPlayer;

function loadYouTubeAPI() {
  return new Promise((resolve) => {
    if (window.YT && window.YT.Player) return resolve();

    const tag = document.createElement("script");
    tag.src = "https://www.youtube.com/iframe_api";
    document.body.appendChild(tag);

    window.onYouTubeIframeAPIReady = resolve;
  });
}

async function initGNMediaHeroVideo() {
  const playerEl = document.getElementById("yt-gnmedia-player");
  if (!playerEl) return;

  await loadYouTubeAPI();

  gnmediaPlayer = new YT.Player("yt-gnmedia-player", {
    videoId: "2tF8XJRLnVo",
    playerVars: {
      autoplay: 1,
      controls: 0,
      loop: 1,
      playlist: "2tF8XJRLnVo",
      mute: 1,
      rel: 0,
      playsinline: 1
    },
    events: {
      onReady: (e) => {
        e.target.mute();
        e.target.playVideo();
      }
    }
  });
}

initGNMediaHeroVideo();
