@extends('layout.main')

@section('title')
    <title>{{ $title }} | SPDTK</title>
@endsection

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>{{ $title }}</h3>
                    <p class="text-subtitle text-muted">{{ $subtitle }}</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">



                <div class="mt-4 ms-4 justify-content-end me-4 d-flex gap-4">
                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                        data-bs-target="#border-less">
                        Tambah Node
                    </button>
                    <!-- button trigger for  Vertically Centered modal -->
                    <button type="button" class="btn btn-outline-danger block" data-bs-toggle="modal"
                        data-bs-target="#exampleModalCenter">
                        Hapus Node
                    </button>
                </div>
                <!-- Vertically Centered modal Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                        role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Pilih node yang akan dihapus
                                </h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <form method="POST" id="deleteForm"
                                action="{{ route('pohon-keputusan.destroy', $node[0]->id) }}">
                                @csrf
                                @method('delete')
                                <div class="modal-body">
                                    <fieldset class="form-group">
                                        <select class="form-select" id="basicSelect"
                                            onchange="updateDeleteFormAction(this)">
                                            @foreach ($node as $item)
                                                <option value="{{ $item->id }}" @if ($item->id === 1) disabled @endif>{{ $item->text }}</option>
                                            @endforeach
                                        </select>
                                        <span><i class="text-danger">root (S) tidak dapat dihapus*</i></span>
                                    </fieldset>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                        <i class="bx bx-x d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Close</span>
                                    </button>
                                    <button type="submit" class="btn btn-danger ml-1" data-bs-dismiss="modal">
                                        <i class="bx bx-check d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Hapus</span>
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                <div class="modal fade text-left modal-borderless" id="border-less" tabindex="-1"
                    aria-labelledby="myModalLabel1" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header justify-content-end">
                                <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                                    aria-label="Tutup">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </button>
                            </div>
                            <div class="">
                                <h5 class="modal-title text-center">Input Node</h5>
                            </div>
                            <div class="modal-body" style="height: 600px">
                                <form action="{{ route('pohon-keputusan.store') }}" method="POST">
                                    @csrf
                                    <div class="mb-3 mt-3">
                                        <p>Nama Node</p>
                                        <select class="choices form-select" name="text">
                                            <option value="">Nama Node (Gejala/Penyakit)</option>
                                            @foreach ($gejala as $p)
                                                <option value="{{ $p->kode_gejala }}">
                                                    {{ $p->kode_gejala }} - {{ $p->nama_gejala }}
                                                </option>
                                            @endforeach
                                            @foreach ($penyakit as $p)
                                                <option value="{{ $p->kode }}">
                                                    {{ $p->kode }} - {{ $p->nama_penyakit }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <p>Parent</p>
                                        <select class="choices form-select" name="parent">
                                            <option value="">Parent</option>
                                            @foreach ($node as $p)
                                                <option value="{{ $p->id }}">
                                                    {{ $p->text }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <p>Pilihan</p>
                                        <select class="choices form-select" name="fill">
                                            <option value="">Ya / Tidak</option>
                                            <option value="#1EDA3B">Ya </option>
                                            <option value="#E40C0C">Tidak</option>
                                            <option value="#5CADFB">Root</option>
                                        </select>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-primary" data-bs-dismiss="modal">
                                    <i class="bx bx-x d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Tutup</span>
                                </button>
                                <button id="success" type="submit" class="btn btn-primary ml-1"
                                    data-bs-dismiss="modal">
                                    <i class="bx bx-check d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Simpan</span>
                                </button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="text-center">
                        <div id="myDiagramDiv" style="border: solid 1px black; width:100%; height:500px"></div>
                    </div>
                </div>
            </div>

        </section>
    </div>
@endsection

@push('scripts')

    <script>
        function updateDeleteFormAction(selectElement) {
            // Get the selected value (item ID) from the select element
            const selectedValue = selectElement.value;

            // Get the form element by ID
            const deleteForm = document.getElementById('deleteForm');

            // Update the form action with the selected value (item ID)
            deleteForm.action = "{{ route('pohon-keputusan.destroy', '') }}" + "/" + selectedValue;
        }
    </script>

    <script src="https://unpkg.com/gojs/release/go.js"></script>
    <script id="code">
        function init() {

            // Since 2.2 you can also author concise templates with method chaining instead of GraphObject.make
            // For details, see https://gojs.net/latest/intro/buildingObjects.html
            const $ = go.GraphObject.make; // for conciseness in defining templates

            myDiagram =
                $(go.Diagram, "myDiagramDiv", {
                    allowCopy: false,
                    allowDelete: false,
                    allowMove: false,
                    initialAutoScale: go.Diagram.Uniform,
                    layout: $(FlatTreeLayout, // custom Layout, defined below
                        {
                            angle: 90,
                            compaction: go.TreeLayout.CompactionNone,
                            arrangement: go.TreeLayout.ArrangementFixedRoots
                        }),
                    "undoManager.isEnabled": true
                });

            myDiagram.nodeTemplate =
                $(go.Node, "Vertical", {
                        selectionObjectName: "BODY"
                    },
                    $(go.Panel, "Auto", {
                            name: "BODY"
                        },
                        $(go.Shape, "Circle",
                            new go.Binding("fill"),
                            new go.Binding("stroke")),
                        $(go.TextBlock, {
                                font: "bold 12pt Arial, sans-serif",
                                margin: new go.Margin(4, 2, 2, 2)
                            },
                            new go.Binding("text"))
                    ),
                    $(go.Panel, // this is underneath the "BODY"
                        {
                            height: 17
                        }, // always this height, even if the TreeExpanderButton is not visible
                        $("TreeExpanderButton")
                    )
                );

            myDiagram.linkTemplate =
                $(go.Link,
                    $(go.Shape, {
                        strokeWidth: 1.5
                    }));

            // set up the nodeDataArray, describing each part of the sentence
            var nodeDataArray = {!! json_encode($nodeDataArray) !!};
            //   var nodeDataArray = [
            //     { key: 1, text: "Sentence", fill: "#f68c06", stroke: "#4d90fe" },
            //     { key: 2, text: "NP", fill: "#f68c06", stroke: "#4d90fe", parent: 1 },
            //   ];
            console.log(nodeDataArray);

            // create the Model with data for the tree, and assign to the Diagram
            myDiagram.model =
                new go.TreeModel({
                    nodeDataArray: nodeDataArray
                });

        }

        // Customize the TreeLayout to position all of the leaf nodes at the same vertical Y position.
        class FlatTreeLayout extends go.TreeLayout {
            // This assumes the TreeLayout.angle is 90 -- growing downward
            commitLayout() {
                super.commitLayout(); // call base method first
                // find maximum Y position of all Nodes
                var y = -Infinity;
                this.network.vertexes.each(v => y = Math.max(y, v.node.position.y));
                // move down all leaf nodes to that Y position, but keeping their X position
                this.network.vertexes.each(v => {
                    if (v.destinationEdges.count === 0) {
                        // shift the node down to Y
                        v.node.moveTo(v.node.position.x, y);
                        // extend the last segment vertically
                        v.node.toEndSegmentLength = Math.abs(v.centerY - y);
                    } else { // restore to normal value
                        v.node.toEndSegmentLength = 10;
                    }
                });
            }
        }
        // end FlatTreeLayout

        window.addEventListener('DOMContentLoaded', init);
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session()->has('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session('success') }}',
            })
        </script>
    @elseif ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: 'Data gagal disimpan!',
            })
        </script>
    @endif
@endpush
