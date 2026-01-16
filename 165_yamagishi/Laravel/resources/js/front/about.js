document.addEventListener('DOMContentLoaded', () => { 
  const slides = document.querySelectorAll('.about-hero_bg .bg');
  const interval = 4000;   // 1枚の表示時間
  const fadeTime = 2000;   // フェード時間
  let current = 0;

  const showSlide = (index) => {
    const next = (index + 1) % slides.length;

    // 現在のスライドを表示
    slides[index].classList.add('is-active');

    // 次のスライド表示タイミングで切り替え
    setTimeout(() => {
      slides[index].classList.remove('is-active'); // フェードアウト
      showSlide(next);
    }, interval);
  };

  // 初回開始
  showSlide(current);
});
