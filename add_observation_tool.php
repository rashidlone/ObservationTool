

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Observation Software - Foundation World School</title>

  <?php include 'css.php'; ?>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
      
    <style>
        .builder-container {
            min-height: 500px;
            border: 2px dashed #ccc;
            padding: 20px;
            margin-bottom: 20px;
            background-color: #f9f9f9;
        }
        .section {
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 20px;
            position: relative;
        }
        .question {
            background-color: #f8f9fa;
            border: 1px solid #eee;
            border-radius: 4px;
            padding: 10px;
            margin-bottom: 10px;
            position: relative;
        }
        .question:hover {
            background-color: #e9ecef;
        }
        .section-title, .question-title {
            font-weight: bold;
            margin-bottom: 10px;
        }
        .section-actions, .question-actions {
            position: absolute;
            top: 5px;
            right: 5px;
        }
        .section-actions button, .question-actions button {
            padding: 0 5px;
            font-size: 12px;
            line-height: 1;
        }
        .drag-handle {
            cursor: move;
            margin-right: 5px;
        }
        .width-control {
            display: inline-block;
            width: 70px;
            margin-left: 10px;
        }
        .option-item {
            margin-bottom: 5px;
        }
        .option-actions {
            display: inline-block;
            margin-left: 10px;
        }
        .preview-question {
            margin-bottom: 20px;
        }
        .form-control {
            margin-bottom: 10px;
        }
        /* Scrollable modal */
        .modal-dialog.modal-lg.modal-dialog-scrollable {
            max-height: 90vh;
        }
        .modal-dialog.modal-lg.modal-dialog-scrollable .modal-content {
            max-height: 90vh;
        }
        .modal-dialog.modal-lg.modal-dialog-scrollable .modal-body {
            overflow-y: auto;
            max-height: calc(90vh - 150px);
        }
        .add-question-btn {
            margin-top: 10px;
        }
        .section-footer {
            margin-top: 10px;
            padding-top: 10px;
            border-top: 1px solid #eee;
        }
        .is-invalid {
            border-color: #dc3545;
        }
        .invalid-feedback {
            display: none;
            width: 100%;
            margin-top: .25rem;
            font-size: 80%;
            color: #dc3545;
        }
        .is-invalid ~ .invalid-feedback {
            display: block;
        }
    </style>
      
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
<!--  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>-->

<?php
    include 'navbar.php';
    include 'sidebar.php';
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Observations</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Add Observations</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Create Forms</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            
          </div>
        </div>
        <div class="card-body">

<!--here will be form body-->


    <div class="container mt-4">
        
        <div class="row">
            
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>Form Builder</span>
                        <button class="btn btn-primary " id="add-section">
                            <i class="fas fa-plus"></i> Add Section
                        </button>
                        <button class="btn btn-success" id="preview-form">
                            <i class="fas fa-eye"></i> Preview Form
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="builder-container" id="form-builder">
                            <!-- Sections and questions will be added here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Preview Modal -->
    <div class="modal fade" id="previewModal" tabindex="-1" role="dialog" aria-labelledby="previewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="previewModalLabel">Form Preview</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="preview-content">
                    <!-- Preview content will be inserted here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="create-form">Create</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Section Title Modal -->
    <div class="modal fade" id="sectionTitleModal" tabindex="-1" role="dialog" aria-labelledby="sectionTitleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="sectionTitleModalLabel">Section Title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="section-title-input">Section Title:</label>
                        <input type="text" class="form-control" id="section-title-input">
                    </div>
                    <div class="form-group">
                        <label for="section-description-input">Description (optional):</label>
                        <textarea class="form-control" id="section-description-input" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="save-section-title">Save</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Question Options Modal -->
    <div class="modal fade" id="questionOptionsModal" tabindex="-1" role="dialog" aria-labelledby="questionOptionsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="questionOptionsModalLabel">Question Options</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="question-label-input">Question Label:</label>
                        <input type="text" class="form-control" id="question-label-input">
                    </div>
                    <div class="form-group">
                        <label for="question-placeholder-input">Placeholder (optional):</label>
                        <input type="text" class="form-control" id="question-placeholder-input">
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="question-required-check">
                        <label class="form-check-label" for="question-required-check">Required</label>
                    </div>
                    <div class="form-group">
                        <label for="question-width-select">Width:</label>
                        <select class="form-control width-control" id="question-width-select">
                            <option value="12">Full width (col-12)</option>
                            <option value="9">3/4 width (col-9)</option>
                            <option value="8">2/3 width (col-8)</option>
                            <option value="6">Half width (col-6)</option>
                            <option value="4">1/3 width (col-4)</option>
                            <option value="3">1/4 width (col-3)</option>
                        </select>
                    </div>
                    <div id="options-container" style="display: none;">
                        <div class="form-group">
                            <label>Options:</label>
                            <div id="option-items">
                                <!-- Options will be added here -->
                            </div>
                            <button type="button" class="btn btn-sm btn-primary mt-2" id="add-option">
                                <i class="fas fa-plus"></i> Add Option
                            </button>
                        </div>
                    </div>
                    <div id="file-types-container" style="display: none;">
                        <div class="form-group">
                            <label>Allowed File Types:</label>
                            <div class="form-check">
                                <input class="form-check-input file-type" type="checkbox" value="image/*" id="file-type-image">
                                <label class="form-check-label" for="file-type-image">Images</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input file-type" type="checkbox" value=".pdf" id="file-type-pdf">
                                <label class="form-check-label" for="file-type-pdf">PDF</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input file-type" type="checkbox" value=".doc,.docx" id="file-type-word">
                                <label class="form-check-label" for="file-type-word">Word Documents</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input file-type" type="checkbox" value=".xls,.xlsx" id="file-type-excel">
                                <label class="form-check-label" for="file-type-excel">Excel Files</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input file-type" type="checkbox" value="*" id="file-type-any">
                                <label class="form-check-label" for="file-type-any">Any File Type</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="save-question-options">Save</button>
                </div>
            </div>
        </div>
    </div>


            
        </div>
        
          
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



