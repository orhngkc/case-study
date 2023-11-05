<!doctype html> 
<html lang="en"> 
    <head> 
        <meta charset="utf-8"> 
        <meta name="viewport" content="width=device-width,initial-scale=1">

        <title>Task Organizer</title>
        
        <link rel="stylesheet" href="https://preview.keenthemes.com/html/keen/docs/assets/plugins/custom/datatables/datatables.bundle.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://preview.keenthemes.com/html/keen/docs/assets/css/style.bundle.css">

        <style> .bd-placeholder-img { font-size: 1.125rem; text-anchor: middle; -webkit-user-select: none; -moz-user-select:
            none; user-select: none; } @media (min-width: 768px) { .bd-placeholder-img-lg { font-size: 3.5rem; } } html,
            body { overflow-x: hidden; /* Prevent scroll on narrow devices */ } body { padding-top: 20px; } @media
            (max-width: 767.98px) { .offcanvas-collapse { position: fixed; top: 56px; /* Height of navbar */ bottom: 0;
            width: 100%; padding-right: 1rem; padding-left: 1rem; overflow-y: auto; background-color: var(--gray-dark);
            transition: -webkit-transform .3s ease-in-out; transition: transform .3s ease-in-out; transition: transform .3s
            ease-in-out, -webkit-transform .3s ease-in-out; -webkit-transform: translateX(100%); transform:
            translateX(100%); } .offcanvas-collapse.open { -webkit-transform: translateX(-1rem); transform:
            translateX(-1rem); /* Account for horizontal padding on navbar */ } } .nav-scroller { position: relative;
            z-index: 2; height: 2.75rem; overflow-y: hidden; } .nav-scroller .nav { display: -webkit-box; display:
            -ms-flexbox; display: flex; -ms-flex-wrap: nowrap; flex-wrap: nowrap; padding-bottom: 1rem; margin-top: -1px;
            overflow-x: auto; color: rgba(255, 255, 255, .75); text-align: center; white-space: nowrap;
            -webkit-overflow-scrolling: touch; } .nav-underline .nav-link { padding-top: .75rem; padding-bottom: .75rem;
            font-size: .875rem; color: var(--secondary); } .nav-underline .nav-link:hover { color: var(--blue); }
            .nav-underline .active { font-weight: 500; color: var(--gray-dark); } .text-white-50 { color: rgba(255, 255,
            255, .5); } .bg-purple { background-color: var(--purple); } .border-bottom { border-bottom: 1px solid #e5e5e5; }
            .box-shadow { box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05); } .lh-100 { line-height: 1; } .lh-125 {
            line-height: 1.25; } .lh-150 { line-height: 1.5; } .text-white {color:white!important} </style>
    </head>

    @php 
        $totalDifficulty = $totalDuration = $totalCount = 0;
        foreach ($tasks as $task) {   
            $totalDifficulty += $task['difficulty'];
            $totalDuration   += $task['duration'];
            $totalCount      += 1;
        }
    @endphp

    <body class="bg-light">
        <main class="container">
            <div class="d-flex align-items-center p-3 my-1 text-white bg-purple rounded shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor"
                    class="bi bi-calendar-check mr-4" viewBox="0 0 16 16">
                    <path
                        d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                    <path
                        d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                </svg>
                <div class="lh-1">
                    <h1 class="h3 mb-0 text-white lh-1">Task Organizer</h1>
                    <small>Orhan Gökçe</small>
                </div>
            </div>

            <div class="row mt-1">
                <div class="col-4">
                    <div class="d-flex align-items-center p-3 my-2 text-white bg-purple rounded shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor"
                            class="bi bi-card-checklist mr-4" viewBox="0 0 16 16">
                            <path
                                d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                            <path
                                d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0zM7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z" />
                        </svg>
                        <div class="lh-1">
                            <h1 class="h3 mb-0 text-white lh-1">{{$totalCount}}</h1>
                            <small>Task Count</small>
                        </div>
                    </div>
                </div>

                <div class="col-4">
                    <div class="d-flex align-items-center p-3 my-2 text-white bg-purple rounded shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48 " fill="currentColor"
                            class="bi bi-exclamation-circle mr-4" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path
                                d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z" />
                        </svg>
                        <div class="lh-1">
                            <h1 class="h3 mb-0 text-white lh-1">{{$totalDifficulty}}x</h1>
                            <small>Total Difficulty</small>
                        </div>
                    </div>
                </div>

                <div class="col-4">
                    <div class="d-flex align-items-center p-3 my-2 text-white bg-purple rounded shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor"
                            class="bi bi-clock mr-4" viewBox="0 0 16 16">
                            <path
                                d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z" />
                        </svg>
                        <div class="lh-1">
                            <h1 class="h3 mb-0 text-white lh-1">{{$totalDuration}}h</h1>
                            <small>Total Duration</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex align-items-center justify-content-center p-3 my-1 text-white bg-purple rounded shadow-sm">
                <div class="lh-1">
                    <h1 class="h5 mb-0 text-white lh-1">The sprint will be completed in <b
                            class="text-bolder">{{$sprint}}</b> weeks/sprints</h1>
                </div>
            </div>

            <div class="my-3 p-3 bg-body rounded shadow-sm">
                <h6 class="border-bottom h-3 pb-2 mb-0 d-flex justify-content-center">Developers / Task
                    Distributions</h6>
                <div class="d-flex text-muted pt-3">
                    <div class="pb-3 mb-0 small lh-sm border-bottom w-100">

                        <table id="kt_datatable_horizontal_scroll"
                            class="table table-striped table-row-bordered gy-5 gs-7">
                            <thead>
                                <tr class="fw-semibold fs-6 text-gray-800">

                                    <th> Developer </th>
                                    <th>Task Name</th>
                                    <th>Data Store</th>
                                    <th>Difficulty</th>
                                    <th>Duration</th>
                                    <th>Sprint Numb</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($developers as $developer)
                                @foreach ($developer['sprints'] as $sprintNum => $sprints)
                                @foreach ($sprints as $sprint)
                                <tr>
                                    @php $taskInfo = explode('-', $sprint['task_id']); @endphp
                                    <td>{{$developer['name']}}</td>
                                    <td>{{reset($taskInfo)}}</td>
                                    <td>{{end($taskInfo)}}</td>
                                    <td>{{$sprint['difficulty']}}x</td>
                                    <td>{{$sprint['duration']}}h</td>
                                    <td>{{$sprintNum}}</td>
                                </tr>
                                @endforeach
                                @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>


        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script
            src="https://preview.keenthemes.com/html/keen/docs/assets/plugins/custom/datatables/datatables.bundle.js">
        </script>
        <script>
            $("#kt_datatable_horizontal_scroll").DataTable({});
        </script>
    </body>
</html>