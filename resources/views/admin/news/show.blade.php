@extends('layouts.admin')

@section('title', 'Yangilik ko\'rish')

@section('content')
<style>
    .detail-card {
        background: white;
        border-radius: var(--gov-radius);
        box-shadow: var(--gov-shadow);
        overflow: hidden;
        margin-bottom: 24px;
    }
    .detail-card-header {
        padding: 20px 24px;
        border-bottom: 1px solid var(--gov-border);
        background: var(--gov-bg-light);
        display: flex;
        align-items: center;
        gap: 12px;
    }
    .detail-card-header i {
        color: var(--gov-primary);
        font-size: 1.25rem;
    }
    .detail-card-header h3 {
        margin: 0;
        font-size: 1.1rem;
        color: var(--gov-primary-darker);
    }
    .detail-card-body {
        padding: 24px;
    }
    .news-meta {
        background: var(--gov-bg-light);
        padding: 20px;
        border-radius: var(--gov-radius);
        margin-bottom: 24px;
    }
    .meta-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
        gap: 16px;
    }
    .meta-item {
        padding: 12px 16px;
        background: white;
        border-radius: var(--gov-radius);
        border: 1px solid var(--gov-border);
    }
    .meta-label {
        font-size: 0.75rem;
        color: var(--gov-text-muted);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 4px;
    }
    .meta-value {
        font-weight: 600;
        color: var(--gov-text);
    }
    .status-badge {
        padding: 4px 12px;
        border-radius: 15px;
        font-size: 0.85rem;
        font-weight: 600;
    }
    .status-published {
        background: rgba(39, 174, 96, 0.15);
        color: var(--gov-success);
    }
    .status-draft {
        background: rgba(241, 196, 15, 0.15);
        color: #f39c12;
    }
    .news-title {
        font-size: 1.75rem;
        color: var(--gov-primary-darker);
        margin-bottom: 20px;
        line-height: 1.4;
    }
    .news-images {
        margin: 24px 0;
    }
    .news-images h4 {
        margin-bottom: 16px;
        color: var(--gov-text);
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .image-gallery {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 16px;
    }
    .news-image {
        width: 100%;
        height: 220px;
        background-size: cover;
        background-position: center;
        border-radius: var(--gov-radius);
        border: 1px solid var(--gov-border);
        cursor: pointer;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }
    .news-image:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    }
    .image-overlay {
        position: absolute;
        top: 10px;
        left: 10px;
        background: var(--gov-primary);
        color: white;
        padding: 4px 12px;
        border-radius: 15px;
        font-size: 0.8rem;
        font-weight: 600;
    }
    .news-image::after {
        content: '\f00e';
        font-family: 'Font Awesome 6 Free';
        font-weight: 900;
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(transparent, rgba(0,0,0,0.7));
        color: white;
        padding: 30px 15px 12px;
        text-align: center;
        font-size: 1.25rem;
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    .news-image:hover::after {
        opacity: 1;
    }
    .single-image {
        max-width: 500px;
        margin: 0 auto;
    }
    .news-content {
        font-size: 1.05rem;
        line-height: 1.8;
        color: var(--gov-text);
        padding: 20px;
        background: var(--gov-bg-light);
        border-radius: var(--gov-radius);
        border-left: 4px solid var(--gov-primary);
    }
    .news-content p {
        margin-bottom: 16px;
    }
    .external-link {
        background: rgba(30, 64, 175, 0.05);
        padding: 16px 20px;
        border-radius: var(--gov-radius);
        border: 1px solid var(--gov-primary);
        margin: 20px 0;
        display: flex;
        align-items: center;
        gap: 12px;
    }
    .external-link i {
        color: var(--gov-primary);
        font-size: 1.25rem;
    }
    .external-link a {
        color: var(--gov-primary);
        text-decoration: none;
        font-weight: 500;
        word-break: break-all;
    }
    .external-link a:hover {
        text-decoration: underline;
    }
    .detail-actions {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
        padding: 20px 24px;
        background: var(--gov-bg-light);
        border-top: 1px solid var(--gov-border);
    }
    .no-content {
        color: var(--gov-text-muted);
        font-style: italic;
        padding: 20px;
        text-align: center;
        background: var(--gov-bg-light);
        border-radius: var(--gov-radius);
    }

    /* Modal styles */
    .modal {
        display: none;
        position: fixed;
        z-index: 10000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0,0,0,0.95);
    }
    .modal-content {
        margin: auto;
        display: block;
        width: 90%;
        max-width: 900px;
        max-height: 90%;
        object-fit: contain;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        border-radius: var(--gov-radius);
    }
    .modal-content {
        animation: zoomIn 0.3s;
    }
    @keyframes zoomIn {
        from { transform: translate(-50%, -50%) scale(0.8); opacity: 0; }
        to { transform: translate(-50%, -50%) scale(1); opacity: 1; }
    }
    .close {
        position: absolute;
        top: 20px;
        right: 30px;
        color: white;
        font-size: 2.5rem;
        font-weight: bold;
        transition: 0.3s;
        cursor: pointer;
        z-index: 10001;
    }
    .close:hover {
        color: var(--gov-gold);
    }
    .image-counter {
        position: absolute;
        bottom: 30px;
        left: 50%;
        transform: translateX(-50%);
        color: white;
        background: rgba(0,0,0,0.7);
        padding: 10px 24px;
        border-radius: 25px;
        font-weight: 600;
    }
    .nav-arrow {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        color: white;
        font-size: 2rem;
        cursor: pointer;
        background: rgba(0,0,0,0.5);
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: 0.3s;
        z-index: 10001;
    }
    .nav-arrow:hover {
        background: var(--gov-primary);
    }
    .prev { left: 30px; }
    .next { right: 30px; }

    @media (max-width: 768px) {
        .news-title { font-size: 1.35rem; }
        .image-gallery { grid-template-columns: 1fr; }
        .news-image { height: 200px; }
        .nav-arrow {
            width: 40px;
            height: 40px;
            font-size: 1.5rem;
        }
        .prev { left: 15px; }
        .next { right: 15px; }
    }
