<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Mail\AdminContactMail;
use App\Mail\UserContactMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

/**
 * お問い合わせフォーム用コントローラ
 * ・フォーム表示
 * ・送信処理（DB保存 + メール送信）
 * ・サンクスページ表示
 */
class ContactController extends Controller
{
    /**
     * お問い合わせフォーム表示
     */
    public function show($lang)
    {
        return view('front.contact.show', compact('lang'));
    }

    /**
     * お問い合わせ送信処理
     */
    public function send(Request $request, $lang)
    {
        // ==================================================
        // 入力値バリデーション
        // ==================================================
        $validated = $request->validate(
            [
                'name'      => 'required|string|max:255',
                'email'     => 'required|email|max:255',
                'phone'     => 'required|string|max:20',
                'company'   => 'nullable|string|max:255',
                'category'  => 'required|string|max:100',
                'message'   => 'required|string',
                'agreement' => 'accepted',
            ],
            [
                'name.required'      => 'お名前は必須項目です。',
                'email.required'     => 'メールアドレスは必須項目です。',
                'email.email'        => '正しいメールアドレス形式で入力してください。',
                'phone.required'     => '電話番号は必須項目です。',
                'category.required'  => 'お問い合わせ種別を選択してください。',
                'message.required'   => 'お問い合わせ内容を入力してください。',
                'agreement.accepted' => '個人情報保護方針への同意が必要です。',
            ]
        );

        // ==================================================
        // DB保存 + メール送信（トランザクション）
        // ==================================================
        DB::transaction(function () use ($validated) {

            // agreement フラグを除外
            $contactData = collect($validated)
                ->except('agreement')
                ->toArray();

            // ------------------------------
            // お問い合わせ内容をDBへ保存
            // ------------------------------
            Contact::create($contactData);

            // ------------------------------
            // 管理者へ通知メール送信
            // ------------------------------
            Mail::to(config('mail.admin_address'))
                ->send(new AdminContactMail($contactData));

            // ------------------------------
            // 送信者へ自動返信メール送信
            // ------------------------------
            Mail::to($contactData['email'])
                ->send(new UserContactMail($contactData));
        });

        // ==================================================
        // サンクスページへリダイレクト
        // ==================================================
        return redirect()->route('front.contact.thanks', ['lang' => $lang]);
    }

    /**
     * サンクスページ表示
     */
    public function thanks($lang)
    {
        return view('front.contact.thanks', compact('lang'));
    }
}
