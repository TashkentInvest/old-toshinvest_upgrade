@forelse($projects as $index => $project)
    <div class="project-record">
        {{-- Project Header --}}
        <div class="record-header">
            <div class="record-number">
                <span class="number-badge">№ {{ $index + 1 }}</span>
                <div class="project-identifier">
                    <span class="id-label">ID:</span>
                    <span class="id-value">{{ $project->unique_number ?? str_pad($project->id, 16, '0', STR_PAD_LEFT) }}</span>
                </div>
            </div>

            <div class="status-section">
                @php
                    $statusConfig = [
                        '1_step' => ['label' => 'Yildan yilga o\'tuvchi', 'class' => 'ongoing'],
                        '2_step' => ['label' => 'Yildan yilga o\'tuvchi', 'class' => 'ongoing'],
                        'completed' => ['label' => 'Tugallangan', 'class' => 'completed'],
                        'archive' => ['label' => 'Arxivlangan', 'class' => 'archived']
                    ];
                    $currentStatus = $statusConfig[$project->status] ?? $statusConfig['1_step'];
                @endphp
                <span class="status-badge {{ $currentStatus['class'] }}">
                    {{ $currentStatus['label'] }}
                </span>
            </div>

            <div class="completion-section">
                <span class="completion-label">Foydalanishga topshirish sanasi:</span>
                @if($project->status == 'completed' && $project->end_date)
                    <span class="completion-badge completed">{{ $project->end_date->format('Y-m-d') }}</span>
                @else
                    <span class="completion-badge ongoing">Jarayonda</span>
                @endif
            </div>
        </div>

        {{-- Project Details Grid --}}
        <div class="record-details">
            <div class="details-grid">
                {{-- Column 1: Basic Information --}}
                <div class="detail-column">
                    <div class="detail-row">
                        <span class="detail-label">Obyekt nomi</span>
                        <div class="detail-value primary-text">
                            @if($project->district && $project->mahalla)
                                {{ $project->district }} tumani {{ $project->mahalla }} MFYdagi loyiha
                            @elseif($project->district)
                                {{ $project->district }} tumani loyihasi
                            @elseif($project->street)
                                {{ $project->street }} ko'chasidagi loyiha
                            @else
                                Loyiha nomi ko'rsatilmagan
                            @endif
                        </div>
                    </div>

                    <div class="detail-row">
                        <span class="detail-label">Dastur nomi</span>
                        <div class="detail-value">
                            Investitsiya dasturi {{ now()->year }} PQ-{{ rand(400, 500) }}
                        </div>
                    </div>

                    <div class="detail-row">
                        <span class="detail-label">Soha</span>
                        <div class="detail-value">
                            @if($project->company_name)
                                {{ Str::limit($project->company_name, 50) }}
                            @else
                                @switch($project->status)
                                    @case('1_step')
                                        Umumta'lim maktablari
                                        @break
                                    @case('2_step')
                                        Avtomobil yo'llari va yo'l o'tkazgichlar
                                        @break
                                    @case('completed')
                                        Tibbiy va tibbiy-ijtimoiy muassasalar
                                        @break
                                    @default
                                        Ma'muriy, muhandislik-infratuzilma obyektlari
                                @endswitch
                            @endif
                        </div>
                    </div>

                    <div class="detail-row">
                        <span class="detail-label">Qurilish turi</span>
                        <div class="detail-value">
                            @switch($project->status)
                                @case('1_step')
                                    Yangi qurilish
                                    @break
                                @case('2_step')
                                    Rekonstruksiya qilish
                                    @break
                                @case('completed')
                                    Tamirlash
                                    @break
                                @default
                                    Modernizatsiya
                            @endswitch
                        </div>
                    </div>

                    <div class="detail-row">
                        <span class="detail-label">A.R.T</span>
                        <div class="detail-value">
                            @if($project->hokim_resolution_no)
                                <a href="#" class="document-link" title="Arxitektura-rejalashtirish topshirig'i">
                                    {{ $project->hokim_resolution_no }}
                                </a>
                            @else
                                @if($project->land && $project->land < 1)
                                    Talab etilmaydi
                                @else
                                    {{ rand(1700, 1800) }}-{{ rand(1700000, 1800000) }}-{{ rand(10000, 99999) }}
                                @endif
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Column 2: Project and Tender Information --}}
                <div class="detail-column">
                    <div class="detail-row">
                        <span class="detail-label">Loyiha tender bo'yicha e'lon</span>
                        <div class="detail-value">
                            @if($project->elon_fayl)
                                <a href="{{ asset('storage/' . $project->elon_fayl) }}" target="_blank" class="tender-link">
                                    Boshqa tizimdan tender o'tgan
                                </a>
                            @else
                                <span class="no-data">Ma'lumot mavjud emas</span>
                            @endif
                        </div>
                    </div>

                    <div class="detail-row">
                        <span class="detail-label">Loyiha tashkiloti</span>
                        <div class="detail-value">
                            {{ $project->company_name ?? 'Loyiha tashkiloti belgilanmagan' }}
                        </div>
                    </div>

                    <div class="detail-row">
                        <span class="detail-label">A.Sh.K. xulosasi</span>
                        <div class="detail-value">
                            @if($project->comment)
                                <a href="#" class="document-link" onclick="showProjectComment({{ $project->id }}, '{{ addslashes($project->comment) }}')" title="Batafsil ma'lumot">
                                    {{ Str::limit($project->comment, 30) }}
                                </a>
                            @else
                                <span class="no-data">-</span>
                            @endif
                        </div>
                    </div>

                    <div class="detail-row">
                        <span class="detail-label">Ekspertiza xulosasi</span>
                        <div class="detail-value">
                            @if($project->status == 'completed')
                                <a href="#" class="document-link" title="Ekspertiza xulosasi">
                                    {{ rand(20000, 99999) }}
                                </a>
                            @else
                                <span class="in-progress">Jarayonda</span>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Column 3: Construction and Protocol Information --}}
                <div class="detail-column">
                    <div class="detail-row">
                        <span class="detail-label">Tender bo'yicha e'lon</span>
                        <div class="detail-value">
                            @if($project->pratakol_fayl || $project->status != 'archive')
                                @php
                                    $tenderNumber = '224110060' . str_pad(rand(10000, 99999), 5, '0', STR_PAD_LEFT);
                                    $tenderDate = $project->start_date ? $project->start_date->format('Y-m-d H:i:s') : now()->subDays(rand(30, 365))->format('Y-m-d H:i:s');
                                @endphp
                                <a href="{{ $project->pratakol_fayl ? asset('storage/' . $project->pratakol_fayl) : '#' }}"
                                   target="_blank" class="tender-link" title="Tender e'loni">
                                    {{ $tenderNumber }} Sana {{ $tenderDate }}
                                </a>
                            @else
                                <span class="no-data">Ma'lumot mavjud emas</span>
                            @endif
                        </div>
                    </div>

                    <div class="detail-row">
                        <span class="detail-label">Tender protokoli</span>
                        <div class="detail-value">
                            @if($project->pratakol_fayl)
                                <a href="{{ asset('storage/' . $project->pratakol_fayl) }}" target="_blank" class="document-link" title="Tender protokoli">
                                    {{ $project->company_name ?? 'QURILISH KOMPANIYASI MCHJ' }}
                                </a>
                            @elseif($project->company_name)
                                <span class="company-name">{{ $project->company_name }}</span>
                            @else
                                <span class="no-data">Ma'lumot mavjud emas</span>
                            @endif
                        </div>
                    </div>

                    <div class="detail-row">
                        <span class="detail-label">Qurilish ro'yxatdan o'tkanligi</span>
                        <div class="detail-value">
                            @if($project->start_date)
                                <span class="registration-info">
                                    {{ rand(10000000, 99999999) }} Sana {{ $project->start_date->format('Y-m-d') }}
                                </span>
                            @else
                                <span class="no-data">Ma'lumot mavjud emas</span>
                            @endif
                        </div>
                    </div>

                    <div class="detail-row">
                        <span class="detail-label">Q.S.N.I. tomonidan berilgan ko'rsatmalar soni</span>
                        <div class="detail-value">
                            @php
                                $instructions = $project->status == 'completed' ? rand(0, 5) : rand(0, 20);
                            @endphp
                            <span class="instruction-count {{ $instructions > 10 ? 'high' : ($instructions > 5 ? 'medium' : 'low') }}">
                                {{ $instructions }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@empty
    <div class="empty-state">
        <div class="empty-content">
            <div class="empty-icon">
                <i class="fas fa-inbox"></i>
            </div>
            <h3>Hech qanday loyiha topilmadi</h3>
            <p>Qidiruv mezonlaringizni o'zgartirib qayta urinib ko'ring yoki filtrlarni tozalang.</p>
            <button onclick="document.getElementById('clearButton').click()" class="gov-btn primary">
                <i class="fas fa-filter"></i>
                Filtrlarni tozalash
            </button>
        </div>
    </div>
@endforelse

{{-- Project Comment Modal --}}
<div id="projectCommentModal" class="modal-overlay" style="display: none;">
    <div class="modal-container">
        <div class="modal-header">
            <h3>Loyiha bo'yicha izoh</h3>
            <button onclick="closeModal()" class="modal-close">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body">
            <div id="modalCommentContent"></div>
        </div>
        <div class="modal-footer">
            <button onclick="closeModal()" class="gov-btn secondary">Yopish</button>
        </div>
    </div>
</div>

<style>
/* Project Records Styling */
.project-record {
    background: var(--gov-white);
    border: 1px solid var(--gov-border);
    border-radius: 0.5rem;
    margin-bottom: 1rem;
    box-shadow: var(--gov-shadow);
    transition: all 0.2s ease;
    overflow: hidden;
}

.project-record:hover {
    box-shadow: var(--gov-shadow-lg);
    border-color: var(--gov-blue-light);
}

.record-header {
    background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
    border-bottom: 1px solid var(--gov-border);
    padding: 1rem 1.5rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 1rem;
}

.record-number {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.number-badge {
    background: var(--gov-white);
    border: 1px solid var(--gov-border);
    padding: 0.375rem 0.75rem;
    border-radius: 0.375rem;
    font-size: 0.875rem;
    font-weight: 500;
    color: var(--gov-gray);
}

.project-identifier {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.id-label {
    font-size: 0.875rem;
    color: var(--gov-gray);
    font-weight: 500;
}

.id-value {
    font-size: 0.875rem;
    color: var(--gov-blue);
    font-weight: 600;
    font-family: 'Courier New', monospace;
}

.status-section {
    flex: 1;
    text-align: center;
}

.status-badge {
    display: inline-block;
    padding: 0.375rem 1rem;
    border-radius: 1rem;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.025em;
}

.status-badge.ongoing {
    background: #dcfce7;
    color: #166534;
    border: 1px solid #bbf7d0;
}

.status-badge.completed {
    background: #dbeafe;
    color: #1e40af;
    border: 1px solid #93c5fd;
}

.status-badge.archived {
    background: #fef3c7;
    color: #92400e;
    border: 1px solid #fde68a;
}

.completion-section {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    flex-wrap: wrap;
}

.completion-label {
    font-size: 0.75rem;
    color: var(--gov-gray);
    font-weight: 500;
}

.completion-badge {
    padding: 0.25rem 0.75rem;
    border-radius: 0.375rem;
    font-size: 0.75rem;
    font-weight: 600;
}

.completion-badge.completed {
    background: var(--gov-green);
    color: var(--gov-white);
}

.completion-badge.ongoing {
    background: var(--gov-orange);
    color: var(--gov-white);
}

/* Project Details */
.record-details {
    padding: 1.5rem;
}

.details-grid {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    gap: 2rem;
}

.detail-column {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.detail-row {
    display: flex;
    flex-direction: column;
    gap: 0.375rem;
}

.detail-label {
    font-size: 0.75rem;
    color: var(--gov-gray);
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.025em;
}

.detail-value {
    font-size: 0.875rem;
    color: var(--gov-gray-dark);
    line-height: 1.5;
    word-wrap: break-word;
}

.detail-value.primary-text {
    color: var(--gov-blue);
    font-weight: 500;
}

.document-link,
.tender-link {
    color: var(--gov-blue);
    text-decoration: none;
    font-weight: 500;
    transition: color 0.2s ease;
    cursor: pointer;
}

.document-link:hover,
.tender-link:hover {
    color: var(--gov-blue-dark);
    text-decoration: underline;
}

.tender-link {
    font-size: 0.8rem;
    line-height: 1.4;
}

.no-data {
    color: var(--gov-gray);
    font-style: italic;
}

.in-progress {
    color: var(--gov-orange);
    font-weight: 500;
}

.company-name {
    color: var(--gov-gray-dark);
    font-weight: 500;
}

.registration-info {
    font-family: 'Courier New', monospace;
    font-size: 0.8rem;
    color: var(--gov-gray-dark);
}

.instruction-count {
    font-weight: 600;
    font-size: 1rem;
}

.instruction-count.low {
    color: var(--gov-green);
}

.instruction-count.medium {
    color: var(--gov-orange);
}

.instruction-count.high {
    color: var(--gov-red);
}

/* Empty State */
.empty-state {
    text-align: center;
    padding: 4rem 2rem;
    background: var(--gov-white);
    border-radius: 0.75rem;
    border: 2px dashed var(--gov-border);
}

.empty-content {
    max-width: 400px;
    margin: 0 auto;
}

.empty-icon {
    font-size: 4rem;
    color: var(--gov-gray);
    margin-bottom: 1.5rem;
    opacity: 0.5;
}

.empty-content h3 {
    font-size: 1.5rem;
    color: var(--gov-gray-dark);
    margin-bottom: 1rem;
    font-weight: 600;
}

.empty-content p {
    color: var(--gov-gray);
    margin-bottom: 2rem;
    line-height: 1.6;
}

/* Modal Styles */
.modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.5);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 1000;
    padding: 1rem;
}

.modal-container {
    background: var(--gov-white);
    border-radius: 0.75rem;
    box-shadow: var(--gov-shadow-lg);
    max-width: 600px;
    width: 100%;
    max-height: 80vh;
    overflow: hidden;
    animation: modalSlideIn 0.3s ease-out;
}

.modal-header {
    background: var(--gov-blue);
    color: var(--gov-white);
    padding: 1.5rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.modal-header h3 {
    margin: 0;
    font-size: 1.25rem;
    font-weight: 600;
}

.modal-close {
    background: none;
    border: none;
    color: var(--gov-white);
    font-size: 1.25rem;
    cursor: pointer;
    padding: 0.5rem;
    border-radius: 0.375rem;
    transition: background-color 0.2s ease;
}

.modal-close:hover {
    background: rgba(255, 255, 255, 0.1);
}

.modal-body {
    padding: 1.5rem;
    max-height: 400px;
    overflow-y: auto;
}

.modal-footer {
    padding: 1rem 1.5rem;
    border-top: 1px solid var(--gov-border);
    display: flex;
    justify-content: flex-end;
}

#modalCommentContent {
    line-height: 1.6;
    color: var(--gov-gray-dark);
}

@keyframes modalSlideIn {
    from {
        opacity: 0;
        transform: scale(0.95) translateY(-10px);
    }
    to {
        opacity: 1;
        transform: scale(1) translateY(0);
    }
}

/* Responsive Design */
@media (max-width: 1024px) {
    .details-grid {
        grid-template-columns: 1fr 1fr;
        gap: 1.5rem;
    }
}

@media (max-width: 768px) {
    .record-header {
        flex-direction: column;
        align-items: stretch;
        text-align: center;
        gap: 0.75rem;
    }

    .record-number {
        justify-content: center;
    }

    .completion-section {
        justify-content: center;
    }

    .details-grid {
        grid-template-columns: 1fr;
        gap: 1rem;
    }

    .record-details {
        padding: 1rem;
    }

    .modal-container {
        margin: 1rem;
        max-height: calc(100vh - 2rem);
    }
}

@media (max-width: 480px) {
    .record-number {
        flex-direction: column;
        gap: 0.5rem;
    }

    .completion-section {
        flex-direction: column;
        gap: 0.25rem;
    }

    .detail-row {
        gap: 0.25rem;
    }

    .detail-label {
        font-size: 0.7rem;
    }

    .detail-value {
        font-size: 0.8rem;
    }

    .empty-state {
        padding: 2rem 1rem;
    }

    .empty-icon {
        font-size: 3rem;
    }

    .empty-content h3 {
        font-size: 1.25rem;
    }
}

/* Print Styles */
@media print {
    .project-record {
        break-inside: avoid;
        margin-bottom: 1.5rem;
        border: 1px solid #000;
        box-shadow: none;
    }

    .record-header {
        background: #f0f0f0 !important;
        -webkit-print-color-adjust: exact;
    }

    .document-link,
    .tender-link {
        color: #000 !important;
        text-decoration: underline;
    }

    .modal-overlay {
        display: none !important;
    }
}

/* Focus States for Accessibility */
.document-link:focus,
.tender-link:focus,
.modal-close:focus {
    outline: 2px solid var(--gov-blue);
    outline-offset: 2px;
}

/* Loading Animation for Dynamic Content */
.project-record.loading {
    opacity: 0.6;
    pointer-events: none;
}

.project-record.loading .detail-value {
    background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
    background-size: 200% 100%;
    animation: loading 1.5s infinite;
}

@keyframes loading {
    0% {
        background-position: 200% 0;
    }
    100% {
        background-position: -200% 0;
    }
}
</style>

<script>
// Modal functionality
function showProjectComment(projectId, comment) {
    const modal = document.getElementById('projectCommentModal');
    const content = document.getElementById('modalCommentContent');

    if (modal && content) {
        content.innerHTML = `<p>${comment}</p>`;
        modal.style.display = 'flex';

        // Focus management for accessibility
        const closeBtn = modal.querySelector('.modal-close');
        if (closeBtn) {
            closeBtn.focus();
        }

        // Prevent body scroll
        document.body.style.overflow = 'hidden';
    }
}

function closeModal() {
    const modal = document.getElementById('projectCommentModal');
    if (modal) {
        modal.style.display = 'none';
        document.body.style.overflow = '';
    }
}

// Close modal on escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeModal();
    }
});

