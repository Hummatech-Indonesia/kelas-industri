@if (auth()->user()->roles->pluck('name')[0] == 'student')
    @foreach ($materialInfos as $index => $material)
        @php
            $totalMaterialSubmitAssigment = 0;
            $submaterialIds = $material['material']->subMaterials->pluck('id')->toArray();
        @endphp
        <div data-kt-menu-trigger="click"
            class="menu-item menu-accordion px-2 {{ in_array($submaterial->id, $submaterialIds) ? 'show' : '' }}">
            @if ($material['isFirst'] == true)
                <span class="menu-link">
                    <span class="menu-icon"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-8.69-6.44-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                        </svg>
                    </span>
                    <span class="menu-title">{{ $material['material']->title }}</span>
                    <span
                        id="total_material_assignment_{{ $material['material']->id }}">{{ $totalMaterialSubmitAssigment }}</span>
                    <span>/</span>
                    <span>{{ count($material['material']->subMaterials) }}</span>
                    <span class="menu-arrow"></span>
                </span>
            @else
                @if (
                    $material['complateExamPreTest'] &&
                        $material['complateExamPosTest'] &&
                        $material['material']->materialExam->studentMaterialExam)
                    <span class="menu-link">
                        <span class="menu-icon"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-8.69-6.44-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                            </svg>
                        </span>
                        <span class="menu-title">{{ $material['material']->title }}</span>
                        <span
                            id="total_material_assignment_{{ $material['material']->id }}">{{ $totalMaterialSubmitAssigment }}</span>
                        <span>/</span>
                        <span>{{ count($material['material']->subMaterials) }}</span>
                        <span class="menu-arrow"></span>
                    </span>
                @else
                    <span class="menu-link" style="color: gray; pointer-events: none">
                        <span class="menu-icon"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-8.69-6.44-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                            </svg>
                        </span>
                        <span class="menu-title">{{ $material['material']->title }}</span>
                        <span
                            id="total_material_assignment_{{ $material['material']->id }}">{{ $totalMaterialSubmitAssigment }}</span>
                        <span>/</span>
                        <span>{{ count($material['material']->subMaterials) }}</span>
                        <span class="menu-arrow"></span>
                    </span>
                @endif
            @endif
            <!--begin:Menu link-->

            <!--end:Menu link-->
            <!--begin:Menu sub-->
            @foreach ($subMaterialsInfo as $subMaterials)
                @if ($material['material']->id == $subMaterials['subMaterial']->material_id)
                    @php
                        $answerAssignments = App\Models\SubmitAssignment::whereRelation(
                            'assignment',
                            'sub_material_id',
                            $subMaterials['subMaterial']->id,
                        )
                            ->where('student_id', auth()->user()->id)
                            ->get();
                    @endphp
                    <div class="menu-sub menu-sub-accordion">
                        @if ($subMaterials['isFirst'] == true)
                            <!--begin:Menu item-->
                            <div class="menu-item menu-accordion {{ request()->submaterial->id == $subMaterials['subMaterial']->id ? 'here show' : '' }}"
                                data-kt-menu-trigger="click">
                                <!--begin:Menu link-->
                                <a role="link" class="menu-link"
                                    style="@if (count($subMaterials['subMaterial']->assignments) != $totalMaterialSubmitAssigment && $index > 0) pointer-events: none; @endif">
                                    <span class="menu-bullet">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                        </svg>
                                    </span>
                                    <span
                                        @if (auth()->user()->hasRole('student')) onclick="changeMaterial('{{ route('student.showDocument', [$subMaterials['subMaterial']->id, 'student']) }}')"
                                                                                @else
                                                                                    onclick="changeMaterial('{{ route('student.showDocument', [$subMaterials['subMaterial']->id, 'student']) }}')" @endif
                                        class="menu-title">{{ $subMaterials['subMaterial']->title }}</span>
                                    @if (count($subMaterials['subMaterial']->assignments) == count($answerAssignments))
                                        @php $totalMaterialSubmitAssigment++ @endphp
                                    @endif
                                    @if (auth()->user()->roles->pluck('name')[0] == 'student')
                                        <span>{{ count($answerAssignments) }}</span>
                                        <span>/</span>
                                        <span>{{ count($subMaterials['subMaterial']->assignments) }}</span>
                                    @endif
                                    <span class="menu-arrow"></span>
                                </a>

                                <!--begin::Menu sub-->
                                <div
                                    class="menu-sub menu-sub-accordion {{ request()->submaterial->id == $subMaterials['subMaterial']->id ? 'here show' : '' }} pt-3">
                                    @foreach ($subMaterials['subMaterial']->assignments as $assigment)
                                        @php
                                            array_push($assigments, $assigment);
                                        @endphp
                                        <!--begin::Menu item-->
                                        <div class="menu-item">
                                            <a @if ($assigment->sub_material_id != $submaterial->id) href="{{ route('student.showDocument', [$assigment->sub_material_id, 'student']) }}#assigment_{{ $assigment->id }}"
                                                                                @else href="#assigment_{{ $assigment->id }}" @endif
                                                id="assigment_link_{{ $assigment->id }}"
                                                class="menu-link assigment-link py-3">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                @if (auth()->user()->roles->pluck('name')[0] == 'student')
                                                    @if ($assigment->StudentSubmitAssignment->where('student_id', auth()->user()->id)->where('assignment_id', $assigment->id)->first())
                                                        @if ($assigment->StudentSubmitAssignment->where('student_id', auth()->user()->id)->where('assignment_id', $assigment->id)->first()->point)
                                                            <span
                                                                class="sub-assigment-link menu-title text-warning">{{ $assigment->title }}</span>
                                                            <span class="warning"></span>
                                                        @else
                                                            <span
                                                                class="sub-assigment-link menu-title text-success">{{ $assigment->title }}</span>
                                                            <span class="success"></span>
                                                        @endif
                                                    @else
                                                        <span
                                                            class="sub-assigment-link menu-title text-danger">{{ $assigment->title }}</span>
                                                        <span class="erorr"></span>
                                                    @endif
                                                @else
                                                    <span class="menu-title">{{ $assigment->title }}</span>
                                                @endif
                                            </a>
                                        </div>
                                        <!--end::Menu item-->
                                    @endforeach
                                </div>
                                <!--end::Menu sub-->
                            </div>
                        @elseif ($subMaterials['isFirst'] == false)
                            @if (auth()->user()->roles->pluck('name')[0] != 'student')
                                <!--begin:Menu item-->
                                <div class="menu-item menu-accordion {{ request()->submaterial->id == $subMaterials['subMaterial']->id ? 'here show' : '' }}"
                                    data-kt-menu-trigger="click">
                                    <!--begin:Menu link-->
                                    <a role="link" class="menu-link"
                                        style="@if (count($subMaterials['subMaterial']->assignments) != $totalMaterialSubmitAssigment && $index > 0) pointer-events: none; @endif">
                                        <span class="menu-bullet">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                            </svg>
                                        </span>
                                        <span
                                            @if (auth()->user()->hasRole('student')) onclick="changeMaterial('{{ route('student.showDocument', [$subMaterials['subMaterial']->id, 'student']) }}')"
                                                                            @else
                                                                                onclick="changeMaterial('{{ route('student.showDocument', [$subMaterials['subMaterial']->id, 'student']) }}')" @endif
                                            class="menu-title">{{ $subMaterials['subMaterial']->title }}</span>
                                        @if (count($subMaterials['subMaterial']->assignments) == count($answerAssignments))
                                            @php $totalMaterialSubmitAssigment++ @endphp
                                        @endif
                                        @if (auth()->user()->role == 'student')
                                            <span>{{ count($answerAssignments) }}</span>
                                            <span>/</span>
                                            <span>{{ count($subMaterials['subMaterial']->assignments) }}</span>
                                        @endif
                                        <span class="menu-arrow"></span>
                                    </a>

                                    <!--begin::Menu sub-->
                                    <div
                                        class="menu-sub menu-sub-accordion {{ request()->submaterial->id == $subMaterials['subMaterial']->id ? 'here show' : '' }} pt-3">
                                        @foreach ($subMaterials['subMaterial']->assignments as $assigment)
                                            @php
                                                array_push($assigments, $assigment);
                                            @endphp
                                            <!--begin::Menu item-->
                                            <div class="menu-item">
                                                <a @if ($assigment->sub_material_id != $submaterial->id) href="{{ route('student.showDocument', [$assigment->sub_material_id, 'student']) }}#assigment_{{ $assigment->id }}"
                                                                                        @else href="#assigment_{{ $assigment->id }}" @endif
                                                    id="assigment_link_{{ $assigment->id }}"
                                                    class="menu-link assigment-link py-3">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    @if (auth()->user()->role == 'student')
                                                        @if ($assigment->StudentSubmitAssignment->where('student_id', auth()->user()->id)->where('assignment_id', $assigment->id)->first())
                                                            @if ($assigment->StudentSubmitAssignment->where('student_id', auth()->user()->id)->where('assignment_id', $assigment->id)->first()->point)
                                                                <span
                                                                    class="sub-assigment-link menu-title text-warning">{{ $assigment->title }}</span>
                                                                <span class="warning"></span>
                                                            @else
                                                                <span
                                                                    class="sub-assigment-link menu-title text-success">{{ $assigment->title }}</span>
                                                                <span class="success"></span>
                                                            @endif
                                                        @else
                                                            <span
                                                                class="sub-assigment-link menu-title text-danger">{{ $assigment->title }}</span>
                                                            <span class="erorr"></span>
                                                        @endif
                                                    @else
                                                        <span class="menu-title">{{ $assigment->title }}</span>
                                                    @endif
                                                </a>
                                            </div>
                                            <!--end::Menu item-->
                                        @endforeach
                                    </div>
                                    <!--end::Menu sub-->
                                </div>
                            @elseif (
                                $subMaterials['countAssignment'] == $subMaterials['countStudentAssignment'] &&
                                    $subMaterials['completedSubMaterial']
                            )
                                <div class="menu-item menu-accordion {{ request()->submaterial->id == $subMaterials['subMaterial']->id ? 'here show' : '' }}"
                                    data-kt-menu-trigger="click">
                                    <!--begin:Menu link-->
                                    <a role="link" class="menu-link"
                                        href="{{ route('student.showDocument', [$subMaterials['subMaterial']->id, 'student']) }}">
                                        <span class="menu-bullet">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="w-3 h-3">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                            </svg>
                                        </span>
                                        <span
                                            onclick="changeMaterial('{{ route('student.showDocument', [$subMaterials['subMaterial']->id, 'student']) }}')"
                                            class="menu-title">{{ $subMaterials['subMaterial']->title }}</span>
                                        @if (count($subMaterials['subMaterial']->assignments) == count($answerAssignments))
                                            @php $totalMaterialSubmitAssigment++ @endphp
                                        @endif
                                        <span>{{ count($answerAssignments) }}</span>
                                        <span>/</span>
                                        <span>{{ count($subMaterials['subMaterial']->assignments) }}</span>
                                        <span class="menu-arrow"></span>
                                        <span class="arrow"></span>
                                    </a>

                                    <!--begin::Menu sub-->
                                    <div
                                        class="menu-sub menu-sub-accordion {{ request()->submaterial->id == $subMaterials['subMaterial']->id ? 'show' : '' }} pt-3">
                                        {{-- {{dd($subMaterials['subMaterial']->assignments)}} --}}
                                        @foreach ($subMaterials['subMaterial']->assignments as $assigment)
                                            <!--begin::Menu item-->
                                            <div class="menu-item">
                                                <a @if ($assigment->sub_material_id != $submaterial->id) href="{{ route('student.showDocument', [$assigment->sub_material_id, 'student']) }}#assigment_{{ $assigment->id }}"
                                                                                        @else href="#assigment_{{ $assigment->id }}" @endif
                                                    class="menu-link py-3">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    @if ($assigment->StudentSubmitAssignment->where('student_id', auth()->user()->id)->where('assignment_id', $assigment->id)->first())
                                                        @if ($assigment->StudentSubmitAssignment->where('student_id', auth()->user()->id)->where('assignment_id', $assigment->id)->first()->point)
                                                            <span
                                                                class="sub-assigment-link menu-title text-warning">{{ $assigment->title }}</span>
                                                            <span class="warning"></span>
                                                        @else
                                                            <span
                                                                class="sub-assigment-link menu-title text-success">{{ $assigment->title }}</span>
                                                            <span class="success"></span>
                                                        @endif
                                                    @else
                                                        <span
                                                            class="sub-assigment-link menu-title text-danger">{{ $assigment->title }}</span>
                                                        <span class="erorr"></span>
                                                    @endif
                                                </a>
                                            </div>
                                            <!--end::Menu item-->
                                        @endforeach
                                    </div>
                                    <!--end::Menu sub-->
                                </div>
                            @else
                                <div
                                    class="menu-item {{ request()->submaterial->id == $subMaterials['subMaterial']->id ? 'here' : '' }}">
                                    <!--begin:Menu link-->
                                    <a role="link" class="menu-link" style="color: gray; pointer-events: none">
                                        <span class="menu-bullet">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="w-3 h-3">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                            </svg>
                                        </span>
                                        <span class="menu-title"
                                            style="color:gray">{{ $subMaterials['subMaterial']->title }}</span>
                                        @if (count($subMaterials['subMaterial']->assignments) == count($answerAssignments))
                                            @php $totalMaterialSubmitAssigment++ @endphp
                                        @endif
                                        <span>{{ count($answerAssignments) }}</span>
                                        <span>/</span>
                                        <span>{{ count($subMaterials['subMaterial']->assignments) }}</span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                </div>
                            @endif
                            <!--end:Menu link-->
                        @endif
                        <!--end:Menu item-->
                    </div>
                @endif
                <!--end:Menu sub-->
            @endforeach
            <script>
                document.getElementById("total_material_assignment_{{ $material['material']->id }}").innerText =
                    "{{ $totalMaterialSubmitAssigment }}";
            </script>
        </div>
    @endforeach
    {{-- @dd($subMaterialsInfo) --}}

    {{-- Role Teacher --}}
