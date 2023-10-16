function navigate() {
    const page = document.getElementById('page');
  
    // フェードアウトのアニメーションを適用
    page.classList.remove('fade-in');
    page.classList.add('fade-out');
  
    // ページ遷移
    setTimeout(() => {
      window.location.href = 'another_page.html'; // 別のページに遷移
    }, 2000); // フェードアウトアニメーションの時間（1秒）後に遷移
  }
  