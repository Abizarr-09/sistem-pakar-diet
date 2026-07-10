<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>NutrimED - Sistem Pakar Penentuan Jenis Diet</title>
    @fonts
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <style>
            *{margin:0;padding:0;box-sizing:border-box}body{font-family:figtree,ui-sans-serif,system-ui,sans-serif;background:linear-gradient(135deg,#0f172a 0%,#1e293b 50%,#0f172a 100%);min-height:100vh;color:#fff}.hero{min-height:100vh;display:flex;flex-direction:column;align-items:center;justify-content:center;padding:2rem;position:relative;overflow:hidden}.hero::before{content:'';position:absolute;top:-50%;left:-50%;width:200%;height:200%;background:radial-gradient(circle,rgba(16,185,129,.08) 0%,transparent 50%);animation:pulse 8s ease-in-out infinite}@keyframes pulse{0%,100%{transform:scale(1)}50%{transform:scale(1.1)}}.content{position:relative;z-index:1;text-align:center;max-width:800px}.logo{width:80px;height:80px;background:linear-gradient(135deg,#10b981,#059669);border-radius:24px;display:flex;align-items:center;justify-content:center;margin:0 auto 1rem;box-shadow:0 20px 60px rgba(16,185,129,.3)}.logo svg{width:44px;height:44px;color:#fff}h1{font-size:clamp(2rem,5vw,3.5rem);font-weight:800;line-height:1.2;margin-bottom:.25rem;background:linear-gradient(135deg,#fff,#94a3b8);-webkit-background-clip:text;-webkit-text-fill-color:transparent}h1 span{background:linear-gradient(135deg,#10b981,#34d399);-webkit-background-clip:text;-webkit-text-fill-color:transparent}.subtitle{font-size:clamp(1rem,2vw,1.25rem);color:#94a3b8;margin-bottom:3rem;line-height:1.6}.features{display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:1rem;margin-bottom:3rem;width:100%}.feature-card{background:rgba(255,255,255,.05);border:1px solid rgba(255,255,255,.1);border-radius:16px;padding:1.5rem;text-align:left;backdrop-filter:blur(10px);transition:all .3s}.feature-card:hover{background:rgba(255,255,255,.1);transform:translateY(-2px);border-color:rgba(16,185,129,.3)}.feature-card .icon{width:40px;height:40px;border-radius:12px;display:flex;align-items:center;justify-content:center;margin-bottom:1rem;font-size:1.25rem}.feature-card h3{font-size:1rem;font-weight:600;margin-bottom:.5rem}.feature-card p{font-size:.875rem;color:#94a3b8;line-height:1.5}.actions{display:flex;gap:1rem;justify-content:center;flex-wrap:wrap}.btn{display:inline-flex;align-items:center;padding:.75rem 2rem;border-radius:12px;font-weight:600;font-size:1rem;text-decoration:none;transition:all .3s}.btn-primary{background:linear-gradient(135deg,#10b981,#059669);color:#fff;box-shadow:0 4px 20px rgba(16,185,129,.4)}.btn-primary:hover{transform:translateY(-2px);box-shadow:0 8px 30px rgba(16,185,129,.5)}.btn-secondary{background:rgba(255,255,255,.1);color:#fff;border:1px solid rgba(255,255,255,.2)}.btn-secondary:hover{background:rgba(255,255,255,.15)}.stats{display:flex;gap:2rem;justify-content:center;margin-bottom:3rem}.stat{text-align:center}.stat-value{font-size:2rem;font-weight:800;background:linear-gradient(135deg,#10b981,#34d399);-webkit-background-clip:text;-webkit-text-fill-color:transparent}.stat-label{font-size:.8rem;color:#64748b;margin-top:.25rem}.footer{margin-top:4rem;font-size:.8rem;color:#475569}
        </style>
    @endif
</head>
<body>
    <div class="hero">
        <div class="content">
            @php $logoImg = public_path('images/logo diet.jpeg'); @endphp
            @if (file_exists($logoImg))
                <img src="{{ asset('images/logo diet.jpeg') }}" alt="NutrimED" style="width:120px;height:auto;margin:0 auto 1rem;display:block;border-radius:24px;">
            @else
                <div class="logo">
                    <x-nutrimed-logo :iconOnly="true" size="w-10 h-10" class="text-white" />
                </div>
            @endif

            <h1>Nutrim<span>ED</span></h1>
            <p style="color:#94a3b8;font-size:1.1rem;margin-bottom:2rem;margin-top:-0.25rem">Sistem Pakar Penentuan Jenis Diet</p>

            <p class="subtitle">
                Temukan jenis diet yang tepat untuk pasien berdasarkan analisis penyakit dengan metode Forward Chaining berbobot prioritas
            </p>

            <div class="stats">
                <div class="stat">
                    <div class="stat-value">11</div>
                    <div class="stat-label">Penyakit</div>
                </div>
                <div class="stat">
                    <div class="stat-value">5</div>
                    <div class="stat-label">Jenis Diet</div>
                </div>
                <div class="stat">
                    <div class="stat-value">FC</div>
                    <div class="stat-label">Forward Chaining</div>
                </div>
            </div>

            <div class="features">
                <div class="feature-card">
                    <div class="icon" style="background:rgba(16,185,129,.2);color:#10b981">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3>Cek Jenis Diet</h3>
                    <p>Pilih penyakit pasien untuk mendapatkan rekomendasi diet yang tepat</p>
                </div>
                <div class="feature-card">
                    <div class="icon" style="background:rgba(59,130,246,.2);color:#3b82f6">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3>Forward Chaining</h3>
                    <p>Inferensi berbasis prioritas bobot untuk hasil yang akurat</p>
                </div>
                <div class="feature-card">
                    <div class="icon" style="background:rgba(245,158,11,.2);color:#f59e0b">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                    </div>
                    <h3>Riwayat Lengkap</h3>
                    <p>Semua hasil diagnosis tersimpan dan bisa dicetak kapan saja</p>
                </div>
            </div>

            <div class="actions">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn btn-primary">
                            Dashboard
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                            </svg>
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary">
                            Mulai Sekarang
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                            </svg>
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-secondary">
                                Daftar Akun
                            </a>
                        @endif
                    @endauth
                @endif
            </div>

            <div class="footer">
                <p>NutrimED &mdash; Sistem Pakar Penentuan Jenis Diet</p>
            </div>
        </div>
    </div>
</body>
</html>
