@extends('template.base')

@section('title') CapHum | Áreas @stop

@section('current_section')
    <img src="{{asset('images/iconos/generales/SVG_CUPET_Btn_On_RRHH.svg')}}" width="40" height="40" style="position:absolute;margin-left: -70px;margin-top: 0px;">
@stop

@section('menuh')
    <div class="mh">
        <a href="{{url('/caphum/areas')}}" class="active-link-sidebar f"><div class="mark"></div>Áreas</a>
    </div>
@stop

@section('content')
<div class="container" style="margin-top: 2%;">
        <h3 style="font-weight: bold;color: #006837;">Organización de las Áreas</h3>
        
        <div id="headerInlineEditContent">
            <div class="header-inline-edit">
                {{--Left Side--}}
                <a href="#" id="pdfExport" class="float-left text-light btnHover" data-icon="S_Btn_Acrobat" data-tooggle="tooltip" data-placement="top" title="Exportar PDF"><img
                        src="{{asset('images/iconos/config/S_Btn_Acrobat_StandBy.svg')}}" alt="" height="30" width="30"></a>
                <a href="#" id="wordExport" class="float-left text-light btnHover" data-icon="S_Btn_Word" data-tooggle="tooltip" data-placement="top" title="Exportar WORD">
                    <img src="{{asset('images/iconos/config/S_Btn_Word_StandBy.svg')}}" alt="" height="30" width="30">
                </a>
                {{--Right Side--}}
                <div class="float-right">
                    <button id="saveBtn" disabled class="btn-accept float-sm-left" style="height:30px; background-color:#009e0f"></button>
                    <button id="cancelBtn" class="btn-cancel float-sm-left" style="height:30px;"></button>
                </div>
            
            </div>
        </div>
        
        <div class="box box-primary">
            <div class="box-body">
                <div id="graficoEntidad" style="background-color: #fff; height: 400px; margin-top:5px"></div>                
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('vendor/template/libs/gojs/go.js')}}"></script>
    <script src="{{asset('vendor/jspdf/jspdf.min.js')}}"></script>

    <script>
        function init() {
        var $ = go.GraphObject.make;  // for conciseness in defining templates

        myDiagram = $(go.Diagram, "graficoEntidad", // must be the ID or reference to div
            {
            initialContentAlignment: go.Spot.Center,
            maxSelectionCount: 100, // users can select only one part at a time
            validCycle: go.Diagram.CycleDestinationTree, // make sure users can only create trees
            "clickCreatingTool.archetypeNodeData": {}, // allow double-click in background to create a new node
            "clickCreatingTool.insertPart": function(loc) {  // customize the data for the new node
                this.archetypeNodeData = {
                key: getNextKey(), // assign the key based on the number of nodes
                name: "(Nueva Área)",
                title: "Tipo de Área"
                };
                return go.ClickCreatingTool.prototype.insertPart.call(this, loc);
            },
            layout:
                $(go.TreeLayout,
                {
                    treeStyle: go.TreeLayout.StyleLastParents,
                    arrangement: go.TreeLayout.ArrangementHorizontal,
                    // properties for most of the tree:
                    angle: 90,
                    layerSpacing: 35,
                    // properties for the "last parents":
                    alternateAngle: 90,
                    alternateLayerSpacing: 35,
                    alternateAlignment: go.TreeLayout.AlignmentBus,
                    alternateNodeSpacing: 20
                }),
            "undoManager.isEnabled": true // enable undo & redo
            });

        // when the document is modified, add a "*" to the title and enable the "Save" button
        myDiagram.addDiagramListener("Modified", function(e) {
            // console.log(e);
            var button = document.getElementById("saveBtn");
            if (button) button.disabled = !myDiagram.isModified;
            var idx = document.title.indexOf("*");
            if (myDiagram.isModified) {
                if (idx < 0) document.title += "*";
            } else {
                if (idx >= 0) document.title = document.title.substr(0, idx);
            }
        });

        // manage boss info manually when a node or link is deleted from the diagram
        myDiagram.addDiagramListener("SelectionDeleting", function(e) {
        var part = e.subject.first(); // e.subject is the myDiagram.selection collection,
                                        // so we'll get the first since we know we only have one selection
        myDiagram.startTransaction("clear boss");
        if (part instanceof go.Node) {
            var it = part.findTreeChildrenNodes(); // find all child nodes
            while(it.next()) { // now iterate through them and clear out the boss information
            var child = it.value;
            var bossText = child.findObject("boss"); // since the boss TextBlock is named, we can access it by name
            if (bossText === null) return;
            bossText.text = "";
            }
        } else if (part instanceof go.Link) {
            var child = part.toNode;
            var bossText = child.findObject("boss"); // since the boss TextBlock is named, we can access it by name
            if (bossText === null) return;
            bossText.text = "";
        }
        myDiagram.commitTransaction("clear boss");
        });

        var levelColors = ["#fe5d21", "#4fc8ab", "#389cfe","#389cfe","#389cfe","#389cfe","#389cfe"];

        // override TreeLayout.commitNodes to also modify the background brush based on the tree depth level
        myDiagram.layout.commitNodes = function() {
        go.TreeLayout.prototype.commitNodes.call(myDiagram.layout);  // do the standard behavior
        // then go through all of the vertexes and set their corresponding node's Shape.fill
        // to a brush dependent on the TreeVertex.level value
        myDiagram.layout.network.vertexes.each(function(v) {
            if (v.node) {
            var level = v.level % (levelColors.length);
            var color = levelColors[level];
            var shape = v.node.findObject("SHAPE");
            if (shape) shape.fill = $(go.Brush, "Linear", { 0: color, 1: go.Brush.lightenBy(color, 0.05), start: go.Spot.Left, end: go.Spot.Right });
            }
        });
        };

        // This function is used to find a suitable ID when modifying/creating nodes.
        // We used the counter combined with findNodeDataForKey to ensure uniqueness.
        function getNextKey() {
        var key = nodeIdCounter;
        while (myDiagram.model.findNodeDataForKey(key) !== null) {
            key = nodeIdCounter++;
        }
        return key;
        }

        var nodeIdCounter = 1; // use a sequence to guarantee key uniqueness as we add/remove/modify nodes

        // when a node is double-clicked, add a child to it
        function nodeDoubleClick(e, obj) {
            createHijo(obj);
        }

        function createHijo(obj){
            var clicked = obj.part;
        if (clicked !== null) {
            var thisemp = clicked.data;
            myDiagram.startTransaction("add employee");
            var newemp = { key: getNextKey(), name: "(Nueva área)", title: "tipo de área", parent: thisemp.key };
            myDiagram.model.addNodeData(newemp);
            myDiagram.commitTransaction("add employee");
        }
        }

        // this is used to determine feedback during drags
        function mayWorkFor(node1, node2) {
        if (!(node1 instanceof go.Node)) return false;  // must be a Node
        if (node1 === node2) return false;  // cannot work for yourself
        if (node2.isInTreeOf(node1)) return false;  // cannot work for someone who works for you
        return true;
        }

        // This function provides a common style for most of the TextBlocks.
        // Some of these values may be overridden in a particular TextBlock.
        function textStyle() {
        return { font: "9pt  Segoe UI,sans-serif", stroke: "white"};
        }
        function TitleStyle() {
        return { font: "9pt  Segoe UI,sans-serif", stroke: "black"};
        }

        // This converter is used by the Picture.
        function findHeadShot(key) {
        // if (key < 0 || key > 16) return "images/HSnopic.png"; // There are only 16 images on the server
        // return "images/HS" + key + ".png"
        }

        // define the Node template
        myDiagram.nodeTemplate =
        $(go.Node, "Auto",
            { doubleClick: nodeDoubleClick },
            { // handle dragging a Node onto a Node to (maybe) change the reporting relationship
            mouseDragEnter: function (e, node, prev) {
                var diagram = node.diagram;
                var selnode = diagram.selection.first();
                if (!mayWorkFor(selnode, node)) return;
                var shape = node.findObject("SHAPE");
                if (shape) {
                shape._prevFill = shape.fill;  // remember the original brush
                shape.fill = "darkred";
                }
            },
            mouseDragLeave: function (e, node, next) {
                var shape = node.findObject("SHAPE");
                if (shape && shape._prevFill) {
                shape.fill = shape._prevFill;  // restore the original brush
                }
            },
            mouseDrop: function (e, node) {
                var diagram = node.diagram;
                var selnode = diagram.selection.first();  // assume just one Node in selection
                if (mayWorkFor(selnode, node)) {
                // find any existing link into the selected node
                var link = selnode.findTreeParentLink();
                if (link !== null) {  // reconnect any existing link
                    link.fromNode = node;
                } else {  // else create a new link
                    diagram.toolManager.linkingTool.insertLink(node, node.port, selnode, selnode.port);
                }
                }
            }
            },
            // for sorting, have the Node.text be the data.name
            new go.Binding("text", "name"),
            // bind the Part.layerName to control the Node's layer depending on whether it isSelected
            new go.Binding("layerName", "isSelected", function(sel) { return sel ? "Foreground" : ""; }).ofObject(),
            // define the node's outer shape
            $(go.Shape, "Rectangle",
            {
                name: "SHAPE", fill: "white", stroke: null,
                // set the port properties:
                portId: "", fromLinkable: true, toLinkable: true, cursor: "pointer"
            }),
            $(go.Panel, "Horizontal",
          
            // define the panel where the text will appear
            $(go.Panel, "Table",
                {
                maxSize: new go.Size(150, 999),
                margin: new go.Margin(6, 10, 0, 10),
                defaultAlignment: go.Spot.Left
                },
                $(go.RowColumnDefinition, { column: 2, width: 4 }),
                $(go.TextBlock, TitleStyle(),  // the name
                {
                    row: 0, column: 0, columnSpan: 5,
                    font: "12pt Segoe UI,sans-serif",
                    editable: true, isMultiline: false,
                    minSize: new go.Size(10, 16)
                },
                new go.Binding("text", "name").makeTwoWay()),
                $(go.TextBlock, "Tipo: ", textStyle(),
                { row: 1, column: 0 }),
                $(go.TextBlock, textStyle(),
                {
                    row: 1, column: 1, columnSpan: 4,
                    editable: true, isMultiline: false,
                    minSize: new go.Size(10, 14),
                    margin: new go.Margin(0, 0, 0, 3)
                },
                new go.Binding("text", "title").makeTwoWay()),
                $(go.TextBlock, textStyle(),
                { row: 2, column: 0 },
                new go.Binding("text", "parent", function(v) {return "";})),
            )  // end Table Panel
            ) // end Horizontal Panel
        );  // end Node

        // define the Link template
        myDiagram.linkTemplate =
        $(go.Link, go.Link.Orthogonal,
            { corner: 5, relinkableFrom: true, relinkableTo: true },
            $(go.Shape, { strokeWidth: 4, stroke: "#00a4a4" }));  // the link shape

        // read in the JSON-format data from the "mySavedModel" element
        load();
    }

    // Show the diagram's model in JSON format
    function save() {
        let value = myDiagram.model.toJson();
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.post("/caphum/areas",{datos:value},function(data){;
                toastr.success('Estructura de la empresa actualizada correctamente');
            });
        myDiagram.isModified = false;
    }
    function load() {
        myDiagram.model = go.Model.fromJson(
            { 
                "class": "go.TreeModel",
                "nodeDataArray": {!!json_encode($datos)!!}
            }
        );
    }

    $('#saveBtn').click(function(){
        save();
    });

    $('#cancelBtn').click(function(){
        location.href='{{url('/caphum/areas')}}';
    });

    $('#pdfExport').click(function(){
        let div = document.getElementById('graficoEntidad');
        let canvas = div.getElementsByTagName('canvas')[0];
        // var ctx = canvas.toDataURL();
        // let data = canvas.toDataURL('image/jpeg').slice('data:image/jpeg;base64,'.length);
        let data =  myDiagram.makeImageData({
            size: new go.Size(1000,1000)
        });

        var doc = new jsPDF('p', 'pt', 'letter');
        // var elementHTML = '<img src="'+ctx+'">';
        doc.addImage(data, 'JPEG', 150, 50, 400, 500);
        
        doc.save('SIGI-Áreas.pdf');
    });

    init();

</script>

@endsection