</style>

<!-- Page Header -->
<div class="admin-page-header">
    <div class="page-header-content">
        <h1><i class="fas fa-newspaper"></i> Yangilik ko'rish</h1>
        <p>ID: #{{ $news->id }}</p>
    </div>
    <a href="{{ route('admin.news.index') }}" class="gov-btn gov-btn-secondary">
        <i class="fas fa-arrow-left"></i> Orqaga
    </a>
</div>

<!-- News Details -->
<div class="detail-card">
    <div class="detail-card-header">
        <i class="fas fa-info-circle"></i>
        <h3>Ma'lumotlar</h3>
    </div>
    <div class="detail-card-body">
        <!-- Meta Information -->
        <div class="news-meta">
            <div class="meta-grid">
                <div class="meta-item">
                    <div class="meta-label">ID</div>
                    <div class="meta-value">#{{ $news->id }}</div>
                </div>
                <div class="meta-item">
                    <div class="meta-label">Holat</div>
                    <div class="meta-value">
                        @if($news->published_at && $news->published_at <= now())
                            <span class="status-badge status-published">
                                <i class="fas fa-check-circle"></i> Nashr qilingan
                            </span>
                        @else
                            <span class="status-badge status-draft">
                                <i class="fas fa-pencil-alt"></i> Qoralama
                            </span>
                        @endif
                    </div>
                </div>
                <div class="meta-item">
                    <div class="meta-label">Nashr sanasi</div>
                    <div class="meta-value">
                        {{ $news->published_at ? $news->published_at->format('d.m.Y H:i') : 'Belgilanmagan' }}
                    </div>
                </div>
                <div class="meta-item">
                    <div class="meta-label">Yaratilgan</div>
                    <div class="meta-value">{{ $news->created_at->format('d.m.Y H:i') }}</div>
                </div>
                <div class="meta-item">
                    <div class="meta-label">Yangilangan</div>
                    <div class="meta-value">{{ $news->updated_at->format('d.m.Y H:i') }}</div>
                </div>
                @if($news->hasMultipleImages())
                <div class="meta-item">
                    <div class="meta-label">Rasmlar soni</div>
                    <div class="meta-value">{{ count($news->getImageArray()) }}</div>
                </div>
                @endif
            </div>
        </div>

        <!-- Title -->
        <h1 class="news-title">{{ $news->title }}</h1>

        <!-- Images -->
        @if($news->image)
            <div class="news-images">
                @php
                    $images = $news->getImageArray();
                    $imageCount = count($images);
                @endphp

                <h4><i class="fas fa-images"></i> Rasmlar ({{ $imageCount }})</h4>

                @if($imageCount === 1)
                    <div class="single-image">
                        <div class="news-image"
                             style="background-image: url('{{ $images[0] }}');"
                             onclick="openModal(0)"
                             title="Kattalashtirish uchun bosing">
                        </div>
                    </div>
                @else
                    <div class="image-gallery">
                        @foreach($images as $index => $imageUrl)
                            <div class="news-image"
                                 style="background-image: url('{{ $imageUrl }}');"
                                 onclick="openModal({{ $index }})"
                                 title="Rasm {{ $index + 1 }} - Kattalashtirish uchun bosing">
                                <div class="image-overlay">{{ $index + 1 }}</div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        @endif

        <!-- Content -->
        @if($news->content)
            <div class="news-content">
                {!! nl2br(e($news->content)) !!}
            </div>
        @else
            <div class="no-content">
                <i class="fas fa-file-alt"></i> Yangilik matni kiritilmagan
            </div>
        @endif

        <!-- External Link -->
        @if($news->link)
            <div class="external-link">
                <i class="fas fa-external-link-alt"></i>
                <div>
                    <strong>Tashqi havola:</strong><br>
                    <a href="{{ $news->link }}" target="_blank">{{ $news->link }}</a>
                </div>
            </div>
        @endif
    </div>

    <!-- Actions -->
    <div class="detail-actions">
        <a href="{{ route('admin.news.edit', $news) }}" class="gov-btn gov-btn-warning">
            <i class="fas fa-edit"></i> Tahrirlash
        </a>
        <a href="{{ route('frontend.media.detail', $news->id) }}" target="_blank" class="gov-btn gov-btn-primary">
            <i class="fas fa-globe"></i> Saytda ko'rish
        </a>
        <form method="POST" action="{{ route('admin.news.destroy', $news) }}" style="display: inline;"
              onsubmit="return confirm('Bu yangilikni o\'chirmoqchimisiz? Bu amalni ortga qaytarib bo\'lmaydi!')">
            @csrf
            @method('DELETE')
            <button type="submit" class="gov-btn gov-btn-danger">
                <i class="fas fa-trash"></i> O'chirish
            </button>
        </form>
    </div>
