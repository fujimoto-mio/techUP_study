import Chart from 'chart.js/auto';

// 色配列（タグ別棒グラフ用）
const tagColors = [
  '#3B82F6','#10B981','#F59E0B','#EF4444','#8B5CF6','#F472B6','#0EA5E9','#FBBF24'
];

/* ==================================================
  投稿公開/非公開円グラフ
  - postStatusCount: { '公開済み': 10, '非公開': 5 } など
  - postStatusLinks: ラベルクリック時の遷移先URL
================================================== */
export const renderPostStatusChart = (postStatusCount, postStatusLinks) => {
  const ctx = document.getElementById('postStatusChart').getContext('2d');
  new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: Object.keys(postStatusCount),
      datasets: [{
        data: Object.values(postStatusCount),
        backgroundColor: ['#34D399', '#F87171'] // 公開/非公開色
      }]
    },
    options: {
      responsive: true,
      plugins: { legend: { position: 'bottom' } },
      // クリックで該当一覧ページへ遷移
      onClick: (evt, item) => {
        if(item.length > 0){
          const index = item[0].index;
          const label = evt.chart.data.labels[index];
          window.location.href = postStatusLinks[label];
        }
      }
    }
  });
};

/* ==================================================
  実績公開/非公開円グラフ
================================================== */
export const renderWorkStatusChart = (workStatusCount, workStatusLinks) => {
  const ctx = document.getElementById('workStatusChart').getContext('2d');
  new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: Object.keys(workStatusCount),
      datasets: [{
        data: Object.values(workStatusCount),
        backgroundColor: ['#34D399', '#F87171']
      }]
    },
    options: {
      responsive: true,
      plugins: { legend: { position: 'bottom' } },
      onClick: (evt, item) => {
        if(item.length > 0){
          const index = item[0].index;
          const label = evt.chart.data.labels[index];
          window.location.href = workStatusLinks[label];
        }
      }
    }
  });
};

/* ==================================================
  投稿タグ別棒グラフ
  - postTags: { 'タグ1': 5, 'タグ2': 8, ... }
  - postTagLinks: クリック時遷移先
================================================== */
export const renderPostTagsChart = (postTags, postTagLinks) => {
  const ctx = document.getElementById('postTagsChart').getContext('2d');
  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: Object.keys(postTags),
      datasets: [{
        label: '件数',
        data: Object.values(postTags),
        backgroundColor: tagColors
      }]
    },
    options: {
      responsive: true,
      plugins: { legend: { display: false } },
      scales: { y: { beginAtZero: true, precision:0 } },
      onClick: (evt, item) => {
        if(item.length > 0){
          const index = item[0].index;
          const label = Object.keys(postTags)[index];
          window.location.href = postTagLinks[label];
        }
      }
    }
  });
};

/* ==================================================
  実績タグ別棒グラフ
================================================== */
export const renderWorkTagsChart = (workTags, workTagLinks) => {
  const ctx = document.getElementById('workTagsChart').getContext('2d');
  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: Object.keys(workTags),
      datasets: [{
        label: '件数',
        data: Object.values(workTags),
        backgroundColor: tagColors
      }]
    },
    options: {
      responsive: true,
      plugins: { legend: { display: false } },
      scales: { y: { beginAtZero: true, precision:0 } },
      onClick: (evt, item) => {
        if(item.length > 0){
          const index = item[0].index;
          const label = Object.keys(workTags)[index];
          window.location.href = workTagLinks[label];
        }
      }
    }
  });
};

/* ==================================================
  DOMContentLoaded で全グラフ描画
  - window.dashboardData に必要データがある場合
================================================== */
document.addEventListener('DOMContentLoaded', () => {
  if(window.dashboardData) {
    const {
      postStatusCount,
      postStatusLinks,
      workStatusCount,
      workStatusLinks,
      postTags,
      postTagLinks,
      workTags,
      workTagLinks
    } = window.dashboardData;

    renderPostStatusChart(postStatusCount, postStatusLinks);
    renderWorkStatusChart(workStatusCount, workStatusLinks);
    renderPostTagsChart(postTags, postTagLinks);
    renderWorkTagsChart(workTags, workTagLinks);
  }
});