<?php
    include 'footer.php';
?>  

</div>
<!-- ./wrapper -->

<?php
    include 'js.php';
?>


    <script>
        $(document).ready(function() {
            let currentSection = null;
            let currentQuestion = null;
            let currentQuestionType = null;
            let sectionCounter = 0;

            // Make entire section container sortable
            $("#form-builder").sortable({ handle: ".section-title", placeholder: "ui-state-highlight" });
            let questionCounter = 0;
            
            // Make form elements draggable
            $(".draggable-element").draggable({
                helper: "clone",
                cursor: "move",
                revert: "invalid"
            });
            
            // Make builder container droppable
            $("#form-builder").droppable({
                accept: ".draggable-element",
                drop: function(event, ui) {
                    const type = ui.draggable.data("type");
                    if (type) {
                        if ($("#form-builder").children().length === 0) {
                            addSection(true, function(newSection) {
                                addQuestionToSection(newSection, type);
                            });
                        } else {
                            // Find the nearest section
                            const closestSection = $(ui.helper).closest(".section");
                            if (closestSection.length) {
                                addQuestionToSection(closestSection, type);
                            } else {
                                // Add to the last section
                                const lastSection = $(".section").last();
                                if (lastSection.length) {
                                    addQuestionToSection(lastSection, type);
                                } else {
                                    addSection(true, function(newSection) {
                                        addQuestionToSection(newSection, type);
                                    });
                                }
                            }
                        }
                    }
                }
            });
            
            // Add section button
            $("#add-section").click(function() {
                addSection();
            });
            
            // Preview form button
            $("#preview-form").click(function() {
                generatePreview();
                $("#previewModal").modal("show");
            });
            
            // Create form button (validate)
            $("#create-form").click(function() {
                if (validateForm()) {
                    alert("Form is valid and ready to be submitted!");
                    // Here you would typically submit the form data
                }
            });
            
            // Save section title
            $("#save-section-title").click(function() {
                const title = $("#section-title-input").val().trim();
                const description = $("#section-description-input").val().trim();
                
                if (title) {
                    const titleElement = currentSection.find(".section-title");
                    titleElement.text(title);
                    
                    const descriptionElement = currentSection.find(".section-description");
                    if (description) {
                        if (descriptionElement.length) {
                            descriptionElement.text(description);
                        } else {
                            currentSection.find(".section-header").append(`<div class="section-description text-muted">${description}</div>`);
                        }
                    } else {
                        descriptionElement.remove();
                    }
                    
                    $("#sectionTitleModal").modal("hide");
                }
            });
            
            // Save question options
            $("#save-question-options").click(function() {
                const label = $("#question-label-input").val().trim();
                const placeholder = $("#question-placeholder-input").val().trim();
                const required = $("#question-required-check").is(":checked");
                const width = $("#question-width-select").val();
                
                if (label) {
                    // Update question label
                    currentQuestion.find(".question-label").text(label + (required ? " *" : ""));
                    
                    // Store all data as data attributes
                    currentQuestion.data("label", label);
                    currentQuestion.data("placeholder", placeholder);
                    currentQuestion.data("required", required);
                    currentQuestion.data("width", width);
                    currentQuestion.data("type", currentQuestionType);
                    
                    // For dropdown and checkbox, store options
                    if (currentQuestionType === "dropdown" || currentQuestionType === "checkbox") {
                        const options = [];
                        $("#option-items .option-value").each(function() {
                            const optionValue = $(this).val().trim();
                            if (optionValue) {
                                options.push(optionValue);
                            }
                        });
                        currentQuestion.data("options", options);
                    }
                    
                    // For file upload, store allowed types
                    if (currentQuestionType === "file") {
                        const fileTypes = [];
                        $(".file-type:checked").each(function() {
                            fileTypes.push($(this).val());
                        });
                        currentQuestion.data("fileTypes", fileTypes);
                    }
                    
                    $("#questionOptionsModal").modal("hide");
                }
            });
            
            // Add option button
            $("#add-option").click(function() {
                addOptionItem();
            });
            
            // Function to add a new section
            function addSection(skipModal = false, callback = null) {
                sectionCounter++;
                const sectionId = "section-" + sectionCounter;
                
                const sectionHtml = `
                    <div class="section" id="${sectionId}">
                        <div class="section-header">
                            <div class="section-title">Section ${sectionCounter}</div>
                        </div>
                        <div class="section-questions"></div>
                        <div class="section-footer">
                            <button class="btn btn-sm btn-primary add-question-btn">
                                <i class="fas fa-plus"></i> Add Question
                            </button>
                        </div>
                        <div class="section-actions">
                            <button class="btn btn-sm btn-info edit-section" title="Edit Section"><i class="fas fa-edit"></i></button>
                            <button class="btn btn-sm btn-danger delete-section" title="Delete Section"><i class="fas fa-trash"></i></button>
                        </div>
                    </div>
                `;
                
                const $section = $(sectionHtml).appendTo("#form-builder");
                makeSectionSortable($section);
                
                // Add click handler for the add question button
                $section.find(".add-question-btn").click(function() {
                    showQuestionTypeModal($section);
                });
                
                if (!skipModal) {
                    currentSection = $section;
                    $("#section-title-input").val("Section " + sectionCounter);
                    $("#section-description-input").val("");
                    $("#sectionTitleModal").modal("show");
                }
                
                if (callback) {
                    callback($section);
                }
            }
            
            // Function to show question type selection modal
            function showQuestionTypeModal($section) {
                // Create a simple modal for question type selection
                const modalHtml = `
                    <div class="modal fade" id="questionTypeModal" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Select Question Type</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="list-group question-type-list">
                                        <a href="#" class="list-group-item list-group-item-action" data-type="short-text">Short Text</a>
                                        <a href="#" class="list-group-item list-group-item-action" data-type="paragraph">Paragraph</a>
                                        <a href="#" class="list-group-item list-group-item-action" data-type="dropdown">Dropdown</a>
                                        <a href="#" class="list-group-item list-group-item-action" data-type="checkbox">Checkbox List</a>
                                        <a href="#" class="list-group-item list-group-item-action" data-type="date">Date</a>
                                        <a href="#" class="list-group-item list-group-item-action" data-type="file">File Upload</a>
                                        <a href="#" class="list-group-item list-group-item-action" data-type="numeric">Numeric Input</a>
                                        <a href="#" class="list-group-item list-group-item-action" data-type="scale">Scale (Rating)</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                
                const $modal = $(modalHtml).appendTo("body");
                
                $modal.on("click", ".question-type-list a", function(e) {
                    e.preventDefault();
                    const type = $(this).data("type");
                    $modal.modal("hide");
                    addQuestionToSection($section, type);
                });
                
                $modal.modal("show");
                
                $modal.on("hidden.bs.modal", function() {
                    $modal.remove();
                });
            }
            
            // Function to make sections sortable
            function makeSectionSortable($section) {
                $section.find(".section-questions").sortable({
                    handle: ".drag-handle",
                    placeholder: "ui-state-highlight",
                    connectWith: ".section-questions",
                    receive: function(event, ui) {
                        // Handle questions moved between sections
                    }
                }).disableSelection();
            }
            
            // Function to add a question to a section
            function addQuestionToSection($section, type) {
                questionCounter++;
                const questionId = "question-" + questionCounter;
                
                let questionIcon = "fa-question";
                switch(type) {
                            case "numeric":
                                previewHtml += `<input type="number" class="form-control" id="${questionId}" name="${questionId}" placeholder="${placeholder}" ${required ? 'required' : ''}>`;
                                previewHtml += `<div class="invalid-feedback">Please enter a valid number</div>`;
                                break;
                            case "scale":
                                previewHtml += `<div class="form-check form-check-inline">`;
                                for (let i = 1; i <= 5; i++) {
                                    previewHtml += `<input class="form-check-input" type="radio" name="${questionId}" id="${questionId}-${i}" value="${i}" ${required && i === 1 ? 'required' : ''}>`;
                                    previewHtml += `<label class="form-check-label mr-2" for="${questionId}-${i}">${i}</label>`;
                                }
                                previewHtml += `</div>`;
                                previewHtml += `<div class="invalid-feedback">Please select a rating</div>`;
                                break;
                    case "short-text": questionIcon = "fa-font"; break;
                    case "paragraph": questionIcon = "fa-align-left"; break;
                    case "dropdown": questionIcon = "fa-caret-down"; break;
                    case "checkbox": questionIcon = "fa-check-square"; break;
                    case "date": questionIcon = "fa-calendar-alt"; break;
                    case "file": questionIcon = "fa-file-upload"; break;
                    case "numeric": questionIcon = "fa-hashtag"; break;
                    case "scale": questionIcon = "fa-star"; break;
                }
                
                const questionHtml = `
                    <div class="question" id="${questionId}">
                        <div class="question-header">
                            <i class="fas fa-grip-vertical drag-handle"></i>
                            <i class="fas ${questionIcon} mr-2"></i>
                            <span class="question-label">${type.replace("-", " ")} ${questionCounter}</span>
                        </div>
                        <div class="question-actions">
                            <button class="btn btn-sm btn-info edit-question" title="Edit Question"><i class="fas fa-edit"></i></button>
                            <button class="btn btn-sm btn-danger delete-question" title="Delete Question"><i class="fas fa-trash"></i></button>
                        </div>
                    </div>
                `;
                
                const $question = $(questionHtml).appendTo($section.find(".section-questions"));
                
                // Store initial data
                $question.data({
                    label: `${type.replace("-", " ")} ${questionCounter}`,
                    placeholder: "",
                    required: false,
                    width: "12",
                    type: type,
                    options: type === "dropdown" || type === "checkbox" ? ["Option 1", "Option 2"] : [],
                    fileTypes: type === "file" ? ["image/*"] : []
                });
                
                // Open edit modal
                currentQuestion = $question;
                currentQuestionType = type;
                editQuestion($question, type);
            }
            
            // Function to edit a question
            function editQuestion($question, type) {
                currentQuestion = $question;
                currentQuestionType = type;
                
                // Set modal values from data attributes
                $("#question-label-input").val($question.data("label"));
                $("#question-placeholder-input").val($question.data("placeholder"));
                $("#question-required-check").prop("checked", $question.data("required"));
                $("#question-width-select").val($question.data("width"));
                
                // Show/hide options container based on question type
                if (type === "dropdown" || type === "checkbox") {
                    $("#options-container").show();
                    $("#file-types-container").hide();
                    
                    // Clear and rebuild options
                    $("#option-items").empty();
                    const options = $question.data("options") || [];
                    if (options.length > 0) {
                        options.forEach(option => {
                            addOptionItem(option);
                        });
                    } else {
                        addOptionItem("Option 1");
                        addOptionItem("Option 2");
                    }
                } else if (type === "file") {
                    $("#options-container").hide();
                    $("#file-types-container").show();
                    
                    // Set file types
                    const fileTypes = $question.data("fileTypes") || [];
                    $(".file-type").prop("checked", false);
                    fileTypes.forEach(type => {
                        $(`.file-type[value="${type}"]`).prop("checked", true);
                    });
                } else {
                    $("#options-container").hide();
                    $("#file-types-container").hide();
                }
                
                $("#questionOptionsModal").modal("show");
            }
            
            // Function to add an option item
            function addOptionItem(value = "") {
                const optionId = "option-" + Date.now();
                const optionHtml = `
                    <div class="option-item d-flex align-items-center mb-2">
                        <input type="text" class="form-control form-control-sm option-value" value="${value}" placeholder="Option value">
                        <div class="option-actions">
                            <button class="btn btn-sm btn-danger remove-option" title="Remove Option"><i class="fas fa-times"></i></button>
                        </div>
                    </div>
                `;
                $("#option-items").append(optionHtml);
            }
            
            // Function to generate preview
            function generatePreview() {
                let previewHtml = '<form id="preview-form-data">';
                
                $(".section").each(function() {
                    const $section = $(this);
                    const title = $section.find(".section-title").text();
                    const description = $section.find(".section-description").text();
                    
                    previewHtml += `<fieldset class="mb-4"><legend>${title}</legend>`;
                    if (description) {
                        previewHtml += `<p class="text-muted">${description}</p>`;
                    }
                    
                    previewHtml += '<div class="row">';
                    
                    $section.find(".question").each(function() {
                        const $question = $(this);
                        const label = $question.data("label");
                        const placeholder = $question.data("placeholder");
                        const required = $question.data("required");
                        const width = $question.data("width");
                        const type = $question.data("type");
                        const questionId = `question-${Date.now()}-${Math.floor(Math.random() * 1000)}`;
                        
                        previewHtml += `<div class="form-group preview-question col-md-${width}">`;
                        previewHtml += `<label for="${questionId}">${label}${required ? ' <span class="text-danger">*</span>' : ''}</label>`;
                        
                        switch(type) {
                            case "numeric":
                                previewHtml += `<input type="number" class="form-control" id="${questionId}" name="${questionId}" placeholder="${placeholder}" ${required ? 'required' : ''}>`;
                                previewHtml += `<div class="invalid-feedback">Please enter a valid number</div>`;
                                break;
                            case "scale":
                                previewHtml += `<div class="form-check form-check-inline">`;
                                for (let i = 1; i <= 5; i++) {
                                    previewHtml += `<input class="form-check-input" type="radio" name="${questionId}" id="${questionId}-${i}" value="${i}" ${required && i === 1 ? 'required' : ''}>`;
                                    previewHtml += `<label class="form-check-label mr-2" for="${questionId}-${i}">${i}</label>`;
                                }
                                previewHtml += `</div>`;
                                previewHtml += `<div class="invalid-feedback">Please select a rating</div>`;
                                break;
                            case "short-text":
                                previewHtml += `<input type="text" class="form-control" id="${questionId}" name="${questionId}" placeholder="${placeholder}" ${required ? 'required' : ''}>`;
                                previewHtml += `<div class="invalid-feedback">This field is required</div>`;
                                break;
                            case "paragraph":
                                previewHtml += `<textarea class="form-control" id="${questionId}" name="${questionId}" rows="3" placeholder="${placeholder}" ${required ? 'required' : ''}></textarea>`;
                                previewHtml += `<div class="invalid-feedback">This field is required</div>`;
                                break;
                            case "dropdown":
                                const dropdownOptions = $question.data("options") || [];
                                previewHtml += `<select class="form-control" id="${questionId}" name="${questionId}" ${required ? 'required' : ''}>`;
                                if (placeholder) {
                                    previewHtml += `<option value="">${placeholder}</option>`;
                                }
                                dropdownOptions.forEach(option => {
                                    previewHtml += `<option value="${option}">${option}</option>`;
                                });
                                previewHtml += `</select>`;
                                previewHtml += `<div class="invalid-feedback">Please select an option</div>`;
                                break;
                            case "checkbox":
                                const checkboxOptions = $question.data("options") || [];
                                if (required) {
                                    previewHtml += `<input type="hidden" name="${questionId}-required" value="true">`;
                                }
                                checkboxOptions.forEach((option, index) => {
                                    const optionId = `${questionId}-${index}`;
                                    previewHtml += `<div class="form-check">`;
                                    previewHtml += `<input class="form-check-input" type="checkbox" id="${optionId}" name="${questionId}[]" value="${option}">`;
                                    previewHtml += `<label class="form-check-label" for="${optionId}">${option}</label>`;
                                    previewHtml += `</div>`;
                                });
                                if (required) {
                                    previewHtml += `<div class="invalid-feedback">Please select at least one option</div>`;
                                }
                                break;
                            case "date":
                                previewHtml += `<input type="date" class="form-control" id="${questionId}" name="${questionId}" ${required ? 'required' : ''}>`;
                                previewHtml += `<div class="invalid-feedback">Please select a date</div>`;
                                break;
                            case "file":
                                const fileTypes = $question.data("fileTypes") || [];
                                const accept = fileTypes.join(",");
                                previewHtml += `<input type="file" class="form-control-file" id="${questionId}" name="${questionId}" ${required ? 'required' : ''} ${accept ? `accept="${accept}"` : ''}>`;
                                previewHtml += `<div class="invalid-feedback">Please select a file</div>`;
                                break;
                        }
                        
                        previewHtml += `</div>`;
                    });
                    
                    previewHtml += '</div></fieldset>';
                });
                
                previewHtml += '</form>';
                $("#preview-content").html(previewHtml);
            }
            
            // Function to validate the form
            function validateForm() {
                const $form = $("#preview-form-data");
                let isValid = true;
                let firstInvalidElement = null;
                
                // Reset validation
                $form.find(".is-invalid").removeClass("is-invalid");
                $form.find(".invalid-feedback").hide();
                
                // Check required fields
                $form.find("[required]").each(function() {
                    const $element = $(this);
                    
                    if ($element.is(":checkbox")) {
                        // For checkbox groups with the same name
                        const name = $element.attr("name");
                        const required = $(`input[name="${name}-required"]`).length > 0;
                        
                        if (required) {
                            const checked = $(`input[name="${name}"]:checked`).length > 0;
                            if (!checked) {
                                isValid = false;
                                if (!firstInvalidElement) {
                                    firstInvalidElement = $(`input[name="${name}"]`).first();
                                }
                                // Highlight all checkboxes in the group
                                $(`input[name="${name}"]`).closest(".form-check").addClass("is-invalid");
                                $(`input[name="${name}"]`).closest(".form-group").find(".invalid-feedback").show();
                            }
                        }
                    } else if ($element.is("select")) {
                        // For dropdowns
                        if (!$element.val()) {
                            isValid = false;
                            if (!firstInvalidElement) {
                                firstInvalidElement = $element;
                            }
                            $element.addClass("is-invalid");
                            $element.next(".invalid-feedback").show();
                        }
                    } else {
                        // For other input types
                        if (!$element.val()) {
                            isValid = false;
                            if (!firstInvalidElement) {
                                firstInvalidElement = $element;
                            }
                            $element.addClass("is-invalid");
                            $element.next(".invalid-feedback").show();
                        }
                    }
                });
                
                if (!isValid) {
                    // Scroll to the first invalid element
                    $("#previewModal").animate({
                        scrollTop: $(firstInvalidElement).offset().top - 100
                    }, 500);
                    
                    // Show error message
                    alert("Please fill in all required fields.");
                }
                
                return isValid;
            }
            
            // Event delegation for dynamic elements
            $(document)
                // Edit section
                .on("click", ".edit-section", function() {
                    currentSection = $(this).closest(".section");
                    const title = currentSection.find(".section-title").text();
                    const description = currentSection.find(".section-description").text() || "";
                    
                    $("#section-title-input").val(title);
                    $("#section-description-input").val(description);
                    $("#sectionTitleModal").modal("show");
                })
                // Delete section
                .on("click", ".delete-section", function() {
                    if (confirm("Are you sure you want to delete this section and all its questions?")) {
                        $(this).closest(".section").remove();
                    }
                })
                // Edit question
                .on("click", ".edit-question", function() {
                    const $question = $(this).closest(".question");
                    const type = $question.data("type");
                    editQuestion($question, type);
                })
                // Delete question
                .on("click", ".delete-question", function() {
                    if (confirm("Are you sure you want to delete this question?")) {
                        $(this).closest(".question").remove();
                    }
                })
                // Remove option
                .on("click", ".remove-option", function() {
                    if ($("#option-items").children().length > 1) {
                        $(this).closest(".option-item").remove();
                    } else {
                        alert("You must have at least one option.");
                    }
                });
        });
    </script>


</body>
</html>