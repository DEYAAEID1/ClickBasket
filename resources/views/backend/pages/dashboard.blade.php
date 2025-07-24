@extends('backend.layout.master')

@section('content')
<div class="card-body"  id="wlc-page-container" style="min-height: 100vh; padding-top: 30px;">
    <div class="container text-center">
        <h1>
            Welcome back, {{ auth()->user()?->name }}!
        </h1>
        <p>
           <h5> نثق بك وبكفاءتك، ولهيك تم منحك كامل الصلاحيات الإدارية ✅
            بس كنوع من التذكير اللطيف 😊، أي استخدام غير مناسب للصلاحيات وبيخالف سياسات
            الشركة ممكن يؤدي للمساءلة، لأنه في نظام متابعة لكل الأنشطة 🔍</h5>
        </p>
        <p class="animate__animated animate__fadeInUp text-muted">
            ====================================================
        </p>
        <p>
           <h5> We trust your skills, and that’s why you’ve been granted full admin privileges ✅
            Just a gentle reminder 😊 — any misuse of these privileges against company policies may lead to accountability, as all activities are monitored 🔍
           </h5>      
        </p>
    </div>
</div>



@endsection