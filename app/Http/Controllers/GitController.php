<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;

class GitController extends Controller
{
    public function index()
    {
        // جلب معلومات الريبوستري
        $repoUrl = shell_exec('git config --get remote.origin.url');
        $branch = shell_exec('git rev-parse --abbrev-ref HEAD');
        $logs = shell_exec('git log -n 5 --pretty=format:"%h - %s (%ci)"');

        // تنظيف البيانات
        $repoUrl = trim($repoUrl) ?: 'غير معروف';
        $branch = trim($branch) ?: 'غير معروف';
        $logs = trim($logs) ?: 'لا توجد تحديثات متاحة';

        return view('git.info', compact('repoUrl', 'branch', 'logs'));
    }

    public function pull()
    {
        // تنفيذ أمر السحب
        $output = shell_exec('git pull 2>&1');

        // إعادة التوجيه مع رسالة نجاح أو خطأ
        return redirect()->route('updates.index')->with('message', nl2br($output));
    }
}
