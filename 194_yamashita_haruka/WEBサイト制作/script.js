// JavaScriptの処理は必要に応じて記述します
// 例：スムーズスクロールなど
/*document.querySelectorAll('a[href^="#"]').forEach(anchor => {
  anchor.addEventListener('click', function (e) {
      e.preventDefault();

      document.querySelector(this.getAttribute('href')).scrollIntoView({
          behavior: 'smooth'
      });
  });
});*/

/*=========================================
#ハンバーガーメニュー
=========================================*/
const hamburger = document.querySelector(".js-hamburger");
const drawer = document.querySelector(".js-drawer");
const drawerLinks = document.querySelectorAll(".js-drawer a");

hamburger.addEventListener('click', () => {
  hamburger.classList.toggle('is-active');
  drawer.classList.toggle('is-active');
});

drawerLinks.forEach(drawerLink => {
  drawerLink.addEventListener('click', () => {
    hamburger.classList.remove('is-active');
    drawer.classList.remove('is-active');
  });
});

drawer.addEventListener('click', () => {
  hamburger.classList.remove('is-active');
  drawer.classList.remove('is-active');
});