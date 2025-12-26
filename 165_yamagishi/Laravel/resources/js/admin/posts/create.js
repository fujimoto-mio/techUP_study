import tinymce from 'tinymce/tinymce';

// アイコン・テーマ・DOMモデル・プラグインを読み込み
import 'tinymce/icons/default';
import 'tinymce/themes/silver';
import 'tinymce/models/dom';
import 'tinymce/plugins/lists';
import 'tinymce/plugins/link';
import 'tinymce/plugins/image';

// DOMが読み込まれたら初期化
document.addEventListener('DOMContentLoaded', () => {
    const editor = document.getElementById('editor');
    if (!editor) return; // editor が存在しない場合は処理しない

    // TinyMCE 初期化
    tinymce.init({
        selector: '#editor',    // 対象 textarea
        height: 420,            // エディタ高さ
        license_key: 'gpl',     // ライセンスキー（GPL）

        // 使用するプラグイン
        plugins: 'lists link image',

        // ツールバー
        toolbar: 'undo redo | bold italic | bullist numlist | link image',
        menubar: false,         // メニューバー非表示

        // 画像アップロード設定
        images_upload_url: '/admin/images/upload',
        images_upload_credentials: true, // 認証情報を送信

        // コンテンツ内スタイル
        content_style: `
            body {
                font-family: "Noto Sans JP", sans-serif;
                font-size: 14px;
                line-height: 1.8;
            }
        `,
    });
});
