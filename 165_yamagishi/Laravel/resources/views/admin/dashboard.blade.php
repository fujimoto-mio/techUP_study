@extends('admin.layouts.admin')

@push('head')
    @vite('resources/css/admin/dashboard.css')
@endpush

@section('content')

<div class="dashboard">

    <header class="dashboard-header">
        <h1>ダッシュボード</h1>
    </header>

    {{-- KPI --}}
    <section class="dashboard-kpi">
        <div class="kpi-card">
            <p class="kpi-label">NEWS & BLOG 合計</p>
            <p class="kpi-value">{{ $postTotal }}</p>
        </div>

        <div class="kpi-card kpi-success">
            <p class="kpi-label">NEWS & BLOG 公開中</p>
            <p class="kpi-value">{{ $postPublished }}</p>
        </div>

        <div class="kpi-card">
            <p class="kpi-label">WORKS 合計</p>
            <p class="kpi-value">{{ $workTotal }}</p>
        </div>

        <div class="kpi-card kpi-success">
            <p class="kpi-label">WORKS 公開中</p>
            <p class="kpi-value">{{ $workPublished }}</p>
        </div>
    </section>

    {{-- 公開状況 --}}
    <section class="dashboard-section">
        <h2>公開状況</h2>

        <div class="dashboard-grid">
            <div class="dashboard-card">
                <h3>NEWS & BLOGの公開 / 非公開</h3>
                <canvas id="postStatusChart" height="220"></canvas>
            </div>

            <div class="dashboard-card">
                <h3>WORKSの公開 / 非公開</h3>
                <canvas id="workStatusChart" height="220"></canvas>
            </div>
        </div>
    </section>

    {{-- タグ別 --}}
    <section class="dashboard-section">
        <h2>タグ別内訳</h2>

        <div class="dashboard-grid">
            <div class="dashboard-card">
                <h3>NEWS & BLOG タグ別件数</h3>
                <canvas id="postTagsChart" height="260"></canvas>
            </div>

            <div class="dashboard-card">
                <h3>WORKS タグ別件数</h3>
                <canvas id="workTagsChart" height="260"></canvas>
            </div>
        </div>
    </section>

</div>
@endsection

@push('scripts')
    @vite('resources/js/admin/dashboard.js')

    <script>
        window.dashboardData = {
            postStatusCount: {!! json_encode($postStatusCount) !!},
            postStatusLinks: {!! json_encode($postStatusLinks) !!},
            workStatusCount: {!! json_encode($workStatusCount) !!},
            workStatusLinks: {!! json_encode($workStatusLinks) !!},
            postTags: {!! json_encode($postTags) !!},
            postTagLinks: {!! json_encode($postTagLinks) !!},
            workTags: {!! json_encode($workTags) !!},
            workTagLinks: {!! json_encode($workTagLinks) !!}
        };
    </script>
@endpush