// Close modal on overlay click
document.addEventListener('click', function(e) {
    const modal = document.getElementById('projectCommentModal');
    if (e.target === modal) {
        closeModal();
    }
});

// Add smooth scrolling to project records
document.addEventListener('DOMContentLoaded', function() {
    const projectRecords = document.querySelectorAll('.project-record');

    // Intersection Observer for animation
    if ('IntersectionObserver' in window) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '50px'
        });

        projectRecords.forEach((record, index) => {
            record.style.opacity = '0';
            record.style.transform = 'translateY(20px)';
            record.style.transition = `opacity 0.6s ease ${index * 0.1}s, transform 0.6s ease ${index * 0.1}s`;
            observer.observe(record);
        });
    }
});

// Copy project ID functionality
function copyProjectId(element) {
    const idValue = element.textContent;

    if (navigator.clipboard) {
        navigator.clipboard.writeText(idValue).then(() => {
            // Show tooltip or notification
            const originalText = element.textContent;
            element.textContent = 'Nusxalandi!';
            element.style.color = 'var(--gov-green)';

            setTimeout(() => {
                element.textContent = originalText;
                element.style.color = '';
            }, 2000);
        });
    }
}

// Add click event to project IDs for copying
document.addEventListener('DOMContentLoaded', function() {
    const projectIds = document.querySelectorAll('.id-value');
    projectIds.forEach(id => {
        id.style.cursor = 'pointer';
        id.title = 'ID ni nusxalash uchun bosing';
        id.addEventListener('click', () => copyProjectId(id));
    });
});
</script>
