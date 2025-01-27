@php
    $statusTitles = [
        '1_step' => 'Проекты на 1-м этапе',
        '2_step' => 'Проекты на 2-м этапе',
        'completed' => 'Завершенные проекты',
        'archive' => 'Архивированные проекты',
    ];

    // Group projects by status
    $groupedProjects = $projects->groupBy('status');
@endphp

@forelse($statusTitles as $statusKey => $statusTitle)
    @if (isset($groupedProjects[$statusKey]) && $groupedProjects[$statusKey]->count() > 0)
        <div class="status-group-container">
            <h2 class="status-heading">{{ $statusTitle }}</h2>
            <div class="status-group">
                @foreach ($groupedProjects[$statusKey] as $project)
                    <div class="project-item">
                        <div class="project-card"
                            style="{{ $project->status == 'archive' ? 'background-color: #f8d7da;' : '' }}">

                            @if (isset($statusTitles[$project->status]))
                                <div class="project-status-title">
                                    {{ $statusTitles[$project->status] }}
                                </div>
                            @endif

                            <div class="project-card-content">
                                <h3>{{ $project->district }}ский район</h3>

                                @if ($project->mahalla)
                                    <p><strong>Махалля:</strong> <span class="highlight">{{ $project->mahalla }}</span>
                                    </p>
                                @endif

                                @if ($project->land)
                                    <p><strong>Площадь:</strong> <span class="highlight">{{ $project->land }} га</span>
                                    </p>
                                @endif

                                @if ($project->srok_realizatsi)
                                    <p><strong>Срок реализации:</strong> <span
                                            class="highlight">{{ $project->srok_realizatsi }} месяцев</span></p>
                                @endif

                                <div class="project-stages">
                                    <p>
                                        <strong>Первый этап:</strong>
                                        {{ $project->start_date ? $project->start_date->format('d-m-Y') : 'Не указано' }}
                                        -
                                        {{ $project->end_date ? $project->end_date->format('d-m-Y') : 'Не указано' }}
                                    </p>

                                    <p>
                                        <strong>Второй этап:</strong>
                                        {{ $project->second_stage_start_date ? $project->second_stage_start_date->format('d-m-Y') : 'Не указано' }}
                                        -
                                        {{ $project->second_stage_end_date ? $project->second_stage_end_date->format('d-m-Y') : 'Не указано' }}
                                    </p>
                                </div>

                                <div class="project-links">
                                    @if ($project->elon_fayl)
                                        <a href="{{ asset('storage/' . $project->elon_fayl) }}" target="_blank"
                                            class="download-link">
                                            <i class="fas fa-file-download"></i> Объявление 1 этапа
                                        </a>
                                    @endif
                                    @if ($project->pratakol_fayl)
                                        <a href="{{ asset('storage/' . $project->pratakol_fayl) }}" target="_blank"
                                            class="download-link">
                                            <i class="fas fa-file-download"></i> Протокол 1 этапа
                                        </a>
                                    @endif

                                    @if ($project->status == 'archive' && $project->qoshimcha_fayl)
                                        <a href="{{ asset('storage/' . $project->qoshimcha_fayl) }}" target="_blank"
                                            class="download-link">
                                            <i class="fas fa-file-download"></i> Архивный файл
                                        </a>
                                    @endif


                                </div>

                                {{-- Show modal button only if comment is available --}}
                                @if (!empty($project->comment))
                                    <button
                                        class="btn btn-primary btn-sm d-flex align-items-center justify-content-center mt-2"
                                        data-bs-toggle="modal" data-bs-target="#projectModal{{ $project->id }}">
                                        <i class="fas fa-file-download"></i>
                                        <span>Результат отбора</span>
                                    </button>
                                @endif

                                @if (Route::has('bidding.show'))
                                    <a href="{{ route('bidding.show', $project->id) }}" class="details-btn">Далее</a>
                                @endif
                            </div>
                        </div>
                    </div>

                    {{-- Modal only if comment is present --}}
                    @if (!empty($project->comment))
                        <div class="modal fade mt-2" id="projectModal{{ $project->id }}" tabindex="-1"
                            aria-labelledby="projectModalLabel{{ $project->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="projectModalLabel{{ $project->id }}">Комментарий к
                                            проекту</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>{{ $project->comment }}</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Закрыть</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    @endif
