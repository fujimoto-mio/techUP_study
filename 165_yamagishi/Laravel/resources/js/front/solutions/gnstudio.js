document.addEventListener('DOMContentLoaded', () => {

  /* ==============================
     YouTubeサムネイルクリック処理
     - サムネイルを背景画像として設定
     - クリックで動画再生
  ============================== */
  document.querySelectorAll('.video-thumbnail').forEach(thumb => {
    const videoId = thumb.dataset.videoId;

    // サムネイル画像設定
    thumb.style.backgroundImage =
      `url(https://img.youtube.com/vi/${videoId}/maxresdefault.jpg)`;

    // クリックでiframeを再生
    thumb.addEventListener('click', () => {
      thumb.style.display = 'none';
      const iframe = thumb.nextElementSibling;
      iframe.src += '&autoplay=1';
    });
  });

  /* ==============================
     CUSTOMER ISSUES 順番にフェードイン
  ============================== */
  const items = document.querySelectorAll(".issue-item");
  const issueObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const index = Array.from(items).indexOf(entry.target);
        const delay = index * 600;

        setTimeout(() => {
          entry.target.classList.add("show");
        }, delay);

        issueObserver.unobserve(entry.target);
      }
    });
  }, {
    threshold: 0,
    rootMargin: '0px 0px -40% 0px'
  });
  items.forEach(item => issueObserver.observe(item));

  /* ==============================
     STRENGTH 順番にフェードイン
     - PC/SPでマージンを調整
     - 左右交互にアニメーション
  ============================== */
  const isSP = window.matchMedia('(max-width: 768px)').matches;
  const texts = document.querySelectorAll(".strength-text");
  const strengthObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const textEl = entry.target;
        const item = textEl.closest('.strength-item');
        const videoEl = item.querySelector('.gnstudio-strengths-image');

        const isEven = Array.from(item.parentNode.children).indexOf(item) % 2 === 1;

        // 左右アニメーション付与
        if (isEven) {
          textEl.classList.add('from-left');
          videoEl.classList.add('from-left');
        } else {
          textEl.classList.add('from-right');
          videoEl.classList.add('from-right');
        }

        setTimeout(() => {
          textEl.classList.add('show');
          videoEl.classList.add('show');
        }, 200);

        strengthObserver.unobserve(textEl);
      }
    });
  }, {
    threshold: 0,
    rootMargin: isSP
      ? '0px 0px -10% 0px'
      : '0px 0px -40% 0px'
  });
  texts.forEach(text => strengthObserver.observe(text));

  /* ==============================
     開閉アニメーション共通関数
     - FAQ / FLOW で利用
  ============================== */
  function toggleItem(item, content, group) {
    if (!item.classList.contains('open')) {
      group.forEach(otherItem => {
        if (otherItem !== item && otherItem.classList.contains('open')) {
          const otherContent = otherItem.querySelector(content.tagName.toLowerCase());
          smoothClose(otherItem, otherContent);
        }
      });
      smoothOpen(item, content);
    } else {
      smoothClose(item, content);
    }
  }

  function smoothOpen(item, content) {
    content.style.display = 'flex';
    content.style.height = '0';
    content.style.opacity = '0';
    content.style.paddingTop = '0';
    item.classList.add('open');

    requestAnimationFrame(() => {
      content.style.transition =
        'height 0.4s ease, opacity 0.4s ease, padding-top 0.4s ease';
      content.style.height = content.scrollHeight + 'px';
      content.style.opacity = '1';
      content.style.paddingTop = '40px';
    });

    content.addEventListener('transitionend', function handler() {
      content.style.height = 'auto';
      content.removeEventListener('transitionend', handler);
    });
  }

  function smoothClose(item, content) {
    content.style.height = content.scrollHeight + 'px';

    requestAnimationFrame(() => {
      content.style.transition =
        'height 0.4s ease, opacity 0.4s ease, padding-top 0.4s ease';
      content.style.height = '0';
      content.style.opacity = '0';
      content.style.paddingTop = '0';
    });

    item.classList.remove('open');

    content.addEventListener('transitionend', function handler() {
      content.style.display = 'none';
      content.removeEventListener('transitionend', handler);
    });
  }

  // FLOW
  const flowItems = document.querySelectorAll('.flow-item');
  document.querySelectorAll('.flow-toggle').forEach(toggle => {
    toggle.addEventListener('click', () => {
      const item = toggle.closest('.flow-item');
      toggleItem(item, item.querySelector('.flow-content'), flowItems);
    });
  });

  // FAQ
  const faqItems = document.querySelectorAll('.faq-item');
  faqItems.forEach(item => {
    item.querySelector('.faq-question').addEventListener('click', () => {
      toggleItem(item, item.querySelector('.faq-answer-wrapper'), faqItems);
    });
  });

});

/* ==============================
   GN STUDIO HERO YouTube 背景動画
   - 自動再生・ループ・ミュート
============================== */
let gnstudioPlayer;

function loadYouTubeAPI() {
  return new Promise((resolve) => {
    if (window.YT && window.YT.Player) return resolve();

    const tag = document.createElement("script");
    tag.src = "https://www.youtube.com/iframe_api";
    document.body.appendChild(tag);

    window.onYouTubeIframeAPIReady = resolve;
  });
}

async function initGNStudioHeroVideo() {
  const playerEl = document.getElementById("yt-gnstudio-player");
  if (!playerEl) return;

  await loadYouTubeAPI();

  gnstudioPlayer = new YT.Player("yt-gnstudio-player", {
    videoId: "x3hcs22UgFA",
    playerVars: {
      autoplay: 1,
      controls: 0,
      loop: 1,
      playlist: "x3hcs22UgFA",
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

initGNStudioHeroVideo();
