@extends('layout.logreg')

@section('title')
    <title>{{ $title }} | SPDTK</title>
@endsection

@section('content')

        <div class="content-wrapper container">

            <div class="page-heading d-flex align-items-center">
                <span class="fw-bold fs-4">{{ $title }}</span><span
                    class="fw-bold ms-2">{{ $subtitle }}</span>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-8">
                        <div class="card">
                            <div class="row">
                                <div class="d-flex align-items-center justify-content-around">
                                    <div id="myDiagramDiv" style="border: solid 1px black; width:100%; height:330px"></div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Selamat datang di SIPATUBA</h4>
                            </div>
                            <div class="card-body">
                                {{-- content --}}
                                <p>Sipatuba adalah aplikasi yang dibuat untuk diagnosa gangguan tumbuh kembang pada
                                    balita.</p>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Informasi Tumbuh Kembang</h4>
                            </div>
                            <div class="card-body">
                                {{-- content --}}
                                <p>Untuk melihat informasi tumbuh kembang pada balita, klik <a
                                        href="{{ route('tumbuh-kembang.index') }}">link tautan dibawah ini.</a></p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

        </div>
    @endsection

    @push('scripts')
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
    @endpush