@empty
    <p class="no-projects">Нет доступных проектов.</p>
@endforelse

<style>
    .status-group-container {
        margin-bottom: 40px;
    }

    .status-heading {
        font-size: 24px;
        font-weight: bold;
        color: #193d88;
        margin-bottom: 20px;
        border-bottom: 2px solid #193d88;
        padding-bottom: 5px;
    }

    .status-group {
        /* For card view, these styles will show a nice grid */
    }

    .project-item {
        margin-bottom: 20px;
    }

    .project-card {
        background: #fff;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        display: flex;
        flex-direction: column;
        position: relative;
        border: 1px solid #eaeaea;
    }

    .project-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 4px 14px rgba(0, 0, 0, 0.15);
    }

    .project-status-title {
        background: #193d88;
        color: #fff;
        padding: 5px 10px;
        font-weight: bold;
        font-size: 14px;
        position: absolute;
        top: 0;
        left: 0;
        border-bottom-right-radius: 10px;
    }

    .project-card-content {
        padding: 15px;
        margin-top: 30px;
        /* space for the status title */
    }

    .project-card-content h3 {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 10px;
        color: #193d88;
    }

    .project-card-content p {
        margin: 5px 0;
        line-height: 1.4;
    }

    .highlight {
        font-weight: bold;
        color: #193d88;
    }

    .project-stages p {
        margin: 5px 0;
        font-size: 14px;
    }

    .project-links {
        margin-top: 10px;
    }

    .project-links .download-link {
        display: inline-block;
        margin-right: 10px;
        text-decoration: none;
        color: #193d88;
        font-weight: bold;
        font-size: 14px;
        transition: color 0.2s ease;
    }

    .project-links .download-link:hover {
        color: #1454c4;
        text-decoration: underline;
    }

    .details-btn {
        display: inline-block;
        margin-top: 15px;
        padding: 8px 15px;
        color: #fff;
        background-color: #193d88;
        border-radius: 5px;
        text-decoration: none;
        font-weight: bold;
        font-size: 14px;
        transition: background-color 0.2s ease;
    }

    .details-btn:hover {
        background-color: #1454c4;
    }

    .no-projects {
        font-weight: bold;
        font-size: 18px;
        color: #999;
        margin-top: 20px;
        text-align: center;
    }

    /* Container transitions */
    .projects-container {
        transition: all 0.3s ease;
    }

    /* Card View Styles */
    .projects-container.card-view .status-group {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    .projects-container.card-view .project-item {
        width: 31%;
        box-sizing: border-box;
        text-align: left;
    }

    /* List View Styles */
    .projects-container.list-view .status-group {
        display: flex;
        flex-direction: column;
        gap: 20px;
        background: #f9f9f9;
        padding: 20px;
        border-radius: 10px;
    }

    .projects-container.list-view .status-heading {
        font-size: 26px;
        padding-bottom: 10px;
        border-bottom: 3px solid #193d88;
    }

    .projects-container.list-view .project-item {
        display: flex;
        flex-direction: column;
        width: 100%;
        font-size: 1.2em;
    }

    .projects-container.list-view .project-card {
        flex-direction: row;
        align-items: center;
        padding: 20px;
        position: relative;
        border: 1px solid #ddd;
    }

    .projects-container.list-view .project-status-title {
        position: relative;
        top: auto;
        left: auto;
        border-radius: 5px;
        margin-right: 20px;
        font-size: 16px;
    }

    .projects-container.list-view .project-card-content {
        flex: 1;
        margin-top: 0;
        padding: 0 20px;
    }

    .projects-container.list-view .project-card h3 {
        font-size: 22px;
        margin-bottom: 15px;
    }

    .projects-container.list-view .project-card p {
        font-size: 16px;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .projects-container.card-view .project-item {
            width: 100% !important;
        }

        .projects-container.list-view .project-card {
            flex-direction: column;
            align-items: flex-start;
        }

        .projects-container.list-view .project-status-title {
            margin-bottom: 10px;
        }

        .projects-container.list-view .project-card-content {
            width: 100%;
            padding: 0;
        }
    }
</style>