@else
    {{-- @dd($materials) --}}
    @foreach ($materials as $index => $material)
        <div data-kt-menu-trigger="click"
            class="menu-item menu-accordion px-2 {{ $material->subMaterials->where('id', request()->submaterial->id)->first() ? 'here show' : '' }}">
            <span class="menu-link">
                <span class="menu-icon"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-8.69-6.44-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                    </svg>
                </span>
                <span class="menu-title">{{ $material->title }}</span>
                <span class="menu-arrow"></span>
            </span>
            <!--begin:Menu link-->

            <!--end:Menu link-->
            <!--begin:Menu sub-->
            @foreach ($material->subMaterials as $subMaterial)
                @if ($material->id == $subMaterial->material_id)
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item menu-accordion {{ request()->submaterial->id == $subMaterial->id ? 'here show' : '' }}"
                            data-kt-menu-trigger="click">
                            <!--begin:Menu link-->
                            <a role="link" class="menu-link">
                                <span class="menu-bullet">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                    </svg>
                                </span>
                                <span
                                    onclick="changeMaterial('{{ route('common.showDocument', ['submaterial' => $subMaterial->id, 'role' => auth()->user()->roles->pluck('name')[0], 'classroom' => request()->classroom]) }}')"
                                    class="menu-title">{{ $subMaterial->title }}</span>
                                {{-- <span class="menu-arrow"></span> --}}
                            </a>
                        </div>
                        <!--end:Menu item-->
                    </div>
                @endif
                <!--end:Menu sub-->
            @endforeach
        </div>
    @endforeach
@endif