</div>

<!-- Image Modal -->
@if($news->image)
<div id="imageModal" class="modal">
    <span class="close" onclick="closeModal()"><i class="fas fa-times"></i></span>
    @if(count($news->getImageArray()) > 1)
        <span class="nav-arrow prev" onclick="changeImage(-1)"><i class="fas fa-chevron-left"></i></span>
        <span class="nav-arrow next" onclick="changeImage(1)"><i class="fas fa-chevron-right"></i></span>
    @endif
    <img class="modal-content" id="modalImage">
    @if(count($news->getImageArray()) > 1)
        <div class="image-counter">
            <span id="imageCounter">1 / {{ count($news->getImageArray()) }}</span>
        </div>
    @endif
</div>
@endif
@endsection

@section('scripts')
@if($news->image)
<script>
    const images = {!! json_encode($news->getImageArray()) !!};
    let currentImageIndex = 0;

    function openModal(index) {
        currentImageIndex = index;
        const modal = document.getElementById('imageModal');
        const modalImg = document.getElementById('modalImage');
        const counter = document.getElementById('imageCounter');

        modal.style.display = 'block';
        modalImg.src = images[currentImageIndex];

        if (counter) {
            counter.textContent = `${currentImageIndex + 1} / ${images.length}`;
        }

        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        document.getElementById('imageModal').style.display = 'none';
        document.body.style.overflow = 'auto';
    }

    function changeImage(direction) {
        currentImageIndex += direction;

        if (currentImageIndex >= images.length) {
            currentImageIndex = 0;
        } else if (currentImageIndex < 0) {
            currentImageIndex = images.length - 1;
        }

        const modalImg = document.getElementById('modalImage');
        const counter = document.getElementById('imageCounter');

        modalImg.src = images[currentImageIndex];
        if (counter) {
            counter.textContent = `${currentImageIndex + 1} / ${images.length}`;
        }
    }

    // Close modal on outside click
    document.getElementById('imageModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeModal();
        }
    });

    // Keyboard navigation
    document.addEventListener('keydown', function(e) {
        const modal = document.getElementById('imageModal');
        if (modal.style.display === 'block') {
            switch(e.key) {
                case 'Escape':
                    closeModal();
                    break;
                case 'ArrowLeft':
                    if (images.length > 1) changeImage(-1);
                    break;
                case 'ArrowRight':
                    if (images.length > 1) changeImage(1);
                    break;
            }
        }
    });
</script>
@endif
@endsection
